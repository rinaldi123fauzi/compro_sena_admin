<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home_slider;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('template.dashboard');
    }
}
