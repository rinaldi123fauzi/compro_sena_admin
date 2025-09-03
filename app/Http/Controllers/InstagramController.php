<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instagram;
use Illuminate\Support\Facades\Storage;

class InstagramController extends Controller
{
  public function index()
  {
    $instagrams = Instagram::orderBy('tanggal_posting', 'desc')->get();
    return view('admin.instagram.list', compact('instagrams'));
  }

  public function add()
  {
    return view('admin.instagram.add');
  }
  public function store(Request $request)
  {
    $request->validate([
      'caption' => 'required|string',
      'tanggal_posting' => 'required|date',
      'url' => 'required|url',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $data = $request->only(['caption', 'tanggal_posting', 'url']);

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imageName = time() . '_' . $image->getClientOriginalName();
      $image->storeAs('public/instagram', $imageName);
      $data['image'] = $imageName;
      // Store the full URL path for accessing the uploaded image
      $data['image_url'] = asset('storage/instagram/' . $imageName);
    }

    Instagram::create($data);

    return redirect()->route('instagram.index')->with('success', 'Data Instagram berhasil ditambahkan');
  }

  public function edit($id)
  {
    $instagram = Instagram::findOrFail($id);
    return view('admin.instagram.edit', compact('instagram'));
  }
  public function update(Request $request, $id)
  {
    $instagram = Instagram::findOrFail($id);

    $request->validate([
      'caption' => 'required|string',
      'tanggal_posting' => 'required|date',
      'url' => 'required|url',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'image_source' => 'required|in:upload,keep'
    ]);

    $data = $request->only(['caption', 'tanggal_posting', 'url']);

    if ($request->image_source === 'upload' && $request->hasFile('image')) {
      // Delete old image if exists
      if ($instagram->image && Storage::exists('public/instagram/' . $instagram->image)) {
        Storage::delete('public/instagram/' . $instagram->image);
      }

      $image = $request->file('image');
      $imageName = time() . '_' . $image->getClientOriginalName();
      $image->storeAs('public/instagram', $imageName);
      $data['image'] = $imageName;
      // Update the image_url with new file path
      $data['image_url'] = asset('storage/instagram/' . $imageName);
    }

    $instagram->update($data);

    return redirect()->route('instagram.index')->with('success', 'Data Instagram berhasil diupdate');
  }

  public function destroy($id)
  {
    $instagram = Instagram::findOrFail($id);

    // Delete image if exists
    if ($instagram->image && Storage::exists('public/instagram/' . $instagram->image)) {
      Storage::delete('public/instagram/' . $instagram->image);
    }

    $instagram->delete();

    return redirect()->route('instagram.index')->with('success', 'Data Instagram berhasil dihapus');
  }
}
