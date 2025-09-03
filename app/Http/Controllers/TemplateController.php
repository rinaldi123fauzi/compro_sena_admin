<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TemplateController extends Controller
{
    //

    public function login()
    {
        return view('login');
    }

    public function dashboard()
    {
        return view('template.dashboard');
    }

    public function user()
    {
        $title = 'Semua User';
        return view('template.userlist', compact('title'));
    }
    public function adduser()
    {
        $title = 'Tambah User';
        return view('template.useradd', compact('title'));
    }



    public function addnews()
    {
        $title = 'Tambah Berita';
        return view('template.newsadd', compact('title'));
    }

    function homepage()
    {
        $title = 'Home Page';
        return view('template.homepage', compact('title'));
    }
}
