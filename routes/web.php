<?php

use \App\Http\Controllers\JobCardController;
use \App\Http\Controllers\JobCard\Pj\UpdateControllerPj;
use \App\Http\Controllers\JobCard\Pj\ViewUpdateControllerPj;
use \App\Http\Controllers\JobCard\Spbj\UpdateControllerSpbj;
use \App\Http\Controllers\JobCard\Spbj\ViewUpdateControllerSpbj;


use \App\Http\Controllers\PengadaanSipil\PekerjaanController;
use \App\Http\Controllers\PengadaanSipil\SubPekerjaanController;

use \App\Http\Controllers\JobCard\JobCardPjController;
use \App\Http\Controllers\JobCard\JobCardSpbjController;

use \App\Http\Controllers\JobCard\Spk\DownloadControllerSpk;
use \App\Http\Controllers\JobCard\Pj\DownloadControllerPj;
use \App\Http\Controllers\JobCard\Spbj\DownloadControllerSpbj;

use \App\Http\Controllers\PengadaanSipil\PengadaanSipilController;

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

    Route::group(['prefix'=>'jobcard'],function (){
        Route::group(['prefix'=>'mj'],function () {
            Route::get('index', [JobCardSpbjController::class, 'indexMonitoring']);
        });

        Route::group(['prefix'=>'pj'],function (){
            Route::get('destroy/{id}', [JobCardPjController::class, 'destroy']);
            Route::get('index',  [JobCardPjController::class, 'index']);
            Route::get('tambah',  [JobCardPjController::class, 'tambahPengadaan']);

            Route::post('insert',  [JobCardPjController::class, 'store'])->name('jobcard.pj.insert');
            Route::post('update',  [JobCardPjController::class, 'updateData'])->name('jobcard.pj.update');


            Route::post('updateTeka1',  [UpdateControllerPj::class, 'updateDataTeka1'])->name('jobcard.pj.updateTeka1');
            Route::post('updateTeka2',  [UpdateControllerPj::class, 'updateDataTeka2'])->name('jobcard.pj.updateTeka2');
            Route::post('updateTetas1',  [UpdateControllerPj::class, 'updateDataTetas1'])->name('jobcard.pj.updateTetas1');
            Route::post('updateTetas2',  [UpdateControllerPj::class, 'updateDataTetas2'])->name('jobcard.pj.updateTetas2');

            Route::get('update-data-pj-2/teka1/{id}/{id1}/{id2}',  [ViewUpdateControllerPj::class, 'indexUpdateViewTeka1']);
            Route::get('update-data-pj-2/teka2/{id}/{id1}/{id2}',  [ViewUpdateControllerPj::class, 'indexUpdateViewTeka2']);
            Route::get('update-data-pj-2/tetas1/{id}/{id1}/{id2}',  [ViewUpdateControllerPj::class, 'indexUpdateViewTetas1']);
            Route::get('update-data-pj-2/tetas2/{id}/{id1}/{id2}',  [ViewUpdateControllerPj::class, 'indexUpdateViewTetas2']);


            Route::post('fetch',  [JobCardPjController::class, 'fetchData'])->name('jobcard.pj.fetch');
            Route::post('fetchJenis1',  [JobCardPjController::class, 'fetchDataJenis1'])->name('jobcard.pj.fetchJenis1');

            // Route::post('fetchJenis1',  [JobCardPjController::class, 'fetchDataJenis1'])->name('jobcard.pj.fetchTempatPenyerahan');

            Route::post('fetchAlamatPenyerahan',  [JobCardPjController::class, 'fetchAlamatPenyerahan'])->name('jobcard.pj.getAlamatPenyerahan');

            Route::get('{id}/info',  [JobCardPjController::class, 'info']);

            Route::get('download-shp1/{id}',  [DownloadControllerPj::class, 'downloadSurveyHargaPasar']);
            Route::get('download-shp2/{id}',  [DownloadControllerPj::class, 'downloadSurveyHargaPasar2']);
            Route::get('download-rks/{id}',  [DownloadControllerPj::class, 'downloadRks']);
            Route::get('download-hps/{id}',  [DownloadControllerPj::class, 'downloadHps']);
            Route::get('downloadPengumuman/{id}',  [DownloadControllerPj::class, 'downloadPengumuman']);
            Route::get('download-und-cda/{id}',  [DownloadControllerPj::class, 'downloadUndanganCda']);
            Route::get('download-berita-acara-cda/{id}',  [DownloadControllerPj::class, 'downloadBeritaAcaraCda']);
            Route::get('download-daftar-hadir-pelaksana-cda/{id}',  [DownloadControllerPj::class, 'downloadDaftarHadirPelaksanaCda']);
            Route::get('download-daftar-hadir-penyedia-cda/{id}',  [DownloadControllerPj::class, 'downloadDaftarHadirPenyediaCda']);
            Route::get('download-nd-usulan-calon/{id}',  [DownloadControllerPj::class, 'downloadNdUsulanCalon']);
            Route::get('download-nd-penetapan-pemenang/{id}',  [DownloadControllerPj::class, 'downloadNdPenetapanPemenang']);
            Route::get('download-laporan-hasil-evaluasi/{id}',  [DownloadControllerPj::class, 'downloadLaporanHasilEvaluasi']);

            Route::get('download-undangan-hasil-klarifikasi/{id}',  [DownloadControllerPj::class, 'downloadUndanganHasilKlarifikasi']);
            Route::get('download-form-daftar-hadir-penyedia/{id}',  [DownloadControllerPj::class, 'downloadDaftarHadirPenyediaKlarifikasi']);
            Route::get('download-form-daftar-hadir-pelaksana/{id}',  [DownloadControllerPj::class, 'downloadDaftarHadirPelaksanaKlarifikasi']);

            Route::get('download-berita-acara-klarifikasi/{id}',  [DownloadControllerPj::class, 'downloadBeritaAcaraKlarifikasi']);
            Route::get('download-rekapitulasi/{id}',  [DownloadControllerPj::class, 'downloadRekapitulasi']);

            Route::get('download-asman/{id}',  [DownloadControllerPj::class, 'downloadAsman']);
            Route::get('download-penjelasan/{id}',  [DownloadControllerPj::class, 'downloadPenjelasan']);
            Route::get('download-aanwijzing-form/{id}',  [DownloadControllerPj::class, 'downloadAanwijzingForm']);
            Route::get('download-aanwijzing-berita-acara/{id}',  [DownloadControllerPj::class, 'downloadAanwijzingBeritaAcara']);
            Route::get('download-aanwijzing-daftar-hadir-penyedia/{id}',  [DownloadControllerPj::class, 'downloadAanwijzingDaftarHadir']);

            Route::get('download-addendum/{id}',  [DownloadControllerPj::class, 'downloadAddendum']);

            Route::get('download-pembukaan1-ba/{id}',  [DownloadControllerPj::class, 'downloadPembukaan1Ba']);
            Route::get('download-pembukaan1-catatan/{id}',  [DownloadControllerPj::class, 'downloadPembukaan1Catatan']);
            Route::get('download-pembukaan1-pelaksana/{id}',  [DownloadControllerPj::class, 'downloadPembukaan1Pelaksana']);
            Route::get('download-pembukaan1-penyedia/{id}',  [DownloadControllerPj::class, 'downloadPembukaan1Penyedia']);

            Route::get('download-eva1-daftar-hadir/{id}',  [DownloadControllerPj::class, 'downloadEva1Hadir']);
            Route::get('download-eva1-hasil-penilaian/{id}',  [DownloadControllerPj::class, 'downloadEva1Penilaian']);
            Route::get('download-eva1-rekap-hasil/{id}',  [DownloadControllerPj::class, 'downloadEva1Hasil']);
            Route::get('download-eva1-pengumuman/{id}',  [DownloadControllerPj::class, 'downloadEva1Pengumuman']);

            Route::get('download-pembukaan2-ba/{id}',  [DownloadControllerPj::class, 'downloadPembukaan2Ba']);
            Route::get('download-pembukaan2-undangan/{id}',  [DownloadControllerPj::class, 'downloadPembukaan2Undangan']);
            Route::get('download-pembukaan2-pelaksana/{id}',  [DownloadControllerPj::class, 'downloadPembukaan2Pelaksana']);
            Route::get('download-pembukaan2-penyedia/{id}',  [DownloadControllerPj::class, 'downloadPembukaan2Penyedia']);

            Route::get('download-eva2-daftar-hadir/{id}',  [DownloadControllerPj::class, 'downloadEva2Hadir']);
            Route::get('download-eva2-hasil-penilaian/{id}',  [DownloadControllerPj::class, 'downloadEva2Penilaian']);
            Route::get('download-eva2-rekap-hasil/{id}',  [DownloadControllerPj::class, 'downloadEva2Hasil']);
            Route::get('download-eva2-catatan-koreksi/{id}',  [DownloadControllerPj::class, 'downloadEva2CatatanKoreksi']);
            Route::get('download-eva2-pengumuman/{id}',  [DownloadControllerPj::class, 'downloadEva2Pengumuman']);

            Route::get('download-undangan-pembuktian/{id}',  [DownloadControllerPj::class, 'downloadUndanganPembuktian']);

            Route::get('download-skpp/{id}',  [DownloadControllerPj::class, 'downloadSkpp']);
            Route::get('download-sppbj/{id}',  [DownloadControllerPj::class, 'downloadSppbj']);

            Route::get('download-pengumuman-calon/{id}',  [DownloadControllerPj::class, 'downloadPengumumanCalon']);

            Route::get('download-pembuktian-undangan/{id}',  [DownloadControllerPj::class, 'downloadPembuktianUndangan']);
            Route::get('download-pembuktian-daftar-penyedia/{id}',  [DownloadControllerPj::class, 'downloadPembuktianDaftarPenyedia']);
            Route::get('download-pembuktian-daftar-pelaksana/{id}',  [DownloadControllerPj::class, 'downloadPembuktianDaftarPelaksana']);
            Route::get('download-pembuktian-hasil/{id}',  [DownloadControllerPj::class, 'downloadPembuktianHasil']);
            Route::get('download-pembuktian-rekap/{id}',  [DownloadControllerPj::class, 'downloadPembuktianRekap']);

            Route::get('download-pemasukan-penawaran/{id}',  [DownloadControllerPj::class, 'downloadPemasukanPenawaran']);

            Route::get('download-pembukaan-penawaran-ba/{id}',  [DownloadControllerPj::class, 'downloadPembukaanPenawaranBa']);
            Route::get('download-pembukaan-penawaran-catatan/{id}',  [DownloadControllerPj::class, 'downloadPembukaanPenawaranCatatan']);
            Route::get('download-pembukaan-penawaran-pelaksana/{id}',  [DownloadControllerPj::class, 'downloadPembukaanPenawaranPelaksana']);
            Route::get('download-pembukaan-penawaran-penyedia/{id}',  [DownloadControllerPj::class, 'downloadPembukaanPenawaranPenyedia']);

            Route::get('download-eva-penawaran-ba/{id}',  [DownloadControllerPj::class, 'downloadEvaPenawaranBa']);
            Route::get('download-eva-penawaran-catatan/{id}',  [DownloadControllerPj::class, 'downloadEvaPenawaranCatatan']);
            Route::get('download-eva-penawaran-daftar/{id}',  [DownloadControllerPj::class, 'downloadEvaPenawaranDaftar']);
            Route::get('download-eva-penawaran-rekap/{id}',  [DownloadControllerPj::class, 'downloadEvaPenawaranRekap']);
            Route::get('download-eva-penawaran-rekap-hasil/{id}',  [DownloadControllerPj::class, 'downloadEvaPenawaranRekapHasil']);




        });
        Route::group(['prefix'=>'spbj'],function (){
            Route::get('destroy/{id}', [JobCardSpbjController::class, 'destroy']);
            Route::get('index',  [JobCardSpbjController::class, 'index']);
            Route::get('pembayaran',  [JobCardSpbjController::class, 'indexPembayaranPengadaan']);
            Route::get('tambah',  [JobCardSpbjController::class, 'tambahPengadaan']);

            Route::post('insert',  [JobCardSpbjController::class, 'store'])->name('jobcard.spbj.insert');
            Route::post('update',  [UpdateControllerSpbj::class, 'updateData'])->name('jobcard.spbj.update');
            Route::get('update-data/{id}/{id1}/{id2}',  [ViewUpdateControllerSpbj::class, 'indexUpdateView']);

            Route::post('fetch',  [JobCardSpbjController::class, 'fetchData'])->name('jobcard.spbj.fetch');
            Route::post('fetchJenis1',  [JobCardSpbjController::class, 'fetchDataJenis1'])->name('jobcard.spbj.fetchJenis1');
            Route::post('fetchAlamatPenyerahan',  [JobCardSpbjController::class, 'fetchAlamatPenyerahan'])->name('jobcard.spbj.getAlamatPenyerahan');

            Route::get('{id}/info',  [JobCardSpbjController::class, 'info']);

            Route::get('download-rks/{id}',  [DownloadControllerSpbj::class, 'downloadRks']);

            Route::get('download-shp1/{id}',  [DownloadControllerSpbj::class, 'downloadSurveyHargaPasar']);
            Route::get('download-shp2/{id}',  [DownloadControllerSpbj::class, 'downloadSurveyHargaPasar2']);
            Route::get('download-hps/{id}',  [JobCardController::class, 'downloadHps']);
            Route::get('download-uplh/{id}',  [DownloadControllerSpbj::class, 'downloadUpl']);

            Route::get('evaluasiDokumen1/{id}',  [DownloadControllerSpbj::class, 'downloadEvaluasiDokumen1']);
            Route::get('evaluasiDokumen2/{id}',  [DownloadControllerSpbj::class, 'downloadEvaluasiDokumen2']);
            Route::get('evaluasiDokumen3/{id}',  [DownloadControllerSpbj::class, 'downloadEvaluasiDokumen3']);

            Route::get('download-pemasukan-penawaran/{id}',  [DownloadControllerSpbj::class, 'downloadPemasukanPenawaran']);

            Route::get('downloadSpbj/{id}',  [DownloadControllerSpbj::class, 'downloadSpbj']);
            Route::get('download-ndPenetapan/{id}',  [DownloadControllerSpbj::class, 'downloadNdUsulanTetapPemenang']);
            Route::get('download-hasilPengadaan1/{id}',  [DownloadControllerSpbj::class, 'downloadBaHasilPengadaanLangsung1']);
            Route::get('download-hasilPengadaan2/{id}',  [DownloadControllerSpbj::class, 'downloadBaHasilPengadaanLangsung2']);
        
            Route::get('download-spk/{id}',  [DownloadControllerSpbj::class, 'downloadSpk']);
            Route::get('download-daftarKuantitas',  [JobCardController::class, 'downloadDaftarKuantitas']);

            Route::get('download-berita-acara-klarifikasi/{id}',  [DownloadControllerSpbj::class, 'downloadBeritaAcaraKlarifikasi']);
          

        });
        Route::group(['prefix'=>'spk'],function (){
            Route::get('destroy/{id}', [JobCardController::class, 'destroy']);
            Route::get('index',  [JobCardController::class, 'index']);
            Route::get('pembayaran',  [JobCardController::class, 'indexPembayaranPengadaan']);
            Route::get('tambah',  [JobCardController::class, 'tambahPengadaan']);

            Route::post('insert',  [JobCardController::class, 'store'])->name('jobcard.spk.insert');
            Route::post('update',  [JobCardController::class, 'updateData'])->name('jobcard.spk.update');
            Route::get('update-data/{id}',  [JobCardController::class, 'indexUpdateView']);
            Route::get('update-data-spk-1/{id}/{id1}/{id2}',  [JobCardController::class, 'indexUpdateView']);
            Route::get('update-data-spk-2/{id}/{id1}/{id2}',  [JobCardController::class, 'indexUpdateView']);
            Route::get('update-data-spk-3/{id}/{id1}/{id2}',  [JobCardController::class, 'indexUpdateView']);
            Route::get('update-data-spk-4/{id}/{id1}/{id2}',  [JobCardController::class, 'indexUpdateView']);

            Route::post('fetch',  [JobCardController::class, 'fetchData'])->name('jobcard.spk.fetch');
            Route::post('fetchJenis1',  [JobCardController::class, 'fetchDataJenis1'])->name('jobcard.spk.fetchJenis1');

            Route::get('{id}/info',  [JobCardController::class, 'info']);

            Route::get('download-rks/{id}',  [DownloadControllerSpk::class, 'downloadRks']);

            Route::get('download-shp1/{id}',  [DownloadControllerSpk::class, 'downloadSurveyHargaPasar']);
            Route::get('download-shp2/{id}',  [DownloadControllerSpk::class, 'downloadSurveyHargaPasar2']);
            Route::get('download-hps/{id}',  [JobCardController::class, 'downloadHps']);
            Route::get('download-uplh/{id}',  [DownloadControllerSpk::class, 'downloadUpl']);

            Route::get('evaluasiDokumen1/{id}',  [DownloadControllerSpk::class, 'downloadEvaluasiDokumen1']);
            Route::get('evaluasiDokumen2/{id}',  [DownloadControllerSpk::class, 'downloadEvaluasiDokumen2']);
            Route::get('evaluasiDokumen3/{id}',  [DownloadControllerSpk::class, 'downloadEvaluasiDokumen3']);

            Route::get('download-ndPenetapan/{id}',  [DownloadControllerSpk::class, 'downloadNdUsulanTetapPemenang']);
            Route::get('download-hasilPengadaan1/{id}',  [DownloadControllerSpk::class, 'downloadBaHasilPengadaanLangsung1']);
            Route::get('download-hasilPengadaan2/{id}',  [DownloadControllerSpk::class, 'downloadBaHasilPengadaanLangsung2']);
            Route::get('download-hasilKlarifikasi1/{id}',  [DownloadControllerSpk::class, 'downloadBaHasilKlarifikasi1']);
            Route::get('download-hasilKlarifikasi2/{id}',  [DownloadControllerSpk::class, 'downloadBaHasilKlarifikasi2']);
            Route::get('download-hasilKlarifikasi3/{id}',  [JobCardController::class, 'downloadHasilKlarifikasi3']);
            Route::get('download-hasilKlarifikasi4/{id}',  [DownloadControllerSpk::class, 'downloadBaHasilKlarifikasi4']);
            Route::get('download-spk/{id}',  [DownloadControllerSpk::class, 'downloadSpk']);
            Route::get('download-daftarKuantitas',  [JobCardController::class, 'downloadDaftarKuantitas']);
        });


    });

    Route::group(['prefix'=>'dpt'],function (){
        Route::get('{id}/edit', 'PerusahaanController@edit');
        Route::post('store', 'PerusahaanController@store')->name('dpt.store');
        Route::post('update', 'PerusahaanController@update')->name('dpt.update');
        Route::get('destroy/{id}', 'PerusahaanController@destroy');
        Route::get('index', 'PerusahaanController@index')->name('dpt.index');
    });

    Route::group(['prefix'=>'monitoring-kontrak'],function (){
        Route::group(['prefix'=>'pj'],function (){
            Route::get('{id}/direksi',  [MkPjController::class, 'direksi']);
            Route::get('{id}/tanggalKontrak',  [MkPjController::class, 'tanggalKontrak']);
            Route::get('{id}/hargaKontrak',  [MkPjController::class, 'hargaKontrak']);
            Route::get('aturUserDireksiView/{role}', [MkPjController::class,'aturUserDireksiView']);
            Route::get('aturUserDireksiViewAkses/{id}/{role}', [MkPjController::class,'aturUserDireksiViewAkses']);
            Route::get('tambahkanUserAksesDireksi/{id}/{idP}', [MkPjController::class,'tambahkanUserAksesDireksi']);
            Route::get('hapusUserAksesDireksi/{id}', [MkPjController::class,'hapusUserAksesDireksi']);


            Route::get('{id}/aturUserEdit', [MkPjController::class,'aturUserEdit']);
            Route::get('index', [MkPjController::class,'index']);
            Route::post('uploadDoc', [MkPjController::class,'uploadDoc'])->name('monitoringKontrak.pj.uploadDoc');
            Route::post('aturUser', [MkPjController::class,'aturUser'])->name('monitoringKontrak.pj.aturUser');
            Route::post('convertPdf', [MkPjController::class,'convertPdf'])->name('monitoringKontrak.pj.convertPdf');
            Route::post('hapusTemp', [MkPjController::class,'hapusTemp'])->name('monitoringKontrak.pj.hapusTemp');
            Route::get('downloadKontrak/{idP}/{id}', [MkPjController::class,'downloadKontrak'])->name('monitoringKontrak.pj.downloadKontrak');
            Route::get('downloadProses/{idP}/{id}', [MkPjController::class,'downloadProses'])->name('monitoringKontrak.pj.downloadProses');
        });
        Route::group(['prefix'=>'spk'],function (){
            Route::get('{id}/direksi',  [MkSpkController::class, 'direksi']);
            Route::get('{id}/tanggalKontrak',  [MkSpkController::class, 'tanggalKontrak']);
            Route::get('{id}/hargaKontrak',  [MkSpkController::class, 'hargaKontrak']);
            Route::get('aturUserDireksiView/{role}', [MkSpkController::class,'aturUserDireksiView']);
            Route::get('aturUserDireksiViewAkses/{id}/{role}', [MkSpkController::class,'aturUserDireksiViewAkses']);
            Route::get('tambahkanUserAksesDireksi/{id}/{idP}', [MkSpkController::class,'tambahkanUserAksesDireksi']);
            Route::get('hapusUserAksesDireksi/{id}', [MkSpkController::class,'hapusUserAksesDireksi']);


            Route::get('{id}/aturUserEdit', [MkSpkController::class,'aturUserEdit']);
            Route::get('index', [MkSpkController::class,'index']);
            Route::post('uploadDoc', [MkSpkController::class,'uploadDoc'])->name('monitoringKontrak.spk.uploadDoc');
            Route::post('aturUser', [MkSpkController::class,'aturUser'])->name('monitoringKontrak.spk.aturUser');
            Route::post('convertPdf', [MkSpkController::class,'convertPdf'])->name('monitoringKontrak.spk.convertPdf');
            Route::post('hapusTemp', [MkSpkController::class,'hapusTemp'])->name('monitoringKontrak.spk.hapusTemp');
            Route::get('downloadKontrak/{idP}/{id}', [MkSpkController::class,'downloadKontrak'])->name('monitoringKontrak.spk.downloadKontrak');
            Route::get('downloadProses/{idP}/{id}', [MkSpkController::class,'downloadProses'])->name('monitoringKontrak.spk.downloadProses');
        });
        Route::group(['prefix'=>'spbj'],function (){
            Route::get('{id}/direksi',  [MkSpbjController::class, 'direksi']);
            Route::get('{id}/tanggalKontrak',  [MkSpbjController::class, 'tanggalKontrak']);
            Route::get('{id}/hargaKontrak',  [MkSpbjController::class, 'hargaKontrak']);
            Route::get('aturUserDireksiView/{role}', [MkSpbjController::class,'aturUserDireksiView']);
            Route::get('aturUserDireksiViewAkses/{id}/{role}', [MkSpbjController::class,'aturUserDireksiViewAkses']);
            Route::get('tambahkanUserAksesDireksi/{id}/{idP}', [MkSpbjController::class,'tambahkanUserAksesDireksi']);
            Route::get('hapusUserAksesDireksi/{id}', [MkSpbjController::class,'hapusUserAksesDireksi']);


            Route::get('{id}/aturUserEdit', [MkSpbjController::class,'aturUserEdit']);
            Route::get('index', [MkSpbjController::class,'index']);
            Route::post('uploadDoc', [MkSpbjController::class,'uploadDoc'])->name('monitoringKontrak.spbj.uploadDoc');
            Route::post('aturUser', [MkSpbjController::class,'aturUser'])->name('monitoringKontrak.spbj.aturUser');
            Route::post('convertPdf', [MkSpbjController::class,'convertPdf'])->name('monitoringKontrak.spbj.convertPdf');
            Route::post('hapusTemp', [MkSpbjController::class,'hapusTemp'])->name('monitoringKontrak.spbj.hapusTemp');
            Route::get('downloadKontrak/{idP}/{id}', [MkSpbjController::class,'downloadKontrak'])->name('monitoringKontrak.spbj.downloadKontrak');
            Route::get('downloadProses/{idP}/{id}', [MkSpbjController::class,'downloadProses'])->name('monitoringKontrak.spbj.downloadProses');
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
        Route::group(['prefix'=>'pengadaan-sipil'],function (){
            Route::get('{id}/edit',  [PengadaanSipilController::class,'edit']);
            Route::post('store',  [PengadaanSipilController::class,'store'])->name('pengadaan-sipil.store');
            Route::post('update',  [PengadaanSipilController::class,'update'])->name('pengadaan-sipil.update');
            Route::get('destroy/{id}',  [PengadaanSipilController::class,'destroy']);
            Route::get('index',  [PengadaanSipilController::class,'index'])->name('pengadaan-sipil.index');
            Route::get('printIPS/{id}',  [PengadaanSipilController::class,'print']);

            Route::get('{id}/editPekerjaan',  [PengadaanSipilController::class,'editPekerjaan']);
            Route::post('storePekerjaan',  [PengadaanSipilController::class,'storePekerjaan'])->name('pengadaan-sipil.store-pekerjaan');
            Route::post('storePekerjaanGG',  [PengadaanSipilController::class,'storePekerjaanGG'])->name('pengadaan-sipil.store-pekerjaangg');

            Route::post('updatePekerjaan',  [PengadaanSipilController::class,'updatePekerjaan'])->name('pengadaan-sipil.update-pekerjaan');
            Route::get('destroyPekerjaan/{id}',  [PengadaanSipilController::class,'destroyPekerjaan']);
            Route::get('destroySubPekerjaan/{id}',  [PengadaanSipilController::class,'destroySubPekerjaan']);
            Route::get('indexPekerjaan/{id}',  [PengadaanSipilController::class,'indexPekerjaan'])->name('pengadaan-sipil.indexPekerjaan');

            Route::get('indexPekerjaanDetail/{id}',  [PengadaanSipilController::class,'indexPekerjaanDetail'])->name('pengadaan-sipil.indexPekerjaanDetail');
            Route::get('indexSubJudul/{id}',  [PengadaanSipilController::class,'indexSubJudul'])->name('pengadaan-sipil.indexPekerjaanDetail');
            Route::get('indexSubSubJudul/{id}',  [PengadaanSipilController::class,'indexSubSubJudul']);


            Route::post('fetch',  [PengadaanSipilController::class, 'fetchData'])->name('pengadaan-sipil.fetch');
            Route::get('{id}/lihatDetail',  [PengadaanSipilController::class,'lihatDetail']);

            Route::get('{id}/editSubJudul',  [PengadaanSipilController::class,'editSubJudul']);
            Route::get('{id}/editSubSubJudul',  [PengadaanSipilController::class,'editSubSubJudul']);
            Route::post('storeSubSubJudul',  [PengadaanSipilController::class,'storeSubSubJudul'])->name('pengadaan-sipil.store-sub_sub_pekerjaan');

            Route::get('destroySubJudul/{id}',  [PengadaanSipilController::class,'destroySubJudul']);
            Route::get('destroySubSubJudul/{id}',  [PengadaanSipilController::class,'destroySubSubJudul']);

        });


        Route::group(['prefix'=>'ips-dm'],function (){
            Route::get('{id}/edit',  [PekerjaanController::class,'edit']);
            Route::post('store',  [PekerjaanController::class,'store'])->name('ips-dm.store');
            Route::post('update',  [PekerjaanController::class,'update'])->name('ips-dm.update');
            Route::get('destroy/{id}',  [PekerjaanController::class,'destroy']);
            Route::get('index',  [PekerjaanController::class,'index'])->name('ips-dm.index');


            Route::get('{id}/editSub',  [SubPekerjaanController::class,'edit']);
            Route::post('storeSub',  [SubPekerjaanController::class,'store'])->name('ips-dm.store-sub');
            Route::post('updateSub',  [SubPekerjaanController::class,'update'])->name('ips-dm.update-sub');
            Route::get('destroySub/{id}',  [SubPekerjaanController::class,'destroy']);
            Route::get('indexSub/{id}',  [SubPekerjaanController::class,'index'])->name('ips-dm.index-sub');

        });

    });

    Route::resource('databaseHargaData','DatabaseHargaController');
});

