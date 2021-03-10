<div class="form-group m-form__group row">
    <button onclick="updateTanggal()" class="btn btn-block btn-info"><i class="fa fa-refresh"></i> Sync Tanggal</button>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Survei Harga Pasar:
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->survey_harga_pasar_nomor}}" id="nppv1"
               name="nppv1" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input survey_harga_pasar_jumlah"
               name="survey_harga_pasar_jumlah"
               value="{{$dataPengadaanDetail->survey_harga_pasar_jumlah}}"
               id="survey_harga_pasar_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->survey_harga_pasar_tgl}}"
            name="survey_harga_pasar_tgl"
            id="survey_harga_pasar_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->survey_harga_pasar_hari}}"
               name="survey_harga_pasar_hari"
               id="survey_harga_pasar_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    @if($dataPengadaanDetail->survey_harga_pasar_tgl != null)
        <div class="col-lg-2">
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a href="{!!url('user/jobcard/pj/download-shp1/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Survey Harga Pasar
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-shp2/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Form Daftar Hadir
                    </a>

                </div>
            </div>
        </div>
    @endif
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        HPS:
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->hps_nomor}}" id="nppv2"
               name="nppv2" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->hps_jumlah}}"
               class="form-control m-input hps_jumlah"
               name="hps_jumlah"
               id="hps_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->hps_tgl}}"
            name="hps_tgl"
            id="hps_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->hps_hari}}" name="hps_hari"
               id="hps_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->hps_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-hps/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Pengumuman :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->pengumuman_nomor}}" id="nppv3"
               name="nppv3" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->pengumuman_jumlah}}"
               class="form-control m-input pengumuman_jumlah"
               name="pengumuman_jumlah"
               id="pengumuman_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->pengumuman_tgl}}"
            name="pengumuman_tgl"
            id="pengumuman_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->pengumuman_hari}}" name="pengumuman_hari"
               id="pengumuman_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->pengumuman_tgl != null)
            <a href="{!!url('user/jobcard/pj/downloadPengumuman/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Undangan aanwijzing Peserta :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->undangan_aanwijzing_peserta_nomor}}" id="nppv4"
               name="nppv4" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->undangan_aanwijzing_peserta_jumlah}}"
               class="form-control m-input undangan_aanwijzing_peserta_jumlah"
               name="undangan_aanwijzing_peserta_jumlah"
               id="undangan_aanwijzing_peserta_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->undangan_aanwijzing_peserta_tgl}}"
            name="undangan_aanwijzing_peserta_tgl"
            id="undangan_aanwijzing_peserta_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->undangan_aanwijzing_peserta_hari}}"
               name="undangan_aanwijzing_peserta_hari"
               id="undangan_aanwijzing_peserta_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->undangan_aanwijzing_peserta_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-asman/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Undangan aanwijzing Direksi Pekerjaan :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->undangan_aanwijzing_direksi_pekerjaan_nomor}}" id="nppv5"
               name="nppv5" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->undangan_aanwijzing_direksi_pekerjaan_jumlah}}"
               class="form-control m-input undangan_aanwijzing_direksi_pekerjaan_jumlah"
               name="undangan_aanwijzing_direksi_pekerjaan_jumlah"
               id="undangan_aanwijzing_direksi_pekerjaan_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->undangan_aanwijzing_direksi_pekerjaan_tgl}}"
            name="undangan_aanwijzing_direksi_pekerjaan_tgl"
            id="undangan_aanwijzing_direksi_pekerjaan_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->undangan_aanwijzing_direksi_pekerjaan_hari}}"
               name="undangan_aanwijzing_direksi_pekerjaan_hari"
               id="undangan_aanwijzing_direksi_pekerjaan_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->undangan_aanwijzing_direksi_pekerjaan_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-penjelasan/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Aanwijzing :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->aanwijzing_nomor}}" id="nppv6"
               name="nppv6" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->aanwijzing_jumlah}}"
               class="form-control m-input aanwijzing_jumlah"
               name="aanwijzing_jumlah"
               id="aanwijzing_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->aanwijzing_tgl}}"
            name="aanwijzing_tgl"
            id="aanwijzing_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->aanwijzing_hari}}" name="aanwijzing_hari"
               id="aanwijzing_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->aanwijzing_tgl != null)
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a href="{!!url('user/jobcard/pj/download-aanwijzing-form/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Form Daftar Hadir Pelaksana
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-aanwijzing-berita-acara/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Berita Acara
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-aanwijzing-daftar-hadir-penyedia/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir Penyedia
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Addendum Rks :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->addendum_rks_nomor}}" id="nppv7"
               name="nppv7" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->addendum_rks_jumlah}}"
               class="form-control m-input addendum_rks_jumlah"
               name="addendum_rks_jumlah"
               id="addendum_rks_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->addendum_rks_tgl}}"
            name="addendum_rks_tgl"
            id="addendum_rks_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->addendum_rks_hari}}" name="addendum_rks_hari"
               id="addendum_rks_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->addendum_rks_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-addendum/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Pemasukan Dok Penawaran :
    </label>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->pemasukan_dok_penawaran_jumlah_dari}}"
               class="form-control m-input pemasukan_dok_penawaran_jumlah_dari"
               name="pemasukan_dok_penawaran_jumlah_dari"
               id="pemasukan_dok_penawaran_jumlah_dari" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->pemasukan_dok_penawaran_tgl_dari}}"
            name="pemasukan_dok_penawaran_tgl_dari"
            id="pemasukan_dok_penawaran_tgl_dari"
            type="text" class="form-control" readonly placeholder="Tanggal Dari"/>
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->pemasukan_dok_penawaran_hari_dari}}"
               name="pemasukan_dok_penawaran_hari_dari"
               id="pemasukan_dok_penawaran_hari_dari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->pemasukan_dok_penawaran_jumlah}}"
               class="form-control m-input pemasukan_dok_penawaran_jumlah"
               name="pemasukan_dok_penawaran_jumlah"
               id="pemasukan_dok_penawaran_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->pemasukan_dok_penawaran_tgl}}"
            name="pemasukan_dok_penawaran_tgl"
            id="pemasukan_dok_penawaran_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal Sampai"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->pemasukan_dok_penawaran_hari}}" name="pemasukan_dok_penawaran_hari"
               id="pemasukan_dok_penawaran_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->pemasukan_dok_penawaran_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-pemasukan-penawaran/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Pembukaan Penawaran Sampul Satu  :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->pembukaan_penawaran_sampul_satu_nomor}}" id="nppv9"
               name="nppv9" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->pembukaan_penawaran_sampul_satu_jumlah}}"
               class="form-control m-input pembukaan_penawaran_sampul_satu_jumlah"
               name="pembukaan_penawaran_sampul_satu_jumlah"
               id="pembukaan_penawaran_sampul_satu_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->pembukaan_penawaran_sampul_satu_tgl}}"
            name="pembukaan_penawaran_sampul_satu_tgl"
            id="pembukaan_penawaran_sampul_satu_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->pembukaan_penawaran_sampul_satu_hari}}" name="pembukaan_penawaran_sampul_satu_hari"
               id="pembukaan_penawaran_sampul_satu_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->pembukaan_penawaran_sampul_satu_tgl != null)
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a href="{!!url('user/jobcard/pj/download-pembukaan1-ba/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Ba Pembukaan Dok Penawaran
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-pembukaan1-catatan/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Catatan Hasil
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-pembukaan1-pelaksana/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir Pelaksana
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-pembukaan1-penyedia/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir Penyedia
                    </a>
                </div>
            </div>
    </div>
    @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Evaluasi Dok Penawaran Sampul Satu  :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_sampul_satu_nomor}}" id="nppv10"
               name="nppv10" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_sampul_satu_jumlah}}"
               class="form-control m-input evaluasi_dok_penawaran_sampul_satu_jumlah"
               name="evaluasi_dok_penawaran_sampul_satu_jumlah"
               id="evaluasi_dok_penawaran_sampul_satu_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_sampul_satu_tgl}}"
            name="evaluasi_dok_penawaran_sampul_satu_tgl"
            id="evaluasi_dok_penawaran_sampul_satu_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_sampul_satu_hari}}" name="evaluasi_dok_penawaran_sampul_satu_hari"
               id="evaluasi_dok_penawaran_sampul_satu_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->evaluasi_dok_penawaran_sampul_satu_tgl != null)
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a href="{!!url('user/jobcard/pj/download-eva1-daftar-hadir/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-eva1-hasil-penilaian/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Hasil Penilaian
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-eva1-rekap-hasil/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Rekap Hasil Penilaian
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Pengumuman Hasil Evaluasi Sampul Satu  :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->pengumuman_hasil_evaluasi_sampul_satu_nomor}}" id="nppv11"
               name="nppv11" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->pengumuman_hasil_evaluasi_sampul_satu_jumlah}}"
               class="form-control m-input pengumuman_hasil_evaluasi_sampul_satu_jumlah"
               name="pengumuman_hasil_evaluasi_sampul_satu_jumlah"
               id="pengumuman_hasil_evaluasi_sampul_satu_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->pengumuman_hasil_evaluasi_sampul_satu_tgl}}"
            name="pengumuman_hasil_evaluasi_sampul_satu_tgl"
            id="pengumuman_hasil_evaluasi_sampul_satu_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->pengumuman_hasil_evaluasi_sampul_satu_hari}}" name="pengumuman_hasil_evaluasi_sampul_satu_hari"
               id="pengumuman_hasil_evaluasi_sampul_satu_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->pengumuman_hasil_evaluasi_sampul_satu_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-eva1-pengumuman/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Pembukaan Penawaran Sampul Dua  :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->pembukaan_penawaran_sampul_dua_nomor}}" id="nppv12"
               name="nppv12" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->pembukaan_penawaran_sampul_dua_jumlah}}"
               class="form-control m-input pembukaan_penawaran_sampul_dua_jumlah"
               name="pembukaan_penawaran_sampul_dua_jumlah"
               id="pembukaan_penawaran_sampul_dua_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->pembukaan_penawaran_sampul_dua_tgl}}"
            name="pembukaan_penawaran_sampul_dua_tgl"
            id="pembukaan_penawaran_sampul_dua_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->pembukaan_penawaran_sampul_dua_hari}}" name="pembukaan_penawaran_sampul_dua_hari"
               id="pembukaan_penawaran_sampul_dua_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->pembukaan_penawaran_sampul_dua_tgl != null)
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a href="{!!url('user/jobcard/pj/download-pembukaan2-ba/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Pembukaan Dok Penawaran
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-pembukaan2-undangan/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Undangan Pembukaan
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-pembukaan2-pelaksana/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir Pelaksana
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-pembukaan2-penyedia/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir Penyedia
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Evaluasi Dok Penawaran Sampul Dua  :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_sampul_dua_nomor}}" id="nppv13"
               name="nppv13" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_sampul_dua_jumlah}}"
               class="form-control m-input evaluasi_dok_penawaran_sampul_dua_jumlah"
               name="evaluasi_dok_penawaran_sampul_dua_jumlah"
               id="evaluasi_dok_penawaran_sampul_dua_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_sampul_dua_tgl}}"
            name="evaluasi_dok_penawaran_sampul_dua_tgl"
            id="evaluasi_dok_penawaran_sampul_dua_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_sampul_dua_hari}}" name="evaluasi_dok_penawaran_sampul_dua_hari"
               id="evaluasi_dok_penawaran_sampul_dua_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->evaluasi_dok_penawaran_sampul_dua_tgl != null)
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a href="{!!url('user/jobcard/pj/download-eva2-daftar-hadir/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-eva2-hasil-penilaian/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Hasil Penilaian
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-eva2-rekap-hasil/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Rekap Hasil Penilaian
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-eva2-catatan-koreksi/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Catatan Koreksi
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>


