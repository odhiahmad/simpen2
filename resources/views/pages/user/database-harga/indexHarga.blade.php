@section('title','Database Harga')
@extends('../../../main')
@section('content')
    <div>
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Daftar Harga Produk
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
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">
                                    Database Harga
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-4">
                            <div class="m-input-icon m-input-icon--left">
                                <select class="form-control m-select2" id="m_select2_6" name="param">

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <button
                        class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill tambah">
									<span>
										<i class="la la-cart-plus"></i>
										<span>
											Produk Baru
										</span>
									</span>
                    </button>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>
        <div class="m-content">
            @if (count($databaseHarga) > 0)
                <section class="databaseHarga">
                    <div class="row">
                        @foreach($databaseHarga as $data)
                            <div class="col-xl-3">
                                <!--begin:: Widgets/Blog-->
                                <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                                    <div class="m-portlet__head m-portlet__head--fit">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-action">
                                                <button type="button" class="btn btn-sm m-btn--pill  btn-brand">
                                                    Barang
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div class="m-widget19">
                                            <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides"
                                                 style="min-height-: 286px">

                                                <img src="{{asset('data-barang/foto/'.$data->foto)}}" alt="">
                                                <div class="m-widget19__shadow"></div>
                                            </div>
                                            <div class="m-widget19__content">
                                                <div class="m-widget19__header">
                                                    <div class="m-widget19__info">
                                    <span class="m-widget19__username">
                                       {{$data->nama_barang }}
                                    </span>
                                                        <br>
                                                        <span class="m-widget19__time">
                                        	Rp.@convert($data->harga_satuan)
                                    </span>
                                                    </div>
                                                    <div class="m-widget19__stats">
                                    <span class="m-widget19__number m--font-brand">
                                        {{$data->jumlah }}
                                    </span>
                                                        <span class="m-widget19__comment">
                                        
                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget19__action">
                                                <a href='{!! url('user/database-harga/detail/'.$data->id); !!}'
                                                   type="button"
                                                   class="btn m-btn--pill btn-primary m-btn m-btn--hover-brand m-btn--custom">
                                                    Detail
                                                </a>
                                                <a href='{!! url('user/database-harga/ubah/'.$data->id); !!}'
                                                   type="button"
                                                   class="btn m-btn--pill btn-danger m-btn m-btn--hover-brand m-btn--custom ">
                                                    Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {!! $databaseHarga->render() !!}
                </section>
            @else
                No data found :(
            @endif

        </div>
        <div class="modal fade" tabindex="-1" id="tambahModal" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Tambah Produk Baru
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="form_result"></span>
                        <form method="post" id="sample_form" enctype="multipart/form-data">
                            @csrf
                            <div class="m-form m-form--fit m-form--label-align-right">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">
                                            Nama Barang
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control m-input" id="namaBarang"
                                                   name="namaBarang"
                                                   placeholder="Masukan Nama Barang">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">
                                            Satuan Barang
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control m-input" id="satuanBarang"
                                                   name="satuanBarang"
                                                   placeholder="Masukan Satuan Barang">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">
                                            Harga Satuan
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control m-input value" id="hargaSatuan"
                                                   name="hargaSatuan"
                                                   placeholder="Masukan Harga Satuan Barang">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">
                                            Spesifikasi
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control m-input" id="spesifikasi"
                                                   name="spesifikasi"
                                                   placeholder="Masukan Satuan Barang">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">
                                            Sertifikat
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control" id="sertifikat"
                                                   name="sertifikat">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">
                                            Upload Foto Database Harga
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="file" class="form-control" id="foto"
                                                   name="foto">
                                        </div>
                                    </div>
                                    {{--                            <div class="form-group m-form__group">--}}

                                    {{--                                <div class="row">--}}
                                    {{--                                    <div class="col-lg-3 col-sm-12">--}}

                                    {{--                                    </div>--}}
                                    {{--                                    <div class="col-lg-12 col-md-9 col-sm-12">--}}
                                    {{--                                        <input type="file" id="foto" name="foto" class="form-control custom-file-input">--}}
                                    {{--                                        <span class="custom-file-control"></span>--}}

                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}

                                    {{--                            </div>--}}
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions m-form__actions">
                                        <div class="row">
                                            <div class="col-lg-9 ml-lg-auto">
                                                <input type="hidden" name="action" id="action" value="Add"/>
                                                <input type="submit" value="Submit" name="action_button"
                                                       id="action_button"
                                                       class="btn btn-success">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
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
        </div>
    </div>
    <script type="text/javascript">

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

        $(document).ready(function () {


            var $total = $('#total'),
                $value = $('.value');
            $value.on('input', function (e) {
                var total = 1;
                $value.each(function (index, elem) {
                    if (!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                $total.val(total);
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
                if ($('#action').val() == 'Add') {
                    $.ajax({
                        url: "{{ route('databaseHarga.insert') }}",
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
                                $('#sample_form')[0].reset();

                            }


                        }
                    });

                }
            });
        });

        $(document).ready(function () {
            $(document).on('click', '.tambah', function () {
                user_id = $(this).attr('id');
                $('#tambahModal').modal('show');
            });
        });

        $('#ok_button').click(function () {
            $.ajax({
                url: "/user/database-harga/destroy/" + user_id,
                beforeSend: function () {
                    $('#ok_button').text('Deleting...');
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#confirmModal').modal('hide');
                        toastr.success(data.success)
                    }, 2000);
                }
            })
        });

        $(function () {
            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();
                $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />');
                var url = $(this).attr('href');
                window.history.pushState("", "", url);
                loadBooks(url);
            });

            function loadBooks(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('.databaseHarga').html(data);
                }).fail(function () {
                    console.log("Failed to load data!");
                });
            }
        });

        $('#m_select2_6').select2({}).on("select2-selecting", function (e) {
            console.log('not working');
        });
        var Select2 = function () {
            var e = function () {
                $("#m_select2_6").select2({
                    placeholder: "Cari Barang",
                    allowClear: !0,
                    ajax: {
                        url: "{{ route('databaseHarga.cari') }}",
                        dataType: "json",
                        delay: 250,
                        processResults: function (data) {
                            return {
                                results: $.map(data.data, function (item) {
                                    return {
                                        text: item.nama_barang,
                                        id: item.id
                                    }
                                })
                            };
                        },
                    },

                    cache: true
                });

                $('#m_select2_6').on('select2:select', function (e) {
                    var data = e.params.data;
                    window.location.href = 'detail/'+data.id;
                });

            }
            return {
                init: function () {
                    e()
                }
            }
        }();
        jQuery(document).ready(function () {
            Select2.init()

        });


    </script>
@endsection

