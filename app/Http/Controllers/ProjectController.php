<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    protected $uploadPath;

    public function __construct()
    {
        // Inisialisasi di constructor
        $this->uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/image/';
    }

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
                'year' => 'required',
                'type' => 'required'
            ],
            [
                'name.required' => 'Name is required',
                'description.required' => 'Description is required',
                'year.required' => 'Year is required',
                'type.required' => 'Type is required'
            ]
        );

        /* $filename = null;

        if ($request->hasFile('image')) {
            $file1 = $request->file('image');
            $filename = 'one' . time() . '.' . $file1->getClientOriginalExtension();
            $file1->move($this->uploadPath, $filename);
        } */

        Project::create([
            //'image' => $filename,
            'name' => $request->name,
            'description' => $request->description,
            'year' => $request->year,
            'type' => $request->type,
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
        $project = Project::findorfail($id);

        /* $filename = $project->image;

        if ($request->hasFile('image')) {
            $file1 = $request->file('image');
            $filename = 'one' . time() . '.' . $file1->getClientOriginalExtension();
            $file1->move($this->uploadPath, $filename);
        } */

        $project->update([
            //'image' => $filename,
            'name' => $request->name,
            'description' => $request->description,
            'year' => $request->year,
            'type' => $request->type,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        return redirect('project/edit/' . $id)->with('message', 'Project Berhasil Diubah');
    }

    function destroy($id): RedirectResponse
    {
        $project = Project::findorfail($id);
        $project->delete();
        return redirect('project')->with('message', 'Project Berhasil Dihapus');
    }
}
