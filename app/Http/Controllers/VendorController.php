<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class VendorController extends Controller
{
    //
    function list()
    {
        $title = 'Daftar Vendor';
        $vendors = Vendor::all();
        return view('vendor.list', compact('vendors', 'title'));
    }

    function add()
    {
        return view('vendor.add', ['title' => 'Tambah Vendor']);
    }

    function store(Request $request): RedirectResponse
    {
        $request->validate([
            'namavendor' => 'required',
            'kodevendor' => 'required|unique:vendor',
        ], [
            'namavendor.required' => 'Nama Vendor tidak boleh kosong',
            'kodevendor.required' => 'Kode Vendor tidak boleh kosong',
            'kodevendor.unique' => 'Kode Vendor sudah ada'
        ]);
        Vendor::create($request->all());

        return redirect('vendor/add')->with('message', 'Vendor berhasil ditambahkan');
    }


    function edit(string $id)
    {
        //dd(compact('vendor'));
        $title = 'Edit Vendor';
        $vendor = Vendor::findOrFail($id);
        return view('vendor.edit', compact('vendor', 'title'));
    }




    function update(Request $request, $id)
    {


        $vendor = Vendor::findOrFail($id);

        if ($vendor->kodevendor == $request->kodevendor) {
            $request->validate([
                'namavendor' => 'required',
            ], [
                'namavendor.required' => 'Nama Vendor tidak boleh kosong',
            ]);
            $vendor = Vendor::findOrFail($id);
            $vendor->update([
                'namavendor'         => $request->namavendor,
            ]);
            return redirect('vendor/edit/' . $id)->with('message', 'Vendor berhasil diubah');
        } else {
            $request->validate([
                'namavendor' => 'required',
                'kodevendor' => 'required|unique:vendor',
            ], [
                'namavendor.required' => 'Nama Vendor tidak boleh kosong',
                'kodevendor.required' => 'Kode Vendor tidak boleh kosong',
                'kodevendor.unique' => 'Kode Vendor sudah ada'
            ]);

            $vendor = Vendor::findOrFail($id);
            $vendor->update([
                'namavendor'         => $request->namavendor,
                'kodevendor'   => $request->kodevendor,
            ]);
            // return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
            return redirect('vendor/edit/' . $id)->with('message', 'Vendor berhasil diubah');
        }
    }

    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $vendor = Vendor::findOrFail($id);
        //delete product
        $vendor->delete();
        //redirect to index
        return redirect()->route('vendor.list')->with(['message' => 'Data Berhasil Dihapus!']);
    }
}
