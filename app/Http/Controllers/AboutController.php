<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\About_akhlak;
use App\Models\About_direksidankomisaris;
use App\Models\About_piagam;
use App\Models\Visimisi;
use App\Models\Title;


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
                'image2' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'image.required' => 'Image tidak boleh kosong',
                'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
                'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            ]);

            $file1 = $request->file('image');
            $filename = 'one' . time() . '.' . $file1->getClientOriginalExtension();


            $file2 = $request->file('image2');
            $filename2 = 'two' . time() . '.' . $file2->getClientOriginalExtension();

            if ($file1->move($this->uploadPath, $filename) && $file2->move($this->uploadPath, $filename2)) {
                $about->update([
                    'image' => $filename,
                    'sub_headline' => $request->sub_headline,
                    'main_headline' => $request->main_headline,
                    'description' => $request->description,
                    'image2' => $filename2,
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
        ], [
            'image1.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image1.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'image2.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image2.max' => 'Ukuran file tidak boleh lebih dari 2MB',
        ]);

        $filename = null;
        $filename2 = null;
        $filename3 = null;

        if ($request->hasFile('image1')) {
            $file1 = $request->file('image1');
            $filename = 'one' . time() . '.' . $file1->getClientOriginalExtension();
            $file1->move($this->uploadPath, $filename);
        }

        if ($request->hasFile('image2')) {
            $file2 = $request->file('image2');
            $filename2 = 'two' . time() . '.' . $file2->getClientOriginalExtension();
            $file2->move($this->uploadPath, $filename2);
        }

        if ($request->hasFile('image3')) {
            $file3 = $request->file('image3');
            $filename3 = 'two' . time() . '.' . $file3->getClientOriginalExtension();
            $file3->move($this->uploadPath, $filename3);
        }

        About_akhlak::create([
            'image1' => $filename,
            'image2' => $filename2,
            'image3' => $filename3,
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
        ], [
            'image1.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image1.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'image2.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image2.max' => 'Ukuran file tidak boleh lebih dari 2MB',
        ]);

        $filename = $akhlak->image1;
        $filename2 = $akhlak->image2;
        $filename3 = $akhlak->image3;

        if ($request->hasFile('image1')) {
            $file1 = $request->file('image1');
            $filename = 'one' . time() . '.' . $file1->getClientOriginalExtension();
            $file1->move($this->uploadPath, $filename);
        }

        if ($request->hasFile('image2')) {
            $file2 = $request->file('image2');
            $filename2 = 'two' . time() . '.' . $file2->getClientOriginalExtension();
            $file2->move($this->uploadPath, $filename2);
        }


        if ($request->hasFile('image3')) {
            $file3 = $request->file('image3');
            $filename3 = 'two' . time() . '.' . $file3->getClientOriginalExtension();
            $file3->move($this->uploadPath, $filename3);
        }

        $akhlak->update([
            'image1' => $filename,
            'image2' => $filename2,
            'image3' => $filename3,
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
        $filename = 'one' . time() . '.' . $file->getClientOriginalExtension();

        if ($file->move($this->uploadPath, $filename)) {
            About_direksidankomisaris::create([
                'image' => $filename,
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'experience' => $request->experience,
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

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'one' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        $direksidankomisaris->update([
            'image' => $filename,
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'experience' => $request->experience,
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
        ], [
            'image.required' => 'Image tidak boleh kosong',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'title.required' => 'Title tidak boleh kosong',
        ]);

        $file = $request->file('image');
        $filename = 'one' . time() . '.' . $file->getClientOriginalExtension();

        if ($file->move($this->uploadPath, $filename)) {
            About_piagam::create([
                'image' => $filename,
                'title' => $request->title,
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

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'one' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        $piagam->update([
            'image' => $filename,
            'title' => $request->title,
        ]);

        return redirect('about/piagam_edit/' . $id)->with('message', 'Piagam berhasil diupdate');
    }

    function piagam_destroy($id)
    {
        $piagam = About_piagam::findorfail($id);
        $piagam->delete();
        return redirect('about/piagam')->with('message', 'Piagam berhasil dihapus');
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
    //Akhlak title
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
}
