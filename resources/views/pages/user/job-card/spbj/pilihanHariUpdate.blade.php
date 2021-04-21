<div class="form-group m-form__group row">
    <button onclick="updateTanggal()" class="btn btn-block btn-info"><i class="fa fa-refresh"></i> Sync Tanggal</button>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        RKS:
    </label>
    <div class="col-lg-4">
        <input value="{{$dataPengadaanDetail->rks_nomor}}" type="text" id="nppv8" name="nppv8"
               class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input rks_jumlah"
               name="rks_jumlah"
               value="{{$dataPengadaanDetail->rks_jumlah}}"
               id="rks_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            name="rks_tgl"
            id="rks_tgl"
            value="{{$dataPengadaanDetail->rks_tgl}}"
            type='text' class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input name="rks_hari"
               id="rks_hari"
               readonly
               value="{{$dataPengadaanDetail->rks_hari}}"
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        <a href="{!!url('user/jobcard/spbj/download-rks/' . $dataPengadaan->id )!!}"
           class="btn btn-brand btn-sm">
            Download
        </a>
    </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Survey Harga Pasar:
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

                    <a href="{!!url('user/jobcard/spbj/download-shp1/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Survey Harga Pasar
                    </a>
                    <a href="{!!url('user/jobcard/spbj/download-shp2/' . $dataPengadaan->id )!!}"
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
    @if($dataPengadaanDetail->survey_harga_pasar_tgl != null)
    <div class="col-lg-2">
        <a href="{!!url('user/jobcard/spbj/download-hps/' . $dataPengadaan->id )!!}"
           class="btn btn-brand btn-sm">
            Download
        </a>
    </div>
    @endif
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Undangan Pengadaan Langsung:
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->undangan_pengadaan_langsung_nomor}}" id="nppv3"
               name="nppv3" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->undangan_pengadaan_langsung_jumlah}}"
               class="form-control m-input undangan_pengadaan_langsung_jumlah"
               name="undangan_pengadaan_langsung_jumlah"
               id="undangan_pengadaan_langsung_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->undangan_pengadaan_langsung_tgl}}"
            name="undangan_pengadaan_langsung_tgl"
            id="undangan_pengadaan_langsung_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->undangan_pengadaan_langsung_hari}}" name="undangan_pengadaan_langsung_hari"
               id="undangan_pengadaan_langsung_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    @if($dataPengadaanDetail->undangan_pengadaan_langsung_tgl != null)
        <div class="col-lg-2">
            <a href="{!!url('user/jobcard/spbj/download-uplh/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        </div>
    @endif
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
            <a href="{!!url('user/jobcard/spbj/download-pemasukan-penawaran/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Evaluasi Dok Penawaran :
    </label>
    {{-- <div class="col-lg-12">
        <input type="text" value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_nomor}}" id="nppv5"
               name="nppv5" class="form-control m-input">
        <span class="m-form__help"></span>
    </div> --}}
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_jumlah_dari}}"
               class="form-control m-input evaluasi_dok_penawaran_jumlah_dari"
               name="evaluasi_dok_penawaran_jumlah_dari"
               id="evaluasi_dok_penawaran_jumlah_dari" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_tgl_dari}}"
            name="evaluasi_dok_penawaran_tgl_dari"
            id="evaluasi_dok_penawaran_tgl_dari"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_hari_dari}}" name="evaluasi_dok_penawaran_hari_dari"
               id="evaluasi_dok_penawaran_hari_dari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_jumlah}}"
               class="form-control m-input evaluasi_dok_penawaran_jumlah"
               name="evaluasi_dok_penawaran_jumlah"
               id="evaluasi_dok_penawaran_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_tgl}}"
            name="evaluasi_dok_penawaran_tgl"
            id="evaluasi_dok_penawaran_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_hari}}" name="evaluasi_dok_penawaran_hari"
               id="evaluasi_dok_penawaran_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    @if($dataPengadaanDetail->evaluasi_dok_penawaran_tgl != null)
    <div class="col-lg-1">
        <a href="{!!url('user/jobcard/spbj/evaluasiDokumen2/' . $dataPengadaan->id )!!}"
           class="btn btn-brand btn-sm">
            Download
        </a>
    </div>
    @endif
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-3 col-form-label">
        Evaluasi Dok Penawaran Nomor:
    </label>
    <div class="col-lg-7">
        <input type="text" value="{{$dataPengadaanDetail->evaluasi_dok_penawaran_nomor}}" id="nppv5"
               name="nppv5" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Ba Hasil Klarifikasi Dan Nego Penawaran :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->ba_hasil_klarifikasi_dan_nego_penawaran_nomor}}" id="nppv6"
               name="nppv6" class="form-control m-input">
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
    @if($dataPengadaanDetail->ba_hasil_klarifikasi_dan_nego_penawaran_tgl != null)
    <div class="col-lg-2">
        <a href="{!!url('user/jobcard/spbj/download-berita-acara-klarifikasi/' . $dataPengadaan->id )!!}"
           class="btn btn-brand btn-sm">
            Download
        </a>
    </div>
    @endif
    </div>
</div>


<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Spbj :
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->spbj_nomor}}" id="nppv7"
               name="nppv7" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" value="{{$dataPengadaanDetail->spbj_jumlah}}"
               class="form-control m-input spbj_jumlah"
               name="spbj_jumlah"
               id="spbj_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->spbj_tgl}}"
            name="spbj_tgl"
            id="spbj_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->spbj_hari}}" name="spbj_hari"
               id="spbj_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-2">
        <a href="{!!url('user/jobcard/spbj/downloadSpbj/' . $dataPengadaan->id )!!}"
           class="btn btn-brand btn-sm">
            Download
        </a>
    </div>
</div>

@include('pages.user.job-card.spbj.jsUpdatePilihanHari')
