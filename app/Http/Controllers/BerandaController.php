<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('pages/user/beranda/indexBeranda');
    }

    public function indexAdmin()
    {
        return view('pages/admin/beranda/indexBeranda');
    }
}
