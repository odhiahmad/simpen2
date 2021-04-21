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
            <div class="row">
                <div class="col-xl-4">
                    <!--begin:: Widgets/Blog-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                        <div class="m-portlet__head m-portlet__head--fit">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-action">
                                    <button type="button" class="btn btn-sm m-btn--pill  btn-brand">
                                        Barang
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget19">
                                <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides"
                                     style="min-height-: 286px">
                                    <img
                                        src="{{asset('data-barang/foto/'.$databaseHarga->foto)}}"
                                        alt="">
                                    <h3 class="m-widget19__title m--font-light">

                                    </h3>
                                    <div class="m-widget19__shadow"></div>
                                </div>
                                <div class="m-widget19__content">
                                    <div class="m-widget19__header">

                                        <div class="m-widget19__info">
                                                        <span class="m-widget19__username">
                                                             {{$databaseHarga->nama_barang}}
                                                        </span>
                                            <br>
                                            <span class="m-widget19__time">
                                                               Rp.@convert($databaseHarga->harga_satuan)
                                                        </span>
                                        </div>
                                        <div class="m-widget19__stats">
                                                        <span class="m-widget19__number m--font-brand">
                                                             {{$databaseHarga->jumlah}}
                                                        </span>
                                            <span class="m-widget19__comment">
                                                            Stok
                                                        </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="m-widget19__action">
                                    <a href='{!! url('user/database-harga/ubah/'.$databaseHarga->id); !!}'
                                       class="btn m-btn--pill btn-primary m-btn m-btn--hover-brand m-btn--custom">
                                        Edit
                                    </a>
                                    <button name="delete" id="{{$databaseHarga->id}}" type="button"
                                            class=" delete btn m-btn--pill btn-warning m-btn m-btn--hover-brand m-btn--custom">
                                        Hapus Produk
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Blog-->
                </div>
                <div class="col-xl-8">
                    <!--begin:: Widgets/Company Summary-->
                    <div class="m-portlet m-portlet--full-height ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Keterangan Produk
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">

                                </ul>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget13">
                                <div class="m-widget13__item">
                                                <span class="m-widget13__desc m--align-center">
                                                    Nama Barang
                                                </span>
                                    <span class="m-widget13__text m-widget13__text-bolder">
                                                    {{$databaseHarga->nama_barang}}
                                                </span>
                                </div>
                                <div class="m-widget13__item">
                                                <span class="m-widget13__desc m--align-center">
                                                    Satuan
                                                </span>
                                    <span class="m-widget13__text">
                                                      {{$databaseHarga->satuan}}
                                                </span>
                                </div>
                                <div class="m-widget13__item">
                                                <span class="m-widget13__desc m--align-center">
                                                    Harga
                                                </span>
                                    <span class="m-widget13__text">
                                                    Rp.@convert($databaseHarga->harga_satuan)
                                                </span>
                                </div>
                                <div class="m-widget13__item">
                                                <span class="m-widget13__desc m--align-center">
                                                   Spesifikasi
                                                </span>
                                    <span class="m-widget13__text m-widget13__number-bolder m--font-brand">
                                                     {{$databaseHarga->spesifikasi}}
                                                </span>
                                </div>
                                <div class="m-widget13__item">
                                                <span class="m-widget13__desc m--align-center">
                                                   Sertifikat
                                                </span>
                                    <span class="m-widget13__text m-widget13__number-bolder m--font-brand">
                                                     {{$databaseHarga->sertifikat}}
                                                </span>
                                </div>
                                <div class="m-widget13__action m--align-left">
                                    <div class="m-section">
                                        <h3 class="m-section__heading">
                                            Riwayat
                                        </h3>
                                        <div class="m-section__content">
                                            <!--begin::Preview-->
                                            <div class="m-demo" data-code-preview="true" data-code-html="true"
                                                 data-code-js="false">
                                                <div class="m-demo__preview">
                                                    <div class="m-list-timeline">
                                                        <div class="m-list-timeline__items">
                                                            @if(count($history) != 0)
                                                                @foreach($history as $data)
                                                                    <div class="m-list-timeline__item">
                                                                        <span
                                                                            class="m-list-timeline__badge m-list-timeline__badge--success"></span>

                                                                        <span class="m-list-timeline__text">
                                                                                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($data->created_at))->locale('id')->isoFormat('MM Do YYYY') }} :
                                                                            <span
                                                                                class="m-badge m-badge--brand m-badge--wide">{{$data->getUserHistoryUbah->name}}</span> mengubah harga barang dari
                                                                                <span
                                                                                    class="m-badge m-badge--warning m-badge--wide">
                                                                                    Rp.@convert($data->harga_dari)
                                                                                </span>
                                                                                menjadi
                                                                                <span
                                                                                    class="m-badge m-badge--success m-badge--wide">
                                                                                    Rp.@convert($data->harga_ke)
                                                                                </span>
                                                                            </span>
                                                                        <span class="m-list-timeline__time">
                                                                               {{ \Carbon\Carbon::createFromTimeStamp(strtotime($data->created_at))->locale('id')->diffForHumans() }}
                                                                            </span>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="m-list-timeline__item">
                                                                    <span
                                                                        class="m-list-timeline__badge m-list-timeline__badge--success"></span>

                                                                    <span class="m-list-timeline__text">
                                                                              Belum Ada History

                                                                            </span>

                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <a href='{!! url('user/database-harga/history/'.$databaseHarga->id); !!}'
                                               class="m-dropdown__toggle btn btn-success">
                                                Lihat semua riwayat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Company Summary-->
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
                        <h4 align="center" style="margin:0;">Apakah kamu yakin ingin menghapus data ini?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">Ya</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
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

        $(document).ready(function () {
            $(document).on('click', '.delete', function () {
                user_id = $(this).attr('id');
                $('#confirmModal').modal('show');
            });
        });

        $('#ok_button').click(function () {
            $.ajax({
                url: "/user/database-harga/destroy/" + user_id,
                beforeSend: function () {
                    $('#ok_button').text('Deleting...');
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#confirmModal').modal('hide');
                        toastr.success(data.success)
                    }, 2000);
                }
            })
        });
    </script>
    @endsection
