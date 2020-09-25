@section('title','Data Kontrak')
@extends('../../../main')
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
                                    Inisiasi Pengadaan
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <a href='{!! url('user/inisiasi-pengadaan/tambah') !!}' class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                                <span>
                                                    <i class="la la-cart-plus"></i>
                                                    <span>
                                                        Pengadaan Baru
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
                                            <th>Judul</th>
                                            <th>Tahun</th>
                                            <th>Tanggal di Terima</th>
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
    </div>
    <script>
        $(document).ready(function () {
            $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/user/inisiasi-pengadaan/index",
                },
                columns: [
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'tahun',
                        name: 'tahun'
                    },
                    {
                        data: 'tgl_diterima_panitia',
                        name: 'tgl_diterima_panitia',
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
