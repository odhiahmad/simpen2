@section('title','SPK | BARANG')
@extends('../../../../../../main')
@section('content')
    <div>
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Daftar Inisiasi Pengadaan
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
                                    PJ
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href='#' class="m-nav__link">
                                <span class="m-nav__link-text">
                                    Barang
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <a href='{!! url('user/jobcard/pj/tambah') !!}'
                       class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="la la-cart-plus"></i>
                            <span>
                                Inisiasi Job Card
                            </span>
                        </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
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
                                            <th>Nama Pekerjaan</th>
                                            <th>Metode Pengadaan</th>
                                            <th>Nilai RAB</th>
                                            <th>Info</th>
                                            <th>PIC</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="metode1" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Metode Pengadaan</h2>
                        </div>
                        <div class="modal-body metodePengadaan1">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="metode2" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Metode Pengadaan</h2>
                        </div>
                        <div class="modal-body metodePengadaan2">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="metode3" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Metode Pengadaan</h2>
                        </div>
                        <div class="modal-body metodePengadaan3">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="info" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Info Nomor Nota Dinas</h2>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="hapus" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Konfirmasi</h2>
                        </div>
                        <div class="modal-body">
                            <h4 align="center" style="margin:0;">Apakah anda yakin ingin menghapus data pengadaan ini
                                ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {


            var user_id;

            $(document).on('click', '.info', function () {
                var id = $(this).attr('id');
                $('.modal-content .modal-body').empty()
                $('#form_result').html('');
                $.ajax({
                    url: "/user/jobcard/pj/" + id + "/info",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        var getData = data.data;
                        var html = "";
                        html += '<table class="table table-bordered" >';

                        html += '<tr>';
                        html += '<td> Judul </td>';
                        html += '<td>' + getData.judul + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Nomor Nota Dinas </td>';
                        html += '<td>' + getData.no_nota_dinas + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Tgl </td>';
                        html += '<td>' + getData.tgl_diterima_panitia + '</td>';
                        html += '</tr>';

                        html += '<tr>';
                        html += '<td> Tgl di Terima PBJ </td>';
                        html += '<td>' + getData.tgl_diterima_panitia + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Pos Anggaran</td>';
                        html += '<td>' + getData.pos_anggaran + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> No PRK</td>';
                        html += '<td>' + getData.no_prk + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Fungsi</td>';
                        html += '<td>' + getData.fungsi_pembangkit + '</td>';
                        html += '</tr>';

                        html += '</table>';

                        $('.modal-content .modal-body').append(html)

                        $('#info').modal('show');
                    }
                })
            });

            $(document).on('click', '.metode1', function () {
                var id = $(this).attr('id');
                $('.metodePengadaan1').empty()
                $('#form_result').html('');
                $.ajax({
                    url: "/user/jobcard/pj/" + id + "/info",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        var getData = data.data;
                        var html = "";
                        html += '<table class="table table-bordered" >';

                        html += '<tr>';
                        html += '<td> Metode Jenis 1 </td>';
                        html += '<td>' + getData.get_mp1.nama + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Metode Jenis 2 </td>';
                        html += '<td>' + getData.get_mp2.nama + '</td>';
                        html += '</tr>';
                        html += '<tr>';

                        // html += '<td> Metode Jenis 3 </td>';
                        // html += '<td>' + (getData.id_mp3 !== 0 || getData.id_mp3 !== null ? getData.get_mp3.nama : '') + '</td>';
                        // html += '</tr>';
                        // html += '<td> Metode Jenis 4 </td>';
                        // html += '<td>' + getData.get_mp4.nama + '</td>';
                        // html += '</tr>';
                        // html += '<td> Metode Jenis 5 </td>';
                        // html += '<td>' + getData.get_mp5.nama + '</td>';
                        // html += '</tr>';

                        html += '</table>';

                        $('.metodePengadaan1').append(html)

                        $('#metode1').modal('show');
                    }
                })
            });

            $(document).on('click', '.metode2', function () {
                var id = $(this).attr('id');
                $('.metodePengadaan2').empty()
                $('#form_result').html('');
                $.ajax({
                    url: "/user/jobcard/pj/" + id + "/info",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        var getData = data.data;
                        var html = "";
                        html += '<table class="table table-bordered" >';
                        html += '<tr>';
                        html += '<td> Metode Jenis 1 </td>';
                        html += '<td>' + getData.get_mp1.nama + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Metode Jenis 2 </td>';
                        html += '<td>' + getData.get_mp2.nama + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Metode Jenis 3 </td>';
                        html += '<td>' + getData.get_mp3.nama + '</td>';
                        html += '</tr>';
                        html += '<td> Metode Jenis 4 </td>';
                        html += '<td>' + getData.get_mp4.nama + '</td>';
                        html += '</tr>';
                        // html += '<td> Metode Jenis 5 </td>';
                        // html += '<td>' + getData.get_mp5.nama + '</td>';
                        // html += '</tr>';

                        html += '</table>';

                        $('.metodePengadaan2').append(html)

                        $('#metode2').modal('show');
                    }
                })
            });



            $(document).on('click', '.metode3', function () {
                var id = $(this).attr('id');
                $('.metodePengadaan3').empty()
                $('#form_result').html('');
                $.ajax({
                    url: "/user/jobcard/pj/" + id + "/info",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        var getData = data.data;
                        var html = "";
                        html += '<table class="table table-bordered" >';
                        html += '<tr>';
                        html += '<td> Metode Jenis 1 </td>';
                        html += '<td>' + getData.get_mp1.nama + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Metode Jenis 2 </td>';
                        html += '<td>' + getData.get_mp2.nama + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Metode Jenis 3 </td>';
                        html += '<td>' + getData.get_mp3.nama + '</td>';
                        html += '</tr>';
                        html += '<td> Metode Jenis 4 </td>';
                        html += '<td>' + getData.get_mp4.nama + '</td>';
                        html += '</tr>';
                        html += '<td> Metode Jenis 5 </td>';
                        html += '<td>' + getData.get_mp5.nama + '</td>';
                        html += '</tr>';

                        html += '</table>';

                        $('.metodePengadaan3').append(html)

                        $('#metode3').modal('show');
                    }
                })
            });

            $(document).on('click', '.hapus', function () {
                user_id = $(this).attr('id');
                $('#hapus').modal('show');
            });

            $('#ok_button').click(function () {
                $.ajax({
                    url: "/user/jobcard/pj/destroy/" + user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Deleting...');
                    },
                    success: function (data) {
                        setTimeout(function () {
                            $('#ok_button').text('Delete');
                            $('#hapus').modal('hide');
                            $('#user_table').DataTable().ajax.reload();

                        }, 2000);
                    }
                })
            });


            var t = $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/user/jobcard/pj/index",
                },
                columns: [
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'metode',
                        name: 'metode,'
                    },
                    {
                        data: 'rab',
                        name: 'rab', render: $.fn.dataTable.render.number(',', '.', 2, 'Rp. ')
                    },
                    {
                        data: 'info',
                        name: 'info',
                    },
                    {
                        data: 'pic_pelaksana',
                        name: 'pic_pelaksana',
                    },
                    {
                        data: 'warna',
                        name: 'warna',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        order: false
                    },
                ]
            });


        });
    </script>
@endsection
