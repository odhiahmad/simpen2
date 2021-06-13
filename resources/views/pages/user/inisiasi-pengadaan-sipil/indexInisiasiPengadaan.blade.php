@extends('../../../main')
@section('title', 'Inisiasi Pengadaan Sipil')
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
                                   Sipil
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <button type="button" data-toggle="modal" name="create_record"
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
                            Berikut adalah data Inisiasi Pengadaan Sipil:
                        </span>
                                <div class="m-section__content">
                                    <table class="table" id="user_table" width="100%">
                                        <thead>
                                        <tr>
                                            <th>
                                                Judul
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
                            <h2>Konfirmasi</h2>
                        </div>
                        <div class="modal-body">
                            <h4 align="center" style="margin:0;">Apakah anda yakin ingin menghapus data Inisiasi
                                Pengadaan Sipil ini ?</h4>
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
                            <h2>Detail</h2>
                        </div>
                        <div class="modal-body lihatDetailModal">
                            <table class="table" id="subpekerjaanTable" width="100%">
                                <thead>
                                <tr>
                                    <th>
                                        Pekerjaan
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="lihatSubDetail" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Detail</h2>
                        </div>
                        <div class="modal-body lihatSubDetailModal">
                            <table class="table" id="detailPekerjaanTable" width="100%">
                                <thead>
                                <tr>
                                    <th>
                                        Sub Pekerjaan
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="confirmModalPekerjaan" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header_detail_hapus">
                            <h2>Konfirmasi</h2>
                        </div>
                        <div class="modal-body">
                            <h4 align="center" style="margin:0;">Apakah anda yakin ingin menghapus data
                                pekerjaan
                                ini ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="ok_button_pekerjaan" id="ok_button_pekerjaan"
                                    class="btn btn-danger">OK
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 id="tambahPekerjaanModal" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelDetail">
                                New message
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span id="form_result_detail"></span>
                            <form method="post" id="sample_form_detail" class="form-horizontal"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control m-input" id="id_ips" name="id_ips">
                                <input type="hidden" class="form-control m-input" id="id_ips_pekerjaan"
                                       name="id_ips_pekerjaan">
                                <div class="m-portlet__body">
                                    <table class="table table-bordered" id="dynamic_field_sub">
                                        <tr>
                                            <td>
                                                <button type="button" name="add_pekerjaan" id="add_pekerjaan"
                                                        class="btn btn-success">Add
                                                    Sub Pekerjaan
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>


                                <div class="form-group" align="center">
                                    <input type="hidden" name="action_detail" id="action_detail"/>
                                    <input type="hidden" name="hidden_id_detail" id="hidden_id_detail"/>
                                    <input type="submit" name="action_button_detail" id="action_button_detail"
                                           class="btn btn-warning"
                                           value="Add"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 id="tambahPekerjaanGGModal" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahPekerjaanGGTitle">
                                New message
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span id="form_result_pekerjaan_gg"></span>
                            <form method="post" id="sample_form_pekerjaan_gg" class="form-horizontal"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control m-input" id="id_ips_gg" name="id_ips_gg">
                                <div class="m-portlet__body">
                                    <table class="table table-bordered" id="dynamic_field_pekerjaan_gg">
                                        <tr>
                                            <td>
                                                <button type="button" name="add_pekerjaan_gg" id="add_pekerjaan_gg"
                                                        class="btn btn-success">Add
                                                    Pekerjaan
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>


                                <div class="form-group" align="center">
                                    <input type="hidden" name="action_pekerjaan_gg" id="action_pekerjaan_gg"/>
                                    <input type="hidden" name="hidden_id_pekerjaan_gg" id="hidden_id__pekerjaan_gg"/>
                                    <input type="submit" name="action_button_pekerjaan_gg"
                                           id="action_button_pekerjaan_gg"
                                           class="btn btn-warning"
                                           value="Add"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 id="editJudulModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editJudul">
                                Edit Judul
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span id="form_result_edit"></span>
                            <form method="post" id="sample_form_edit" class="form-horizontal"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control m-input" id="id_gg" name="id_gg">
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Judul
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="judul_gg" name="judul_gg"
                                               placeholder="Masukan Judul">
                                    </div>
                                </div>
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action_edit" id="action_edit"/>
                                    <input type="hidden" name="hidden_edit" id="hidden_edit"/>
                                    <input type="submit" name="action_edit" id="action_edit"
                                           class="btn btn-warning"
                                           value="Edit"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="confirmModalSubPekerjaan" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Konfirmasi</h2>
                        </div>
                        <div class="modal-body">
                            <h4 align="center" style="margin:0;">Apakah anda yakin ingin menghapus Sub Pekerjaan Ini
                                ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="ok_button_sub_pekerjaan" id="ok_button_sub_pekerjaan"
                                    class="btn btn-danger">OK
                            </button>
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
                            <form method="post" id="sample_form" class="form-horizontal"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Judul
                                    </label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input" id="judul" name="judul"
                                               placeholder="Masukan Judul">
                                    </div>
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <td><input type="text" name="pekerjaan[]" placeholder="Enter your Name"
                                                       class="form-control name_list"/></td>
                                            <td>
                                                <button type="button" name="add" id="add" class="btn btn-success">
                                                    Add
                                                    Pekerjaan
                                                </button>
                                            </td>
                                        </tr>
                                    </table>

                                </div>

                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="action"/>
                                    <input type="hidden" name="hidden_id" id="hidden_id"/>
                                    <input type="submit" name="action_button" id="action_button"
                                           class="btn btn-warning"
                                           value="Add"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="lihatDataModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Detail Sipil</h2>
                        </div>
                        <div class="modal-body lihatDataView">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>

        $(document).ready(function () {

            $(document).on('click', '.lihatData', function () {
                var id = $(this).attr('id');
                $('.lihatDataView').empty()

                $.ajax({
                    url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/" + id + "/lihatDetail",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        var getDataJudul = data.dataJudul;
                        var getDataPekerjaan = data.dataPekerjaan;


                        var html = "";

                        html += '<table class="table"><thead><tr><th>No</th><th>Jenis Pekerjaan</th><th>Vol Pekerjaan</th><th>Sat Pekerjaan</th><th>Harga Satuan Pekerjaan</th><th>Harga Pekerjaan</th></tr></thead><tbody>';


                        for (let l = 0; l < getDataPekerjaan.length; l++) {
                            // var hitungJumlah = [];
                            html += '<tr><td>' + getDataPekerjaan[l].nama_pekerjaan + '</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
                            for (let m = 0; m < getDataPekerjaan[l].getipspekerjaangg.length; m++) {
                                var numberTable = m + 1;
                                html += '<tr><th scope="row">' + (numberTable) + '</th><td>' + getDataPekerjaan[l].getipspekerjaangg[m].nama + '</td><td>' + getDataPekerjaan[l].getipspekerjaangg[m].vol + '</td><td>cm</td><td>' + getDataPekerjaan[l].getipspekerjaangg[m].harga_jual + '</td><td>' + getDataPekerjaan[l].getipspekerjaangg[m].total_harga + '</td></tr>';
                                // hitungJumlah[l] += getDataPekerjaan[l].getipspekerjaangg[m].total_harga;
                            }
                            // html += '<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>'+hitungJumlah[l]+'</td></tr>';
                        }
                        html += '</tbody></table>';

                        $('.lihatDataView').append(html)

                        $('#lihatDataModal').modal('show');
                    }
                })
            });

            var i = 1;
            $('#add').click(function () {
                i++;
                $('#dynamic_field').append(
                    '<tr id="row' + i + '">' +
                    '<td>' +
                    '<input type="text" name="pekerjaan[]" placeholder="Masukan Pekerjaan" class="form-control name_list" />' +
                    '</td>' +
                    // '<td>' +
                    // '<button type="button" name="add_pekerjaan" id="add_pekerjaan"\n' +
                    // '                                                        class="btn btn-success">Add Sub Pekerjaan\n' +
                    // '                                                </button>' +
                    // '</td>' +
                    '<td>' +
                    '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button>' +
                    '</td>' +
                    '</tr>');
            });

            var j = 1;
            $('#add_pekerjaan').click(function () {
                j++;
                $('#dynamic_field_sub').append(
                    '<tr id="rowsub' + j + '">' +
                    '<td>' +
                    '<select class="form-control pekerjaan_list" id="' + j + '" name="pekerjaansub[]"><option>Pilih pekerjaan </option>@foreach ($dataPekerjaan as $key)<option value="{{ $key->id }}">{{ $key->nama}}</option>@endforeach</select>' +
                    '</td>' +
                    '<td>' +
                    '<input type="number" name="harga_satuan[]" placeholder="Masukan Junmlah Barang" class="form-control harga_satuan_list" />' +
                    '</td>' +
                    '<td>' +
                    '<button type="button" name="remove_pekerjaan" id="' + j + '" class="btn btn-danger btn_remove_sub">X</button>' +
                    '</td>' +
                    '</tr>');
            });

            var k = 1;
            $('#add_pekerjaan_gg').click(function () {
                j++;
                $('#dynamic_field_pekerjaan_gg').append(
                    '<tr id="rowpekerjaan' + k + '">' +
                    '<td>' +
                    '<input type="text" name="pekerjaan_gg[]" placeholder="Masukan Pekerjaan" class="form-control pekerjaan_gg_list" />' +
                    '</td>' +
                    '<td>' +
                    '<button type="button" name="remove_pekerjaan_gg" id="' + k + '" class="btn btn-danger btn_remove_pekerjaan_gg">X</button>' +
                    '</td>' +
                    '</tr>');
            });


            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

            $(document).on('click', '.btn_remove_pekerjaan_gg', function () {
                var button_id_pekerjaan = $(this).attr("id");
                $('#rowpekerjaan' + button_id_pekerjaan + '').remove();
            });

            $(document).on('click', '.btn_remove_sub', function () {
                var button_id_sub = $(this).attr("id");
                $('#rowsub' + button_id_sub).remove();
            });

            $('.pekerjaan_list').change(function () {
                if ($(this).val() != '') {

                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent')
                    var _token = $('input[name="_token"]').val()

                    $.ajax({
                        url: "{{route('jobcard.spk.fetchJenis1')}}",
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
            $("#pekerjaan, #sub_pekerjaan").select2({
                placeholder: "Pilih",
            });

            $('.pekerjaan').change(function () {
                if ($(this).val() != '') {
                    if ($(this).val() != 1) {
                        $('.sub_pekerjaan').prop('disabled', true);
                    } else {
                        $('.sub_pekerjaan').prop('disabled', false);
                    }
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent')
                    var _token = $('input[name="_token"]').val()

                    $.ajax({
                        url: "{{route('pengadaan-sipil.fetch')}}",
                        method: "POST",
                        data: {select: select, value: value, _token: _token, dependent: dependent},
                        success: function (result) {
                            $('.sub_pekerjaan').html(result)
                        }
                    })
                }
            });

            $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/index",
                },
                columns: [
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        order: false
                    },
                ]
            });


            $('#create_record').click(function () {
                $('.modal-title').text("Tambahkan Inisiasi Baru");
                $('#action_button').val("Tambahkan");
                $('#action').val("Add");

                $('#sample_form')[0].reset();
                $('#form_result').html('');
                $('#formModal').modal('show');
            });

            $(document).on('click', '.tambahPekerjaan', function () {
                $('#action_detail').val("Add");
                $('#sample_form_detail')[0].reset();
                $('#form_result_detail').html('');


                var id = $(this).attr('id');
                $('.tambahPekerjaanModal').empty()


                $.ajax({
                    url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/" + id + "/editPekerjaan",
                    dataType: "json",
                    success: function (data) {
                        var getData = data.data;
                        $('.modal-title').text("Tambahkan Pekerjaan " + getData.judul + "");
                        $('#id_ips').val(getData.id_ips);
                        $('#id_ips_pekerjaan').val(getData.id);
                        $('#action_button_detail').val("Tambahkan");
                        $('#tambahPekerjaanModal').modal('show');
                    }
                })
            });

            $(document).on('click', '.tambahPekerjaanGG', function () {
                $('#action_pekerjaan_gg').val("Add");
                $('#sample_form_pekerjaan_gg')[0].reset();
                $('#form_result_pekerjaan_gg').html('');


                var id = $(this).attr('id');
                $('.tambahPekerjaanModal').empty()


                $.ajax({
                    url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/" + id + "/edit",
                    dataType: "json",
                    success: function (data) {
                        var getData = data.data;
                        $('.modal-title').text("Tambahkan Pekerjaan " + getData.judul + "");
                        $('#id_ips_gg').val(getData.id);
                        $('#action_button_pekerjaan_gg').val("Tambahkan");
                        $('#tambahPekerjaanGGModal').modal('show');
                    }
                })
            });


            $(document).on('click', '.edit', function () {
                $('#action_edit').val("Add");
                $('#sample_form_edit')[0].reset();
                $('#form_result_edit').html('');


                var id = $(this).attr('id');
                $('.editJudulModal').empty()


                $.ajax({
                    url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/" + id + "/edit",
                    dataType: "json",
                    success: function (data) {
                        var getData = data.data;
                        $('.modal-title').text("Tambahkan Pekerjaan " + getData.judul + "");
                        $('#id_gg').val(getData.id);
                        $('#judul_gg').val(getData.judul);
                        $('#action_edit').val("Edit");
                        $('#editJudulModal').modal('show');
                    }
                })


            });


            $(document).on('click', '.detail', function () {
                var id = $(this).attr('id');


                $('#subpekerjaanTable').DataTable({
                    processing: true,
                    serverSide: true,
                    paging: false,
                    destroy: true,
                    ajax: {
                        url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/indexPekerjaan/" + id,
                    },
                    columns: [
                        {
                            data: 'nama_pekerjaan',
                            name: 'nama_pekerjaan'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            order: false
                        },
                    ]
                });

                $('#lihatDetail').modal('show');
            });

            $(document).on('click', '.detailPekerjaan', function () {
                var id = $(this).attr('id');


                $('#detailPekerjaanTable').DataTable({
                    processing: true,
                    serverSide: true,
                    paging: false,
                    destroy: true,
                    ajax: {
                        url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/indexPekerjaanDetail/" + id,
                    },
                    columns: [
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            order: false
                        },
                    ]
                });

                $('#lihatSubDetail').modal('show');
            });

            $('#sample_form_pekerjaan_gg').on('submit', function (event) {
                event.preventDefault();
                if ($('#action_pekerjaan_gg').val() == 'Add') {
                    $.ajax({
                        url: "{{ route('pengadaan-sipil.store-pekerjaangg') }}",
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
                                $('#sample_form_pekerjaan_gg')[0].reset();
                            }
                            $('#form_result_pekerjaan_gg').html(html);
                        }
                    })
                }


            });

            $('#sample_form_edit').on('submit', function (event) {
                event.preventDefault();
                if ($('#action_edit').val() == "Edit") {
                    $.ajax({
                        url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/update",
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
                                $('#user_table').DataTable().ajax.reload();
                            }
                            $('#form_result_edit').html(html);
                        }
                    });
                }
            });


            $('#sample_form').on('submit', function (event) {

                event.preventDefault();
                if ($('#action').val() == 'Add') {
                    $.ajax({
                        url: "{{ route('pengadaan-sipil.store') }}",
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


            });

            $('#sample_form_detail').on('submit', function (event) {

                event.preventDefault();
                if ($('#action_detail').val() == 'Add') {
                    $.ajax({
                        url: "{{ route('pengadaan-sipil.store-pekerjaan') }}",
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
                                $('#sample_form_detail')[0].reset();
                                $('#subpekerjaanTable').DataTable().ajax.reload();
                            }
                            $('#form_result_detail').html(html);
                        }
                    })
                }

                if ($('#action').val() == "Edit") {
                    $.ajax({
                        url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/update-pekerjaan",
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
                                $('#user_table').DataTable().ajax.reload();
                            }
                            $('#form_result_detail').html(html);
                        }
                    });
                }
            });


            var user_id;
            var user_id_pekerjaan;
            var user_id_sub_pekerjaan;


            $(document).on('click', '.delete', function () {
                user_id = $(this).attr('id');
                $('#confirmModal').modal('show');
            });

            $(document).on('click', '.deletePekerjaan', function () {
                user_id_pekerjaan = $(this).attr('id');
                $('#confirmModalPekerjaan').modal('show');
            });

            $(document).on('click', '.deleteSubPekerjaan', function () {
                user_id_sub_pekerjaan = $(this).attr('id');
                $('#confirmModalSubPekerjaan').modal('show');
            });


            $('#ok_button_pekerjaan').click(function () {
                $.ajax({
                    url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/destroyPekerjaan/" + user_id_pekerjaan,
                    beforeSend: function () {
                        $('#ok_button_pekerjaan').text('Deleting...');
                    },
                    success: function (data) {
                        setTimeout(function () {

                            $('#confirmModalPekerjaan').modal('hide');
                            $('#subpekerjaanTable').DataTable().ajax.reload();
                            $('#ok_button_pekerjaan').text('Delete');
                        }, 2000);
                    }
                })
            });


            $('#ok_button_sub_pekerjaan').click(function () {
                $.ajax({
                    url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/destroySubPekerjaan/" + user_id_sub_pekerjaan,
                    beforeSend: function () {
                        $('#ok_button_sub_pekerjaan').text('Deleting...');
                    },
                    success: function (data) {
                        setTimeout(function () {

                            $('#confirmModalSubPekerjaan').modal('hide');
                            $('#detailPekerjaanTable').DataTable().ajax.reload();
                            $('#ok_button_sub_pekerjaan').text('Delete');
                        }, 2000);
                    }
                })
            });

            $(document).on('click', '.ganti', function () {
                user_id = $(this).attr('id');
                $('#gantiPasswordModal').modal('show');
            });


            $('#ok_button').click(function () {
                $.ajax({
                    url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/destroy/" + user_id,
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

            $('#ok').click(function () {
                $.ajax({
                    url: "/user/inisiasi-pengadaan-sipil/pengadaan-sipil/destroyPekerjaan/" + user_id_pekerjaan,
                    beforeSend: function () {
                        $('#ok_button_pekerjaan').text('Deleting...');
                    },
                    success: function (data) {
                        setTimeout(function () {

                            $('#confirmModalPekerjaan').modal('hide');
                            $('#subpekerjaanTable').DataTable().ajax.reload();
                            $('#ok_button_pekerjaan').text('Delete');
                        }, 2000);
                    }
                })
            });


        });
    </script>
@endsection
