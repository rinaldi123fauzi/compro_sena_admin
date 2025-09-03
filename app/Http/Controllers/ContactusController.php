<?php

namespace App\Http\Controllers;

use App\Models\Contact_us;
use App\Models\Pertanyaan;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactusController extends Controller
{
    //
    protected $uploadPath;

    public function __construct()
    {
        // Inisialisasi di constructor
        $this->uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/image/';
    }


    function edit()
    {
        $title = 'Edit Contact Us';
        $contactus = Contact_us::where('id', 1)->first();
        return view('contactus.edit', compact('title', 'contactus'));
    }

    function update(Request $request, $id)
    {

        $contactus = Contact_us::find($id);

        $filename = $contactus->featured_image;
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = 'news_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        $contactus->ho_city = $request->ho_city;
        $contactus->ho_address = $request->ho_address;
        $contactus->ho_phone = $request->ho_phone;
        $contactus->ho_email = $request->ho_email;
        $contactus->ho_linkmap = $request->ho_linkmap;
        $contactus->featured_image = $filename;
        $contactus->map = $request->map;
        $contactus->save();

        return redirect('contact-us/edit')->with('message', 'Contact Us Berhasil Diubah');
    }

    function edittitle()
    {
        $title = 'Edit Contact Us Title';
        $contacttitle = Title::where('id', 12)->first();
        return view('contactus.edittitle', compact('title', 'contacttitle'));
    }

    function updatetitle(Request $request)
    {
        $request->validate([
            'texttitle' => 'required',
            'textsubtitle' => 'required',
        ]);

        $contacttitle = Title::where('id', 12)->first();

        $contacttitle->update([
            'texttitle' => $request->texttitle,
            'texttitle_eng' => $request->texttitle_eng,
            'textsubtitle' => $request->textsubtitle,
            'textsubtitle_eng' => $request->textsubtitle_eng,
            'textdeskripsi' => $request->textdeskripsi,
            'textdeskripsi_eng' => $request->textdeskripsi_eng,
        ]);

        return redirect('contact-us/edittitle')->with('message', 'Contact Us Title Berhasil Diubah');
    }

    function listpertanyaan()
    {
        $title = 'List Pertanyaan';
        $listpertanyaan  = Pertanyaan::all();
        return view('contactus.index', compact('title', 'listpertanyaan'));
    }

    function showpertanyaan($id)
    {
        $title = 'Detail Pertanyaan';
        $pertanyaan = Pertanyaan::find($id);

        //Update status pertanyaan
        if ($pertanyaan->status == 'unread') {
            $pertanyaan->status = 'read';
            $pertanyaan->save();
        }
        return view('contactus.showpertanyaan', compact('title', 'pertanyaan'));
    }

    function updatepertanyaan(Request $request, $id)
    {
        $pertanyaan = Pertanyaan::find($id);

        $request->validate([
            'reply_subject' => 'required',
            'reply_message' => 'required',
        ]);



        $filename = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = 'pertanyaan_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/file/'), $filename);
        }



        $pertanyaan->status = 'replied';
        $pertanyaan->replied_by = Auth::user()->id;
        $pertanyaan->reply_subject = $request->reply_subject;
        $pertanyaan->reply_message = $request->reply_message;
        $pertanyaan->reply_attachment = $filename;
        $pertanyaan->save();

        return redirect('contact-us/showpertanyaan/' . $id)->with('message', 'pesan Berhasil Dibalas');
    }
    function destroypertanyaan($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->delete();
        return redirect('contact-us/listpertanyaan')->with('message', 'Pertanyaan Berhasil Dihapus');
    }
}
