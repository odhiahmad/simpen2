<?php


namespace App\Http\Controllers\JobCard\Pj;


use App\Http\Controllers\Controller;
use App\ModelsResource\DMetodePengadaan;
use App\Pengadaan;
use App\PengadaanDetailPj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateControllerPj extends Controller
{

    public function updateDataTeka1(Request $request)
    {

        $dokumenKontrak = $request->file('kontrak_file');
        $dokumenProses = $request->file('proses_file');



        $new_name = $request->kontrak;
        $new_name1 = $request->proses;

        if ($dokumenKontrak != '') {


            $image = $request->file('kontrak_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('data-kontrak/kontrak/'.$request->id.'/'), $new_name);

        }

        if ($dokumenProses != '') {

            $image1 = $request->file('proses_file');
            $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('data-kontrak/proses/'.$request->id.'/'), $new_name1);
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

        );

        $getMp1 = DMetodePengadaan::where('id', $request->metode_pengadaan)->first();
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data_hari = array(
            'survey_harga_pasar_nomor' => $request->nppv1,
            'survey_harga_pasar_jumlah' => $request->survey_harga_pasar_jumlah,
            'survey_harga_pasar_tgl' => $request->survey_harga_pasar_tgl,
            'survey_harga_pasar_hari' => $request->survey_harga_pasar_hari,

            'hps_nomor' => $request->nppv2,
            'hps_jumlah' => $request->hps_jumlah,
            'hps_tgl' => $request->hps_tgl,
            'hps_hari' => $request->hps_hari,

            'pengumuman_nomor' => $request->nppv3,
            'pengumuman_jumlah' => $request->pengumuman_jumlah,
            'pengumuman_tgl' => $request->pengumuman_tgl,
            'pengumuman_hari' => $request->pengumuman_hari,

            'undangan_aanwijzing_peserta_nomor' => $request->nppv4,
            'undangan_aanwijzing_peserta_jumlah' => $request->undangan_aanwijzing_peserta_jumlah,
            'undangan_aanwijzing_peserta_tgl' => $request->undangan_aanwijzing_peserta_tgl,
            'undangan_aanwijzing_peserta_hari' => $request->undangan_aanwijzing_peserta_hari,

            'undangan_aanwijzing_direksi_pekerjaan_nomor' => $request->nppv5,
            'undangan_aanwijzing_direksi_pekerjaan_jumlah' => $request->undangan_aanwijzing_direksi_pekerjaan_jumlah,
            'undangan_aanwijzing_direksi_pekerjaan_tgl' => $request->undangan_aanwijzing_direksi_pekerjaan_tgl,
            'undangan_aanwijzing_direksi_pekerjaan_hari' => $request->undangan_aanwijzing_direksi_pekerjaan_hari,

            'aanwijzing_nomor' => $request->nppv6,
            'aanwijzing_jumlah' => $request->aanwijzing_jumlah,
            'aanwijzing_tgl' => $request->aanwijzing_tgl,
            'aanwijzing_hari' => $request->aanwijzing_hari,

            'addendum_rks_nomor' => $request->nppv7,
            'addendum_rks_jumlah' => $request->addendum_rks_jumlah,
            'addendum_rks_tgl' => $request->addendum_rks_tgl,
            'addendum_rks_hari' => $request->addendum_rks_hari,

            'pemasukan_dok_penawaran_nomor' => $request->nppv8,

            'pemasukan_dok_penawaran_jumlah_dari' => $request->pemasukan_dok_penawaran_jumlah_dari,
            'pemasukan_dok_penawaran_tgl_dari' =>$request->pemasukan_dok_penawaran_tgl_dari,
            'pemasukan_dok_penawaran_hari_dari' => $request->pemasukan_dok_penawaran_hari_dari,

            'pemasukan_dok_penawaran_jumlah' => $request->pemasukan_dok_penawaran_jumlah,
            'pemasukan_dok_penawaran_tgl' =>$request->pemasukan_dok_penawaran_tgl,
            'pemasukan_dok_penawaran_hari' => $request->pemasukan_dok_penawaran_hari,

            'pembukaan_penawaran_nomor' => $request->nppv9,
            'pembukaan_penawaran_jumlah' => $request->pembukaan_penawaran_jumlah,
            'pembukaan_penawaran_tgl' => $request->pembukaan_penawaran_tgl,
            'pembukaan_penawaran_hari' => $request->pembukaan_penawaran_hari,

            'evaluasi_dok_penawaran_nomor' => $request->nppv10,
            'evaluasi_dok_penawaran_jumlah' => $request->evaluasi_dok_penawaran_jumlah,
            'evaluasi_dok_penawaran_tgl' => $request->evaluasi_dok_penawaran_tgl,
            'evaluasi_dok_penawaran_hari' => $request->evaluasi_dok_penawaran_hari,

            'undangan_pembuktian_kualifikasi_nomor' => $request->nppv11,
            'undangan_pembuktian_kualifikasi_jumlah' => $request->undangan_pembuktian_kualifikasi_jumlah,
            'undangan_pembuktian_kualifikasi_tgl' => $request->undangan_pembuktian_kualifikasi_tgl,
            'undangan_pembuktian_kualifikasi_hari' => $request->undangan_pembuktian_kualifikasi_hari,

            'pembuktian_kualifikasi_nomor' => $request->nppv12,
            'pembuktian_kualifikasi_jumlah' => $request->pembuktian_kualifikasi_jumlah,
            'pembuktian_kualifikasi_tgl' => $request->pembuktian_kualifikasi_tgl,
            'pembuktian_kualifikasi_hari' => $request->pembuktian_kualifikasi_hari,

            'undangan_klarifikasi_dan_nego_penawaran_nomor' => $request->nppv13,
            'undangan_klarifikasi_dan_nego_penawaran_jumlah' => $request->undangan_klarifikasi_dan_nego_penawaran_jumlah,
            'undangan_klarifikasi_dan_nego_penawaran_tgl' => $request->undangan_klarifikasi_dan_nego_penawaran_tgl,
            'undangan_klarifikasi_dan_nego_penawaran_hari' => $request->undangan_klarifikasi_dan_nego_penawaran_hari,

            'ba_hasil_klarifikasi_dan_nego_penawaran_nomor' => $request->nppv14,
            'ba_hasil_klarifikasi_dan_nego_penawaran_jumlah' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_jumlah,
            'ba_hasil_klarifikasi_dan_nego_penawaran_tgl' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_tgl,
            'ba_hasil_klarifikasi_dan_nego_penawaran_hari' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_hari,

            'laporan_hasil_evaluasi_nomor' => $request->nppv15,
            'laporan_hasil_evaluasi_jumlah' => $request->laporan_hasil_evaluasi_jumlah,
            'laporan_hasil_evaluasi_tgl' => $request->laporan_hasil_evaluasi_tgl,
            'laporan_hasil_evaluasi_hari' => $request->laporan_hasil_evaluasi_hari,

            'nd_usulan_penetapan_calon_pemenang_nomor' => $request->nppv16,
            'nd_usulan_penetapan_calon_pemenang_jumlah' => $request->nd_usulan_penetapan_calon_pemenang_jumlah,
            'nd_usulan_penetapan_calon_pemenang_tgl' => $request->nd_usulan_penetapan_calon_pemenang_tgl,
            'nd_usulan_penetapan_calon_pemenang_hari' => $request->nd_usulan_penetapan_calon_pemenang_hari,

            'nd_penetapan_calon_pemenang_nomor' => $request->nppv17,
            'nd_penetapan_calon_pemenang_jumlah' => $request->nd_penetapan_calon_pemenang_jumlah,
            'nd_penetapan_calon_pemenang_tgl' => $request->nd_penetapan_calon_pemenang_tgl,
            'nd_penetapan_calon_pemenang_hari' => $request->nd_penetapan_calon_pemenang_hari,

            'pengumuman_calon_pemenang_nomor' => $request->nppv18,
            'pengumuman_calon_pemenang_jumlah' => $request->pengumuman_calon_pemenang_jumlah,
            'pengumuman_calon_pemenang_tgl' => $request->pengumuman_calon_pemenang_tgl,
            'pengumuman_calon_pemenang_hari' => $request->pengumuman_calon_pemenang_hari,

            'penunjukan_pemenang_nomor' => $request->nppv19,
            'penunjukan_pemenang_jumlah' => $request->penunjukan_pemenang_jumlah,
            'penunjukan_pemenang_tgl' => $request->penunjukan_pemenang_tgl,
            'penunjukan_pemenang_hari' => $request->penunjukan_pemenang_hari,

            'skkp_nomor' => $request->nppv20,
            'skkp_jumlah' => $request->skkp_jumlah,
            'skkp_tgl' => $request->skkp_tgl,
            'skkp_hari' => $request->skkp_hari,

            'undangan_cda_nomor' => $request->nppv21,
            'undangan_cda_jumlah' => $request->undangan_cda_jumlah,
            'undangan_cda_tgl' => $request->undangan_cda_tgl,
            'undangan_cda_hari' => $request->undangan_cda_hari,

            'cda_nomor' => $request->nppv22,
            'cda_jumlah' => $request->cda_jumlah,
            'cda_tgl' => $request->cda_tgl,
            'cda_hari' => $request->cda_hari,

            'pj_nomor' => $request->nppv23,
            'pj_jumlah' => $request->pj_jumlah,
            'pj_tgl' => $request->pj_tgl,
            'pj_hari' => $request->pj_hari,

            'bastl_nomor' => $request->nppv24,
            'bastl_jumlah' => $request->bastl_jumlah,
            'bastl_tgl' => $request->bastl_tgl,
            'bastl_hari' => $request->bastl_hari,


        );

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
            'no_proses_pengadaan' => $request->no_proses_pengadaan,
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
//            'vfmc' => $request->vfmc,
//            'vfmc2' => $request->vfmc2,
            'jabatan_direksi' => $request->jabatan_direksi,
            'alamat_penyerahan' => $request->alamat_penyerahan,
            'pengguna' => $request->pengguna,
            'nip' => $request->nip,
            'pejabat_pelaksana' => $request->pejabat_pelaksana,
            'direksi' => $request->direksi,
            'pengawas' => $request->pengawas,
            'jabatan_pengawas' => $request->jabatan_pengawas,
            'ketua_tim' => $request->ketua_tim,
            'pic_pelaksana' => $request->pic_pelaksana,
            'hps' => $request->hps,

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
            if(PengadaanDetailPj::where('id_pengadaan',$request->id)->update($form_data_hari)){
                return response()->json(['success' => 'Data Added successfully.']);
            }

        } else {
            return response()->json(['errors' => 'Gagal']);
        }


    }

    public function updateDataTeka2(Request $request)
    {

        $dokumenKontrak = $request->file('kontrak_file');
        $dokumenProses = $request->file('proses_file');



        $new_name = $request->kontrak;
        $new_name1 = $request->proses;

        if ($dokumenKontrak != '') {


            $image = $request->file('kontrak_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('data-kontrak/kontrak/'.$request->id.'/'), $new_name);

        }

        if ($dokumenProses != '') {

            $image1 = $request->file('proses_file');
            $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('data-kontrak/proses/'.$request->id.'/'), $new_name1);
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

        );

        $getMp1 = DMetodePengadaan::where('id', $request->metode_pengadaan)->first();
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data_hari = array(
            'survey_harga_pasar_nomor' => $request->nppv1,
            'survey_harga_pasar_jumlah' => $request->survey_harga_pasar_jumlah,
            'survey_harga_pasar_tgl' => $request->survey_harga_pasar_tgl,
            'survey_harga_pasar_hari' => $request->survey_harga_pasar_hari,

            'hps_nomor' => $request->nppv2,
            'hps_jumlah' => $request->hps_jumlah,
            'hps_tgl' => $request->hps_tgl,
            'hps_hari' => $request->hps_hari,

            'pengumuman_nomor' => $request->nppv3,
            'pengumuman_jumlah' => $request->pengumuman_jumlah,
            'pengumuman_tgl' => $request->pengumuman_tgl,
            'pengumuman_hari' => $request->pengumuman_hari,

            'undangan_aanwijzing_peserta_nomor' => $request->nppv4,
            'undangan_aanwijzing_peserta_jumlah' => $request->undangan_aanwijzing_peserta_jumlah,
            'undangan_aanwijzing_peserta_tgl' => $request->undangan_aanwijzing_peserta_tgl,
            'undangan_aanwijzing_peserta_hari' => $request->undangan_aanwijzing_peserta_hari,

            'undangan_aanwijzing_direksi_pekerjaan_nomor' => $request->nppv5,
            'undangan_aanwijzing_direksi_pekerjaan_jumlah' => $request->undangan_aanwijzing_direksi_pekerjaan_jumlah,
            'undangan_aanwijzing_direksi_pekerjaan_tgl' => $request->undangan_aanwijzing_direksi_pekerjaan_tgl,
            'undangan_aanwijzing_direksi_pekerjaan_hari' => $request->undangan_aanwijzing_direksi_pekerjaan_hari,

            'aanwijzing_nomor' => $request->nppv6,
            'aanwijzing_jumlah' => $request->aanwijzing_jumlah,
            'aanwijzing_tgl' => $request->aanwijzing_tgl,
            'aanwijzing_hari' => $request->aanwijzing_hari,

            'addendum_rks_nomor' => $request->nppv7,
            'addendum_rks_jumlah' => $request->addendum_rks_jumlah,
            'addendum_rks_tgl' => $request->addendum_rks_tgl,
            'addendum_rks_hari' => $request->addendum_rks_hari,

            'pemasukan_dok_penawaran_nomor' => $request->nppv8,

            'pemasukan_dok_penawaran_jumlah_dari' => $request->pemasukan_dok_penawaran_jumlah_dari,
            'pemasukan_dok_penawaran_tgl_dari' =>$request->pemasukan_dok_penawaran_tgl_dari,
            'pemasukan_dok_penawaran_hari_dari' => $request->pemasukan_dok_penawaran_hari_dari,

            'pemasukan_dok_penawaran_jumlah' => $request->pemasukan_dok_penawaran_jumlah,
            'pemasukan_dok_penawaran_tgl' =>$request->pemasukan_dok_penawaran_tgl,
            'pemasukan_dok_penawaran_hari' => $request->pemasukan_dok_penawaran_hari,

            'pembukaan_penawaran_sampul_satu_nomor' => $request->nppv9,
            'pembukaan_penawaran_sampul_satu_jumlah' => $request->pembukaan_penawaran_sampul_satu_jumlah,
            'pembukaan_penawaran_sampul_satu_tgl' => $request->pembukaan_penawaran_sampul_satu_tgl,
            'pembukaan_penawaran_sampul_satu_hari' => $request->pembukaan_penawaran_sampul_satu_hari,

            'evaluasi_dok_penawaran_sampul_satu_nomor' => $request->nppv10,
            'evaluasi_dok_penawaran_sampul_satu_jumlah' => $request->evaluasi_dok_penawaran_sampul_satu_jumlah,
            'evaluasi_dok_penawaran_sampul_satu_tgl' => $request->evaluasi_dok_penawaran_sampul_satu_tgl,
            'evaluasi_dok_penawaran_sampul_satu_hari' => $request->evaluasi_dok_penawaran_sampul_satu_hari,

            'pengumuman_hasil_evaluasi_sampul_satu_nomor' => $request->nppv11,
            'pengumuman_hasil_evaluasi_sampul_satu_jumlah' => $request->pengumuman_hasil_evaluasi_sampul_satu_jumlah,
            'pengumuman_hasil_evaluasi_sampul_satu_tgl' => $request->pengumuman_hasil_evaluasi_sampul_satu_tgl,
            'pengumuman_hasil_evaluasi_sampul_satu_hari' => $request->pengumuman_hasil_evaluasi_sampul_satu_hari,

            'pembukaan_penawaran_sampul_dua_nomor' => $request->nppv12,
            'pembukaan_penawaran_sampul_dua_jumlah' => $request->pembukaan_penawaran_sampul_dua_jumlah,
            'pembukaan_penawaran_sampul_dua_tgl' => $request->pembukaan_penawaran_sampul_dua_tgl,
            'pembukaan_penawaran_sampul_dua_hari' => $request->pembukaan_penawaran_sampul_dua_hari,

            'evaluasi_dok_penawaran_sampul_dua_nomor' => $request->nppv13,
            'evaluasi_dok_penawaran_sampul_dua_jumlah' => $request->evaluasi_dok_penawaran_sampul_dua_jumlah,
            'evaluasi_dok_penawaran_sampul_dua_tgl' => $request->evaluasi_dok_penawaran_sampul_dua_tgl,
            'evaluasi_dok_penawaran_sampul_dua_hari' => $request->evaluasi_dok_penawaran_sampul_dua_hari,

            'undangan_pembuktian_kualifikasi_nomor' => $request->nppv14,
            'undangan_pembuktian_kualifikasi_jumlah' => $request->undangan_pembuktian_kualifikasi_jumlah,
            'undangan_pembuktian_kualifikasi_tgl' => $request->undangan_pembuktian_kualifikasi_tgl,
            'undangan_pembuktian_kualifikasi_hari' => $request->undangan_pembuktian_kualifikasi_hari,

            'pembuktian_kualifikasi_nomor' => $request->nppv15,
            'pembuktian_kualifikasi_jumlah' => $request->pembuktian_kualifikasi_jumlah,
            'pembuktian_kualifikasi_tgl' => $request->pembuktian_kualifikasi_tgl,
            'pembuktian_kualifikasi_hari' => $request->pembuktian_kualifikasi_hari,

            'undangan_klarifikasi_dan_nego_penawaran_nomor' => $request->nppv16,
            'undangan_klarifikasi_dan_nego_penawaran_jumlah' => $request->undangan_klarifikasi_dan_nego_penawaran_jumlah,
            'undangan_klarifikasi_dan_nego_penawaran_tgl' => $request->undangan_klarifikasi_dan_nego_penawaran_tgl,
            'undangan_klarifikasi_dan_nego_penawaran_hari' => $request->undangan_klarifikasi_dan_nego_penawaran_hari,

            'ba_hasil_klarifikasi_dan_nego_penawaran_nomor' => $request->nppv17,
            'ba_hasil_klarifikasi_dan_nego_penawaran_jumlah' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_jumlah,
            'ba_hasil_klarifikasi_dan_nego_penawaran_tgl' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_tgl,
            'ba_hasil_klarifikasi_dan_nego_penawaran_hari' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_hari,

            'laporan_hasil_evaluasi_nomor' => $request->nppv18,
            'laporan_hasil_evaluasi_jumlah' => $request->laporan_hasil_evaluasi_jumlah,
            'laporan_hasil_evaluasi_tgl' => $request->laporan_hasil_evaluasi_tgl,
            'laporan_hasil_evaluasi_hari' => $request->laporan_hasil_evaluasi_hari,

            'nd_usulan_penetapan_calon_pemenang_nomor' => $request->nppv19,
            'nd_usulan_penetapan_calon_pemenang_jumlah' => $request->nd_usulan_penetapan_calon_pemenang_jumlah,
            'nd_usulan_penetapan_calon_pemenang_tgl' => $request->nd_usulan_penetapan_calon_pemenang_tgl,
            'nd_usulan_penetapan_calon_pemenang_hari' => $request->nd_usulan_penetapan_calon_pemenang_hari,

            'nd_penetapan_calon_pemenang_nomor' => $request->nppv20,
            'nd_penetapan_calon_pemenang_jumlah' => $request->nd_penetapan_calon_pemenang_jumlah,
            'nd_penetapan_calon_pemenang_tgl' => $request->nd_penetapan_calon_pemenang_tgl,
            'nd_penetapan_calon_pemenang_hari' => $request->nd_penetapan_calon_pemenang_hari,

            'pengumuman_calon_pemenang_nomor' => $request->nppv21,
            'pengumuman_calon_pemenang_jumlah' => $request->pengumuman_calon_pemenang_jumlah,
            'pengumuman_calon_pemenang_tgl' => $request->pengumuman_calon_pemenang_tgl,
            'pengumuman_calon_pemenang_hari' => $request->pengumuman_calon_pemenang_hari,

            'penunjukan_pemenang_nomor' => $request->nppv22,
            'penunjukan_pemenang_jumlah' => $request->penunjukan_pemenang_jumlah,
            'penunjukan_pemenang_tgl' => $request->penunjukan_pemenang_tgl,
            'penunjukan_pemenang_hari' => $request->penunjukan_pemenang_hari,

            'skkp_nomor' => $request->nppv23,
            'skkp_jumlah' => $request->skkp_jumlah,
            'skkp_tgl' => $request->skkp_tgl,
            'skkp_hari' => $request->skkp_hari,

            'undangan_cda_nomor' => $request->nppv24,
            'undangan_cda_jumlah' => $request->undangan_cda_jumlah,
            'undangan_cda_tgl' => $request->undangan_cda_tgl,
            'undangan_cda_hari' => $request->undangan_cda_hari,

            'cda_nomor' => $request->nppv25,
            'cda_jumlah' => $request->cda_jumlah,
            'cda_tgl' => $request->cda_tgl,
            'cda_hari' => $request->cda_hari,

            'pj_nomor' => $request->nppv26,
            'pj_jumlah' => $request->pj_jumlah,
            'pj_tgl' => $request->pj_tgl,
            'pj_hari' => $request->pj_hari,

            'bastl_nomor' => $request->nppv27,
            'bastl_jumlah' => $request->bastl_jumlah,
            'bastl_tgl' => $request->bastl_tgl,
            'bastl_hari' => $request->bastl_hari,


        );

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
            'no_proses_pengadaan' => $request->no_proses_pengadaan,
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
//            'vfmc' => $request->vfmc,
//            'vfmc2' => $request->vfmc2,
            'jabatan_direksi' => $request->jabatan_direksi,
            'alamat_penyerahan' => $request->alamat_penyerahan,
            'pengguna' => $request->pengguna,
            'nip' => $request->nip,
            'pejabat_pelaksana' => $request->pejabat_pelaksana,
            'direksi' => $request->direksi,
            'pengawas' => $request->pengawas,
            'jabatan_pengawas' => $request->jabatan_pengawas,
            'ketua_tim' => $request->ketua_tim,
            'pic_pelaksana' => $request->pic_pelaksana,
            'hps' => $request->hps,

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
            if(PengadaanDetailPj::where('id_pengadaan',$request->id)->update($form_data_hari)){
                return response()->json(['success' => 'Data Added successfully.']);
            }
        } else {
            return response()->json(['errors' => 'Gagal']);
        }


    }

    public function updateDataTetas1(Request $request)
    {

        $dokumenKontrak = $request->file('kontrak_file');
        $dokumenProses = $request->file('proses_file');



        $new_name = $request->kontrak;
        $new_name1 = $request->proses;

        if ($dokumenKontrak != '') {


            $image = $request->file('kontrak_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('data-kontrak/kontrak/'.$request->id.'/'), $new_name);

        }

        if ($dokumenProses != '') {

            $image1 = $request->file('proses_file');
            $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('data-kontrak/proses/'.$request->id.'/'), $new_name1);
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

        );

        $getMp1 = DMetodePengadaan::where('id', $request->metode_pengadaan)->first();
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data_hari = array(
            'survey_harga_pasar_nomor' => $request->nppv1,
            'survey_harga_pasar_jumlah' => $request->survey_harga_pasar_jumlah,
            'survey_harga_pasar_tgl' => $request->survey_harga_pasar_tgl,
            'survey_harga_pasar_hari' => $request->survey_harga_pasar_hari,

            'hps_nomor' => $request->nppv2,
            'hps_jumlah' => $request->hps_jumlah,
            'hps_tgl' => $request->hps_tgl,
            'hps_hari' => $request->hps_hari,

            'pengumuman_nomor' => $request->nppv3,
            'pengumuman_jumlah' => $request->pengumuman_jumlah,
            'pengumuman_tgl' => $request->pengumuman_tgl,
            'pengumuman_hari' => $request->pengumuman_hari,

            'undangan_aanwijzing_peserta_nomor' => $request->nppv4,
            'undangan_aanwijzing_peserta_jumlah' => $request->undangan_aanwijzing_peserta_jumlah,
            'undangan_aanwijzing_peserta_tgl' => $request->undangan_aanwijzing_peserta_tgl,
            'undangan_aanwijzing_peserta_hari' => $request->undangan_aanwijzing_peserta_hari,

            'undangan_aanwijzing_direksi_pekerjaan_nomor' => $request->nppv5,
            'undangan_aanwijzing_direksi_pekerjaan_jumlah' => $request->undangan_aanwijzing_direksi_pekerjaan_jumlah,
            'undangan_aanwijzing_direksi_pekerjaan_tgl' => $request->undangan_aanwijzing_direksi_pekerjaan_tgl,
            'undangan_aanwijzing_direksi_pekerjaan_hari' => $request->undangan_aanwijzing_direksi_pekerjaan_hari,

            'aanwijzing_nomor' => $request->nppv6,
            'aanwijzing_jumlah' => $request->aanwijzing_jumlah,
            'aanwijzing_tgl' => $request->aanwijzing_tgl,
            'aanwijzing_hari' => $request->aanwijzing_hari,

            'addendum_rks_nomor' => $request->nppv7,
            'addendum_rks_jumlah' => $request->addendum_rks_jumlah,
            'addendum_rks_tgl' => $request->addendum_rks_tgl,
            'addendum_rks_hari' => $request->addendum_rks_hari,

            'pemasukan_dok_penawaran_nomor' => $request->nppv8,

            'pemasukan_dok_penawaran_jumlah_dari' => $request->pemasukan_dok_penawaran_jumlah_dari,
            'pemasukan_dok_penawaran_tgl_dari' =>$request->pemasukan_dok_penawaran_tgl_dari,
            'pemasukan_dok_penawaran_hari_dari' => $request->pemasukan_dok_penawaran_hari_dari,

            'pemasukan_dok_penawaran_jumlah' => $request->pemasukan_dok_penawaran_jumlah,
            'pemasukan_dok_penawaran_tgl' =>$request->pemasukan_dok_penawaran_tgl,
            'pemasukan_dok_penawaran_hari' => $request->pemasukan_dok_penawaran_hari,

            'pembukaan_penawaran_nomor' => $request->nppv9,
            'pembukaan_penawaran_jumlah' => $request->pembukaan_penawaran_jumlah,
            'pembukaan_penawaran_tgl' => $request->pembukaan_penawaran_tgl,
            'pembukaan_penawaran_hari' => $request->pembukaan_penawaran_hari,

            'evaluasi_dok_penawaran_nomor' => $request->nppv10,
            'evaluasi_dok_penawaran_jumlah' => $request->evaluasi_dok_penawaran_jumlah,
            'evaluasi_dok_penawaran_tgl' => $request->evaluasi_dok_penawaran_tgl,
            'evaluasi_dok_penawaran_hari' => $request->evaluasi_dok_penawaran_hari,

            'undangan_klarifikasi_dan_nego_penawaran_nomor' => $request->nppv11,
            'undangan_klarifikasi_dan_nego_penawaran_jumlah' => $request->undangan_klarifikasi_dan_nego_penawaran_jumlah,
            'undangan_klarifikasi_dan_nego_penawaran_tgl' => $request->undangan_klarifikasi_dan_nego_penawaran_tgl,
            'undangan_klarifikasi_dan_nego_penawaran_hari' => $request->undangan_klarifikasi_dan_nego_penawaran_hari,

            'ba_hasil_klarifikasi_dan_nego_penawaran_nomor' => $request->nppv12,
            'ba_hasil_klarifikasi_dan_nego_penawaran_jumlah' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_jumlah,
            'ba_hasil_klarifikasi_dan_nego_penawaran_tgl' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_tgl,
            'ba_hasil_klarifikasi_dan_nego_penawaran_hari' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_hari,

            'laporan_hasil_evaluasi_nomor' => $request->nppv13,
            'laporan_hasil_evaluasi_jumlah' => $request->laporan_hasil_evaluasi_jumlah,
            'laporan_hasil_evaluasi_tgl' => $request->laporan_hasil_evaluasi_tgl,
            'laporan_hasil_evaluasi_hari' => $request->laporan_hasil_evaluasi_hari,

            'nd_usulan_penetapan_calon_pemenang_nomor' => $request->nppv14,
            'nd_usulan_penetapan_calon_pemenang_jumlah' => $request->nd_usulan_penetapan_calon_pemenang_jumlah,
            'nd_usulan_penetapan_calon_pemenang_tgl' => $request->nd_usulan_penetapan_calon_pemenang_tgl,
            'nd_usulan_penetapan_calon_pemenang_hari' => $request->nd_usulan_penetapan_calon_pemenang_hari,

            'nd_penetapan_calon_pemenang_nomor' => $request->nppv15,
            'nd_penetapan_calon_pemenang_jumlah' => $request->nd_penetapan_calon_pemenang_jumlah,
            'nd_penetapan_calon_pemenang_tgl' => $request->nd_penetapan_calon_pemenang_tgl,
            'nd_penetapan_calon_pemenang_hari' => $request->nd_penetapan_calon_pemenang_hari,

            'pengumuman_calon_pemenang_nomor' => $request->nppv16,
            'pengumuman_calon_pemenang_jumlah' => $request->pengumuman_calon_pemenang_jumlah,
            'pengumuman_calon_pemenang_tgl' => $request->pengumuman_calon_pemenang_tgl,
            'pengumuman_calon_pemenang_hari' => $request->pengumuman_calon_pemenang_hari,

            'penunjukan_pemenang_nomor' => $request->nppv17,
            'penunjukan_pemenang_jumlah' => $request->penunjukan_pemenang_jumlah,
            'penunjukan_pemenang_tgl' => $request->penunjukan_pemenang_tgl,
            'penunjukan_pemenang_hari' => $request->penunjukan_pemenang_hari,

            'skkp_nomor' => $request->nppv18,
            'skkp_jumlah' => $request->skkp_jumlah,
            'skkp_tgl' => $request->skkp_tgl,
            'skkp_hari' => $request->skkp_hari,

            'undangan_cda_nomor' => $request->nppv19,
            'undangan_cda_jumlah' => $request->undangan_cda_jumlah,
            'undangan_cda_tgl' => $request->undangan_cda_tgl,
            'undangan_cda_hari' => $request->undangan_cda_hari,

            'cda_nomor' => $request->nppv20,
            'cda_jumlah' => $request->cda_jumlah,
            'cda_tgl' => $request->cda_tgl,
            'cda_hari' => $request->cda_hari,

            'pj_nomor' => $request->nppv21,
            'pj_jumlah' => $request->pj_jumlah,
            'pj_tgl' => $request->pj_tgl,
            'pj_hari' => $request->pj_hari,

            'bastl_nomor' => $request->nppv22,
            'bastl_jumlah' => $request->bastl_jumlah,
            'bastl_tgl' => $request->bastl_tgl,
            'bastl_hari' => $request->bastl_hari,


        );

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
            'no_proses_pengadaan' => $request->no_proses_pengadaan,
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
//            'vfmc' => $request->vfmc,
//            'vfmc2' => $request->vfmc2,
            'jabatan_direksi' => $request->jabatan_direksi,
            'alamat_penyerahan' => $request->alamat_penyerahan,
            'pengguna' => $request->pengguna,
            'nip' => $request->nip,
            'pejabat_pelaksana' => $request->pejabat_pelaksana,
            'direksi' => $request->direksi,
            'pengawas' => $request->pengawas,
            'jabatan_pengawas' => $request->jabatan_pengawas,
            'ketua_tim' => $request->ketua_tim,
            'pic_pelaksana' => $request->pic_pelaksana,
            'hps' => $request->hps,

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
            if(PengadaanDetailPj::where('id_pengadaan',$request->id)->update($form_data_hari)){
                return response()->json(['success' => 'Data Added successfully.']);
            }
        } else {
            return response()->json(['errors' => 'Gagal']);
        }



    }

    public function updateDataTetas2(Request $request)
    {

        $dokumenKontrak = $request->file('kontrak_file');
        $dokumenProses = $request->file('proses_file');



        $new_name = $request->kontrak;
        $new_name1 = $request->proses;

        if ($dokumenKontrak != '') {


            $image = $request->file('kontrak_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('data-kontrak/kontrak/'.$request->id.'/'), $new_name);

        }

        if ($dokumenProses != '') {

            $image1 = $request->file('proses_file');
            $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('data-kontrak/proses/'.$request->id.'/'), $new_name1);
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

        );

        $getMp1 = DMetodePengadaan::where('id', $request->metode_pengadaan)->first();
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data_hari = array(
            'survey_harga_pasar_nomor' => $request->nppv1,
            'survey_harga_pasar_jumlah' => $request->survey_harga_pasar_jumlah,
            'survey_harga_pasar_tgl' => $request->survey_harga_pasar_tgl,
            'survey_harga_pasar_hari' => $request->survey_harga_pasar_hari,

            'hps_nomor' => $request->nppv2,
            'hps_jumlah' => $request->hps_jumlah,
            'hps_tgl' => $request->hps_tgl,
            'hps_hari' => $request->hps_hari,

            'pengumuman_nomor' => $request->nppv3,
            'pengumuman_jumlah' => $request->pengumuman_jumlah,
            'pengumuman_tgl' => $request->pengumuman_tgl,
            'pengumuman_hari' => $request->pengumuman_hari,

            'undangan_aanwijzing_peserta_nomor' => $request->nppv4,
            'undangan_aanwijzing_peserta_jumlah' => $request->undangan_aanwijzing_peserta_jumlah,
            'undangan_aanwijzing_peserta_tgl' => $request->undangan_aanwijzing_peserta_tgl,
            'undangan_aanwijzing_peserta_hari' => $request->undangan_aanwijzing_peserta_hari,

            'undangan_aanwijzing_direksi_pekerjaan_nomor' => $request->nppv5,
            'undangan_aanwijzing_direksi_pekerjaan_jumlah' => $request->undangan_aanwijzing_direksi_pekerjaan_jumlah,
            'undangan_aanwijzing_direksi_pekerjaan_tgl' => $request->undangan_aanwijzing_direksi_pekerjaan_tgl,
            'undangan_aanwijzing_direksi_pekerjaan_hari' => $request->undangan_aanwijzing_direksi_pekerjaan_hari,

            'aanwijzing_nomor' => $request->nppv6,
            'aanwijzing_jumlah' => $request->aanwijzing_jumlah,
            'aanwijzing_tgl' => $request->aanwijzing_tgl,
            'aanwijzing_hari' => $request->aanwijzing_hari,

            'addendum_rks_nomor' => $request->nppv7,
            'addendum_rks_jumlah' => $request->addendum_rks_jumlah,
            'addendum_rks_tgl' => $request->addendum_rks_tgl,
            'addendum_rks_hari' => $request->addendum_rks_hari,

            'pemasukan_dok_penawaran_nomor' => $request->nppv8,

            'pemasukan_dok_penawaran_jumlah_dari' => $request->pemasukan_dok_penawaran_jumlah_dari,
            'pemasukan_dok_penawaran_tgl_dari' =>$request->pemasukan_dok_penawaran_tgl_dari,
            'pemasukan_dok_penawaran_hari_dari' => $request->pemasukan_dok_penawaran_hari_dari,

            'pemasukan_dok_penawaran_jumlah' => $request->pemasukan_dok_penawaran_jumlah,
            'pemasukan_dok_penawaran_tgl' =>$request->pemasukan_dok_penawaran_tgl,
            'pemasukan_dok_penawaran_hari' => $request->pemasukan_dok_penawaran_hari,

            'pembukaan_penawaran_sampul_satu_nomor' => $request->nppv9,
            'pembukaan_penawaran_sampul_satu_jumlah' => $request->pembukaan_penawaran_sampul_satu_jumlah,
            'pembukaan_penawaran_sampul_satu_tgl' => $request->pembukaan_penawaran_sampul_satu_tgl,
            'pembukaan_penawaran_sampul_satu_hari' => $request->pembukaan_penawaran_sampul_satu_hari,

            'evaluasi_dok_penawaran_sampul_satu_nomor' => $request->nppv10,
            'evaluasi_dok_penawaran_sampul_satu_jumlah' => $request->evaluasi_dok_penawaran_sampul_satu_jumlah,
            'evaluasi_dok_penawaran_sampul_satu_tgl' => $request->evaluasi_dok_penawaran_sampul_satu_tgl,
            'evaluasi_dok_penawaran_sampul_satu_hari' => $request->evaluasi_dok_penawaran_sampul_satu_hari,

            'pengumuman_hasil_evaluasi_sampul_satu_nomor' => $request->nppv11,
            'pengumuman_hasil_evaluasi_sampul_satu_jumlah' => $request->pengumuman_hasil_evaluasi_sampul_satu_jumlah,
            'pengumuman_hasil_evaluasi_sampul_satu_tgl' => $request->pengumuman_hasil_evaluasi_sampul_satu_tgl,
            'pengumuman_hasil_evaluasi_sampul_satu_hari' => $request->pengumuman_hasil_evaluasi_sampul_satu_hari,

            'pembukaan_penawaran_sampul_dua_nomor' => $request->nppv12,
            'pembukaan_penawaran_sampul_dua_jumlah' => $request->pembukaan_penawaran_sampul_dua_jumlah,
            'pembukaan_penawaran_sampul_dua_tgl' => $request->pembukaan_penawaran_sampul_dua_tgl,
            'pembukaan_penawaran_sampul_dua_hari' => $request->pembukaan_penawaran_sampul_dua_hari,

            'evaluasi_dok_penawaran_sampul_dua_nomor' => $request->nppv13,
            'evaluasi_dok_penawaran_sampul_dua_jumlah' => $request->evaluasi_dok_penawaran_sampul_dua_jumlah,
            'evaluasi_dok_penawaran_sampul_dua_tgl' => $request->evaluasi_dok_penawaran_sampul_dua_tgl,
            'evaluasi_dok_penawaran_sampul_dua_hari' => $request->evaluasi_dok_penawaran_sampul_dua_hari,

            'undangan_klarifikasi_dan_nego_penawaran_nomor' => $request->nppv14,
            'undangan_klarifikasi_dan_nego_penawaran_jumlah' => $request->undangan_klarifikasi_dan_nego_penawaran_jumlah,
            'undangan_klarifikasi_dan_nego_penawaran_tgl' => $request->undangan_klarifikasi_dan_nego_penawaran_tgl,
            'undangan_klarifikasi_dan_nego_penawaran_hari' => $request->undangan_klarifikasi_dan_nego_penawaran_hari,

            'ba_hasil_klarifikasi_dan_nego_penawaran_nomor' => $request->nppv15,
            'ba_hasil_klarifikasi_dan_nego_penawaran_jumlah' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_jumlah,
            'ba_hasil_klarifikasi_dan_nego_penawaran_tgl' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_tgl,
            'ba_hasil_klarifikasi_dan_nego_penawaran_hari' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_hari,

            'laporan_hasil_evaluasi_nomor' => $request->nppv16,
            'laporan_hasil_evaluasi_jumlah' => $request->laporan_hasil_evaluasi_jumlah,
            'laporan_hasil_evaluasi_tgl' => $request->laporan_hasil_evaluasi_tgl,
            'laporan_hasil_evaluasi_hari' => $request->laporan_hasil_evaluasi_hari,

            'nd_usulan_penetapan_calon_pemenang_nomor' => $request->nppv17,
            'nd_usulan_penetapan_calon_pemenang_jumlah' => $request->nd_usulan_penetapan_calon_pemenang_jumlah,
            'nd_usulan_penetapan_calon_pemenang_tgl' => $request->nd_usulan_penetapan_calon_pemenang_tgl,
            'nd_usulan_penetapan_calon_pemenang_hari' => $request->nd_usulan_penetapan_calon_pemenang_hari,

            'nd_penetapan_calon_pemenang_nomor' => $request->nppv18,
            'nd_penetapan_calon_pemenang_jumlah' => $request->nd_penetapan_calon_pemenang_jumlah,
            'nd_penetapan_calon_pemenang_tgl' => $request->nd_penetapan_calon_pemenang_tgl,
            'nd_penetapan_calon_pemenang_hari' => $request->nd_penetapan_calon_pemenang_hari,

            'pengumuman_calon_pemenang_nomor' => $request->nppv19,
            'pengumuman_calon_pemenang_jumlah' => $request->pengumuman_calon_pemenang_jumlah,
            'pengumuman_calon_pemenang_tgl' => $request->pengumuman_calon_pemenang_tgl,
            'pengumuman_calon_pemenang_hari' => $request->pengumuman_calon_pemenang_hari,

            'penunjukan_pemenang_nomor' => $request->nppv20,
            'penunjukan_pemenang_jumlah' => $request->penunjukan_pemenang_jumlah,
            'penunjukan_pemenang_tgl' => $request->penunjukan_pemenang_tgl,
            'penunjukan_pemenang_hari' => $request->penunjukan_pemenang_hari,

            'skkp_nomor' => $request->nppv21,
            'skkp_jumlah' => $request->skkp_jumlah,
            'skkp_tgl' => $request->skkp_tgl,
            'skkp_hari' => $request->skkp_hari,

            'undangan_cda_nomor' => $request->nppv22,
            'undangan_cda_jumlah' => $request->undangan_cda_jumlah,
            'undangan_cda_tgl' => $request->undangan_cda_tgl,
            'undangan_cda_hari' => $request->undangan_cda_hari,

            'cda_nomor' => $request->nppv23,
            'cda_jumlah' => $request->cda_jumlah,
            'cda_tgl' => $request->cda_tgl,
            'cda_hari' => $request->cda_hari,

            'pj_nomor' => $request->nppv24,
            'pj_jumlah' => $request->pj_jumlah,
            'pj_tgl' => $request->pj_tgl,
            'pj_hari' => $request->pj_hari,

            'bastl_nomor' => $request->nppv25,
            'bastl_jumlah' => $request->bastl_jumlah,
            'bastl_tgl' => $request->bastl_tgl,
            'bastl_hari' => $request->bastl_hari,


        );

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
            'no_proses_pengadaan' => $request->no_proses_pengadaan,
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
//            'vfmc' => $request->vfmc,
//            'vfmc2' => $request->vfmc2,
            'jabatan_direksi' => $request->jabatan_direksi,
            'alamat_penyerahan' => $request->alamat_penyerahan,
            'pengguna' => $request->pengguna,
            'nip' => $request->nip,
            'pejabat_pelaksana' => $request->pejabat_pelaksana,
            'direksi' => $request->direksi,
            'pengawas' => $request->pengawas,
            'jabatan_pengawas' => $request->jabatan_pengawas,
            'ketua_tim' => $request->ketua_tim,
            'pic_pelaksana' => $request->pic_pelaksana,
            'hps' => $request->hps,

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
            if(PengadaanDetailPj::where('id_pengadaan',$request->id)->update($form_data_hari)){
                return response()->json(['success' => 'Data Added successfully.']);
            }
        } else {
            return response()->json(['errors' => 'Gagal']);
        }


    }


}
