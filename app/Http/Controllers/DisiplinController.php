<?php

namespace App\Http\Controllers;

use App\Models\Disiplin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DisiplinController extends Controller
{
  public function index()
  {
    $disiplins = Disiplin::orderBy('id', 'desc')->get();
    return view('disiplin.index', compact('disiplins'));
  }

  public function add()
  {
    return view('disiplin.add');
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'deskripsi' => 'required|string',
      'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $filename = null;
    $icon_url = null;

    // Handle file upload
    if ($request->hasFile('icon')) {
      $file = $request->file('icon');
      $filename = time() . '.' . $file->getClientOriginalExtension();

      // Store file in storage/app/public/icons directory
      $path = $file->storeAs('public/icons', $filename);

      if (!$path) {
        return redirect()->back()->with('error', 'Gagal mengupload file icon');
      }

      // Generate URL icon otomatis berdasarkan file yang diupload
      $icon_url = app('url')->to('/storage/icons/' . $filename);
    }

    Disiplin::create([
      'title' => $request->title,
      'deskripsi' => $request->deskripsi,
      'icon' => $filename,
      'icon_url' => $icon_url,
    ]);

    return redirect()->route('disiplin.index')->with('success', 'Disiplin berhasil ditambahkan!');
  }

  public function edit($id)
  {
    $disiplin = Disiplin::findOrFail($id);
    return view('disiplin.edit', compact('disiplin'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'deskripsi' => 'required|string',
      'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $disiplin = Disiplin::findOrFail($id);

    $filename = $disiplin->icon; // Keep existing file if no new file uploaded
    $icon_url = $disiplin->icon_url; // Keep existing URL if no new file uploaded

    // Handle file upload
    if ($request->hasFile('icon')) {
      $file = $request->file('icon');
      $filename = time() . '.' . $file->getClientOriginalExtension();

      // Delete old file if exists
      if ($disiplin->icon && Storage::exists('public/icons/' . $disiplin->icon)) {
        Storage::delete('public/icons/' . $disiplin->icon);
      }

      // Store file in storage/app/public/icons directory
      $path = $file->storeAs('public/icons', $filename);

      if (!$path) {
        return redirect()->back()->with('error', 'Gagal mengupload file icon');
      }

      // Generate URL icon otomatis berdasarkan file yang diupload
      $icon_url = app('url')->to('/storage/icons/' . $filename);
    }

    $disiplin->update([
      'title' => $request->title,
      'deskripsi' => $request->deskripsi,
      'icon' => $filename,
      'icon_url' => $icon_url,
    ]);

    return redirect()->route('disiplin.index')->with('success', 'Disiplin berhasil diupdate!');
  }

  public function destroy($id)
  {
    $disiplin = Disiplin::findOrFail($id);

    // Delete icon file if exists
    if ($disiplin->icon && Storage::exists('public/icons/' . $disiplin->icon)) {
      Storage::delete('public/icons/' . $disiplin->icon);
    }

    $disiplin->delete();

    return redirect()->route('disiplin.index')->with('success', 'Disiplin berhasil dihapus!');
  }
}
