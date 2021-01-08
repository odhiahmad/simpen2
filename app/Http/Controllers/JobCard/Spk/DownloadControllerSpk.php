<?php


namespace App\Http\Controllers\JobCard\Spk;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Template\TanggalIndo;
use App\Pengadaan;
use App\PengadaanDetailSpk;
use Novay\WordTemplate\WordTemplate;

class DownloadControllerSpk extends Controller
{
    public function downloadRks($id){
        $data = Pengadaan::with('getmp2')->where('id',$id)->first();
        $dataDetail = PengadaanDetailSpk::where('id_pengadaan',$id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($dataDetail->rks_tgl);
        $bulan=$tanggalIndo->bln_aja($dataDetail->rks_tgl);
        $tahun=$tanggalIndo->thn_aja($dataDetail->rks_tgl);

        $gabungan = $tanggal.' '.$bulan.' '.$tahun;

        $word = new WordTemplate();
        $file = public_path('doc/spk/rks.rtf');

        $array = array(
            '[Judul]' => $data->judul,
            '[Nomor_Rks]' => $dataDetail->rks_nomor,
            '[Tanggal_Rks]' => $gabungan,
            '[Tahun_Anggaran]' => $data->tahun,
            '[Metode_Pengadaan]' => $data['getmp2']['nama'],

        );

        $nama_file = 'survey-harga-pasar.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadSurveyHargaPasar($id){
        $data = Pengadaan::where('id',$id)->first();
        $dataDetail = PengadaanDetailSpk::where('id_pengadaan',$id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($dataDetail->survei_harga_pasar_tgl);
        $bulan=$tanggalIndo->bln_aja($dataDetail->survei_harga_pasar_tgl);
        $tahun=$tanggalIndo->thn_aja($dataDetail->survei_harga_pasar_tgl);

        $word = new WordTemplate();
        $file = public_path('doc/spk/survey_harga_pasar.rtf');

        $array = array(
            '[Judul]' => $data->judul,
            '[Hari]' => $dataDetail->survei_harga_pasar_hari,
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

    public function downloadSurveyHargaPasar2($id){
        $data = Pengadaan::where('id',$id)->first();
        $dataDetail = PengadaanDetailSpk::where('id_pengadaan',$id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($dataDetail->survei_harga_pasar_tgl);
        $bulan=$tanggalIndo->bln_aja($dataDetail->survei_harga_pasar_tgl);
        $tahun=$tanggalIndo->thn_aja($dataDetail->survei_harga_pasar_tgl);
        $gabungan = $tanggal.' '.$bulan.' '.$tahun;

        $word = new WordTemplate();
        $file = public_path('doc/spk/survey_harga_pasar2.rtf');

        $array = array(
            '[Tanggal_shp]' => $gabungan,
            '[Tempat_Pengadaan]' => $data->tempat_penyerahan,
        );

        $nama_file = 'survey-harga-pasar2.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadUpl($id){
        $data = Pengadaan::with('getperusahaan')->where('id',$id)->first();
        $dataDetail = PengadaanDetailSpk::where('id_pengadaan',$id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggalPdari=$tanggalIndo->tgl_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $bulanPdari=$tanggalIndo->bln_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $tahunPdari=$tanggalIndo->thn_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);

        $gabunganPdari = $tanggalPdari.' '.$bulanPdari.' '.$tahunPdari;

        $tanggalPsampai=$tanggalIndo->tgl_aja($dataDetail->pemasukan_dok_penawaran_tgl_sd);
        $bulanPsampai=$tanggalIndo->bln_aja($dataDetail->pemasukan_dok_penawaran_tgl_sd);
        $tahunPsampai=$tanggalIndo->thn_aja($dataDetail->pemasukan_dok_penawaran_tgl_sd);

        $gabunganPsampai = $tanggalPsampai.' '.$bulanPsampai.' '.$tahunPsampai;

        $tanggalEdari=$tanggalIndo->tgl_aja($dataDetail->evaluasi_dokumen_tgl_dari);
        $bulanEdari=$tanggalIndo->bln_aja($dataDetail->evaluasi_dokumen_tgl_dari);
        $tahunEdari=$tanggalIndo->thn_aja($dataDetail->evaluasi_dokumen_tgl_dari);

        $gabunganEdari = $tanggalEdari.' '.$bulanEdari.' '.$tahunEdari;

        $tanggalEsampai=$tanggalIndo->tgl_aja($dataDetail->evaluasi_dokumen_tgl_sd);
        $bulanEsampai=$tanggalIndo->bln_aja($dataDetail->evaluasi_dokumen_tgl_sd);
        $tahunEsampai=$tanggalIndo->thn_aja($dataDetail->evaluasi_dokumen_tgl_sd);

        $gabunganEsampai = $tanggalEsampai.' '.$bulanEsampai.' '.$tahunEsampai;

        $tanggalSpk=$tanggalIndo->tgl_aja($dataDetail->spk_tgl);
        $bulanSpk=$tanggalIndo->bln_aja($dataDetail->spk_tgl);
        $tahunSpk=$tanggalIndo->thn_aja($dataDetail->spk_tgl);

        $gabunganSpk = $tanggalSpk.' '.$bulanSpk.' '.$tahunSpk;




        $word = new WordTemplate();
        $file = public_path('doc/spk/undangan_pengadaan_langsung.rtf');




        $array = array(
            '[Perusahaan]' => $data['getperusahaan']['nama'],
            '[Perusahaan1]' => $data['getperusahaan']['nama'],
            '[Judul]' => $data->judul,
            '[Judul1]' => $data->judul,
            '[Nilai]' => $data->hps,
            '[Tahun_Anggaran]' => $data->tahun,
            '[Pemasukan_Tgl_Dari]' => $gabunganPdari,
            '[Pemasukan_Tgl_Sampai]' => $gabunganPsampai,
            '[Evaluasi_Tgl_Dari]' => $gabunganEdari,
            '[Evaluasi_Tgl_Sampai]' => $gabunganEsampai,
            '[Spk_Tgl]' => $gabunganSpk,
            '[Ketua_Tim]' => $data->ketua,


        );

        $nama_file = 'undangan-pengadaan-langsung.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadEvaluasiDokumen1($id){
        $data = Pengadaan::with('getperusahaan')->where('id',$id)->first();
        $dataDetail = PengadaanDetailSpk::where('id_pengadaan',$id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $bulan=$tanggalIndo->bln_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $tahun=$tanggalIndo->thn_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $gabungan = $tanggal.' '.$bulan.' '.$tahun;

        $tanggal1=$tanggalIndo->tgl_aja($dataDetail->rks_tgl);
        $bulan1=$tanggalIndo->bln_aja($dataDetail->rks_tgl);
        $tahun1=$tanggalIndo->thn_aja($dataDetail->rks_tgl);
        $gabungan1 = $tanggal1.' '.$bulan1.' '.$tahun1;

        $word = new WordTemplate();
        $file = public_path('doc/spk/pemasukan_dok_penawaran.rtf');

        $array = array(
            '[Judul]' => $data->judul,
            '[Rks]' => $dataDetail->rks_nomor,
            '[Rks1]' => $dataDetail->rks_nomor,
            '[Tanggal_Rks]' => $gabungan1,
            '[Hari]' => $dataDetail->pemasukan_dok_penawaran_hari_dari,
            '[Tanggal]' => $tanggalIndo->terbilang($tanggal),
            '[Bulan]' => $bulan,
            '[Tahun]' => $tanggalIndo->terbilang($tahun),
            '[Judul1]' => $data->judul,
            '[Judul2]' => $data->judul,
            '[Direktur_Utama]' => $data['getperusahaan']['pimpinan'],
            '[Pejabat_Pelaksana]' => $data->pejabat_pelaksana,
            '[Tanggal_Pdp]' => $gabungan,
            '[Tanggal_Pdp1]' =>$gabungan,


        );

        $nama_file = 'evaluasi_dokumen1.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadEvaluasiDokumen2($id){
        $data = Pengadaan::with('getperusahaan')->where('id',$id)->first();
        $dataDetail = PengadaanDetailSpk::where('id_pengadaan',$id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $bulan=$tanggalIndo->bln_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $tahun=$tanggalIndo->thn_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $gabungan = $tanggal.' '.$bulan.' '.$tahun;

        $tanggal1=$tanggalIndo->tgl_aja($dataDetail->rks_tgl);
        $bulan1=$tanggalIndo->bln_aja($dataDetail->rks_tgl);
        $tahun1=$tanggalIndo->thn_aja($dataDetail->rks_tgl);
        $gabungan1 = $tanggal1.' '.$bulan1.' '.$tahun1;

        $word = new WordTemplate();
        $file = public_path('doc/spk/eva_dok_penawaran.rtf');

        $array = array(
            '[Judul]' => $data->judul,
            '[Rks]' => $dataDetail->rks_nomor,
            '[Tanggal_Rks]' => $gabungan1,
            '[Hari]' => $dataDetail->pemasukan_dok_penawaran_hari_dari,
            '[Tanggal]' => $tanggalIndo->terbilang($tanggal),
            '[Bulan]' => $bulan,
            '[Tahun]' => $tanggalIndo->terbilang($tahun),
            '[Judul1]' => $data->judul,
            '[Direktur_Utama]' => $data['getperusahaan']['pimpinan'],
            '[Pejabat_Pelaksana]' => $data->pejabat_pelaksana,
            '[Manager_Bagian]' => $data->ketua_tim,
            '[Nama_Perusahaan]' => $data['getperusahaan']['nama'],
            '[Alamat]' => $data['getperusahaan']['alamat'],
            '[Npwp]' => $data['getperusahaan']['npwp'],

        );

        $nama_file = 'evaluasi_dokumen1.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadEvaluasiDokumen3($id){
        $data = Pengadaan::with('getperusahaan')->where('id',$id)->first();
        $dataDetail = PengadaanDetailSpk::where('id_pengadaan',$id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $bulan=$tanggalIndo->bln_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $tahun=$tanggalIndo->thn_aja($dataDetail->pemasukan_dok_penawaran_tgl_dari);
        $gabungan = $tanggal.' '.$bulan.' '.$tahun;

        $word = new WordTemplate();
        $file = public_path('doc/spk/daftar_hadir_eva_dok.rtf');

        $array = array(
            '[Judul]' => $data->judul,
            '[Tanggal]' => $gabungan,
        );

        $nama_file = 'evaluasi_dokumen1.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadBaHasilKlarifikasi1($id){
        $data = Pengadaan::with('getperusahaan')->where('id',$id)->first();
        $dataDetail = PengadaanDetailSpk::where('id_pengadaan',$id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($dataDetail->ba_hasil_klarifikasi_tgl);
        $bulan=$tanggalIndo->bln_aja($dataDetail->ba_hasil_klarifikasi_tgl);
        $tahun=$tanggalIndo->thn_aja($dataDetail->ba_hasil_klarifikasi_tgl);
        $gabungan = $tanggal.' '.$bulan.' '.$tahun;

        $tanggal1=$tanggalIndo->tgl_aja($dataDetail->rks_tgl);
        $bulan1=$tanggalIndo->bln_aja($dataDetail->rks_tgl);
        $tahun1=$tanggalIndo->thn_aja($dataDetail->rks_tgl);
        $gabungan1 = $tanggal1.' '.$bulan1.' '.$tahun1;

        $word = new WordTemplate();
        $file = public_path('doc/spk/eva_pembuktian_kualifikasi.rtf');

        $array = array(
            '[Judul]' => $data->judul,
            '[Rks]' => $dataDetail->rks_nomor,
            '[Tanggal_Rks]' => $gabungan1,
            '[Hari]' => $dataDetail->ba_hasil_klarifikasi_hari,
            '[Tanggal]' => $tanggalIndo->terbilang($tanggal),
            '[Bulan]' => $bulan,
            '[Tahun]' => $tanggalIndo->terbilang($tahun),
            '[Pejabat_Pelaksana]' => $data->pejabat_pelaksana,
            '[Nama_Perusahaan]' => $data['getperusahaan']['nama'],
            '[Alamat]' => $data['getperusahaan']['alamat'],
            '[Npwp]' => $data['getperusahaan']['npwp'],

        );

        $nama_file = 'eva_pembuktian_kualifikasi.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadBaHasilKlarifikasi2($id){
        $data = Pengadaan::with('getperusahaan')->where('id',$id)->first();
        $dataDetail = PengadaanDetailSpk::where('id_pengadaan',$id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($dataDetail->ba_hasil_klarifikasi_tgl);
        $bulan=$tanggalIndo->bln_aja($dataDetail->ba_hasil_klarifikasi_tgl);
        $tahun=$tanggalIndo->thn_aja($dataDetail->ba_hasil_klarifikasi_tgl);
        $gabungan = $tanggal.' '.$bulan.' '.$tahun;

        $word = new WordTemplate();
        $file = public_path('doc/spk/daftar_hadir_eva_pembuktian.rtf');

        $array = array(
            '[Judul]' => $data->judul,
            '[Tanggal]' => $gabungan,
        );

        $nama_file = 'daftar_hadir_eva_pembuktian_kualifikasi.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadBaHasilKlarifikasi4($id){
        $data = Pengadaan::with('getperusahaan')->where('id',$id)->first();
        $dataDetail = PengadaanDetailSpk::where('id_pengadaan',$id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($dataDetail->ba_hasil_klarifikasi_tgl);
        $bulan=$tanggalIndo->bln_aja($dataDetail->ba_hasil_klarifikasi_tgl);
        $tahun=$tanggalIndo->thn_aja($dataDetail->ba_hasil_klarifikasi_tgl);
        $gabungan = $tanggal.' '.$bulan.' '.$tahun;

        $tanggal1=$tanggalIndo->tgl_aja($dataDetail->rks_tgl);
        $bulan1=$tanggalIndo->bln_aja($dataDetail->rks_tgl);
        $tahun1=$tanggalIndo->thn_aja($dataDetail->rks_tgl);
        $gabungan1 = $tanggal1.' '.$bulan1.' '.$tahun1;

        $word = new WordTemplate();
        $file = public_path('doc/spk/daftar_hadir_eva_nego.rtf');

        $array = array(
            '[Judul]' => $data->judul,
            '[Rks]' => $dataDetail->rks_nomor,
            '[Tanggal_Rks]' => $gabungan1,
            '[Hari]' => $dataDetail->ba_hasil_klarifikasi_hari,
            '[Hps]' => $data->harga_penawaran,
            '[Hps_Pajak]' => $data->harga_kontrak,
            '[Waktu_Penyelesaian]' => $data->jangka_waktu,
            '[Tanggal_Penuh]' => $gabungan,
            '[Tanggal]' => $tanggalIndo->terbilang($tanggal),
            '[Bulan]' => $bulan,
            '[Tahun]' => $tanggalIndo->terbilang($tahun),
            '[Pejabat_Pelaksana]' => $data->pejabat_pelaksana,
            '[Manager]' => $data->ketua_tim,
            '[Direktur]' => $data['getperusahaan']['pimpinan'],
            '[Nama_Perusahaan]' => $data['getperusahaan']['nama'],
            '[Alamat]' => $data['getperusahaan']['alamat'],
            '[Npwp]' => $data['getperusahaan']['npwp'],

        );

        $nama_file = 'daftar-hadir-eva-nego.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadBaHasilPengadaanLangsung1($id){
        $data = Pengadaan::with('getperusahaan')->where('id',$id)->first();
        $dataDetail = PengadaanDetailSpk::where('id_pengadaan',$id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($dataDetail->ba_hasil_pengadaan_tgl);
        $bulan=$tanggalIndo->bln_aja($dataDetail->ba_hasil_pengadaan_tgl);
        $tahun=$tanggalIndo->thn_aja($dataDetail->ba_hasil_pengadaan_tgl);
        $gabungan = $tanggal.' '.$bulan.' '.$tahun;

        $tanggal1=$tanggalIndo->tgl_aja($dataDetail->rks_tgl);
        $bulan1=$tanggalIndo->bln_aja($dataDetail->rks_tgl);
        $tahun1=$tanggalIndo->thn_aja($dataDetail->rks_tgl);
        $gabungan1 = $tanggal1.' '.$bulan1.' '.$tahun1;

        $word = new WordTemplate();
        $file = public_path('doc/spk/hasil_pengadaan_langsung.rtf');

        $array = array(
            '[Judul]' => $data->judul,
            '[Rks]' => $dataDetail->rks_nomor,
            '[Tanggal_Rks]' => $gabungan1,
            '[Tanggal_Hpl]' => $gabungan,
            '[Hari]' => $dataDetail->ba_hasil_klarifikasi_hari,
            '[Hps]' => $data->harga_penawaran,
            '[Hps_Pajak]' => $data->harga_kontrak,
            '[Waktu_Penyelesaian]' => $data->jangka_waktu,
            '[Tanggal_Penuh]' => $gabungan,
            '[Tanggal]' => $tanggalIndo->terbilang($tanggal),
            '[Bulan]' => $bulan,
            '[Tahun]' => $tanggalIndo->terbilang($tahun),
            '[Pejabat_Pelaksana]' => $data->pejabat_pelaksana,
            '[Disusun]' => $data->vmfc,
            '[Direktur]' => $data['getperusahaan']['pimpinan'],
            '[Nama_Perusahaan]' => $data['getperusahaan']['nama'],
            '[Alamat]' => $data['getperusahaan']['alamat'],
            '[Npwp]' => $data['getperusahaan']['npwp'],

        );

        $nama_file = 'hasil-pengadaan-langsung.doc';

        return $word->export($file, $array, $nama_file);
    }

    public function downloadBaHasilPengadaanLangsung2($id){
        $data = Pengadaan::with('getperusahaan')->where('id',$id)->first();
        $dataDetail = PengadaanDetailSpk::where('id_pengadaan',$id)->first();

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($dataDetail->ba_hasil_pengadaan_tgl);
        $bulan=$tanggalIndo->bln_aja($dataDetail->ba_hasil_pengadaan_tgl);
        $tahun=$tanggalIndo->thn_aja($dataDetail->ba_hasil_pengadaan_tgl);
        $gabungan = $tanggal.' '.$bulan.' '.$tahun;

        $word = new WordTemplate();
        $file = public_path('doc/spk/daftar_hadir_hasil_pengadaan.rtf');

        $array = array(
            '[Judul]' => $data->judul,
            '[Tanggal]' => $gabungan,
        );

        $nama_file = 'daftar_hadir_hasil_pengadaan.doc';

        return $word->export($file, $array, $nama_file);
    }







}
