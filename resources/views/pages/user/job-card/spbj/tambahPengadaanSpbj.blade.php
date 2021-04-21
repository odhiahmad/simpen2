@section('title','SPBJ | Tambah')
@extends('../../../../../../main')
@section('content')
    <div>
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Tambah Pengadaan
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
                                    SPBJ
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href='#' class="m-nav__link">
                                <span class="m-nav__link-text">
                                    Tambah Barang
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
                                <input type="text" class="form-control m-input" id="no_proses" name="no_proses"
                                       placeholder="Masukan Nomor Proses">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    No RKS/PBJ:
                                </label>
                                <input type="text" class="form-control m-input" id="no_nota_dinas" name="no_nota_dinas"
                                       placeholder="Masukan Nomor Nota Dinas">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    No PJ:
                                </label>
                                <input type="text" class="form-control m-input" id="no_prk" name="no_prk"
                                       placeholder="Masukan Nomor PRK">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    Judul:
                                </label>
                                <input type="text" class="form-control m-input" id="judul" name="judul"
                                       placeholder="Masukan Judul">
                                <span class="m-form__help"></span></div>
                            <div class="col-lg-6">
                                <label>
                                    Tanggal di Terima PBJ:
                                </label>
                                <input
                                    name="tanggal_diterima_panitia"
                                    id="tanggal_diterima_panitia"
                                    type='text' class="form-control  m-input tanggal_diterima_panitia" readonly
                                    placeholder="Tanggal Di Terima Panitia"/>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Tanggal Nota Dinas:
                                </label>
                                <input
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
                                    name="tanggal_mulai"
                                    id="tanggal_mulai"
                                    type='text' class="form-control  m-input tanggal_mulai" readonly
                                    placeholder="Tanggal Mulai"/>
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Fungsi Pembangkit / Sarana
                                </label>
                                <select class="form-control fungsi_pembangkit" id="fungsi_pembangkit"
                                        name="fungsi_pembangkit">
                                    <option value="">
                                        Pilih Fungsi
                                    </option>
                                    @foreach ($dataFungsiPembangkit as $key)
                                        <option value="{{ $key->nama }}">
                                            {{ $key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help">`</span>
                            </div>
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
                                        <option value="{{ $key->id }}">
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
                                    <option>
                                        Pilih Metode Pengadaan
                                    </option>
                                </select>
                                <span class="m-form__help">`</span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Metode Pengadaan Jenis 2
                                </label>
                                <select class="form-control metode_pengadaan_jenis2"
                                        id="metode_pengadaan_jenis2"
                                        name="metode_pengadaan_jenis2">
                                    <option>
                                        Pilih Metode Pengadaan
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
                                    <option>
                                        Pilih Metode Pengadaan
                                    </option>
                                </select>
                                <span class="m-form__help">`</span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Metode Pengadaan Jenis 4
                                </label>
                                <select class="form-control metode_pengadaan_jenis4"
                                        id="metode_pengadaan_jenis4"
                                        name="metode_pengadaan_jenis4">
                                    <option>
                                        Pilih Metode Pengadaan
                                    </option>
                                </select>
                                <span class="m-form__help">`</span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    POS Anggaran
                                </label>
                                <select class="form-control pos_anggaran" id="pos_anggaran" name="pos_anggaran">
                                    @foreach ($dataPosAnggaran as $key)
                                        <option value="{{ $key->nama }}">
                                            {{ $key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help"></span>
                            </div>

                            <div class="col-lg-6">
                                <label>
                                    PIC Pelaksana
                                </label>
                                <select class="form-control" id="pic_pelaksana" name="pic_pelaksana">
                                    @foreach ($dataPicPelaksana as $key)
                                        <option value="{{ $key->nama }}">
                                            {{ $key->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="m-form__help"></span>
                            </div>


                            <div class="col-lg-6">
                                <label>
                                    RAB:
                                </label>
                                <input type="text" value="0" class="form-control m-input" id="rab" name="rab"
                                       placeholder="Masukan RAB">
                                <span class="m-form__help"></span>
                            </div>
                            <div class="col-lg-6">
                                <label>
                                    Status
                                </label>
                                <select class="form-control status" id="status" name="status">
                                    @foreach ($dataStatus as $key)
                                        <option value="{{ $key->nama }}">
                                            {{ $key->nama}}
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
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            $('.metode_pengadaan_jenis2').prop('disabled', true);
            $('.metode_pengadaan_jenis3').prop('disabled', true);
            $('.metode_pengadaan_jenis4').prop('disabled', true);
            // $("#rab,#sisa_anggaran,#nilai_kontrak,#harga_penawaran,#nilai_jaminan").autoNumeric()
            $('.dynamic').change(function () {
                if ($(this).val() != '') {

                    if ($(this).val() != 1) {
                        $('.metode_pengadaan_jenis2').prop('disabled', true);
                        $('.metode_pengadaan_jenis3').prop('disabled', true);
                        $('.metode_pengadaan_jenis4').prop('disabled', true);
                    } else {
                        $('.metode_pengadaan_jenis2').prop('disabled', false);
                        $('.metode_pengadaan_jenis3').prop('disabled', false);
                        $('.metode_pengadaan_jenis4').prop('disabled', false);
                    }
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent')
                    var _token = $('input[name="_token"]').val()

                    $.ajax({
                        url: "{{route('jobcard.pj.fetch')}}",
                        method: "POST",
                        data: {select: select, value: value, _token: _token, dependent: dependent},
                        success: function (result) {

                            $('.metode_pengadaan_jenis1').html(result)
                            $('.metode_pengadaan_jenis2').html('')
                            $('.metode_pengadaan_jenis3').html('')
                            $('.metode_pengadaan_jenis4').html('')
                        }
                    })
                }
            })

            $('.metode_pengadaan_jenis1').change(function () {
                if ($(this).val() != '') {

                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent')
                    var _token = $('input[name="_token"]').val()

                    $.ajax({
                        url: "{{route('jobcard.pj.fetchJenis1')}}",
                        method: "POST",
                        data: {select: select, value: value, _token: _token, dependent: dependent},
                        success: function (result) {

                            $('.metode_pengadaan_jenis2').html(result)
                            $('.metode_pengadaan_jenis3').html('')
                            $('.metode_pengadaan_jenis4').html('')
                        }
                    })
                }
            })

            $('.metode_pengadaan_jenis2').change(function () {
                if ($(this).val() != '') {

                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent')
                    var _token = $('input[name="_token"]').val()

                    $.ajax({
                        url: "{{route('jobcard.pj.fetch')}}",
                        method: "POST",
                        data: {select: select, value: value, _token: _token, dependent: dependent},
                        success: function (result) {

                            $('.metode_pengadaan_jenis3').html(result)
                            $('.metode_pengadaan_jenis4').html('')
                        }
                    })
                }
            })

            $('.metode_pengadaan_jenis3').change(function () {
                if ($(this).val() != '') {

                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent')
                    var _token = $('input[name="_token"]').val()

                    $.ajax({
                        url: "{{route('jobcard.pj.fetch')}}",
                        method: "POST",
                        data: {select: select, value: value, _token: _token, dependent: dependent},
                        success: function (result) {
                            if(result === '<option> Pilih </option>'){
                                $('.metode_pengadaan_jenis4').prop('disabled', true);
                            }else{
                                $('.metode_pengadaan_jenis4').html(result)
                            }

                        }
                    })
                }
            })
            // $("#rab").inputmask("Rp 999.999.999", {numericInput: !0})


            $("#status,#fungsi_pembangkit,#metode_pengadaan, #metode_pengadaan_jenis1,#metode_pengadaan_jenis2,#pos_anggaran,#pic_pelaksana,#metode_pengadaan_jenis2,#metode_pengadaan_jenis3,#metode_pengadaan_jenis4").select2({
                placeholder: "Pilih",
            });


            $("#tanggal_mulai,#tanggal_nota_dinas,#tanggal_diterima_panitia").datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: !0,
                orientation: "bottom left",
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                },
            });


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
                if ($('#action').val() == 'Add') {
                    $.ajax({
                        url: "{{ route('jobcard.spbj.insert') }}",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
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
                                $('#sample_form')[0].reset();

                            }


                        }
                    });

                }
            });
        });
    </script>
@endsection

