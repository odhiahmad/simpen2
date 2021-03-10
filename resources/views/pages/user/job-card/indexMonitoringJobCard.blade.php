@section('title','SPBJ')
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
                                    Monitoring
                                </span>
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
                    </ul>
                </div>
                <div>
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
                                            <th>No Proses</th>
                                            <th>Nama Pekerjaan</th>
                                            <th>Metode Pengadaan</th>
                                            <th>Nilai RAB</th>
                                            <th>PIC</th>
                                            <th>Status</th>
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
    </div>
    <script>
        $(document).ready(function () {


            var t = $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/user/jobcard/mj/index",
                },
                columns: [
                    {
                        data: 'no_proses',
                        name: 'no_proses'
                    },
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
                        data: 'pic_pelaksana',
                        name: 'pic_pelaksana',
                    },
                    {
                        data: 'warna',
                        name: 'warna',
                    },
                ]
            });


        });
    </script>
@endsection
