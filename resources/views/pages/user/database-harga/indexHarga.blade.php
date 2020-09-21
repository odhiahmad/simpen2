@section('title','Database Harga')
@extends('../../../main')
@section('content')
    <div>
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Daftar Harga Produk
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
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">
                                    Database Harga
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-4">
                            <div class="m-input-icon m-input-icon--left">
                                <select class="form-control m-select2" id="m_select2_6" name="param">

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href='{!! url('user/database-harga/tambah'); !!}'
                       class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
									<span>
										<i class="la la-cart-plus"></i>
										<span>
											Produk Baru
										</span>
									</span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>
        <div class="m-content">
            @if (count($databaseHarga) > 0)
                <section class="databaseHarga">
                    @include('pages.user.database-harga.loadData')
                </section>
            @else
                No data found :(
            @endif

        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();
                $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />');
                var url = $(this).attr('href');
                window.history.pushState("", "", url);
                loadBooks(url);
            });

            function loadBooks(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('.databaseHarga').html(data);
                }).fail(function () {
                    console.log("Failed to load data!");
                });
            }
        });

        $('#m_select2_6').select2({}).on("select2-selecting", function(e) {
            console.log('not working');
        });
        var Select2 = function () {
            var e = function () {
                $("#m_select2_6").select2({
                    placeholder: "Cari Barang",
                    allowClear: !0,
                    ajax: {
                        url: "{{ route('databaseHarga.cari') }}",
                        dataType: "json",
                        delay: 250,
                        processResults: function (data) {
                            return {
                                results: $.map(data.data, function (item) {
                                    return {
                                        text: item.nama_barang,
                                        id: item.id
                                    }
                                })
                            };
                        },
                    },

                    cache: true
                });

            }
            return {
                init: function () {
                    e()
                }
            }
        }();
        jQuery(document).ready(function () {
            Select2.init()
        });
    </script>
@endsection

