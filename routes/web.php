<?php
use \App\Http\Controllers\JobCard\Spbj\Barang\SpbjBarangController;
use \App\Http\Controllers\JobCard\Spbj\Konstruksi\SpbjKonstruksiController;
use \App\Http\Controllers\JobCard\Spbj\JasaLainnya\SpbjJasaLainnyaController;
use \App\Http\Controllers\JobCard\Spbj\JasaKonstruksi\SpbjJasaKonstruksiController;
use \App\Http\Controllers\JobCard\Spk\Barang\SpkBarangController;
use \App\Http\Controllers\JobCard\Spk\Konstruksi\SpkKonstruksiController;
use \App\Http\Controllers\JobCard\Spk\JasaLainnya\SpkJasaLainnyaController;
use \App\Http\Controllers\JobCard\Spk\JasaKonstruksi\SpkJasaKonstruksiController;

use \App\Http\Controllers\MonitoringKontrak\MkSpbjController;
use \App\Http\Controllers\MonitoringKontrak\MkSpkController;
use \App\Http\Controllers\MonitoringKontrak\MkPjController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('/login', 'UserController@check_login')->name('login.check_login');
Route::get('/logout', 'UserController@logout');;
Route::get('home', 'UserController@redirect')
    ->name('redirect');
Route::group(['prefix'=>'admin','middleware' => ['admin']],function (){

    Route::get('beranda', 'BerandaController@indexAdmin')->name('beranda.admin');
    Route::group(['prefix'=>'user'],function (){

        Route::post('store', 'UserController@store')->name('user.store');
        Route::post('update', 'UserController@update')->name('user.update');
        Route::get('destroy/{id}', 'UserController@destroy');
        Route::get('index', 'UserController@index')->name('user.index');
    });
});