<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Undangan Klarifikasi Dan Nego Penawaran  :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->undangan_klarifikasi_dan_nego_penawaran_nomor}}" id="nppv14"
               name="nppv14" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->undangan_klarifikasi_dan_nego_penawaran_jumlah}}"
               class="form-control m-input undangan_klarifikasi_dan_nego_penawaran_jumlah"
               name="undangan_klarifikasi_dan_nego_penawaran_jumlah"
               id="undangan_klarifikasi_dan_nego_penawaran_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->undangan_klarifikasi_dan_nego_penawaran_tgl}}"
            name="undangan_klarifikasi_dan_nego_penawaran_tgl"
            id="undangan_klarifikasi_dan_nego_penawaran_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->undangan_klarifikasi_dan_nego_penawaran_hari}}" name="undangan_klarifikasi_dan_nego_penawaran_hari"
               id="undangan_klarifikasi_dan_nego_penawaran_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->undangan_pembuktian_kualifikasi_tgl != null)
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a href="{!!url('user/jobcard/pj/download-pembuktian-undangan/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Undangan
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-pembuktian-daftar-pelaksana/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Form Data Hadir Pelaksana
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-pembuktian-daftar-penyedia/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Form Data Hadir Penyedia
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Ba Hasil Klarifikasi Dan Nego Penawaran :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->ba_hasil_klarifikasi_dan_nego_penawaran_nomor}}" id="nppv15"
               name="nppv15" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->ba_hasil_klarifikasi_dan_nego_penawaran_jumlah}}"
               class="form-control m-input ba_hasil_klarifikasi_dan_nego_penawaran_jumlah"
               name="ba_hasil_klarifikasi_dan_nego_penawaran_jumlah"
               id="ba_hasil_klarifikasi_dan_nego_penawaran_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->ba_hasil_klarifikasi_dan_nego_penawaran_tgl}}"
            name="ba_hasil_klarifikasi_dan_nego_penawaran_tgl"
            id="ba_hasil_klarifikasi_dan_nego_penawaran_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->ba_hasil_klarifikasi_dan_nego_penawaran_hari}}" name="ba_hasil_klarifikasi_dan_nego_penawaran_hari"
               id="ba_hasil_klarifikasi_dan_nego_penawaran_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->ba_hasil_klarifikasi_dan_nego_penawaran_tgl != null)
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a href="{!!url('user/jobcard/pj/download-berita-acara-klarifikasi/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Berita Acara
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-rekapitulasi/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Rekapitulasi
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Laporan Hasil Evaluasi :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->laporan_hasil_evaluasi_nomor}}" id="nppv16"
               name="nppv16" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->laporan_hasil_evaluasi_jumlah}}"
               class="form-control m-input laporan_hasil_evaluasi_jumlah"
               name="laporan_hasil_evaluasi_jumlah"
               id="laporan_hasil_evaluasi_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->laporan_hasil_evaluasi_tgl}}"
            name="laporan_hasil_evaluasi_tgl"
            id="laporan_hasil_evaluasi_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->laporan_hasil_evaluasi_hari}}" name="laporan_hasil_evaluasi_hari"
               id="laporan_hasil_evaluasi_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->laporan_hasil_evaluasi_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-laporan-hasil-evaluasi/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Nd Usulan Penetapan Calon Pemenang :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->nd_usulan_penetapan_calon_pemenang_nomor}}" id="nppv17"
               name="nppv17" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->nd_usulan_penetapan_calon_pemenang_jumlah}}"
               class="form-control m-input nd_usulan_penetapan_calon_pemenang_jumlah"
               name="nd_usulan_penetapan_calon_pemenang_jumlah"
               id="nd_usulan_penetapan_calon_pemenang_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->nd_usulan_penetapan_calon_pemenang_tgl}}"
            name="nd_usulan_penetapan_calon_pemenang_tgl"
            id="nd_usulan_penetapan_calon_pemenang_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->nd_usulan_penetapan_calon_pemenang_hari}}" name="nd_usulan_penetapan_calon_pemenang_hari"
               id="nd_usulan_penetapan_calon_pemenang_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->nd_usulan_penetapan_calon_pemenang_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-nd-usulan-calon/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Nd Penetapan Calon Pemenang :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->nd_penetapan_calon_pemenang_nomor}}" id="nppv18"
               name="nppv18" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->nd_penetapan_calon_pemenang_jumlah}}"
               class="form-control m-input nd_penetapan_calon_pemenang_jumlah"
               name="nd_penetapan_calon_pemenang_jumlah"
               id="nd_penetapan_calon_pemenang_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->nd_penetapan_calon_pemenang_tgl}}"
            name="nd_penetapan_calon_pemenang_tgl"
            id="nd_penetapan_calon_pemenang_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->nd_penetapan_calon_pemenang_hari}}" name="nd_penetapan_calon_pemenang_hari"
               id="nd_penetapan_calon_pemenang_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->nd_penetapan_calon_pemenang_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-nd-penetapan-pemenang/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Pengumuman Calon Pemenang :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->pengumuman_calon_pemenang_nomor}}" id="nppv19"
               name="nppv19" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->pengumuman_calon_pemenang_jumlah}}"
               class="form-control m-input pengumuman_calon_pemenang_jumlah"
               name="pengumuman_calon_pemenang_jumlah"
               id="pengumuman_calon_pemenang_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->pengumuman_calon_pemenang_tgl}}"
            name="pengumuman_calon_pemenang_tgl"
            id="pengumuman_calon_pemenang_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->pengumuman_calon_pemenang_hari}}" name="pengumuman_calon_pemenang_hari"
               id="pengumuman_calon_pemenang_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->pengumuman_calon_pemenang_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-pengumuman-calon/'  . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Penunjukan Pemenang :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->penunjukan_pemenang_nomor}}" id="nppv20"
               name="nppv20" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->penunjukan_pemenang_jumlah}}"
               class="form-control m-input penunjukan_pemenang_jumlah"
               name="penunjukan_pemenang_jumlah"
               id="penunjukan_pemenang_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->penunjukan_pemenang_tgl}}"
            name="penunjukan_pemenang_tgl"
            id="penunjukan_pemenang_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->penunjukan_pemenang_hari}}" name="penunjukan_pemenang_hari"
               id="penunjukan_pemenang_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->penunjukan_pemenang_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-sppbj/'  . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        SKKP :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->skkp_nomor}}" id="nppv21"
               name="nppv21" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->skkp_jumlah}}"
               class="form-control m-input skkp_jumlah"
               name="skkp_jumlah"
               id="skkp_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->skkp_tgl}}"
            name="skkp_tgl"
            id="skkp_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->skkp_hari}}" name="skkp_hari"
               id="skkp_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->skkp_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-skpp/'  . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Undangan Cda :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->undangan_cda_nomor}}" id="nppv22"
               name="nppv22" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->undangan_cda_jumlah}}"
               class="form-control m-input undangan_cda_jumlah"
               name="undangan_cda_jumlah"
               id="undangan_cda_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->undangan_cda_tgl}}"
            name="undangan_cda_tgl"
            id="undangan_cda_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->undangan_cda_hari}}" name="undangan_cda_hari"
               id="undangan_cda_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->undangan_cda_tgl != null)
            <a href="{!!url('user/jobcard/pj/download-und-cda/'  . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Undangan Cda :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->cda_nomor}}" id="nppv23"
               name="nppv23" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->cda_jumlah}}"
               class="form-control m-input cda_jumlah"
               name="cda_jumlah"
               id="cda_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->cda_tgl}}"
            name="cda_tgl"
            id="cda_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->cda_hari}}" name="cda_hari"
               id="cda_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        @if($dataPengadaanDetail->cda_tgl != null)
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a href="{!!url('user/jobcard/pj/download-berita-acara-cda/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Berita Acara
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-daftar-hadir-pelaksana-cda/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir Pelaksana Pengadaan
                    </a>
                    <a href="{!!url('user/jobcard/pj/download-daftar-hadir-penyedia-cda/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir Penyedia Barang dan Jasa
                    </a>

                </div>
            </div>
        @endif
    </div>
