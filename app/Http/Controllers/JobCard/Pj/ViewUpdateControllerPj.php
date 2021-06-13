<?php


namespace App\Http\Controllers\JobCard\Pj;


use App\Http\Controllers\Controller;
use App\ModelsResource\DBagian;
use App\ModelsResource\DCaraPembayaran;
use App\ModelsResource\DCoo;
use App\ModelsResource\DFungsiPembangkit;
use App\ModelsResource\DJabatanPengawas;
use App\ModelsResource\DJenis;
use App\ModelsResource\DMasaBerlaku;
use App\ModelsResource\DMasaGaransi;
use App\ModelsResource\DMetodePengadaan;
use App\ModelsResource\DPenerbitCoo;
use App\ModelsResource\DPenerbitGaransi;
use App\ModelsResource\DPengawas;
use App\ModelsResource\DPerjanjianKontrak;
use App\ModelsResource\DPicPelaksana;
use App\ModelsResource\DPosAnggaran;
use App\ModelsResource\DSistemDenda;
use App\ModelsResource\DStatus;
use App\ModelsResource\DStatusBerakhir;
use App\ModelsResource\DSumberDana;
use App\ModelsResource\DSyaratBidangUsaha;
use App\ModelsResource\DTempatPenyerahan;
use App\ModelsResource\DVfmc;
use App\ModelsResource\DDireksi;
use App\Pengadaan;
use App\PengadaanDetailPj;
use App\Perusahaan;

class ViewUpdateControllerPj extends Controller
{
    public function indexUpdateViewTeka1($id, $id1, $id2)
    {
        $dataCoo = DCoo::all();
        $dataPenerbitCoo = DPenerbitCoo::all();
        $dataPenerbitGaransi = DPenerbitGaransi::all();
        $dataSistemDenda = DSistemDenda::all();
        $dataPerusahaan = Perusahaan::all();
        $dataPosAnggaran = DPosAnggaran::all();
        $dataPengadaan = Pengadaan::with(['getMp1', 'getmp2', 'getMp3', 'getMp4', 'getMp5'])->where('id', $id)->first();
        $dataPengadaanDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $dataBagian = DBagian::all();
        $dataCaraPembayaran = DCaraPembayaran::all();
        $dataFungsiPembangkit = DFungsiPembangkit::all();
        $dataJenis = DJenis::all();
        $dataMasaBerlaku = DMasaBerlaku::all();
        $dataMasaGaransi = DMasaGaransi::all();
        $dataMetodePengadaan = DMetodePengadaan::where('id_induk', '0')->get();
        $dataPengawas = DPengawas::all();
        $dataPerjanjianKontrak = DPerjanjianKontrak::all();
        $dataPicPelaksana = DPicPelaksana::where('metode', 'pj')->get();
        $dataSumberDana = DSumberDana::all();
        $dataSyaratBidangUsaha = DSyaratBidangUsaha::all();
        $dataTempatPenyerahan = DTempatPenyerahan::where('metode', 'pj')->get();
        $dataVfmc = DVfmc::where('metode', 'pj')->get();
        $dataStatus = DStatus::all();
        $dataJabatanPengawas = DJabatanPengawas::all();
        $dataStatusBerakhir = DStatusBerakhir::all();
        $dataJabatanDireksi = DDireksi::all();
        return view('pages/user/job-card/pj/updatePengadaanTeka1/updatePengadaan', compact([
            'dataJabatanDireksi',
            'dataCoo',
            'dataPenerbitCoo',
            'dataPenerbitGaransi',
            'dataSistemDenda',
            'dataPerusahaan',
            'dataPosAnggaran',
            'dataPengadaan',
            'dataBagian',
            'dataCaraPembayaran',
            'dataFungsiPembangkit',
            'dataJenis',
            'dataMasaBerlaku',
            'dataMasaGaransi',
            'dataMetodePengadaan',
            'dataPengawas',
            'dataPerjanjianKontrak',
            'dataPicPelaksana',
            'dataSumberDana',
            'dataSyaratBidangUsaha',
            'dataTempatPenyerahan',
            'dataVfmc',
            'dataStatus',
            'dataJabatanPengawas',
            'dataStatusBerakhir',
            'dataPengadaanDetail'
        ]));
    }

