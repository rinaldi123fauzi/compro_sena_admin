<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Spatie\Activitylog\Models\Activity;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    function checklogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 3 characters'
        ]);

        $user_data = array(
            'email' => $request->email,
            'password' => $request->password
        );

        if (Auth::attempt($user_data)) {

            activity('login')
                ->causedBy(Auth::user())
                ->withProperties(['email' => $request->email])
                ->log('USER Login');



            return redirect('dashboard');
        } else {
            return redirect()->back()->withErrors(
                'Email and Password Wrong'
            )->withInput();
        }
    }

    function logout(request $request): RedirectResponse
    {

        $user = Auth::user();

        activity('logout')
            ->causedBy($user)
            ->withProperties(['email' => $user->email])
            ->log('USER Logout');


        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->withHeaders([
            'Cache-Control' => 'no-cache, no-store, max-age=0, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => 'Sat, 01 Jan 2000 00:00:00 GMT',
        ]);
    }
}
