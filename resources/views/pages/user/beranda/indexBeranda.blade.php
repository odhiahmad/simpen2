@section('title','Beranda')
@extends('../../../main')
@section('content')
    <div>
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Beranda
                    </h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href='{!! url('admin/beranda'); !!}' class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="m-content">
            <div class="m-portlet">
                <div class="m-portlet__body m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <!--begin::Total Profit-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">Total Produk</h4>
                                    <br />
                                    <span class="m-widget24__desc">
                          di Database Harga
                        </span>
                                    <span class="m-widget24__stats m--font-brand">
                          4
                        </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                        <div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="m-widget24__change"> Change </span>
                                    <span class="m-widget24__number"> 78% </span>
                                </div>
                            </div>
                            <!--end::Total Profit-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <!--begin::New Feedbacks-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">Kontrak Baru</h4>
                                    <br />
                                    <span class="m-widget24__desc">
                          di Inisiasi Pengadaan
                        </span>
                                    <span class="m-widget24__stats m--font-info">
                          26
                        </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                        <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="m-widget24__change"> Change </span>
                                    <span class="m-widget24__number"> 84% </span>
                                </div>
                            </div>
                            <!--end::New Feedbacks-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <!--begin::New Orders-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">Kontrak Dalam Proses</h4>
                                    <br />
                                    <span class="m-widget24__desc">
                          di Inisiasi Pengadaan
                        </span>
                                    <span class="m-widget24__stats m--font-danger">
                          567
                        </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                        <div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="m-widget24__change"> Change </span>
                                    <span class="m-widget24__number"> 69% </span>
                                </div>
                            </div>
                            <!--end::New Orders-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <!--begin::New Users-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">Kontrak Selesai</h4>
                                    <br />
                                    <span class="m-widget24__desc">
                          di Inisiasi Pengadaan
                        </span>
                                    <span class="m-widget24__stats m--font-success">
                          276
                        </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                        <div class="progress-bar m--bg-success" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="m-widget24__change"> Change </span>
                                    <span class="m-widget24__number"> 90% </span>
                                </div>
                            </div>
                            <!--end::New Users-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
