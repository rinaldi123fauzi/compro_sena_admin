<?php

namespace App\Http\Controllers;

use App\Models\Home_slider;
use App\Helpers\TinyMCEHelper;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{
  /**
   * Show the form for editing the home slider.
   * Since there's only one slider, we'll get the first record or create one if it doesn't exist.
   */
  public function edit()
  {
    $title = 'Edit Home Slider';
    $slider = Home_slider::first();

    // If no slider exists, create a default one
    if (!$slider) {
      $slider = Home_slider::create([
        'primary_text' => '',
        'primary_text_eng' => '',
        'description' => '',
        'description_eng' => '',
        'file_video' => null,
        'url_video' => null,
      ]);
    }

    return view('home.slider.edit', compact('slider', 'title'));
  }

  /**
   * Update the home slider.
   */
  public function update(Request $request): RedirectResponse
  {
    $request->validate([
      'primary_text' => 'nullable',
      'primary_text_eng' => 'nullable',
      'description' => 'nullable',
      'description_eng' => 'nullable',
      'file_video' => 'nullable|mimes:mp4,avi,mov,wmv,flv|max:80000', // 50MB max
    ], [
      'file_video.mimes' => 'File video harus berupa mp4, avi, mov, wmv, atau flv',
      'file_video.max' => 'Ukuran file video tidak boleh lebih dari 80MB',
    ]);

    $slider = Home_slider::first();
    if (!$slider) {
      $slider = new Home_slider();
    }

    $filename = $slider->file_video; // Keep existing file if no new file uploaded

    // Handle file upload
    if ($request->hasFile('file_video')) {
      $file = $request->file('file_video');
      $filename = time() . '.' . $file->getClientOriginalExtension();

      // Delete old file if exists
      if ($slider->file_video && Storage::exists('public/videos/' . $slider->file_video)) {
        Storage::delete('public/videos/' . $slider->file_video);
      }

      // Store file in storage/app/public/videos directory
      $path = $file->storeAs('public/videos', $filename);

      if (!$path) {
        return redirect()->back()->with('error', 'Gagal mengupload file video');
      }
    }

    // Generate URL video otomatis berdasarkan file yang diupload
    $url_video = $slider->url_video; // Keep existing URL if no new file uploaded
    if ($filename) {
      // Generate URL otomatis menggunakan storage URL: domain/storage/videos/namafile
      $url_video = app('url')->to('/storage/videos/' . $filename);
    }

    // Update or create slider
    // Option 1: Remove all HTML tags (plain text only)
    $slider->updateOrCreate(
      ['id' => $slider->id ?? 1],
      [
        //'primary_text' => TinyMCEHelper::getPlainText($request->primary_text ?? ''),
        'primary_text' => $request->primary_text,
        'primary_text_eng' => $request->primary_text_eng,
        'description' => $request->description,
        'description_eng' => $request->description_eng,
        'file_video' => $filename,
        'url_video' => $url_video,
      ]
    );



    return redirect()->back()->with('message', 'Home slider berhasil diupdate');
  }
}
