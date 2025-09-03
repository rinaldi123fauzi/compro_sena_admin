<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Service_discipline;
use Illuminate\Http\Request;
use App\Models\Service_softwaredanhardware;

class ServiceController extends Controller
{
    //
    protected $uploadPath;

    public function __construct()
    {
        // Inisialisasi di constructor
        $this->uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/image/';
    }
    function index()
    {
        $title = 'Service';
        $service = Service::all();
        return view('service.service.index', compact('title', 'service'));
    }

    function add()
    {
        $title = 'Service';
        return view('service.service.add', compact('title'));
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'image' => 'required',
                'title' => 'required',
                'description' => 'required',
                //'list' => 'required|array'
            ],
            [
                'image.required' => 'Image is required',
                'title.required' => 'Title is required',
                'description.required' => 'Descirption is required',
                //'list.required' => 'List is required'
            ]
        );


        /* $listArray = $request->input('list');
        $listString = implode(',', $listArray); */
        $listString = '';
        if ($request->has('list')) {
            // Check if list is array and not empty
            if (is_array($request->input('list'))) {
                $listString = implode(',', $request->input('list'));
            } else {
                // If it's already a string, use it directly or handle accordingly
                $listString = $request->input('list');
            }
        }

        $filename = null;

        if ($request->hasFile('image')) {
            $file1 = $request->file('image');
            $filename = 'one' . time() . '.' . $file1->getClientOriginalExtension();
            $file1->move($this->uploadPath, $filename);
        }

        Service::create([
            'image' => $filename,
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'title_eng' => $request->title_eng,
            'description_eng' => $request->description_eng,
            'short_description_eng' => $request->short_description_eng,
            'list' => $listString,
        ]);

        return redirect('service/add')->with('message', 'Service berhasil ditambahkan');
    }

    function edit($id)
    {
        $title = 'Service';
        $service = Service::find($id);
        $service->list = explode(',', $service->list); // Convert comma-separated string to array
        return view('service.service.edit', compact('service', 'title'));
    }

    function update(Request $request, $id)
    {

        $service = Service::findorfail($request->id);

        /* $listArray = $request->input('list');
        $listString = implode(',', $listArray); */

        $listString = '';
        if ($request->has('list')) {
            // Check if list is array and not empty
            if (is_array($request->input('list'))) {
                $listString = implode(',', $request->input('list'));
            } else {
                // If it's already a string, use it directly or handle accordingly
                $listString = $request->input('list');
            }
        }


        $filename = $service->image;

        if ($request->hasFile('image')) {
            $file1 = $request->file('image');
            $filename = 'one' . time() . '.' . $file1->getClientOriginalExtension();
            $file1->move($this->uploadPath, $filename);
        }

        $service->update([
            'image' => $filename,
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'title_eng' => $request->title_eng,
            'description_eng' => $request->description_eng,
            'short_description_eng' => $request->short_description_eng,
            'list' => $listString,
        ]);



        return redirect('service/edit/' . $id)->with('message', 'Service berhasil diubah');
    }

    function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect('service')->with('message', 'Service berhasil dihapus');
    }



    function discipline()
    {
        $title = 'Service Discipline';
        return view('service.discipline.index', compact('title'));
    }

    function discipline_add()
    {
        $title = 'Service Discipline';
        $discipline = Service_discipline::find('1');
        $discipline->list = explode(',', $discipline->list); // Convert comma-separated string to array
        return view('service.discipline.add', compact('title', 'discipline'));
    }
    function discipline_update(Request $request)
    {
        $request->validate(
            [
                'headline' => 'required',
                'list' => 'required|array'
            ],
            [
                'headline.required' => 'Headline is required',
                'list.required' => 'List is required'
            ]
        );

        $discipline = Service_discipline::find('1');

        $filename = $discipline->background_discipline;
        if ($request->hasFile('background_discipline')) {
            $file = $request->file('background_discipline');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }




        $listArray = $request->input('list');
        $listString = implode(',', $listArray);


        $discipline->update([
            'headline' => $request->headline,
            'list' => $listString,
            'background_discipline' => $filename,
        ]);

        return redirect('service/discipline_add')->with('message', 'Service Discipline berhasil diubah');
    }


    function softwaredanhardware()
    {
        $title = 'Software dan Hardware';
        $allsh = Service_softwaredanhardware::all();
        return view('service.softwaredanhardware.add', compact('title', 'allsh'));
    }

    function softwaredanhardware_store(Request $request)
    {
        $request->validate(
            [
                'image' => 'required',
                'title' => 'required',
                'type' => 'required'
            ],
            [
                'image.required' => 'Image is required',
                'title.required' => 'Title is required',
                'type.required' => 'Type is required'
            ]
        );

        $filename = null;

        if ($request->hasFile('image')) {
            $file1 = $request->file('image');
            $filename = 'one' . time() . '.' . $file1->getClientOriginalExtension();
            $file1->move($this->uploadPath, $filename);
        }

        Service_softwaredanhardware::create([
            'image' => $filename,
            'title' => $request->title,
            'type' => $request->type,
        ]);

        return redirect('service/softwaredanhardware')->with('message', 'Service Software dan Hardware berhasil ditambahkan');
    }

    function softwaredanhardware_edit($id)
    {
        $title = 'Software dan Hardware';
        $sh = Service_softwaredanhardware::find($id);
        $allsh = Service_softwaredanhardware::all();
        return view('service.softwaredanhardware.edit', compact('sh', 'title', 'allsh'));
    }
    function softwaredanhardware_update(Request $request, $id)
    {
        $sh = Service_softwaredanhardware::findorfail($request->id);

        $filename = $sh->image;

        if ($request->hasFile('image')) {
            $file1 = $request->file('image');
            $filename = 'one' . time() . '.' . $file1->getClientOriginalExtension();
            $file1->move($this->uploadPath, $filename);
        }

        $sh->update([
            'image' => $filename,
            'title' => $request->title,
            'type' => $request->type,
        ]);

        return redirect('service/softwaredanhardware_edit/' . $id)->with('message', 'Service Software dan Hardware berhasil diubah');
    }

    function softwaredanhardware_destroy($id)
    {
        $sh = Service_softwaredanhardware::find($id);
        $sh->delete();
        return redirect('service/softwaredanhardware')->with('message', 'Service Software dan Hardware berhasil dihapus');
    }
}
