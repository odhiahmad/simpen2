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

            'pengumuman_nomor' => $request->pengumuman_nomor,
            'pengumuman_jumlah' => $request->pengumuman_jumlah,
            'pengumuman_tgl' => $request->pengumuman_tgl,
            'pengumuman_hari' => $request->pengumuman_hari,

            'undangan_aanwijzing_peserta_nomor' => $request->undangan_aanwijzing_peserta_nomor,
            'undangan_aanwijzing_peserta_jumlah' => $request->undangan_aanwijzing_peserta_jumlah,
            'undangan_aanwijzing_peserta_tgl' => $request->undangan_aanwijzing_peserta_tgl,
            'undangan_aanwijzing_peserta_hari' => $request->undangan_aanwijzing_peserta_hari,

            'undangan_aanwijzing_direksi_pekerjaan_nomor' => $request->undangan_aanwijzing_direksi_pekerjaan_nomor,
            'undangan_aanwijzing_direksi_pekerjaan_jumlah' => $request->undangan_aanwijzing_direksi_pekerjaan_jumlah,
            'undangan_aanwijzing_direksi_pekerjaan_tgl' => $request->undangan_aanwijzing_direksi_pekerjaan_tgl,
            'undangan_aanwijzing_direksi_pekerjaan_hari' => $request->undangan_aanwijzing_direksi_pekerjaan_hari,

            'aanwijzing_nomor' => $request->aanwijzing_nomor,
            'aanwijzing_jumlah' => $request->aanwijzing_jumlah,
            'aanwijzing_tgl' => $request->aanwijzing_tgl,
            'aanwijzing_hari' => $request->aanwijzing_hari,

            'addendum_rks_nomor' => $request->addendum_rks_nomor,
            'addendum_rks_jumlah' => $request->addendum_rks_jumlah,
            'addendum_rks_tgl' => $request->addendum_rks_tgl,
            'addendum_rks_hari' => $request->addendum_rks_hari,

            'pemasukan_dok_penawaran_nomor' => $request->pemasukan_dok_penawaran_nomor,
            'pemasukan_dok_penawaran_jumlah' => $request->addendum_rks_hari,
            'pemasukan_dok_penawaran_tgl' =>$request->pemasukan_dok_penawaran_tgl,
            'pemasukan_dok_penawaran_hari' => $request->pemasukan_dok_penawaran_hari,

            'pembukaan_penawaran_nomor' => $request->pembukaan_penawaran_nomor,
            'pembukaan_penawaran_jumlah' => $request->pembukaan_penawaran_jumlah,
            'pembukaan_penawaran_tgl' => $request->pembukaan_penawaran_tgl,
            'pembukaan_penawaran_hari' => $request->pembukaan_penawaran_hari,

            'evaluasi_dok_penawaran_nomor' => $request->evaluasi_dok_penawaran_nomor,
            'evaluasi_dok_penawaran_jumlah' => $request->evaluasi_dok_penawaran_jumlah,
            'evaluasi_dok_penawaran_tgl' => $request->evaluasi_dok_penawaran_tgl,
            'evaluasi_dok_penawaran_hari' => $request->evaluasi_dok_penawaran_hari,

            'undangan_pembuktian_kualifikasi_nomor' => $request->undangan_pembuktian_kualifikasi_nomor,
            'undangan_pembuktian_kualifikasi_jumlah' => $request->undangan_pembuktian_kualifikasi_jumlah,
            'undangan_pembuktian_kualifikasi_tgl' => $request->undangan_pembuktian_kualifikasi_tgl,
            'undangan_pembuktian_kualifikasi_hari' => $request->undangan_pembuktian_kualifikasi_hari,

            'pembuktian_kualifikasi_nomor' => $request->pembuktian_kualifikasi_nomor,
            'pembuktian_kualifikasi_jumlah' => $request->pembuktian_kualifikasi_jumlah,
            'pembuktian_kualifikasi_tgl' => $request->pembuktian_kualifikasi_tgl,
            'pembuktian_kualifikasi_hari' => $request->pembuktian_kualifikasi_hari,

            'undangan_klarifikasi_dan_nego_penawaran_nomor' => $request->undangan_klarifikasi_dan_nego_penawaran_nomor,
            'undangan_klarifikasi_dan_nego_penawaran_jumlah' => $request->undangan_klarifikasi_dan_nego_penawaran_jumlah,
            'undangan_klarifikasi_dan_nego_penawaran_tgl' => $request->undangan_klarifikasi_dan_nego_penawaran_tgl,
            'undangan_klarifikasi_dan_nego_penawaran_hari' => $request->undangan_klarifikasi_dan_nego_penawaran_hari,

            'ba_hasil_klarifikasi_dan_nego_penawaran_nomor' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_nomor,
            'ba_hasil_klarifikasi_dan_nego_penawaran_jumlah' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_jumlah,
            'ba_hasil_klarifikasi_dan_nego_penawaran_tgl' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_tgl,
            'ba_hasil_klarifikasi_dan_nego_penawaran_hari' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_hari,

            'laporan_hasil_evaluasi_nomor' => $request->laporan_hasil_evaluasi_nomor,
            'laporan_hasil_evaluasi_jumlah' => $request->laporan_hasil_evaluasi_jumlah,
            'laporan_hasil_evaluasi_tgl' => $request->laporan_hasil_evaluasi_tgl,
            'laporan_hasil_evaluasi_hari' => $request->laporan_hasil_evaluasi_hari,

            'nd_usulan_penetapan_calon_pemenang_nomor' => $request->nd_usulan_penetapan_calon_pemenang_nomor,
            'nd_usulan_penetapan_calon_pemenang_jumlah' => $request->nd_usulan_penetapan_calon_pemenang_jumlah,
            'nd_usulan_penetapan_calon_pemenang_tgl' => $request->nd_usulan_penetapan_calon_pemenang_tgl,
            'nd_usulan_penetapan_calon_pemenang_hari' => $request->nd_usulan_penetapan_calon_pemenang_hari,

            'nd_penetapan_calon_pemenang_nomor' => $request->nd_penetapan_calon_pemenang_nomor,
            'nd_penetapan_calon_pemenang_jumlah' => $request->nd_penetapan_calon_pemenang_jumlah,
            'nd_penetapan_calon_pemenang_tgl' => $request->nd_penetapan_calon_pemenang_tgl,
            'nd_penetapan_calon_pemenang_hari' => $request->nd_penetapan_calon_pemenang_hari,

            'pengumuman_calon_pemenang_nomor' => $request->pengumuman_calon_pemenang_nomor,
            'pengumuman_calon_pemenang_jumlah' => $request->pengumuman_calon_pemenang_jumlah,
            'pengumuman_calon_pemenang_tgl' => $request->pengumuman_calon_pemenang_tgl,
            'pengumuman_calon_pemenang_hari' => $request->pengumuman_calon_pemenang_hari,

            'penunjukan_pemenang_nomor' => $request->penunjukan_pemenang_nomor,
            'penunjukan_pemenang_jumlah' => $request->penunjukan_pemenang_jumlah,
            'penunjukan_pemenang_tgl' => $request->penunjukan_pemenang_tgl,
            'penunjukan_pemenang_hari' => $request->penunjukan_pemenang_hari,

            'skkp_nomor' => $request->skkp_nomor,
            'skkp_jumlah' => $request->skkp_jumlah,
            'skkp_tgl' => $request->skkp_tgl,
            'skkp_hari' => $request->skkp_hari,

            'undangan_cda_nomor' => $request->undangan_cda_nomor,
            'undangan_cda_jumlah' => $request->undangan_cda_jumlah,
            'undangan_cda_tgl' => $request->undangan_cda_tgl,
            'undangan_cda_hari' => $request->undangan_cda_hari,

            'cda_nomor' => $request->cda_nomor,
            'cda_jumlah' => $request->cda_jumlah,
            'cda_tgl' => $request->cda_tgl,
            'cda_hari' => $request->cda_hari,

            'pj_nomor' => $request->pj_nomor,
            'pj_jumlah' => $request->pj_jumlah,
            'pj_tgl' => $request->pj_tgl,
            'pj_hari' => $request->pj_hari,

            'bastl_nomor' => $request->bastl_jumlah,
            'bastl_jumlah' => $request->bastl_jumlah,
            'bastl_tgl' => $request->bastl_jumlah,
            'bastl_hari' => $request->bastl_jumlah,


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


        if (Pengadaan::whereId($request->id)->update($form_data) && PengadaanDetailPj::where('id_pengadaan',$request->id)->update($form_data_hari)) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['errors' => 'Gagal']);
        }


    }

    public function updateDataTeka2(Request $request)
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

        );

        $getMp1 = DMetodePengadaan::where('id', $request->metode_pengadaan)->first();
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data_hari = array(
            'survei_harga_pasar_nomor' => $request->nppv1,
            'survei_harga_pasar_jumlah' => $request->survey_harga_pasar_jumlah,
            'survei_harga_pasar_tgl' => $request->survey_harga_pasar_tgl,
            'survei_harga_pasar_hari' => $request->survey_harga_pasar_hari,

            'hps_nomor' => $request->nppv2,
            'hps_jumlah' => $request->hps_jumlah,
            'hps_tgl' => $request->hps_tgl,
            'hps_hari' => $request->hps_hari,

            'pengumuman_nomor' => $request->pengumuman_nomor,
            'pengumuman_jumlah' => $request->pengumuman_jumlah,
            'pengumuman_tgl' => $request->pengumuman_tgl,
            'pengumuman_hari' => $request->pengumuman_hari,

            'undangan_aanwijzing_peserta_nomor' => $request->undangan_aanwijzing_peserta_nomor,
            'undangan_aanwijzing_peserta_jumlah' => $request->undangan_aanwijzing_peserta_jumlah,
            'undangan_aanwijzing_peserta_tgl' => $request->undangan_aanwijzing_peserta_tgl,
            'undangan_aanwijzing_peserta_hari' => $request->undangan_aanwijzing_peserta_hari,

            'undangan_aanwijzing_direksi_pekerjaan_nomor' => $request->undangan_aanwijzing_direksi_pekerjaan_nomor,
            'undangan_aanwijzing_direksi_pekerjaan_jumlah' => $request->undangan_aanwijzing_direksi_pekerjaan_jumlah,
            'undangan_aanwijzing_direksi_pekerjaan_tgl' => $request->undangan_aanwijzing_direksi_pekerjaan_tgl,
            'undangan_aanwijzing_direksi_pekerjaan_hari' => $request->undangan_aanwijzing_direksi_pekerjaan_hari,

            'aanwijzing_nomor' => $request->aanwijzing_nomor,
            'aanwijzing_jumlah' => $request->aanwijzing_jumlah,
            'aanwijzing_tgl' => $request->aanwijzing_tgl,
            'aanwijzing_hari' => $request->aanwijzing_hari,

            'addendum_rks_nomor' => $request->addendum_rks_nomor,
            'addendum_rks_jumlah' => $request->addendum_rks_jumlah,
            'addendum_rks_tgl' => $request->addendum_rks_tgl,
            'addendum_rks_hari' => $request->addendum_rks_hari,

            'pemasukan_dok_penawaran_nomor' => $request->pemasukan_dok_penawaran_nomor,
            'pemasukan_dok_penawaran_jumlah' => $request->addendum_rks_hari,
            'pemasukan_dok_penawaran_tgl' =>$request->pemasukan_dok_penawaran_tgl,
            'pemasukan_dok_penawaran_hari' => $request->pemasukan_dok_penawaran_hari,

            'pembukaan_penawaran_nomor' => $request->pembukaan_penawaran_nomor,
            'pembukaan_penawaran_jumlah' => $request->pembukaan_penawaran_jumlah,
            'pembukaan_penawaran_tgl' => $request->pembukaan_penawaran_tgl,
            'pembukaan_penawaran_hari' => $request->pembukaan_penawaran_hari,

            'evaluasi_dok_penawaran_nomor' => $request->evaluasi_dok_penawaran_nomor,
            'evaluasi_dok_penawaran_jumlah' => $request->evaluasi_dok_penawaran_jumlah,
            'evaluasi_dok_penawaran_tgl' => $request->evaluasi_dok_penawaran_tgl,
            'evaluasi_dok_penawaran_hari' => $request->evaluasi_dok_penawaran_hari,

            'undangan_pembuktian_kualifikasi_nomor' => $request->undangan_pembuktian_kualifikasi_nomor,
            'undangan_pembuktian_kualifikasi_jumlah' => $request->undangan_pembuktian_kualifikasi_jumlah,
            'undangan_pembuktian_kualifikasi_tgl' => $request->undangan_pembuktian_kualifikasi_tgl,
            'undangan_pembuktian_kualifikasi_hari' => $request->undangan_pembuktian_kualifikasi_hari,

            'pembuktian_kualifikasi_nomor' => $request->pembuktian_kualifikasi_nomor,
            'pembuktian_kualifikasi_jumlah' => $request->pembuktian_kualifikasi_jumlah,
            'pembuktian_kualifikasi_tgl' => $request->pembuktian_kualifikasi_tgl,
            'pembuktian_kualifikasi_hari' => $request->pembuktian_kualifikasi_hari,

            'undangan_klarifikasi_dan_nego_penawaran_nomor' => $request->undangan_klarifikasi_dan_nego_penawaran_nomor,
            'undangan_klarifikasi_dan_nego_penawaran_jumlah' => $request->undangan_klarifikasi_dan_nego_penawaran_jumlah,
            'undangan_klarifikasi_dan_nego_penawaran_tgl' => $request->undangan_klarifikasi_dan_nego_penawaran_tgl,
            'undangan_klarifikasi_dan_nego_penawaran_hari' => $request->undangan_klarifikasi_dan_nego_penawaran_hari,

            'ba_hasil_klarifikasi_dan_nego_penawaran_nomor' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_nomor,
            'ba_hasil_klarifikasi_dan_nego_penawaran_jumlah' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_jumlah,
            'ba_hasil_klarifikasi_dan_nego_penawaran_tgl' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_tgl,
            'ba_hasil_klarifikasi_dan_nego_penawaran_hari' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_hari,

            'laporan_hasil_evaluasi_nomor' => $request->laporan_hasil_evaluasi_nomor,
            'laporan_hasil_evaluasi_jumlah' => $request->laporan_hasil_evaluasi_jumlah,
            'laporan_hasil_evaluasi_tgl' => $request->laporan_hasil_evaluasi_tgl,
            'laporan_hasil_evaluasi_hari' => $request->laporan_hasil_evaluasi_hari,

            'nd_usulan_penetapan_calon_pemenang_nomor' => $request->nd_usulan_penetapan_calon_pemenang_nomor,
            'nd_usulan_penetapan_calon_pemenang_jumlah' => $request->nd_usulan_penetapan_calon_pemenang_jumlah,
            'nd_usulan_penetapan_calon_pemenang_tgl' => $request->nd_usulan_penetapan_calon_pemenang_tgl,
            'nd_usulan_penetapan_calon_pemenang_hari' => $request->nd_usulan_penetapan_calon_pemenang_hari,

            'nd_penetapan_calon_pemenang_nomor' => $request->nd_penetapan_calon_pemenang_nomor,
            'nd_penetapan_calon_pemenang_jumlah' => $request->nd_penetapan_calon_pemenang_jumlah,
            'nd_penetapan_calon_pemenang_tgl' => $request->nd_penetapan_calon_pemenang_tgl,
            'nd_penetapan_calon_pemenang_hari' => $request->nd_penetapan_calon_pemenang_hari,

            'pengumuman_calon_pemenang_nomor' => $request->pengumuman_calon_pemenang_nomor,
            'pengumuman_calon_pemenang_jumlah' => $request->pengumuman_calon_pemenang_jumlah,
            'pengumuman_calon_pemenang_tgl' => $request->pengumuman_calon_pemenang_tgl,
            'pengumuman_calon_pemenang_hari' => $request->pengumuman_calon_pemenang_hari,

            'penunjukan_pemenang_nomor' => $request->penunjukan_pemenang_nomor,
            'penunjukan_pemenang_jumlah' => $request->penunjukan_pemenang_jumlah,
            'penunjukan_pemenang_tgl' => $request->penunjukan_pemenang_tgl,
            'penunjukan_pemenang_hari' => $request->penunjukan_pemenang_hari,

            'skkp_nomor' => $request->skkp_nomor,
            'skkp_jumlah' => $request->skkp_jumlah,
            'skkp_tgl' => $request->skkp_tgl,
            'skkp_hari' => $request->skkp_hari,

            'undangan_cda_nomor' => $request->undangan_cda_nomor,
            'undangan_cda_jumlah' => $request->undangan_cda_jumlah,
            'undangan_cda_tgl' => $request->undangan_cda_tgl,
            'undangan_cda_hari' => $request->undangan_cda_hari,

            'cda_nomor' => $request->cda_nomor,
            'cda_jumlah' => $request->cda_jumlah,
            'cda_tgl' => $request->cda_tgl,
            'cda_hari' => $request->cda_hari,

            'pj_nomor' => $request->pj_nomor,
            'pj_jumlah' => $request->pj_jumlah,
            'pj_tgl' => $request->pj_tgl,
            'pj_hari' => $request->pj_hari,

            'bastl_nomor' => $request->bastl_jumlah,
            'bastl_jumlah' => $request->bastl_jumlah,
            'bastl_tgl' => $request->bastl_jumlah,
            'bastl_hari' => $request->bastl_jumlah,


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


        if (Pengadaan::whereId($request->id)->update($form_data) && PengadaanDetailPj::where('id_pengadaan',$request->id)->update($form_data_hari)) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['errors' => 'Gagal']);
        }


    }

    public function updateDataTetas1(Request $request)
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

        );

        $getMp1 = DMetodePengadaan::where('id', $request->metode_pengadaan)->first();
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data_hari = array(
            'survei_harga_pasar_nomor' => $request->nppv1,
            'survei_harga_pasar_jumlah' => $request->survey_harga_pasar_jumlah,
            'survei_harga_pasar_tgl' => $request->survey_harga_pasar_tgl,
            'survei_harga_pasar_hari' => $request->survey_harga_pasar_hari,

            'hps_nomor' => $request->nppv2,
            'hps_jumlah' => $request->hps_jumlah,
            'hps_tgl' => $request->hps_tgl,
            'hps_hari' => $request->hps_hari,

            'pengumuman_nomor' => $request->pengumuman_nomor,
            'pengumuman_jumlah' => $request->pengumuman_jumlah,
            'pengumuman_tgl' => $request->pengumuman_tgl,
            'pengumuman_hari' => $request->pengumuman_hari,

            'undangan_aanwijzing_peserta_nomor' => $request->undangan_aanwijzing_peserta_nomor,
            'undangan_aanwijzing_peserta_jumlah' => $request->undangan_aanwijzing_peserta_jumlah,
            'undangan_aanwijzing_peserta_tgl' => $request->undangan_aanwijzing_peserta_tgl,
            'undangan_aanwijzing_peserta_hari' => $request->undangan_aanwijzing_peserta_hari,

            'undangan_aanwijzing_direksi_pekerjaan_nomor' => $request->undangan_aanwijzing_direksi_pekerjaan_nomor,
            'undangan_aanwijzing_direksi_pekerjaan_jumlah' => $request->undangan_aanwijzing_direksi_pekerjaan_jumlah,
            'undangan_aanwijzing_direksi_pekerjaan_tgl' => $request->undangan_aanwijzing_direksi_pekerjaan_tgl,
            'undangan_aanwijzing_direksi_pekerjaan_hari' => $request->undangan_aanwijzing_direksi_pekerjaan_hari,

            'aanwijzing_nomor' => $request->aanwijzing_nomor,
            'aanwijzing_jumlah' => $request->aanwijzing_jumlah,
            'aanwijzing_tgl' => $request->aanwijzing_tgl,
            'aanwijzing_hari' => $request->aanwijzing_hari,

            'addendum_rks_nomor' => $request->addendum_rks_nomor,
            'addendum_rks_jumlah' => $request->addendum_rks_jumlah,
            'addendum_rks_tgl' => $request->addendum_rks_tgl,
            'addendum_rks_hari' => $request->addendum_rks_hari,

            'pemasukan_dok_penawaran_nomor' => $request->pemasukan_dok_penawaran_nomor,
            'pemasukan_dok_penawaran_jumlah' => $request->addendum_rks_hari,
            'pemasukan_dok_penawaran_tgl' =>$request->pemasukan_dok_penawaran_tgl,
            'pemasukan_dok_penawaran_hari' => $request->pemasukan_dok_penawaran_hari,

            'pembukaan_penawaran_nomor' => $request->pembukaan_penawaran_nomor,
            'pembukaan_penawaran_jumlah' => $request->pembukaan_penawaran_jumlah,
            'pembukaan_penawaran_tgl' => $request->pembukaan_penawaran_tgl,
            'pembukaan_penawaran_hari' => $request->pembukaan_penawaran_hari,

            'evaluasi_dok_penawaran_nomor' => $request->evaluasi_dok_penawaran_nomor,
            'evaluasi_dok_penawaran_jumlah' => $request->evaluasi_dok_penawaran_jumlah,
            'evaluasi_dok_penawaran_tgl' => $request->evaluasi_dok_penawaran_tgl,
            'evaluasi_dok_penawaran_hari' => $request->evaluasi_dok_penawaran_hari,

            'undangan_pembuktian_kualifikasi_nomor' => $request->undangan_pembuktian_kualifikasi_nomor,
            'undangan_pembuktian_kualifikasi_jumlah' => $request->undangan_pembuktian_kualifikasi_jumlah,
            'undangan_pembuktian_kualifikasi_tgl' => $request->undangan_pembuktian_kualifikasi_tgl,
            'undangan_pembuktian_kualifikasi_hari' => $request->undangan_pembuktian_kualifikasi_hari,

            'pembuktian_kualifikasi_nomor' => $request->pembuktian_kualifikasi_nomor,
            'pembuktian_kualifikasi_jumlah' => $request->pembuktian_kualifikasi_jumlah,
            'pembuktian_kualifikasi_tgl' => $request->pembuktian_kualifikasi_tgl,
            'pembuktian_kualifikasi_hari' => $request->pembuktian_kualifikasi_hari,

            'undangan_klarifikasi_dan_nego_penawaran_nomor' => $request->undangan_klarifikasi_dan_nego_penawaran_nomor,
            'undangan_klarifikasi_dan_nego_penawaran_jumlah' => $request->undangan_klarifikasi_dan_nego_penawaran_jumlah,
            'undangan_klarifikasi_dan_nego_penawaran_tgl' => $request->undangan_klarifikasi_dan_nego_penawaran_tgl,
            'undangan_klarifikasi_dan_nego_penawaran_hari' => $request->undangan_klarifikasi_dan_nego_penawaran_hari,

            'ba_hasil_klarifikasi_dan_nego_penawaran_nomor' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_nomor,
            'ba_hasil_klarifikasi_dan_nego_penawaran_jumlah' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_jumlah,
            'ba_hasil_klarifikasi_dan_nego_penawaran_tgl' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_tgl,
            'ba_hasil_klarifikasi_dan_nego_penawaran_hari' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_hari,

            'laporan_hasil_evaluasi_nomor' => $request->laporan_hasil_evaluasi_nomor,
            'laporan_hasil_evaluasi_jumlah' => $request->laporan_hasil_evaluasi_jumlah,
            'laporan_hasil_evaluasi_tgl' => $request->laporan_hasil_evaluasi_tgl,
            'laporan_hasil_evaluasi_hari' => $request->laporan_hasil_evaluasi_hari,

            'nd_usulan_penetapan_calon_pemenang_nomor' => $request->nd_usulan_penetapan_calon_pemenang_nomor,
            'nd_usulan_penetapan_calon_pemenang_jumlah' => $request->nd_usulan_penetapan_calon_pemenang_jumlah,
            'nd_usulan_penetapan_calon_pemenang_tgl' => $request->nd_usulan_penetapan_calon_pemenang_tgl,
            'nd_usulan_penetapan_calon_pemenang_hari' => $request->nd_usulan_penetapan_calon_pemenang_hari,

            'nd_penetapan_calon_pemenang_nomor' => $request->nd_penetapan_calon_pemenang_nomor,
            'nd_penetapan_calon_pemenang_jumlah' => $request->nd_penetapan_calon_pemenang_jumlah,
            'nd_penetapan_calon_pemenang_tgl' => $request->nd_penetapan_calon_pemenang_tgl,
            'nd_penetapan_calon_pemenang_hari' => $request->nd_penetapan_calon_pemenang_hari,

            'pengumuman_calon_pemenang_nomor' => $request->pengumuman_calon_pemenang_nomor,
            'pengumuman_calon_pemenang_jumlah' => $request->pengumuman_calon_pemenang_jumlah,
            'pengumuman_calon_pemenang_tgl' => $request->pengumuman_calon_pemenang_tgl,
            'pengumuman_calon_pemenang_hari' => $request->pengumuman_calon_pemenang_hari,

            'penunjukan_pemenang_nomor' => $request->penunjukan_pemenang_nomor,
            'penunjukan_pemenang_jumlah' => $request->penunjukan_pemenang_jumlah,
            'penunjukan_pemenang_tgl' => $request->penunjukan_pemenang_tgl,
            'penunjukan_pemenang_hari' => $request->penunjukan_pemenang_hari,

            'skkp_nomor' => $request->skkp_nomor,
            'skkp_jumlah' => $request->skkp_jumlah,
            'skkp_tgl' => $request->skkp_tgl,
            'skkp_hari' => $request->skkp_hari,

            'undangan_cda_nomor' => $request->undangan_cda_nomor,
            'undangan_cda_jumlah' => $request->undangan_cda_jumlah,
            'undangan_cda_tgl' => $request->undangan_cda_tgl,
            'undangan_cda_hari' => $request->undangan_cda_hari,

            'cda_nomor' => $request->cda_nomor,
            'cda_jumlah' => $request->cda_jumlah,
            'cda_tgl' => $request->cda_tgl,
            'cda_hari' => $request->cda_hari,

            'pj_nomor' => $request->pj_nomor,
            'pj_jumlah' => $request->pj_jumlah,
            'pj_tgl' => $request->pj_tgl,
            'pj_hari' => $request->pj_hari,

            'bastl_nomor' => $request->bastl_jumlah,
            'bastl_jumlah' => $request->bastl_jumlah,
            'bastl_tgl' => $request->bastl_jumlah,
            'bastl_hari' => $request->bastl_jumlah,


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


        if (Pengadaan::whereId($request->id)->update($form_data) && PengadaanDetailPj::where('id_pengadaan',$request->id)->update($form_data_hari)) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['errors' => 'Gagal']);
        }


    }

    public function updateDataTetas2(Request $request)
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

        );

        $getMp1 = DMetodePengadaan::where('id', $request->metode_pengadaan)->first();
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data_hari = array(
            'survei_harga_pasar_nomor' => $request->nppv1,
            'survei_harga_pasar_jumlah' => $request->survey_harga_pasar_jumlah,
            'survei_harga_pasar_tgl' => $request->survey_harga_pasar_tgl,
            'survei_harga_pasar_hari' => $request->survey_harga_pasar_hari,

            'hps_nomor' => $request->nppv2,
            'hps_jumlah' => $request->hps_jumlah,
            'hps_tgl' => $request->hps_tgl,
            'hps_hari' => $request->hps_hari,

            'pengumuman_nomor' => $request->pengumuman_nomor,
            'pengumuman_jumlah' => $request->pengumuman_jumlah,
            'pengumuman_tgl' => $request->pengumuman_tgl,
            'pengumuman_hari' => $request->pengumuman_hari,

            'undangan_aanwijzing_peserta_nomor' => $request->undangan_aanwijzing_peserta_nomor,
            'undangan_aanwijzing_peserta_jumlah' => $request->undangan_aanwijzing_peserta_jumlah,
            'undangan_aanwijzing_peserta_tgl' => $request->undangan_aanwijzing_peserta_tgl,
            'undangan_aanwijzing_peserta_hari' => $request->undangan_aanwijzing_peserta_hari,

            'undangan_aanwijzing_direksi_pekerjaan_nomor' => $request->undangan_aanwijzing_direksi_pekerjaan_nomor,
            'undangan_aanwijzing_direksi_pekerjaan_jumlah' => $request->undangan_aanwijzing_direksi_pekerjaan_jumlah,
            'undangan_aanwijzing_direksi_pekerjaan_tgl' => $request->undangan_aanwijzing_direksi_pekerjaan_tgl,
            'undangan_aanwijzing_direksi_pekerjaan_hari' => $request->undangan_aanwijzing_direksi_pekerjaan_hari,

            'aanwijzing_nomor' => $request->aanwijzing_nomor,
            'aanwijzing_jumlah' => $request->aanwijzing_jumlah,
            'aanwijzing_tgl' => $request->aanwijzing_tgl,
            'aanwijzing_hari' => $request->aanwijzing_hari,

            'addendum_rks_nomor' => $request->addendum_rks_nomor,
            'addendum_rks_jumlah' => $request->addendum_rks_jumlah,
            'addendum_rks_tgl' => $request->addendum_rks_tgl,
            'addendum_rks_hari' => $request->addendum_rks_hari,

            'pemasukan_dok_penawaran_nomor' => $request->pemasukan_dok_penawaran_nomor,
            'pemasukan_dok_penawaran_jumlah' => $request->addendum_rks_hari,
            'pemasukan_dok_penawaran_tgl' =>$request->pemasukan_dok_penawaran_tgl,
            'pemasukan_dok_penawaran_hari' => $request->pemasukan_dok_penawaran_hari,

            'pembukaan_penawaran_nomor' => $request->pembukaan_penawaran_nomor,
            'pembukaan_penawaran_jumlah' => $request->pembukaan_penawaran_jumlah,
            'pembukaan_penawaran_tgl' => $request->pembukaan_penawaran_tgl,
            'pembukaan_penawaran_hari' => $request->pembukaan_penawaran_hari,

            'evaluasi_dok_penawaran_nomor' => $request->evaluasi_dok_penawaran_nomor,
            'evaluasi_dok_penawaran_jumlah' => $request->evaluasi_dok_penawaran_jumlah,
            'evaluasi_dok_penawaran_tgl' => $request->evaluasi_dok_penawaran_tgl,
            'evaluasi_dok_penawaran_hari' => $request->evaluasi_dok_penawaran_hari,

            'undangan_pembuktian_kualifikasi_nomor' => $request->undangan_pembuktian_kualifikasi_nomor,
            'undangan_pembuktian_kualifikasi_jumlah' => $request->undangan_pembuktian_kualifikasi_jumlah,
            'undangan_pembuktian_kualifikasi_tgl' => $request->undangan_pembuktian_kualifikasi_tgl,
            'undangan_pembuktian_kualifikasi_hari' => $request->undangan_pembuktian_kualifikasi_hari,

            'pembuktian_kualifikasi_nomor' => $request->pembuktian_kualifikasi_nomor,
            'pembuktian_kualifikasi_jumlah' => $request->pembuktian_kualifikasi_jumlah,
            'pembuktian_kualifikasi_tgl' => $request->pembuktian_kualifikasi_tgl,
            'pembuktian_kualifikasi_hari' => $request->pembuktian_kualifikasi_hari,

            'undangan_klarifikasi_dan_nego_penawaran_nomor' => $request->undangan_klarifikasi_dan_nego_penawaran_nomor,
            'undangan_klarifikasi_dan_nego_penawaran_jumlah' => $request->undangan_klarifikasi_dan_nego_penawaran_jumlah,
            'undangan_klarifikasi_dan_nego_penawaran_tgl' => $request->undangan_klarifikasi_dan_nego_penawaran_tgl,
            'undangan_klarifikasi_dan_nego_penawaran_hari' => $request->undangan_klarifikasi_dan_nego_penawaran_hari,

            'ba_hasil_klarifikasi_dan_nego_penawaran_nomor' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_nomor,
            'ba_hasil_klarifikasi_dan_nego_penawaran_jumlah' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_jumlah,
            'ba_hasil_klarifikasi_dan_nego_penawaran_tgl' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_tgl,
            'ba_hasil_klarifikasi_dan_nego_penawaran_hari' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_hari,

            'laporan_hasil_evaluasi_nomor' => $request->laporan_hasil_evaluasi_nomor,
            'laporan_hasil_evaluasi_jumlah' => $request->laporan_hasil_evaluasi_jumlah,
            'laporan_hasil_evaluasi_tgl' => $request->laporan_hasil_evaluasi_tgl,
            'laporan_hasil_evaluasi_hari' => $request->laporan_hasil_evaluasi_hari,

            'nd_usulan_penetapan_calon_pemenang_nomor' => $request->nd_usulan_penetapan_calon_pemenang_nomor,
            'nd_usulan_penetapan_calon_pemenang_jumlah' => $request->nd_usulan_penetapan_calon_pemenang_jumlah,
            'nd_usulan_penetapan_calon_pemenang_tgl' => $request->nd_usulan_penetapan_calon_pemenang_tgl,
            'nd_usulan_penetapan_calon_pemenang_hari' => $request->nd_usulan_penetapan_calon_pemenang_hari,

            'nd_penetapan_calon_pemenang_nomor' => $request->nd_penetapan_calon_pemenang_nomor,
            'nd_penetapan_calon_pemenang_jumlah' => $request->nd_penetapan_calon_pemenang_jumlah,
            'nd_penetapan_calon_pemenang_tgl' => $request->nd_penetapan_calon_pemenang_tgl,
            'nd_penetapan_calon_pemenang_hari' => $request->nd_penetapan_calon_pemenang_hari,

            'pengumuman_calon_pemenang_nomor' => $request->pengumuman_calon_pemenang_nomor,
            'pengumuman_calon_pemenang_jumlah' => $request->pengumuman_calon_pemenang_jumlah,
            'pengumuman_calon_pemenang_tgl' => $request->pengumuman_calon_pemenang_tgl,
            'pengumuman_calon_pemenang_hari' => $request->pengumuman_calon_pemenang_hari,

            'penunjukan_pemenang_nomor' => $request->penunjukan_pemenang_nomor,
            'penunjukan_pemenang_jumlah' => $request->penunjukan_pemenang_jumlah,
            'penunjukan_pemenang_tgl' => $request->penunjukan_pemenang_tgl,
            'penunjukan_pemenang_hari' => $request->penunjukan_pemenang_hari,

            'skkp_nomor' => $request->skkp_nomor,
            'skkp_jumlah' => $request->skkp_jumlah,
            'skkp_tgl' => $request->skkp_tgl,
            'skkp_hari' => $request->skkp_hari,

            'undangan_cda_nomor' => $request->undangan_cda_nomor,
            'undangan_cda_jumlah' => $request->undangan_cda_jumlah,
            'undangan_cda_tgl' => $request->undangan_cda_tgl,
            'undangan_cda_hari' => $request->undangan_cda_hari,

            'cda_nomor' => $request->cda_nomor,
            'cda_jumlah' => $request->cda_jumlah,
            'cda_tgl' => $request->cda_tgl,
            'cda_hari' => $request->cda_hari,

            'pj_nomor' => $request->pj_nomor,
            'pj_jumlah' => $request->pj_jumlah,
            'pj_tgl' => $request->pj_tgl,
            'pj_hari' => $request->pj_hari,

            'bastl_nomor' => $request->bastl_jumlah,
            'bastl_jumlah' => $request->bastl_jumlah,
            'bastl_tgl' => $request->bastl_jumlah,
            'bastl_hari' => $request->bastl_jumlah,


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


        if (Pengadaan::whereId($request->id)->update($form_data) && PengadaanDetailPj::where('id_pengadaan',$request->id)->update($form_data_hari)) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['errors' => 'Gagal']);
        }


    }


}
