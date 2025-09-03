<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    //
    function index()
    {
        return view('berita.index');
    }
    function add()
    {
        $title = 'Tambah Berita';
        return view('berita.add', compact('title'));
    }
}
