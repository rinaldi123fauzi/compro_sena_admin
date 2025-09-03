<?php

namespace App\Http\Controllers;

use App\Models\Home_about;
use App\Models\Home_about_counter;
use App\Models\Home_capability;
use App\Models\Home_client;
use App\Models\Title;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


    function about()
    {
        $about = Home_about::first();
        if (!$about) {
            // Jika belum ada data, buat data kosong
            $about = Home_about::create([
                'sub_headline' => '',
                'main_headline' => '',
                'description' => '',
                'url_video' => '',
                'sub_headline_eng' => '',
                'main_headline_eng' => '',
                'description_eng' => '',
                'url_video_eng' => '',
            ]);
        }
        $title = 'About';
        return view('home.about.edit', compact('about', 'title'));
    }
    function about_update(Request $request)
    {
        $about = Home_about::first();
        if (!$about) {
            // Jika belum ada data, buat data baru
            $about = new Home_about();
        }



        $updateData = [
            'sub_headline' => $request->sub_headline,
            'main_headline' => $request->main_headline,
            'description' => $request->description,
            'sub_headline_eng' => $request->sub_headline_eng,
            'main_headline_eng' => $request->main_headline_eng,
            'description_eng' => $request->description_eng,
        ];

        // Handle image upload
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
                $updateData['image'] = $filename;
            } else {
                return redirect('home/about')->with('message', 'Gagal mengupdate gambar');
            }
        }

        // Handle video file upload
        if ($request->hasFile('file_video')) {
            $request->validate([
                'file_video' => 'required|mimes:mp4,avi,mov,wmv|max:81920', // 80MB max
            ], [
                'file_video.required' => 'Video file tidak boleh kosong',
                'file_video.mimes' => 'File harus berupa video dengan format mp4, avi, mov, wmv',
                'file_video.max' => 'Ukuran file tidak boleh lebih dari 80MB',
            ]);

            $file = $request->file('file_video');
            $filename = time() . '_video.' . $file->getClientOriginalExtension();

            // Store file in storage/app/public/videos directory
            $path = $file->storeAs('public/videos', $filename);

            if ($path) {
                $updateData['file_video'] = $filename;
                $updateData['url_video'] = app('url')->to('/storage/videos/' . $filename);
            }
        }

        // Handle English video file upload
        if ($request->hasFile('file_video_eng')) {
            $request->validate([
                'file_video_eng' => 'required|mimes:mp4,avi,mov,wmv|max:81920', // 80MB max
            ], [
                'file_video_eng.required' => 'English video file tidak boleh kosong',
                'file_video_eng.mimes' => 'File harus berupa video dengan format mp4, avi, mov, wmv',
                'file_video_eng.max' => 'Ukuran file tidak boleh lebih dari 80MB',
            ]);

            $file = $request->file('file_video_eng');
            $filename = time() . '_video_eng.' . $file->getClientOriginalExtension();

            // Store file in storage/app/public/videos directory
            $path = $file->storeAs('public/videos', $filename);

            if ($path) {
                $updateData['file_video_eng'] = $filename;
                $updateData['url_video_eng'] = app('url')->to('/storage/videos/' . $filename);
            }
        }

        // Update atau create data
        if ($about->exists) {
            $about->update($updateData);
        } else {
            $about->fill($updateData);
            $about->save();
        }

        return redirect('home/about')->with('message', 'About berhasil diupdate');
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
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Title tidak boleh kosong',
            'image.required' => 'Image tidak boleh kosong',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
        ]);

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        // Store file in storage/app/public/capabilities directory
        $path = $file->storeAs('public/capabilities', $filename);

        if ($path) {
            Home_capability::create([
                'title' => $request->title,
                'description' => '',
                'image' => $filename,
                'image_url' => app('url')->to('/storage/capabilities/' . $filename),
                'title_eng' => $request->title_eng,
                'description_eng' => '',
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
        ], [
            'title.required' => 'Title tidak boleh kosong',
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

            // Store file in storage/app/public/capabilities directory
            $path = $file->storeAs('public/capabilities', $filename);

            if ($path) {
                $capability->update([
                    'title' => $request->title,
                    'description' => '',
                    'image' => $filename,
                    'image_url' => app('url')->to('/storage/capabilities/' . $filename),
                    'title_eng' => $request->title_eng,
                    'description_eng' => '',
                ]);
                return redirect('home/capability_edit/' . $id)->with('message', 'Capability berhasil diupdate');
            } else {
                return redirect('home/capability_edit/' . $id)->with('message', 'Gagal mengupdate capability');
            }
        } else {
            $capability->update([
                'title' => $request->title,
                'description' => '',
                'title_eng' => $request->title_eng,
                'description_eng' => '',
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
        $filename = 'client_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('images/clients', $filename, 'public');
        $image_url = app('url')->to('/storage/' . $path);

        Home_client::create([
            'title' => $request->title,
            'type' => $request->type,
            'image' => $filename,
            'image_url' => $image_url,
        ]);

        return redirect('home/client_add')->with('message', 'Client berhasil ditambahkan');
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

        $updateData = [
            'title' => $request->title,
            'type' => $request->type,
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif|max:6048',
            ], [
                'image.required' => 'Image tidak boleh kosong',
                'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
                'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            ]);

            // Delete old image if exists
            if ($client->image) {
                Storage::disk('public')->delete('images/clients/' . $client->image);
            }

            $file = $request->file('image');
            $filename = 'client_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/clients', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['image'] = $filename;
            $updateData['image_url'] = $image_url;
        }

        $client->update($updateData);
        return redirect('home/client_edit/' . $id)->with('message', 'Client berhasil diupdate');
    }
    function client_destroy($id)
    {
        $client = Home_client::findOrFail($id);

        // Delete image file if exists
        if ($client->image) {
            Storage::disk('public')->delete('images/clients/' . $client->image);
        }

        $client->delete();
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

    function editcountertitle()
    {
        $title = 'Edit Counter Title';
        $titles = Title::where('id', 7)->first();

        // Jika data dengan ID 7 tidak ada, buat data baru
        if (!$titles) {
            $titles = Title::create([
                'id' => 7,
                'texttitle' => 'Counter',
                'textsubtitle' => '',
                'textdeskripsi' => '',
                'texttitle_eng' => 'Counter',
                'textsubtitle_eng' => '',
                'textdeskripsi_eng' => '',
            ]);
        }

        return view('home.counter.edittitle', compact('title', 'titles'));
    }

    function updatecountertitle(Request $request)
    {
        $request->validate([
            'texttitle' => 'required',
        ], [
            'texttitle.required' => 'Title tidak boleh kosong',
        ]);

        $titles = Title::where('id', 7)->first();

        if (!$titles) {
            // Jika tidak ada, buat baru
            Title::create([
                'id' => 7,
                'texttitle' => $request->texttitle,
                'textsubtitle' => $request->textsubtitle,
                'textdeskripsi' => $request->textdeskripsi,
                'texttitle_eng' => $request->texttitle_eng,
                'textsubtitle_eng' => $request->textsubtitle_eng,
                'textdeskripsi_eng' => $request->textdeskripsi_eng,
            ]);
        } else {
            // Update data yang ada
            $titles->update([
                'texttitle' => $request->texttitle,
                'textsubtitle' => $request->textsubtitle,
                'textdeskripsi' => $request->textdeskripsi,
                'texttitle_eng' => $request->texttitle_eng,
                'textsubtitle_eng' => $request->textsubtitle_eng,
                'textdeskripsi_eng' => $request->textdeskripsi_eng,
            ]);
        }

        return redirect('home/editcountertitle')->with('message', 'Counter Title berhasil diupdate');
    }

    function editclienttitle()
    {
        $title = 'Edit Client Title';
        $titles = Title::where('id', 6)->first();

        // Jika data dengan ID 6 tidak ada, buat data baru
        if (!$titles) {
            $titles = Title::create([
                'id' => 6,
                'texttitle' => 'Clients',
                'textsubtitle' => '',
                'textdeskripsi' => '',
                'texttitle_eng' => 'Clients',
                'textsubtitle_eng' => '',
                'textdeskripsi_eng' => '',
            ]);
        }

        return view('home.client.edittitle', compact('title', 'titles'));
    }

    function updateclienttitle(Request $request)
    {
        $request->validate([
            'texttitle' => 'required',
        ], [
            'texttitle.required' => 'Title tidak boleh kosong',
        ]);

        $titles = Title::where('id', 6)->first();

        if (!$titles) {
            // Jika tidak ada, buat baru
            Title::create([
                'id' => 6,
                'texttitle' => $request->texttitle,
                'textsubtitle' => $request->textsubtitle,
                'textdeskripsi' => $request->textdeskripsi,
                'texttitle_eng' => $request->texttitle_eng,
                'textsubtitle_eng' => $request->textsubtitle_eng,
                'textdeskripsi_eng' => $request->textdeskripsi_eng,
            ]);
        } else {
            // Update data yang ada
            $titles->update([
                'texttitle' => $request->texttitle,
                'textsubtitle' => $request->textsubtitle,
                'textdeskripsi' => $request->textdeskripsi,
                'texttitle_eng' => $request->texttitle_eng,
                'textsubtitle_eng' => $request->textsubtitle_eng,
                'textdeskripsi_eng' => $request->textdeskripsi_eng,
            ]);
        }

        return redirect('home/editclienttitle')->with('message', 'Client Title berhasil diupdate');
    }
}
