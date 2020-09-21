<?php

namespace App\Http\Controllers;

use App\DataKontrak;
use App\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class InisiasiPengadaanController extends Controller
{
    public function index(){
        if (request()->ajax()) {
            return DataTables::of(Pengadaan::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="detail" id="' . $data->id . '" class="detail btn btn-primary btn-sm">Detail</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="pembayaran" id="' . $data->id . '" class="pembayaran btn btn-warning btn-sm">Pembayaran</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages/user/inisiasi-pengadaan/indexPengadaan');
    }

    public function indexPembayaran(){
        return view('pages/user/inisiasi-pengadaan/indexPembayaranPengadaan');
    }

    public function tambahPengadaan(){
        return view('pages/user/inisiasi-pengadaan/tambahPengadaan');
    }

    public function store(Request $request)
    {
        $rules = array(
            'judul' => 'required',
            'tahun' => 'required',
            'tgl_diterima_panitia' => 'required',
            'bagian' => 'required',
            'fungsi_pembangkit' => 'required',
            'no_undang_pl' => 'required',
            'lingkup_pekerjaan' => 'required',
            'metode_pengadaan' => 'required',
            'jenis_kontrak' => 'required',
            'rencana' => 'required',
            'tempat_penyerahan' => 'required',
            'masa_berlaku_surat' => 'required',
            'cara_pembayaran' => 'required',
            'jenis_perjanjian' => 'required',
            'sumber_dana' => 'required',
            'syarat_bidang' => 'required',
            'vfmc' => 'required',
            'pengguna' => 'required',
            'nip' => 'required',
            'pejabat_pelaksana' => 'required',
            'direksi' => 'required',
            'pengawas' => 'required',
            'ketua_tim' => 'required',
            'pic_pelaksana' => 'required',
            'proses_dokumen' => 'required',
            'nomor' => 'required',
            'jumlah_hari' => 'required',
            'tanggal' => 'required',
            'hari' => 'required',
            'waktu' => 'required',
            'hps' => 'required',
            'no_proses_pengadaan' => 'required',
            'survei_harga_pasar_jumlah' => 'required',
            'survei_harga_pasar_tgl' => 'required',
            'survei_harga_pasar_hari' => 'required',
            'hps_jumlah' => 'required',
            'hps_tgl' => 'required',
            'hps_hari' => 'required',
            'undangan_pengadaan_jumlah' => 'required',
            'undangan_pengadaan_tgl' => 'required',
            'undangan_pengadaan_hari' => 'required',
            'pemasukan_dok_penawaran_jumlah' => 'required',
            'pemasukan_dok_penawaran_tgl' => 'required',
            'pemasukan_dok_penawaran_hari' => 'required',
            'evaluasi_dokumen_jumlah' => 'required',
            'evaluasi_dokumen_tgl' => 'required',
            'evaluasi_dokumen_hari' => 'required',
            'ba_hasil_klarifikasi_jumlah' => 'required',
            'ba_hasil_klarifikasi_tgl' => 'required',
            'ba_hasil_klarifikasi_hari' => 'required',
            'ba_hasil_pengadaan_langsung_jumlah' => 'required',
            'ba_hasil_pengadaan_langsung_tgl' => 'required',
            'ba_hasil_pengadaan_langsung_hari' => 'required',
            'nd_usulan_tetap_pemenang_jumlah' => 'required',
            'nd_usulan_tetap_pemenang_tgl' => 'required',
            'nd_usulan_tetap_pemenang_hari' => 'required',
            'nd_penetapan_pemenang_jumlah' => 'required',
            'nd_penetapan_pemenang_tgl' => 'required',
            'nd_penetapan_pemenang_hari' => 'required',
        );

        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        if (Pengadaan::create($rules)) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['success' => 'Gagal']);
        }


    }
}
