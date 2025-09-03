<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    function index()
    {
        $title = 'Project';
        $projects = Project::all();
        return view('project.index', compact('title', 'projects'));
    }

    function add()
    {
        $title = 'Project';
        return view('project.add', compact('title'));
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'year' => 'nullable',
                'type' => 'required',
                'sector' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            [
                'name.required' => 'Name is required',
                'description.required' => 'Description is required',
                'type.required' => 'Type is required',
                'image.image' => 'File must be an image',
                'image.mimes' => 'Image must be jpeg, png, jpg, or gif',
                'image.max' => 'Image size must not exceed 2MB'
            ]
        );

        $imagePath = null;
        $imageUrl = null;
        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'project_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('projects', $imageName, 'public');
            $imageUrl = asset('storage/' . $imagePath);
        }

        Project::create([
            'name' => $request->name,
            'name_eng' => $request->name_eng,
            'client' => $request->client,
            'location' => $request->location,
            'image' => $imageName,
            'image_url' => $imageUrl,
            'description' => $request->description,
            'description_eng' => $request->description_eng,
            'year' => $request->year,
            'type' => $request->type,
            'sektor' => $request->sector,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        return redirect('project/add')->with('message', 'Project Berhasil Ditambahkan');
    }

    function edit($id)
    {
        $title = 'Project';
        $project = Project::find($id);
        return view('project.edit', compact('title', 'project'));
    }

    function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'year' => 'nullable',
                'type' => 'required',
                'sector' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            [
                'name.required' => 'Name is required',
                'description.required' => 'Description is required',
                'type.required' => 'Type is required',
                'image.image' => 'File must be an image',
                'image.mimes' => 'Image must be jpeg, png, jpg, or gif',
                'image.max' => 'Image size must not exceed 2MB'
            ]
        );

        $project = Project::findorfail($id);

        $imagePath = $project->image;
        $imageUrl = $project->image_url;
        $imageName = $project->image;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image && \Storage::disk('public')->exists('projects/' . $project->image)) {
                \Storage::disk('public')->delete('projects/' . $project->image);
            }

            $image = $request->file('image');
            $imageName = 'project_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('projects', $imageName, 'public');
            $imageUrl = asset('storage/' . $imagePath);
        }

        $project->update([
            'name' => $request->name,
            'name_eng' => $request->name_eng,
            'client' => $request->client,
            'location' => $request->location,
            'image' => $imageName,
            'image_url' => $imageUrl,
            'description' => $request->description,
            'description_eng' => $request->description_eng,
            'year' => $request->year,
            'type' => $request->type,
            'sektor' => $request->sector,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'turunanbisnis' => $request->turunanbisnis,
            'software' => $request->software,
        ]);

        return redirect('project/edit/' . $id)->with('message', 'Project Berhasil Diubah');
    }

    function destroy($id): RedirectResponse
    {
        $project = Project::findorfail($id);

        // Delete image if exists
        if ($project->image && Storage::disk('public')->exists('projects/' . $project->image)) {
            Storage::disk('public')->delete('projects/' . $project->image);
        }

        $project->delete();
        return redirect('project')->with('message', 'Project Berhasil Dihapus');
    }
}
