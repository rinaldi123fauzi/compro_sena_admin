<?php

namespace App\Http\Controllers;

use App\Models\Capability;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CapabilityController extends Controller
{
    public function index()
    {
        $capabilities = Capability::with('layanans')->orderBy('id', 'desc')->get();
        return view('capability.index', compact('capabilities'));
    }

    public function add()
    {
        return view('capability.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filename = null;
        $icon_url = null;

        // Handle file upload
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Store file in storage/app/public/icons directory
            $path = $file->storeAs('public/icons', $filename);

            if (!$path) {
                return redirect()->back()->with('error', 'Gagal mengupload file icon');
            }

            // Generate URL icon otomatis berdasarkan file yang diupload
            $icon_url = app('url')->to('/storage/icons/' . $filename);
        }

        Capability::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $filename,
            'icon_url' => $icon_url,
        ]);

        return redirect()->route('capability.index')->with('success', 'Capability berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $capability = Capability::with('layanans')->findOrFail($id);
        return view('capability.edit', compact('capability'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $capability = Capability::findOrFail($id);

        $filename = $capability->icon; // Keep existing file if no new file uploaded
        $icon_url = $capability->icon_url; // Keep existing URL if no new file uploaded

        // Handle file upload
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Delete old file if exists
            if ($capability->icon && Storage::exists('public/icons/' . $capability->icon)) {
                Storage::delete('public/icons/' . $capability->icon);
            }

            // Store file in storage/app/public/icons directory
            $path = $file->storeAs('public/icons', $filename);

            if (!$path) {
                return redirect()->back()->with('error', 'Gagal mengupload file icon');
            }

            // Generate URL icon otomatis berdasarkan file yang diupload
            $icon_url = app('url')->to('/storage/icons/' . $filename);
        }

        $capability->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $filename,
            'icon_url' => $icon_url,
        ]);

        return redirect()->route('capability.index')->with('success', 'Capability berhasil diupdate!');
    }

    public function destroy($id)
    {
        $capability = Capability::findOrFail($id);

        // Delete icon file if exists
        if ($capability->icon && Storage::exists('public/icons/' . $capability->icon)) {
            Storage::delete('public/icons/' . $capability->icon);
        }

        $capability->delete();

        return redirect()->route('capability.index')->with('success', 'Capability berhasil dihapus!');
    }

    // Software Title Functions
    function editsoftwaretitle()
    {
        $title = 'Edit Software Title';
        $titles = Title::where('id', 10)->first();

        // Jika data dengan ID 10 tidak ada, buat data baru
        if (!$titles) {
            $titles = Title::create([
                'id' => 10,
                'texttitle' => 'Software',
                'textsubtitle' => '',
                'textdeskripsi' => '',
                'texttitle_eng' => 'Software',
                'textsubtitle_eng' => '',
                'textdeskripsi_eng' => '',
            ]);
        }

        return view('capability.software.edittitle', compact('title', 'titles'));
    }

    function updatesoftwaretitle(Request $request)
    {
        $request->validate([
            'texttitle' => 'required',
        ], [
            'texttitle.required' => 'Title tidak boleh kosong',
        ]);

        $titles = Title::where('id', 10)->first();

        if (!$titles) {
            // Jika tidak ada, buat baru
            Title::create([
                'texttitle' => $request->texttitle,
                'textsubtitle' => $request->textsubtitle,
                'textdeskripsi' => $request->textdeskripsi,
                'texttitle_eng' => $request->texttitle_eng,
                'textsubtitle_eng' => $request->textsubtitle_eng,
                'textdeskripsi_eng' => $request->textdeskripsi_eng,
            ]);
        } else {
            // Update data yang ada
            $titles->update([
                'texttitle' => $request->texttitle,
                'textsubtitle' => $request->textsubtitle,
                'textdeskripsi' => $request->textdeskripsi,
                'texttitle_eng' => $request->texttitle_eng,
                'textsubtitle_eng' => $request->textsubtitle_eng,
                'textdeskripsi_eng' => $request->textdeskripsi_eng,
            ]);
        }

        return redirect('capability/editsoftwaretitle')->with('message', 'Software Title berhasil diupdate');
    }

    // Tools Title Functions
    function edittoolstitle()
    {
        $title = 'Edit Tools Title';
        $titles = Title::where('id', 11)->first();

        // Jika data dengan ID 11 tidak ada, buat data baru
        if (!$titles) {
            $titles = Title::create([
                'id' => 11,
                'texttitle' => 'Tools & Equipment',
                'textsubtitle' => '',
                'textdeskripsi' => '',
                'texttitle_eng' => 'Tools & Equipment',
                'textsubtitle_eng' => '',
                'textdeskripsi_eng' => '',
            ]);
        }

        return view('capability.tools.edittitle', compact('title', 'titles'));
    }

    function updatetoolstitle(Request $request)
    {
        $request->validate([
            'texttitle' => 'required',
        ], [
            'texttitle.required' => 'Title tidak boleh kosong',
        ]);

        $titles = Title::where('id', 11)->first();

        if (!$titles) {
            // Jika tidak ada, buat baru
            Title::create([
                'texttitle' => $request->texttitle,
                'textsubtitle' => $request->textsubtitle,
                'textdeskripsi' => $request->textdeskripsi,
                'texttitle_eng' => $request->texttitle_eng,
                'textsubtitle_eng' => $request->textsubtitle_eng,
                'textdeskripsi_eng' => $request->textdeskripsi_eng,
            ]);
        } else {
            // Update data yang ada
            $titles->update([
                'texttitle' => $request->texttitle,
                'textsubtitle' => $request->textsubtitle,
                'textdeskripsi' => $request->textdeskripsi,
                'texttitle_eng' => $request->texttitle_eng,
                'textsubtitle_eng' => $request->textsubtitle_eng,
                'textdeskripsi_eng' => $request->textdeskripsi_eng,
            ]);
        }

        return redirect('capability/edittoolstitle')->with('message', 'Tools Title berhasil diupdate');
    }
}
