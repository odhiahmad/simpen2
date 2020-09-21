@extends('../../../main')
@section('judul_halaman', 'Data Master')
@section('deskripsi_halaman', 'Data yang berisikan semua data kontrak')
@section('content')
    <div class='row'>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <button type="button" class="btn btn-outline-secondary"><i class="fa fa-plus"></i> Tambah Data Kontrak</button>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Responsive Hover Table</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>No</th>
                            <th>Pekerjaan</th>
                            <th>vol</th>
                            <th>sat</th>
                            <th>Harga</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Pembersihan</td>
                            <td><span class="label label-info">648</span></td>
                            <td><span class="label label-success">m2</span></td>
                            <td><span class="label label-warning">Rp.7.250</span></td>
                            <td><span class="label label-warning">Rp.4.689.000</span></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-dashcube"></i> Detail</button>
                                <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-dollar"></i> Pembayaran</button>
                            </td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Pembersihan</td>
                            <td><span class="label label-info">648</span></td>
                            <td><span class="label label-success">m2</span></td>
                            <td><span class="label label-warning">Rp.7.250</span></td>
                            <td><span class="label label-warning">Rp.4.689.000</span></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-dashcube"></i> Detail</button>
                                <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-dollar"></i> Pembayaran</button>
                            </td>

                        </tr>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
