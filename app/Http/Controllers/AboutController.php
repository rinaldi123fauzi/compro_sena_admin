<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\About_akhlak;
use App\Models\About_direksidankomisaris;
use App\Models\About_piagam;
use App\Models\About_kebijakankomitmen;
use App\Models\Aboutus_image_slider;
use App\Models\KepemilikanSaham;
use App\Models\StrukturOrganisasi;
use App\Models\Visimisi;
use App\Models\Title;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class AboutController extends Controller
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
        $about = About::findorfail('1');
        $title = 'About';
        return view('about.edit', compact('about', 'title'));
    }
    function about_update(Request $request)
    {
        $about = About::findorfail('1');

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'image.required' => 'Image tidak boleh kosong',
                'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
                'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            ]);

            $file = $request->file('image');
            $filename = 'about_' . time() . '.' . $file->getClientOriginalExtension();

            // Store file in storage/app/public/about directory
            $path = $file->storeAs('public/about', $filename);

            if ($path) {
                $about->update([
                    'image' => $filename,
                    'image_url' => app('url')->to('/storage/about/' . $filename),
                    'sub_headline' => $request->sub_headline,
                    'main_headline' => $request->main_headline,
                    'description' => $request->description,
                    'sub_headline_eng' => $request->sub_headline_eng,
                    'main_headline_eng' => $request->main_headline_eng,
                    'description_eng' => $request->description_eng,
                ]);
                return redirect('about/about')->with('message', 'About berhasil diupdate');
            } else {
                return redirect('about/about')->with('message', 'Gagal mengupdate about');
            }
        } else {
            $about->update([
                'sub_headline' => $request->sub_headline,
                'main_headline' => $request->main_headline,
                'description' => $request->description,
                'sub_headline_eng' => $request->sub_headline_eng,
                'main_headline_eng' => $request->main_headline_eng,
                'description_eng' => $request->description_eng,
            ]);
            return redirect('about/about')->with('message', 'About berhasil diupdate');
        }
    }


    function visimisi()
    {
        $visimisi = Visimisi::findorfail('1');
        $title = 'Visi Misi';
        return view('about.visimisi.edit', compact('visimisi', 'title'));
    }

    function visimisi_update(Request $request)
    {
        $visimisi = Visimisi::findorfail('1');
        /* $request->validate([
            'headline' => 'required',
            'visi_title' => 'required',
            'visi_description' => 'required',
            'misi_title' => 'required',
            'misi_description' => 'required',
        ], [
            'headline.required' => 'Headline tidak boleh kosong',
            'visi_title.required' => 'Visi Title tidak boleh kosong',
            'visi_description.required' => 'Visi Description tidak boleh kosong',
            'misi_title.required' => 'Misi Title tidak boleh kosong',
            'misi_description.required' => 'Misi Description tidak boleh kosong',
        ]); */

        $visimisi->update([
            'headline' => $request->headline,
            'visi_title' => $request->visi_title,
            'visi_description' => $request->visi_description,
            'misi_title' => $request->misi_title,
            'misi_description' => $request->misi_description,
            'headline_eng' => $request->headline_eng,
            'visi_title_eng' => $request->visi_title_eng,
            'visi_description_eng' => $request->visi_description_eng,
            'misi_title_eng' => $request->misi_title_eng,
            'misi_description_eng' => $request->misi_description_eng,
        ]);
        return redirect('about/visimisi')->with('message', 'Visi Misi berhasil diupdate');
    }

    function akhlak()
    {

        $title = 'Akhlak';
        $akhlak = About_akhlak::all();
        return view('about.akhlak.add', compact('title', 'akhlak'));
    }
    function akhlak_store(Request $request)
    {
        $request->validate([
            'image1' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image1.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image1.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'image2.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image2.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'image3.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image3.max' => 'Ukuran file tidak boleh lebih dari 2MB',
        ]);

        $filename = null;
        $filename2 = null;
        $filename3 = null;
        $image1_url = null;
        $image2_url = null;
        $image3_url = null;

        if ($request->hasFile('image1')) {
            $file1 = $request->file('image1');
            $filename = 'akhlak_one_' . time() . '.' . $file1->getClientOriginalExtension();
            $path1 = $file1->storeAs('public/akhlak', $filename);
            if ($path1) {
                $image1_url = app('url')->to('/storage/akhlak/' . $filename);
            }
        }

        if ($request->hasFile('image2')) {
            $file2 = $request->file('image2');
            $filename2 = 'akhlak_two_' . time() . '.' . $file2->getClientOriginalExtension();
            $path2 = $file2->storeAs('public/akhlak', $filename2);
            if ($path2) {
                $image2_url = app('url')->to('/storage/akhlak/' . $filename2);
            }
        }

        if ($request->hasFile('image3')) {
            $file3 = $request->file('image3');
            $filename3 = 'akhlak_three_' . time() . '.' . $file3->getClientOriginalExtension();
            $path3 = $file3->storeAs('public/akhlak', $filename3);
            if ($path3) {
                $image3_url = app('url')->to('/storage/akhlak/' . $filename3);
            }
        }

        About_akhlak::create([
            'image1' => $filename,
            'image2' => $filename2,
            'image3' => $filename3,
            'image1_url' => $image1_url,
            'image2_url' => $image2_url,
            'image3_url' => $image3_url,
        ]);

        return redirect('about/akhlak')->with('message', 'Akhlak berhasil ditambahkan');
    }

    function akhlak_edit($id)
    {
        $akhlakdetail = About_akhlak::findorfail($id);
        $title = 'Edit Akhlak';
        $akhlak = About_akhlak::all();
        return view('about.akhlak.edit', compact('akhlak', 'title', 'akhlakdetail'));
    }

    function akhlak_update(Request $request)
    {
        $akhlak = About_akhlak::findorfail($request->id);
        $request->validate([
            'image1' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image1.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image1.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'image2.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image2.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'image3.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image3.max' => 'Ukuran file tidak boleh lebih dari 2MB',
        ]);

        $filename = $akhlak->image1;
        $filename2 = $akhlak->image2;
        $filename3 = $akhlak->image3;
        $image1_url = $akhlak->image1_url;
        $image2_url = $akhlak->image2_url;
        $image3_url = $akhlak->image3_url;

        if ($request->hasFile('image1')) {
            $file1 = $request->file('image1');
            $filename = 'akhlak_one_' . time() . '.' . $file1->getClientOriginalExtension();
            $path1 = $file1->storeAs('public/akhlak', $filename);
            if ($path1) {
                $image1_url = app('url')->to('/storage/akhlak/' . $filename);
            }
        }

        if ($request->hasFile('image2')) {
            $file2 = $request->file('image2');
            $filename2 = 'akhlak_two_' . time() . '.' . $file2->getClientOriginalExtension();
            $path2 = $file2->storeAs('public/akhlak', $filename2);
            if ($path2) {
                $image2_url = app('url')->to('/storage/akhlak/' . $filename2);
            }
        }

        if ($request->hasFile('image3')) {
            $file3 = $request->file('image3');
            $filename3 = 'akhlak_three_' . time() . '.' . $file3->getClientOriginalExtension();
            $path3 = $file3->storeAs('public/akhlak', $filename3);
            if ($path3) {
                $image3_url = app('url')->to('/storage/akhlak/' . $filename3);
            }
        }

        $akhlak->update([
            'image1' => $filename,
            'image2' => $filename2,
            'image3' => $filename3,
            'image1_url' => $image1_url,
            'image2_url' => $image2_url,
            'image3_url' => $image3_url,
        ]);

        return redirect('about/akhlak_edit/' . $request->id)->with('message', 'Akhlak berhasil diupdate');
    }

    function akhlak_destroy($id)
    {
        $akhlak = About_akhlak::findorfail($id);
        $akhlak->delete();
        return redirect('about/akhlak')->with('message', 'Akhlak berhasil dihapus');
    }

    function direksidankomisaris()
    {
        $title = 'Direksi dan Komisaris';
        $direksi = About_direksidankomisaris::all();
        return view('about.direksidankomisaris.add', compact('title', 'direksi'));
    }
    function direksidankomisaris_store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'position' => 'required',
            'type' => 'required',
        ], [
            'image.required' => 'Image tidak boleh kosong',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'name.required' => 'Name tidak boleh kosong',
            'position.required' => 'Position tidak boleh kosong',
            'type.required' => 'Type tidak boleh kosong',
        ]);

        $file = $request->file('image');
        $filename = 'direksidankomisaris_' . time() . '.' . $file->getClientOriginalExtension();

        // Store file in storage/app/public/direksidankomisaris directory
        $path = $file->storeAs('public/direksidankomisaris', $filename);

        if ($path) {
            $image_url = app('url')->to('/storage/direksidankomisaris/' . $filename);

            About_direksidankomisaris::create([
                'image' => $filename,
                'image_url' => $image_url,
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'experience' => '',
                'position_eng' => $request->position_eng,
                'description_eng' => $request->description_eng,
                'experience_eng' => '',
                'type' => $request->type,
            ]);
            return redirect('about/direksidankomisaris')->with('message', 'Direksi dan Komisaris berhasil ditambahkan');
        } else {
            return redirect('about/direksidankomisaris')->with('message', 'Gagal menambahkan Direksi dan Komisaris');
        }
    }

    function direksidankomisaris_edit($id)
    {
        $direksidankomisaris = About_direksidankomisaris::findorfail($id);
        $title = 'Edit Direksi dan Komisaris';
        $direksi = About_direksidankomisaris::all();
        return view('about.direksidankomisaris.edit', compact('title', 'direksi', 'direksidankomisaris'));
    }

    function direksidankomisaris_update(Request $request, $id)
    {
        $direksidankomisaris = About_direksidankomisaris::findorfail($id);
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'position' => 'required',
            'type' => 'required',
        ], [
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'name.required' => 'Name tidak boleh kosong',
            'position.required' => 'Position tidak boleh kosong',
            'type.required' => 'Type tidak boleh kosong',
        ]);

        $filename = $direksidankomisaris->image;
        $image_url = $direksidankomisaris->image_url;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'direksidankomisaris_' . time() . '.' . $file->getClientOriginalExtension();

            // Store file in storage/app/public/direksidankomisaris directory
            $path = $file->storeAs('public/direksidankomisaris', $filename);

            if ($path) {
                $image_url = app('url')->to('/storage/direksidankomisaris/' . $filename);
            }
        }

        $direksidankomisaris->update([
            'image' => $filename,
            'image_url' => $image_url,
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'experience' => '',
            'position_eng' => $request->position_eng,
            'description_eng' => $request->description_eng,
            'experience_eng' => '',
            'type' => $request->type,
        ]);

        return redirect('about/direksidankomisaris_edit/' . $id)->with('message', 'Direksi dan Komisaris berhasil diupdate');
    }

    function direksidankomisaris_destroy($id)
    {
        $direksidankomisaris = About_direksidankomisaris::findorfail($id);
        $direksidankomisaris->delete();
        return redirect('about/direksidankomisaris')->with('message', 'Direksi dan Komisaris berhasil dihapus');
    }

    function piagam()
    {
        $title = 'Piagam';
        $piagam = About_piagam::all();
        return view('about.piagam.add', compact('title', 'piagam'));
    }
    function piagam_store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'kategori' => 'required',
        ], [
            'image.required' => 'Image tidak boleh kosong',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'title.required' => 'Title tidak boleh kosong',
            'kategori.required' => 'Kategori tidak boleh kosong',
        ]);

        $file = $request->file('image');
        $filename = 'piagam_' . time() . '.' . $file->getClientOriginalExtension();

        // Store file in storage/app/public/piagam directory
        $path = $file->storeAs('public/piagam', $filename);

        if ($path) {
            $image_url = app('url')->to('/storage/piagam/' . $filename);

            About_piagam::create([
                'image' => $filename,
                'image_url' => $image_url,
                'title' => $request->title,
                'kategori' => $request->kategori,
            ]);
            return redirect('about/piagam')->with('message', 'Piagam berhasil ditambahkan');
        } else {
            return redirect('about/piagam')->with('message', 'Gagal menambahkan Piagam');
        }
    }

    function piagam_edit($id)
    {
        $piagamdetail = About_piagam::findorfail($id);
        $title = 'Edit Piagam';
        $piagam = About_piagam::all();
        return view('about.piagam.edit', compact('title', 'piagamdetail', 'piagam'));
    }

    function piagam_update(Request $request, $id)
    {
        $piagam = About_piagam::findorfail($id);
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
        ], [
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'title.required' => 'Title tidak boleh kosong',
        ]);

        $filename = $piagam->image;
        $image_url = $piagam->image_url;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'piagam_' . time() . '.' . $file->getClientOriginalExtension();

            // Store file in storage/app/public/piagam directory
            $path = $file->storeAs('public/piagam', $filename);

            if ($path) {
                $image_url = app('url')->to('/storage/piagam/' . $filename);
            }
        }

        $piagam->update([
            'image' => $filename,
            'image_url' => $image_url,
            'title' => $request->title,
            'kategori' => $request->kategori,
        ]);

        return redirect('about/piagam_edit/' . $id)->with('message', 'Piagam berhasil diupdate');
    }

    function piagam_destroy($id)
    {
        $piagam = About_piagam::findorfail($id);
        $piagam->delete();
        return redirect('about/piagam')->with('message', 'Piagam berhasil dihapus');
    }

    function komitmendankebijakan()
    {
        $title = 'Komitmen dan Kebijakan';
        $komitmendankebijakan = About_kebijakankomitmen::all();
        return view('about.komitmendankebijakan.add', compact('title', 'komitmendankebijakan'));
    }

    function komitmendankebijakan_store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'kategori' => 'required',
        ], [
            'image.required' => 'Image tidak boleh kosong',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'title.required' => 'Title tidak boleh kosong',
            'kategori.required' => 'Kategori tidak boleh kosong',
        ]);

        $file = $request->file('image');
        $filename = 'komitmendankebijakan_' . time() . '.' . $file->getClientOriginalExtension();

        // Store file in storage/app/public/komitmendankebijakan directory
        $path = $file->storeAs('public/komitmendankebijakan', $filename);

        if ($path) {
            $image_url = app('url')->to('/storage/komitmendankebijakan/' . $filename);

            About_kebijakankomitmen::create([
                'image' => $filename,
                'image_url' => $image_url,
                'title' => $request->title,
                'title_eng' => $request->title_eng,
                'kategori' => $request->kategori,
            ]);
            return redirect('about/komitmendankebijakan')->with('message', 'Komitmen dan Kebijakan berhasil ditambahkan');
        } else {
            return redirect('about/komitmendankebijakan')->with('message', 'Gagal menambahkan Komitmen dan Kebijakan');
        }
    }

    function komitmendankebijakan_edit($id)
    {
        $komitmendankebijakandetail = About_kebijakankomitmen::findorfail($id);
        $title = 'Edit Komitmen dan Kebijakan';
        $komitmendankebijakan = About_kebijakankomitmen::all();
        return view('about.komitmendankebijakan.edit', compact('title', 'komitmendankebijakandetail', 'komitmendankebijakan'));
    }

    function komitmendankebijakan_update(Request $request, $id)
    {
        $komitmendankebijakan = About_kebijakankomitmen::findorfail($id);
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
        ], [
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'title.required' => 'Title tidak boleh kosong',
        ]);

        $filename = $komitmendankebijakan->image;
        $image_url = $komitmendankebijakan->image_url;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'komitmendankebijakan_' . time() . '.' . $file->getClientOriginalExtension();

            // Store file in storage/app/public/komitmendankebijakan directory
            $path = $file->storeAs('public/komitmendankebijakan', $filename);

            if ($path) {
                $image_url = app('url')->to('/storage/komitmendankebijakan/' . $filename);
            }
        }

        $komitmendankebijakan->update([
            'image' => $filename,
            'image_url' => $image_url,
            'title' => $request->title,
            'title_eng' => $request->title_eng,
            'kategori' => $request->kategori,
        ]);

        return redirect('about/komitmendankebijakan_edit/' . $id)->with('message', 'Komitmen dan Kebijakan berhasil diupdate');
    }

    function komitmendankebijakan_destroy($id)
    {
        $komitmendankebijakan = About_kebijakankomitmen::findorfail($id);
        $komitmendankebijakan->delete();
        return redirect('about/komitmendankebijakan')->with('message', 'Komitmen dan Kebijakan berhasil dihapus');
    }

    function akhlakeditbackground()
    {
        $title = 'Edit Akhlak Background';
        $about = About::where('id', 1)->first();
        return view('about.akhlak.editbackground', compact('title', 'about'));
    }

    function updateakhlakeditbackground(Request $request)
    {
        $request->validate([
            'background_akhlak' => 'required|mimes:jpeg,png,jpg,gif|max:5048',
        ], [
            'image.required' => 'Image tidak boleh kosong',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
        ]);

        $about = About::findorfail(1);
        $file = $request->file('background_akhlak');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        if ($file->move($this->uploadPath, $filename)) {
            $about->update([
                'background_akhlak' => $filename,
            ]);
            return redirect('about/akhlakeditbackground')->with('message', 'Gambar Berhasil Disimpan');
        } else {
            return redirect('about/akhlakeditbackground')->with('message', 'Gagal Menyimpan Gambar');
        }
    }

    //Akhlak title
    function editakhlaktitle()
    {
        $title = 'Edit Akhlak ';
        $titles = Title::where('id', 2)->first();
        return view('about.akhlak.edittitle', compact('title', 'titles'));
    }

    function updateakhlaktitle(Request $request)
    {
        /* $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Title tidak boleh kosong',
        ]); */

        $titles = Title::where('id', 2)->first();
        $titles->update($request->all());
        return redirect('about/editakhlaktitle')->with('message', 'Akhlak Title berhasil diupdate');
    }

    //Piagam title
    function piagamtitle()
    {
        $title = 'Edit Piagam  ';
        $titles = Title::where('id', 3)->first();
        return view('about.piagam.edittitle', compact('title', 'titles'));
    }

    function updatepiagamtitle(Request $request)
    {
        $titles = Title::where('id', 3)->first();
        $titles->update($request->all());
        return redirect('about/piagamtitle')->with('message', 'Piagam Title berhasil diupdate');
    }

    function aboutus_image_slider_add()
    {
        $title = 'Add Image Slider About Us';
        $slider = Aboutus_image_slider::all();
        return view('about.aboutbisnis.add', compact('title', 'slider'));
    }

    function aboutus_image_slider_store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
        ], [
            'image.required' => 'Image tidak boleh kosong',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'title.required' => 'Title tidak boleh kosong',
        ]);

        $file = $request->file('image');
        $filename = 'one' . time() . '.' . $file->getClientOriginalExtension();

        if ($file->move($this->uploadPath, $filename)) {
            Aboutus_image_slider::create([
                'image' => $filename,
                'title' => $request->title,
            ]);
            return redirect('about/aboutus_image_slider_add')->with('message', 'Image Slider berhasil ditambahkan');
        } else {
            return redirect('about/aboutus_image_slider_add')->with('message', 'Gagal menambahkan Image Slider');
        }
    }

    function aboutus_image_slider_edit($id)
    {
        $slider = Aboutus_image_slider::findorfail($id);
        $title = 'Edit Image Slider';
        $sliders = Aboutus_image_slider::all();
        return view('about.aboutbisnis.edit', compact('title', 'slider', 'sliders'));
    }

    function aboutus_image_slider_update(Request $request, $id)
    {
        $slider = Aboutus_image_slider::findorfail($id);
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
        ], [
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'title.required' => 'Title tidak boleh kosong',
        ]);

        $filename = $slider->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'one' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        $slider->update([
            'image' => $filename,
            'title' => $request->title,
        ]);

        return redirect('about/aboutus_image_slider_edit/' . $id)->with('message', 'Image Slider berhasil diupdate');
    }

    function aboutus_image_slider_destroy($id)
    {
        $slider = Aboutus_image_slider::findorfail($id);
        $slider->delete();
        return redirect('about/aboutus_image_slider_add')->with('message', 'Image Slider berhasil dihapus');
    }

    // Executive Leadership Title
    function editexecutiveleadershiptitle()
    {
        $title = 'Edit Executive Leadership Title';
        $titles = Title::where('id', 8)->first();

        // Jika data dengan ID 8 tidak ada, buat data baru
        if (!$titles) {
            $titles = Title::create([
                'id' => 8,
                'texttitle' => 'Executive Leadership',
                'textsubtitle' => '',
                'textdeskripsi' => '',
                'texttitle_eng' => 'Executive Leadership',
                'textsubtitle_eng' => '',
                'textdeskripsi_eng' => '',
            ]);
        }

        return view('about.direksidankomisaris.edittitle', compact('title', 'titles'));
    }

    function updateexecutiveleadershiptitle(Request $request)
    {
        $request->validate([
            'texttitle' => 'required',
        ], [
            'texttitle.required' => 'Title tidak boleh kosong',
        ]);

        $titles = Title::where('id', 8)->first();

        if (!$titles) {
            // Jika tidak ada, buat baru
            Title::create([
                'id' => 8,
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

        return redirect('about/editexecutiveleadershiptitle')->with('message', 'Executive Leadership Title berhasil diupdate');
    }

    // Komitmen dan Kebijakan Title
    function editkomitmendankebijakantitle()
    {
        $title = 'Edit Komitmen dan Kebijakan Title';
        $titles = Title::where('id', 9)->first();

        // Jika data dengan ID 9 tidak ada, buat data baru
        if (!$titles) {
            Title::create([
                'id' => 9,
                'texttitle' => 'Komitmen dan Kebijakan',
                'textsubtitle' => '',
                'textdeskripsi' => '',
                'texttitle_eng' => 'Commitment and Policy',
                'textsubtitle_eng' => '',
                'textdeskripsi_eng' => '',
            ]);
        }

        return view('about.komitmendankebijakan.edittitle', compact('title', 'titles'));
    }

    function updatekomitmendankebijakantitle(Request $request)
    {
        $request->validate([
            'texttitle' => 'required',
        ], [
            'texttitle.required' => 'Title tidak boleh kosong',
        ]);

        $titles = Title::where('id', 9)->first();

        if (!$titles) {
            // Jika tidak ada, buat baru
            Title::create([
                'id' => 9,
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

        return redirect('about/editkomitmendankebijakantitle')->with('message', 'Komitmen dan Kebijakan Title berhasil diupdate');
    }

    // Struktur Organisasi Functions
    function strukturorganisasi()
    {
        $strukturorganisasi = StrukturOrganisasi::first();

        // Jika data belum ada, buat data default
        if (!$strukturorganisasi) {
            $strukturorganisasi = StrukturOrganisasi::create([
                'title' => 'Struktur Organisasi',
                'title_eng' => 'Organizational Structure',
                'description' => '',
                'description_eng' => '',
                'image' => null,
                'image_eng' => null,
                'image_url' => null,
                'image_eng_url' => null,
            ]);
        }

        $title = 'Struktur Organisasi';
        return view('about.strukturorganisasi.edit', compact('strukturorganisasi', 'title'));
    }

    function strukturorganisasi_update(Request $request)
    {
        $strukturorganisasi = StrukturOrganisasi::first();

        if (!$strukturorganisasi) {
            $strukturorganisasi = StrukturOrganisasi::create([]);
        }

        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'image_eng' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'image_eng.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image_eng.max' => 'Ukuran file tidak boleh lebih dari 2MB',
        ]);

        $image_filename = $strukturorganisasi->image;
        $image_eng_filename = $strukturorganisasi->image_eng;
        $image_url = $strukturorganisasi->image_url;
        $image_eng_url = $strukturorganisasi->image_eng_url;

        // Handle Indonesian image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_filename = 'struktur_organisasi_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/struktur-organisasi', $image_filename);
            if ($path) {
                $image_url = app('url')->to('/storage/struktur-organisasi/' . $image_filename);
            }
        }

        // Handle English image upload
        if ($request->hasFile('image_eng')) {
            $file_eng = $request->file('image_eng');
            $image_eng_filename = 'struktur_organisasi_eng_' . time() . '.' . $file_eng->getClientOriginalExtension();
            $path_eng = $file_eng->storeAs('public/struktur-organisasi', $image_eng_filename);
            if ($path_eng) {
                $image_eng_url = app('url')->to('/storage/struktur-organisasi/' . $image_eng_filename);
            }
        }

        $strukturorganisasi->update([
            'title' => $request->title,
            'title_eng' => $request->title_eng,
            'description' => $request->description,
            'description_eng' => $request->description_eng,
            'image' => $image_filename,
            'image_eng' => $image_eng_filename,
            'image_url' => $image_url,
            'image_eng_url' => $image_eng_url,
        ]);

        return redirect('about/strukturorganisasi')->with('message', 'Struktur Organisasi berhasil diupdate');
    }

    // Kepemilikan Saham Functions
    function kepemilikansaham()
    {
        $kepemilikansaham = KepemilikanSaham::first();

        // Jika data belum ada, buat data default
        if (!$kepemilikansaham) {
            $kepemilikansaham = KepemilikanSaham::create([
                'title' => 'Kepemilikan Saham',
                'title_eng' => 'Share Ownership',
                'description' => '',
                'description_eng' => '',
                'image' => null,
                'image_eng' => null,
                'image_url' => null,
                'image_eng_url' => null,
            ]);
        }

        $title = 'Kepemilikan Saham';
        return view('about.kepemilikansaham.edit', compact('kepemilikansaham', 'title'));
    }

    function kepemilikansaham_update(Request $request)
    {
        $kepemilikansaham = KepemilikanSaham::first();

        if (!$kepemilikansaham) {
            $kepemilikansaham = KepemilikanSaham::create([]);
        }

        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'image_eng' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'image_eng.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image_eng.max' => 'Ukuran file tidak boleh lebih dari 2MB',
        ]);

        $image_filename = $kepemilikansaham->image;
        $image_eng_filename = $kepemilikansaham->image_eng;
        $image_url = $kepemilikansaham->image_url;
        $image_eng_url = $kepemilikansaham->image_eng_url;

        // Handle Indonesian image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_filename = 'kepemilikan_saham_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/kepemilikan-saham', $image_filename);
            if ($path) {
                $image_url = app('url')->to('/storage/kepemilikan-saham/' . $image_filename);
            }
        }

        // Handle English image upload
        if ($request->hasFile('image_eng')) {
            $file_eng = $request->file('image_eng');
            $image_eng_filename = 'kepemilikan_saham_eng_' . time() . '.' . $file_eng->getClientOriginalExtension();
            $path_eng = $file_eng->storeAs('public/kepemilikan-saham', $image_eng_filename);
            if ($path_eng) {
                $image_eng_url = app('url')->to('/storage/kepemilikan-saham/' . $image_eng_filename);
            }
        }

        $kepemilikansaham->update([
            'title' => $request->title,
            'title_eng' => $request->title_eng,
            'description' => $request->description,
            'description_eng' => $request->description_eng,
            'image' => $image_filename,
            'image_eng' => $image_eng_filename,
            'image_url' => $image_url,
            'image_eng_url' => $image_eng_url,
        ]);

        return redirect('about/kepemilikansaham')->with('message', 'Kepemilikan Saham berhasil diupdate');
    }
}
