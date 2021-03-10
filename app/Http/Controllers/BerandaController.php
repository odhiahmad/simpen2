<?php

namespace App\Http\Controllers;

use App\DatabaseHarga;
use App\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $data = Pengadaan::select([
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
            DB::raw('COUNT(id) as invoices'),
            DB::raw('SUM(nilai_kontrak) as kontrak'),
            DB::raw('SUM(rab) as rab')
        ])
            ->groupBy('month')
            ->get();
        $totalProduk = DatabaseHarga::where('status', '1')->count();
        $totalProses = Pengadaan::where('status', 'PROSES')->count();
        $totalTerkontrak = Pengadaan::sum('nilai_kontrak');;
        $totalRab = Pengadaan::sum('rab');

//        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
//            ->get();


        if ($request->ajax()) {
            return $data;

        }
        return view('pages/user/beranda/indexBeranda', compact(['totalProduk', 'totalRab', 'totalProses', 'totalTerkontrak', 'data']));
    }

    public function indexAdmin()
    {
        return view('pages/admin/beranda/indexBeranda');
    }
}
