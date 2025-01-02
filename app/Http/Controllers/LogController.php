<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    function index()
    {
        $title = 'Semua Log';
        $logs = \Spatie\Activitylog\Models\Activity::orderBy('created_at', 'desc')->get();
        return view('log.index', compact('title', 'logs'));
    }
}
