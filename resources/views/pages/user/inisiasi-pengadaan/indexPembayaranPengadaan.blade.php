@extends('../../../main')
@section('judul_halaman', 'Pembayaran Kontrak')
@section('deskripsi_halaman', 'Data yang berisikan semua data pembayaran kontrak')
@section('content')
    <div class='row'>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <button type="button" class="btn btn-outline-secondary"><i class="fa fa-backward"></i> Back</button>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pembayaran Kontrak</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Harga Penawaran</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Harga Kontrak</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nilai Jaminan Garansi</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Jangka Waktu Penyelesaian</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Melampirkan Seterfikat COO/COM</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">COO/COM Asal Usul</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Penerbit COO/COM</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Melampirkan Seterfikat Garansi</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Penerbit Seterfikat Garansi</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Melampirkan MSDS</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Sistem Denda</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>


                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Simpan</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
