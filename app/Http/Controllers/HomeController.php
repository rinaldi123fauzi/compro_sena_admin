<?php

namespace App\Http\Controllers;

use App\Models\Home_about;
use App\Models\Home_about_counter;
use App\Models\Home_slider;
use App\Models\Home_capability;
use App\Models\Home_client;
use App\Models\Title;
use App\Models\Vendor;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //

    protected $uploadPath;

    public function __construct()
    {
        // Inisialisasi di constructor
        $this->uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/image/';
    }



    function slider_list()
    {
        $title = 'Daftar Slider';
        $sliders = Home_slider::all();
        return view('home.slider.index', compact('sliders', 'title'));
    }
    function slider_add()
    {
        $title = 'Tambah Slider';
        return view('home.slider.add', compact('title'));
    }
    function slider_store(Request $request): RedirectResponse
    {
        $request->validate([
            'primary_text' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'primary_text.required' => 'Primary Text tidak boleh kosong',
            'image.required' => 'Image tidak boleh kosong',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
        ]);


        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        if ($file->move($this->uploadPath, $filename)) {
            Home_slider::create([
                'primary_text' => $request->primary_text,
                'image' => $filename,
                'button_text' => $request->button_text,
                'button_link' => $request->button_link,
                'primary_text_eng' => $request->primary_text_eng,
                'button_text_eng' => $request->button_text_eng,
            ]);
            return redirect('home/slider_add')->with('message', 'Slider berhasil ditambahkan');
        } else {
            return redirect('home/slider_add')->with('message', 'Gagal menambahkan slider');
        }
    }

    function slider_edit($id)
    {
        $title = 'Edit Slider';
        $slider = Home_slider::findOrFail($id);
        return view('home.slider.edit', compact('slider', 'title'));
    }
    function slider_update(Request $request, $id)
    {
        $slider = Home_slider::findOrFail($id);
        $request->validate([
            'primary_text' => 'required',
        ], [
            'primary_text.required' => 'Primary Text tidak boleh kosong',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'image.required' => 'Image tidak boleh kosong',
                'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
                'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            ]);

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            if ($file->move($this->uploadPath, $filename)) {
                $slider->update([
                    'sub_text' => $request->sub_text,
                    'primary_text' => $request->primary_text,
                    'image' => $filename,
                    'button_text' => $request->button_text,
                    'button_link' => $request->button_link,
                    'primary_text_eng' => $request->primary_text_eng,
                    'button_text_eng' => $request->button_text_eng,
                ]);
                return redirect('home/slider_edit/' . $id)->with('message', 'Slider berhasil diupdate');
            } else {
                return redirect('home/slider_edit/' . $id)->with('message', 'Gagal mengupdate slider');
            }
        } else {
            $slider->update([
                'primary_text' => $request->primary_text,
                'button_text' => $request->button_text,
                'button_link' => $request->button_link,
                'primary_text_eng' => $request->primary_text_eng,
                'button_text_eng' => $request->button_text_eng,
            ]);
            return redirect('home/slider_edit/' . $id)->with('message', 'Slider berhasil diupdate');
        }
    }

    function slider_destroy($id)
    {
        Home_slider::destroy($id);
        return redirect('home/slider_list')->with('message', 'Slider berhasil dihapus');
    }


    function about()
    {
        $about = Home_about::findorfail('1');
        $title = 'About';
        return view('home.about.edit', compact('about', 'title'));
    }
    function about_update(Request $request)
    {
        $about = Home_about::findorfail('1');
        $request->validate([
            'sub_headline' => 'required',
            'main_headline' => 'required',
            'description' => 'required',
        ], [
            'sub_headline.required' => 'Sub Headline tidak boleh kosong',
            'main_headline.required' => 'Main Headline tidak boleh kosong',
            'description.required' => 'Description tidak boleh kosong',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'image.required' => 'Image tidak boleh kosong',
                'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
                'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            ]);

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            if ($file->move($this->uploadPath, $filename)) {
                $about->update([
                    'image' => $filename,
                    'sub_headline' => $request->sub_headline,
                    'main_headline' => $request->main_headline,
                    'description' => $request->description,
                    'link_video' => $request->link_video,
                    'sub_headline_eng' => $request->sub_headline_eng,
                    'main_headline_eng' => $request->main_headline_eng,
                    'description_eng' => $request->description_eng,
                    'link_video_eng' => $request->link_video_eng,
                ]);
                return redirect('home/about')->with('message', 'About berhasil diupdate');
            } else {
                return redirect('home/about')->with('message', 'Gagal mengupdate about');
            }
        } else {
            $about->update([
                'sub_headline' => $request->sub_headline,
                'main_headline' => $request->main_headline,
                'description' => $request->description,
                'link_video' => $request->link_video,
                'sub_headline_eng' => $request->sub_headline_eng,
                'main_headline_eng' => $request->main_headline_eng,
                'description_eng' => $request->description_eng,
                'link_video_eng' => $request->link_video_eng,
            ]);
            return redirect('home/about')->with('message', 'About berhasil diupdate');
        }
    }



    /* #Counter */
    function counter_list()
    {
        $title = 'Daftar Counter';
        $counters = Home_about_counter::all();
        return view('home.counter.index', compact('counters', 'title'));
    }
    function counter_add()
    {
        $title = 'Tambah Counter';
        return view('home.counter.add', compact('title'));
    }
    function counter_store(Request $request): RedirectResponse
    {
        $request->validate([
            'number' => 'required',
            'title' => 'required',
        ], [
            'number.required' => 'Number tidak boleh kosong',
            'title.required' => 'Title tidak boleh kosong',
        ]);

        Home_about_counter::create($request->all());
        return redirect('home/counter_add')->with('message', 'Counter berhasil ditambahkan');
    }
    function counter_edit($id)
    {
        $title = 'Edit Counter';
        $counter = Home_about_counter::findOrFail($id);
        return view('home.counter.edit', compact('counter', 'title'));
    }
    function counter_update(Request $request, $id)
    {
        $counter = Home_about_counter::findOrFail($id);
        $request->validate([
            'number' => 'required',
            'title' => 'required',
        ], [
            'number.required' => 'Number tidak boleh kosong',
            'title.required' => 'Title tidak boleh kosong',
        ]);

        $counter->update($request->all());
        return redirect('home/counter_edit/' . $id)->with('message', 'Counter berhasil diupdate');
    }
    function counter_destroy($id)
    {
        Home_about_counter::destroy($id);
        return redirect('home/counter_list')->with('message', 'Counter berhasil dihapus');
    }











    /* #Capability */
    function capability_list()
    {
        $title = 'Daftar Capability';
        $capabilities = Home_capability::all();
        return view('home.capability.index', compact('capabilities', 'title'));
    }
    function capability_add()
    {
        $title = 'Tambah Capability';
        return view('home.capability.add', compact('title'));
    }
    function capability_store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Title tidak boleh kosong',
            'description.required' => 'Description tidak boleh kosong',
            'image.required' => 'Image tidak boleh kosong',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
        ]);

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        if ($file->move($this->uploadPath, $filename)) {
            Home_capability::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $filename,
                'title_eng' => $request->title_eng,
                'description_eng' => $request->description_eng,
            ]);
            return redirect('home/capability_add')->with('message', 'Capability berhasil ditambahkan');
        } else {
            return redirect('home/capability_add')->with('message', 'Gagal menambahkan capability');
        }
    }
    function capability_edit($id)
    {
        $title = 'Edit Capability';
        $capability = Home_capability::findOrFail($id);
        return view('home.capability.edit', compact('capability', 'title'));
    }
    function capability_update(Request $request, $id)
    {
        $capability = Home_capability::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Title tidak boleh kosong',
            'description.required' => 'Description tidak boleh kosong',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'image.required' => 'Image tidak boleh kosong',
                'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
                'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            ]);

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            if ($file->move($this->uploadPath, $filename)) {
                $capability->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $filename,
                    'title_eng' => $request->title_eng,
                    'description_eng' => $request->description_eng,
                ]);
                return redirect('home/capability_edit/' . $id)->with('message', 'Capability berhasil diupdate');
            } else {
                return redirect('home/capability_edit/' . $id)->with('message', 'Gagal mengupdate capability');
            }
        } else {
            $capability->update([
                'title' => $request->title,
                'description' => $request->description,
                'title_eng' => $request->title_eng,
                'description_eng' => $request->description_eng,
            ]);
            return redirect('home/capability_edit/' . $id)->with('message', 'Capability berhasil diupdate');
        }
    }
    function capability_destroy($id)
    {
        Home_capability::destroy($id);
        return redirect('home/capability_list')->with('message', 'Capability berhasil dihapus');
    }














    /* #Client */

    function client_list()
    {
        $title = 'Daftar Client';
        $clients = Home_client::all();
        return view('home.client.index', compact('clients', 'title'));
    }
    function client_add()
    {
        $title = 'Tambah Client';
        return view('home.client.add', compact('title'));
    }
    function client_store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Name tidak boleh kosong',
            'image.required' => 'Image tidak boleh kosong',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
        ]);

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        if ($file->move($this->uploadPath, $filename)) {
            Home_client::create([
                'title' => $request->title,
                'type' => $request->type,
                'image' => $filename,
            ]);
            return redirect('home/client_add')->with('message', 'Client berhasil ditambahkan');
        } else {
            return redirect('home/client_add')->with('message', 'Gagal menambahkan client');
        }
    }
    function client_edit($id)
    {
        $title = 'Edit Client';
        $client = Home_client::findOrFail($id);
        return view('home.client.edit', compact('client', 'title'));
    }
    function client_update(Request $request, $id)
    {
        $client = Home_client::findOrFail($id);
        /* $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name tidak boleh kosong',
        ]); */

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif|max:6048',
            ], [
                'image.required' => 'Image tidak boleh kosong',
                'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
                'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            ]);

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            //dd($filename);
            if ($file->move($this->uploadPath, $filename)) {
                $client->update([
                    'title' => $request->title,
                    'type' => $request->type,
                    'image' => $filename,
                ]);
                return redirect('home/client_edit/' . $id)->with('message', 'Client berhasil diupdate');
            } else {
                return redirect('home/client_edit/' . $id)->with('message', 'Gagal mengupdate client');
            }
        } else {
            $client->update([
                'title' => $request->title,
                'type' => $request->type,
            ]);
            return redirect('home/client_edit/' . $id)->with('message', 'Client berhasil diupdate');
        }
    }
    function client_destroy($id)
    {
        Home_client::destroy($id);
        return redirect('home/client_list')->with('message', 'Client berhasil dihapus');
    }



    function editcapabilitiestitle()
    {
        $title = 'Edit Capabilities Title';
        $titles = Title::where('id', 1)->first();
        return view('home.capability.edittitle', compact('title', 'titles'));
    }

    function updatecapabilitiestitle(Request $request)
    {
        /* $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Title tidak boleh kosong',
        ]); */

        $titles = Title::where('id', '1')->first();
        $titles->update($request->all());
        return redirect('home/editcapabilitiestitle')->with('message', 'Capabilities Title berhasil diupdate');
    }
}
