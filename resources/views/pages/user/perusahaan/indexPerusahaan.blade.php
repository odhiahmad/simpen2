@section('title','Data DPT')
@extends('../../../main')
@section('content')
    <div>
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Data DPT
                    </h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href='{!! url('dpt/beranda'); !!}' class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
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
                                                Nama
                                            </th>
                                            <th>
                                                Pimpinan
                                            </th>
                                            <th>
                                               Sebutan Jabatan
                                            </th>
                                            <th>
                                                Alamat
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
                            <h4 align="center" style="margin:0;">Apakah anda yakin ingin menghapus data dpt ini ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="lihatDetail" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Detail</h2>
                        </div>
                        <div class="modal-body lihatDetailModal">

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
                                        Nama
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="nama" name="nama"
                                               placeholder="Masukan Nama">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Pimpinan
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="pimpinan" name="pimpinan"
                                               placeholder="Masukan Pimpinan">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Jabatan
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="notaris" name="notaris"
                                               placeholder="Masukan Jabatan">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Alamat
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="alamat" name="alamat"
                                               placeholder="Masukan Alamat">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Bank
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="bank" name="bank"
                                               placeholder="Masukan bank">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Kantor Cabang
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="kantor_cabang" name="kantor_cabang"
                                               placeholder="Masukan Kantor Cabang">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Rekening
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="rekening" name="rekening"
                                               placeholder="Masukan Rekening">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        NPWP
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="npwp" name="npwp"
                                               placeholder="Masukan NPWP">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Nomor Telepon
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="telpon" name="telpon"
                                               placeholder="Masukan Telepon">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Faksimili
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="faksimili" name="faksimili"
                                               placeholder="Masukan Faksimili">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Sebutan Jabatan
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="sebutan_jabatan" name="sebutan_jabatan"
                                               placeholder="Masukan Sebutan Jabatan">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Bentuk DPT
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="bentuk_dpt" name="bentuk_dpt"
                                               placeholder="Masukan Bentuk DPT">
                                    </div>
                                </div>
                                <div class="input-group hdtuto control-group lst increment" >
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <td>
                                                <button type="button" name="add_foto" id="add_foto"
                                                        class="btn btn-success">Add Foto
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
{{--                                    <input type="file" name="filenames[]" class="myfrm form-control">--}}
{{--                                    <div class="input-group-btn">--}}
{{--                                        <button class="btn btn-success tambah" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>--}}
{{--                                    </div>--}}
                                </div>
                                <br/>
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
            $(".tambah").click(function(){
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click",".hapus",function(){
                $(this).parents(".control-group lst input-group").remove();
            });

            var j = 1;
            $('#add_foto').click(function () {
                j++;
                $('#dynamic_field').append(
                    '<tr id="row' + j + '">' +
                    '<td>' +
                    '<input type="file" name="filenames[]" class="myfrm form-control">' +
                    '</td>' +
                    '<td>' +
                    '<button type="button" name="remove_pekerjaan" id="' + j + '" class="btn btn-danger btn_remove">X</button>' +
                    '</td>' +
                    '</tr>');
            });

            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

            $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/user/dpt/index",
                },
                columns: [
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'pimpinan',
                        name: 'pimpinan',
                    },
                    {
                        data: 'sebutan_jabatan',
                        name: 'sebutan_jabatan',
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        order:false
                    },
                ]
            });

            $('#create_record').click(function () {
                $('.modal-title').text("Tambahkan DPT Baru");
                $('#action_button').val("Tambahkan");
                $('#action').val("Add");
                $('#sample_form')[0].reset();
                $('#form_result').html('');
                $('#formModal').modal('show');
            });

            $(document).on('click', '.lihatDetail', function () {
                var id = $(this).attr('id');
                $('.lihatDetailModal').empty()
                $('#form_result').html('');
                $.ajax({
                    url: "/user/dpt/" + id + "/edit",
                    dataType: "json",
                    success: function (data) {

                        var tes = JSON.parse(data.data.foto)

                        var getData = data.data;
                        var html = "";
                        html += '<table class="table table-bordered" >';
                        html += '<tr>';
                        html += '<td> Nama </td>';
                        html += '<td>' + getData.nama + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td>Pimpinan</td>';
                        html += '<td>' + getData.pimpinan+ '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Notaris </td>';
                        html += '<td>' + getData.notaris + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Alamat </td>';
                        html += '<td>' + getData.alamat + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Bank</td>';
                        html += '<td>' + getData.bank + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Kantor Cabang</td>';
                        html += '<td>' + getData.kantor_cabang + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Rekening</td>';
                        html += '<td>' + getData.rekening + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> NPWP</td>';
                        html += '<td>' + getData.npwp + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Telepon</td>';
                        html += '<td>' + getData.telpon + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Faksimili</td>';
                        html += '<td>' + getData.faksimili + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Sebutan Jabatan</td>';
                        html += '<td>' + getData.sebutan_jabatan + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Bentuk DPT</td>';
                        html += '<td>' + getData.bentuk_perusahaan + '</td>';
                        html += '</tr>';

                        html += '</table>';
                        for(var i=0;i<tes.length;i++){

                            html += '<a href="http://127.0.0.1:8000/dpt/'+tes[i]+'">' +
                                '<img width="200" src="http://127.0.0.1:8000/dpt/'+tes[i]+'"></a>';

                        }

                        $('.lihatDetailModal').append(html)

                        $('#lihatDetail').modal('show');
                    }
                })
            });


            $('#sample_form').on('submit', function (event) {

                event.preventDefault();
                if ($('#action').val() == 'Add') {
                    $.ajax({
                        url: "{{ route('dpt.store') }}",
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
                        url: "/user/dpt/update",
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
                    url: "/user/dpt/" + id + "/edit",
                    dataType: "json",
                    success: function (html) {
                        $('#nama').val(html.data.nama);
                        $('#pimpinan').val(html.data.pimpinan);
                        $('#notaris').val(html.data.notaris);
                        $('#alamat').val(html.data.alamat);
                        $('#bank').val(html.data.bank);
                        $('#kantor_cabang').val(html.data.kantor_cabang);
                        $('#rekening').val(html.data.rekening);
                        $('#npwp').val(html.data.npwp);
                        $('#telpon').val(html.data.telpon);
                        $('#faksimili').val(html.data.faksimili);
                        $('#sebutan_jabatan').val(html.data.sebutan_jabatan);
                        $('#bentuk_dpt').val(html.data.bentuk_perusahaan);

                        $('#hidden_id').val(id);
                        $('.modal-title').text("Edit New Record");
                        $('#action_button').val("Edit");
                        $('#action').val("Edit");
                        $('#formModal').modal('show');
                    }
                })
            });

            var user_id;

            $(document).on('click', '.delete', function () {
                user_id = $(this).attr('id');
                $('#confirmModal').modal('show');
            });

            $(document).on('click', '.ganti', function () {
                user_id = $(this).attr('id');
                $('#gantiPasswordModal').modal('show');
            });


            $('#ok_button').click(function () {
                $.ajax({
                    url: "/user/dpt/destroy/" + user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Deleting...');
                    },
                    success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#user_table').DataTable().ajax.reload();
                            $('#ok_button').text('Delete');
                        }, 2000);
                    }
                })
            });

        });
    </script>
@endsection

