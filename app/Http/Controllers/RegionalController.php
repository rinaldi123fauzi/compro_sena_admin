<?php

namespace App\Http\Controllers;

use App\Models\Regional;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RegionalController extends Controller
{
    function list()
    {
        $title = 'Daftar Regional';
        $regionals = Regional::all();
        return view('regional.list', compact('regionals', 'title'));
    }
    function add()
    {
        return view('regional.add', ['title' => 'Tambah Regional']);
    }
    function store(Request $request): RedirectResponse
    {
        $request->validate([
            'namaregional' => 'required',
            'koderegional' => 'required|unique:regional',
        ], [
            'namaregional.required' => 'Nama Regional tidak boleh kosong',
            'koderegional.required' => 'Kode Regional tidak boleh kosong',
            'koderegional.unique' => 'Kode Regional sudah ada'
        ]);
        Regional::create($request->all());

        return redirect('regional/add')->with('message', 'Regional berhasil ditambahkan');
    }

    function edit(string $id)
    {
        //dd(compact('vendor'));
        $title = 'Edit Regional';
        $regional = Regional::findOrFail($id);
        return view('regional.edit', compact('regional', 'title'));
    }
    function update(Request $request, $id)
    {


        $regional = Regional::findOrFail($id);

        if ($regional->koderegional == $request->koderegional) {
            $request->validate([
                'namaregional' => 'required',
            ], [
                'namaregional.required' => 'Nama Regional tidak boleh kosong',
            ]);
            $regional = Regional::findOrFail($id);
            $regional->update([
                'namaregional'         => $request->namaregional,
            ]);
            return redirect('regional/edit/' . $id)->with('message', 'Regional berhasil diubah');
        } else {
            $request->validate([
                'namaregional' => 'required',
                'koderegional' => 'required|unique:regional',
            ], [
                'namaregional.required' => 'Nama Regional tidak boleh kosong',
                'koderegional.required' => 'Kode Regional tidak boleh kosong',
                'koderegional.unique' => 'Kode Regional sudah ada'
            ]);

            $regional = regional::findOrFail($id);
            $regional->update([
                'namaregional'         => $request->namaregional,
                'koderegional'   => $request->koderegional,
            ]);
            // return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
            return redirect('regional/edit/' . $id)->with('message', 'Regional berhasil diubah');
        }
    }

    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $regional = Regional::findOrFail($id);
        //delete product
        $regional->delete();
        //redirect to index
        return redirect()->route('regional.list')->with(['message' => 'Data Berhasil Dihapus!']);
    }
}
