<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Dokumen RKS:
    </label>
    <div class="col-lg-4">
        <input value="{{$dataPengadaanDetail->rks_nomor}}" type="text" id="nppv11" name="nppv11"
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
        <a href="{!!url('user/jobcard/spk/download-rks/' . $dataPengadaan->id )!!}"
           class="btn btn-brand btn-sm">
            Download
        </a>
    </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Survei Harga Pasar:
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->survei_harga_pasar_nomor}}" id="nppv1"
               name="nppv1" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input survey_harga_pasar_jumlah"
               name="survey_harga_pasar_jumlah"
               value="{{$dataPengadaanDetail->survei_harga_pasar_jumlah}}"
               id="survey_harga_pasar_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->survei_harga_pasar_tgl}}"
            name="survey_harga_pasar_tgl"
            id="survey_harga_pasar_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->survei_harga_pasar_hari}}"
               name="survey_harga_pasar_hari"
               id="survey_harga_pasar_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    @if($dataPengadaanDetail->survei_harga_pasar_tgl != null)
        <div class="col-lg-2">
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a href="{!!url('user/jobcard/spk/download-shp1/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Survey Harga Pasar
                    </a>
                    <a href="{!!url('user/jobcard/spk/download-shp2/' . $dataPengadaan->id )!!}"
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
        <a href="{!!url('user/jobcard/spk/download-hps/' . $dataPengadaan->id )!!}"
           class="btn btn-brand btn-sm">
            Download
        </a>
    </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Undangan Pengadaan Langsung:
    </label>
    <div class="col-lg-4">
        <input value="{{$dataPengadaanDetail->undangan_pengadaan_langsung_nomor}}" type="text"
               id="nppv3" name="nppv3" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input undangan_pengadaan_langsung_jumlah"
               value="{{$dataPengadaanDetail->undangan_pengadaan_langsung_jumlah}}"
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
        <input value="{{$dataPengadaanDetail->undangan_pengadaan_langsung_hari}}"
               name="undangan_pengadaan_langsung_hari"
               id="undangan_pengadaan_langsung_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    @if($dataPengadaanDetail->undangan_pengadaan_langsung_tgl != null)
        <div class="col-lg-2">
            <a href="{!!url('user/jobcard/spk/download-uplh/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        </div>
    @endif
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Pemasukan Dok. Penawaran Dari
    </label>
    <div class="col-lg-4">
        {{--                                <input type="text" id="nppv4" readonly name="nppv4" class="form-control m-input">--}}
        {{--                                <span class="m-form__help"></span>--}}
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input"
               name="pemasukan_dok_penawaran_jumlah_dari"
               value="{{$dataPengadaanDetail->pemasukan_dok_penawaran_jumlah_dari}}"
               id="pemasukan_dok_penawaran_jumlah_dari" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->pemasukan_dok_penawaran_tgl_dari}}"
            name="pemasukan_dok_penawaran_tgl_dari"
            id="pemasukan_dok_penawaran_tgl_dari"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-3">
        <input value="{{$dataPengadaanDetail->pemasukan_dok_penawaran_hari_dari}}"
               name="pemasukan_dok_penawaran_hari_dari"
               id="pemasukan_dok_penawaran_hari_dari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Pemasukan Dok. Penawaran Sampai Dengan
    </label>
    <div class="col-lg-4">
        {{--                                <input type="text" id="nppv4" readonly name="nppv4" class="form-control m-input">--}}
        {{--                                <span class="m-form__help"></span>--}}
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input"
               name="pemasukan_dok_penawaran_jumlah_sd"
               value="{{$dataPengadaanDetail->pemasukan_dok_penawaran_jumlah_sd}}"
               id="pemasukan_dok_penawaran_jumlah_sd" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->pemasukan_dok_penawaran_tgl_sd}}"
            name="pemasukan_dok_penawaran_tgl_sd"
            id="pemasukan_dok_penawaran_tgl_sd"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-3">
        <input value="{{$dataPengadaanDetail->pemasukan_dok_penawaran_hari_sd}}"
               name="pemasukan_dok_penawaran_hari_sd"
               id="pemasukan_dok_penawaran_hari_sd"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Evaluasi Dokumen Dari:
    </label>
    <div class="col-lg-4">
        {{--                                <input type="text" id="nppv4" readonly name="nppv4" class="form-control m-input">--}}
        {{--                                <span class="m-form__help"></span>--}}
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input"
               name="evaluasi_dokumen_jumlah_dari"
               value="{{$dataPengadaanDetail->evaluasi_dokumen_jumlah_dari}}"
               id="evaluasi_dokumen_jumlah_dari" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->evaluasi_dokumen_tgl_dari}}"
            name="evaluasi_dokumen_tgl_dari"
            id="evaluasi_dokumen_tgl_dari"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-3">
        <input value="{{$dataPengadaanDetail->evaluasi_dokumen_hari_dari}}"
               name="evaluasi_dokumen_hari_dari"
               id="evaluasi_dokumen_hari_dari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        Evaluasi Dokumen Sampai Dengan:
    </label>
    <div class="col-lg-4">
        <input value="{{$dataPengadaanDetail->evaluasi_dokumen_nomor}}" type="text" id="nppv4"
               name="nppv4" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input"
               name="evaluasi_dokumen_jumlah_sd"
               value="{{$dataPengadaanDetail->evaluasi_dokumen_jumlah_sd}}"
               id="evaluasi_dokumen_jumlah_sd" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->evaluasi_dokumen_tgl_sd}}"
            name="evaluasi_dokumen_tgl_sd"
            id="evaluasi_dokumen_tgl_sd"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->evaluasi_dokumen_hari_sd}}"
               name="evaluasi_dokumen_hari_sd"
               id="evaluasi_dokumen_hari_sd"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    @if($dataPengadaanDetail->evaluasi_dokumen_tgl_sd != null)
        <div class="col-lg-2">
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a href="{!!url('user/jobcard/spk/evaluasiDokumen1/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Pemasukan Dok Penawaran
                    </a>
                    <a href="{!!url('user/jobcard/spk/evaluasiDokumen2/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Evaluasi Dok Penawaran
                    </a>
                    <a href="{!!url('user/jobcard/spk/evaluasiDokumen3/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir
                    </a>

                </div>
            </div>
        </div>
    @endif
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        BA Hasil Klarifikasi:
    </label>
    <div class="col-lg-4">
        <input value="{{$dataPengadaanDetail->ba_hasil_klarifikasi_nomor}}" type="text" id="nppv6"
               name="nppv6" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input"
               name="ba_hasil_klarifikasi_jumlah"
               value="{{$dataPengadaanDetail->ba_hasil_klarifikasi_jumlah}}"
               id="ba_hasil_klarifikasi_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->ba_hasil_klarifikasi_tgl}}"
            name="ba_hasil_klarifikasi_tgl"
            id="ba_hasil_klarifikasi_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->ba_hasil_klarifikasi_hari}}"
               name="ba_hasil_klarifikasi_hari"
               id="ba_hasil_klarifikasi_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    @if($dataPengadaanDetail->ba_hasil_klarifikasi_tgl != null)
        <div class="col-lg-2">
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a href="{!!url('user/jobcard/spk/download-hasilKlarifikasi1/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Evaluasi dan Pembuktian Kualifikasi
                    </a>
                    <a href="{!!url('user/jobcard/spk/download-hasilKlarifikasi2/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir Pembuktian Kualifikasi
                    </a>
                    <a href="{!!url('user/jobcard/spk/download-hasilKlarifikasi3/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Evaluasi Nego
                    </a>
                    <a href="{!!url('user/jobcard/spk/download-hasilKlarifikasi4/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir Evaluasi Nego
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        BA Hasil Pengadaan Langsung:
    </label>
    <div class="col-lg-4">
        <input value="{{$dataPengadaanDetail->ba_hasil_pengadaan_nomor}}" type="text" id="nppv7"
               readonly name="nppv7" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input"
               name="ba_hasil_pengadaan_langsung_jumlah"
               value="{{$dataPengadaanDetail->ba_hasil_pengadaan_jumlah}}"
               id="ba_hasil_pengadaan_langsung_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->ba_hasil_pengadaan_tgl}}"
            name="ba_hasil_pengadaan_langsung_tgl"
            id="ba_hasil_pengadaan_langsung_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->ba_hasil_pengadaan_hari}}"
               name="ba_hasil_pengadaan_langsung_hari"
               id="ba_hasil_pengadaan_langsung_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    @if($dataPengadaanDetail->ba_hasil_pengadaan_tgl != null)
        <div class="col-lg-2">
            <div class="dropdown">
                <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a href="{!!url('user/jobcard/spk/download-hasilPengadaan1/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Hasil Pengadaan Langsung
                    </a>
                    <a href="{!!url('user/jobcard/spk/download-hasilPengadaan2/' . $dataPengadaan->id )!!}"
                       class="dropdown-item">
                        Daftar Hadir Hasil Pengadaan Langsung
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        ND Usulan Tetap Pemenang:
    </label>
    <div class="col-lg-4">
        <input value="{{$dataPengadaanDetail->nd_usulan_tetap_pemenang_nomor}}" type="text" id="nppv8"
               name="nppv8" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input"
               name="nd_usulan_tetap_pemenang_jumlah"
               value="{{$dataPengadaanDetail->nd_usulan_tetap_pemenang_jumlah}}"
               id="nd_usulan_tetap_pemenang_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->nd_usulan_tetap_pemenang_tgl}}"
            name="nd_usulan_tetap_pemenang_tgl"
            id="nd_usulan_tetap_pemenang_tgl"
            type="text" class="form-control nd_usulan_tetap_pemenang_tgl" readonly
            placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input value="{{$dataPengadaanDetail->nd_usulan_tetap_pemenang_hari}}"
               name="nd_usulan_tetap_pemenang_hari"
               id="nd_usulan_tetap_pemenang_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    @if($dataPengadaanDetail->survei_harga_pasar_tgl != null)
        <div class="col-lg-2">
            <a href="{!!url('user/jobcard/spk/download-ndPenetapan/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        </div>
    @endif
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        ND Penetapan Pemenang:
    </label>
    <div class="col-lg-4">
        <input value="{{$dataPengadaanDetail->nd_penetapan_pemenang_nomor}}" type="text" id="nppv9"
               name="nppv9" class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input"
               name="nd_penetapan_pemenang_jumlah"
               value="{{$dataPengadaanDetail->nd_penetapan_pemenang_jumlah}}"
               id="nd_penetapan_pemenang_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->nd_penetapan_pemenang_tgl}}"
            name="nd_penetapan_pemenang_tgl"
            id="nd_penetapan_pemenang_tgl"
            type="text" class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-3">
        <input value="{{$dataPengadaanDetail->nd_penetapan_pemenang_hari}}"
               name="nd_penetapan_pemenang_hari"
               id="nd_penetapan_pemenang_hari"
               readonly
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
</div>
<div class="form-group m-form__group row">
    <label class="col-lg-2 col-form-label">
        SPK:
    </label>
    <div class="col-lg-4">
        <input type="text" value="{{$dataPengadaanDetail->spk_nomor}}" id="nppv10" name="nppv10"
               class="form-control m-input">
        <span class="m-form__help"></span>
    </div>
    <div class="col-lg-1">
        <input type="text" class="form-control m-input"
               name="spk_jumlah"
               value="{{$dataPengadaanDetail->spk_jumlah}}"
               id="spk_jumlah" placeholder="Jumlah">
        <span class="m-form__help "></span>
    </div>
    <div class="col-lg-2">
        <input
            value="{{$dataPengadaanDetail->spk_tgl}}"
            name="spk_tgl"
            id="spk_tgl"
            type='text' class="form-control" readonly placeholder="Tanggal"/>
    </div>
    <div class="col-lg-1">
        <input name="spk_hari"
               id="spk_hari"
               readonly
               value="{{$dataPengadaanDetail->spk_hari}}"
               type="text" class="form-control m-input" placeholder="Hari">
        <span class="m-form__help"></span>
    </div>
    @if($dataPengadaanDetail->spk_tgl != null)
        <div class="col-lg-2">
            <a href="{!!url('user/jobcard/spk/download-spk/' . $dataPengadaan->id )!!}"
               class="btn btn-brand btn-sm">
                Download
            </a>
        </div>
    @endif
</div>
@include('pages.user.job-card.spk.js.jsUpdate')
