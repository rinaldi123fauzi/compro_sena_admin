<?php

namespace App\Http\Controllers;

use App\Models\HighlightProject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HighlightProjectController extends Controller
{
  public function index()
  {
    $highlightProjects = HighlightProject::orderBy('id', 'desc')->get();
    return view('project.highlight_project.index', compact('highlightProjects'));
  }

  public function add()
  {
    return view('project.highlight_project.add');
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'lat' => 'nullable|string',
      'lng' => 'nullable|string',
    ]);

    HighlightProject::create([
      'title' => $request->title,
      'description' => $request->description,
      'lat' => $request->lat,
      'lng' => $request->lng,
    ]);

    return redirect()->route('highlight-project.index')->with('success', 'Highlight project berhasil ditambahkan!');
  }

  public function edit($id)
  {
    $highlightProject = HighlightProject::findOrFail($id);
    return view('project.highlight_project.edit', compact('highlightProject'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'lat' => 'nullable|string',
      'lng' => 'nullable|string',
    ]);

    $highlightProject = HighlightProject::findOrFail($id);
    $highlightProject->update([
      'title' => $request->title,
      'description' => $request->description,
      'lat' => $request->lat,
      'lng' => $request->lng,
    ]);

    return redirect()->route('highlight-project.index')->with('success', 'Highlight project berhasil diupdate!');
  }

  public function destroy($id)
  {
    $highlightProject = HighlightProject::findOrFail($id);
    $highlightProject->delete();

    return redirect()->route('highlight-project.index')->with('success', 'Highlight project berhasil dihapus!');
  }
}
