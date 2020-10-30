@section('title','SPK|BARANG|Update')
@extends('../../../../../../main')
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
                            <a href='#' class="m-nav__link">
                                <span class="m-nav__link-text">
                                   Job Card
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href='#' class="m-nav__link">
                                <span class="m-nav__link-text">
                                    SPK
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href='#' class="m-nav__link">
                                <span class="m-nav__link-text">
                                    Edit Barang
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
                                    Perusahaan
                                </label>
                                <select class="form-control bagian" id="perusahaan" name="perusahaan">
                                    <option value="">
                                        Pilih Bagian
                                    </option>
                                    @foreach ($dataPerusahaan as $key)
                                        <option
                                            value="{{ $key->id }}" {{($dataPengadaan->id_perusahaan == $key->id) ?"selected":''}}>
                                            {{ $key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    No PRK:
                                </label>
                                <input type="text" class="form-control m-input" value="{{$dataPengadaan->no_prk}}"
                                       id="no_prk" name="no_prk"
                                       placeholder="Masukan Nomor PRK">
                                <span class="m-form__help"></span></div>
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
                                    Fungsi Pembangkit / Sarana
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
                                <select class="form-control metode_pengadaan dynamic" id="metode_pengadaan"
                                        name="metode_pengadaan">
                                    <option>
                                        Pilih Metode Pengadaan
                                    </option>
                                    @foreach ($dataMetodePengadaan as $key)
                                        <option
                                            value="{{ $key->id }}" {{($dataPengadaan->id_mp1 == $key->id) ?"selected":''}}>
                                            {{ $key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Metode Pengadaan Jenis 1
                                </label>
                                <select class="form-control metode_pengadaan_jenis1"
                                        id="metode_pengadaan_jenis1"
                                        name="metode_pengadaan_jenis1">
                                    <option value="{{($dataPengadaan->id_mp2)}}">
                                        {{$dataPengadaan->getmp2->nama}}
                                    </option>
                                </select>
                                <span class="m-form__help">`</span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Rencana Jangka Waktu Pekerjaan:
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
                                    Jenis Perjanjian / Kontrak
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
                            <div class="col-lg-6">
                                <label>
                                    POS Anggaran
                                </label>
                                <select class="form-control pos_anggaran" id="pos_anggaran" name="pos_anggaran">
                                    @foreach ($dataPosAnggaran as $key)
                                        <option
                                            value="{{ $key->nama }}" {{($dataPengadaan->pos_anggaran == $key->nama) ?"selected":''}}>
                                            {{ $key->nama}}
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
                                    VFMC 2
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
                                    Jabatan Pengawas
                                </label>
                                <select class="form-control pengawas" id="jabatan_pengawas" name="jabatan_pengawas">
                                    @foreach ($dataJabatanPengawas as $key)
                                        <option
                                            value="{{ $key->nama }}" {{($dataPengadaan->jabatan_pengawas == $key->nama) ?"selected":''}}>
                                            {{ $key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help">`</span>
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
                            <div class="col-lg-6">
                                <label>
                                    RAB:
                                </label>
                                <input type="text" value="{{$dataPengadaan->rab}}" class="form-control m-input" id="rab"
                                       name="rab"
                                       placeholder="Masukan RAB">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Nilai Kontrak:
                                </label>
                                <input type="text" value="{{$dataPengadaan->nilai_kontrak}}"
                                       class="form-control m-input" id="nilai_kontrak" name="nilai_kontrak"
                                       placeholder="Masukan Nilai Kontrak">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Sisa Anggaran:
                                </label>
                                <input type="text" value="{{$dataPengadaan->sisa_anggaran}}"
                                       class="form-control m-input" readonly id="sisa_anggaran"
                                       name="sisa_anggaran">
                                <span class="m-form__help"></span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Dokumen RKS:
                            </label>
                            <div class="col-lg-4">
                                <input value="{{$dataPengadaan->rks_nomor}}" type="text" id="nppv11" name="nppv11"
                                       class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-1">
                                <input type="text" class="form-control m-input rks_jumlah"
                                       name="rks_jumlah"
                                       value="{{$dataPengadaan->rks_jumlah}}"
                                       id="rks_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    name="rks_tgl"
                                    id="rks_tgl"
                                    value="{{$dataPengadaan->rks_tgl}}"
                                    type='text' class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-1">
                                <input name="rks_hari"
                                       id="rks_hari"
                                       readonly
                                       value="{{$dataPengadaan->rks_hari}}"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                <a href="{!!url('user/job-card/spk/barang/download-rks/' . $dataPengadaan->id )!!}"
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
                                <input type="text" value="{{$dataPengadaan->survei_harga_pasar_nomor}}" id="nppv1"
                                       name="nppv1" class="form-control m-input">
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
                                       readonly
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

                                            <a href="{!!url('user/job-card/spk/barang/download-shp1/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Survey Harga Pasar
                                            </a>
                                            <a href="{!!url('user/job-card/spk/barang/download-shp2/' . $dataPengadaan->id )!!}"
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
                                <input type="text" value="{{$dataPengadaan->hps_nomor}}" id="nppv2"
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
                                       readonly
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                <a href="{!!url('user/job-card/spk/barang/download-hps/' . $dataPengadaan->id )!!}"
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
                                       id="nppv3" name="nppv3" class="form-control m-input">
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
                                       readonly
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->survei_harga_pasar_tgl != null)
                                <div class="col-lg-2">
                                    <a href="{!!url('user/job-card/spk/barang/download-uplh/' . $dataPengadaan->id )!!}"
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
                                <input value="{{$dataPengadaan->evaluasi_dokumen_nomor}}" type="text" id="nppv4"
                                       name="nppv4" class="form-control m-input">
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
                                       readonly
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

                                            <a href="{!!url('user/job-card/spk/barang/evaluasiDokumen1/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Pemasukan Dok Penawaran
                                            </a>
                                            <a href="{!!url('user/job-card/spk/barang/evaluasiDokumen2/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Evaluasi Dok Penawaran
                                            </a>
                                            <a href="{!!url('user/job-card/spk/barang/evaluasiDokumen3/' . $dataPengadaan->id )!!}"
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
                                       name="nppv6" class="form-control m-input">
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
                                       readonly
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

                                            <a href="{!!url('user/job-card/spk/barang/download-hasilKlarifikasi1/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Evaluasi dan Pembuktian Kualifikasi
                                            </a>
                                            <a href="{!!url('user/job-card/spk/barang/download-hasilKlarifikasi2/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Daftar Hadir Pembuktian Kualifikasi
                                            </a>
                                            <a href="{!!url('user/job-card/spk/barang/download-hasilKlarifikasi3/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Evaluasi Nego
                                            </a>
                                            <a href="{!!url('user/job-card/spk/barang/download-hasilKlarifikasi4/' . $dataPengadaan->id )!!}"
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
                                       readonly
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

                                            <a href="{!!url('user/job-card/spk/barang/download-hasilPengadaan1/' . $dataPengadaan->id )!!}"
                                               class="dropdown-item">
                                                Hasil Pengadaan Langsung
                                            </a>
                                            <a href="{!!url('user/job-card/spk/barang/download-hasilPengadaan2/' . $dataPengadaan->id )!!}"
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
                                       name="nppv8" class="form-control m-input">
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
                                       readonly
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->survei_harga_pasar_tgl != null)
                                <div class="col-lg-2">
                                    <a href="{!!url('user/job-card/spk/barang/download-ndPenetapan/' . $dataPengadaan->id )!!}"
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
                                       name="nppv9" class="form-control m-input">
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
                                <input type="text" value="{{$dataPengadaan->spk_nomor}}" id="nppv10" name="nppv10"
                                       class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-1">
                                <input type="text" class="form-control m-input"
                                       name="spk_jumlah"
                                       value="{{$dataPengadaan->spk_jumlah}}"
                                       id="spk_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input
                                    value="{{$dataPengadaan->spk_tgl}}"
                                    name="spk_tgl"
                                    id="spk_tgl"
                                    type='text' class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-1">
                                <input name="spk_hari"
                                       id="spk_hari"
                                       readonly
                                       value="{{$dataPengadaan->spk_hari}}"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                <div class="dropdown">
                                    <button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Download
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <a href="{!!url('user/job-card/spk/barang/download-hasilPengadaan1/' . $dataPengadaan->id )!!}"
                                           class="dropdown-item">
                                            Hasil Pengadaan Langsung
                                        </a>
                                        <a href="{!!url('user/job-card/spk/barang/download-hasilPengadaan2/' . $dataPengadaan->id )!!}"
                                           class="dropdown-item">
                                            Daftar Hadir Hasil Pengadaan Langsung
                                        </a>
                                    </div>
                                </div>
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
                        <div class="col-lg-6">
                            <a href="{!!url('user/job-card/spk/barang/download-spkBarang/')!!}"
                               class="btn btn-brand btn-sm">
                                Download SPK Barang
                            </a>
                            <a href="{!!url('user/job-card/spk/barang/download-daftarKuantitas/')!!}"
                               class="btn btn-brand btn-sm">
                                Download Daftar Kuantitas Barang
                            </a>
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
                {{--                <div class="progress">--}}
                {{--                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.dynamic').change(function () {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent')
                    var _token = $('input[name="_token"]').val()

                    $.ajax({
                        url: "{{route('job-card.spk.barang.fetch')}}",
                        method: "POST",
                        data: {select: select, value: value, _token: _token, dependent: dependent},
                        success: function (result) {

                            $('.metode_pengadaan_jenis1').html(result)
                        }
                    })
                }
            })

            $("#sisa_anggaran").inputmask("Rp 999.999.999", {numericInput: !0})
            $("#rab, #nilai_kontrak").keyup(function () {
                var nilaiRab = $("#rab").val();
                var nilaiKontrak = $("#nilai_kontrak").val()
                $("#sisa_anggaran").val(nilaiRab - nilaiKontrak);
            });

            $('.bagian').change(function () {
                if ($(this).val() != '') {
                    if ($(this).val() === 'Enjiniring') {
                        $('#direksi').val('Agus Cahyono')
                    } else if ($(this).val() === 'Keu SDM & Adm') {
                        $('#direksi').val('Khairul')
                    } else if ($(this).val() === 'Operasi & Pemeliharaan') {
                        $('#direksi').val('Anton Gordon Sitohang')
                    }
                }
            })

            $("#perusahaan").select2({
                placeholder: "Pilih Perusahaan",
            });
            $(".metode_pengadaan_jenis1").select2({
                placeholder: "Pilih Metode",
            });
            $(".pos_anggaran").select2({
                placeholder: "Pilih Pos Anggaran",
            });

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
            $("#jabatan_pengawas").select2({
                placeholder: "Pilih Jabatan Pengawas",
            });
            $("#pic_pelaksana").select2({
                placeholder: "Pilih PIC Pelaksana",
            });
            $("#status").select2({
                placeholder: "Pilih Status",
            });

            $("#hps").inputmask("Rp 999.999.999", {numericInput: !0})
            var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",];


            $("#rks_tgl,#spk_tgl,#tanggal_diterima_panitia,#tanggal,#nd_penetapan_pemenang_tgl,#nd_usulan_tetap_pemenang_tgl,#ba_hasil_pengadaan_langsung_tgl,#survey_harga_pasar_tgl, #hps_tgl, #undangan_pengadaan_langsung_tgl,#pemasukan_dok_penawaran_tgl_sd,#pemasukan_dok_penawaran_tgl_dari,#evaluasi_dokumen_tgl_sd,#evaluasi_dokumen_tgl_dari,#ba_hasil_klarifikasi_tgl").datepicker({
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
                $('#rks_tgl').val(a)
                $('#spk_tgl').val(a)
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
                $('#rks_hari').val(hari[getTanggal1.getDay()])
                $('#spk_hari').val(hari[getTanggal1.getDay()])
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
            var $nppv1 = $('#nppv1')
            var $nppv10 = $('#nppv10')
            var $nppv11 = $('#nppv11'), $value = $('.no_proses_pengadaan');
            $value.on('input', function (e) {
                var total = 1;
                $value.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                if ($('#fungsi_pembangkit').val() === 'Pembangkit') {
                    $nppv1.val('0' + total + '.BASVY-PL/DAN.02.01/210200/' + $('#tahun').val());
                    $nppv2.val('0' + total + '.HPS-PL/DAN.02.01/210200/' + $('#tahun').val());
                    $nppv4.val('0' + total + '.BAEP-PL/DAN.02.01/210200/' + $('#tahun').val());
                    $nppv5.val('0' + total + '.BAEP-PL/DAN.02.01/210200/' + $('#tahun').val());
                    $nppv6.val('0' + total + '.BAHKTNH-PL/DAN.02.01/210200/' + $('#tahun').val());
                    $nppv7.val('0' + total + '.BAHPL-PL/DAN.02.01/210200/' + $('#tahun').val());
                    $nppv8.val('0' + total + '.NDUP-PL/DAN.02.01/210200/' + $('#tahun').val());
                    $nppv9.val('0' + total + '.NDPP-PL/DAN.02.01/210200/' + $('#tahun').val());
                    $nppv10.val('0' + total + '.SPK/DAN.02.01/210200/' + $('#tahun').val());
                    $nppv11.val('0' + total + '.RKS/DAN.01.01/210200/' + $('#tahun').val());
                } else if ($('#fungsi_pembangkit').val() === 'Sarana') {
                    $nppv1.val('0' + total + '.BASVY-PL/DAN.02.07/210200/' + $('#tahun').val());
                    $nppv2.val('0' + total + '.HPS-PL/DAN.02.07/210200/' + $('#tahun').val());
                    $nppv4.val('0' + total + '.BAEP-PL/DAN.02.07/210200/' + $('#tahun').val());
                    $nppv5.val('0' + total + '.BAEP-PL/DAN.02.07/210200/' + $('#tahun').val());
                    $nppv6.val('0' + total + '.BAHKTNH-PL/DAN.02.07/210200/' + $('#tahun').val());
                    $nppv7.val('0' + total + '.BAHPL-PL/DAN.02.07/210200/' + $('#tahun').val());
                    $nppv8.val('0' + total + '.NDUP-PL/DAN.02.07/210200/' + $('#tahun').val());
                    $nppv9.val('0' + total + '.NDPP-PL/DAN.02.07/210200/' + $('#tahun').val());
                    $nppv10.val('0' + total + '.SPK/DAN.02.07/210200/' + $('#tahun').val());
                    $nppv11.val('0' + total + '.RKS/DAN.01.06/210200/' + $('#tahun').val());
                }
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

            var tglA = $('#rks_jumlah');
            var tglB = $('#survey_harga_pasar_jumlah')
            var tglC = $('#hps_jumlah');
            var tglD = $('#undangan_pengadaan_langsung_jumlah');
            var tglE = $('#pemasukan_dok_penawaran_jumlah_dari');
            var tglF = $('#pemasukan_dok_penawaran_jumlah_sd');
            var tglG = $('#evaluasi_dokumen_jumlah_dari');
            var tglH = $('#evaluasi_dokumen_jumlah_sd');
            var tglI = $('#ba_hasil_klarifikasi_jumlah');
            var tglJ = $('#ba_hasil_pengadaan_langsung_jumlah');
            var tglK = $('#nd_usulan_tetap_pemenang_jumlah');
            var tglL = $('#nd_penetapan_pemenang_jumlah');
            var tglM = $('#spk_jumlah');


            var $tgl0 = $('#tanggal_diterima_panitia'), $valueTgl0 = $('#rks_jumlah');
            $valueTgl0.on('input', function (e) {
                var totaltgl0 = 1;
                $valueTgl0.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl0 = totaltgl0 * parseInt(this.value, 10);
                });

                var getTanggalTes = $tgl0.val();
                var getTanggal0 = new Date(getTanggalTes);

                var jumlahB = parseInt(tglB.val());
                var jumlahC = parseInt(tglC.val());
                var jumlahD = parseInt(tglD.val());
                var jumlahE = parseInt(tglE.val());
                var jumlahF = parseInt(tglF.val());
                var jumlahG = parseInt(tglG.val());
                var jumlahH = parseInt(tglH.val());
                var jumlahI = parseInt(tglI.val());
                var jumlahJ = parseInt(tglJ.val());
                var jumlahK = parseInt(tglK.val());
                var jumlahL = parseInt(tglL.val());
                var jumlahM = parseInt(tglM.val());


                var getFull0 = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + totaltgl0)
                var tambahTglB = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB));
                var tambahTglC = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC));
                var tambahTglD = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD));
                var tambahTglE = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE));
                var tambahTglF = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF));
                var tambahTglG = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG));
                var tambahTglH = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH));
                var tambahTglI = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI));
                var tambahTglJ = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ));
                var tambahTglK = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
                var tambahTglL = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
                var tambahTglM = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));

                $('#rks_tgl').datepicker('setDate', getFull0);
                $('#rks_hari').val(hari[getFull0.getDay()]);
                $('#survey_harga_pasar_tgl').datepicker('setDate', tambahTglB);
                $('#survey_harga_pasar_hari').val(hari[tambahTglB.getDay()]);
                $('#hps_tgl').datepicker('setDate', tambahTglC);
                $('#hps_hari').val(hari[tambahTglC.getDay()]);
                $('#undangan_pengadaan_langsung_tgl').datepicker('setDate', tambahTglD);
                $('#undangan_pengadaan_langsung_hari').val(hari[tambahTglD.getDay()]);
                $('#pemasukan_dok_penawaran_tgl_dari').datepicker('setDate', tambahTglE);
                $('#pemasukan_dok_penawaran_hari_dari').val(hari[tambahTglE.getDay()]);
                $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', tambahTglF);
                $('#pemasukan_dok_penawaran_hari_sd').val(hari[tambahTglF.getDay()]);
                $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', tambahTglG);
                $('#evaluasi_dokumen_hari_dari').val(hari[tambahTglG.getDay()]);
                $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
                $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
                $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
                $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
                $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
                $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
                $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
                $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
                $('#spk_tgl').datepicker('setDate', tambahTglM);
                $('#spk_hari').val(hari[tambahTglM.getDay()])


            });

            var $tgl1 = $('#tanggal_diterima_panitia'), $valueTgl1 = $('#survey_harga_pasar_jumlah');
            $valueTgl1.on('input', function (e) {
                var totaltgl1 = 1;
                $valueTgl1.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl1 = totaltgl1 * parseInt(this.value, 10);
                });
                var jumlahA = parseInt(tglA.val());

                var getTanggalTes = $tgl1.val();
                var getTanggal1 = new Date(getTanggalTes)
                var getFull1 = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA))

                $('#survey_harga_pasar_tgl').datepicker('setDate', getFull1);
                $('#survey_harga_pasar_hari').val(hari[getFull1.getDay()])

                console.log(jumlahA + totaltgl1)
                var jumlahC = parseInt(tglC.val());
                var jumlahD = parseInt(tglD.val());
                var jumlahE = parseInt(tglE.val());
                var jumlahF = parseInt(tglF.val());
                var jumlahG = parseInt(tglG.val());
                var jumlahH = parseInt(tglH.val());
                var jumlahI = parseInt(tglI.val());
                var jumlahJ = parseInt(tglJ.val());
                var jumlahK = parseInt(tglK.val());
                var jumlahL = parseInt(tglL.val());
                var jumlahM = parseInt(tglM.val());


                var tambahTglC = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC));
                var tambahTglD = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD));
                var tambahTglE = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE));
                var tambahTglF = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF));
                var tambahTglG = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG));
                var tambahTglH = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH));
                var tambahTglI = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI));
                var tambahTglJ = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ));
                var tambahTglK = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
                var tambahTglL = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
                var tambahTglM = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));

                console.log((totaltgl1 + jumlahA + jumlahC))
                $('#hps_tgl').datepicker('setDate', tambahTglC);
                $('#hps_hari').val(hari[tambahTglC.getDay()]);
                $('#undangan_pengadaan_langsung_tgl').datepicker('setDate', tambahTglD);
                $('#undangan_pengadaan_langsung_hari').val(hari[tambahTglD.getDay()]);
                $('#pemasukan_dok_penawaran_tgl_dari').datepicker('setDate', tambahTglE);
                $('#pemasukan_dok_penawaran_hari_dari').val(hari[tambahTglE.getDay()]);
                $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', tambahTglF);
                $('#pemasukan_dok_penawaran_hari_sd').val(hari[tambahTglF.getDay()]);
                $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', tambahTglG);
                $('#evaluasi_dokumen_hari_dari').val(hari[tambahTglG.getDay()]);
                $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
                $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
                $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
                $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
                $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
                $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
                $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
                $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
                $('#spk_tgl').datepicker('setDate', tambahTglM);
                $('#spk_hari').val(hari[tambahTglM.getDay()])


            });

            var $tgl2 = $('#tanggal_diterima_panitia'), $valueTgl2 = $('#hps_jumlah');
            $valueTgl2.on('input', function (e) {
                var totaltgl2 = 1;
                $valueTgl2.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl2 = totaltgl2 * parseInt(this.value, 10);
                });
                var jumlahA = parseInt(tglA.val())
                var jumlahB = parseInt(tglB.val())

                var getTanggalTes1 = $tgl2.val()
                var getTanggal2 = new Date(getTanggalTes1)
                var getFull2 = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB))
                $('#hps_tgl').datepicker('setDate', getFull2);
                $('#hps_hari').val(hari[getFull2.getDay()])


                var jumlahD = parseInt(tglD.val());
                var jumlahE = parseInt(tglE.val());
                var jumlahF = parseInt(tglF.val());
                var jumlahG = parseInt(tglG.val());
                var jumlahH = parseInt(tglH.val());
                var jumlahI = parseInt(tglI.val());
                var jumlahJ = parseInt(tglJ.val());
                var jumlahK = parseInt(tglK.val());
                var jumlahL = parseInt(tglL.val());
                var jumlahM = parseInt(tglM.val());

                var tambahTglD = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD));
                var tambahTglE = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE));
                var tambahTglF = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF));
                var tambahTglG = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG));
                var tambahTglH = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH));
                var tambahTglI = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI));
                var tambahTglJ = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ));
                var tambahTglK = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
                var tambahTglL = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
                var tambahTglM = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));

                $('#undangan_pengadaan_langsung_tgl').datepicker('setDate', tambahTglD);
                $('#undangan_pengadaan_langsung_hari').val(hari[tambahTglD.getDay()]);
                $('#pemasukan_dok_penawaran_tgl_dari').datepicker('setDate', tambahTglE);
                $('#pemasukan_dok_penawaran_hari_dari').val(hari[tambahTglE.getDay()]);
                $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', tambahTglF);
                $('#pemasukan_dok_penawaran_hari_sd').val(hari[tambahTglF.getDay()]);
                $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', tambahTglG);
                $('#evaluasi_dokumen_hari_dari').val(hari[tambahTglG.getDay()]);
                $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
                $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
                $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
                $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
                $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
                $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
                $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
                $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
                $('#spk_tgl').datepicker('setDate', tambahTglM);
                $('#spk_hari').val(hari[tambahTglM.getDay()])


            });


            var $tgl3 = $('#tanggal_diterima_panitia'), $valueTgl3 = $('#undangan_pengadaan_langsung_jumlah');
            $valueTgl3.on('input', function (e) {
                var totaltgl3 = 1;
                $valueTgl3.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl3 = totaltgl3 * parseInt(this.value, 10);
                });
                var jumlahA = parseInt(tglA.val())
                var jumlahB = parseInt(tglB.val());
                var jumlahC = parseInt(tglC.val());

                var getTanggalTes3 = $tgl3.val()
                var getTanggal3 = new Date(getTanggalTes3)
                var getFull3 = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC));
                $('#undangan_pengadaan_langsung_tgl').datepicker('setDate', getFull3);
                $('#undangan_pengadaan_langsung_hari').val(hari[getFull3.getDay()])


                var jumlahE = parseInt(tglE.val());
                var jumlahF = parseInt(tglF.val());
                var jumlahG = parseInt(tglG.val());
                var jumlahH = parseInt(tglH.val());
                var jumlahI = parseInt(tglI.val());
                var jumlahJ = parseInt(tglJ.val());
                var jumlahK = parseInt(tglK.val());
                var jumlahL = parseInt(tglL.val());
                var jumlahM = parseInt(tglM.val());

                var tambahTglE = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE));
                var tambahTglF = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF));
                var tambahTglG = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG));
                var tambahTglH = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH));
                var tambahTglI = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI));
                var tambahTglJ = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ));
                var tambahTglK = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
                var tambahTglL = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
                var tambahTglM = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));

                $('#pemasukan_dok_penawaran_tgl_dari').datepicker('setDate', tambahTglE);
                $('#pemasukan_dok_penawaran_hari_dari').val(hari[tambahTglE.getDay()]);
                $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', tambahTglF);
                $('#pemasukan_dok_penawaran_hari_sd').val(hari[tambahTglF.getDay()]);
                $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', tambahTglG);
                $('#evaluasi_dokumen_hari_dari').val(hari[tambahTglG.getDay()]);
                $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
                $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
                $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
                $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
                $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
                $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
                $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
                $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
                $('#spk_tgl').datepicker('setDate', tambahTglM);
                $('#spk_hari').val(hari[tambahTglM.getDay()])

            });

            var $tgl4 = $('#tanggal_diterima_panitia'), $valueTgl4 = $('#pemasukan_dok_penawaran_jumlah_dari');
            $valueTgl4.on('input', function (e) {
                var totaltgl4 = 1;
                $valueTgl4.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl4 = totaltgl4 * parseInt(this.value, 10);
                });

                var jumlahA = parseInt(tglA.val())
                var jumlahB = parseInt(tglB.val());
                var jumlahC = parseInt(tglC.val());
                var jumlahD = parseInt(tglC.val());

                var getTanggalTes4 = $tgl4.val()
                var getTanggal4 = new Date(getTanggalTes4)
                var getFull4 = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD))
                $('#pemasukan_dok_penawaran_tgl_dari').datepicker('setDate', getFull4);
                $('#pemasukan_dok_penawaran_hari_dari').val(hari[getFull4.getDay()])


                var jumlahF = parseInt(tglF.val());
                var jumlahG = parseInt(tglG.val());
                var jumlahH = parseInt(tglH.val());
                var jumlahI = parseInt(tglI.val());
                var jumlahJ = parseInt(tglJ.val());
                var jumlahK = parseInt(tglK.val());
                var jumlahL = parseInt(tglL.val());
                var jumlahM = parseInt(tglM.val());

                var tambahTglF = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF));
                var tambahTglG = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG));
                var tambahTglH = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH));
                var tambahTglI = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH + jumlahI));
                var tambahTglJ = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ));
                var tambahTglK = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
                var tambahTglL = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
                var tambahTglM = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));


                $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', tambahTglF);
                $('#pemasukan_dok_penawaran_hari_sd').val(hari[tambahTglF.getDay()]);
                $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', tambahTglG);
                $('#evaluasi_dokumen_hari_dari').val(hari[tambahTglG.getDay()]);
                $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
                $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
                $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
                $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
                $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
                $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
                $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
                $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
                $('#spk_tgl').datepicker('setDate', tambahTglM);
                $('#spk_hari').val(hari[tambahTglM.getDay()])

            });
            var $tgl5 = $('#tanggal_diterima_panitia'), $valueTgl5 = $('#pemasukan_dok_penawaran_jumlah_sd');
            $valueTgl5.on('input', function (e) {
                var totaltgl5 = 1;
                $valueTgl5.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl5 = totaltgl5 * parseInt(this.value, 10);
                });

                var jumlahA = parseInt(tglA.val())
                var jumlahB = parseInt(tglB.val());
                var jumlahC = parseInt(tglC.val());
                var jumlahD = parseInt(tglD.val());
                var jumlahE = parseInt(tglE.val());

                var getTanggalTes5 = $tgl5.val()
                var getTanggal5 = new Date(getTanggalTes5)
                var getFull5 = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE));
                $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', getFull5);
                $('#pemasukan_dok_penawaran_hari_sd').val(hari[getFull5.getDay()])


                var jumlahG = parseInt(tglG.val());
                var jumlahH = parseInt(tglH.val());
                var jumlahI = parseInt(tglI.val());
                var jumlahJ = parseInt(tglJ.val());
                var jumlahK = parseInt(tglK.val());
                var jumlahL = parseInt(tglL.val());
                var jumlahM = parseInt(tglM.val());


                var tambahTglG = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG));
                var tambahTglH = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG + jumlahH));
                var tambahTglI = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG + jumlahH + jumlahI));
                var tambahTglJ = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG + jumlahH + jumlahI + jumlahJ));
                var tambahTglK = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
                var tambahTglL = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
                var tambahTglM = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));


                $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', tambahTglG);
                $('#evaluasi_dokumen_hari_dari').val(hari[tambahTglG.getDay()]);
                $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
                $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
                $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
                $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
                $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
                $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
                $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
                $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
                $('#spk_tgl').datepicker('setDate', tambahTglM);
                $('#spk_hari').val(hari[tambahTglM.getDay()])


            });

            var $tgl6 = $('#tanggal_diterima_panitia'), $valueTgl6 = $('#evaluasi_dokumen_jumlah_dari');
            $valueTgl6.on('input', function (e) {
                var totaltgl6 = 1;
                $valueTgl6.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl6 = totaltgl6 * parseInt(this.value, 10);
                });

                var jumlahA = parseInt(tglA.val())
                var jumlahB = parseInt(tglB.val());
                var jumlahC = parseInt(tglC.val());
                var jumlahD = parseInt(tglD.val());
                var jumlahE = parseInt(tglE.val());
                var jumlahF = parseInt(tglF.val());

                var getTanggalTes6 = $tgl6.val()
                var getTanggal6 = new Date(getTanggalTes6)
                var getFull6 = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF))
                $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', getFull6);
                $('#evaluasi_dokumen_hari_dari').val(hari[getFull6.getDay()])


                var jumlahH = parseInt(tglH.val());
                var jumlahI = parseInt(tglI.val());
                var jumlahJ = parseInt(tglJ.val());
                var jumlahK = parseInt(tglK.val());
                var jumlahL = parseInt(tglL.val());
                var jumlahM = parseInt(tglM.val());


                var tambahTglH = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahH));
                var tambahTglI = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahH + jumlahI));
                var tambahTglJ = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahH + jumlahI + jumlahJ));
                var tambahTglK = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahH + jumlahI + jumlahJ + jumlahK));
                var tambahTglL = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
                var tambahTglM = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));


                $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
                $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
                $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
                $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
                $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
                $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
                $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
                $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
                $('#spk_tgl').datepicker('setDate', tambahTglM);
                $('#spk_hari').val(hari[tambahTglM.getDay()])


            });

            var $tgl7 = $('#tanggal_diterima_panitia'), $valueTgl7 = $('#evaluasi_dokumen_jumlah_sd');
            $valueTgl7.on('input', function (e) {
                var totaltgl7 = 1;
                $valueTgl7.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl7 = totaltgl7 * parseInt(this.value, 10);
                });

                var jumlahA = parseInt(tglA.val())
                var jumlahB = parseInt(tglB.val());
                var jumlahC = parseInt(tglC.val());
                var jumlahD = parseInt(tglD.val());
                var jumlahE = parseInt(tglE.val());
                var jumlahF = parseInt(tglF.val());
                var jumlahG = parseInt(tglG.val());
                var getTanggalTes7 = $tgl7.val()
                var getTanggal7 = new Date(getTanggalTes7)
                var getFull7 = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG))
                $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', getFull7);
                $('#evaluasi_dokumen_hari_sd').val(hari[getFull7.getDay()])


                var jumlahI = parseInt(tglI.val());
                var jumlahJ = parseInt(tglJ.val());
                var jumlahK = parseInt(tglK.val());
                var jumlahL = parseInt(tglL.val());
                var jumlahM = parseInt(tglM.val());


                var tambahTglI = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI));
                var tambahTglJ = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ));
                var tambahTglK = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahK));
                var tambahTglL = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahK + jumlahL));
                var tambahTglM = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));


                $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
                $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
                $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
                $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
                $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
                $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
                $('#spk_tgl').datepicker('setDate', tambahTglM);
                $('#spk_hari').val(hari[tambahTglM.getDay()])

            });

            var $tgl8 = $('#tanggal_diterima_panitia'), $valueTgl8 = $('#ba_hasil_klarifikasi_jumlah');
            $valueTgl8.on('input', function (e) {
                var totaltgl8 = 1;
                $valueTgl8.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl8 = totaltgl8 * parseInt(this.value, 10);
                });
                var jumlahA = parseInt(tglA.val())
                var jumlahB = parseInt(tglB.val());
                var jumlahC = parseInt(tglC.val());
                var jumlahD = parseInt(tglD.val());
                var jumlahE = parseInt(tglE.val());
                var jumlahF = parseInt(tglF.val());
                var jumlahG = parseInt(tglG.val());
                var jumlahH = parseInt(tglH.val());

                var getTanggalTes8 = $tgl8.val()
                var getTanggal8 = new Date(getTanggalTes8)
                var getFull8 = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate() + (totaltgl8 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH))
                $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', getFull8);
                $('#ba_hasil_klarifikasi_hari').val(hari[getFull8.getDay()])


                var jumlahJ = parseInt(tglJ.val());
                var jumlahK = parseInt(tglK.val());
                var jumlahL = parseInt(tglL.val());
                var jumlahM = parseInt(tglM.val());


                var tambahTglJ = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate() + (totaltgl8 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahH + jumlahJ));
                var tambahTglK = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate() + (totaltgl8 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahH + jumlahJ + jumlahK));
                var tambahTglL = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate() + (totaltgl8 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahH + jumlahJ + jumlahK + jumlahL));
                var tambahTglM = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate() + (totaltgl8 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahH + jumlahJ + jumlahK + jumlahL + jumlahM));


                $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
                $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
                $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
                $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
                $('#spk_tgl').datepicker('setDate', tambahTglM);
                $('#spk_hari').val(hari[tambahTglM.getDay()])


            });

            var $tgl9 = $('#tanggal_diterima_panitia'), $valueTgl9 = $('#ba_hasil_pengadaan_langsung_jumlah');
            $valueTgl9.on('input', function (e) {
                var totaltgl9 = 1;
                $valueTgl9.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl9 = totaltgl9 * parseInt(this.value, 10);
                });
                var jumlahA = parseInt(tglA.val())
                var jumlahB = parseInt(tglB.val());
                var jumlahC = parseInt(tglC.val());
                var jumlahD = parseInt(tglD.val());
                var jumlahE = parseInt(tglE.val());
                var jumlahF = parseInt(tglF.val());
                var jumlahG = parseInt(tglG.val());
                var jumlahH = parseInt(tglH.val());
                var jumlahI = parseInt(tglI.val());

                var getTanggalTes9 = $tgl9.val()
                var getTanggal9 = new Date(getTanggalTes9)
                var getFull9 = new Date(getTanggal9.getFullYear(), getTanggal9.getMonth(), getTanggal9.getDate() + (totaltgl9 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI))
                $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', getFull9);
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[getFull9.getDay()])


                var jumlahK = parseInt(tglK.val());
                var jumlahL = parseInt(tglL.val());
                var jumlahM = parseInt(tglM.val());


                var tambahTglK = new Date(getTanggal9.getFullYear(), getTanggal9.getMonth(), getTanggal9.getDate() + (totaltgl9 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahH + jumlahK));
                var tambahTglL = new Date(getTanggal9.getFullYear(), getTanggal9.getMonth(), getTanggal9.getDate() + (totaltgl9 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahH + jumlahK + jumlahL));
                var tambahTglM = new Date(getTanggal9.getFullYear(), getTanggal9.getMonth(), getTanggal9.getDate() + (totaltgl9 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahH + jumlahK + jumlahL + jumlahM));


                $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
                $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
                $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
                $('#spk_tgl').datepicker('setDate', tambahTglM);
                $('#spk_hari').val(hari[tambahTglM.getDay()])

            });

            var $tgl10 = $('#tanggal_diterima_panitia'), $valueTgl10 = $('#nd_usulan_tetap_pemenang_jumlah');
            $valueTgl10.on('input', function (e) {
                var totaltgl10 = 1;
                $valueTgl10.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl10 = totaltgl10 * parseInt(this.value, 10);
                });

                var jumlahA = parseInt(tglA.val())
                var jumlahB = parseInt(tglB.val());
                var jumlahC = parseInt(tglC.val());
                var jumlahD = parseInt(tglD.val());
                var jumlahE = parseInt(tglE.val());
                var jumlahF = parseInt(tglF.val());
                var jumlahG = parseInt(tglG.val());
                var jumlahH = parseInt(tglH.val());
                var jumlahI = parseInt(tglI.val());
                var jumlahJ = parseInt(tglJ.val());

                var getTanggalTes10 = $tgl10.val()
                var getTanggal10 = new Date(getTanggalTes10)
                var getFull10 = new Date(getTanggal10.getFullYear(), getTanggal10.getMonth(), getTanggal10.getDate() + (totaltgl10 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ))
                $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', getFull10);
                $('#nd_usulan_tetap_pemenang_hari').val(hari[getFull10.getDay()])


                var jumlahL = parseInt(tglL.val());
                var jumlahM = parseInt(tglM.val());


                var tambahTglL = new Date(getTanggal10.getFullYear(), getTanggal10.getMonth(), getTanggal10.getDate() + (totaltgl10 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahH + jumlahL));
                var tambahTglM = new Date(getTanggal10.getFullYear(), getTanggal10.getMonth(), getTanggal10.getDate() + (totaltgl10 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahH + jumlahL + jumlahM));


                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
                $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
                $('#spk_tgl').datepicker('setDate', tambahTglM);
                $('#spk_hari').val(hari[tambahTglM.getDay()])

            });

            var $tgl11 = $('#tanggal_diterima_panitia'), $valueTgl11 = $('#nd_penetapan_pemenang_jumlah');
            $valueTgl11.on('input', function (e) {
                var totaltgl11 = 1;
                $valueTgl11.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl11 = totaltgl11 * parseInt(this.value, 10);
                });

                var jumlahA = parseInt(tglA.val())
                var jumlahB = parseInt(tglB.val());
                var jumlahC = parseInt(tglC.val());
                var jumlahD = parseInt(tglD.val());
                var jumlahE = parseInt(tglE.val());
                var jumlahF = parseInt(tglF.val());
                var jumlahG = parseInt(tglG.val());
                var jumlahH = parseInt(tglH.val());
                var jumlahI = parseInt(tglI.val());
                var jumlahJ = parseInt(tglJ.val());
                var jumlahK = parseInt(tglK.val());


                var getTanggalTes11 = $tgl11.val()
                var getTanggal11 = new Date(getTanggalTes11)
                var getFull11 = new Date(getTanggal11.getFullYear(), getTanggal11.getMonth(), getTanggal11.getDate() + (totaltgl11 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
                $('#nd_penetapan_pemenang_tgl').datepicker('setDate', getFull11);
                $('#nd_penetapan_pemenang_hari').val(hari[getFull11.getDay()])


                var jumlahM = parseInt(tglM.val());
                var tambahTglM = new Date(getTanggal11.getFullYear(), getTanggal11.getMonth(), getTanggal11.getDate() + (totaltgl11 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahH + jumlahK + jumlahM));


                $('#spk_tgl').datepicker('setDate', tambahTglM);
                $('#spk_hari').val(hari[tambahTglM.getDay()])


            });

            var $tgl12 = $('#tanggal_diterima_panitia'), $valueTgl12 = $('#spk_jumlah');
            $valueTgl12.on('input', function (e) {
                var totaltgl12 = 1;
                $valueTgl12.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        totaltgl12 = totaltgl12 * parseInt(this.value, 10);
                });

                var jumlahA = parseInt(tglA.val())
                var jumlahB = parseInt(tglB.val());
                var jumlahC = parseInt(tglC.val());
                var jumlahD = parseInt(tglD.val());
                var jumlahE = parseInt(tglE.val());
                var jumlahF = parseInt(tglF.val());
                var jumlahG = parseInt(tglG.val());
                var jumlahH = parseInt(tglH.val());
                var jumlahI = parseInt(tglI.val());
                var jumlahJ = parseInt(tglJ.val());
                var jumlahK = parseInt(tglK.val());
                var jumlahL = parseInt(tglL.val());
                var getTanggalTes12 = $tgl12.val()
                var getTanggal12 = new Date(getTanggalTes12)
                var getFull12 = new Date(getTanggal12.getFullYear(), getTanggal12.getMonth(), getTanggal12.getDate() + (totaltgl12 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL))
                $('#spk_tgl').datepicker('setDate', getFull12);
                $('#spk_hari').val(hari[getFull12.getDay()])

            });
            $('#sample_form').on('submit', function (event) {
                event.preventDefault();
                $('#sample_form').on('submit', function (event) {
                    event.preventDefault();

                    if ($('#action').val() == 'Add') {
                        $.ajax({
                            url: '{{route('job-card.spk.barang.inisiasi-pengadaan.update')}}',
                            method: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: 'json',
                            beforeSend: function () {
                                $('#action_button').val('Loading ...')
                            },
                            success: function (data) {
                                if (data.errors) {
                                    $('#action_button').val('Submit')
                                    for (var count = 0; count < data.errors.length; count++) {
                                        toastr.error(data.errors[count])
                                    }

                                }
                                if (data.success) {
                                    toastr.success(data.success)
                                    $('#action_button').val('Submit')
                                }


                            }
                        });

                    }
                });
            });
        });
    </script>
@endsection

