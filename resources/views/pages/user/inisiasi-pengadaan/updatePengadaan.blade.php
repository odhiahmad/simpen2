@section('title','Data Kontrak | Tambah')
@extends('../../../main')
@section('content')
    <div>
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Update Pengadaan
                    </h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href='{!! url('user/beranda'); !!}' class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href='{!! url('user/inisiasi-pengadaan/index'); !!}' class="m-nav__link">
                                <span class="m-nav__link-text">
                                    Inisiasi Pengadaan
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">
                                    Update Pengadaan
                                </span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="m-content">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Inisiasi & Perencanaan Pengadaan
                            </h3>
                        </div>
                    </div>
                </div>
                <span id="form_result"></span>

                <form method="post" id="sample_form" enctype="multipart/form-data"
                      class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>
                                    Judul:
                                </label>
                                <input type="hidden" value="{{$dataPengadaan->id}}" class="form-control m-input" id="id"
                                       name="id"
                                       placeholder="Masukan Judul">
                                <input type="text" value="{{$dataPengadaan->judul}}" class="form-control m-input"
                                       id="judul" name="judul"
                                       placeholder="Masukan Judul">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    Tahun:
                                </label>
                                <input type="text" class="form-control m-input" value="{{$dataPengadaan->tahun}}"
                                       id="tahun" name="tahun"
                                       placeholder="Masukan Tahun">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    Tanggal di Terima Panitia:
                                </label>
                                <input
                                    value="{{$dataPengadaan->tgl_diterima_panitia}}"
                                    name="tanggal_diterima_panitia"
                                    id="tanggal_diterima_panitia"
                                    type="text" class="form-control  m-input tanggal_diterima_panitia" readonly
                                    placeholder="Tanggal Di Terima Panitia"/>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Bagian
                                </label>

                                <select class="form-control bagian" id="bagian" name="bagian">
                                    @foreach ($dataBagian as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->bagian == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Fungsi Pembakit
                                </label>
                                <select class="form-control fungsi_pembangkit" id="fungsi_pembangkit"
                                        name="fungsi_pembangkit">
                                    @foreach ($dataFungsiPembangkit as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->fungsi_pembangkit == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    No Undang PL:
                                </label>
                                <input value="{{$dataPengadaan->no_undang_pl}}" type="text"
                                       class="form-control m-input no_undang_pl" id="no_undang_pl" name="no_undang_pl"
                                       placeholder="Masukan No Undang PL">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    Lingkup Pekerjaan:
                                </label>
                                <input value="{{$dataPengadaan->lingkup_pekerjaan}}" type="text"
                                       class="form-control m-input" id="lingkup_pekerjaan"
                                       name="lingkup_pekerjaan" placeholder="Masukan Lingkup Pekerjaan">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    Metode Pengadaan
                                </label>
                                <select class="form-control metode_pengadaan" id="metode_pengadaan"
                                        name="metode_pengadaan">
                                    @foreach ($dataMetodePengadaan as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->metode_pengadaan == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Jenis Kontrak:
                                </label>
                                <input type="text" value="{{$dataPengadaan->jenis_kontrak}}"
                                       class="form-control m-input" id="jenis_kontrak" name="jenis_kontrak"
                                       placeholder="Masukan Jenis Kontrak">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Rencana:
                                </label>
                                <input type="text" class="form-control m-input" value="{{$dataPengadaan->rencana}}"
                                       id="rencana" name="rencana"
                                       placeholder="Masukan Rencana ">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Tempat Penyerahan
                                </label>
                                <select class="form-control tempat_penyerahan" id="tempat_penyerahan"
                                        name="tempat_penyerahan">
                                    @foreach ($dataTempatPenyerahan as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->tempat_penyerahan == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach

                                </select>
                                <span class="m-form__help">`</span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Masa Berlaku Surat
                                </label>
                                <select class="form-control masa_berlaku_surat" id="masa_berlaku_surat"
                                        name="masa_berlaku_surat">
                                    @foreach ($dataMasaBerlaku as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->masa_berlaku_surat == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help">`</span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Cara Pembayaran
                                </label>
                                <select class="form-control cara_pembayaran" id="cara_pembayaran"
                                        name="cara_pembayaran">
                                    @foreach ($dataCaraPembayaran as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->cara_pembayaran == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help">`</span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Jenis Perjanjian
                                </label>
                                <select class="form-control cara_pembayaran" id="jenis_perjanjian"
                                        name="jenis_perjanjian">
                                    @foreach ($dataPerjanjianKontrak as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->jenis_perjanjian == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Sumber Dana
                                </label>
                                <select class="form-control sumber_dana" id="sumber_dana" name="sumber_dana">
                                    @foreach ($dataSumberDana as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->sumber_dana == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help">`</span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Masa Garansi
                                </label>
                                <select class="form-control masa_garansi" id="masa_garansi" name="masa_garansi">
                                    @foreach ($dataMasaGaransi as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->masa_garansi == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Syarat Bidang
                                </label>
                                <select class="form-control syarat_bidang" id="syarat_bidang" name="syarat_bidang">
                                    @foreach ($dataSyaratBidangUsaha as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->syarat_bidang == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help"></span>
                            </div>


                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>
                                    VFMC 1
                                </label>
                                <select class="form-control vfmc" id="vfmc" name="vfmc">
                                    @foreach ($dataVfmc as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->vfmc == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help">`</span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    VFMC 1
                                </label>
                                <select class="form-control vfmc2" id="vfmc2" name="vfmc2">
                                    @foreach ($dataVfmc as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->vfmc2 == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Pengguna:
                                </label>
                                <input type="text" class="form-control m-input" value="{{$dataPengadaan->pengguna}}"
                                       id="pengguna" name="pengguna"
                                       placeholder="Masukan Pengguna">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Nip:
                                </label>
                                <input type="text" class="form-control m-input" value="{{$dataPengadaan->nip}}" id="nip"
                                       name="nip"
                                       placeholder="Masukan Nip">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Pejabat Pelaksana:
                                </label>
                                <input type="text" class="form-control m-input"
                                       value="{{$dataPengadaan->pejabat_pelaksana}}" id="pejabat_pelaksana"
                                       name="pejabat_pelaksana"
                                       placeholder="Masukan Pejabat Pelaksana">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Direksi:
                                </label>
                                <input type="text" class="form-control m-input" value="{{$dataPengadaan->direksi}}"
                                       id="direksi" name="direksi"
                                       placeholder="Masukan Direksi">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Pengawas
                                </label>
                                <select class="form-control pengawas" id="pengawas" name="pengawas">
                                    @foreach ($dataPengawas as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->pengawas == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Ketua Tim:
                                </label>
                                <input type="text" class="form-control m-input" value="{{$dataPengadaan->ketua_tim}}"
                                       id="direksi" id="ketua_tim" name="ketua_tim"
                                       placeholder="Masukan Ketua Tim">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    PIC Pelaksana
                                </label>
                                <select class="form-control" id="pic_pelaksana" name="pic_pelaksana">
                                    @foreach ($dataPicPelaksana as $key)
                                        <option
                                            value="{{$key->nama}}" {{($dataPengadaan->pic_pelaksana == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Proses Dokumen:
                                </label>
                                <input type="text" class="form-control m-input"
                                       value="{{$dataPengadaan->proses_dokumen}}" id="proses_dokumen"
                                       name="proses_dokumen"
                                       placeholder="Masukan Proses Dokumen">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Nomor:
                                </label>
                                <input type="text" class="form-control m-input" value="{{$dataPengadaan->nomor}}"
                                       id="nomor" name="nomor"
                                       placeholder="Masukan Nomor">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Jumlah Hari:
                                </label>
                                <input type="text" class="form-control m-input" value="{{$dataPengadaan->jumlah_hari}}"
                                       id="jumlah_hari" name="jumlah_hari"
                                       placeholder="Masukan Jumlah Hari">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Tanggal:
                                </label>
                                <input
                                    value="{{$dataPengadaan->tanggal}}"
                                    name="tanggal"
                                    id="tanggal"
                                    type="text" class="form-control  m-input" readonly
                                    placeholder="Tanggal"/>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Hari:
                                </label>
                                <input value="{{$dataPengadaan->hari}}" type="text" class="form-control m-input"
                                       readonly id="hari" name="hari"
                                       placeholder="">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Waktu:
                                </label>
                                <input value="{{$dataPengadaan->waktu}}" type="text" class="form-control m-input"
                                       id="waktu" name="waktu"
                                       placeholder="Masukan Waktu">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    HPS:
                                </label>
                                <input value="{{$dataPengadaan->hps}}" type="text" class="form-control m-input" id="hps"
                                       name="hps"
                                       placeholder="Masukan HPS">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    No Proses Pengadaan:
                                </label>
                                <input type="text" value="{{$dataPengadaan->no_proses_pengadaan}}"
                                       class="form-control m-input no_proses_pengadaan"
                                       id="no_proses_pengadaan"
                                       name="no_proses_pengadaan"
                                       placeholder="Masukan No Proses Pengadaan">
                                <span class="m-form__help"></span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Survei Harga Pasar:
                            </label>
                            <div class="col-lg-4">
                                <input type="text" value="{{$dataPengadaan->survei_harga_pasar_nomor}}" id="nppv1"
                                       readonly name="nppv1" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-1">
                                <input type="text" class="form-control m-input survey_harga_pasar_jumlah"
                                       name="survey_harga_pasar_jumlah"
                                       value="{{$dataPengadaan->survei_harga_pasar_jumlah}}"
                                       id="survey_harga_pasar_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    value="{{$dataPengadaan->survei_harga_pasar_tgl}}"
                                    name="survey_harga_pasar_tgl"
                                    id="survey_harga_pasar_tgl"
                                    type="text" class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->survei_harga_pasar_hari}}"
                                       name="survey_harga_pasar_hari"
                                       id="survey_harga_pasar_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->survei_harga_pasar_tgl != null)
                                <div class="col-lg-2">
                                    <div class="dropdown">
                                        <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Download
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <a href="{!!url('user/inisiasi-pengadaan/download-shp1/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Survey Harga Pasar
                                            </a>
                                            <a href="{!!url('user/inisiasi-pengadaan/download-shp2/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Form Daftar Hadir
                                            </a>

                                        </div>
                                    </div>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                HPS:
                            </label>
                            <div class="col-lg-4">
                                <input type="text" value="{{$dataPengadaan->hps_nomor}}" id="nppv2" readonly
                                       name="nppv2" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-1">
                                <input type="text" value="{{$dataPengadaan->hps_jumlah}}"
                                       class="form-control m-input hps_jumlah"
                                       name="hps_jumlah"
                                       id="hps_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    value="{{$dataPengadaan->hps_tgl}}"
                                    name="hps_tgl"
                                    id="hps_tgl"
                                    type="text" class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->hps_hari}}" name="hps_hari"
                                       id="hps_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                <a href="{!!url('user/inisiasi-pengadaan/download-hps/' . $dataPengadaan->id )!!}"
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
                                <input value="{{$dataPengadaan->undangan_pengadaan_langsung_nomor}}" type="text"
                                       id="nppv3" readonly name="nppv3" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-1">
                                <input type="text" class="form-control m-input undangan_pengadaan_langsung_jumlah"
                                       value="{{$dataPengadaan->undangan_pengadaan_langsung_jumlah}}"
                                       name="undangan_pengadaan_langsung_jumlah"
                                       id="undangan_pengadaan_langsung_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    value="{{$dataPengadaan->undangan_pengadaan_langsung_tgl}}"
                                    name="undangan_pengadaan_langsung_tgl"
                                    id="undangan_pengadaan_langsung_tgl"
                                    type="text" class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->undangan_pengadaan_langsung_hari}}"
                                       name="undangan_pengadaan_langsung_hari"
                                       id="undangan_pengadaan_langsung_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->survei_harga_pasar_tgl != null)
                                <div class="col-lg-2">
                                    <a href="{!!url('user/inisiasi-pengadaan/download-uplh/' . $dataPengadaan->id )!!}"
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
                                       value="{{$dataPengadaan->pemasukan_dok_penawaran_jumlah_dari}}"
                                       id="pemasukan_dok_penawaran_jumlah_dari" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    value="{{$dataPengadaan->pemasukan_dok_penawaran_tgl_dari}}"
                                    name="pemasukan_dok_penawaran_tgl_dari"
                                    id="pemasukan_dok_penawaran_tgl_dari"
                                    type="text" class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-3">
                                <input value="{{$dataPengadaan->pemasukan_dok_penawaran_hari_dari}}"
                                       name="pemasukan_dok_penawaran_hari_dari"
                                       id="pemasukan_dok_penawaran_hari_dari"
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
                                       value="{{$dataPengadaan->pemasukan_dok_penawaran_jumlah_sd}}"
                                       id="pemasukan_dok_penawaran_jumlah_sd" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    value="{{$dataPengadaan->pemasukan_dok_penawaran_tgl_sd}}"
                                    name="pemasukan_dok_penawaran_tgl_sd"
                                    id="pemasukan_dok_penawaran_tgl_sd"
                                    type="text" class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-3">
                                <input value="{{$dataPengadaan->pemasukan_dok_penawaran_hari_sd}}"
                                       name="pemasukan_dok_penawaran_hari_sd"
                                       id="pemasukan_dok_penawaran_hari_sd"
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
                                       value="{{$dataPengadaan->evaluasi_dokumen_jumlah_dari}}"
                                       id="evaluasi_dokumen_jumlah_dari" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    value="{{$dataPengadaan->evaluasi_dokumen_tgl_dari}}"
                                    name="evaluasi_dokumen_tgl_dari"
                                    id="evaluasi_dokumen_tgl_dari"
                                    type="text" class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-3">
                                <input value="{{$dataPengadaan->evaluasi_dokumen_hari_dari}}"
                                       name="evaluasi_dokumen_hari_dari"
                                       id="evaluasi_dokumen_hari_dari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Evaluasi Dokumen Sampai Dengan:
                            </label>
                            <div class="col-lg-4">
                                <input value="{{$dataPengadaan->evaluasi_dokumen_nomor}}" type="text" id="nppv4"
                                       readonly name="nppv4" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-1">
                                <input type="text" class="form-control m-input"
                                       name="evaluasi_dokumen_jumlah_sd"
                                       value="{{$dataPengadaan->evaluasi_dokumen_jumlah_sd}}"
                                       id="evaluasi_dokumen_jumlah_sd" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    value="{{$dataPengadaan->evaluasi_dokumen_tgl_sd}}"
                                    name="evaluasi_dokumen_tgl_sd"
                                    id="evaluasi_dokumen_tgl_sd"
                                    type="text" class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->evaluasi_dokumen_hari_sd}}"
                                       name="evaluasi_dokumen_hari_sd"
                                       id="evaluasi_dokumen_hari_sd"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->evaluasi_dokumen_tgl_sd != null)
                                <div class="col-lg-2">
                                    <div class="dropdown">
                                        <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Download
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <a href="{!!url('user/inisiasi-pengadaan/evaluasiDokumen1/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Pemasukan Dok Penawaran
                                            </a>
                                            <a href="{!!url('user/inisiasi-pengadaan/evaluasiDokumen2/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Evaluasi Dok Penawaran
                                            </a>
                                            <a href="{!!url('user/inisiasi-pengadaan/evaluasiDokumen3/' . $dataPengadaan->id )!!}"
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
                                <input value="{{$dataPengadaan->ba_hasil_klarifikasi_nomor}}" type="text" id="nppv6"
                                       readonly name="nppv6" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-1">
                                <input type="text" class="form-control m-input"
                                       name="ba_hasil_klarifikasi_jumlah"
                                       value="{{$dataPengadaan->ba_hasil_klarifikasi_jumlah}}"
                                       id="ba_hasil_klarifikasi_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    value="{{$dataPengadaan->ba_hasil_klarifikasi_tgl}}"
                                    name="ba_hasil_klarifikasi_tgl"
                                    id="ba_hasil_klarifikasi_tgl"
                                    type="text" class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->ba_hasil_klarifikasi_hari}}"
                                       name="ba_hasil_klarifikasi_hari"
                                       id="ba_hasil_klarifikasi_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->ba_hasil_klarifikasi_tgl != null)
                                <div class="col-lg-2">
                                    <div class="dropdown">
                                        <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Download
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <a href="{!!url('user/inisiasi-pengadaan/download-hasilKlarifikasi1/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                               Evaluasi dan Pembuktian Kualifikasi
                                            </a>
                                            <a href="{!!url('user/inisiasi-pengadaan/download-hasilKlarifikasi2/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Daftar Hadir Pembuktian Kualifikasi
                                            </a>
                                            <a href="{!!url('user/inisiasi-pengadaan/download-hasilKlarifikasi3/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Evaluasi Nego
                                            </a>
                                            <a href="{!!url('user/inisiasi-pengadaan/download-hasilKlarifikasi4/' . $dataPengadaan->id )!!}"
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
                                <input value="{{$dataPengadaan->ba_hasil_pengadaan_nomor}}" type="text" id="nppv7"
                                       readonly name="nppv7" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-1">
                                <input type="text" class="form-control m-input"
                                       name="ba_hasil_pengadaan_langsung_jumlah"
                                       value="{{$dataPengadaan->ba_hasil_pengadaan_jumlah}}"
                                       id="ba_hasil_pengadaan_langsung_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    value="{{$dataPengadaan->ba_hasil_pengadaan_tgl}}"
                                    name="ba_hasil_pengadaan_langsung_tgl"
                                    id="ba_hasil_pengadaan_langsung_tgl"
                                    type="text" class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->ba_hasil_pengadaan_hari}}"
                                       name="ba_hasil_pengadaan_langsung_hari"
                                       id="ba_hasil_pengadaan_langsung_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->ba_hasil_pengadaan_tgl != null)
                                <div class="col-lg-2">
                                    <div class="dropdown">
                                        <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Download
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <a href="{!!url('user/inisiasi-pengadaan/download-hasilPengadaan1/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Hasil Pengadaan Langsung
                                            </a>
                                            <a href="{!!url('user/inisiasi-pengadaan/download-hasilPengadaan2/' . $dataPengadaan->id )!!}"
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
                                <input value="{{$dataPengadaan->nd_usulan_tetap_pemenang_nomor}}" type="text" id="nppv8"
                                       readonly name="nppv8" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-1">
                                <input type="text" class="form-control m-input"
                                       name="nd_usulan_tetap_pemenang_jumlah"
                                       value="{{$dataPengadaan->nd_usulan_tetap_pemenang_jumlah}}"
                                       id="nd_usulan_tetap_pemenang_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    value="{{$dataPengadaan->nd_usulan_tetap_pemenang_tgl}}"
                                    name="nd_usulan_tetap_pemenang_tgl"
                                    id="nd_usulan_tetap_pemenang_tgl"
                                    type="text" class="form-control nd_usulan_tetap_pemenang_tgl" readonly
                                    placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->nd_usulan_tetap_pemenang_hari}}"
                                       name="nd_usulan_tetap_pemenang_hari"
                                       id="nd_usulan_tetap_pemenang_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->survei_harga_pasar_tgl != null)
                                <div class="col-lg-2">
                                    <a href="{!!url('user/inisiasi-pengadaan/download-ndPenetapan/' . $dataPengadaan->id )!!}"
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
                                <input value="{{$dataPengadaan->nd_penetapan_pemenang_nomor}}" type="text" id="nppv9"
                                       readonly name="nppv9" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-1">
                                <input type="text" class="form-control m-input"
                                       name="nd_penetapan_pemenang_jumlah"
                                       value="{{$dataPengadaan->nd_penetapan_pemenang_jumlah}}"
                                       id="nd_penetapan_pemenang_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    value="{{$dataPengadaan->nd_penetapan_pemenang_tgl}}"
                                    name="nd_penetapan_pemenang_tgl"
                                    id="nd_penetapan_pemenang_tgl"
                                    type="text" class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-3">
                                <input value="{{$dataPengadaan->nd_penetapan_pemenang_hari}}"
                                       name="nd_penetapan_pemenang_hari"
                                       id="nd_penetapan_pemenang_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                        </div>

                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <label>
                                Ubah Dokumen Kontrak:
                            </label>
                            <input value="{{$dataPengadaan->kontrak}}" type="hidden" class="form-control m-input"
                                   id="kontrak" name="kontrak"
                                   placeholder="Masukan VFMC">
                            <input type="file" class="form-control m-input"
                                   id="kontrak_file" name="kontrak_file"
                                   placeholder="Upload Dokumen Kontrak">
                            <span class="m-form__help"></span>
                        </div>
                        <div class="col-lg-6">
                            <label>
                                Ubah Dokumen Proses:
                            </label>
                            <input value="{{$dataPengadaan->proses}}" type="hidden" class="form-control m-input"
                                   id="proses" name="proses"
                                   placeholder="Masukan VFMC">
                            <input type="file" class="form-control m-input"
                                   id="proses_file" name="proses_file"
                                   placeholder="Upload Dokumen Proses">
                            <span class="m-form__help"></span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-12">
                            <label>
                                Status
                            </label>
                            <select class="form-control status" id="status" name="status">
                                @foreach ($dataStatus as $key)
                                    <option
                                        value="{{$key->nama}}" {{($dataPengadaan->status == $key->nama) ?"selected":''}}>
                                        {{$key->nama}}
                                    </option>
                                @endforeach
                            </select>
                            <span class="m-form__help">`</span>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" name="action" id="action" value="Add"/>
                                    <input type="submit" value="Submit" name="action_button"
                                           id="action_button"
                                           class="btn btn-success">
                                    <button type="reset" class="btn btn-secondary">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {


            $("#bagian").select2({
                placeholder: "Pilih Bagian",
            });
            $("#fungsi_pembangkit").select2({
                placeholder: "Pilih Fungsi Pembangkit",
            });
            $("#tempat_penyerahan").select2({
                placeholder: "Pilih Tempat Penyerahan",
            });
            $("#metode_pengadaan").select2({
                placeholder: "Pilih Metode Pengadaan",
            });
            $("#tempat_penyerahan").select2({
                placeholder: "Pilih Tempat Penyerahan",
            });
            $("#masa_berlaku_surat").select2({
                placeholder: "Pilih Masa Berlaku Surat",
            });
            $("#cara_pembayaran").select2({
                placeholder: "Pilih Cara Pembayaran",
            });
            $("#jenis_perjanjian").select2({
                placeholder: "Pilih Jenis Perjanjian",
            });
            $("#sumber_dana").select2({
                placeholder: "Pilih Sumber Dana",
            });
            $("#masa_garansi").select2({
                placeholder: "Pilih Masa Garansi",
            });
            $("#syarat_bidang").select2({
                placeholder: "Pilih Syarat Bidang",
            });
            $("#vfmc").select2({
                placeholder: "Pilih VFMC",
            });
            $("#vfmc2").select2({
                placeholder: "Pilih VFMC",
            });
            $("#pengawas").select2({
                placeholder: "Pilih Pengawas",
            });
            $("#pic_pelaksana").select2({
                placeholder: "Pilih PIC Pelaksana",
            });
            $("#status").select2({
                placeholder: "Pilih PIC Pelaksana",
            });


            var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",];


            $("#tanggal_diterima_panitia,#tanggal,#nd_penetapan_pemenang_tgl,#nd_usulan_tetap_pemenang_tgl,#ba_hasil_pengadaan_langsung_tgl,#survey_harga_pasar_tgl, #hps_tgl, #undangan_pengadaan_langsung_tgl,#pemasukan_dok_penawaran_tgl_sd,#pemasukan_dok_penawaran_tgl_dari,#evaluasi_dokumen_tgl_sd,#evaluasi_dokumen_tgl_dari,#ba_hasil_klarifikasi_tgl").datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: !0,
                orientation: "bottom left",
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                },
            });

            $("#tanggal_diterima_panitia").change(function () {
                var a = $("#tanggal_diterima_panitia").val()
                var getTanggal1 = new Date(a)

                $('#survey_harga_pasar_tgl').val(a)
                $('#hps_tgl').val(a)
                $('#undangan_pengadaan_langsung_tgl').val(a)
                $('#pemasukan_dok_penawaran_tgl_dari').val(a)
                $('#evaluasi_dokumen_tgl_dari').val(a)
                $('#pemasukan_dok_penawaran_tgl_sd').val(a)
                $('#evaluasi_dokumen_tgl_sd').val(a)
                $('#ba_hasil_klarifikasi_tgl').val(a)
                $('#ba_hasil_pengadaan_langsung_tgl').val(a)
                $('#nd_usulan_tetap_pemenang_tgl').val(a)
                $('#nd_penetapan_pemenang_tgl').val(a)

                $('#survey_harga_pasar_hari').val(hari[getTanggal1.getDay()])
                $('#hps_hari').val(hari[getTanggal1.getDay()])
                $('#undangan_pengadaan_langsung_hari').val(hari[getTanggal1.getDay()])
                $('#pemasukan_dok_penawaran_hari_dari').val(hari[getTanggal1.getDay()])
                $('#pemasukan_dok_penawaran_hari_sd').val(hari[getTanggal1.getDay()])
                $('#evaluasi_dokumen_hari_dari').val(hari[getTanggal1.getDay()])
                $('#evaluasi_dokumen_hari_sd').val(hari[getTanggal1.getDay()])
                $('#ba_hasil_klarifikasi_hari').val(hari[getTanggal1.getDay()])
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[getTanggal1.getDay()])
                $('#nd_usulan_tetap_pemenang_hari').val(hari[getTanggal1.getDay()])
                $('#nd_penetapan_pemenang_hari').val(hari[getTanggal1.getDay()])
            })

            $("#tanggal").change(function () {
                var a = $('#tanggal').val()
                var getTanggal = new Date(a)

                $('#hari').val(hari[getTanggal.getDay()])

            })


            var $nppv3 = $('#nppv3'), $value1 = $('.no_undang_pl');
            $value1.on('input', function (e) {
                var tes1 = 1;
                $value1.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        tes1 = tes1 * parseInt(this.value, 10);
                });
                $nppv3.val('0' + tes1 + '.UND-PL/DAN.02.01/210200/' + $('#tahun').val());
            });

            var $nppv9 = $('#nppv9')
            var $nppv8 = $('#nppv8')
            var $nppv7 = $('#nppv7')
            var $nppv6 = $('#nppv6')
            var $nppv5 = $('#nppv5')
            var $nppv4 = $('#nppv4')
            var $nppv2 = $('#nppv2')
            var $nppv1 = $('#nppv1'), $value = $('.no_proses_pengadaan');
            $value.on('input', function (e) {
                var total = 1;
                $value.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                $nppv1.val('0' + total + '.BASVY-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv2.val('0' + total + '.HPS-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv4.val('0' + total + '.BAEP-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv5.val('0' + total + '.BAEP-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv6.val('0' + total + '.BAHKTNH-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv7.val('0' + total + '.BAHPL-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv8.val('0' + total + '.NDUP-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv9.val('0' + total + '.NDPP-PL/DAN.02.01/210200/' + $('#tahun').val());
            });


            // $("#hargaSatuan").inputmask("Rp 999.999.999,99", {numericInput: !0})
            $("#total").inputmask("Rp 999.999.999", {numericInput: !0})

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            var $tgl1 = $('#tanggal_diterima_panitia'), $valueTgl1 = $('#survey_harga_pasar_jumlah');
            $valueTgl1.on('input', function (e) {
                var totaltgl1 = 1;
                $valueTgl1.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl1 = totaltgl1 * parseInt(this.value, 10);
                });

                var getTanggalTes = $tgl1.val()
                var getTanggal1 = new Date(getTanggalTes)
                var getFull1 = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + totaltgl1)
                $('#survey_harga_pasar_tgl').datepicker('setDate', getFull1);
                $('#survey_harga_pasar_hari').val(hari[getFull1.getDay()])

            });

            var $tgl2 = $('#tanggal_diterima_panitia'), $valueTgl2 = $('#hps_jumlah');
            $valueTgl2.on('input', function (e) {
                var totaltgl2 = 1;
                $valueTgl2.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl2 = totaltgl2 * parseInt(this.value, 10);
                });

                var getTanggalTes1 = $tgl2.val()
                var getTanggal2 = new Date(getTanggalTes1)
                var getFull2 = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + totaltgl2)
                $('#hps_tgl').datepicker('setDate', getFull2);
                $('#hps_hari').val(hari[getFull2.getDay()])

            });

            var $tgl3 = $('#tanggal_diterima_panitia'), $valueTgl3 = $('#undangan_pengadaan_langsung_jumlah');
            $valueTgl3.on('input', function (e) {
                var totaltgl3 = 1;
                $valueTgl3.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl3 = totaltgl3 * parseInt(this.value, 10);
                });

                var getTanggalTes3 = $tgl3.val()
                var getTanggal3 = new Date(getTanggalTes3)
                var getFull3 = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + totaltgl3)
                $('#undangan_pengadaan_langsung_tgl').datepicker('setDate', getFull3);
                $('#undangan_pengadaan_langsung_hari').val(hari[getFull3.getDay()])

            });

            var $tgl4 = $('#tanggal_diterima_panitia'), $valueTgl4 = $('#pemasukan_dok_penawaran_jumlah_dari');
            $valueTgl4.on('input', function (e) {
                var totaltgl4 = 1;
                $valueTgl4.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl4 = totaltgl4 * parseInt(this.value, 10);
                });

                var getTanggalTes4 = $tgl4.val()
                var getTanggal4 = new Date(getTanggalTes4)
                var getFull4 = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + totaltgl4)
                $('#pemasukan_dok_penawaran_tgl_dari').datepicker('setDate', getFull4);
                $('#pemasukan_dok_penawaran_hari_dari').val(hari[getFull4.getDay()])

            });
            var $tgl5 = $('#tanggal_diterima_panitia'), $valueTgl5 = $('#pemasukan_dok_penawaran_jumlah_sd');
            $valueTgl5.on('input', function (e) {
                var totaltgl5 = 1;
                $valueTgl5.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl5 = totaltgl5 * parseInt(this.value, 10);
                });

                var getTanggalTes5 = $tgl5.val()
                var getTanggal5 = new Date(getTanggalTes5)
                var getFull5 = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + totaltgl5)
                $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', getFull5);
                $('#pemasukan_dok_penawaran_hari_sd').val(hari[getFull5.getDay()])

            });

            var $tgl6 = $('#tanggal_diterima_panitia'), $valueTgl6 = $('#evaluasi_dokumen_jumlah_dari');
            $valueTgl6.on('input', function (e) {
                var totaltgl6 = 1;
                $valueTgl6.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl6 = totaltgl6 * parseInt(this.value, 10);
                });

                var getTanggalTes6 = $tgl6.val()
                var getTanggal6 = new Date(getTanggalTes6)
                var getFull6 = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + totaltgl6)
                $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', getFull6);
                $('#evaluasi_dokumen_hari_dari').val(hari[getFull6.getDay()])

            });

            var $tgl7 = $('#tanggal_diterima_panitia'), $valueTgl7 = $('#evaluasi_dokumen_jumlah_sd');
            $valueTgl7.on('input', function (e) {
                var totaltgl7 = 1;
                $valueTgl7.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl7 = totaltgl7 * parseInt(this.value, 10);
                });

                var getTanggalTes7 = $tgl7.val()
                var getTanggal7 = new Date(getTanggalTes7)
                var getFull7 = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + totaltgl7)
                $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', getFull7);
                $('#evaluasi_dokumen_hari_sd').val(hari[getFull7.getDay()])

            });

            var $tgl8 = $('#tanggal_diterima_panitia'), $valueTgl8 = $('#ba_hasil_klarifikasi_jumlah');
            $valueTgl8.on('input', function (e) {
                var totaltgl8 = 1;
                $valueTgl8.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl8 = totaltgl8 * parseInt(this.value, 10);
                });

                var getTanggalTes8 = $tgl8.val()
                var getTanggal8 = new Date(getTanggalTes8)
                var getFull8 = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate() + totaltgl8)
                $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', getFull8);
                $('#ba_hasil_klarifikasi_hari').val(hari[getFull8.getDay()])

            });

            var $tgl9 = $('#tanggal_diterima_panitia'), $valueTgl9 = $('#ba_hasil_pengadaan_langsung_jumlah');
            $valueTgl9.on('input', function (e) {
                var totaltgl9 = 1;
                $valueTgl9.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl9 = totaltgl9 * parseInt(this.value, 10);
                });

                var getTanggalTes9 = $tgl9.val()
                var getTanggal9 = new Date(getTanggalTes9)
                var getFull9 = new Date(getTanggal9.getFullYear(), getTanggal9.getMonth(), getTanggal9.getDate() + totaltgl9)
                $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', getFull9);
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[getFull9.getDay()])

            });

            var $tgl10 = $('#tanggal_diterima_panitia'), $valueTgl10 = $('#nd_usulan_tetap_pemenang_jumlah');
            $valueTgl10.on('input', function (e) {
                var totaltgl10 = 1;
                $valueTgl10.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl10 = totaltgl10 * parseInt(this.value, 10);
                });

                var getTanggalTes10 = $tgl10.val()
                var getTanggal10 = new Date(getTanggalTes10)
                var getFull10 = new Date(getTanggal10.getFullYear(), getTanggal10.getMonth(), getTanggal10.getDate() + totaltgl10)
                $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', getFull10);
                $('#nd_usulan_tetap_pemenang_hari').val(hari[getFull10.getDay()])

            });

            var $tgl11 = $('#tanggal_diterima_panitia'), $valueTgl11 = $('#nd_penetapan_pemenang_jumlah');
            $valueTgl11.on('input', function (e) {
                var totaltgl11 = 1;
                $valueTgl11.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl11 = totaltgl11 * parseInt(this.value, 10);
                });

                var getTanggalTes11 = $tgl11.val()
                var getTanggal11 = new Date(getTanggalTes11)
                var getFull11 = new Date(getTanggal11.getFullYear(), getTanggal11.getMonth(), getTanggal11.getDate() + totaltgl11)
                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', getFull11);
                $('#nd_penetapan_pemenang_hari').val(hari[getFull11.getDay()])

            });

            $('#sample_form').on('submit', function (event) {
                event.preventDefault();
                // var a = $('#survey_harga_pasar_jumlah').val()
                // var b = $('#hps_jumlah').val()
                // var c = $('#undangan_pengadaan_langsung_jumlah').val()
                // var d = $('#pemasukan_dok_penawaran_jumlah').val()
                // var e = $('#evaluasi_dokumen_jumlah').val()
                // var f = $('#ba_hasil_klarifikasi_jumlah').val()
                // var g = $('#ba_hasil_pengadaan_langsung_jumlah').val()
                // var h = $('#nd_usulan_tetap_pemenang_jumlah').val()
                // var i = $('#nd_penetapan_pemenang_jumlah').val()
                //
                // var tgla = $('#survey_harga_pasar_tgl').val()
                // var tglb = $('#hps_tgl').val()
                // var tglc = $('#undangan_pengadaan_langsung_tgl').val()
                // var tgld = $('#pemasukan_dok_penawaran_tgl').val()
                // var tgle = $('#evaluasi_dokumen_tgl').val()
                // var tglf = $('#ba_hasil_klarifikasi_tgl').val()
                // var tglg = $('#ba_hasil_pengadaan_langsung_tgl').val()
                // var tglh = $('#nd_usulan_tetap_pemenang_tgl').val()
                // var tgli = $('#nd_penetapan_pemenang_tgl').val()
                //
                // var getTanggal1 = new Date(tgla)
                // var getTanggal2 = new Date(tglb)
                // var getTanggal3 = new Date(tglc)
                // var getTanggal4 = new Date(tgld)
                // var getTanggal5 = new Date(tgle)
                // var getTanggal6 = new Date(tglf)
                // var getTanggal7 = new Date(tglg)
                // var getTanggal8 = new Date(tglh)
                // var getTanggal9 = new Date(tgli)
                //
                // var getFull1 = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate())
                // var getFull2 = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate())
                // var getFull3 = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate())
                // var getFull4 = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate())
                // var getFull5 = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate())
                // var getFull6 = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate())
                // var getFull7 = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate())
                // var getFull8 = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate())
                // var getFull9 = new Date(getTanggal9.getFullYear(), getTanggal9.getMonth(), getTanggal9.getDate())
                //
                // if (a != 0)
                //     $('#survey_harga_pasar_tgl').datepicker('setDate', getFull1);
                // if (b != 0)
                //     $('#hps_tgl').datepicker('setDate', getFull2);
                // if (c != 0)
                //     $('#undangan_pengadaan_langsung_tgl').datepicker('setDate', getFull3);
                // if (d != 0)
                //     $('#pemasukan_dok_penawaran_tgl').datepicker('setDate', getFull4);
                // if (e != 0)
                //     $('#evaluasi_dokumen_tgl').datepicker('setDate', getFull5);
                // if (f != 0)
                //     $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', getFull6);
                // if (g != 0)
                //     $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', getFull7);
                // if (h != 0)
                //     $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', getFull8);
                // if (i != 0)
                //     $('#nd_penetapan_pemenang_tgl').datepicker('setDate', getFull9);
                //
                //

                // $('#hps_hari').val(getTanggal1)
                // $('#undangan_pengadaan_langsung_hari').val(hari[getTanggal3.getDay()])
                // $('#pemasukan_dok_penawaran_hari').val(hari[getTanggal4.getDay()])
                // $('#evaluasi_dokumen_hari').val(hari[getTanggal5.getDay()])
                // $('#ba_hasil_klarifikasi_hari').val(hari[getTanggal6.getDay()])
                // $('#ba_hasil_pengadaan_langsung_hari').val(hari[getTanggal7.getDay()])
                // $('#nd_usulan_tetap_pemenang_hari').val(hari[getTanggal8.getDay()])
                // $('#nd_penetapan_pemenang_hari').val(hari[getTanggal9.getDay()])

                $('#sample_form').on('submit', function (event) {
                    event.preventDefault();

                    if ($('#action').val() == 'Add') {
                        $.ajax({
                            url: '{{route('inisiasi-pengadaan.update')}}',
                            method: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: 'json',
                            success: function (data) {
                                if (data.errors) {

                                    for (var count = 0; count < data.errors.length; count++) {
                                        toastr.error(data.errors[count])
                                    }

                                }
                                if (data.success) {
                                    toastr.success(data.success)
                                }


                            }
                        });

                    }
                });
            });
        });
    </script>
@endsection

