<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    // Remove upload path as we'll use Laravel Storage
    public function __construct()
    {
        // No longer needed with Storage facade
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

        $updateData = [];

        if ($request->hasFile('logo')) {
            $header = Header::find('1');

            // Delete old logo if exists
            if ($header->logo) {
                Storage::disk('public')->delete('images/header/' . $header->logo);
            }

            $file = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/header', $filename, 'public');
            $logo_url = app('url')->to('/storage/' . $path);

            $updateData['logo'] = $filename;
            $updateData['logo_url'] = $logo_url;
        }

        Header::where('id', '1')->update($updateData);

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
            'header_about_us_text_eng' => 'required',
        ]);

        $updateData = [
            'header_about_us_text' => $request->header_about_us_text,
            'header_about_us_text_eng' => $request->header_about_us_text_eng,
        ];

        if ($request->hasFile('header_about_us_image')) {
            // Delete old image if exists
            if ($header->header_about_us_image) {
                Storage::disk('public')->delete('images/header/' . $header->header_about_us_image);
            }

            $file = $request->file('header_about_us_image');
            $filename = 'header_about_us_image_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/header', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['header_about_us_image'] = $filename;
            $updateData['header_about_us_image_url'] = $image_url;
        }

        Header::where('id', '1')->update($updateData);

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
            'header_capability_text_eng' => 'required',
        ]);

        $updateData = [
            'header_capability_text' => $request->header_capability_text,
            'header_capability_text_eng' => $request->header_capability_text_eng,
        ];

        if ($request->hasFile('header_capability_image')) {
            // Delete old image if exists
            if ($header->header_capability_image) {
                Storage::disk('public')->delete('images/header/' . $header->header_capability_image);
            }

            $file = $request->file('header_capability_image');
            $filename = 'header_capability_image_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/header', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['header_capability_image'] = $filename;
            $updateData['header_capability_image_url'] = $image_url;
        }

        Header::where('id', '1')->update($updateData);

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
            'header_experience_text_eng' => 'required',
        ]);

        $updateData = [
            'header_experience_text' => $request->header_experience_text,
            'header_experience_text_eng' => $request->header_experience_text_eng,
        ];

        if ($request->hasFile('header_experience_image')) {
            // Delete old image if exists
            if ($header->header_experience_image) {
                Storage::disk('public')->delete('images/header/' . $header->header_experience_image);
            }

            $file = $request->file('header_experience_image');
            $filename = 'header_experience_image_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/header', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['header_experience_image'] = $filename;
            $updateData['header_experience_image_url'] = $image_url;
        }

        Header::where('id', '1')->update($updateData);

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
            'header_contact_us_text_eng' => 'required',
        ]);

        $updateData = [
            'header_contact_us_text' => $request->header_contact_us_text,
            'header_contact_us_text_eng' => $request->header_contact_us_text_eng,
        ];

        if ($request->hasFile('header_contact_us_image')) {
            // Delete old image if exists
            if ($header->header_contact_us_image) {
                Storage::disk('public')->delete('images/header/' . $header->header_contact_us_image);
            }

            $file = $request->file('header_contact_us_image');
            $filename = 'header_contact_us_image_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/header', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['header_contact_us_image'] = $filename;
            $updateData['header_contact_us_image_url'] = $image_url;
        }

        Header::where('id', '1')->update($updateData);

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

        $updateData = [
            'header_mediainvestor_text' => $request->header_mediainvestor_text,
        ];

        if ($request->hasFile('header_mediainvestor_image')) {
            // Delete old image if exists
            if ($header->header_mediainvestor_image) {
                Storage::disk('public')->delete('images/header/' . $header->header_mediainvestor_image);
            }

            $file = $request->file('header_mediainvestor_image');
            $filename = 'header_mediainvestor_image_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/header', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['header_mediainvestor_image'] = $filename;
            $updateData['header_mediainvestor_image_url'] = $image_url;
        }

        Header::where('id', '1')->update($updateData);

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

        $updateData = [
            'header_news_text' => $request->header_news_text,
            'header_news_text_eng' => $request->header_news_text_eng,
        ];

        if ($request->hasFile('header_news_image')) {
            // Delete old image if exists
            if ($header->header_news_image) {
                Storage::disk('public')->delete('images/header/' . $header->header_news_image);
            }

            $file = $request->file('header_news_image');
            $filename = 'header_news_image_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/header', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['header_news_image'] = $filename;
            $updateData['header_news_image_url'] = $image_url;
        }

        Header::where('id', '1')->update($updateData);

        return redirect('header/news')->with('message', 'News Berhasil Diubah');
    }


    function investor()
    {
        $title = 'News';
        $header = Header::find('1');
        return view('header.investor', compact('title', 'header'));
    }

    function investor_update(Request $request)
    {
        $header = Header::find('1');
        $request->validate([
            'header_investor_text' => 'required',
        ]);

        $updateData = [
            'header_investor_text' => $request->header_investor_text,
        ];

        if ($request->hasFile('header_investor_image')) {
            // Delete old image if exists
            if ($header->header_investor_image) {
                Storage::disk('public')->delete('images/header/' . $header->header_investor_image);
            }

            $file = $request->file('header_investor_image');
            $filename = 'header_investor_image_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/header', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['header_investor_image'] = $filename;
            $updateData['header_investor_image_url'] = $image_url;
        }

        Header::where('id', '1')->update($updateData);

        return redirect('header/investor')->with('message', 'Investor Berhasil Diubah');
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

        $updateData = [
            'header_annualreport_text' => $request->header_annualreport_text,
        ];

        if ($request->hasFile('header_annualreport_image')) {
            // Delete old image if exists
            if ($header->header_annualreport_image) {
                Storage::disk('public')->delete('images/header/' . $header->header_annualreport_image);
            }

            $file = $request->file('header_annualreport_image');
            $filename = 'header_annualreport_image_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/header', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['header_annualreport_image'] = $filename;
            $updateData['header_annualreport_image_url'] = $image_url;
        }

        Header::where('id', '1')->update($updateData);

        return redirect('header/annualreport')->with('message', 'Annual Report Berhasil Diubah');
    }
}