Route::group(['prefix'=>'user','middleware' => ['user']],function (){
    Route::get('beranda', 'BerandaController@index');

    Route::group(['prefix'=>'user'],function (){

        Route::get('{id}/edit', 'UserController@edit');
        Route::post('store', 'UserController@store')->name('user.store');
        Route::post('update', 'UserController@update')->name('user.update');
        Route::get('destroy/{id}', 'UserController@destroy');
        Route::get('index', 'UserController@index')->name('user.index');
    });

    Route::group(['prefix'=>'job-card'],function (){

        Route::group(['prefix'=>'spk'],function (){
            Route::group(['prefix'=>'barang'],function (){
                Route::get('destroy/{id}', [SpkBarangController::class, 'destroy']);
                Route::get('index',  [SpkBarangController::class, 'index']);
                Route::get('pembayaran',  [SpkBarangController::class, 'indexPembayaranPengadaan']);
                Route::get('tambah',  [SpkBarangController::class, 'tambahPengadaan']);

                Route::post('insert',  [SpkBarangController::class, 'store'])->name('job-card.spk.barang.inisiasi-pengadaan.insert');
                Route::post('update',  [SpkBarangController::class, 'updateData'])->name('job-card.spk.barang.inisiasi-pengadaan.update');
                Route::get('update-data/{id}',  [SpkBarangController::class, 'indexUpdateView']);
                Route::post('fetch',  [SpkBarangController::class, 'fetchData'])->name('job-card.spk.barang.fetch');

                Route::get('{id}/info',  [SpkBarangController::class, 'info']);

                Route::get('download-rks/{id}',  [SpkBarangController::class, 'downloadRks']);

                Route::get('download-shp1/{id}',  [SpkBarangController::class, 'downloadShp1']);
                Route::get('download-shp2/{id}',  [SpkBarangController::class, 'downloadShp2']);
                Route::get('download-hps/{id}',  [SpkBarangController::class, 'downloadHps']);
                Route::get('download-uplh/{id}',  [SpkBarangController::class, 'downloadUplh']);

                Route::get('evaluasiDokumen1/{id}',  [SpkBarangController::class, 'downloadEvaluasiDokumen1']);
                Route::get('evaluasiDokumen2/{id}',  [SpkBarangController::class, 'downloadEvaluasiDokumen2']);
                Route::get('evaluasiDokumen3/{id}',  [SpkBarangController::class, 'downloadEvaluasiDokumen3']);

                Route::get('download-ndPenetapan/{id}',  [SpkBarangController::class, 'downloadNdPenetapan']);
                Route::get('download-hasilPengadaan1/{id}',  [SpkBarangController::class, 'downloadHasilPengadaan1']);
                Route::get('download-hasilPengadaan2/{id}',  [SpkBarangController::class, 'downloadHasilPengadaan2']);
                Route::get('download-hasilKlarifikasi1/{id}',  [SpkBarangController::class, 'downloadHasilKlarifikasi1']);
                Route::get('download-hasilKlarifikasi2/{id}',  [SpkBarangController::class, 'downloadHasilKlarifikasi2']);
                Route::get('download-hasilKlarifikasi3/{id}',  [SpkBarangController::class, 'downloadHasilKlarifikasi3']);
                Route::get('download-hasilKlarifikasi4/{id}',  [SpkBarangController::class, 'downloadHasilKlarifikasi4']);
                Route::get('download-spkBarang',  [SpkBarangController::class, 'downloadSpkBarang']);
                Route::get('download-daftarKuantitas',  [SpkBarangController::class, 'downloadDaftarKuantitas']);
            });
            Route::group(['prefix'=>'konstruksi'],function (){
                Route::get('destroy/{id}', [SpkKonstruksiController::class, 'destroy']);
                Route::get('index', [SpkKonstruksiController::class, 'index']);
                Route::get('pembayaran', [SpkKonstruksiController::class, 'indexPembayaranPengadaan']);
                Route::get('tambah', [SpkKonstruksiController::class, 'tambahPengadaan']);

                Route::post('insert', [SpkKonstruksiController::class, 'store'])->name('job-card.spk.konstruksi.inisiasi-pengadaan.insert');
                Route::post('update', [SpkKonstruksiController::class, 'updateData'])->name('job-card.spk.konstruksi.inisiasi-pengadaan.update');
                Route::get('update-data/{id}', [SpkKonstruksiController::class, 'indexUpdateView']);
                Route::post('fetch',  [SpkKonstruksiController::class, 'fetchData'])->name('job-card.spk.konstruksi.fetch');

                Route::get('download-rks/{id}',  [SpkKonstruksiController::class, 'downloadRks']);
                Route::get('download-shp1/{id}', [SpkKonstruksiController::class, 'downloadShp1']);
                Route::get('download-shp2/{id}', [SpkKonstruksiController::class, 'downloadShp2']);
                Route::get('download-hps/{id}', [SpkKonstruksiController::class, 'downloadHps']);
                Route::get('download-uplh/{id}', [SpkKonstruksiController::class, 'downloadUplh']);

                Route::get('evaluasiDokumen1/{id}', [SpkKonstruksiController::class, 'downloadEvaluasiDokumen1']);
                Route::get('evaluasiDokumen2/{id}', [SpkKonstruksiController::class, 'downloadEvaluasiDokumen2']);
                Route::get('evaluasiDokumen3/{id}', [SpkKonstruksiController::class, 'downloadEvaluasiDokumen3']);

                Route::get('download-ndPenetapan/{id}', [SpkKonstruksiController::class, 'downloadNdPenetapan']);
                Route::get('download-hasilPengadaan1/{id}', [SpkKonstruksiController::class, 'downloadHasilPengadaan1']);
                Route::get('download-hasilPengadaan2/{id}', [SpkKonstruksiController::class, 'downloadHasilPengadaan2']);
                Route::get('download-hasilKlarifikasi1/{id}', [SpkKonstruksiController::class, 'downloadHasilKlarifikasi1']);
                Route::get('download-hasilKlarifikasi2/{id}', [SpkKonstruksiController::class, 'downloadHasilKlarifikasi2']);
                Route::get('download-hasilKlarifikasi3/{id}', [SpkKonstruksiController::class, 'downloadHasilKlarifikasi3']);
                Route::get('download-hasilKlarifikasi4/{id}', [SpkKonstruksiController::class, 'downloadHasilKlarifikasi4']);
                Route::get('download-spkBarang', [SpkKonstruksiController::class, 'downloadSpkBarang']);
                Route::get('download-daftarKuantitas', [SpkKonstruksiController::class, 'downloadDaftarKuantitas']);
            });
            Route::group(['prefix'=>'jasa-lainnya'],function (){
                Route::get('destroy/{id}', [SpkJasaLainnyaController::class, 'destroy']);
                Route::get('index', [SpkJasaLainnyaController::class, 'index']);
                Route::get('pembayaran', [SpkJasaLainnyaController::class, 'indexPembayaranPengadaan']);
                Route::get('tambah', [SpkJasaLainnyaController::class, 'tambahPengadaan']);

                Route::post('insert', [SpkJasaLainnyaController::class, 'store'])->name('job-card.spk.jasa-lainnya.inisiasi-pengadaan.insert');
                Route::post('update', [SpkJasaLainnyaController::class, 'updateData'])->name('job-card.spk.jasa-lainnya.inisiasi-pengadaan.update');
                Route::get('update-data/{id}', [SpkJasaLainnyaController::class, 'indexUpdateView']);
                Route::post('fetch',  [SpkJasaLainnyaController::class, 'fetchData'])->name('job-card.spk.jasa-lainnya.fetch');

                Route::get('download-rks/{id}',  [SpkJasaLainnyaController::class, 'downloadRks']);

                Route::get('download-shp1/{id}', [SpkJasaLainnyaController::class, 'downloadShp1']);
                Route::get('download-shp2/{id}', [SpkJasaLainnyaController::class, 'downloadShp2']);
                Route::get('download-hps/{id}', [SpkJasaLainnyaController::class, 'downloadHps']);
                Route::get('download-uplh/{id}', [SpkJasaLainnyaController::class, 'downloadUplh']);

                Route::get('evaluasiDokumen1/{id}', [SpkJasaLainnyaController::class, 'downloadEvaluasiDokumen1']);
                Route::get('evaluasiDokumen2/{id}', [SpkJasaLainnyaController::class, 'downloadEvaluasiDokumen2']);
                Route::get('evaluasiDokumen3/{id}', [SpkJasaLainnyaController::class, 'downloadEvaluasiDokumen3']);

                Route::get('download-ndPenetapan/{id}', [SpkJasaLainnyaController::class, 'downloadNdPenetapan']);
                Route::get('download-hasilPengadaan1/{id}', [SpkJasaLainnyaController::class, 'downloadHasilPengadaan1']);
                Route::get('download-hasilPengadaan2/{id}', [SpkJasaLainnyaController::class, 'downloadHasilPengadaan2']);
                Route::get('download-hasilKlarifikasi1/{id}', [SpkJasaLainnyaController::class, 'downloadHasilKlarifikasi1']);
                Route::get('download-hasilKlarifikasi2/{id}', [SpkJasaLainnyaController::class, 'downloadHasilKlarifikasi2']);
                Route::get('download-hasilKlarifikasi3/{id}', [SpkJasaLainnyaController::class, 'downloadHasilKlarifikasi3']);
                Route::get('download-hasilKlarifikasi4/{id}', [SpkJasaLainnyaController::class, 'downloadHasilKlarifikasi4']);
                Route::get('download-spkBarang', [SpkJasaLainnyaController::class, 'downloadSpkBarang']);
                Route::get('download-daftarKuantitas', [SpkJasaLainnyaController::class, 'downloadDaftarKuantitas']);
            });
            Route::group(['prefix'=>'jasa-konstruksi'],function (){
                Route::get('destroy/{id}', [SpkJasaLainnyaController::class, 'destroy']);
                Route::get('index', [SpkJasaLainnyaController::class, 'index']);
                Route::get('pembayaran', [SpkJasaLainnyaController::class, 'indexPembayaranPengadaan']);
                Route::get('tambah', [SpkJasaLainnyaController::class, 'tambahPengadaan']);

                Route::post('insert', [SpkJasaLainnyaController::class, 'store'])->name('job-card.spk.jasa-konstruksi.inisiasi-pengadaan.insert');
                Route::post('update', [SpkJasaLainnyaController::class, 'updateData'])->name('job-card.spk.jasa-konstruksi.inisiasi-pengadaan.update');
                Route::get('update-data/{id}', [SpkJasaLainnyaController::class, 'indexUpdateView']);
                Route::post('fetch',  [SpkJasaLainnyaController::class, 'fetchData'])->name('job-card.spk.jasa-konstruksi.fetch');

                Route::get('download-rks/{id}',  [SpkJasaLainnyaController::class, 'downloadRks']);
                Route::get('download-shp1/{id}', [SpkJasaLainnyaController::class, 'downloadShp1']);
                Route::get('download-shp2/{id}', [SpkJasaLainnyaController::class, 'downloadShp2']);
                Route::get('download-hps/{id}', [SpkJasaLainnyaController::class, 'downloadHps']);
                Route::get('download-uplh/{id}', [SpkJasaLainnyaController::class, 'downloadUplh']);

                Route::get('evaluasiDokumen1/{id}', [SpkJasaLainnyaController::class, 'downloadEvaluasiDokumen1']);
                Route::get('evaluasiDokumen2/{id}', [SpkJasaLainnyaController::class, 'downloadEvaluasiDokumen2']);
                Route::get('evaluasiDokumen3/{id}', [SpkJasaLainnyaController::class, 'downloadEvaluasiDokumen3']);

                Route::get('download-ndPenetapan/{id}', [SpkJasaLainnyaController::class, 'downloadNdPenetapan']);
                Route::get('download-hasilPengadaan1/{id}', [SpkJasaLainnyaController::class, 'downloadHasilPengadaan1']);
                Route::get('download-hasilPengadaan2/{id}', [SpkJasaLainnyaController::class, 'downloadHasilPengadaan2']);
                Route::get('download-hasilKlarifikasi1/{id}', [SpkJasaLainnyaController::class, 'downloadHasilKlarifikasi1']);
                Route::get('download-hasilKlarifikasi2/{id}', [SpkJasaLainnyaController::class, 'downloadHasilKlarifikasi2']);
                Route::get('download-hasilKlarifikasi3/{id}', [SpkJasaLainnyaController::class, 'downloadHasilKlarifikasi3']);
                Route::get('download-hasilKlarifikasi4/{id}', [SpkJasaLainnyaController::class, 'downloadHasilKlarifikasi4']);
                Route::get('download-spkBarang', [SpkJasaLainnyaController::class, 'downloadSpkBarang']);
                Route::get('download-daftarKuantitas', [SpkJasaLainnyaController::class, 'downloadDaftarKuantitas']);
            });
        });

        Route::group(['prefix'=>'spbj'],function (){
            Route::group(['prefix'=>'barang'],function (){
                Route::get('destroy/{id}', [SpbjBarangController::class, 'destroy']);
                Route::get('index', [SpbjBarangController::class, 'index']);
                Route::get('pembayaran', [SpbjBarangController::class, 'indexPembayaranPengadaan']);
                Route::get('tambah', [SpbjBarangController::class, 'tambahPengadaan']);

                Route::post('insert', [SpbjBarangController::class, 'store'])->name('job-card.spbj.barang.inisiasi-pengadaan.insert');
                Route::post('update', [SpbjBarangController::class, 'updateData'])->name('job-card.spbj.barang.inisiasi-pengadaan.update');
                Route::get('update-data/{id}', [SpbjBarangController::class, 'indexUpdateView']);

                Route::post('fetch',  [SpbjBarangController::class, 'fetchData'])->name('job-card.spbj.barang.fetch');

                Route::get('download-rks/{id}',  [SpbjBarangController::class, 'downloadRks']);
                Route::get('download-shp1/{id}', [SpbjBarangController::class, 'downloadShp1']);
                Route::get('download-shp2/{id}', [SpbjBarangController::class, 'downloadShp2']);
                Route::get('download-hps/{id}', [SpbjBarangController::class, 'downloadHps']);
                Route::get('download-uplh/{id}', [SpbjBarangController::class, 'downloadUplh']);

                Route::get('evaluasiDokumen1/{id}', [SpbjBarangController::class, 'downloadEvaluasiDokumen1']);
                Route::get('evaluasiDokumen2/{id}', [SpbjBarangController::class, 'downloadEvaluasiDokumen2']);
                Route::get('evaluasiDokumen3/{id}', [SpbjBarangController::class, 'downloadEvaluasiDokumen3']);

                Route::get('download-ndPenetapan/{id}', [SpbjBarangController::class, 'downloadNdPenetapan']);
                Route::get('download-hasilPengadaan1/{id}', [SpbjBarangController::class, 'downloadHasilPengadaan1']);
                Route::get('download-hasilPengadaan2/{id}', [SpbjBarangController::class, 'downloadHasilPengadaan2']);
                Route::get('download-hasilKlarifikasi1/{id}', [SpbjBarangController::class, 'downloadHasilKlarifikasi1']);
                Route::get('download-hasilKlarifikasi2/{id}', [SpbjBarangController::class, 'downloadHasilKlarifikasi2']);
                Route::get('download-hasilKlarifikasi3/{id}', [SpbjBarangController::class, 'downloadHasilKlarifikasi3']);
                Route::get('download-hasilKlarifikasi4/{id}', [SpbjBarangController::class, 'downloadHasilKlarifikasi4']);
                Route::get('download-spkBarang', [SpbjBarangController::class, 'downloadSpbjBarang']);
                Route::get('download-daftarKuantitas', [SpbjBarangController::class, 'downloadDaftarKuantitas']);
            });
            Route::group(['prefix'=>'konstruksi'],function (){
                Route::get('destroy/{id}', [SpbjKonstruksiController::class, 'destroy']);
                Route::get('index', [SpbjKonstruksiController::class, 'index']);
                Route::get('pembayaran', [SpbjKonstruksiController::class, 'indexPembayaranPengadaan']);
                Route::get('tambah', [SpbjKonstruksiController::class, 'tambahPengadaan']);

                Route::post('insert', [SpbjKonstruksiController::class, 'store'])->name('job-card.spbj.konstruksi.inisiasi-pengadaan.insert');
                Route::post('update', [SpbjKonstruksiController::class, 'updateData'])->name('job-card.spbj.konstruksi.inisiasi-pengadaan.update');
                Route::get('update-data/{id}', [SpbjKonstruksiController::class, 'indexUpdateView']);

                Route::post('fetch',  [SpbjKonstruksiController::class, 'fetchData'])->name('job-card.spbj.konstruksi.fetch');

                Route::get('download-rks/{id}',  [SpbjKonstruksiController::class, 'downloadRks']);
                Route::get('download-shp1/{id}', [SpbjKonstruksiController::class, 'downloadShp1']);
                Route::get('download-shp2/{id}', [SpbjKonstruksiController::class, 'downloadShp2']);
                Route::get('download-hps/{id}', [SpbjKonstruksiController::class, 'downloadHps']);
                Route::get('download-uplh/{id}', [SpbjKonstruksiController::class, 'downloadUplh']);

                Route::get('evaluasiDokumen1/{id}', [SpbjKonstruksiController::class, 'downloadEvaluasiDokumen1']);
                Route::get('evaluasiDokumen2/{id}', [SpbjKonstruksiController::class, 'downloadEvaluasiDokumen2']);
                Route::get('evaluasiDokumen3/{id}', [SpbjKonstruksiController::class, 'downloadEvaluasiDokumen3']);

                Route::get('download-ndPenetapan/{id}', [SpbjKonstruksiController::class, 'downloadNdPenetapan']);
                Route::get('download-hasilPengadaan1/{id}', [SpbjKonstruksiController::class, 'downloadHasilPengadaan1']);
                Route::get('download-hasilPengadaan2/{id}', [SpbjKonstruksiController::class, 'downloadHasilPengadaan2']);
                Route::get('download-hasilKlarifikasi1/{id}', [SpbjKonstruksiController::class, 'downloadHasilKlarifikasi1']);
                Route::get('download-hasilKlarifikasi2/{id}', [SpbjKonstruksiController::class, 'downloadHasilKlarifikasi2']);
                Route::get('download-hasilKlarifikasi3/{id}', [SpbjKonstruksiController::class, 'downloadHasilKlarifikasi3']);
                Route::get('download-hasilKlarifikasi4/{id}', [SpbjKonstruksiController::class, 'downloadHasilKlarifikasi4']);
                Route::get('download-spkBarang', [SpbjKonstruksiController::class, 'downloadSpbjBarang']);
                Route::get('download-daftarKuantitas', [SpbjKonstruksiController::class, 'downloadDaftarKuantitas']);
            });
            Route::group(['prefix'=>'jasa-lainnya'],function (){
                Route::get('destroy/{id}', [SpbjJasaLainnyaController::class, 'destroy']);
                Route::get('index', [SpbjJasaLainnyaController::class, 'index']);
                Route::get('pembayaran', [SpbjJasaLainnyaController::class, 'indexPembayaranPengadaan']);
                Route::get('tambah', [SpbjJasaLainnyaController::class, 'tambahPengadaan']);

                Route::post('insert', [SpbjJasaLainnyaController::class, 'store'])->name('job-card.spbj.jasa-lainnya.inisiasi-pengadaan.insert');
                Route::post('update', [SpbjJasaLainnyaController::class, 'updateData'])->name('job-card.spbj.jasa-lainnya.inisiasi-pengadaan.update');
                Route::get('update-data/{id}', [SpbjJasaLainnyaController::class, 'indexUpdateView']);
                Route::post('fetch',  [SpbjKonstruksiController::class, 'fetchData'])->name('job-card.spbj.jasa-lainnya.fetch');


                Route::get('download-rks/{id}',  [SpbjJasaLainnyaController::class, 'downloadRks']);
                Route::get('download-shp1/{id}', [SpbjJasaLainnyaController::class, 'downloadShp1']);
                Route::get('download-shp2/{id}', [SpbjJasaLainnyaController::class, 'downloadShp2']);
                Route::get('download-hps/{id}', [SpbjJasaLainnyaController::class, 'downloadHps']);
                Route::get('download-uplh/{id}', [SpbjJasaLainnyaController::class, 'downloadUplh']);

                Route::get('evaluasiDokumen1/{id}', [SpbjJasaLainnyaController::class, 'downloadEvaluasiDokumen1']);
                Route::get('evaluasiDokumen2/{id}', [SpbjJasaLainnyaController::class, 'downloadEvaluasiDokumen2']);
                Route::get('evaluasiDokumen3/{id}', [SpbjJasaLainnyaController::class, 'downloadEvaluasiDokumen3']);

                Route::get('download-ndPenetapan/{id}', [SpbjJasaLainnyaController::class, 'downloadNdPenetapan']);
                Route::get('download-hasilPengadaan1/{id}', [SpbjJasaLainnyaController::class, 'downloadHasilPengadaan1']);
                Route::get('download-hasilPengadaan2/{id}', [SpbjJasaLainnyaController::class, 'downloadHasilPengadaan2']);
                Route::get('download-hasilKlarifikasi1/{id}', [SpbjJasaLainnyaController::class, 'downloadHasilKlarifikasi1']);
                Route::get('download-hasilKlarifikasi2/{id}', [SpbjJasaLainnyaController::class, 'downloadHasilKlarifikasi2']);
                Route::get('download-hasilKlarifikasi3/{id}', [SpbjJasaLainnyaController::class, 'downloadHasilKlarifikasi3']);
                Route::get('download-hasilKlarifikasi4/{id}', [SpbjJasaLainnyaController::class, 'downloadHasilKlarifikasi4']);
                Route::get('download-spkBarang', [SpbjJasaLainnyaController::class, 'downloadSpbjBarang']);
                Route::get('download-daftarKuantitas', [SpbjJasaLainnyaController::class, 'downloadDaftarKuantitas']);
            });
            Route::group(['prefix'=>'jasa-konstruksi'],function (){
                Route::get('destroy/{id}', [SpbjJasaKonstruksiController::class, 'destroy']);
                Route::get('index', [SpbjJasaKonstruksiController::class, 'index']);
                Route::get('pembayaran', [SpbjJasaKonstruksiController::class, 'indexPembayaranPengadaan']);
                Route::get('tambah', [SpbjJasaKonstruksiController::class, 'tambahPengadaan']);

                Route::post('insert', [SpbjJasaKonstruksiController::class, 'store'])->name('job-card.spbj.jasa-konstruksi.inisiasi-pengadaan.insert');
                Route::post('update', [SpbjJasaKonstruksiController::class, 'updateData'])->name('job-card.spbj.jasa-konstruksi.inisiasi-pengadaan.update');
                Route::get('update-data/{id}', [SpbjJasaKonstruksiController::class, 'indexUpdateView']);
                Route::post('fetch',  [SpbjJasaKonstruksiController::class, 'fetchData'])->name('job-card.spbj.jasa-konstruksi.fetch');


                Route::get('download-rks/{id}',  [SpbjJasaKonstruksiController::class, 'downloadRks']);
                Route::get('download-shp1/{id}', [SpbjJasaKonstruksiController::class, 'downloadShp1']);
                Route::get('download-shp2/{id}', [SpbjJasaKonstruksiController::class, 'downloadShp2']);
                Route::get('download-hps/{id}', [SpbjJasaKonstruksiController::class, 'downloadHps']);
                Route::get('download-uplh/{id}', [SpbjJasaKonstruksiController::class, 'downloadUplh']);

                Route::get('evaluasiDokumen1/{id}', [SpbjJasaKonstruksiController::class, 'downloadEvaluasiDokumen1']);
                Route::get('evaluasiDokumen2/{id}', [SpbjJasaKonstruksiController::class, 'downloadEvaluasiDokumen2']);
                Route::get('evaluasiDokumen3/{id}', [SpbjJasaKonstruksiController::class, 'downloadEvaluasiDokumen3']);

                Route::get('download-ndPenetapan/{id}', [SpbjJasaKonstruksiController::class, 'downloadNdPenetapan']);
                Route::get('download-hasilPengadaan1/{id}', [SpbjJasaKonstruksiController::class, 'downloadHasilPengadaan1']);
                Route::get('download-hasilPengadaan2/{id}', [SpbjJasaKonstruksiController::class, 'downloadHasilPengadaan2']);
                Route::get('download-hasilKlarifikasi1/{id}', [SpbjJasaKonstruksiController::class, 'downloadHasilKlarifikasi1']);
                Route::get('download-hasilKlarifikasi2/{id}', [SpbjJasaKonstruksiController::class, 'downloadHasilKlarifikasi2']);
                Route::get('download-hasilKlarifikasi3/{id}', [SpbjJasaKonstruksiController::class, 'downloadHasilKlarifikasi3']);
                Route::get('download-hasilKlarifikasi4/{id}', [SpbjJasaKonstruksiController::class, 'downloadHasilKlarifikasi4']);
                Route::get('download-spkBarang', [SpbjJasaKonstruksiController::class, 'downloadSpbjBarang']);
                Route::get('download-daftarKuantitas', [SpbjJasaKonstruksiController::class, 'downloadDaftarKuantitas']);
            });
        });
        Route::group(['prefix'=>'pj'],function (){

        });
    });

    Route::group(['prefix'=>'perusahaan'],function (){
        Route::get('{id}/edit', 'PerusahaanController@edit');
        Route::post('store', 'PerusahaanController@store')->name('perusahaan.store');
        Route::post('update', 'PerusahaanController@update')->name('perusahaan.update');
        Route::get('destroy/{id}', 'PerusahaanController@destroy');
        Route::get('index', 'PerusahaanController@index')->name('perusahaan.index');
    });

    Route::group(['prefix'=>'monitoring-kontrak'],function (){
        Route::group(['prefix'=>'pj'],function (){
            Route::get('{id}/aturUserEdit', [MkPjController::class,'aturUserEdit']);
            Route::get('index', [MkPjController::class,'index']);
            Route::post('uploadDoc', [MkPjController::class,'uploadDoc'])->name('monitoringKontrak.pj.uploadDoc');
            Route::post('aturUser', [MkPjController::class,'aturUser'])->name('monitoringKontrak.pj.aturUser');
            Route::post('convertPdf', [MkPjController::class,'convertPdf'])->name('monitoringKontrak.pj.convertPdf');
            Route::post('hapusTemp', [MkPjController::class,'hapusTemp'])->name('monitoringKontrak.pj.hapusTemp');
            Route::get('downloadKontrak/{id}', [MkPjController::class,'downloadKontrak'])->name('monitoringKontrak.pj.downloadKontrak');
            Route::get('downloadProses/{id}', [MkPjController::class,'downloadProses'])->name('monitoringKontrak.pj.downloadProses');
        });
        Route::group(['prefix'=>'spk'],function (){
            Route::get('{id}/aturUserEdit', [MkSpkController::class,'aturUserEdit']);
            Route::get('index', [MkSpkController::class,'index']);
            Route::post('uploadDoc', [MkSpkController::class,'uploadDoc'])->name('monitoringKontrak.spk.uploadDoc');
            Route::post('aturUser', [MkSpkController::class,'aturUser'])->name('monitoringKontrak.spk.aturUser');
            Route::post('convertPdf', [MkSpkController::class,'convertPdf'])->name('monitoringKontrak.spk.convertPdf');
            Route::post('hapusTemp', [MkSpkController::class,'hapusTemp'])->name('monitoringKontrak.spk.hapusTemp');
            Route::get('downloadKontrak/{id}', [MkSpkController::class,'downloadKontrak'])->name('monitoringKontrak.spk.downloadKontrak');
            Route::get('downloadProses/{id}', [MkSpkController::class,'downloadProses'])->name('monitoringKontrak.spk.downloadProses');
        });
        Route::group(['prefix'=>'spbj'],function (){
            Route::get('{id}/aturUserEdit', [MkSpbjController::class,'aturUserEdit']);
            Route::get('index', [MkSpbjController::class,'index']);
            Route::post('uploadDoc', [MkSpbjController::class,'uploadDoc'])->name('monitoringKontrak.spbj.uploadDoc');
            Route::post('aturUser', [MkSpbjController::class,'aturUser'])->name('monitoringKontrak.spbj.aturUser');
            Route::post('convertPdf', [MkSpbjController::class,'convertPdf'])->name('monitoringKontrak.spbj.convertPdf');
            Route::post('hapusTemp', [MkSpbjController::class,'hapusTemp'])->name('monitoringKontrak.spbj.hapusTemp');
            Route::get('downloadKontrak/{id}', [MkSpbjController::class,'downloadKontrak'])->name('monitoringKontrak.spbj.downloadKontrak');
            Route::get('downloadProses/{id}', [MkSpbjController::class,'downloadProses'])->name('monitoringKontrak.spbj.downloadProses');
        });

    });



    Route::group(['prefix'=>'database-harga'],function (){

        Route::get('index', 'DatabaseHargaController@index');
        Route::get('ubah/{id}', 'DatabaseHargaController@indexUbahHarga');
        Route::get('detail/{id}', 'DatabaseHargaController@indexDetailHarga');
        Route::get('history/{id}', 'DatabaseHargaController@indexHistoryHarga')->name('databaseHarga.history');
        Route::get('tambah', 'DatabaseHargaController@indexTambah');
        Route::get('/cari', 'DatabaseHargaController@cari')->name('databaseHarga.cari');

        Route::get('destroy/{id}', 'DatabaseHargaController@destroy');
        Route::post('insert', 'DatabaseHargaController@store')->name('databaseHarga.insert');
        Route::post('ubahAksi', 'DatabaseHargaController@update')->name('databaseHarga.ubahAksi');
    });

    Route::group(['prefix'=>'inisiasi-pengadaan-sipil'],function (){
        Route::get('pengadaan-sipil', 'InisiasiPengadaanSipilController@pengadaanSipil');
        Route::get('data-master', 'InisiasiPengadaanSipilController@dataMaster');
    });
    Route::resource('databaseHargaData','DatabaseHargaController');
});