    public function indexUpdateViewTeka2($id, $id1, $id2)
    {
        $dataCoo = DCoo::all();
        $dataPenerbitCoo = DPenerbitCoo::all();
        $dataPenerbitGaransi = DPenerbitGaransi::all();
        $dataSistemDenda = DSistemDenda::all();
        $dataPerusahaan = Perusahaan::all();
        $dataPosAnggaran = DPosAnggaran::all();
        $dataPengadaan = Pengadaan::with(['getMp1', 'getmp2', 'getMp3', 'getMp4', 'getMp5'])->where('id', $id)->first();
        $dataPengadaanDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $dataBagian = DBagian::all();
        $dataCaraPembayaran = DCaraPembayaran::all();
        $dataFungsiPembangkit = DFungsiPembangkit::all();
        $dataJenis = DJenis::all();
        $dataMasaBerlaku = DMasaBerlaku::all();
        $dataMasaGaransi = DMasaGaransi::all();
        $dataMetodePengadaan = DMetodePengadaan::where('id_induk', '0')->get();
        $dataPengawas = DPengawas::all();
        $dataPerjanjianKontrak = DPerjanjianKontrak::all();
        $dataPicPelaksana = DPicPelaksana::where('metode', 'pj')->get();
        $dataSumberDana = DSumberDana::all();
        $dataSyaratBidangUsaha = DSyaratBidangUsaha::all();
        $dataTempatPenyerahan = DTempatPenyerahan::where('metode', 'pj')->get();
        $dataVfmc = DVfmc::where('metode', 'pj')->get();
        $dataStatus = DStatus::all();
        $dataJabatanPengawas = DJabatanPengawas::all();
        $dataStatusBerakhir = DStatusBerakhir::all();
        $dataJabatanDireksi = DDireksi::all();
        return view('pages/user/job-card/pj/updatePengadaanTeka2/updatePengadaan', compact([
            'dataJabatanDireksi',
            'dataCoo',
            'dataPenerbitCoo',
            'dataPenerbitGaransi',
            'dataSistemDenda',
            'dataPerusahaan',
            'dataPosAnggaran',
            'dataPengadaan',
            'dataBagian',
            'dataCaraPembayaran',
            'dataFungsiPembangkit',
            'dataJenis',
            'dataMasaBerlaku',
            'dataMasaGaransi',
            'dataMetodePengadaan',
            'dataPengawas',
            'dataPerjanjianKontrak',
            'dataPicPelaksana',
            'dataSumberDana',
            'dataSyaratBidangUsaha',
            'dataTempatPenyerahan',
            'dataVfmc',
            'dataStatus',
            'dataJabatanPengawas',
            'dataStatusBerakhir',
            'dataPengadaanDetail'
        ]));
    }

    public function indexUpdateViewTetas1($id, $id1, $id2)
    {
        $dataCoo = DCoo::all();
        $dataPenerbitCoo = DPenerbitCoo::all();
        $dataPenerbitGaransi = DPenerbitGaransi::all();
        $dataSistemDenda = DSistemDenda::all();
        $dataPerusahaan = Perusahaan::all();
        $dataPosAnggaran = DPosAnggaran::all();
        $dataPengadaan = Pengadaan::with(['getMp1', 'getmp2', 'getMp3', 'getMp4', 'getMp5'])->where('id', $id)->first();
        $dataPengadaanDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $dataBagian = DBagian::all();
        $dataCaraPembayaran = DCaraPembayaran::all();
        $dataFungsiPembangkit = DFungsiPembangkit::all();
        $dataJenis = DJenis::all();
        $dataMasaBerlaku = DMasaBerlaku::all();
        $dataMasaGaransi = DMasaGaransi::all();
        $dataMetodePengadaan = DMetodePengadaan::where('id_induk', '0')->get();
        $dataPengawas = DPengawas::all();
        $dataPerjanjianKontrak = DPerjanjianKontrak::all();
        $dataPicPelaksana = DPicPelaksana::where('metode', 'pj')->get();
        $dataSumberDana = DSumberDana::all();
        $dataSyaratBidangUsaha = DSyaratBidangUsaha::all();
        $dataTempatPenyerahan = DTempatPenyerahan::where('metode', 'pj')->get();
        $dataVfmc = DVfmc::where('metode', 'pj')->get();
        $dataStatus = DStatus::all();
        $dataJabatanPengawas = DJabatanPengawas::all();
        $dataStatusBerakhir = DStatusBerakhir::all();
        $dataJabatanDireksi = DDireksi::all();
        return view('pages/user/job-card/pj/updatePengadaanTetas1/updatePengadaan', compact([
            'dataJabatanDireksi',
            'dataCoo',
            'dataPenerbitCoo',
            'dataPenerbitGaransi',
            'dataSistemDenda',
            'dataPerusahaan',
            'dataPosAnggaran',
            'dataPengadaan',
            'dataBagian',
            'dataCaraPembayaran',
            'dataFungsiPembangkit',
            'dataJenis',
            'dataMasaBerlaku',
            'dataMasaGaransi',
            'dataMetodePengadaan',
            'dataPengawas',
            'dataPerjanjianKontrak',
            'dataPicPelaksana',
            'dataSumberDana',
            'dataSyaratBidangUsaha',
            'dataTempatPenyerahan',
            'dataVfmc',
            'dataStatus',
            'dataJabatanPengawas',
            'dataStatusBerakhir',
            'dataPengadaanDetail'
        ]));
    }

