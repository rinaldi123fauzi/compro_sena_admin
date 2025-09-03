<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Capability;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index($capability_id)
    {
        $capability = Capability::findOrFail($capability_id);
        $layanans = Layanan::where('capability_id', $capability_id)->orderBy('id', 'desc')->get();
        return view('layanan.index', compact('layanans', 'capability'));
    }

    public function add($capability_id)
    {
        $capability = Capability::findOrFail($capability_id);
        return view('layanan.add', compact('capability'));
    }

    public function store(Request $request, $capability_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:During Construction,Post Operation,Other',
        ]);

        Layanan::create([
            'capability_id' => $capability_id,
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
        ]);

        return redirect()->route('layanan.index', $capability_id)->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit($capability_id, $id)
    {
        $capability = Capability::findOrFail($capability_id);
        $layanan = Layanan::where('capability_id', $capability_id)->findOrFail($id);
        return view('layanan.edit', compact('layanan', 'capability'));
    }

    public function update(Request $request, $capability_id, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:During Construction,Post Operation,Other',
        ]);

        $layanan = Layanan::where('capability_id', $capability_id)->findOrFail($id);
        $layanan->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
        ]);

        return redirect()->route('layanan.index', $capability_id)->with('success', 'Layanan berhasil diupdate!');
    }

    public function destroy($capability_id, $id)
    {
        $layanan = Layanan::where('capability_id', $capability_id)->findOrFail($id);
        $layanan->delete();

        return redirect()->route('layanan.index', $capability_id)->with('success', 'Layanan berhasil dihapus!');
    }
}
