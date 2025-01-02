<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    protected $uploadPath;

    public function __construct()
    {
        // Inisialisasi di constructor
        $this->uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/image/';
    }

    //
    function logo()
    {
        $title = 'Semua Berita';
        $header = Header::find('1');
        return view('header.logo', compact('title', 'header'));
    }

    function logo_update(Request $request)
    {
        $request->validate([
            'logo' => 'required',
        ]);

        $filename = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        Header::where('id', '1')->update([
            'logo' => $filename,
        ]);

        return redirect('header/logo')->with('message', 'Logo Berhasil Diubah');
    }

    function about_us()
    {
        $title = 'Tentang Kami';
        $header = Header::find('1');
        return view('header.aboutus', compact('title', 'header'));
    }

    function about_us_update(Request $request)
    {

        $header = Header::find('1');
        $request->validate([
            'header_about_us_text' => 'required',
            'header_about_us_text_en' => 'required',
        ]);

        $filename = $header->header_about_us_image;
        if ($request->hasFile('header_about_us_image')) {
            $file = $request->file('header_about_us_image');
            $filename = 'header_about_us_image_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        Header::where('id', '1')->update([
            'header_about_us_image' => $filename,
            'header_about_us_text' => $request->header_about_us_text,
            'header_about_us_text_en' => $request->header_about_us_text_en,
        ]);

        return redirect('header/about_us')->with('message', 'Tentang Kami Berhasil Diubah');
    }

    function capability()
    {
        $title = 'Capability';
        $header = Header::find('1');
        return view('header.capability', compact('title', 'header'));
    }

    function capability_update(Request $request)
    {

        $header = Header::find('1');
        $request->validate([
            'header_capability_text' => 'required',
            'header_capability_text_en' => 'required',
        ]);

        $filename = $header->header_capability_image;
        if ($request->hasFile('header_capability_image')) {
            $file = $request->file('header_capability_image');
            $filename = 'header_capability_image_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        Header::where('id', '1')->update([
            'header_capability_image' => $filename,
            'header_capability_text' => $request->header_capability_text,
            'header_capability_text_en' => $request->header_capability_text_en,
        ]);

        return redirect('header/capability')->with('message', 'Capability Berhasil Diubah');
    }

    function experience()
    {
        $title = 'Experience';
        $header = Header::find('1');
        return view('header.experience', compact('title', 'header'));
    }

    function experience_update(Request $request)
    {

        $header = Header::find('1');
        $request->validate([
            'header_experience_text' => 'required',
            'header_experience_text_en' => 'required',
        ]);

        $filename = $header->header_experience_image;
        if ($request->hasFile('header_experience_image')) {
            $file = $request->file('header_experience_image');
            $filename = 'header_experience_image_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        Header::where('id', '1')->update([
            'header_experience_image' => $filename,
            'header_experience_text' => $request->header_experience_text,
            'header_experience_text_en' => $request->header_experience_text_en,
        ]);

        return redirect('header/experience')->with('message', 'Experience Berhasil Diubah');
    }

    function contact_us()
    {
        $title = 'Contact Us';
        $header = Header::find('1');
        return view('header.contactus', compact('title', 'header'));
    }

    function contact_us_update(Request $request)
    {

        $header = Header::find('1');
        $request->validate([
            'header_contact_us_text' => 'required',
            'header_contact_us_text_en' => 'required',
        ]);

        $filename = $header->header_contact_us_image;
        if ($request->hasFile('header_contact_us_image')) {
            $file = $request->file('header_contact_us_image');
            $filename = 'header_contact_us_image_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        Header::where('id', '1')->update([
            'header_contact_us_image' => $filename,
            'header_contact_us_text' => $request->header_contact_us_text,
            'header_contact_us_text_en' => $request->header_contact_us_text_en,
        ]);

        return redirect('header/contact_us')->with('message', 'Contact Us Berhasil Diubah');
    }



    function mediainvestor()
    {
        $title = 'Media Investor';
        $header = Header::find('1');
        return view('header.mediainvestor', compact('title', 'header'));
    }

    function mediainvestor_update(Request $request)
    {
        $header = Header::find('1');
        $request->validate([
            'header_mediainvestor_text' => 'required',
        ]);

        $filename = $header->header_mediainvestor_image;
        if ($request->hasFile('header_mediainvestor_image')) {
            $file = $request->file('header_mediainvestor_image');
            $filename = 'header_mediainvestor_image_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        Header::where('id', '1')->update([
            'header_mediainvestor_image' => $filename,
            'header_mediainvestor_text' => $request->header_mediainvestor_text,
        ]);

        return redirect('header/mediainvestor')->with('message', 'Media Investor Berhasil Diubah');
    }

    function news()
    {
        $title = 'News';
        $header = Header::find('1');
        return view('header.news', compact('title', 'header'));
    }

    function news_update(Request $request)
    {
        $header = Header::find('1');
        $request->validate([
            'header_news_text' => 'required',
        ]);

        $filename = $header->header_news_image;
        if ($request->hasFile('header_news_image')) {
            $file = $request->file('header_news_image');
            $filename = 'header_news_image_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        Header::where('id', '1')->update([
            'header_news_image' => $filename,
            'header_news_text' => $request->header_news_text,
        ]);

        return redirect('header/news')->with('message', 'News Berhasil Diubah');
    }

    function annualreport()
    {
        $title = 'Annual Report';
        $header = Header::find('1');
        return view('header.annualreport', compact('title', 'header'));
    }

    function annualreport_update(Request $request)
    {
        $header = Header::find('1');
        $request->validate([
            'header_annualreport_text' => 'required',
        ]);

        $filename = $header->header_annualreport_image;
        if ($request->hasFile('header_annualreport_image')) {
            $file = $request->file('header_annualreport_image');
            $filename = 'header_annualreport_image_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        Header::where('id', '1')->update([
            'header_annualreport_image' => $filename,
            'header_annualreport_text' => $request->header_annualreport_text,
        ]);

        return redirect('header/annualreport')->with('message', 'Annual Report Berhasil Diubah');
    }
}
