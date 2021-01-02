<?php


namespace App\Http\Controllers\JobCard;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Template\EvaluasiDokumen\DaftarHadirDokPenawaran;
use App\Http\Controllers\Template\EvaluasiDokumen\EvaluasiDokumenPenawaran;
use App\Http\Controllers\Template\EvaluasiDokumen\PemasukanDokPenawaran;
use App\Http\Controllers\Template\HasilKlarifikasi\DaftarHadirNego;
use App\Http\Controllers\Template\HasilKlarifikasi\DaftarHadirPembuktianKualifikasi;
use App\Http\Controllers\Template\HasilKlarifikasi\EvaluasiNego;
use App\Http\Controllers\Template\HasilKlarifikasi\EvaluasiPembuktianKualifikasi;
use App\Http\Controllers\Template\HasilPengadaan\DaftarHadirPengadaanLangsung;
use App\Http\Controllers\Template\HasilPengadaan\HasilPengadaanLangsung;
use App\Http\Controllers\Template\HPS;
use App\Http\Controllers\Template\SurveyHargaPasar\SurveiHargaPasar1;
use App\Http\Controllers\Template\UndanganPengadaanLangsung;
use App\Http\Controllers\Template\UsulanPenetapanPemenang;
use App\ModelsResource\DBagian;
use App\ModelsResource\DCaraPembayaran;
use App\ModelsResource\DCoo;
use App\ModelsResource\DFungsiPembangkit;
use App\ModelsResource\DJabatanPengawas;
use App\ModelsResource\DJenis;
use App\ModelsResource\DMasaBerlaku;
use App\ModelsResource\DMasaGaransi;
use App\ModelsResource\DMetodePengadaan;
use App\ModelsResource\DPenerbitCoo;
use App\ModelsResource\DPenerbitGaransi;
use App\ModelsResource\DPengawas;
use App\ModelsResource\DPerjanjianKontrak;
use App\ModelsResource\DPicPelaksana;
use App\ModelsResource\DPosAnggaran;
use App\ModelsResource\DSistemDenda;
use App\ModelsResource\DStatus;
use App\ModelsResource\DStatusBerakhir;
use App\ModelsResource\DSumberDana;
use App\ModelsResource\DSyaratBidangUsaha;
use App\ModelsResource\DTempatPenyerahan;
use App\ModelsResource\DVfmc;
use App\Pengadaan;
use App\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class JobCardSpbjController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Pengadaan::with(['getMp1', 'getMp2'])->latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<a href="update-data/' . $data->id . '" class="detail btn btn-info btn-sm">Update</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="hapus" id="' . $data->id . '" class="hapus btn btn-danger btn-sm">Hapus</button>';
                    return $button;
                })
                ->addColumn('info', function ($data) {
                    $button = '<button type="button" name="info" id="' . $data->id . '" class="info btn btn-warning btn-sm">No Nota Dinas : 0' . $data->no_nota_dinas . '</button>';
                    return $button;
                })
                ->addColumn('warna', function ($data) {
                    if ($data->status == 'PROSES') {
                        $button = '<button type="button"  class="btn btn-outline-warning btn-sm">' . $data->status . '</button>';
                        return $button;
                    }else if($data->status == 'DRAFT') {
                        $button = '<button type="button"  class="btn btn-metal btn-sm">' . $data->status . '</button>';
                        return $button;
                    }else if($data->status == 'TTD KONTRAK') {
                        $button = '<button type="button"  class="btn btn-primary btn-sm">' . $data->status . '</button>';
                        return $button;
                    }else if($data->status == 'TERKONTRAK') {
                        $button = '<button type="button"  class="btn btn-warning btn-sm">' . $data->status . '</button>';
                        return $button;
                    }else if($data->status == 'BACKLOG') {
                        $button = '<button type="button"  class="btn btn-accent btn-sm">' . $data->status . '</button>';
                        return $button;
                    }else if($data->status == 'DIBATALKAN') {
                        $button = '<button type="button"  class="btn btn-danger btn-sm">' . $data->status . '</button>';
                        return $button;
                    }
                })
                ->addColumn('metode', function ($data) {
                    if ($data->id_mp5 != null || $data->id_mp5 != 0) {
                        $button = '<button type="button" name="metode3" id="' . $data->id . '" class="metode3 btn btn-warning btn-sm">' . $data->metode_pengadaan . '</button>';
                        return $button;
                    } else if ($data->id_mp3 != null || $data->id_mp3 != 0) {
                        $button = '<button type="button" name="metode2" id="' . $data->id . '" class="metode2 btn btn-warning btn-sm">' . $data->metode_pengadaan . '</button>';
                        return $button;
                    } else {
                        $button = '<button type="button" name="metode1" id="' . $data->id . '" class="metode1 btn btn-warning btn-sm">' . $data->metode_pengadaan . '</button>';
                        return $button;
                    }

                })
                ->rawColumns(['action', 'info', 'metode','warna'])
                ->make(true);
        }
        return view('pages/user/job-card/spbj/indexPengadaanSpbj');
    }

    public function info($id)
    {
        if (request()->ajax()) {
            $data = Pengadaan::with(['getMp1', 'getMp2', 'getMp3', 'getMp4', 'getMp5'])->findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function getRowDetails()
    {
        return view('pages/user/job-card/row-details');
    }

    public function getRowDetailsData()
    {
        $data = Pengadaan::with(['getMp1', 'getMp2'])->where(['id_mp1' => 2, 'id_mp2' => 4])->latest()->get();

        return Datatables::of($data)->make(true);
    }

    public function downloadRks($id)
    {
        $surveiHarga = new SurveiHargaPasar1();
        $surveiHarga->SurveyHargaPasar1($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/rks/rks" . '.doc';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . '-RKS.doc', $headers);
    }

    public function downloadShp1($id)
    {
        $surveiHarga = new SurveiHargaPasar1();
        $surveiHarga->SurveyHargaPasar1($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/survei-harga-pasar/" . $data->judul . '.docx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' Survey Harga Pasar.docx', $headers);
    }

    public function downloadShp2($id)
    {
        $surveiHarga = new SurveiHargaPasar1();
        $surveiHarga->SurveyHargaPasar2($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/survei-harga-pasar/" . $data->judul . '2.docx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' Form Survey Harga Pasar.docx', $headers);
    }

    public function downloadHps($id)
    {
        $surveiHarga = new HPS();
        $surveiHarga->HPS($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hps/" . $data->judul . '.xlsx';

        $headers = array(
            'Content-Type: application/xlsx',
        );

        return Response::download($file, $data->judul . ' HPS.xlsx', $headers);
    }

    public function downloadUplh($id)
    {
        $surveiHarga = new UndanganPengadaanLangsung();
        $surveiHarga->UndanganPengadaanLangsung($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/undangan-pengadaan-langsung/" . $data->judul . $data->id . '.docx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' Undangan Pengadaan Langsung.docx', $headers);
    }

    public function downloadEvaluasiDokumen1($id)
    {
        $surveiHarga = new PemasukanDokPenawaran();
        $surveiHarga->PemasukanDokPenawaran($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/evaluasi-dokumen/" . $data->judul . $data->id . '1.docx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' Evaluasi Dokumen Pembukaan Dok Penawaran.docx', $headers);
    }

    public function downloadEvaluasiDokumen2($id)
    {
        $surveiHarga = new EvaluasiDokumenPenawaran();
        $surveiHarga->EvaluasiDokumenPenawaran($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/evaluasi-dokumen/" . $data->judul . $data->id . '2.docx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' Evaluasi Dok Penawaran.docx', $headers);
    }

    public function downloadEvaluasiDokumen3($id)
    {
        $surveiHarga = new DaftarHadirDokPenawaran();
        $surveiHarga->DaftarHadirDokPenawaran($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/evaluasi-dokumen/" . $data->judul . $data->id . '3.docx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' Daftar Hadir Dok Penawaran.docx', $headers);
    }

    public function downloadNdPenetapan($id)
    {
        $surveiHarga = new UsulanPenetapanPemenang();
        $surveiHarga->UsulanPenetapanPemenang($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/usulan-penetapan-pemenang/" . $data->judul . '.docx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' usulan penetapan pemenang.docx', $headers);
    }

    public function downloadHasilPengadaan1($id)
    {
        $surveiHarga = new HasilPengadaanLangsung();
        $surveiHarga->HasilPengadaanLangsung($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hasil-pengadaan-langsung/" . $data->judul . 'hasil-pengadaan-langsung.docx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' hasil pengadaan lansung.docx', $headers);
    }

    public function downloadHasilPengadaan2($id)
    {
        $surveiHarga = new DaftarHadirPengadaanLangsung();
        $surveiHarga->DaftarHadir($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hasil-pengadaan-langsung/" . $data->judul . '.docx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' daftar hadir hasil pengadaan lansung.docx', $headers);
    }

    public function downloadHasilKlarifikasi1($id)
    {
        $surveiHarga = new EvaluasiPembuktianKualifikasi();
        $surveiHarga->EvaluasiPembuktianKualifikasi($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hasil-klarifikasi/" . $data->judul . '1.docx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' Pembuktian Kualifikasi.docx', $headers);
    }

    public function downloadHasilKlarifikasi2($id)
    {
        $surveiHarga = new DaftarHadirPembuktianKualifikasi();
        $surveiHarga->DaftarHadirPembuktianKualifikasi($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hasil-klarifikasi/" . $data->judul . '2.docx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' Daftar Hadir Pembuktian Kualifikasi.docx', $headers);
    }

    public function downloadHasilKlarifikasi3($id)
    {
        $surveiHarga = new EvaluasiNego();
        $surveiHarga->EvaluasiNego($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hasil-klarifikasi/" . $data->judul . '3.xlsx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' Evaluasi Nego.xlsx', $headers);
    }

    public function downloadHasilKlarifikasi4($id)
    {
        $surveiHarga = new DaftarHadirNego();
        $surveiHarga->DaftarHadirNego($id);

        $data = Pengadaan::where('id', $id)->first();
        $file = public_path('data-pengadaan') . "/hasil-klarifikasi/" . $data->judul . '4.docx';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, $data->judul . ' Daftar Hadir Nego.docx', $headers);
    }


    public function downloadSpkBarang()
    {

        $file = public_path('spk') . "/" . 'spk-barang.doc';

        $headers = array(
            'Content-Type: application/docx',
        );

        return Response::download($file, 'SPKBarang.docx', $headers);
    }

    public function downloadDaftarKuantitas()
    {

        $file = public_path('spk') . '/daftar-kuantitas.xlsx';

        $headers = array(
            'Content-Type: application/xlsx',
        );

        return Response::download($file, 'DaftarKuantitas.xlsx', $headers);
    }

    public function fetchData(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = DMetodePengadaan::where('id_induk', $value)->get();

        $output = '';
        $output .= '<option> Pilih </option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->nama . '</option>';
        }

        echo $output;
    }

    public function fetchDataJenis1(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = DMetodePengadaan::where('id_induk', $value)->get();

        $output = '';
        $output .= '<option> Pilih </option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->nama . '</option>';
        }

        echo $output;
    }

    public function indexUpdateView(Request $request)
    {
        $dataCoo = DCoo::all();
        $dataPenerbitCoo = DPenerbitCoo::all();
        $dataPenerbitGaransi = DPenerbitGaransi::all();
        $dataSistemDenda = DSistemDenda::all();
        $dataPerusahaan = Perusahaan::all();
        $dataPosAnggaran = DPosAnggaran::all();
        $dataPengadaan = Pengadaan::with(['getMp1', 'getmp2', 'getMp3', 'getMp4', 'getMp5'])->where('id', $request->id)->first();
        $dataBagian = DBagian::all();
        $dataCaraPembayaran = DCaraPembayaran::all();
        $dataFungsiPembangkit = DFungsiPembangkit::all();
        $dataJenis = DJenis::all();
        $dataMasaBerlaku = DMasaBerlaku::all();
        $dataMasaGaransi = DMasaGaransi::all();
        $dataMetodePengadaan = DMetodePengadaan::where('id_induk', '0')->get();
        $dataPengawas = DPengawas::all();
        $dataPerjanjianKontrak = DPerjanjianKontrak::all();
        $dataPicPelaksana = DPicPelaksana::all();
        $dataSumberDana = DSumberDana::all();
        $dataSyaratBidangUsaha = DSyaratBidangUsaha::all();
        $dataTempatPenyerahan = DTempatPenyerahan::all();
        $dataVfmc = DVfmc::all();
        $dataStatus = DStatus::all();
        $dataJabatanPengawas = DJabatanPengawas::all();
        $dataStatusBerakhir = DStatusBerakhir::all();
        return view('pages/user/job-card/updatePengadaan', compact([
            'dataCoo',
            'dataPenerbitCoo',
            'dataPenerbitGaransi',
            'dataSistemDenda',
            'dataPerusahaan',
            'dataPosAnggaran',
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
            'dataStatus',
            'dataJabatanPengawas',
            'dataStatusBerakhir'
        ]));
    }

    public function indexPembayaran()
    {
        return view('pages/user/inisiasi-pengadaan/indexPembayaranPengadaan');
    }

    public function tambahPengadaan()
    {
        $dataCoo = DCoo::all();
        $dataPenerbitCoo = DPenerbitCoo::all();
        $dataPenerbitGaransi = DPenerbitGaransi::all();
        $dataSistemDenda = DSistemDenda::all();
        $dataPerusahaan = Perusahaan::all();
        $dataPosAnggaran = DPosAnggaran::all();
        $dataBagian = DBagian::all();
        $dataCaraPembayaran = DCaraPembayaran::all();
        $dataFungsiPembangkit = DFungsiPembangkit::all();
        $dataJenis = DJenis::all();
        $dataMasaBerlaku = DMasaBerlaku::all();
        $dataMasaGaransi = DMasaGaransi::all();
        $dataMetodePengadaan = DMetodePengadaan::where('id_induk', '0')->get();
        $dataPengawas = DPengawas::all();
        $dataPerjanjianKontrak = DPerjanjianKontrak::all();
        $dataPicPelaksana = DPicPelaksana::all();
        $dataSumberDana = DSumberDana::all();
        $dataSyaratBidangUsaha = DSyaratBidangUsaha::all();
        $dataTempatPenyerahan = DTempatPenyerahan::all();
        $dataVfmc = DVfmc::all();
        $dataStatus = DStatus::all();
        $dataJabatanPengawas = DJabatanPengawas::all();

        return view('pages/user/job-card/tambahPengadaan', compact([
            'dataCoo',
            'dataPenerbitCoo',
            'dataPenerbitGaransi',
            'dataSistemDenda',
            'dataPerusahaan',
            'dataPosAnggaran',
            'dataJabatanPengawas',
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

        $new_name = $request->kontrak;
        $new_name1 = $request->proses;

        if ($dokumenKontrak != '') {
            $cekFoto = Pengadaan::where('id', $request->id)->first();
            if ($cekFoto->kontrak != null) {
                unlink(public_path('data-kontrak/kontrak/') . $dokumenKontrakNama);
            }

            $image = $request->file('kontrak_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('data-kontrak/kontrak'), $new_name);

        }

        if ($dokumenProses != '') {
            $cekFoto = Pengadaan::where('id', $request->id)->first();
            if ($cekFoto->proses != null) {
                unlink(public_path('data-kontrak/proses/') . $dokumenProsesNama);
            }

            $image1 = $request->file('proses_file');

            $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('data-kontrak/proses'), $new_name1);
        }


        $rules = array(
            'tanggal_mulai' => 'required',
            'judul' => 'required',
            'no_proses' => 'required',
            'metode_pengadaan' => 'required',
            'rab' => 'required',
            'no_nota_dinas' => 'required',
            'tanggal_nota_dinas' => 'required',
            'tanggal_diterima_panitia' => 'required',
            'pos_anggaran' => 'required',
            'no_prk' => 'required',
            'fungsi_pembangkit' => 'required',
            'pic_pelaksana' => 'required',
            'status' => 'required',
            'status_berakhir'=>'required'
        );

        $getMp1 = DMetodePengadaan::where('id',$request->metode_pengadaan)->first();
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'jangka_waktu_hari' => $request->jangka_waktu_hari,
            'jangka_waktu_tgl' => $request->jangka_waktu_tgl,
            'tgl_mulai' => $request->tanggal_mulai,
            'metode_pengadaan' => $getMp1->nama,
            'id_mp1' => $request->metode_pengadaan,
            'id_mp2' => $request->metode_pengadaan_jenis1,
            'id_mp3' => $request->metode_pengadaan_jenis2,
            'id_mp4' => $request->metode_pengadaan_jenis3,
            'id_mp5' => $request->metode_pengadaan_jenis4,
            'no_proses' => $request->no_proses,
            'no_nota_dinas' => $request->no_nota_dinas,
            'tgl_nota_dinas' => $request->tanggal_nota_dinas,
            'id_perusahaan' => $request->perusahaan,
            'rab' => $request->rab,
            'nilai_kontrak' => $request->nilai_kontrak,
            'sisa_anggaran' => $request->sisa_anggaran,
            'pos_anggaran' => $request->pos_anggaran,
            'no_prk' => $request->no_prk,
            'judul' => $request->judul,
            'tahun' => $request->tahun,
            'tgl_diterima_panitia' => $request->tanggal_diterima_panitia,
            'bagian' => $request->bagian,
            'fungsi_pembangkit' => $request->fungsi_pembangkit,
            'no_undang_pl' => $request->no_undang_pl,
            'lingkup_pekerjaan' => $request->lingkup_pekerjaan,
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
            'jabatan_pengawas' => $request->jabatan_pengawas,
            'ketua_tim' => $request->ketua_tim,
            'pic_pelaksana' => $request->pic_pelaksana,
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
            'spk_nomor' => $request->nppv10,
            'spk_jumlah' => $request->spk_jumlah,
            'spk_tgl' => $request->spk_tgl,
            'spk_hari' => $request->spk_hari,
            'rks_nomor' => $request->nppv11,
            'rks_jumlah' => $request->rks_jumlah,
            'rks_tgl' => $request->rks_tgl,
            'rks_hari' => $request->rks_hari,
            'kontrak' => $new_name,
            'proses' => $new_name1,
            'status' => $request->status,
            'status_berakhir' => $request->status_berakhir,

            'harga_penawaran' => $request->harga_penawaran,
            'harga_kontrak' => $request->harga_kontrak,
            'nilai_jaminan' => $request->nilai_jaminan,
            'jangka_waktu' => $request->jangka_waktu,

            'coo' => $request->coo,
            'melampirkan_sertifikat_coo' => $request->melampirkan_sertifikat_coo,
            'penerbit_coo' => $request->penerbit_coo,
            'melampirkan_sertifikat' => $request->melampirkan_sertifikat,
            'penerbit_garansi' => $request->penerbit_garansi,
            'melampirkan_msds' => $request->melampirkan_msds,
            'sistem_denda' => $request->sistem_denda,
        );


        if (Pengadaan::whereId($request->id)->update($form_data)) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['errors' => 'Gagal']);
        }


    }

    public function store(Request $request)
    {
        $rules = array(
            'tanggal_mulai' => 'required',
            'judul' => 'required',
            'no_proses' => 'required',
            'metode_pengadaan' => 'required',
            'rab' => 'required',
            'no_nota_dinas' => 'required',
            'tanggal_nota_dinas' => 'required',
            'tanggal_diterima_panitia' => 'required',
            'pos_anggaran' => 'required',
            'no_prk' => 'required',
            'fungsi_pembangkit' => 'required',
            'pic_pelaksana' => 'required',
            'status' => 'required',
        );

        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $getMp1 = DMetodePengadaan::where('id',$request->metode_pengadaan)->first();

        $pengadaan = new Pengadaan();

        $pengadaan->judul = $request->judul;
        $pengadaan->no_proses = $request->no_proses;
        $pengadaan->metode_pengadaan = $getMp1->nama;
        $pengadaan->id_mp1 = $request->metode_pengadaan;
        $pengadaan->id_mp2 = $request->metode_pengadaan_jenis1;
        $pengadaan->id_mp3 = $request->metode_pengadaan_jenis2;
        $pengadaan->id_mp4 = $request->metode_pengadaan_jenis3;
        $pengadaan->id_mp5 = $request->metode_pengadaan_jenis4;
        $pengadaan->rab = $request->rab;
        $pengadaan->no_nota_dinas = $request->no_nota_dinas;
        $pengadaan->tgl_mulai = $request->tanggal_mulai;
        $pengadaan->tgl_nota_dinas = $request->tanggal_nota_dinas;
        $pengadaan->tgl_diterima_panitia = $request->tanggal_diterima_panitia;
        $pengadaan->pos_anggaran = $request->pos_anggaran;
        $pengadaan->no_prk = $request->no_prk;
        $pengadaan->fungsi_pembangkit = $request->fungsi_pembangkit;
        $pengadaan->pic_pelaksana = $request->pic_pelaksana;
        $pengadaan->status = $request->status;


        if ($pengadaan->save()) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['success' => 'Gagal']);
        }


    }

    public function destroy($id)
    {
        $data = Pengadaan::findOrFail($id);
        $data->delete();
    }
}
