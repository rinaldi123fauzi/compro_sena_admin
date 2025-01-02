<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    //
    protected $uploadPath;

    public function __construct()
    {
        // Inisialisasi di constructor
        $this->uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/image/';
    }
    function index()
    {
        $title = 'Semua Berita';
        $news = News::all();
        return view('news.index', compact('title', 'news'));
    }
    function add()
    {
        $title = 'Tambah Berita';
        return view('news.add', compact('title'));
    }
    function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'news_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filename,
            'slug' => Str::slug($request->title),
            'status' => $request->status,

            'title_en' => $request->title_en,
            'content_en' => $request->content_en,
            'slug_en' => Str::slug($request->title_en),

            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,

            'seo_title_en' => $request->seo_title_en,
            'seo_description_en' => $request->seo_description_en,

            'schedule' => $request->schedule,

            'jenis' => $request->jenis,

        ]);

        return redirect('news/')->with('message', 'Berita Berhasil Ditambahkan');
    }
    function edit($id)
    {
        $title = 'Edit Berita';
        $news = News::find($id);
        return view('news.edit', compact('title', 'news'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $news = News::find($id);

        $filename = $news->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'news_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $filename);
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filename,
            'slug' => Str::slug($request->title),
            'status' => $request->status,

            'title_en' => $request->title_en,
            'content_en' => $request->content_en,
            'slug_en' => Str::slug($request->title_en),

            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,

            'seo_title_en' => $request->seo_title_en,
            'seo_description_en' => $request->seo_description_en,

            'schedule' => $request->schedule,
            'jenis' => $request->jenis,
        ]);

        return redirect('news/edit/' . $id)->with('message', 'Berita Berhasil Diubah');
    }
    function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('news/')->with('message', 'Berita Berhasil Dihapus');
    }
}
