<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Template\BeritaAcaraPengadaanLangsung;
use App\Http\Controllers\Template\EvaluasiDokumen\DaftarHadirDokPenawaran;
use App\Http\Controllers\Template\EvaluasiDokumen\EvaluasiDokumenPenawaran;
use App\Http\Controllers\Template\EvaluasiDokumen\PemasukanDokPenawaran;
use App\Http\Controllers\Template\HasilKlarifikasi\DaftarHadirNego;
use App\Http\Controllers\Template\HasilKlarifikasi\DaftarHadirPembuktianKualifikasi;
use App\Http\Controllers\Template\HasilKlarifikasi\EvaluasiPembuktianKualifikasi;
use App\Http\Controllers\Template\HasilPengadaan\DaftarHadirPengadaanLangsung;
use App\Http\Controllers\Template\HasilPengadaan\HasilPengadaanLangsung;
use App\Http\Controllers\Template\HPS;
use App\Http\Controllers\Template\SurveyHargaPasar\SurveiHargaPasar1;
use App\Http\Controllers\Template\SurveyHargaPasar\SurveyHargaPasar1;
use App\Http\Controllers\Template\UndanganPengadaanLangsung;
use App\Http\Controllers\Template\UsulanPenetapanPemenang;
use App\ModelsResource\DBagian;
use App\ModelsResource\DCaraPembayaran;
use App\ModelsResource\DFungsiPembangkit;
use App\ModelsResource\DJenis;
use App\ModelsResource\DMasaBerlaku;
use App\ModelsResource\DMasaGaransi;
use App\ModelsResource\DMetodePengadaan;
use App\ModelsResource\DPengawas;
use App\ModelsResource\DPerjanjianKontrak;
use App\ModelsResource\DPicPelaksana;
use App\ModelsResource\DStatus;
use App\ModelsResource\DSumberDana;
use App\ModelsResource\DSyaratBidangUsaha;
use App\ModelsResource\DTempatPenyerahan;
use App\ModelsResource\DVfmc;
use App\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages/user/inisiasi-pengadaan/indexPengadaan');
    }

    public function downloadShp1($id)
    {
        $surveiHarga = new SurveiHargaPasar1();
        $surveiHarga->SurveyHargaPasar1($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/survei-harga-pasar/" . $data->judul . '.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadShp2($id)
    {
        $surveiHarga = new SurveiHargaPasar1();
        $surveiHarga->SurveyHargaPasar2($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/survei-harga-pasar/" . $data->judul . '2.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadHps($id)
    {
        $surveiHarga = new HPS();
        $surveiHarga->HPS($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hps/" . $data->judul . '.xlsx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadUplh($id)
    {
        $surveiHarga = new UndanganPengadaanLangsung();
        $surveiHarga->UndanganPengadaanLangsung($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/undangan-pengadaan-langsung/" . $data->judul . $data->id . '.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadEvaluasiDokumen1($id)
    {
        $surveiHarga = new PemasukanDokPenawaran();
        $surveiHarga->PemasukanDokPenawaran($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/evaluasi-dokumen/" . $data->judul . $data->id . '1.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadEvaluasiDokumen2($id)
    {
        $surveiHarga = new EvaluasiDokumenPenawaran();
        $surveiHarga->EvaluasiDokumenPenawaran($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/evaluasi-dokumen/" . $data->judul . $data->id . '2.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadEvaluasiDokumen3($id)
    {
        $surveiHarga = new DaftarHadirDokPenawaran();
        $surveiHarga->DaftarHadirDokPenawaran($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/evaluasi-dokumen/" . $data->judul . $data->id . '3.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadNdPenetapan($id){
        $surveiHarga = new UsulanPenetapanPemenang();
        $surveiHarga->UsulanPenetapanPemenang($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/usulan-penetapan-pemenang/" . $data->judul . '.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadHasilPengadaan1($id){
        $surveiHarga = new HasilPengadaanLangsung();
        $surveiHarga->HasilPengadaanLangsung($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hasil-pengadaan-langsung/" . $data->judul . 'hasil-pengadaan-langsung.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadHasilPengadaan2($id){
        $surveiHarga = new DaftarHadirPengadaanLangsung();
        $surveiHarga->DaftarHadir($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hasil-pengadaan-langsung/" . $data->judul.'.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadHasilKlarifikasi1($id){
        $surveiHarga = new EvaluasiPembuktianKualifikasi();
        $surveiHarga->EvaluasiPembuktianKualifikasi($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hasil-klarifikasi/" . $data->judul.'1.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadHasilKlarifikasi2($id){
        $surveiHarga = new DaftarHadirPembuktianKualifikasi();
        $surveiHarga->DaftarHadirPembuktianKualifikasi($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hasil-klarifikasi/" . $data->judul.'2.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadHasilKlarifikasi3($id){
        $surveiHarga = new DaftarHadirPengadaanLangsung();
        $surveiHarga->DaftarHadir($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hasil-klarifikasi/" . $data->judul.'3.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }

    public function downloadHasilKlarifikasi4($id){
        $surveiHarga = new DaftarHadirNego();
        $surveiHarga->DaftarHadirNego($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hasil-klarifikasi/" . $data->judul.'4.docx';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data->judul, $headers);
    }





    public function indexUpdateView(Request $request)
    {
        $dataPengadaan = Pengadaan::where('id', $request->id)->first();
        $dataBagian = DBagian::all();
        $dataCaraPembayaran = DCaraPembayaran::all();
        $dataFungsiPembangkit = DFungsiPembangkit::all();
        $dataJenis = DJenis::all();
        $dataMasaBerlaku = DMasaBerlaku::all();
        $dataMasaGaransi = DMasaGaransi::all();
        $dataMetodePengadaan = DMetodePengadaan::all();
        $dataPengawas = DPengawas::all();
        $dataPerjanjianKontrak = DPerjanjianKontrak::all();
        $dataPicPelaksana = DPicPelaksana::all();
        $dataSumberDana = DSumberDana::all();
        $dataSyaratBidangUsaha = DSyaratBidangUsaha::all();
        $dataTempatPenyerahan = DTempatPenyerahan::all();
        $dataVfmc = DVfmc::all();
        $dataStatus = DStatus::all();
        return view('pages/user/inisiasi-pengadaan/updatePengadaan', compact([
            'dataPengadaan',
            'dataBagian',
            'dataCaraPembayaran',
            'dataFungsiPembangkit',
            'dataJenis',
            'dataMasaBerlaku',
            'dataMasaGaransi',
            'dataMetodePengadaan',
            'dataPengawas',
            'dataPerjanjianKontrak',
            'dataPicPelaksana',
            'dataSumberDana',
            'dataSyaratBidangUsaha',
            'dataTempatPenyerahan',
            'dataVfmc',
            'dataStatus'
        ]));
    }

    public function indexPembayaran()
    {
        return view('pages/user/inisiasi-pengadaan/indexPembayaranPengadaan');
    }

    public function tambahPengadaan()
    {
        $dataBagian = DBagian::all();
        $dataCaraPembayaran = DCaraPembayaran::all();
        $dataFungsiPembangkit = DFungsiPembangkit::all();
        $dataJenis = DJenis::all();
        $dataMasaBerlaku = DMasaBerlaku::all();
        $dataMasaGaransi = DMasaGaransi::all();
        $dataMetodePengadaan = DMetodePengadaan::all();
        $dataPengawas = DPengawas::all();
        $dataPerjanjianKontrak = DPerjanjianKontrak::all();
        $dataPicPelaksana = DPicPelaksana::all();
        $dataSumberDana = DSumberDana::all();
        $dataSyaratBidangUsaha = DSyaratBidangUsaha::all();
        $dataTempatPenyerahan = DTempatPenyerahan::all();
        $dataVfmc = DVfmc::all();
        $dataStatus = DStatus::all();

        return view('pages/user/inisiasi-pengadaan/tambahPengadaan', compact([
            'dataBagian',
            'dataCaraPembayaran',
            'dataFungsiPembangkit',
            'dataJenis',
            'dataMasaBerlaku',
            'dataMasaGaransi',
            'dataMetodePengadaan',
            'dataPengawas',
            'dataPerjanjianKontrak',
            'dataPicPelaksana',
            'dataSumberDana',
            'dataSyaratBidangUsaha',
            'dataTempatPenyerahan',
            'dataVfmc',
            'dataStatus'
        ]));
    }

    public function updateData(Request $request)
    {


        $dokumenKontrak = $request->file('kontrak_file');
        $dokumenProses = $request->file('proses_file');

        $dokumenKontrakNama = $request->kontrak;
        $dokumenProsesNama = $request->proses;


        if ($dokumenKontrak != '') {
            $cekFoto = Pengadaan::where('id', $request->id)->first();
            if ($cekFoto->kontrak != null) {
                unlink(public_path('data-kontrak/kontrak/') . $dokumenKontrakNama);
            }
        }

        if ($dokumenProses != '') {
            $cekFoto = Pengadaan::where('id', $request->id)->first();
            if ($cekFoto->proses != null) {
                unlink(public_path('data-kontrak/proses/') . $dokumenProsesNama);
            }
        }


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
            'vfmc2' => $request->vfmc2,
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
            'survei_harga_pasar_nomor' => $request->nppv1,
            'survei_harga_pasar_jumlah' => $request->survey_harga_pasar_jumlah,
            'survei_harga_pasar_tgl' => $request->survey_harga_pasar_tgl,
            'survei_harga_pasar_hari' => $request->survey_harga_pasar_hari,
            'hps_nomor' => $request->nppv2,
            'hps_jumlah' => $request->hps_jumlah,
            'hps_tgl' => $request->hps_tgl,
            'hps_hari' => $request->hps_hari,
            'undangan_pengadaan_langsung_nomor' => $request->nppv3,
            'undangan_pengadaan_langsung_jumlah' => $request->undangan_pengadaan_langsung_jumlah,
            'undangan_pengadaan_langsung_tgl' => $request->undangan_pengadaan_langsung_tgl,
            'undangan_pengadaan_langsung_hari' => $request->undangan_pengadaan_langsung_hari,
            'pemasukan_dok_penawaran_jumlah_dari' => $request->pemasukan_dok_penawaran_jumlah_dari,
            'pemasukan_dok_penawaran_tgl_dari' => $request->pemasukan_dok_penawaran_tgl_dari,
            'pemasukan_dok_penawaran_hari_dari' => $request->pemasukan_dok_penawaran_hari_dari,
            'pemasukan_dok_penawaran_jumlah_sd' => $request->pemasukan_dok_penawaran_jumlah_sd,
            'pemasukan_dok_penawaran_tgl_sd' => $request->pemasukan_dok_penawaran_tgl_sd,
            'pemasukan_dok_penawaran_hari_sd' => $request->pemasukan_dok_penawaran_hari_sd,
            'evaluasi_dokumen_jumlah_dari' => $request->evaluasi_dokumen_jumlah_dari,
            'evaluasi_dokumen_tgl_dari' => $request->evaluasi_dokumen_tgl_dari,
            'evaluasi_dokumen_hari_dari' => $request->evaluasi_dokumen_hari_dari,
            'evaluasi_dokumen_jumlah_sd' => $request->evaluasi_dokumen_jumlah_sd,
            'evaluasi_dokumen_tgl_sd' => $request->evaluasi_dokumen_tgl_sd,
            'evaluasi_dokumen_hari_sd' => $request->evaluasi_dokumen_hari_sd,
            'evaluasi_dokumen_nomor' => $request->nppv4,
            'ba_hasil_klarifikasi_nomor' => $request->nppv6,
            'ba_hasil_klarifikasi_jumlah' => $request->ba_hasil_klarifikasi_jumlah,
            'ba_hasil_klarifikasi_tgl' => $request->ba_hasil_klarifikasi_tgl,
            'ba_hasil_klarifikasi_hari' => $request->ba_hasil_klarifikasi_hari,
            'ba_hasil_pengadaan_nomor' => $request->nppv7,
            'ba_hasil_pengadaan_jumlah' => $request->ba_hasil_pengadaan_langsung_jumlah,
            'ba_hasil_pengadaan_tgl' => $request->ba_hasil_pengadaan_langsung_tgl,
            'ba_hasil_pengadaan_hari' => $request->ba_hasil_pengadaan_langsung_hari,
            'nd_usulan_tetap_pemenang_nomor' => $request->nppv8,
            'nd_usulan_tetap_pemenang_jumlah' => $request->nd_usulan_tetap_pemenang_jumlah,
            'nd_usulan_tetap_pemenang_tgl' => $request->nd_usulan_tetap_pemenang_tgl,
            'nd_usulan_tetap_pemenang_hari' => $request->nd_usulan_tetap_pemenang_hari,
            'nd_penetapan_pemenang_nomor' => $request->nppv9,
            'nd_penetapan_pemenang_jumlah' => $request->nd_penetapan_pemenang_jumlah,
            'nd_penetapan_pemenang_tgl' => $request->nd_penetapan_pemenang_tgl,
            'nd_penetapan_pemenang_hari' => $request->nd_penetapan_pemenang_hari,
            'kontrak' => $dokumenKontrakNama,
            'proses' => $dokumenProsesNama,
            'status' => $request->status,
        );

        if (Pengadaan::whereId($request->id)->update($form_data)) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['success' => 'Gagal']);
        }
    }

    public function store(Request $request)
    {
        $dokumenKontrak = $request->file('nama_pdf_file');

        $dokumenKontrakNama = $request->nama_pdf;


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
            'status' => 'required',
            'proses_file' => 'required|max:512',
            'kontrak_file' => 'required|max:512',
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
        $pengadaan->masa_garansi = $request->masa_garansi;
        $pengadaan->vfmc = $request->vfmc;
        $pengadaan->vfmc2 = $request->vfmc2;
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
        $pengadaan->survei_harga_pasar_nomor = $request->nppv1;
        $pengadaan->hps_nomor = $request->nppv2;
        $pengadaan->undangan_pengadaan_langsung_nomor = $request->nppv3;
        $pengadaan->evaluasi_dokumen_nomor = $request->nppv4;
        $pengadaan->ba_hasil_klarifikasi_nomor = $request->nppv6;
        $pengadaan->ba_hasil_pengadaan_nomor = $request->nppv7;
        $pengadaan->nd_usulan_tetap_pemenang_nomor = $request->nppv8;
        $pengadaan->nd_penetapan_pemenang_nomor = $request->nppv9;
        $pengadaan->status = $request->status;


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
        if ($request->pemasukan_dok_penawaran_tgl_dari) {
            $pengadaan->pemasukan_dok_penawaran_jumlah_dari = $request->pemasukan_dok_penawaran_jumlah_dari;
            $pengadaan->pemasukan_dok_penawaran_tgl_dari = $request->pemasukan_dok_penawaran_tgl_dari;
            $pengadaan->pemasukan_dok_penawaran_hari_dari = $request->pemasukan_dok_penawaran_hari_dari;
        }

        if ($request->evaluasi_dokumen_tgl_dari) {
            $pengadaan->evaluasi_dokumen_jumlah_dari = $request->evaluasi_dokumen_jumlah_dari;
            $pengadaan->evaluasi_dokumen_tgl_dari = $request->evaluasi_dokumen_tgl_dari;
            $pengadaan->evaluasi_dokumen_hari_dari = $request->evaluasi_dokumen_hari_dari;
        }

        if ($request->pemasukan_dok_penawaran_tgl_sd) {
            $pengadaan->pemasukan_dok_penawaran_jumlah_sd = $request->pemasukan_dok_penawaran_jumlah_sd;
            $pengadaan->pemasukan_dok_penawaran_tgl_sd = $request->pemasukan_dok_penawaran_tgl_sd;
            $pengadaan->pemasukan_dok_penawaran_hari_sd = $request->pemasukan_dok_penawaran_hari_sd;
        }

        if ($request->evaluasi_dokumen_tgl_sd) {
            $pengadaan->evaluasi_dokumen_jumlah_sd = $request->evaluasi_dokumen_jumlah_sd;
            $pengadaan->evaluasi_dokumen_tgl_sd = $request->evaluasi_dokumen_tgl_sd;
            $pengadaan->evaluasi_dokumen_hari_sd = $request->evaluasi_dokumen_hari_sd;
        }

        if ($request->ba_hasil_klarifikasi_tgl) {
            $pengadaan->ba_hasil_klarifikasi_jumlah = $request->ba_hasil_klarifikasi_jumlah;
            $pengadaan->ba_hasil_klarifikasi_tgl = $request->ba_hasil_klarifikasi_tgl;
            $pengadaan->ba_hasil_klarifikasi_hari = $request->ba_hasil_klarifikasi_hari;
        }

        if ($request->ba_hasil_pengadaan_tgl) {
            $pengadaan->ba_hasil_pengadaan_jumlah = $request->ba_hasil_pengadaan_langsung_jumlah;
            $pengadaan->ba_hasil_pengadaan_tgl = $request->ba_hasil_pengadaan_langsung_tgl;
            $pengadaan->ba_hasil_pengadaan_hari = $request->ba_hasil_pengadaan_langsung_hari;
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

        $image = $request->file('kontrak_file');
        $image1 = $request->file('proses_file');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('data-kontrak/kontrak'), $new_name);
        $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('data-kontrak/proses'), $new_name1);

        $pengadaan->proses = $new_name1;
        $pengadaan->kontrak = $new_name;

        if ($pengadaan->save()) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['success' => 'Gagal']);
        }


    }
}
