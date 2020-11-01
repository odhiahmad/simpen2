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
                                    SPK
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
                        url: "{{ route('monitoringKontrak.spk.aturUser') }}",
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
            $(document).on('click', '.aturUser', function () {
                $('#aturUserDireksiModal').modal('show');
                idKontrak = $(this).attr('id');
                role = $(this).attr('idRole');
                console.log(idKontrak)
                $('#aturUserTable').DataTable({
                    processing: true,
                    serverSide: true,
                    paging: false,
                    destroy: true,
                    ajax: {
                        url: "/user/monitoring-kontrak/spk/aturUserDireksiView/"+role,
                    },
                    columns: [
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'role',
                            name: 'role',
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
                        url: "/user/monitoring-kontrak/spk/aturUserDireksiViewAkses/" + idKontrak+"/"+role,
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


            });


            $(document).on('click', '.tambahkanUserAksesDireksi', function () {
                var idUserAkses = $(this).attr('id');

                $.ajax({
                    url: "/user/monitoring-kontrak/spk/tambahkanUserAksesDireksi/" + idUserAkses + "/" + idKontrak,
                    dataType: "json",
                    success: function () {
                        $('#aturUserTableAkses').DataTable().ajax.reload();
                    }
                })
            });

            $(document).on('click', '.hapusUserAksesDireksi', function () {
                var idUserHapus = $(this).attr('id');
                $.ajax({
                    url: "/user/monitoring-kontrak/spk/hapusUserAksesDireksi/" + idUserHapus,
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
                    url: "/user/monitoring-kontrak/spk/index",
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
                        data: 'tgl_diterima_panitia',
                        name: 'tgl_diterima_panitia'
                    },
                    {
                        data: 'direksi',
                        name: 'direksi'
                    },
                    {
                        data: 'nilai_kontrak',
                        name: 'nilai_kontrak', render: $.fn.dataTable.render.number(',', '.', 3, 'Rp')
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
