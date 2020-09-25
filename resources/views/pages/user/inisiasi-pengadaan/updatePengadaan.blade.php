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
                        <input type="hidden" value="{{$dataPengadaan->id}}" class="form-control m-input" id="id"
                               name="id"
                               placeholder="Masukan Judul">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>
                                    Judul:
                                </label>
                                <input type="text" value="{{$dataPengadaan->judul}}" class="form-control m-input"
                                       id="judul" name="judul"
                                       placeholder="Masukan Judul">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    Tahun:
                                </label>
                                <input type="text" value="{{$dataPengadaan->tahun}}" class="form-control m-input"
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
                                    type='text' class="form-control  m-input" readonly
                                    placeholder="Tanggal Di Terima Panitia"/>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Bagian:
                                </label>
                                <input value="{{$dataPengadaan->bagian}}" type="text" class="form-control m-input"
                                       id="bagian" name="bagian"
                                       placeholder="Masukan Bagian">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    Fungsi Pembangkit:
                                </label>
                                <input value="{{$dataPengadaan->fungsi_pembangkit}}" type="text"
                                       class="form-control m-input" id="fungsi_pembangkit"
                                       name="fungsi_pembangkit" placeholder="Masukan Fungsi Pembangkit">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    No Undang PL:
                                </label>
                                <input value="{{$dataPengadaan->no_undang_pl}}" type="text" class="form-control m-input"
                                       id="no_undang_pl" name="no_undang_pl"
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
                                    Metode Pengadaan:
                                </label>
                                <input value="{{$dataPengadaan->metode_pengadaan}}" type="text"
                                       class="form-control m-input" id="metode_pengadaan"
                                       name="metode_pengadaan" placeholder="Masukan Metode pengadaan">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Jenis Kontrak:
                                </label>
                                <input value="{{$dataPengadaan->jenis_kontrak}}" type="text"
                                       class="form-control m-input" id="jenis_kontrak" name="jenis_kontrak"
                                       placeholder="Masukan Jenis Kontrak">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Rencana:
                                </label>
                                <input value="{{$dataPengadaan->rencana}}" type="text" class="form-control m-input"
                                       id="rencana" name="rencana"
                                       placeholder="Masukan Rencana ">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Tempat Penyerahan:
                                </label>
                                <input value="{{$dataPengadaan->tempat_penyerahan}}" type="text"
                                       class="form-control m-input" id="tempat_penyerahan"
                                       name="tempat_penyerahan" placeholder="Masukan Tempat Penyerahan">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Masa Berlaku Surat:
                                </label>
                                <input value="{{$dataPengadaan->masa_berlaku_surat}}" type="text"
                                       class="form-control m-input" id="masa_berlaku_surat"
                                       name="masa_berlaku_surat" placeholder="Masukan  Masa Berlaku Surat">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Cara Pembayaran:
                                </label>
                                <input value="{{$dataPengadaan->cara_pembayaran}}" type="text"
                                       class="form-control m-input" id="cara_pembayaran"
                                       name="cara_pembayaran" placeholder="Masukan Cara Pembayaran">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Jenis Perjanjian:
                                </label>
                                <input value="{{$dataPengadaan->jenis_perjanjian}}" type="text"
                                       class="form-control m-input" id="jenis_perjanjian"
                                       name="jenis_perjanjian" placeholder="Masukan Jenis Perjanjian">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Sumber Dana:
                                </label>
                                <input value="{{$dataPengadaan->sumber_dana}}" type="text" class="form-control m-input"
                                       id="sumber_dana" name="sumber_dana"
                                       placeholder="Masukan ">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Masa Garansi:
                                </label>
                                <input value="{{$dataPengadaan->masa_garansi}}" type="text" class="form-control m-input"
                                       id="masa_garansi" name="masa_garansi"
                                       placeholder="Masukan ">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Syarat Bidang:
                                </label>
                                <input value="{{$dataPengadaan->syarat_bidang}}" type="text"
                                       class="form-control m-input" id="syarat_bidang" name="syarat_bidang"
                                       placeholder="Masukan Syarat Bidang">
                                <span class="m-form__help"></span>
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>
                                    VFMC:
                                </label>
                                <input value="{{$dataPengadaan->vfmc}}" type="text" class="form-control m-input"
                                       id="vfmc" name="vfmc"
                                       placeholder="Masukan VFMC">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Pengguna:
                                </label>
                                <input value="{{$dataPengadaan->pengguna}}" type="text" class="form-control m-input"
                                       id="pengguna" name="pengguna"
                                       placeholder="Masukan Pengguna">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Nip:
                                </label>
                                <input value="{{$dataPengadaan->nip}}" type="text" class="form-control m-input" id="nip"
                                       name="nip"
                                       placeholder="Masukan Nip">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Pejabat Pelaksana:
                                </label>
                                <input value="{{$dataPengadaan->pejabat_pelaksana}}" type="text"
                                       class="form-control m-input" id="pejabat_pelaksana"
                                       name="pejabat_pelaksana"
                                       placeholder="Masukan Pejabat Pelaksana">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Direksi:
                                </label>
                                <input value="{{$dataPengadaan->direksi}}" type="text" class="form-control m-input"
                                       id="direksi" name="direksi"
                                       placeholder="Masukan Direksi">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Pengawas:
                                </label>
                                <input value="{{$dataPengadaan->pengawas}}" type="text" class="form-control m-input"
                                       id="pengawas" name="pengawas"
                                       placeholder="Masukan Pengawas">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Ketua Tim:
                                </label>
                                <input value="{{$dataPengadaan->ketua_tim}}" type="text" class="form-control m-input"
                                       id="ketua_tim" name="ketua_tim"
                                       placeholder="Masukan Ketua Tim">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    PIC Pelaksana:
                                </label>
                                <input value="{{$dataPengadaan->pic_pelaksana}}" type="text"
                                       class="form-control m-input" id="pic_pelaksana" name="pic_pelaksana"
                                       placeholder="Masukan PIC Pelaksana">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Proses Dokumen:
                                </label>
                                <input value="{{$dataPengadaan->proses_dokumen}}" type="text"
                                       class="form-control m-input" id="proses_dokumen"
                                       name="proses_dokumen"
                                       placeholder="Masukan Proses Dokumen">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Nomor:
                                </label>
                                <input value="{{$dataPengadaan->nomor}}" type="text" class="form-control m-input"
                                       id="nomor" name="nomor"
                                       placeholder="Masukan Nomor">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Jumlah Hari:
                                </label>
                                <input value="{{$dataPengadaan->jumlah_hari}}" type="text" class="form-control m-input"
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
                                    type='text' class="form-control  m-input" readonly
                                    placeholder="Tanggal"/>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Hari:
                                </label>
                                <input value="{{$dataPengadaan->hari}}" type="text" class="form-control m-input"
                                       id="hari" name="hari"
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
                                <input value="{{$dataPengadaan->no_proses_pengadaan}}" type="text"
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
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->no_proses_pengadaan}}" type="text" id="nppv1"
                                       name="nppv1" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                <input type="text" class="form-control m-input survey_harga_pasar_jumlah"
                                       name="survey_harga_pasar_jumlah"
                                       id="survey_harga_pasar_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->survei_harga_pasar_tgl}}"
                                       name="survey_harga_pasar_tgl"
                                       id="survey_harga_pasar_tgl"
                                       type='text' class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->survei_harga_pasar_hari}}"
                                       name="survey_harga_pasar_hari"
                                       id="survey_harga_pasar_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->survei_harga_pasar_tgl != null)
                                <div class="col-lg-3">
                                    <button class="btn btn-info btn-sm">Download</button>
                                </div>
                            @endif
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                HPS:
                            </label>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->no_proses_pengadaan}}" type="text" id="nppv2"
                                       name="nppv2" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                {{--                                <input type="hidden" class="form-control m-input hps_jumlah_temp"--}}
                                {{--                                       name="hps_jumlah_temp"--}}
                                {{--                                       value="0"--}}
                                {{--                                       id="hps_jumlah_temp" placeholder="Jumlah">--}}
                                <input type="text" class="form-control m-input hps_jumlah"
                                       name="hps_jumlah"
                                       id="hps_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->hps_tgl}}"
                                       name="hps_tgl"
                                       id="hps_tgl"
                                       type='text' class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->hps_hari}}" name="hps_hari"
                                       id="hps_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->hps_tgl != null)
                                <div class="col-lg-3">
                                    <button class="btn btn-info btn-sm">Download</button>
                                </div>
                            @endif
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Undangan Pengadaan Langsung:
                            </label>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->no_proses_pengadaan}}" type="text" id="nppv3"
                                       name="nppv3" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->undangan_pengadaan_langsung_jumlah}}" type="text"
                                       class="form-control m-input undangan_pengadaan_langsung_jumlah"
                                       name="undangan_pengadaan_langsung_jumlah"
                                       id="undangan_pengadaan_langsung_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->undangan_pengadaan_langsung_tgl}}"
                                       name="undangan_pengadaan_langsung_tgl"
                                       id="undangan_pengadaan_langsung_tgl"
                                       type='text' class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->undangan_pengadaan_langsung_hari}}"
                                       name="undangan_pengadaan_langsung_hari"
                                       id="undangan_pengadaan_langsung_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->undangan_pengadaan_langsung_tgl != null)
                                <div class="col-lg-3">
                                    <button class="btn btn-info btn-sm">Download</button>
                                </div>
                            @endif
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Pemasukan Dok. Penawaran:
                            </label>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->no_proses_pengadaan}}" type="text" id="nppv4"
                                       name="nppv4" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->pemasukan_dok_penawaran_jumlah}}" type="text"
                                       class="form-control m-input"
                                       name="pemasukan_dok_penawaran_jumlah"
                                       id="pemasukan_dok_penawaran_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->pemasukan_dok_penawaran_tgl}}"
                                       name="pemasukan_dok_penawaran_tgl"
                                       id="pemasukan_dok_penawaran_tgl"
                                       type='text' class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->pemasukan_dok_penawaran_hari}}"
                                       name="pemasukan_dok_penawaran_hari"
                                       id="pemasukan_dok_penawaran_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->pemasukan_dok_penawaran_tgl != null)
                                <div class="col-lg-3">
                                    <button class="btn btn-info btn-sm">Download</button>
                                </div>
                            @endif
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Evaluasi Dokumen:
                            </label>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->no_proses_pengadaan}}" type="text" id="nppv5"
                                       name="nppv5" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->evaluasi_dokumen_jumlah}}" type="text"
                                       class="form-control m-input"
                                       name="evaluasi_dokumen_jumlah"
                                       id="evaluasi_dokumen_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->evaluasi_dokumen_tgl}}"
                                       name="evaluasi_dokumen_tgl"
                                       id="evaluasi_dokumen_tgl"
                                       type='text' class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->evaluasi_dokumen_hari}}" name="evaluasi_dokumen_hari"
                                       id="evaluasi_dokumen_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->evaluasi_dokumen_tgl != null)
                                <div class="col-lg-3">
                                    <button class="btn btn-info btn-sm">Download</button>
                                </div>
                            @endif
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                BA Hasil Klarifikasi:
                            </label>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->no_proses_pengadaan}}" type="text" id="nppv6"
                                       name="nppv6" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->ba_hasil_klarifikasi_jumlah}}" type="text"
                                       class="form-control m-input"
                                       name="ba_hasil_klarifikasi_jumlah"
                                       id="ba_hasil_klarifikasi_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->ba_hasil_klarifikasi_tgl}}"
                                       name="ba_hasil_klarifikasi_tgl"
                                       id="ba_hasil_klarifikasi_tgl"
                                       type='text' class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->ba_hasil_klarifikasi_hari}}"
                                       name="ba_hasil_klarifikasi_hari"
                                       id="ba_hasil_klarifikasi_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->ba_hasil_klarifikasi_tgl != null)
                                <div class="col-lg-3">
                                    <button class="btn btn-info btn-sm">Download</button>
                                </div>
                            @endif
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                BA Hasil Pengadaan Langsung:
                            </label>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->no_proses_pengadaan}}" type="text" id="nppv7"
                                       name="nppv7" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->ba_hasil_pengadaan_langsung_jumlah}}" type="text"
                                       class="form-control m-input"
                                       name="ba_hasil_pengadaan_langsung_jumlah"
                                       id="ba_hasil_pengadaan_langsung" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->ba_hasil_pengadaan_langsung_tgl}}"
                                       name="ba_hasil_pengadaan_langsung_tgl"
                                       id="ba_hasil_pengadaan_langsung_tgl"
                                       type='text' class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->ba_hasil_pengadaan_langsung_hari}}"
                                       name="ba_hasil_pengadaan_langsung_hari"
                                       id="ba_hasil_pengadaan_langsung_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->ba_hasil_pengadaan_langsung_tgl != null)
                                <div class="col-lg-3">
                                    <button class="btn btn-info btn-sm">Download</button>
                                </div>
                            @endif
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                ND Usulan Tetap Pemenang:
                            </label>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->no_proses_pengadaan}}" type="text" id="nppv8"
                                       name="nppv8" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->nd_usulan_tetap_pemenang_jumlah}}" type="text"
                                       class="form-control m-input"
                                       name="nd_usulan_tetap_pemenang_jumlah"
                                       id="nd_usulan_tetap_pemenang_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->nd_usulan_tetap_pemenang_tgl}}"
                                       name="nd_usulan_tetap_pemenang_tgl"
                                       id="nd_usulan_tetap_pemenang_tgl"
                                       type='text' class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->nd_usulan_tetap_pemenang_hari}}"
                                       name="nd_usulan_tetap_pemenang_hari"
                                       id="nd_usulan_tetap_pemenang_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->nd_usulan_tetap_pemenang_tgl != null)
                                <div class="col-lg-3">
                                    <button class="btn btn-info btn-sm">Download</button>
                                </div>
                            @endif
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                ND Penetapan Pemenang:
                            </label>
                            <div class="col-lg-1">
                                <input value="{{$dataPengadaan->no_proses_pengadaan}}" type="text" id="nppv9"
                                       name="nppv9" class="form-control m-input">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->nd_penetapan_pemenang_jumlah}}" type="text"
                                       class="form-control m-input"
                                       name="nd_penetapan_pemenang_jumlah"
                                       id="nd_penetapan_pemenang_jumlah" placeholder="Jumlah">
                                <span class="m-form__help "></span>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->nd_penetapan_pemenang_tgl}}"
                                       name="nd_penetapan_pemenang_tgl"
                                       id="nd_penetapan_pemenang_tgl"
                                       type='text' class="form-control" readonly placeholder="Tanggal"/>
                            </div>
                            <div class="col-lg-2">
                                <input value="{{$dataPengadaan->nd_penetapan_pemenang_hari}}"
                                       name="nd_penetapan_pemenang_hari"
                                       id="nd_penetapan_pemenang_hari"
                                       type="text" class="form-control m-input" placeholder="Hari">
                                <span class="m-form__help"></span>
                            </div>
                            @if($dataPengadaan->nd_penetapan_pemenang_tgl != null)
                                <div class="col-lg-3">
                                    <button class="btn btn-info btn-sm">Download</button>
                                </div>
                            @endif
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

            var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];


            $("#tanggal_diterima_panitia,#tanggal,#nd_penetapan_pemenang_tgl,#nd_usulan_tetap_pemenang_tgl,#ba_hasil_pengadaan_langsung_tgl,#survey_harga_pasar_tgl, #hps_tgl, #undangan_pengadaan_langsung_tgl,#pemasukan_dok_penawaran_tgl,#evaluasi_dokumen_tgl,#ba_hasil_klarifikasi_tgl").datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: !0,
                orientation: "bottom left",
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                },
            });

            $('#nd_penetapan_pemenang_tgl,#nd_usulan_tetap_pemenang_tgl,#ba_hasil_pengadaan_langsung_tgl,#survey_harga_pasar_tgl, #hps_tgl, #undangan_pengadaan_langsung_tgl,#pemasukan_dok_penawaran_tgl,#evaluasi_dokumen_tgl,#ba_hasil_klarifikasi_tgl').change(function () {

                var a = $('#survey_harga_pasar_tgl').val()
                var b = $('#hps_tgl').val()
                var c = $('#undangan_pengadaan_langsung_tgl').val()
                var d = $('#pemasukan_dok_penawaran_tgl').val()
                var e = $('#evaluasi_dokumen_tgl').val()
                var f = $('#ba_hasil_klarifikasi_tgl').val()
                var g = $('#ba_hasil_pengadaan_langsung_tgl').val()
                var h = $('#nd_usulan_tetap_pemenang_tgl').val()
                var i = $('#nd_penetapan_pemenang_tgl').val()

                var getTanggal1 = new Date(a)
                var getTanggal2 = new Date(b)
                var getTanggal3 = new Date(c)
                var getTanggal4 = new Date(d)
                var getTanggal5 = new Date(e)
                var getTanggal6 = new Date(f)
                var getTanggal7 = new Date(g)
                var getTanggal8 = new Date(h)
                var getTanggal9 = new Date(i)

                $('#survey_harga_pasar_hari').val(hari[getTanggal1.getDay()])
                $('#hps_hari').val(hari[getTanggal2.getDay()])
                $('#undangan_pengadaan_langsung_hari').val(hari[getTanggal3.getDay()])
                $('#pemasukan_dok_penawaran_hari').val(hari[getTanggal4.getDay()])
                $('#evaluasi_dokumen_hari').val(hari[getTanggal5.getDay()])
                $('#ba_hasil_klarifikasi_hari').val(hari[getTanggal6.getDay()])
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[getTanggal7.getDay()])
                $('#nd_usulan_tetap_pemenang_hari').val(hari[getTanggal8.getDay()])
                $('#nd_penetapan_pemenang_hari').val(hari[getTanggal9.getDay()])
            });


            // $( '#survey_harga_pasar_tgl').datepicker( 'setDate', tambahTanggal );

            var $nppv1 = $('#nppv1'), $value = $('.no_proses_pengadaan');
            $value.on('input', function (e) {
                var total = 1;
                $value.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                $nppv1.val(total);
            });

            var $nppv2 = $('#nppv2'), $value = $('.no_proses_pengadaan');
            $value.on('input', function (e) {
                var total = 1;
                $value.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                $nppv2.val(total);
            });

            var $nppv3 = $('#nppv3'), $value = $('.no_proses_pengadaan');
            $value.on('input', function (e) {
                var total = 1;
                $value.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                $nppv3.val(total);
            });

            var $nppv4 = $('#nppv4'), $value = $('.no_proses_pengadaan');
            $value.on('input', function (e) {
                var total = 1;
                $value.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                $nppv4.val(total);
            });

            var $nppv5 = $('#nppv5'), $value = $('.no_proses_pengadaan');
            $value.on('input', function (e) {
                var total = 1;
                $value.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                $nppv5.val(total);
            });

            var $nppv6 = $('#nppv6'), $value = $('.no_proses_pengadaan');
            $value.on('input', function (e) {
                var total = 1;
                $value.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                $nppv6.val(total);
            });

            var $nppv7 = $('#nppv7'), $value = $('.no_proses_pengadaan');
            $value.on('input', function (e) {
                var total = 1;
                $value.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                $nppv7.val(total);
            });

            var $nppv8 = $('#nppv8'), $value = $('.no_proses_pengadaan');
            $value.on('input', function (e) {
                var total = 1;
                $value.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                $nppv8.val(total);
            });

            var $nppv9 = $('#nppv9'), $value = $('.no_proses_pengadaan');
            $value.on('input', function (e) {
                var total = 1;
                $value.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                $nppv9.val(total);
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

            $('#sample_form').on('submit', function (event) {
                event.preventDefault();
                var a = $('#survey_harga_pasar_jumlah').val()
                var b = $('#hps_jumlah').val()
                var c = $('#undangan_pengadaan_langsung_jumlah').val()
                var d = $('#pemasukan_dok_penawaran_jumlah').val()
                var e = $('#evaluasi_dokumen_jumlah').val()
                var f = $('#ba_hasil_klarifikasi_jumlah').val()
                var g = $('#ba_hasil_pengadaan_langsung_jumlah').val()
                var h = $('#nd_usulan_tetap_pemenang_jumlah').val()
                var i = $('#nd_penetapan_pemenang_jumlah').val()

                var tgla = $('#survey_harga_pasar_tgl').val()
                var tglb = $('#hps_tgl').val()
                var tglc = $('#undangan_pengadaan_langsung_tgl').val()
                var tgld = $('#pemasukan_dok_penawaran_tgl').val()
                var tgle = $('#evaluasi_dokumen_tgl').val()
                var tglf = $('#ba_hasil_klarifikasi_tgl').val()
                var tglg = $('#ba_hasil_pengadaan_langsung_tgl').val()
                var tglh = $('#nd_usulan_tetap_pemenang_tgl').val()
                var tgli = $('#nd_penetapan_pemenang_tgl').val()

                var getTanggal1 = new Date(tgla)
                var getTanggal2 = new Date(tglb)
                var getTanggal3 = new Date(tglc)
                var getTanggal4 = new Date(tgld)
                var getTanggal5 = new Date(tgle)
                var getTanggal6 = new Date(tglf)
                var getTanggal7 = new Date(tglg)
                var getTanggal8 = new Date(tglh)
                var getTanggal9 = new Date(tgli)

                var getFull1 = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate())
                var getFull2 = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate())
                var getFull3 = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate())
                var getFull4 = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate())
                var getFull5 = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate())
                var getFull6 = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate())
                var getFull7 = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate())
                var getFull8 = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate())
                var getFull9 = new Date(getTanggal9.getFullYear(), getTanggal9.getMonth(), getTanggal9.getDate())

                if (a != 0)
                    $('#survey_harga_pasar_tgl').datepicker('setDate', getFull1);
                if (b != 0)
                    $('#hps_tgl').datepicker('setDate', getFull2);
                if (c != 0)
                    $('#undangan_pengadaan_langsung_tgl').datepicker('setDate', getFull3);
                if (d != 0)
                    $('#pemasukan_dok_penawaran_tgl').datepicker('setDate', getFull4);
                if (e != 0)
                    $('#evaluasi_dokumen_tgl').datepicker('setDate', getFull5);
                if (f != 0)
                    $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', getFull6);
                if (g != 0)
                    $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', getFull7);
                if (h != 0)
                    $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', getFull8);
                if (i != 0)
                    $('#nd_penetapan_pemenang_tgl').datepicker('setDate', getFull9);


                $('#survey_harga_pasar_hari').val(hari[getTanggal1.getDay()])
                $('#hps_hari').val(hari[getTanggal2.getDay()])
                $('#undangan_pengadaan_langsung_hari').val(hari[getTanggal3.getDay()])
                $('#pemasukan_dok_penawaran_hari').val(hari[getTanggal4.getDay()])
                $('#evaluasi_dokumen_hari').val(hari[getTanggal5.getDay()])
                $('#ba_hasil_klarifikasi_hari').val(hari[getTanggal6.getDay()])
                $('#ba_hasil_pengadaan_langsung_hari').val(hari[getTanggal7.getDay()])
                $('#nd_usulan_tetap_pemenang_hari').val(hari[getTanggal8.getDay()])
                $('#nd_penetapan_pemenang_hari').val(hari[getTanggal9.getDay()])


                if ($('#action').val() == 'Add') {
                    $.ajax({
                        url: "{{ route('inisiasi-pengadaan.update') }}",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
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
    </script>
@endsection

