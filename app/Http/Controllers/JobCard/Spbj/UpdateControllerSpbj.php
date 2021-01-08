<?php


namespace App\Http\Controllers\JobCard\Spbj;


use App\Http\Controllers\Controller;
use App\ModelsResource\DMetodePengadaan;
use App\Pengadaan;
use App\PengadaanDetailPj;
use App\PengadaanDetailSpbj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateControllerSpbj extends Controller
{

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

            'undangan_pengadaan_langsung_nomor' => $request->nppv3,
            'undangan_pengadaan_langsung_jumlah' => $request->undangan_pengadaan_langsung_jumlah,
            'undangan_pengadaan_langsung_tgl' =>$request->pemasukan_dok_penawaran_tgl,
            'undangan_pengadaan_langsung_hari' => $request->undangan_pengadaan_langsung_hari,



            'pemasukan_dok_penawaran_nomor' => $request->nppv4,
            'pemasukan_dok_penawaran_jumlah' => $request->pemasukan_dok_penawaran_jumlah,
            'pemasukan_dok_penawaran_tgl' =>$request->pemasukan_dok_penawaran_tgl,
            'pemasukan_dok_penawaran_hari' => $request->pemasukan_dok_penawaran_hari,


            'evaluasi_dok_penawaran_nomor' => $request->nppv5,
            'evaluasi_dok_penawaran_jumlah' => $request->evaluasi_dok_penawaran_jumlah,
            'evaluasi_dok_penawaran_tgl' => $request->evaluasi_dok_penawaran_tgl,
            'evaluasi_dok_penawaran_hari' => $request->evaluasi_dok_penawaran_hari,



            'ba_hasil_klarifikasi_dan_nego_penawaran_nomor' => $request->nppv6,
            'ba_hasil_klarifikasi_dan_nego_penawaran_jumlah' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_jumlah,
            'ba_hasil_klarifikasi_dan_nego_penawaran_tgl' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_tgl,
            'ba_hasil_klarifikasi_dan_nego_penawaran_hari' => $request->ba_hasil_klarifikasi_dan_nego_penawaran_hari,


            'spbj_nomor' => $request->nppv7,
            'spbj_jumlah' => $request->spbj_jumlah,
            'spbj_tgl' => $request->spbj_tgl,
            'spbj_hari' => $request->spbj_hari,



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


        if (Pengadaan::whereId($request->id)->update($form_data) && PengadaanDetailSpbj::where('id_pengadaan',$request->id)->update($form_data_hari)) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['errors' => 'Gagal']);
        }


    }

}
