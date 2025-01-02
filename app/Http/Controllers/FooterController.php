<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

use Spatie\Activitylog\Models\Activity;



class FooterController extends Controller
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
        $title = 'Footer';
        $footer = Footer::find('1');
        return view('footer.edit', compact('title', 'footer'));
    }

    function update(Request $request)
    {
        $footer = Footer::find('1');


        $filename = $footer->image_member_of;
        if ($request->hasFile('image_member_of')) {
            $file = $request->file('image_member_of');
            $filename = 'image_member_of_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        $filename2 = $footer->image_subsidiary_of;
        if ($request->hasFile('image_subsidiary_of')) {
            $file = $request->file('image_subsidiary_of');
            $filename2 = 'image_subsidiary_of_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename2);
        }

        $filename3 = $footer->image_footer;
        if ($request->hasFile('image_footer')) {
            $file = $request->file('image_footer');
            $filename3 = 'image_footer_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename3);
        }

        $filename4 = $footer->logo_footer;
        if ($request->hasFile('logo_footer')) {
            $file = $request->file('logo_footer');
            $filename4 = 'logo_footer_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename4);
        }


        Footer::where('id', '1')->first()?->update([
            'nama_pt' => $request->nama_pt,
            'alamat_pt' => $request->alamat_pt,
            'copyright' => $request->copyright,
            'image_member_of' => $filename,
            'image_subsidiary_of' => $filename2,
            'image_footer' => $filename3,
            'logo_footer' => $filename4,


            'instagram_link' => $request->instagram_link,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'linkedin_link' => $request->linkedin_link,
            'youtube_link' => $request->youtube_link,
        ]);

        return redirect('footer/edit')->with('message', 'Footer Berhasil Diubah');
    }
}
