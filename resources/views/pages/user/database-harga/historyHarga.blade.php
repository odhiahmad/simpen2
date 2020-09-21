@section('title','Database Harga | History')
@extends('../../../main')
@section('content')
    <div>
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        <input type="hidden" id="id_barang" value="{{$databaseHarga->id}}">
                        {{$databaseHarga->nama_barang}}
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
                                    History Database Harga
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
                            Berikut adalah data history ubah Database Harga:
                        </span>
                                <div class="m-section__content">
                                    <table class="table" id="user_table" width="100%">
                                        <thead>
                                        <tr>
                                            <th>
                                                Di Ubah Oleh
                                            </th>
                                            <th>
                                                Tanggal
                                            </th>
                                            <th>
                                                Dari Harga
                                            </th>
                                            <th>
                                                Ke Harga
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
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var id = $('#id_barang').val()
            $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/user/database-harga/history/"+id
                },
                columns: [
                    {
                        data: 'get_user_history_ubah.name',
                        name: 'get_user_history_ubah.name'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'harga_dari',
                        name: 'harga_dari',
                    },
                    {
                        data: 'harga_ke',
                        name: 'harga_ke',
                    },
                ]
            });
        });
    </script>
@endsection

