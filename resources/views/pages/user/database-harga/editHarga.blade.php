@section('title','Database Harga | Edit Harga')
@extends('../../../main')
@section('content')

    <div>
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Ubah Database Harga {{$databaseHarga->nama_barang}}
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
                             <a href='{!! url('user/database-harga/index'); !!}' class="m-nav__link">
                                <span class="m-nav__link-text">
                                    Data Kontrak
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">
                                    Edit Database Harga
                                </span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="m-content">
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control m-input" value="{{$databaseHarga->id}}" id="id" name="id"
                           placeholder="Masukan Nama Barang">
                    <div class="m-form m-form--fit m-form--label-align-right">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Nama Barang
                                </label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input" value="{{$databaseHarga->nama_barang}}" id="namaBarang" name="namaBarang"
                                           placeholder="Masukan Nama Barang">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Jenis Barang
                                </label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input" value="{{$databaseHarga->jenis}}" id="jenisBarang" name="jenisBarang"
                                           placeholder="Masukan Jenis Barang">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Satuan Barang
                                </label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input" value="{{$databaseHarga->satuan}}" id="satuanBarang"
                                           name="satuanBarang"
                                           placeholder="Masukan Satuan Barang">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Jumlah Barang
                                </label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input value" value="{{$databaseHarga->jumlah}}" id="jumlahBarang"
                                           name="jumlahBarang"
                                           placeholder="Masukan Jumlah Barang">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Harga Satuan
                                </label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input value" value="{{$databaseHarga->harga_satuan}}" id="hargaSatuan" name="hargaSatuan"
                                           placeholder="Masukan Harga Satuan Barang">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Total
                                </label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input type="text" readonly="readonly" value="{{$databaseHarga->total}}" class="form-control m-input disabled" id="total" name="total">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Asal Usul Barang
                                </label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input" value="{{$databaseHarga->asal_usul_barang}}" id="asalUsulBarang"
                                           name="asalUsulBarang"
                                           placeholder="Masukan Asal Usul Barang">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Keterangan
                                </label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                            <textarea class="form-control m-input" id="keterangan" name="keterangan"
                                      placeholder="Masukan Keterangan">{{$databaseHarga->keterangan}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-9 ml-lg-auto">
                                        <input type="hidden" name="action" id="action" value="Add"/>
                                        <input type="submit" value="Submit" name="action_button" id="action_button"
                                               class="btn btn-success">

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
            var $total = $('#total'),
                $value = $('.value');
            $value.on('input', function(e) {
                var total = 1;
                $value.each(function(index, elem) {
                    if(!Number.isNaN(parseInt(this.value, 10)))
                        total = total * parseInt(this.value, 10);
                });
                $total.val(total);
            });

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
                        url: "{{ route('databaseHarga.ubahAksi') }}",
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
    </script>
@endsection

