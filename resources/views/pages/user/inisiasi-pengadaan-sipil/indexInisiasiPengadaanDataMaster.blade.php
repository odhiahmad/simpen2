@extends('../../../main')
@section('title', 'Inisiasi Pengadaan Sipil Data Master')
@section('content')
    <div>
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Inisiasi Pengadaan Sipil
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
                                    Inisiasi Pengadaan
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href='#' class="m-nav__link">
                                <span class="m-nav__link-text">
                                    Data Master
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <button type="button" data-toggle="modal"  name="create_record"
                            id="create_record" class="btn btn-outline-warning m-btn m-btn--custom">Create Record
                    </button>

                </div>
            </div>
        </div>
        <div class="m-content">

            <div class="row">
                <div class="col-xl-12">
                    <div class="m-portlet m-portlet--full-height">
                        <div class="m-portlet__body">
                            <div class="m-section">
                        <span class="m-section__sub">
                            Berikut adalah data harga:
                        </span>
                                <div class="m-section__content">
                                    <table class="table" id="user_table" width="100%">
                                        <thead>
                                        <tr>
                                            <th>
                                                Pekerjaan
                                            </th>
                                            <th>
                                                Harga
                                            </th>
                                            <th>
                                                Satuan Pekerjaan
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="confirmModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Konfirmasi</h2>
                        </div>
                        <div class="modal-body">
                            <h4 align="center" style="margin:0;">Apakah anda yakin ingin menghapus data pekerjaan ini ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 id="formModal" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                New message
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span id="form_result"></span>
                            <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Nama Pekerjaan
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="nama" name="nama"
                                               placeholder="Masukan Nama Pekerjaan">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Vol Pekerjaan
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="number" class="form-control m-input" id="vol" name="vol"
                                               placeholder="Masukan Vol Pekerjaan">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Satuan Pekerjaan
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="satuan" name="satuan"
                                               placeholder="Masukan Satuan Pekerjaan">
                                    </div>
                                </div>
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="action"/>
                                    <input type="hidden" name="hidden_id" id="hidden_id"/>
                                    <input type="submit" name="action_button" id="action_button" class="btn btn-warning"
                                           value="Add"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function () {

            $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/user/inisiasi-pengadaan-sipil/ips-dm/index",
                },
                columns: [
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'vol_pekerjaan',
                        name: 'vol_pekerjaan'
                    },
                    {
                        data: 'satuan',
                        name: 'satuan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        order:false
                    },
                ]
            });



            $('#create_record').click(function () {
                $('.modal-title').text("Tambahkan Data Pekerjaan Baru");
                $('#action_button').val("Tambahkan");
                $('#action').val("Add");
                $('#sample_form')[0].reset();
                $('#form_result').html('');
                $('#formModal').modal('show');
            });

            $('#sample_form').on('submit', function (event) {
                console.log($('#action').val())
                event.preventDefault();
                if ($('#action').val() == 'Add') {
                    $.ajax({
                        url: "{{ route('ips-dm.store') }}",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            var html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger">';
                                for (var count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                            }
                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                $('#sample_form')[0].reset();
                                $('#user_table').DataTable().ajax.reload();
                            }
                            $('#form_result').html(html);
                        }
                    })
                }

                if ($('#action').val() == "Edit") {

                    $.ajax({
                        url: "/user/inisiasi-pengadaan-sipil/ips-dm/update",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            var html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger">';
                                for (var count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                            }
                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                $('#store_image').html('');
                                $('#user_table').DataTable().ajax.reload();
                            }
                            $('#form_result').html(html);
                        }
                    });
                }
            });



            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $('#form_result').html('');
                $.ajax({
                    url: "/user/inisiasi-pengadaan-sipil/ips-dm/" + id + "/edit",
                    dataType: "json",
                    success: function (html) {
                        $('#nama').val(html.data.nama);
                        $('#vol').val(html.data.vol_pekerjaan);
                        $('#satuan').val(html.data.satuan);

                        $('#hidden_id').val(html.data.id);
                        $('.modal-title').text("Edit Data");
                        $('#action_button').val("Edit");
                        $('#action').val("Edit");
                        $('#formModal').modal('show');
                    }
                })
            });



            var user_id;

            $(document).on('click', '.delete', function () {
                user_id = $(this).attr('id');
                $('.modal-title').text("Hapus Data");
                $('#confirmModal').modal('show');
            });


            $('#ok_button').click(function () {
                $.ajax({
                    url: "/user/inisiasi-pengadaan-sipil/ips-dm/destroy/" + user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Deleting...');
                    },
                    success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#user_table').DataTable().ajax.reload();
                        }, 2000);
                    }
                })
            });


        });
    </script>
@endsection