    public function indexUpdateViewTetas2($id, $id1, $id2)
    {
        $dataCoo = DCoo::all();
        $dataPenerbitCoo = DPenerbitCoo::all();
        $dataPenerbitGaransi = DPenerbitGaransi::all();
        $dataSistemDenda = DSistemDenda::all();
        $dataPerusahaan = Perusahaan::all();
        $dataPosAnggaran = DPosAnggaran::all();
        $dataPengadaan = Pengadaan::with(['getMp1', 'getmp2', 'getMp3', 'getMp4', 'getMp5'])->where('id', $id)->first();
        $dataPengadaanDetail = PengadaanDetailPj::where('id_pengadaan', $id)->first();
        $dataBagian = DBagian::all();
        $dataCaraPembayaran = DCaraPembayaran::all();
        $dataFungsiPembangkit = DFungsiPembangkit::all();
        $dataJenis = DJenis::all();
        $dataMasaBerlaku = DMasaBerlaku::all();
        $dataMasaGaransi = DMasaGaransi::all();
        $dataMetodePengadaan = DMetodePengadaan::where('id_induk', '0')->get();
        $dataPengawas = DPengawas::all();
        $dataPerjanjianKontrak = DPerjanjianKontrak::all();
        $dataPicPelaksana = DPicPelaksana::where('metode', 'pj')->get();
        $dataSumberDana = DSumberDana::all();
        $dataSyaratBidangUsaha = DSyaratBidangUsaha::all();
        $dataTempatPenyerahan = DTempatPenyerahan::where('metode', 'pj')->get();
        $dataVfmc = DVfmc::where('metode', 'pj')->get();
        $dataStatus = DStatus::all();
        $dataJabatanPengawas = DJabatanPengawas::all();
        $dataStatusBerakhir = DStatusBerakhir::all();
        $dataJabatanDireksi = DDireksi::all();
        return view('pages/user/job-card/pj/updatePengadaanTetas2/updatePengadaan', compact([
            'dataJabatanDireksi',
            'dataCoo',
            'dataPenerbitCoo',
            'dataPenerbitGaransi',
            'dataSistemDenda',
            'dataPerusahaan',
            'dataPosAnggaran',
            'dataPengadaan',
            'dataBagian',
            'dataCaraPembayaran',
            'dataFungsiPembangkit',
            'dataJenis',
            'dataMasaBerlaku',
            'dataMasaGaransi',
            'dataMetodePengadaan',
            'dataPengawas',
            'dataPerjanjianKontrak',
            'dataPicPelaksana',
            'dataSumberDana',
            'dataSyaratBidangUsaha',
            'dataTempatPenyerahan',
            'dataVfmc',
            'dataStatus',
            'dataJabatanPengawas',
            'dataStatusBerakhir',
            'dataPengadaanDetail'
        ]));
    }
}
