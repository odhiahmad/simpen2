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
{{--        <div id="aturUserModal" class="modal fade" role="dialog">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h2 class="modal-title">Atur User</h2>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group m-form__group row">--}}
{{--                                <input type="hidden" name="id_pengadaan" id="id_pengadaan">--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <label class="col-form-label col-lg-3 col-sm-12">--}}
{{--                                        Pilih User--}}
{{--                                    </label>--}}
{{--                                    <select class="col-lg-8 col-md-9 col-sm-12" multiple="multiple" id="user"--}}
{{--                                            name="user[]">--}}
{{--                                        @foreach ($dataUser as $key)--}}
{{--                                            <option value="{{ $key->id }}">--}}
{{--                                                {{ $key->name}}  {{($dataUser->id == $key->id) ?"selected":''}}--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <input type="hidden" name="action" id="action"/>--}}
{{--                            <input type="submit" name="action_button" id="action_button" class="btn btn-warning"--}}
{{--                                   value="Submit"/>--}}
{{--                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}

{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
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
            $(document).on('click', '.aturUser', function () {
                idKontrak = $(this).attr('id');
                $('#form_result').html('');
                $.ajax({
                    url: "/user/monitoring-kontrak/spk/" + idKontrak + "/aturUserEdit",
                    dataType: "json",
                    success: function (html) {
                        $('#id_pengadaan').val(idKontrak);
                        for (let i = 0; i < html.data.length; i++) {
                            $('#user').val(html.data[i].id_user);
                        }
                        $('#action').val('Add')
                        $('#aturUserModal').modal('show');
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
                        name: 'nilai_kontrak',  render: $.fn.dataTable.render.number( ',', '.', 3, 'Rp' )
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
