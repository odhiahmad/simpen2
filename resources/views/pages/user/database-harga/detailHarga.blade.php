@section('title','Database Harga | Detail Harga')
@extends('../../../main')
@section('content')
    <div>
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Detail Database Harga
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
                                    Detail Database Harga
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="m-content">
            <div class="m-form m-form--fit m-form--label-align-right">
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-xl-12">
                            <!--begin:: Widgets/Support Cases-->
                            <div class="m-portlet  m-portlet--full-height ">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">
                                                {{$databaseHarga->nama_barang}}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <div class="m-widget16">

                                        <div class='row'>
                                            <div class="col-xl-4">
                                                <!--begin:: Widgets/Blog-->
                                                <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                                                    <div class="m-portlet__head m-portlet__head--fit">
                                                    </div>
                                                    <div class="m-portlet__body">
                                                        <div class="m-widget19">
                                                            <div
                                                                class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides"
                                                                style="min-height-: 286px">
                                                                <img
                                                                    src="{{asset('images/data-barang/'.$databaseHarga->foto)}}"
                                                                    alt="">
                                                                <div class="m-widget19__shadow"></div>
                                                            </div>
                                                            <div class="m-widget19__content">
                                                                <div class="m-widget19__header">
                                                                    <div class="m-widget19__info">
															<span class="m-widget19__username">
																Nama Barang
															</span>
                                                                        <br>
                                                                        <span class="m-widget19__time">
																{{$databaseHarga->nama_barang }}
															</span>
                                                                    </div>

                                                                </div>
                                                                <div class="m-widget19__header">
                                                                    <div class="m-widget19__info">
															<span class="m-widget19__username">
																Harga Satuan
															</span>
                                                                        <br>
                                                                        <span class="m-widget19__time">
																{{$databaseHarga->total }}
															</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="m-widget19__action">
                                                                <a href='{!! url('user/database-harga/ubah/'.$databaseHarga->id); !!}'
                                                                   class="btn btn-block m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">
                                                                    Edit
                                                                </a>
                                                                <a href='{!! url('user/database-harga/history/'.$databaseHarga->id); !!}'
                                                                   class="btn btn-block m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">
                                                                    Lihat History Harga
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8">
                                                <div class="box box-primary">
                                                    <div class="box-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <p>Nama Barang</p>
                                                                <p>Jenis Barang</p>
                                                                <p>Satuan Barang</p>
                                                                <p>Jumlah Barang</p>
                                                                <p>Harga Satuan Barang</p>
                                                                <p>Total Barang</p>
                                                                <p>Asal Usul Barang</p>
                                                                <p>Keterangan Barang</p>

                                                            </div>
                                                            <div class="col-md-8">
                                                                <p>: {{$databaseHarga->nama_barang}}</p>
                                                                <p>: {{$databaseHarga->jenis}}</p>
                                                                <p>: {{$databaseHarga->satuan}}</p>
                                                                <p>: {{$databaseHarga->jumlah}}</p>
                                                                <p>: {{$databaseHarga->harga_satuan}}</p>
                                                                <p>: {{$databaseHarga->total}}</p>
                                                                <p>: {{$databaseHarga->asal_usul_barang}}</p>
                                                                <p>: {{$databaseHarga->keterangan}}</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-8" style="padding-top: 20px">
                                                        <div class="box box-primary">
                                                            <div class="box-body">
                                                                <b>History Terakhir di Ubah</b>
                                                                @foreach($history as $data)
                                                                    <p>{{$data->created_at}}</p>
                                                                    <p>Mengubah harga dari Rp. {{$data->harga_dari}} menjadi Rp.{{$data->harga_ke}}</p>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