</div>

{{--<div class="form-group m-form__group row">--}}
{{--    <label class="col-lg-2 col-form-label">--}}
{{--        Pj :--}}
{{--    </label>--}}
{{--    <div class="col-lg-4">--}}
{{--        <input type="text" value="{{$dataPengadaanDetail->pj_nomor}}" id="nppv24"--}}
{{--               name="nppv24" class="form-control m-input">--}}
{{--        <span class="m-form__help"></span>--}}
{{--    </div>--}}
{{--    <div class="col-lg-1">--}}
{{--        <input type="text" value="{{$dataPengadaanDetail->pj_jumlah}}"--}}
{{--               class="form-control m-input pj_jumlah"--}}
{{--               name="pj_jumlah"--}}
{{--               id="pj_jumlah" placeholder="Jumlah">--}}
{{--        <span class="m-form__help "></span>--}}
{{--    </div>--}}
{{--    <div class="col-lg-2">--}}
{{--        <input--}}
{{--            value="{{$dataPengadaanDetail->pj_tgl}}"--}}
{{--            name="pj_tgl"--}}
{{--            id="pj_tgl"--}}
{{--            type="text" class="form-control" readonly placeholder="Tanggal"/>--}}
{{--    </div>--}}
{{--    <div class="col-lg-1">--}}
{{--        <input value="{{$dataPengadaanDetail->pj_hari}}" name="pj_hari"--}}
{{--               id="pj_hari"--}}
{{--               readonly--}}
{{--               type="text" class="form-control m-input" placeholder="Hari">--}}
{{--        <span class="m-form__help"></span>--}}
{{--    </div>--}}
{{--    <div class="col-lg-2">--}}
{{--        <a href="{!!url('user/jobcard/download-hps/' . $dataPengadaan->id )!!}"--}}
{{--           class="btn btn-brand btn-sm">--}}
{{--            Download--}}
{{--        </a>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="form-group m-form__group row">--}}
{{--    <label class="col-lg-2 col-form-label">--}}
{{--        Bastl :--}}
{{--    </label>--}}
{{--    <div class="col-lg-4">--}}
{{--        <input type="text" value="{{$dataPengadaanDetail->bastl_nomor}}" id="nppv25"--}}
{{--               name="nppv25" class="form-control m-input">--}}
{{--        <span class="m-form__help"></span>--}}
{{--    </div>--}}
{{--    <div class="col-lg-1">--}}
{{--        <input type="text" value="{{$dataPengadaanDetail->bastl_jumlah}}"--}}
{{--               class="form-control m-input bastl_jumlah"--}}
{{--               name="bastl_jumlah"--}}
{{--               id="bastl_jumlah" placeholder="Jumlah">--}}
{{--        <span class="m-form__help "></span>--}}
{{--    </div>--}}
{{--    <div class="col-lg-2">--}}
{{--        <input--}}
{{--            value="{{$dataPengadaanDetail->bastl_tgl}}"--}}
{{--            name="bastl_tgl"--}}
{{--            id="bastl_tgl"--}}
{{--            type="text" class="form-control" readonly placeholder="Tanggal"/>--}}
{{--    </div>--}}
{{--    <div class="col-lg-1">--}}
{{--        <input value="{{$dataPengadaanDetail->bastl_hari}}" name="bastl_hari"--}}
{{--               id="bastl_hari"--}}
{{--               readonly--}}
{{--               type="text" class="form-control m-input" placeholder="Hari">--}}
{{--        <span class="m-form__help"></span>--}}
{{--    </div>--}}
{{--    <div class="col-lg-2">--}}
{{--        <a href="{!!url('user/jobcard/download-hps/' . $dataPengadaan->id )!!}"--}}
{{--           class="btn btn-brand btn-sm">--}}
{{--            Download--}}
{{--        </a>--}}
{{--    </div>--}}
{{--</div>--}}
@include('pages.user.job-card.pj.updatePengadaanTetas2.jsUpdatePilihanHari')
