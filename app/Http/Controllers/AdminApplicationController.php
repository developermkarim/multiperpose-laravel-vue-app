<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminApplicationController extends Controller
{
/*     //
    public function dashboard()
    {
        return view('admin.dashboard');
    } */
    public function __invoke()
    {
        return view('admin.layouts.app');
    }
}
