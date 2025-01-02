<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Add this line


class UserController extends Controller
{
    //
    function index()
    {
        $title = 'Semua User';
        $users = User::all();
        return view('user.list', compact('title', 'users'));
    }
    function add()
    {
        $title = 'Tambah User';
        return view('user.add', compact('title'));
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nip' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'password2' => 'required|same:password'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nip' => $request->nip,
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        return redirect('user/')->with('message', 'User Berhasil Ditambahkan');
    }
    function edit($id)
    {
        $title = 'Edit User';
        $user = User::find($id);
        return view('user.edit', compact('title', 'user'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);
        $updateData = [
            'name' => $request->name,
            'phone' => $request->phone,
            'nip' => $request->nip,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if (!empty($request->password)) {
            $updateData['password'] = Hash::make($request->password);
        }
        $user->update($updateData);

        return redirect('user/')->with('message', 'User Berhasil Diubah');
    }

    function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user/')->with('message', 'User Berhasil Dihapus');
    }
}
