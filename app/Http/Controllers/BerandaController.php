<?php

namespace App\Http\Controllers;

use App\DatabaseHarga;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $totalProduk = DatabaseHarga::where('status','1')->count();
        return view('pages/user/beranda/indexBeranda', compact('totalProduk'));
    }

    public function indexAdmin()
    {
        return view('pages/admin/beranda/indexBeranda');
    }
}
