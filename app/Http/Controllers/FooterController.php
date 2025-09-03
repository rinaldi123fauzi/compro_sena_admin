<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Support\Facades\Storage;

use Spatie\Activitylog\Models\Activity;



class FooterController extends Controller
{
    // Remove upload path as we'll use Laravel Storage
    public function __construct()
    {
        // No longer needed with Storage facade
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

        $updateData = [
            'nama_pt' => $request->nama_pt,
            'alamat_pt' => $request->alamat_pt,
            'copyright' => $request->copyright,
            'instagram_link' => $request->instagram_link,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'linkedin_link' => $request->linkedin_link,
            'youtube_link' => $request->youtube_link,
        ];

        // Handle image_member_of upload
        if ($request->hasFile('image_member_of')) {
            // Delete old image if exists
            if ($footer->image_member_of) {
                Storage::disk('public')->delete('images/footer/' . $footer->image_member_of);
            }

            $file = $request->file('image_member_of');
            $filename = 'image_member_of_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/footer', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['image_member_of'] = $filename;
            $updateData['image_member_of_url'] = $image_url;
        }

        // Handle image_subsidiary_of upload
        if ($request->hasFile('image_subsidiary_of')) {
            // Delete old image if exists
            if ($footer->image_subsidiary_of) {
                Storage::disk('public')->delete('images/footer/' . $footer->image_subsidiary_of);
            }

            $file = $request->file('image_subsidiary_of');
            $filename = 'image_subsidiary_of_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/footer', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['image_subsidiary_of'] = $filename;
            $updateData['image_subsidiary_of_url'] = $image_url;
        }

        // Handle image_footer upload
        if ($request->hasFile('image_footer')) {
            // Delete old image if exists
            if ($footer->image_footer) {
                Storage::disk('public')->delete('images/footer/' . $footer->image_footer);
            }

            $file = $request->file('image_footer');
            $filename = 'image_footer_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/footer', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['image_footer'] = $filename;
            $updateData['image_footer_url'] = $image_url;
        }

        // Handle logo_footer upload
        if ($request->hasFile('logo_footer')) {
            // Delete old logo if exists
            if ($footer->logo_footer) {
                Storage::disk('public')->delete('images/footer/' . $footer->logo_footer);
            }

            $file = $request->file('logo_footer');
            $filename = 'logo_footer_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/footer', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);

            $updateData['logo_footer'] = $filename;
            $updateData['logo_footer_url'] = $image_url;
        }

        Footer::where('id', '1')->first()?->update($updateData);

        return redirect('footer/edit')->with('message', 'Footer Berhasil Diubah');
    }
}
