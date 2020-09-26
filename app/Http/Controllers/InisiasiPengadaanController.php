<?php

namespace App\Http\Controllers;

use App\DatabaseHarga;
use App\DataKontrak;
use App\Http\Controllers\Template\BeritaAcaraPengadaanLangsung;
use App\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class InisiasiPengadaanController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Pengadaan::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="detail" id="' . $data->id . '" class="detail btn btn-primary btn-sm">Detail</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="update-data/' . $data->id . '" class="detail btn btn-info btn-sm">Update</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="pembayaran" id="' . $data->id . '" class="pembayaran btn btn-warning btn-sm">Pembayaran</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages/user/inisiasi-pengadaan/indexPengadaan');
    }

    public function tesWord(Request $request){
        $surveiHarga = new SurveyHargaPasar();
        $surveiHarga->SurveiHargaPasar($request->nama,$request->nomor,$request->judul,$request->pejabatPelaksan,$request->disusunOleh,$request->hari);
    }

    public function tesWordBAPL(Request $request){
        $surveiHarga = new BeritaAcaraPengadaanLangsung();
        $surveiHarga->BeritaAcaraPengadaanLangsung($request->nama,$request->nomor,$request->judul,$request->pejabatPelaksan,$request->disusunOleh,$request->hari);
    }

    public function indexUpdateView(Request $request)
    {
        $dataPengadaan = Pengadaan::where('id', $request->id)->first();
        return view('pages/user/inisiasi-pengadaan/updatePengadaan', compact('dataPengadaan'));
    }

    public function indexPembayaran()
    {
        return view('pages/user/inisiasi-pengadaan/indexPembayaranPengadaan');
    }

    public function tambahPengadaan()
    {
        return view('pages/user/inisiasi-pengadaan/tambahPengadaan');
    }

    public function updateData(Request $request)
    {
        $rules = array(
            'judul' => 'required',
            'tahun' => 'required',
            'tanggal_diterima_panitia' => 'required',
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
            'masa_garansi' => 'required',
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
        );


        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'judul' => $request->judul,
            'tahun' => $request->tahun,
            'tgl_diterima_panitia' => $request->tanggal_diterima_panitia,
            'bagian' => $request->bagian,
            'fungsi_pembangkit' => $request->fungsi_pembangkit,
            'no_undang_pl' => $request->no_undang_pl,
            'lingkup_pekerjaan' => $request->lingkup_pekerjaan,
            'metode_pengadaan' => $request->metode_pengadaan,
            'jenis_kontrak' => $request->jenis_kontrak,
            'rencana' => $request->rencana,
            'tempat_penyerahan' => $request->tempat_penyerahan,
            'masa_berlaku_surat' => $request->masa_berlaku_surat,
            'cara_pembayaran' => $request->cara_pembayaran,
            'jenis_perjanjian' => $request->jenis_perjanjian,
            'sumber_dana' => $request->sumber_dana,
            'masa_garansi' => $request->masa_garansi,
            'syarat_bidang' => $request->syarat_bidang,
            'vfmc' => $request->vfmc,
            'pengguna' => $request->pengguna,
            'nip' => $request->nip,
            'pejabat_pelaksana' => $request->pejabat_pelaksana,
            'direksi' => $request->direksi,
            'pengawas' => $request->pengawas,
            'ketua_tim' => $request->ketua_tim,
            'pic_pelaksana' => $request->pic_pelaksana,
            'proses_dokumen' => $request->proses_dokumen,
            'nomor' => $request->nomor,
            'jumlah_hari' => $request->jumlah_hari,
            'tanggal' => $request->tanggal,
            'hari' => $request->hari,
            'waktu' => $request->waktu,
            'hps' => $request->hps,
            'no_proses_pengadaan' => $request->no_proses_pengadaan,
            'survei_harga_pasar_jumlah' => $request->survey_harga_pasar_jumlah,
            'survei_harga_pasar_tgl' => $request->survey_harga_pasar_tgl,
            'survei_harga_pasar_hari' => $request->survey_harga_pasar_hari,
            'hps_jumlah' => $request->hps_jumlah,
            'hps_tgl' => $request->hps_tgl,
            'hps_hari' => $request->hps_hari,
            'undangan_pengadaan_langsung_jumlah' => $request->undangan_pengadaan_langsung_jumlah,
            'undangan_pengadaan_langsung_tgl' => $request->undangan_pengadaan_langsung_tgl,
            'undangan_pengadaan_langsung_hari' => $request->undangan_pengadaan_langsung_hari,
            'pemasukan_dok_penawaran_jumlah' => $request->pemasukan_dok_penawaran_jumlah,
            'pemasukan_dok_penawaran_tgl' => $request->pemasukan_dok_penawaran_tgl,
            'pemasukan_dok_penawaran_hari' => $request->pemasukan_dok_penawaran_hari,
            'evaluasi_dokumen_jumlah' => $request->evaluasi_dokumen_jumlah,
            'evaluasi_dokumen_tgl' => $request->evaluasi_dokumen_tgl,
            'evaluasi_dokumen_hari' => $request->evaluasi_dokumen_hari,
            'ba_hasil_klarifikasi_jumlah' => $request->ba_hasil_klarifikasi_jumlah,
            'ba_hasil_klarifikasi_tgl' => $request->ba_hasil_klarifikasi_tgl,
            'ba_hasil_klarifikasi_hari' => $request->ba_hasil_klarifikasi_hari,
            'ba_hasil_pengadaan_jumlah' => $request->ba_hasil_pengadaan_jumlah,
            'ba_hasil_pengadaan_tgl' => $request->ba_hasil_pengadaan_tgl,
            'ba_hasil_pengadaan_hari' => $request->ba_hasil_pengadaan_hari,
            'nd_usulan_tetap_pemenang_jumlah' => $request->nd_usulan_tetap_pemenang_jumlah,
            'nd_usulan_tetap_pemenang_tgl' => $request->nd_usulan_tetap_pemenang_tgl,
            'nd_usulan_tetap_pemenang_hari' => $request->nd_usulan_tetap_pemenang_hari,
            'nd_penetapan_pemenang_jumlah' => $request->nd_penetapan_pemenang_jumlah,
            'nd_penetapan_pemenang_tgl' => $request->nd_penetapan_pemenang_tgl,
            'nd_penetapan_pemenang_hari' => $request->nd_penetapan_pemenang_hari,
        );

        if (Pengadaan::whereId($request->id)->update($form_data)) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['success' => 'Gagal']);
        }
    }

    public function store(Request $request)
    {
        $rules = array(
            'judul' => 'required',
            'tahun' => 'required',
            'tanggal_diterima_panitia' => 'required',
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
            'masa_garansi' => 'required',
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
        );


        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $pengadaan = new Pengadaan();

        $pengadaan->judul = $request->judul;
        $pengadaan->tahun = $request->tahun;
        $pengadaan->tgl_diterima_panitia = $request->tanggal_diterima_panitia;
        $pengadaan->bagian = $request->bagian;
        $pengadaan->fungsi_pembangkit = $request->fungsi_pembangkit;
        $pengadaan->no_undang_pl = $request->no_undang_pl;
        $pengadaan->lingkup_pekerjaan = $request->lingkup_pekerjaan;
        $pengadaan->metode_pengadaan = $request->metode_pengadaan;
        $pengadaan->jenis_kontrak = $request->jenis_kontrak;
        $pengadaan->rencana = $request->rencana;
        $pengadaan->tempat_penyerahan = $request->tempat_penyerahan;
        $pengadaan->masa_berlaku_surat = $request->masa_berlaku_surat;
        $pengadaan->cara_pembayaran = $request->cara_pembayaran;
        $pengadaan->jenis_perjanjian = $request->jenis_perjanjian;
        $pengadaan->sumber_dana = $request->sumber_dana;
        $pengadaan->syarat_bidang = $request->syarat_bidang;
        $pengadaan->vfmc = $request->vfmc;
        $pengadaan->pengguna = $request->pengguna;
        $pengadaan->nip = $request->nip;
        $pengadaan->pejabat_pelaksana = $request->pejabat_pelaksana;
        $pengadaan->direksi = $request->direksi;
        $pengadaan->pengawas = $request->pengawas;
        $pengadaan->ketua_tim = $request->ketua_tim;
        $pengadaan->pic_pelaksana = $request->pic_pelaksana;
        $pengadaan->proses_dokumen = $request->proses_dokumen;
        $pengadaan->nomor = $request->nomor;
        $pengadaan->jumlah_hari = $request->jumlah_hari;
        $pengadaan->tanggal = $request->tanggal;
        $pengadaan->hari = $request->hari;
        $pengadaan->waktu = $request->waktu;
        $pengadaan->hps = $request->hps;
        $pengadaan->no_proses_pengadaan = $request->no_proses_pengadaan;

        if ($request->survey_harga_pasar_tgl) {
            $pengadaan->survei_harga_pasar_jumlah = $request->survey_harga_pasar_jumlah;
            $pengadaan->survei_harga_pasar_tgl = $request->survey_harga_pasar_tgl;
            $pengadaan->survei_harga_pasar_hari = $request->survey_harga_pasar_hari;
        }

        if ($request->hps_tgl) {
            $pengadaan->hps_jumlah = $request->hps_jumlah;
            $pengadaan->hps_tgl = $request->hps_tgl;
            $pengadaan->hps_hari = $request->hps_hari;
        }

        if ($request->undangan_pengadaan_langsung_tgl) {
            $pengadaan->undangan_pengadaan_langsung_jumlah = $request->undangan_pengadaan_langsung_jumlah;
            $pengadaan->undangan_pengadaan_langsung_tgl = $request->undangan_pengadaan_langsung_tgl;
            $pengadaan->undangan_pengadaan_langsung_hari = $request->undangan_pengadaan_langsung_hari;
        }
        if ($request->pemasukan_dok_penawaran_tgl) {
            $pengadaan->pemasukan_dok_penawaran_jumlah = $request->pemasukan_dok_penawaran_jumlah;
            $pengadaan->pemasukan_dok_penawaran_tgl = $request->pemasukan_dok_penawaran_tgl;
            $pengadaan->pemasukan_dok_penawaran_hari = $request->pemasukan_dok_penawaran_hari;
        }

        if ($request->evaluasi_dokumen_tgl) {
            $pengadaan->evaluasi_dokumen_jumlah = $request->evaluasi_dokumen_jumlah;
            $pengadaan->evaluasi_dokumen_tgl = $request->evaluasi_dokumen_tgl;
            $pengadaan->evaluasi_dokumen_hari = $request->evaluasi_dokumen_hari;
        }

        if ($request->ba_hasil_klarifikasi_tgl) {
            $pengadaan->ba_hasil_klarifikasi_jumlah = $request->ba_hasil_klarifikasi_jumlah;
            $pengadaan->ba_hasil_klarifikasi_tgl = $request->ba_hasil_klarifikasi_tgl;
            $pengadaan->ba_hasil_klarifikasi_hari = $request->ba_hasil_klarifikasi_hari;
        }

        if ($request->ba_hasil_pengadaan_tgl) {
            $pengadaan->ba_hasil_pengadaan_jumlah = $request->ba_hasil_pengadaan_jumlah;
            $pengadaan->ba_hasil_pengadaan_tgl = $request->ba_hasil_pengadaan_tgl;
            $pengadaan->ba_hasil_pengadaan_hari = $request->ba_hasil_pengadaan_hari;
        }

        if ($request->nd_usulan_tetap_pemenang_tgl) {
            $pengadaan->nd_usulan_tetap_pemenang_jumlah = $request->nd_usulan_tetap_pemenang_jumlah;
            $pengadaan->nd_usulan_tetap_pemenang_tgl = $request->nd_usulan_tetap_pemenang_tgl;
            $pengadaan->nd_usulan_tetap_pemenang_hari = $request->nd_usulan_tetap_pemenang_hari;
        }

        if ($request->nd_penetapan_pemenang_tgl) {
            $pengadaan->nd_penetapan_pemenang_jumlah = $request->nd_penetapan_pemenang_jumlah;
            $pengadaan->nd_penetapan_pemenang_tgl = $request->nd_penetapan_pemenang_tgl;
            $pengadaan->nd_penetapan_pemenang_hari = $request->nd_penetapan_pemenang_hari;
        }

        if ($pengadaan->save()) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['success' => 'Gagal']);
        }


    }
}
