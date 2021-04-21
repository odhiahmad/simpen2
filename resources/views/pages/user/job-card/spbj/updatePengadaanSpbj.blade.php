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
                                    No RAB:
                                </label>
                                <input value="{{$dataPengadaan->no_proses}}" type="text" class="form-control m-input"
                                       id="no_proses" name="no_proses"
                                       placeholder="Masukan Nomor Proses">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    No Nota Dinas:
                                </label>
                                <input value="{{$dataPengadaan->no_nota_dinas}}" type="text"
                                       class="form-control m-input" id="no_nota_dinas" name="no_nota_dinas"
                                       placeholder="Masukan Nomor Nota Dinas">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    Tanggal Nota Dinas:
                                </label>
                                <input
                                    value="{{$dataPengadaan->tgl_nota_dinas}}"
                                    name="tanggal_nota_dinas"
                                    id="tanggal_nota_dinas"
                                    type='text' class="form-control  m-input tanggal_nota_dinas" readonly
                                    placeholder="Tanggal Nota Dinas"/>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Tanggal Mulai:
                                </label>
                                <input
                                    value="{{$dataPengadaan->tgl_mulai}}"
                                    name="tanggal_mulai"
                                    id="tanggal_mulai"
                                    type='text' class="form-control  m-input tanggal_mulai" readonly
                                    placeholder="Tanggal Mulai"/>
                                <span class="m-form__help"></span>
                            </div>
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
                            @if($dataPengadaan->id_mp4 != null)
                                <div class="col-lg-6">
                                    <label>
                                        Metode Pengadaan Jenis 2
                                    </label>
                                    <select class="form-control metode_pengadaan_jenis2"
                                            id="metode_pengadaan_jenis2"
                                            name="metode_pengadaan_jenis2">
                                        <option value="{{($dataPengadaan->id_mp3)}}">
                                            {{$dataPengadaan->getmp3->nama}}
                                        </option>
                                    </select>
                                    <span class="m-form__help">`</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>
                                        Metode Pengadaan Jenis 3
                                    </label>
                                    <select class="form-control metode_pengadaan_jenis3"
                                            id="metode_pengadaan_jenis3"
                                            name="metode_pengadaan_jenis3">
                                        <option value="{{($dataPengadaan->id_mp4)}}">
                                            {{$dataPengadaan->getmp4->nama}}
                                        </option>
                                    </select>
                                    <span class="m-form__help">`</span>
                                </div>
                                {{--                                <div class="col-lg-6">--}}
                                {{--                                    <label>--}}
                                {{--                                        Metode Pengadaan Jenis 4--}}
                                {{--                                    </label>--}}
                                {{--                                    <select class="form-control metode_pengadaan_jenis4"--}}
                                {{--                                            id="metode_pengadaan_jenis4"--}}
                                {{--                                            name="metode_pengadaan_jenis4">--}}
                                {{--                                        <option value="{{($dataPengadaan->id_mp5)}}">--}}
                                {{--                                            {{$dataPengadaan->getmp5->nama}}--}}
                                {{--                                        </option>--}}
                                {{--                                    </select>--}}
                                {{--                                    <span class="m-form__help">`</span>--}}
                                {{--                                </div>--}}
                            @endif
                            <!-- <div class="col-lg-6">
                                <label>
                                    Rencana Jangka Waktu Pekerjaan:
                                </label>
                                <input type="text" class="form-control m-input" value="{{$dataPengadaan->rencana}}"
                                       id="rencana" name="rencana"
                                       placeholder="Masukan Rencana ">
                                <span class="m-form__help"></span>
                            </div> -->
                            <div class="col-lg-6">
                                <label>
                                    Tempat Penyerahan
                                </label>
                                <select class="form-control tempat_penyerahan" id="tempat_penyerahan"
                                        name="tempat_penyerahan">
                                    @foreach ($dataTempatPenyerahan as $key)
                                        <option
                                            value="{{$key->nama}}" data-id="{{$key->id}}" {{($dataPengadaan->tempat_penyerahan == $key->nama) ?"selected":''}}>
                                            {{$key->nama}}
                                        </option>
                                    @endforeach

                                </select>
                                <span class="m-form__help">`</span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Alamat Penyerahan:
                                </label>
                                <input type="text" class="form-control m-input alamat_penyerahan" disabled value="{{$dataPengadaan->alamat_penyerahan}}"
                                       id="alamat_penyerahan" name="alamat_penyerahan"
                                       placeholder="Alamat Penyerahan">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Masa Berlaku Surat Penawaran
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
{{--                            <div class="col-lg-6">--}}
{{--                                <label>--}}
{{--                                    VFMC 1--}}
{{--                                </label>--}}
{{--                                <select class="form-control vfmc" id="vfmc" name="vfmc">--}}
{{--                                    @foreach ($dataVfmc as $key)--}}
{{--                                        <option--}}
{{--                                            value="{{$key->nama}}" {{($dataPengadaan->vfmc == $key->nama) ?"selected":''}}>--}}
{{--                                            {{$key->nama}}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                <span class="m-form__help">`</span>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-6">--}}
{{--                                <label>--}}
{{--                                    VFMC 2--}}
{{--                                </label>--}}
{{--                                <select class="form-control vfmc2" id="vfmc2" name="vfmc2">--}}
{{--                                    @foreach ($dataVfmc as $key)--}}
{{--                                        <option--}}
{{--                                            value="{{$key->nama}}" {{($dataPengadaan->vfmc2 == $key->nama) ?"selected":''}}>--}}
{{--                                            {{$key->nama}}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                <span class="m-form__help"></span>--}}
{{--                            </div>--}}

                            <div class="col-lg-6">
                                <label>
                                    Jabatan Direksi
                                </label>
                                <select class="form-control jabatan_direksi" id="jabatan_direksi" name="jabatan_direksi">
                                    @foreach ($dataJabatanDireksi as $key)
                                        <option
                                            value="{{ $key->bagian }}" data-id="{{$key->nama}}" {{($dataPengadaan->jabatan_direksi == $key->nama) ?"selected":''}}>
                                            {{ $key->bagian}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Direksi:
                                </label>
                                <input type="text" class="form-control m-input direksi" disabled value="{{$dataPengadaan->direksi}}"
                                       id="direksi" name="direksi"
                                       placeholder="Direksi">
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
                        @include('pages.user.job-card.spbj.pilihanHariUpdate')
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
                            <div class="col-lg-6">
                                <label>
                                    No Perjanjian Kontrak:
                                </label>
                                <input type="text" class="form-control m-input"
                                       value="{{$dataPengadaan->no_perjanjian}}"
                                       id="no_perjanjian" name="no_perjanjian"
                                       placeholder="Masukan No Perjanjian Kontrak">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Harga Penawaran:
                                </label>
                                <input type="text" class="form-control m-input"
                                       value="{{$dataPengadaan->harga_penawaran}}"
                                       id="harga_penawaran"
                                       name="harga_penawaran"
                                       placeholder="Masukan Harga Penawaran">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Harga Kontrak:
                                </label>
                                <input type="text" class="form-control m-input"
                                       value="{{$dataPengadaan->harga_kontrak}}"
                                       id="harga_kontrak" name="harga_kontrak"
                                       placeholder="Masukan Harga Kontrak">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Nilai Jaminan:
                                </label>
                                <input type="text" class="form-control m-input"
                                       value="{{$dataPengadaan->nilai_jaminan}}"
                                       id="nilai_jaminan" name="nilai_jaminan"
                                       placeholder="Masukan Nilai Jaminan">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-12">
                                <label>
                                    Jangka Waktu Penyelesaian:
                                </label>
                                <input type="text" class="form-control m-input"
                                       name="jangka_waktu"
                                       value="{{$dataPengadaan->jangka_waktu}}"
                                       id="jangka_waktu" placeholder="Jangka Waktu Penyelesaian">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-12">
                                <label>
                                    Status Berakhir
                                </label>
                                <select class="form-control status" id="status_berakhir" name="status_berakhir">

                                    <option
                                        value="{{$dataPengadaan->status_berakhir}}">
                                        {{$dataPengadaan->status_berakhir}}
                                    </option>

                                </select>
                                <span class="m-form__help">`</span>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">
                                        Jangka Waktu:
                                    </label>
                                    <div class="col-lg-5">
                                        <input
                                            name="jangka_waktu_tgl"
                                            id="jangka_waktu_tgl"
                                            value="{{$dataPengadaan->jangka_waktu_tgl}}"
                                            type='text' class="form-control" readonly
                                            placeholder="Jangka Waktu Tanggal"/>
                                    </div>
                                    <div class="col-lg-5">
                                        <input

                                            name="jangka_waktu_hari"
                                            id="jangka_waktu_hari"
                                            readonly
                                            value="{{$dataPengadaan->jangka_waktu_hari}}"
                                            type="text" class="form-control m-input" placeholder="Jangka Waktu Hari">
                                        <span class="m-form__help"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>
                                        Melampirkan Sertifikat COO/COM/Asal Usul
                                    </label>
                                    <select class="form-control melampirkan_sertifikat_coo"
                                            id="melampirkan_sertifikat_coo"
                                            name="melampirkan_sertifikat_coo">
                                        <option value="">Pilih</option>
                                        <option
                                            value="Ya" {{($dataPengadaan->melampirkan_sertifikat_coo == 'Ya') ?"selected":''}}>
                                            Ya
                                        </option>
                                        <option
                                            value="Tidak" {{($dataPengadaan->melampirkan_sertifikat_coo == 'Tidak') ?"selected":''}}>
                                            Tidak
                                        </option>

                                    </select>
                                    <span class="m-form__help">`</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>
                                        COO / COM / Asal Usul
                                    </label>
                                    <select class="form-control coo" id="coo" name="coo">
                                        @foreach ($dataCoo as $key)
                                            <option
                                                value="{{ $key->nama }}" {{($dataPengadaan->coo == $key->nama) ?"selected":''}}>
                                                {{ $key->nama}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="m-form__help"></span>
                                </div>
                                <div class="col-lg-6">
                                    <label>
                                        Penerbit COO / COM / Asal Usul
                                    </label>
                                    <select class="form-control penerbit_coo" id="penerbit_coo" name="penerbit_coo">
                                        @foreach ($dataPenerbitCoo as $key)
                                            <option
                                                value="{{ $key->nama }}" {{($dataPengadaan->penerbit_coo == $key->nama) ?"selected":''}}>
                                                {{ $key->nama}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="m-form__help"></span>
                                </div>
                                <div class="col-lg-6">
                                    <label>
                                        Melampirkan Sertifikat Garansi
                                    </label>
                                    <select class="form-control melampirkan_sertifikat" id="melampirkan_sertifikat"
                                            name="melampirkan_sertifikat">
                                        <option value="">Pilih</option>
                                        <option
                                            value="Ya" {{($dataPengadaan->melampirkan_sertifikat == 'Ya') ?"selected":''}}>
                                            Ya
                                        </option>
                                        <option
                                            value="Tidak" {{($dataPengadaan->melampirkan_sertifikat == 'Tidak') ?"selected":''}}>
                                            Tidak
                                        </option>

                                    </select>
                                    <span class="m-form__help">`</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>
                                        Penerbit Sertifikat Garansi
                                    </label>
                                    <select class="form-control penerbit_garansi" id="penerbit_garansi"
                                            name="penerbit_garansi">
                                        @foreach ($dataPenerbitGaransi as $key)
                                            <option
                                                value="{{ $key->nama }}" {{($dataPengadaan->penerbit_garansi == $key->nama) ?"selected":''}}>
                                                {{ $key->nama}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="m-form__help"></span>
                                </div>
                                <div class="col-lg-6">
                                    <label>
                                        Melampirkan MSDS
                                    </label>
                                    <select class="form-control melampirkan_msds" id="melampirkan_msds"
                                            name="melampirkan_msds">
                                        <option value="">Pilih</option>
                                        <option
                                            value="Ya" {{($dataPengadaan->melampirkan_msds == 'Ya') ?"selected":''}}>
                                            Ya
                                        </option>
                                        <option
                                            value="Tidak" {{($dataPengadaan->melampirkan_msds == 'Tidak') ?"selected":''}}>
                                            Tidak
                                        </option>

                                    </select>
                                    <span class="m-form__help">`</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>
                                        Sistem Denda
                                    </label>
                                    <select class="form-control sistem_denda" id="sistem_denda" name="sistem_denda">
                                        @foreach ($dataSistemDenda as $key)
                                            <option
                                                value="{{ $key->nama }}" {{($dataPengadaan->sistem_denda == $key->nama) ?"selected":''}}>
                                                {{ $key->nama}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="m-form__help"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <a href="{!!url('user/jobcard/download-pjBarang/')!!}"
                               class="btn btn-brand btn-sm">
                                Download SPK Barang
                            </a>
                            <a href="{!!url('user/jobcard/download-daftarKuantitas/')!!}"
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
    @include('pages.user.job-card.spbj.jsUpdate')
    @include('pages.user.job-card.spbj.jsUpdatePilihanHari')
@endsection

