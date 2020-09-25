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
                    <example-component></example-component>
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
                                        <a href="#"
                                           class="m-portlet__nav-link btn btn-secondary m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                                            <i class="la la-tint"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-4 col-sm-12">

                            </label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <form id="sample_form" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- Name/Description fields, irrelevant for this article --}}

                                    <div class="form-group">
                                        <label for="document">Documents</label>
                                        <div class="needsclick dropzone" id="document-dropzone">

                                        </div>
                                    </div>
                                    <div>
                                        <input type="submit" value="Submit" name="action_button" id="action_button"
                                               class="btn btn-success">
                                    </div>
                                </form>
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

            $('#sample_form').on('submit', function (event) {
                event.preventDefault();
                if ($('#action_button').val() == 'Submit') {
                    $.ajax({
                        url: "{{ route('dataKontrak.convertPdf') }}",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            if (data.success) {


                            }


                        }
                    });

                }
            });
        });
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('dataKontrak.uploadDoc') }}',
            maxFilesize: 2, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="name" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($project) && $project->document)
                var files =
                {!! json_encode($project->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }
    </script>
@section('scripts')
    <script src="{{ asset('watermark.js') }}" charset="utf-8"></script>
@endsection
@endsection
