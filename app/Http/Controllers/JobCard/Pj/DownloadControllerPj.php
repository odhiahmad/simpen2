<?php


namespace App\Http\Controllers\JobCard\Pj;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Template\TanggalIndo;
use App\Pengadaan;
use App\PengadaanDetailPj;
use App\Perusahaan;
use Novay\WordTemplate\WordTemplate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DownloadControllerPj extends Controller
{

    public function downloadSurveyHargaPasar($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->survey_harga_pasar_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->survey_harga_pasar_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->survey_harga_pasar_tgl);

        $word = new WordTemplate();
        $file = public_path('doc/spk/survey_harga_pasar.rtf');

        $array = array(
            '[Judul]' => $data->judul,
            '[Hari]' => $dataDetail->survey_harga_pasar_hari,
            '[Tanggal]' => $tanggalIndo->terbilang($tanggal),
            '[Bulan]' => $bulan,
            '[Tahun]' => $tanggalIndo->terbilang($tahun),
            '[Judul1]' => $data->judul,
            '[Pejabat_Pelaksana]' => $data->pejabat_pelaksana,
            '[Pengawas]' => $data->pengawas,

        );

        $nama_file = 'survey-harga-pasar.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadSurveyHargaPasar2($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->survey_harga_pasar_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->survey_harga_pasar_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->survey_harga_pasar_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/spk/survey_harga_pasar2.rtf');

        $array = array(
            '[Tanggal_shp]' => $gabungan,
            '[Tempat_Pengadaan]' => $data->tempat_penyerahan,
        );

        $nama_file = 'survey-harga-pasar2.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadRks($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->rks_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->rks_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->rks_tgl);

        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/spk/rks.rtf');

        $array = array(
            '[Judul]' => $data->judul,
            '[Nomor_Rks]' => $dataDetail->rks_nomor,
            '[Tanggal_Rks]' => $gabungan,
            '[Tahun_Anggaran]' => $data->tahun,
            '[Metode_Pengadaan]' => $data['getmp2']['nama'],
            '[Metode_Pembayaran]' => $data->cara_pembayaran,
            '[Alamat]' => $data->tempat_penyerahan,
            '[Jangka_Waktu]' => $data->rencana,
            '[Alamat_Pelaksana]' => $data->tempat_penyerahan,
            '[Manager_Bagian]' => $data->pejabata_pelaksana,
            '[Manager]' => $data->direksi,
            '[Masa_Garansi]' => $data->masa_garansi

        );

        $nama_file = 'rks.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadHps($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $spreadsheet = new Spreadsheet();

        $loadFile = public_path('doc/pj/hps/hps.xls');
        $sSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($loadFile);
        $worksheet = $sSheet->getSheetByName('HPS');
        $worksheet->setCellValue('F8', $dataDetail->hps_nomor);
        $worksheet->setCellValue('D15', $data->sumber_dana);
        $worksheet->setCellValue('D16', $data->tahun);

        $worksheet->setCellValue('B45', $data->manager);
        $worksheet->setCellValue('G45', $data->tahun);


        $date = date('d-m-y-' . substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "export_" . $date . ".xlsx";

        try {
            $writer = new Xlsx($sSheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        header("Content-Disposition: attachment; filename=" . $filename);

        unlink($filename);
        exit($content);


    }


    public function downloadPengumuman($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $word = new WordTemplate();
        $file = public_path('doc/pj/pengumuman.rtf');

        $array = array(
            '[Pengumuman_Nomor]' => $dataDetail->pengumuman_nomor,
            '[Sumber_Pendanaan]' => $data->sumber_dana,
            '[Tahun]' => $data->tahun,


        );

        $nama_file = 'pengumuman.doc';

        return $word->export($file, $array, $nama_file);

    }

    public function downloadUndanganCda($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->cda_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->cda_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->cda_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/cda/und_cda.rtf');

        $array = array(
            '[nomor]' => $dataDetail->cda_nomor,
            '[judul]' => $data->judul,
            '[hari]' => $dataDetail->cda_hari,
            '[manager]' => $data->direksi,
            '[tanggal]' => $gabungan


        );

        $nama_file = 'undangan-cda.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadBeritaAcaraCda($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->cda_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->cda_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->cda_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;

        $word = new WordTemplate();
        $file = public_path('doc/pj/cda/berita_acara_cda.rtf');

        $array = array(
            '[nomor_cda]' => $dataDetail->cda_nomor,
            '[judul]' => $data->judul,
            '[hari_cda]' => $dataDetail->cda_hari,
            '[bulan_cda]' => $bulan,
            '[tahun_cda]' => $tahun,
            '[tanggal_cda]' => $tanggal,
            '[nomor_rks]' => $dataDetail->addendum_rks_nomor,
            '[tanggal_rks]' => $gabungan1,
            '[manager_perusahaan]' => $perusahaan->pimpinan,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[manager]' => $data->direksi,
            '[tanggal_gabungan]' => $gabungan
        );

        $nama_file = 'berita-cda.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadDaftarHadirPelaksanaCda($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->cda_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->cda_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->cda_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/cda/daftar_hadir_pelaksana_pengadaan.rtf');

        $array = array(
            '[hari]' => $dataDetail->cda_hari,
            '[tanggal_gabungan_cda]' => $gabungan,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[pic_pelaksana]' => $data->pic_pelaksana,
        );

        $nama_file = 'daftar_hadir_pelaksana_pengadaan.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadDaftarHadirPenyediaCda($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->cda_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->cda_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->cda_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/cda/daftar_hadir_penyedia_barang_dan_jasa.rtf');

        $array = array(
            '[hari]' => $dataDetail->cda_hari,
            '[tanggal_gabungan_cda]' => $gabungan,
        );

        $nama_file = 'daftar_hadir_penyedia_barang_dan_jasa.doc';

        return $word->export($file, $array, $nama_file);

    }

    public function downloadNdUsulanCalon($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->nd_usulan_penetapan_calon_pemenang_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->nd_usulan_penetapan_calon_pemenang_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->nd_usulan_penetapan_calon_pemenang_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;

        $word = new WordTemplate();
        $file = public_path('doc/pj/usulan_penetapan_pemenang.rtf');

        $array = array(
            '[usulan_calon_nomor]' => $dataDetail->nd_usulan_penetapan_calon_pemenang_nomor,
            '[judul]' => $data->judul,
            '[nomor_rks]' => $dataDetail->addendum_rks_nomor,
            '[tanggal_gabungan_rks]' => $gabungan1,
            '[perusahaan_nama]' => $perusahaan->nama,
            '[perusahaan_alamat]' => $perusahaan->alamat,
            '[perusahaan_npwp]' => $perusahaan->npwp,
            '[tanggal_gabungan_usulan]' => $gabungan
        );

        $nama_file = 'usulan_penetapan_pemenang.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadNdPenetapanPemenang($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->nd_penetapan_calon_pemenang_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->nd_penetapan_calon_pemenang_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->nd_penetapan_calon_pemenang_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;

        $word = new WordTemplate();
        $file = public_path('doc/pj/penetapan_pemenang.rtf');

        $array = array(
            '[pemenang_nomor]' => $dataDetail->nd_penetapan_calon_pemenang_nomor,
            '[judul]' => $data->judul,
            '[nomor_rks]' => $dataDetail->addendum_rks_nomor,
            '[tgl_gabungan_rks]' => $gabungan1,
            '[perusahaan_nama]' => $perusahaan->nama,
            '[perusahaan_alamat]' => $perusahaan->alamat,
            '[perusahaan_npwp]' => $perusahaan->npwp,
            '[tgl_gabungan_pemenang]' => $gabungan
        );

        $nama_file = 'penetapan_pemenang.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadLaporanHasilEvaluasi($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->nd_usulan_penetapan_calon_pemenang_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->nd_usulan_penetapan_calon_pemenang_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->nd_usulan_penetapan_calon_pemenang_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;

        $tanggal2 = $tanggalIndo->tgl_aja($dataDetail->pengumuman_tgl);
        $bulan2 = $tanggalIndo->bln_aja($dataDetail->pengumuman_tgl);
        $tahun2 = $tanggalIndo->thn_aja($dataDetail->pengumuman_tgl);
        $gabungan2 = $tanggal2 . ' ' . $bulan2 . ' ' . $tahun2;


        $tanggal3 = $tanggalIndo->tgl_aja($dataDetail->aanwijzing_tgl);
        $bulan3 = $tanggalIndo->bln_aja($dataDetail->aanwijzing_tgl);
        $tahun3 = $tanggalIndo->thn_aja($dataDetail->aanwijzing_tgl);
        $gabungan3 = $tanggal3 . ' ' . $bulan3 . ' ' . $tahun3;

        $tanggal4 = $tanggalIndo->tgl_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $bulan4 = $tanggalIndo->bln_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $tahun4 = $tanggalIndo->thn_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $gabungan4 = $tanggal4 . ' ' . $bulan4 . ' ' . $tahun4;


        $tanggal5 = $tanggalIndo->tgl_aja($dataDetail->pengumuman_hasil_evaluasi_sampul_satu_tgl);
        $bulan5 = $tanggalIndo->bln_aja($dataDetail->pengumuman_hasil_evaluasi_sampul_satu_tgl);
        $tahun5 = $tanggalIndo->thn_aja($dataDetail->pengumuman_hasil_evaluasi_sampul_satu_tgl);
        $gabungan5 = $tanggal5 . ' ' . $bulan5 . ' ' . $tahun5;


        $word = new WordTemplate();
        $file = public_path('doc/pj/laporan_hasil_evaluasi.rtf');

        $array = array(
            '[judul]' => $data->judul,
            '[laporan_nomor]' => $dataDetail->laporan_hasil_evaluasi_nomor,
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[rks_gabungan_tgl]' => $gabungan1,
            '[pengumuman_nomor]' => $dataDetail->pengumuman_nomor,
            '[pengumuman_gabungan_tgl]' => $gabungan2,
            '[aanwijzing_nomor]' => $dataDetail->aanwijzing_nomor,
            '[aanwijzing_gabungan_tgl]' => $gabungan3,
            '[pembukaan_penawaran_sampul_dua_nomor]' => $dataDetail->pembukaan_penawaran_sampul_dua_nomor,
            '[pembukaan_penawaran_sampul_dua_gabungan_tgl]' => $gabungan4,
            '[pengumuman_hasil_evaluasi_sampul_satu_nomor]' => $dataDetail->pengumuman_hasil_evaluasi_sampul_satu_nomor,
            '[pengumuman_hasil_evaluasi_sampul_satu_gabungan_tgl]' => $gabungan5,

        );

        $nama_file = 'laporan_hasil_evaluasi.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadUndanganHasilKlarifikasi($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->undangan_klarifikasi_dan_nego_penawaran_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->undangan_klarifikasi_dan_nego_penawaran_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->undangan_klarifikasi_dan_nego_penawaran_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;

        $word = new WordTemplate();
        $file = public_path('doc/pj/klarifikasi_dan_nego/undangan_klarifikasi_negosiasi.rtf');

        $array = array(
            '[nomor]' => $dataDetail->undangan_klarifikasi_dan_nego_penawaran_nomor,
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[judul]' => $data->judul,
            '[hari]' => $dataDetail->undangan_klarifikasi_dan_nego_penawaran_hari,
            '[manager]' => $data->direksi,
            '[tanggal]' => $gabungan,
            '[rks_gabungan_tgl]' => $gabungan1
        );

        $nama_file = 'undangan_klarifikasi_negosiasi.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadDaftarHadirPelaksanaKlarifikasi($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->undangan_klarifikasi_dan_nego_penawaran_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->undangan_klarifikasi_dan_nego_penawaran_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->undangan_klarifikasi_dan_nego_penawaran_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/klarifikasi_dan_nego/daftar_hadir_pelaksana_klarifikasi.rtf');

        $array = array(
            '[hari]' => $dataDetail->undangan_klarifikasi_dan_nego_penawaran_hari,
            '[tanggal]' => $gabungan,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[pic_pelaksana]' => $data->pic_pelaksana,
        );

        $nama_file = 'daftar_hadir_pelaksana_klarifikasi.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadDaftarHadirPenyediaKlarifikasi($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->undangan_klarifikasi_dan_nego_penawaran_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->undangan_klarifikasi_dan_nego_penawaran_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->undangan_klarifikasi_dan_nego_penawaran_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/klarifikasi_dan_nego/daftar_hadir_penyedia_klarifikasi.rtf');

        $array = array(
            '[hari]' => $dataDetail->undangan_klarifikasi_dan_nego_penawaran_hari,
            '[tanggal]' => $gabungan,
        );

        $nama_file = 'daftar_hadir_penyedia_klarifikasi.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadBeritaAcaraKlarifikasi($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();
        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->ba_hasil_klarifikasi_dan_nego_penawaran_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->ba_hasil_klarifikasi_dan_nego_penawaran_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->ba_hasil_klarifikasi_dan_nego_penawaran_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;


        $word = new WordTemplate();
        $file = public_path('doc/pj/klarifikasi_dan_nego/berita_acara_klarifikasi.rtf');

        $array = array(
            '[nomor]' => $dataDetail->ba_hasil_klarifikasi_dan_nego_penawaran_nomor,
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[rks_tanggal]' => $gabungan1,
            '[hps]' => $data->hps,
            '[penawaran]' => $data->harga_penawaran,
            '[perusahaan_nama]' => $perusahaan->nama,
            '[perusahaan_alamat]' => $perusahaan->alamat,
            '[perusahaan_npwp]' => $perusahaan->npwp,
            '[perusahaan_pimpinan]' => $perusahaan->pimpinan,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[manager]' => $data->direksi,
        );

        $nama_file = 'berita_acara_klarifikasi.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadRekapitulasi($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $spreadsheet = new Spreadsheet();

        $loadFile = public_path('doc/pj/klarifikasi_dan_nego/rekapitulasi.xls');
        $sSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($loadFile);
        $worksheet = $sSheet->getSheetByName('Hasil Koreksi');
        $worksheet->setCellValue('A10', 'RKS No. : ' . $dataDetail->addendum_rks_nomor);
        $worksheet->setCellValue('A9', 'Tanggal : ' . $dataDetail->addendum_rks_tgl);

        $worksheet->setCellValue('C43', $perusahaan->pimpinan);
        $worksheet->setCellValue('G43', $data->pejabat_pelaksana);
        $worksheet->setCellValue('D52', $data->direksi);

        $date = date('d-m-y-' . substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "export_" . $date . ".xlsx";

        try {
            $writer = new Xlsx($sSheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        header("Content-Disposition: attachment; filename=" . $filename);

        unlink($filename);
        exit($content);
    }

    public function downloadAsman($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();
        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->undangan_aanwijzing_peserta_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->undangan_aanwijzing_peserta_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->undangan_aanwijzing_peserta_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/aanwijzing/undangan_asman_user.rtf');

        $array = array(
            '[nomor]' => $dataDetail->undangan_aanwijzing_peserta_nomor,
            '[hari]' => $dataDetail->undangan_aanwijzing_peserta_hari,
            '[tanggal]' => $gabungan

        );

        $nama_file = 'undangan_asman_user.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPenjelasan($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();
        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->undangan_aanwijzing_direksi_pekerjaan_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->undangan_aanwijzing_direksi_pekerjaan_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->undangan_aanwijzing_direksi_pekerjaan_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/aanwijzing/undangan_penjelasan.rtf');

        $array = array(
            '[nomor]' => $dataDetail->undangan_aanwijzing_direksi_pekerjaan_nomor,
            '[hari]' => $dataDetail->undangan_aanwijzing_direksi_pekerjaan_hari,
            '[tanggal]' => $gabungan,
            '[manager]' => $data->direksi,

        );

        $nama_file = 'undangan_penjelasan.doc';

        return $word->export($file, $array, $nama_file);
    }


    public function downloadAanwijzingForm($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->aanwijzing_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->aanwijzing_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->aanwijzing_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/aanwijzing/form_daftar_hadir_pelaksana.rtf');

        $array = array(
            '[hari]' => $dataDetail->aanwijzing_hari,
            '[tanggal]' => $gabungan,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[pic_pelaksana]' => $data->pic_pelaksana,
        );

        $nama_file = 'form_daftar_hadir_pelaksana.doc';

        return $word->export($file, $array, $nama_file);
    }


    public function downloadAanwijzingBeritaAcara($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();
        $tanggalIndo = new TanggalIndo();

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;


        $word = new WordTemplate();
        $file = public_path('doc/pj/aanwijzing/berita_acara.rtf');

        $array = array(
            '[nomor]' => $dataDetail->aanwijzing_nomor,
            '[hari]' => $dataDetail->aanwijzing_hari,
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[rks_tanggal]' => $gabungan1,
            '[judul]' => $data->judul,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana


        );

        $nama_file = 'berita_acara.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadAanwijzingDaftarHadir($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->aanwijzing_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->aanwijzing_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->aanwijzing_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/aanwijzing/daftar_hadir_penyedia.rtf');

        $array = array(
            '[hari]' => $dataDetail->aanwijzing_hari,
            '[tanggal]' => $gabungan,
        );

        $nama_file = 'daftar_hadir_penyedia.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadAddendum($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->aanwijzing_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->aanwijzing_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->aanwijzing_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;


        $word = new WordTemplate();
        $file = public_path('doc/pj/addendum_rks.rtf');

        $array = array(
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[rks_tanggal]' => $gabungan1,
            '[judul]' => $data->judul,
            '[manager]' => $data->direksi,
            '[hari]' => $dataDetail->addendum_rks_hari,
            '[tanggal]' => $tanggal1,
            '[bulan]' => $bulan1,
            '[tahun]' => $tahun1

        );

        $nama_file = 'addendum_rks.doc';

        return $word->export($file, $array, $nama_file);
    }


    public function downloadPembukaan1Ba($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();
        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->pembukaan_penawaran_sampul_satu_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->pembukaan_penawaran_sampul_satu_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->pembukaan_penawaran_sampul_satu_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;


        $word = new WordTemplate();
        $file = public_path('doc/pj/pembukaan_dok/pembukaan_dok_penawaran.rtf');

        $array = array(
            '[nomor]' => $dataDetail->pembukaan_penawaran_sampul_satu_nomor,
            '[hari]' => $dataDetail->pembukaan_penawaran_sampul_satu_hari,
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[rks_tanggal]' => $gabungan1,
            '[judul]' => $data->judul,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[tanggal]' => $tanggal,
            '[bulan]' => $bulan,
            '[tahun]' => $tahun


        );

        $nama_file = 'pembukaan_dok_penawaran.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPembukaan1Catatan($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $spreadsheet = new Spreadsheet();

        $loadFile = public_path('doc/pj/pembukaan_dok/catatan_hasil.xls');
        $sSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($loadFile);
        $worksheet = $sSheet->getSheetByName('Catatan Pembukaan');
        $worksheet->setCellValue('A7', $data->judul);
        $worksheet->setCellValue('A9', 'RKS No. : ' . $dataDetail->pembukaan_penawaran_sampul_satu_nomor);
        $worksheet->setCellValue('A10', 'Tanggal : ' . $dataDetail->pembukaan_penawaran_sampul_satu_tgl);

        $worksheet->setCellValue('H90', $data->pejabat_pelaksana);

        $date = date('d-m-y-' . substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "export_" . $date . ".xlsx";

        try {
            $writer = new Xlsx($sSheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        header("Content-Disposition: attachment; filename=" . $filename);

        unlink($filename);
        exit($content);
    }

    public function downloadPembukaan1Pelaksana($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->pembukaan_penawaran_sampul_satu_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->pembukaan_penawaran_sampul_satu_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->pembukaan_penawaran_sampul_satu_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/pembukaan_dok/daftar_hadir_pelaksana.rtf');

        $array = array(
            '[hari]' => $dataDetail->pembukaan_penawaran_sampul_satu_hari,
            '[tanggal]' => $gabungan,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[pic_pelaksana]' => $data->pic_pelaksana,
        );

        $nama_file = 'daftar_hadir_pelaksana.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPembukaan1Penyedia($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->pembukaan_penawaran_sampul_satu_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->pembukaan_penawaran_sampul_satu_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->pembukaan_penawaran_sampul_satu_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/pembukaan_dok/daftar_hadir_penyedia.rtf');

        $array = array(
            '[hari]' => $dataDetail->pembukaan_penawaran_sampul_satu_hari,
            '[tanggal]' => $gabungan,
        );

        $nama_file = 'daftar_hadir_penyedia.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadEva1Hadir($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->evaluasi_dok_penawaran_sampul_satu_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->evaluasi_dok_penawaran_sampul_satu_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->evaluasi_dok_penawaran_sampul_satu_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/evaluasi_sampul_satu/daftar_hadir.rtf');

        $array = array(
            '[hari]' => $dataDetail->evaluasi_dok_penawaran_sampul_satu_hari,
            '[tanggal]' => $gabungan,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[pic_pelaksana]' => $data->pic_pelaksana,
        );

        $nama_file = 'daftar_hadir.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadEva1Penilaian($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();
        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->evaluasi_dok_penawaran_sampul_satu_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->evaluasi_dok_penawaran_sampul_satu_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->evaluasi_dok_penawaran_sampul_satu_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;


        $word = new WordTemplate();
        $file = public_path('doc/pj/evaluasi_sampul_satu/hasil_penilaian.rtf');

        $array = array(
            '[nomor]' => $dataDetail->evaluasi_dok_penawaran_sampul_satu_nomor,
            '[hari]' => $dataDetail->evaluasi_dok_penawaran_sampul_satu_hari,
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[rks_tanggal]' => $gabungan1,
            '[judul]' => $data->judul,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[manager]' => $data->direksi,
            '[tanggal]' => $tanggal,
            '[bulan]' => $bulan,
            '[tahun]' => $tahun


        );

        $nama_file = 'hasil_penilaian.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadEva1Hasil($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $spreadsheet = new Spreadsheet();

        $loadFile = public_path('doc/pj/evaluasi_sampul_satu/rekap_hasil_penilaian.xls');
        $sSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($loadFile);
        $worksheet = $sSheet->getSheetByName('Catatan Eva Adm');
        $worksheet->setCellValue('A9', 'RKS No. : ' . $dataDetail->evaluasi_dok_penawaran_sampul_satu_nomor);
        $worksheet->setCellValue('A10', 'Tanggal : ' . $dataDetail->evaluasi_dok_penawaran_sampul_satu_tgl);

        $worksheet->setCellValue('D50', $data->direksi);
        $worksheet->setCellValue('G50', $data->pejabat_pelaksana);

        $date = date('d-m-y-' . substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "export_" . $date . ".xlsx";

        try {
            $writer = new Xlsx($sSheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        header("Content-Disposition: attachment; filename=" . $filename);

        unlink($filename);
        exit($content);
    }

    public function downloadEva1Pengumuman($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();


        $word = new WordTemplate();
        $file = public_path('doc/pj/pembukaan_dok2/pengumuman_hasil_sampul1.rtf');

        $array = array(
            '[nomor]' => $dataDetail->pengumuman_hasil_evaluasi_sampul_satu_nomor,
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[judul]' => $data->judul,


        );

        $nama_file = 'pengumuman_hasil_sampul1.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPembukaan2Ba($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();
        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;


        $word = new WordTemplate();
        $file = public_path('doc/pj/pembukaan_dok2/pembukaan_dok_penawaran.rtf');

        $array = array(
            '[nomor]' => $dataDetail->pembukaan_penawaran_sampul_dua_nomor,
            '[hari]' => $dataDetail->pembukaan_penawaran_sampul_dua_hari,
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[rks_tanggal]' => $gabungan1,
            '[judul]' => $data->judul,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[tanggal]' => $tanggal,
            '[bulan]' => $bulan,
            '[tahun]' => $tahun


        );

        $nama_file = 'pembukaan_dok_penawaran.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPembukaan2Undangan($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();
        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;


        $word = new WordTemplate();
        $file = public_path('doc/pj/pembukaan_dok2/undangan_pembukaan.rtf');

        $array = array(
            '[nomor]' => $dataDetail->pembukaan_penawaran_sampul_dua_nomor,
            '[hari]' => $dataDetail->pembukaan_penawaran_sampul_dua_hari,
            '[manager]' => $data->direksi,
            '[tanggal]' => $gabungan,


        );

        $nama_file = 'undangan_pembukaan.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPembukaan2Pelaksana($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/pembukaan_dok2/daftar_hadir_pelaksana.rtf');

        $array = array(
            '[hari]' => $dataDetail->pembukaan_penawaran_sampul_dua_hari,
            '[tanggal]' => $gabungan,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[pic_pelaksana]' => $data->pic_pelaksana,
        );

        $nama_file = 'daftar_hadir_pelaksana.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPembukaan2Penyedia($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->pembukaan_penawaran_sampul_dua_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/pembukaan_dok2/daftar_hadir_penyedia.rtf');

        $array = array(
            '[hari]' => $dataDetail->pembukaan_penawaran_sampul_dua_hari,
            '[tanggal]' => $gabungan,
        );

        $nama_file = 'daftar_hadir_penyedia.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadEva2Hadir($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/evaluasi_sampul_dua/daftar_hadir_pelaksana.rtf');

        $array = array(
            '[hari]' => $dataDetail->evaluasi_dok_penawaran_sampul_dua_hari,
            '[tanggal]' => $gabungan,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[pic_pelaksana]' => $data->pic_pelaksana,
        );

        $nama_file = 'daftar_hadir_pelaksana.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadEva2Penilaian($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();
        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;


        $word = new WordTemplate();
        $file = public_path('doc/pj/evaluasi_sampul_dua/hasil_penilaian.rtf');

        $array = array(
            '[nomor]' => $dataDetail->evaluasi_dok_penawaran_sampul_dua_nomor,
            '[hari]' => $dataDetail->evaluasi_dok_penawaran_sampul_dua_hari,
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[rks_tanggal]' => $gabungan1,
            '[judul]' => $data->judul,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[manager]' => $data->direksi,
            '[tanggal]' => $tanggal,
            '[bulan]' => $bulan,
            '[tahun]' => $tahun


        );

        $nama_file = 'hasil_penilaian.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadEva2Hasil($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $spreadsheet = new Spreadsheet();

        $loadFile = public_path('doc/pj/evaluasi_sampul_dua/rekap_hasil.xls');
        $sSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($loadFile);
        $worksheet = $sSheet->getSheetByName('Catatan Eva Harga');
        $worksheet->setCellValue('A9', 'RKS No. : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_nomor);
        $worksheet->setCellValue('A10', 'Tanggal : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);

        $worksheet->setCellValue('F42', $data->pejabat_pelaksana);


        $worksheet1 = $sSheet->getSheetByName('Hasil Koreksi');
        $worksheet1->setCellValue('A9', 'RKS No. : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_nomor);
        $worksheet1->setCellValue('A10', 'Tanggal : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);

        $worksheet1->setCellValue('H53', $data->pejabat_pelaksana);


        $date = date('d-m-y-' . substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "export_" . $date . ".xlsx";

        try {
            $writer = new Xlsx($sSheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        header("Content-Disposition: attachment; filename=" . $filename);

        unlink($filename);
        exit($content);
    }

    public function downloadEva2CatatanKoreksi($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $spreadsheet = new Spreadsheet();

        $loadFile = public_path('doc/pj/evaluasi_sampul_dua/catatan_koreksi.xls');
        $sSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($loadFile);
        $worksheet = $sSheet->getSheetByName('Hasil Koreksi');
        $worksheet->setCellValue('A9', 'RKS No. : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_nomor);
        $worksheet->setCellValue('A10', 'Tanggal : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);


        $worksheet1 = $sSheet->getSheetByName('Kertas Kerja');
        $worksheet1->setCellValue('A6', 'RKS No. : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_nomor);
        $worksheet1->setCellValue('A7', 'Tanggal : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);

        $worksheet1->setCellValue('I48', $data->pejabat_pelaksana);


        $date = date('d-m-y-' . substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "export_" . $date . ".xlsx";

        try {
            $writer = new Xlsx($sSheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        header("Content-Disposition: attachment; filename=" . $filename);

        unlink($filename);
        exit($content);
    }



    public function downloadSkpp($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $tanggalIndo = new TanggalIndo();


        $tanggal = $tanggalIndo->tgl_aja($dataDetail->laporan_hasil_evaluasi_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->laporan_hasil_evaluasi_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->laporan_hasil_evaluasi_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->nd_usulan_penetapan_calon_pemenang_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->nd_usulan_penetapan_calon_pemenang_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->nd_usulan_penetapan_calon_pemenang_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;

        $tanggal2 = $tanggalIndo->tgl_aja($dataDetail->nd_penetapan_calon_pemenang_tgl);
        $bulan2 = $tanggalIndo->bln_aja($dataDetail->nd_penetapan_calon_pemenang_tgl);
        $tahun2 = $tanggalIndo->thn_aja($dataDetail->nd_penetapan_calon_pemenang_tgl);
        $gabungan2 = $tanggal2 . ' ' . $bulan2 . ' ' . $tahun2;

        $word = new WordTemplate();
        $file = public_path('doc/pj/skpp.rtf');

        $array = array(
            '[nomor]' => $dataDetail->skkp_nomor,
            '[evaluasi_nomor]' => $dataDetail->laporan_hasil_evaluasi_nomor,
            '[evaluasi_tanggal]' => $gabungan,
            '[usulan_penetapan_pemenang_nomor]' => $dataDetail->nd_usulan_penetapan_calon_pemenang_nomor,
            '[usulan_penetapan_pemenang_tanggal]' => $gabungan1,
            '[penetapan_pemenang_nomor]' => $dataDetail->nd_penetapan_calon_pemenang_nomor,
            '[penetapan_pemenang_tanggal]' => $gabungan2,
            '[judul]' => $data->judul,
            '[perusahaan_nama]' => $perusahaan->nama,
            '[perusahaan_jalan]' => $perusahaan->alamat,
            '[perusahaan_npwp]' => $perusahaan->npwp,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,


        );

        $nama_file = 'skpp.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadSppbj($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $tanggalIndo = new TanggalIndo();


        $tanggal = $tanggalIndo->tgl_aja($dataDetail->penunjukan_pemenang_tanggal);
        $bulan = $tanggalIndo->bln_aja($dataDetail->penunjukan_pemenang_tanggal);
        $tahun = $tanggalIndo->thn_aja($dataDetail->penunjukan_pemenang_tanggal);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->nd_usulan_penetapan_calon_pemenang_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->nd_usulan_penetapan_calon_pemenang_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->nd_usulan_penetapan_calon_pemenang_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;

        $tanggal2 = $tanggalIndo->tgl_aja($dataDetail->nd_penetapan_calon_pemenang_tgl);
        $bulan2 = $tanggalIndo->bln_aja($dataDetail->nd_penetapan_calon_pemenang_tgl);
        $tahun2 = $tanggalIndo->thn_aja($dataDetail->nd_penetapan_calon_pemenang_tgl);
        $gabungan2 = $tanggal2 . ' ' . $bulan2 . ' ' . $tahun2;

        $word = new WordTemplate();
        $file = public_path('doc/pj/penunjukan_pemenang.rtf');

        $array = array(
            '[nomor]' => $dataDetail->penunjukan_pemenang_nomor,
            '[tanggal]' => $gabungan,
            '[judul]' => $data->judul,
            '[perusahaan_pimpinan]' => $perusahaan->pimpinan,
            '[perusahaan_sebutan_jabatan]' => $perusahaan->sebutan_jabatan,
            '[perusahaan_nama]' => $perusahaan->nama,
            '[perusahaan_alamat]' => $perusahaan->alamat,
            '[perusahaan_npwp]' => $perusahaan->npwp,
            '[manager]' => $data->direksi,


        );

        $nama_file = 'penunjukan_pemenang.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPengumumanCalon($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $tanggalIndo = new TanggalIndo();


        $tanggal = $tanggalIndo->tgl_aja($dataDetail->laporan_hasil_evaluasi_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->laporan_hasil_evaluasi_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->laporan_hasil_evaluasi_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->nd_penetapan_calon_pemenang_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->nd_penetapan_calon_pemenang_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->nd_penetapan_calon_pemenang_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;


        $word = new WordTemplate();
        $file = public_path('doc/pj/pengumuman_hasil.rtf');

        $array = array(
            '[nomor]' => $dataDetail->penunjukan_pemenang_nomor,
            '[tanggal]' => $gabungan,
            '[laporan_hasil_evaluasi_nomor]' => $dataDetail->laporan_hasil_evaluasi_nomor,
            '[laporan_hasil_evaluasi_tanggal]' => $gabungan,
            '[nd_penetapan_calon_pemenang_nomor]' => $dataDetail->nd_penetapan_calon_pemenang_nomor,
            '[nd_penetapan_calon_pemenang_tanggal]' => $gabungan1,
            '[judul]' => $data->judul,
            '[perusahaan_pimpinan]' => $perusahaan->pimpinan,
            '[perusahaan_sebutan_jabatan]' => $perusahaan->sebutan_jabatan,
            '[perusahaan_nama]' => $perusahaan->nama,
            '[perusahaan_alamat]' => $perusahaan->alamat,
            '[perusahaan_npwp]' => $perusahaan->npwp,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,


        );

        $nama_file = 'pengumuman_hasil.doc';

        return $word->export($file, $array, $nama_file);
    }


    public function downloadPembuktianUndangan($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $tanggalIndo = new TanggalIndo();
        $word = new WordTemplate();
        $file = public_path('doc/pj/pembuktian_kualifikasi/undangan_pembuktian_kualifikasi.rtf');
        $tanggal = $tanggalIndo->tgl_aja($dataDetail->undangan_pembuktian_kualifikasi_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->undangan_pembuktian_kualifikasi_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->undangan_pembuktian_kualifikasi_tgl);

        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;
        $array = array(
            '[nomor]' => $dataDetail->undangan_pembuktian_kualifikasi_nomor,
            '[hari]' => $dataDetail->undangan_pembuktian_kualifikasi_hari,
            '[tanggal]' => $gabungan,
            '[manager]' => $data->direksi,


        );

        $nama_file = 'undangan_pembuktian_kualifikasi.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPembuktianDaftarPelaksana($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->undangan_pembuktian_kualifikasi_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->undangan_pembuktian_kualifikasi_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->undangan_pembuktian_kualifikasi_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/pembuktian_kualifikasi/daftar_hadir_pelaksana_kualifikasi.rtf');

        $array = array(
            '[hari]' => $dataDetail->undangan_pembuktian_kualifikasi_hari,
            '[tanggal]' => $gabungan,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[pic_pelaksana]' => $data->pic_pelaksana,
        );

        $nama_file = 'daftar_hadir_pelaksana_kualifikasi.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPembuktianDaftarPenyedia($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->undangan_pembuktian_kualifikasi_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->undangan_pembuktian_kualifikasi_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->undangan_pembuktian_kualifikasi_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/pembuktian_kualifikasi/daftar_penyedia.rtf');

        $array = array(
            '[hari]' => $dataDetail->undangan_pembuktian_kualifikasi_hari,
            '[tanggal]' => $gabungan,
        );

        $nama_file = 'daftar_hadir_penyedia_kualifikasi.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPembuktianRekap($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $spreadsheet = new Spreadsheet();

        $loadFile = public_path('doc/pj/pembuktian_kualifikasi/rekapitulasi_kualifikasi.xlsx');
        $sSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($loadFile);
        $worksheet = $sSheet->getSheetByName('Pembuktian Kualifikasi');
        $worksheet->setCellValue('A9', 'RKS No. : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_nomor);
        $worksheet->setCellValue('A10', 'Tanggal : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);

        $worksheet->setCellValue('F43', $data->pejabat_pelaksana);



        $date = date('d-m-y-' . substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "export_" . $date . ".xlsx";

        try {
            $writer = new Xlsx($sSheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        header("Content-Disposition: attachment; filename=" . $filename);

        unlink($filename);
        exit($content);
    }

    public function downloadPembuktianHasil($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->pembuktian_kualifikasi_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->pembuktian_kualifikasi_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->pembuktian_kualifikasi_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;

        $word = new WordTemplate();
        $file = public_path('doc/pj/pembuktian_kualifikasi/berita_acara_kualifikasi.rtf');

        $array = array(
            '[nomor]' => $dataDetail->pembuktian_kualifikasi_nomor,
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[rks_tanggal]' => $gabungan1,
            '[tanggal]' => $tanggal,
            '[bulan]' => $bulan,
            '[tahun]' => $tahun,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana
        );

        $nama_file = 'berita_acara_kualifikasi.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPemasukanPenawaran($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $bulan = $tanggalIndo->bln_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $tahun = $tanggalIndo->thn_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->pemasukan_dok_penawaran_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->pemasukan_dok_penawaran_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->pemasukan_dok_penawaran_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;

        $word = new WordTemplate();
        $file = public_path('doc/pj/pemasukan_dok_penawaran.rtf');

        $array = array(
            '[hari]' => $dataDetail->pemasukan_dok_penawaran_hari_dari,
            '[tanggal]' =>$gabungan,
            '[hari1]' => $dataDetail->pemasukan_dok_penawaran_hari,
            '[tanggal1]' => $gabungan1,

        );

        $nama_file = 'pemasukan_dok_penawaran.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPembukaanPenawaranBa($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();
        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->pembukaan_penawaran_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->pembukaan_penawaran_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->pembukaan_penawaran_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;


        $word = new WordTemplate();
        $file = public_path('doc/pj/pembukaan_penawaran/ba.rtf');

        $array = array(
            '[nomor]' => $dataDetail->pembukaan_penawaran_nomor,
            '[hari]' => $dataDetail->pembukaan_penawaran_hari,
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[rks_tanggal]' => $gabungan1,
            '[judul]' => $data->judul,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[tanggal]' => $tanggal,
            '[bulan]' => $bulan,
            '[tahun]' => $tahun


        );

        $nama_file = 'pembukaan_dok_penawaran.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPembukaanPenawaranCatatan($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $spreadsheet = new Spreadsheet();

        $loadFile = public_path('doc/pj/pembukaan_penawaran/catatan.xls');
        $sSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($loadFile);
        $worksheet = $sSheet->getSheetByName('Catatan Pembukaan');
        $worksheet->setCellValue('A7', $data->judul);
        $worksheet->setCellValue('A9', 'RKS No. : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_nomor);
        $worksheet->setCellValue('A10', 'Tanggal : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);

        $worksheet->setCellValue('H90', $data->pejabat_pelaksana);



        $date = date('d-m-y-' . substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "export_" . $date . ".xlsx";

        try {
            $writer = new Xlsx($sSheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        header("Content-Disposition: attachment; filename=" . $filename);

        unlink($filename);
        exit($content);
    }


    public function downloadPembukaanPenawaranPelaksana($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->pembukaan_penawaran_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->pembukaan_penawaran_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->pembukaan_penawaran_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/pembukaan_penawaran/daftar_pelaksana.rtf');

        $array = array(
            '[hari]' => $dataDetail->pembukaan_penawaran_hari,
            '[tanggal]' => $gabungan,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[pic_pelaksana]' => $data->pic_pelaksana,
        );

        $nama_file = 'daftar_hadir_pelaksana.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadPembukaanPenawaranPenyedia($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->pembukaan_penawaran_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->pembukaan_penawaran_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->pembukaan_penawaran_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/pembukaan_penawaran/daftar_penyedia.rtf');

        $array = array(
            '[hari]' => $dataDetail->pembukaan_penawaran_hari,
            '[tanggal]' => $gabungan,
        );

        $nama_file = 'daftar_hadir_penyedia.doc';

        return $word->export($file, $array, $nama_file);
    }


    public function downloadEvaPenawaranBa($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();
        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->evaluasi_dok_penawaran_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->evaluasi_dok_penawaran_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->evaluasi_dok_penawaran_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $tanggal1 = $tanggalIndo->tgl_aja($dataDetail->addendum_rks_tgl);
        $bulan1 = $tanggalIndo->bln_aja($dataDetail->addendum_rks_tgl);
        $tahun1 = $tanggalIndo->thn_aja($dataDetail->addendum_rks_tgl);
        $gabungan1 = $tanggal1 . ' ' . $bulan1 . ' ' . $tahun1;


        $word = new WordTemplate();
        $file = public_path('doc/pj/evaluasi_penawaran/ba.rtf');

        $array = array(
            '[nomor]' => $dataDetail->evaluasi_dok_penawaran_nomor,
            '[hari]' => $dataDetail->evaluasi_dok_penawaran_hari,
            '[rks_nomor]' => $dataDetail->addendum_rks_nomor,
            '[rks_tanggal]' => $gabungan1,
            '[judul]' => $data->judul,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[tanggal]' => $tanggal,
            '[bulan]' => $bulan,
            '[tahun]' => $tahun


        );

        $nama_file = 'pembukaan_dok_penawaran.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadEvaPenawaranCatatan($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $spreadsheet = new Spreadsheet();

        $loadFile = public_path('doc/pj/evaluasi_penawaran/catatan.xls');
        $sSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($loadFile);
        $worksheet = $sSheet->getSheetByName('Hasil Koreksi');
        $worksheet->setCellValue('A7', $data->judul);
        $worksheet->setCellValue('A9', 'RKS No. : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_nomor);
        $worksheet->setCellValue('A10', 'Tanggal : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);


        $worksheet1 = $sSheet->getSheetByName('Kertas Kerja');
        $worksheet1->setCellValue('A3', $data->judul);
        $worksheet1->setCellValue('A6', 'RKS No. : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_nomor);
        $worksheet1->setCellValue('A7', 'Tanggal : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);

        $worksheet1->setCellValue('I48', $data->pejabat_pelaksana);



        $date = date('d-m-y-' . substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "export_" . $date . ".xlsx";

        try {
            $writer = new Xlsx($sSheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        header("Content-Disposition: attachment; filename=" . $filename);

        unlink($filename);
        exit($content);
    }

    public function downloadEvaPenawaranDaftar($id)
    {
        $data = Pengadaan::where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($dataDetail->evaluasi_dok_penawaran_tgl);
        $bulan = $tanggalIndo->bln_aja($dataDetail->evaluasi_dok_penawaran_tgl);
        $tahun = $tanggalIndo->thn_aja($dataDetail->evaluasi_dok_penawaran_tgl);
        $gabungan = $tanggal . ' ' . $bulan . ' ' . $tahun;

        $word = new WordTemplate();
        $file = public_path('doc/pj/evaluasi_penawaran/daftar_hadir.rtf');

        $array = array(
            '[hari]' => $dataDetail->evaluasi_dok_penawaran_hari,
            '[tanggal]' => $gabungan,
            '[pejabat_pelaksana]' => $data->pejabat_pelaksana,
            '[pic_pelaksana]' => $data->pic_pelaksana,
        );

        $nama_file = 'daftar_hadir_pelaksana.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadEvaPenawaranRekap($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $spreadsheet = new Spreadsheet();

        $loadFile = public_path('doc/pj/evaluasi_penawaran/rekap.xls');
        $sSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($loadFile);
        $worksheet = $sSheet->getSheetByName('Catatan Eva Adm');
        $worksheet->setCellValue('A7', $data->judul);
        $worksheet->setCellValue('A9', 'RKS No. : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_nomor);
        $worksheet->setCellValue('A10', 'Tanggal : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);
        $worksheet->setCellValue('D50', $data->direksi);
        $worksheet->setCellValue('G50', $data->pejabat_pelaksana);




        $date = date('d-m-y-' . substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "export_" . $date . ".xlsx";

        try {
            $writer = new Xlsx($sSheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        header("Content-Disposition: attachment; filename=" . $filename);

        unlink($filename);
        exit($content);
    }

    public function downloadEvaPenawaranRekapHasil($id)
    {
        $data = Pengadaan::with('getmp2')->where('id', $id)->first();
        $dataDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $perusahaan = Perusahaan::where('id', $data->id_perusahaan)->first();

        $spreadsheet = new Spreadsheet();

        $loadFile = public_path('doc/pj/evaluasi_penawaran/rekap_hasil.xls');
        $sSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($loadFile);
        $worksheet = $sSheet->getSheetByName('Catatan Eva Harga');
        $worksheet->setCellValue('A7', $data->judul);
        $worksheet->setCellValue('A9', 'RKS No. : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_nomor);
        $worksheet->setCellValue('A10', 'Tanggal : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);
        $worksheet->setCellValue('F42', $data->pejabat_pelaksana);

        $worksheet1 = $sSheet->getSheetByName('Hasil Koreksi');
        $worksheet1->setCellValue('A7', $data->judul);
        $worksheet1->setCellValue('A9', 'RKS No. : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_nomor);
        $worksheet1->setCellValue('A10', 'Tanggal : ' . $dataDetail->evaluasi_dok_penawaran_sampul_dua_tgl);
        $worksheet1->setCellValue('H53', $data->pejabat_pelaksana);




        $date = date('d-m-y-' . substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "export_" . $date . ".xlsx";

        try {
            $writer = new Xlsx($sSheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        header("Content-Disposition: attachment; filename=" . $filename);

        unlink($filename);
        exit($content);
    }


}
