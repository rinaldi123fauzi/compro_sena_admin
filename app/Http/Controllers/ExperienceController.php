<?php

namespace App\Http\Controllers;

use App\Models\Title;

use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    //

    function section1()
    {
        $title = 'Edit Section Map';
        $titles = Title::where('id', 4)->first();
        return view('experience.edittitle', compact('title', 'titles'));
    }
    function updatesection1(Request $request)
    {
        $titles = Title::where('id', 4)->first();
        $titles->update($request->all());
        return redirect('experience/section1')->with('message', 'Section 1 berhasil diupdate');
    }

    function section2()
    {
        $title = 'Edit Section Kategori';
        $titles = Title::where('id', 5)->first();
        return view('experience.edittitle2', compact('title', 'titles'));
    }
    function updatesection2(Request $request)
    {
        $titles = Title::where('id', 5)->first();
        $titles->update($request->all());
        return redirect('experience/section2')->with('message', 'Section 2 berhasil diupdate');
    }

    function section3()
    {
        $title = 'Edit Section Client';
        $titles = Title::where('id', 6)->first();
        return view('experience.edittitle3', compact('title', 'titles'));
    }
    function updatesection3(Request $request)
    {
        $titles = Title::where('id', 6)->first();
        $titles->update($request->all());
        return redirect('experience/section3')->with('message', 'Section 3 berhasil diupdate');
    }
}
