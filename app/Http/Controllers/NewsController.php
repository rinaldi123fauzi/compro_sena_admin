<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    //
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
        $image_url = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'news_' . time() . '.' . $file->getClientOriginalExtension();

            // Store file using storage link
            $path = $file->storeAs('images', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filename,
            'image_url' => $image_url,
            'slug' => Str::slug($request->title),
            'status' => $request->status,
            'featured' => $request->featured ?? 0,

            'title_eng' => $request->title_eng,
            'content_eng' => $request->content_eng,
            'slug_eng' => Str::slug($request->title_eng),

            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,

            'seo_title_eng' => $request->seo_title_eng,
            'seo_description_eng' => $request->seo_description_eng,

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
        $image_url = $news->image_url;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($news->image && Storage::disk('public')->exists('images/' . $news->image)) {
                Storage::disk('public')->delete('images/' . $news->image);
            }

            $file = $request->file('image');
            $filename = 'news_' . time() . '.' . $file->getClientOriginalExtension();

            // Store file using storage link
            $path = $file->storeAs('images', $filename, 'public');
            $image_url = app('url')->to('/storage/' . $path);
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filename,
            'image_url' => $image_url,
            'slug' => Str::slug($request->title),
            'status' => $request->status,
            'featured' => $request->featured ?? 0,

            'title_eng' => $request->title_eng,
            'content_eng' => $request->content_eng,
            'slug_eng' => Str::slug($request->title_eng),

            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,

            'seo_title_eng' => $request->seo_title_eng,
            'seo_description_eng' => $request->seo_description_eng,

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
