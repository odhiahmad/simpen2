<?php

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
    Route::group(['prefix'=>'inisiasi-pengadaan'],function (){
        Route::get('index', 'InisiasiPengadaanController@index');
        Route::get('pembayaran', 'InisiasiPengadaanController@indexPembayaranPengadaan');
        Route::get('tambah', 'InisiasiPengadaanController@tambahPengadaan');

        Route::post('insert', 'InisiasiPengadaanController@store')->name('inisiasi-pengadaan.insert');

        Route::post('update', 'InisiasiPengadaanController@updateData')->name('inisiasi-pengadaan.update');
        Route::get('update-data/{id}', 'InisiasiPengadaanController@indexUpdateView');


        Route::get('download-shp1/{id}', 'InisiasiPengadaanController@downloadShp1');
        Route::get('download-shp2/{id}', 'InisiasiPengadaanController@downloadShp2');

        Route::get('download-hps/{id}', 'InisiasiPengadaanController@downloadHps');

        Route::get('download-uplh/{id}', 'InisiasiPengadaanController@downloadUplh');

        Route::get('evaluasiDokumen1/{id}', 'InisiasiPengadaanController@downloadEvaluasiDokumen1');
        Route::get('evaluasiDokumen2/{id}', 'InisiasiPengadaanController@downloadEvaluasiDokumen2');
        Route::get('evaluasiDokumen3/{id}', 'InisiasiPengadaanController@downloadEvaluasiDokumen3');

        Route::get('download-ndPenetapan/{id}', 'InisiasiPengadaanController@downloadNdPenetapan');

        Route::get('download-hasilPengadaan1/{id}', 'InisiasiPengadaanController@downloadHasilPengadaan1');
        Route::get('download-hasilPengadaan2/{id}', 'InisiasiPengadaanController@downloadHasilPengadaan2');

        Route::get('download-hasilKlarifikasi1/{id}', 'InisiasiPengadaanController@downloadHasilKlarifikasi1');
        Route::get('download-hasilKlarifikasi2/{id}', 'InisiasiPengadaanController@downloadHasilKlarifikasi2');
        Route::get('download-hasilKlarifikasi3/{id}', 'InisiasiPengadaanController@downloadHasilKlarifikasi3');
        Route::get('download-hasilKlarifikasi4/{id}', 'InisiasiPengadaanController@downloadHasilKlarifikasi4');
    });



    Route::group(['prefix'=>'data-kontrak'],function (){
        Route::get('index', 'DataKontrakController@index');
        Route::post('uploadDoc', 'DataKontrakController@uploadDoc')->name('dataKontrak.uploadDoc');
        Route::post('convertPdf', 'DataKontrakController@convertPdf')->name('dataKontrak.convertPdf');
        Route::post('hapusTemp', 'DataKontrakController@hapusTemp')->name('dataKontrak.hapusTemp');
        Route::get('downloadKontrak/{id}', 'DataKontrakController@downloadKontrak')->name('dataKontrak.downloadKontrak');
        Route::get('downloadProses/{id}', 'DataKontrakController@downloadProses')->name('dataKontrak.downloadProses');
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

