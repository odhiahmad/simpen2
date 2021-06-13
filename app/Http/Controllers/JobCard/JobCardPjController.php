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
use App\PengadaanDetailPj;
use App\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class JobCardPjController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Pengadaan::with(['getMp1', 'getMp2'])->where(['id_mp1' => '1'])->latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '';

                    if ($data->id_mp5 != null || $data->id_mp5 != 0) {
                        $button .= '<a href="update-data-pj-1/' . $data->id . '/' . $data->id_mp2 . '/' . $data->id_mp5 . '" type="button"  class="update1 btn btn-warning btn-sm">Update</a>';
                    } else if ($data->id_mp4 != null || $data->id_mp4 != 0) {
                        if ($data->id_mp3 == 15) {
                            $button .= '<a href="update-data-pj-2/teka1/' . $data->id . '/' . $data->id_mp2 . '/' . $data->id_mp4 . '" type="button"  class="update2 btn btn-warning btn-sm">Update</a>';

                        } else if ($data->id_mp3 == 16) {
                            $button .= '<a href="update-data-pj-2/teka2/' . $data->id . '/' . $data->id_mp2 . '/' . $data->id_mp4 . '" type="button"  class="update2 btn btn-warning btn-sm">Update</a>';

                        } else if ($data->id_mp3 == 18) {
                            $button .= '<a href="update-data-pj-2/tetas1/' . $data->id . '/' . $data->id_mp2 . '/' . $data->id_mp4 . '" type="button"  class="update2 btn btn-warning btn-sm">Update</a>';

                        } else if ($data->id_mp3 == 19) {
                            $button .= '<a href="update-data-pj-2/tetas2/' . $data->id . '/' . $data->id_mp2 . '/' . $data->id_mp4 . '" type="button"  class="update2 btn btn-warning btn-sm">Update</a>';

                        }
                    } else if ($data->id_mp3 != null || $data->id_mp3 != 0) {
                        $button .= '<a href="update-data-pj-3/' . $data->id . '/' . $data->id_mp2 . '/' . $data->id_mp3 . '" type="button"  class="update3 btn btn-warning btn-sm">Update</a>';
                    } else {
                        $button .= '<a href="update-data-pj-4/' . $data->id . '/' . $data->id_mp2 . '/' . $data->id_mp2 . '" type="button"  class="update4 btn btn-warning btn-sm">Update</a>';
                    }


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
                    } else if ($data->status == 'DRAFT') {
                        $button = '<button type="button"  class="btn btn-metal btn-sm">' . $data->status . '</button>';
                        return $button;
                    } else if ($data->status == 'TTD KONTRAK') {
                        $button = '<button type="button"  class="btn btn-primary btn-sm">' . $data->status . '</button>';
                        return $button;
                    } else if ($data->status == 'TERKONTRAK') {
                        $button = '<button type="button"  class="btn btn-warning btn-sm">' . $data->status . '</button>';
                        return $button;
                    } else if ($data->status == 'BACKLOG') {
                        $button = '<button type="button"  class="btn btn-accent btn-sm">' . $data->status . '</button>';
                        return $button;
                    } else if ($data->status == 'DIBATALKAN') {
                        $button = '<button type="button"  class="btn btn-danger btn-sm">' . $data->status . '</button>';
                        return $button;
                    }
                })
                ->addColumn('metode', function ($data) {
                    if ($data->id_mp5 != null || $data->id_mp5 != 0) {
                        $button = '<button type="button" name="metode3" id="' . $data->id . '" class="metode3 btn btn-warning btn-sm">' . $data->metode_pengadaan . '</button>';
                        return $button;
                    } else if ($data->id_mp4 != null || $data->id_mp4 != 0) {
                        $button = '<button type="button" name="metode2" id="' . $data->id . '" class="metode2 btn btn-warning btn-sm">' . $data->metode_pengadaan . '</button>';
                        return $button;
                    } else {
                        $button = '<button type="button" name="metode1" id="' . $data->id . '" class="metode1 btn btn-warning btn-sm">' . $data->metode_pengadaan . '</button>';
                        return $button;
                    }

                })
                ->rawColumns(['action', 'info', 'metode', 'warna'])
                ->make(true);
        }
        return view('pages/user/job-card/pj/indexPengadaanPj');
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

    public function indexUpdateView($id, $id1, $id2)
    {
        $dataCoo = DCoo::all();
        $dataPenerbitCoo = DPenerbitCoo::all();
        $dataPenerbitGaransi = DPenerbitGaransi::all();
        $dataSistemDenda = DSistemDenda::all();
        $dataPerusahaan = Perusahaan::all();
        $dataPosAnggaran = DPosAnggaran::all();
        $dataPengadaan = Pengadaan::with(['getMp1', 'getmp2', 'getMp3', 'getMp4', 'getMp5'])->where('id', $id)->first();
        $dataPengadaanDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $dataBagian = DBagian::all();
        $dataCaraPembayaran = DCaraPembayaran::all();
        $dataFungsiPembangkit = DFungsiPembangkit::all();
        $dataJenis = DJenis::all();
        $dataMasaBerlaku = DMasaBerlaku::all();
        $dataMasaGaransi = DMasaGaransi::all();
        $dataMetodePengadaan = DMetodePengadaan::where('id_induk', '0')->get();
        $dataPengawas = DPengawas::all();
        $dataPerjanjianKontrak = DPerjanjianKontrak::all();
        $dataPicPelaksana = DPicPelaksana::where('metode', 'pj')->get();
        $dataSumberDana = DSumberDana::all();
        $dataSyaratBidangUsaha = DSyaratBidangUsaha::all();
        $dataTempatPenyerahan = DTempatPenyerahan::where('metode', 'pj')->get();
        $dataVfmc = DVfmc::where('metode', 'pj')->get();
        $dataStatus = DStatus::all();
        $dataJabatanPengawas = DJabatanPengawas::all();
        $dataStatusBerakhir = DStatusBerakhir::all();
        return view('pages/user/job-card/pj/updatePengadaanPj', compact([
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
        $dataPicPelaksana = DPicPelaksana::where('metode', 'pj')->get();
        $dataSumberDana = DSumberDana::all();
        $dataSyaratBidangUsaha = DSyaratBidangUsaha::all();
        $dataTempatPenyerahan = DTempatPenyerahan::where('metode', 'pj')->get();
        $dataVfmc = DVfmc::where('metode', 'pj')->get();
        $dataStatus = DStatus::all();
        $dataJabatanPengawas = DJabatanPengawas::all();

        return view('pages/user/job-card/pj/tambahPengadaanPj', compact([
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
        $getMp1 = DMetodePengadaan::where('id', $request->metode_pengadaan)->first();

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
            $pengadaanDetail = new PengadaanDetailPj();
            $pengadaanDetail->id_pengadaan = $pengadaan->id;
            $pengadaanDetail->save();

            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['success' => 'Gagal']);
        }


    }

    public function destroy($id)
    {
        $data = Pengadaan::findOrFail($id);
        $data1 = PengadaanDetailPj::where('id_pengadaan',$id)->first();
        $data->delete();
        $data1->delete();
    }

    public function fetchAlamatPenyerahan(Request $request)
    {
    
        $value = $request->get('id');
      

        $data = DTempatPenyerahan::where('id', $value)->first();

        return response()->json(['data' => $data,'id' => $value]);
        
    }
}
