<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InisiasiPengadaanSipilController extends Controller
{
    public function pengadaanSipil(){
        return view('pages/user/inisiasi-pengadaan-sipil/indexInisiasiPengadaan');
    }

    public function dataMaster(){
        return view('pages/user/inisiasi-pengadaan-sipil/indexInisiasiPengadaanDataMaster');
    }
}
