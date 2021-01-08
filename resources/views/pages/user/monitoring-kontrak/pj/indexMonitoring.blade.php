@section('title','Monitoring Kontrak')
@extends('../../../../main')
@section('content')
    <div>
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Daftar Monitoring Kontrak
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
                                    Monitoring Kontrak
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
                    </ul>
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
                            Berikut adalah Monitoring kontrak:
                        </span>
                                <div class="m-section__content">
                                    <table class="table" id="user_table" width="100%">
                                        <thead>
                                        <tr>
                                            <th>No Kontrak</th>
                                            <th>Judul</th>
                                            <th>Perusahaan</th>
                                            <th>Tanggal Kontrak</th>
                                            <th>Direksi</th>
                                            <th>Harga Kontrak</th>
                                            <th>Upload</th>
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
        </div>
        <div id="direksi_view" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Direksi</h2>
                    </div>
                    <div class="modal-body direksiView">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="tanggal_kontrak" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Tanggal Kontrak</h2>
                    </div>
                    <div class="modal-body tanggalKontrakView">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="tanggal_kontrak_milih" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Tanggal Kontrak</h2>
                    </div>
                    <div class="modal-body tanggalKontrakMilihView">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="harga_kontrak" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Harga Kontrak</h2>
                    </div>
                    <div class="modal-body hargaKontrakView">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>


        <div id="aturUserDireksiModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Atur User</h2>
                    </div>
                    <div class="modal-body">
                        <div class="m-section__content">
                            <h4>Direksi</h4>
                            <br>
                            <table class="table" id="aturUserTable" width="100%">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <br>
                        <br>
                        <div class="m-section__content">
                            <h4>Akses Diberikan ke Direksi</h4>
                            <br>
                            <table class="table" id="aturUserTableAkses" width="100%">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function CurrencyFormat(number){
            var decimalplaces = 0;
            var decimalcharacter = ",00";
            var thousandseparater = ".";
            number = parseFloat(number);
            var sign = number < 0 ? "-" : "";
            var formatted = new String(number.toFixed(decimalplaces));
            if( decimalcharacter.length && decimalcharacter != "." ) { formatted = formatted.replace(/\./,decimalcharacter); }
            var integer = "";
            var fraction = "";
            var strnumber = new String(formatted);
            var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
            if( dotpos > -1 )
            {
                if( dotpos ) { integer = strnumber.substr(0,dotpos); }
                fraction = strnumber.substr(dotpos+1);
            }
            else { integer = strnumber; }
            if( integer ) { integer = String(Math.abs(integer)); }
            while( fraction.length < decimalplaces ) { fraction += "0"; }
            temparray = new Array();
            while( integer.length > 3 )
            {
                temparray.unshift(integer.substr(-3));
                integer = integer.substr(0,integer.length-3);
            }
            temparray.unshift(integer);
            integer = temparray.join(thousandseparater);
            return sign + integer + decimalcharacter + fraction;
        }

        $(document).ready(function () {


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
                        url: "{{ route('monitoringKontrak.pj.aturUser') }}",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            if (data.errors) {
                                toastr.warning(data.errors)
                            }
                            if (data.success) {
                                toastr.success(data.success)
                                $('#sample_form')[0].reset();
                            }

                        }
                    })
                }
            });
            $("#user").select2({
                placeholder: "Pilih User",
            });

            var idKontrak;
            var role;

            $(document).on('click', '.tanggal_kontrak', function () {
                var id = $(this).attr('id');
                $('.tanggalKontrakView').empty()
                $('#form_result').html('');
                $.ajax({
                    url: "/user/monitoring-kontrak/pj/" + id + "/tanggalKontrak",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        var getData = data.data;

                        var date1 = new Date(getData.tgl_diterima_panitia);
                        var date2 = new Date(getData.spk_tgl);


                        var Difference_In_Time = date2.getTime() - date1.getTime();

                        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

                        var html = "";
                        html += '<table class="table table-bordered" >';

                        html += '<tr>';
                        html += '<td> Tanggal Mulai </td>';
                        html += '<td>' + getData.tgl_diterima_panitia + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Durasi </td>';
                        html += '<td> - </td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Tgl Berakhir</td>';
                        html += '<td> - </td>';
                        html += '</tr>';
                        html += '</table>';

                        $('.tanggalKontrakView').append(html)

                        $('#tanggal_kontrak').modal('show');
                    }
                })
            });


            $(document).on('click', '.tanggal_kontrak_milih', function () {
                var id = $(this).attr('id');
                $('.tanggalKontrakMilihView').empty()
                $('#form_result').html('');
                $.ajax({
                    url: "/user/monitoring-kontrak/pj/" + id + "/tanggalKontrak",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        var getData = data.data;

                        var date1 = new Date(getData.tgl_diterima_panitia);
                        var date2 = new Date(getData.jangka_waktu_tgl);


                        var Difference_In_Time = date2.getTime() - date1.getTime();

                        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

                        var html = "";
                        html += '<table class="table table-bordered" >';

                        html += '<tr>';
                        html += '<td> Tanggal Mulai </td>';
                        html += '<td>' + getData.tgl_diterima_panitia + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Durasi </td>';
                        html += '<td>' + Difference_In_Days + ' Hari </td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Tgl Berakhir</td>';
                        html += '<td>' + getData.jangka_waktu_tgl + '</td>';
                        html += '</tr>';
                        html += '</table>';

                        $('.tanggalKontrakMilihView').append(html)

                        $('#tanggal_kontrak_milih').modal('show');
                    }
                })
            });

            $(document).on('click', '.direksi_view', function () {
                var id = $(this).attr('id');
                $('.direksiView').empty()
                $('#form_result').html('');
                $.ajax({
                    url: "/user/monitoring-kontrak/pj/" + id + "/direksi",
                    dataType: "json",
                    success: function (data) {
                        var getData = data.data;
                        var html = "";
                        html += '<table class="table table-bordered" >';

                        html += '<tr>';
                        html += '<td> Sebutan Jabatan </td>';
                        html += '<td>' + getData.jabatan_pengawas + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Lokasi </td>';
                        html += '<td>' + getData.tempat_penyerahan + '</td>';
                        html += '</tr>';
                        html += '</table>';

                        $('.direksiView').append(html)

                        $('#direksi_view').modal('show');
                    }
                })
            });

            $(document).on('click', '.harga_kontrak', function () {
                var id = $(this).attr('id');
                $('.hargaKontrakView').empty()
                $('#form_result').html('');
                $.ajax({
                    url: "/user/monitoring-kontrak/pj/" + id + "/hargaKontrak",
                    dataType: "json",
                    success: function (data) {

                        var getData = data.data;
                        var selisihAnggaran = getData.rab - getData.harga_kontrak;
                        var html = "";
                        html += '<table class="table table-bordered" >';

                        html += '<tr>';
                        html += '<td> RAB </td>';
                        html += '<td>Rp. ' + CurrencyFormat(getData.rab) + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> HPS </td>';
                        html += '<td>Rp. ' + CurrencyFormat(getData.harga_kontrak) + '</td>';
                        html += '</tr>';
                        html += '<tr>';
                        html += '<td> Sisa Anggaran</td>';
                        html += '<td>Rp. ' + CurrencyFormat(selisihAnggaran) + '</td>';
                        html += '</tr>';


                        html += '</table>';

                        $('.hargaKontrakView').append(html)

                        $('#harga_kontrak').modal('show');
                    }
                })
            });

            $(document).on('click', '.aturUser', function () {

                idKontrak = $(this).attr('id');
                role = $(this).attr('idRole');
                console.log(idKontrak);

                $('#aturUserTable').DataTable({
                    processing: true,
                    serverSide: true,
                    paging: false,
                    destroy: true,
                    ajax: {
                        url: "/user/monitoring-kontrak/pj/aturUserDireksiView/" + role,
                    },
                    columns: [
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'jabatan',
                            name: 'jabatan',
                        },
                        {
                            data: 'role_user',
                            name: 'role_user',
                        },
                        {
                            data: 'action',
                            name: 'action',
                            order: false
                        },
                    ]
                });

                $('#aturUserTableAkses').DataTable({
                    processing: true,
                    serverSide: true,
                    paging: false,
                    search: false,
                    destroy: true,
                    ajax: {
                        url: "/user/monitoring-kontrak/pj/aturUserDireksiViewAkses/" + idKontrak + "/" + role,
                    },
                    columns: [
                        {
                            data: 'getuseraturuser.name',
                            name: 'getuseraturuser.name',
                        },
                        {
                            data: 'action',
                            name: 'action',
                            order: false
                        },
                    ]
                });
                $('#aturUserDireksiModal').modal('show');

            });


            $(document).on('click', '.tambahkanUserAksesDireksi', function () {
                var idUserAkses = $(this).attr('id');

                $.ajax({
                    url: "/user/monitoring-kontrak/pj/tambahkanUserAksesDireksi/" + idUserAkses + "/" + idKontrak,
                    dataType: "json",
                    success: function () {
                        $('#aturUserTableAkses').DataTable().ajax.reload();
                    }
                })
            });

            $(document).on('click', '.hapusUserAksesDireksi', function () {
                var idUserHapus = $(this).attr('id');
                $.ajax({
                    url: "/user/monitoring-kontrak/pj/hapusUserAksesDireksi/" + idUserHapus,
                    dataType: "json",
                    success: function () {
                        $('#aturUserTableAkses').DataTable().ajax.reload();
                    }
                })
            });

            $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/user/monitoring-kontrak/pj/index",
                },
                columns: [
                    {
                        data: 'no_prk',
                        name: 'no_prk'
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'getperusahaan.nama',
                        name: 'getperusahaan.nama'
                    },
                    {
                        data: 'tanggal_kontrak',
                        name: 'tanggal_kontrak'
                    },
                    {
                        data: 'direksi_view',
                        name: 'direksi_view'
                    },
                    {
                        data: 'harga_kontrak',
                        name: 'harga_kontrak'
                    },
                    {
                        data: 'upload',
                        name: 'upload',
                        order: false
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
