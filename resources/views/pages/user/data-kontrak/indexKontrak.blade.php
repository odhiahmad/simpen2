@section('title','Data Kontrak')
@extends('../../../main')
@section('content')
    <div>
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Data Kontrak
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
                                    Data Kontrak
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="m-content">
            <div class="row">

                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="flaticon-statistics"></i>
                                                </span>
                                    <h3 class="m-portlet__head-text">
                                        Upload dokumen yang Anda ingin beri watermark di sini!
                                    </h3>
                                    <h2 class="m-portlet__head-label m-portlet__head-label--info">
                                                    <span>
                                                        Watermark Kontrak
                                                    </span>
                                    </h2>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a href="#" class="m-portlet__nav-link btn btn-secondary m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                                            <i class="la la-tint"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group">
                                <label for="exampleInputEmail1">
                                    Pilih Dokumen
                                </label>
                                <div></div>
                                <label class="custom-file">
                                    <input type="file" id="file2" class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                            <div class="m-form__actions">
                                <button type="reset" class="btn btn-primary">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    Cancel
                                </button>
                            </div>

                        </div>


                    </div>

                    <!--end::Portlet-->
                    <!--begin::Portlet-->

                    <!--end::Portlet-->
                    <!--begin::Portlet-->

                    <!--end::Portlet-->
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
                    url: "/user/data-kontrak/index",
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
                        data: 'jenis',
                        name: 'jenis',
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
