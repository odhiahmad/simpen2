<?php

namespace App\Http\Controllers;

use App\DatabaseHarga;
use App\HistoryHarga;
use App\ModelsResource\DBagian;
use App\ModelsResource\DCaraPembayaran;
use App\ModelsResource\DFungsiPembangkit;
use App\ModelsResource\DJenis;
use App\ModelsResource\DMasaBerlaku;
use App\ModelsResource\DMasaGaransi;
use App\ModelsResource\DMetodePengadaan;
use App\ModelsResource\DPengawas;
use App\ModelsResource\DPerjanjianKontrak;
use App\ModelsResource\DPicPelaksana;
use App\ModelsResource\DSumberDana;
use App\ModelsResource\DSyaratBidangUsaha;
use App\ModelsResource\DTempatPenyerahan;
use App\ModelsResource\DVfmc;
use App\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DatabaseHargaController extends Controller
{
    public function index(Request $request)
    {

        $databaseHarga = DatabaseHarga::where('status','1')->orderBy('id', 'DESC')->paginate(6);

        if ($request->ajax()) {
            return view('pages/user/database-harga/indexHarga', compact('databaseHarga'));
        }
        return view('pages/user/database-harga/indexHarga', compact('databaseHarga'));


    }




    public function cari(Request $request)
    {
        if ($request->has('q')) {

            if ($request->ajax()) {
                $query = $request->q;
                $data = DatabaseHarga::where('nama_barang', 'like', '%' . $query . '%')
                    ->orWhere('jenis', 'like', '%' . $query . '%')
                    ->orWhere('satuan', 'like', '%' . $query . '%')
                    ->orWhere('jumlah', 'like', '%' . $query . '%')
                    ->orWhere('harga_satuan', 'like', '%' . $query . '%')->orderBy('id', 'DESC')->paginate(6);

                return response()->json($data);
            }
        }




    }

    public function indexDetailHarga(Request $request)
    {
        $databaseHarga = DatabaseHarga::where('id', $request->id)->first();
        $history = HistoryHarga::with('getUserHistoryUbah')->where('id_database_harga', $request->id)->latest()->limit(5)->get();
        return view('pages/user/database-harga/detailHarga', compact('databaseHarga'), compact('history'));
    }

    public function indexUbahHarga(Request $request)
    {
        $databaseHarga = DatabaseHarga::where('id', $request->id)->first();
        return view('pages/user/database-harga/editHarga', compact('databaseHarga'));
    }

    public function indexHistoryHarga(Request $request)
    {
        if (request()->ajax()) {
            return \Yajra\DataTables\DataTables::of(HistoryHarga::with('getUserHistoryUbah')->where('id_database_harga', $request->id)->latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $databaseHarga = DatabaseHarga::where('id', $request->id)->first();
        return view('pages/user/database-harga/historyHarga', compact('databaseHarga'));
    }

    public function indexTambah()
    {
        return view('pages/user/database-harga/tambahHarga');
    }

    public function store(Request $request)
    {
        $rules = array(
            'namaBarang' => 'required',
            'satuanBarang' => 'required',
            'hargaSatuan' => 'required|numeric',
            'spesifikasi'=>'required',
            'sertifikat'=>'required|max:256',
            'foto' => 'required|image|max:256'
        );

        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json([
                'errors' => $error->errors()->all(),
                public_path('images/data-barang')
            ]);
        }

        $image = $request->file('foto');
        $image1 = $request->file('sertifikat');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('data-barang/foto'), $new_name);
        $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('data-barang/file'), $new_name1);

        $databaseHarga = new DatabaseHarga();
        $databaseHarga->nama_barang = $request->namaBarang;
        $databaseHarga->spesifikasi = $request->spesifikasi;
        $databaseHarga->sertifikat = $new_name1;
        $databaseHarga->satuan = $request->satuanBarang;
        $databaseHarga->harga_satuan = $request->hargaSatuan;
        $databaseHarga->foto = $new_name;
        $databaseHarga->status = '1';

        if ($databaseHarga->save()) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['success' => 'Gagal']);
        }


    }

    function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $data = DatabaseHarga::paginate(5);
            return view('pagination_data', compact('data'))->render();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\DatabaseHarga $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = DatabaseHarga::find($id);
        return response()->json($book);
    }

    public function update(Request $request)
    {

        $getDatabaseHarga = DatabaseHarga::where('id', $request->id)->first();

        $foto = $request->file('foto');
        $sertifikat = $request->file('sertifikat');

        $fotoNama =  $request->foto_nama;
        $sertifikatNama = $request->sertifikat_nama;

        if($foto != '' && $sertifikat != ''){

            $rules = array(
                'namaBarang' => 'required',
                'satuanBarang' => 'required',
                'hargaSatuan' => 'required|numeric',
                'spesifikasi'=>'required',
                'foto' => 'required|image|max:256',
                'sertifikat' => 'required|max:256'
            );

            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            unlink(public_path('data-barang/foto/').$fotoNama);
            unlink(public_path('data-barang/file/').$sertifikatNama);

            $fotoNama = rand() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('data-barang/foto'), $fotoNama);

            $sertifikatNama = rand() . '.' . $sertifikat->getClientOriginalExtension();
            $sertifikat->move(public_path('data-barang/file'), $sertifikatNama);



        }else if($foto != '' && $sertifikat == ''){
            $rules = array(
                'namaBarang' => 'required',
                'satuanBarang' => 'required',
                'hargaSatuan' => 'required|numeric',
                'spesifikasi'=>'required',
                'foto' => 'required|image|max:256',
            );

            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            unlink(public_path('data-barang/foto/').$fotoNama);
            $fotoNama = rand() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('data-barang/foto'), $fotoNama);


        }else if($sertifikat != '' && $foto == ''){
            $rules = array(
                'namaBarang' => 'required',
                'satuanBarang' => 'required',
                'hargaSatuan' => 'required|numeric',
                'spesifikasi'=>'required',
                'sertifikat' => 'required|max:256',
            );

            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
            @unlink(public_path('data-barang/file/').$sertifikatNama);

            $sertifikatNama = rand() . '.' . $sertifikat->getClientOriginalExtension();
            $sertifikat->move(public_path('data-barang/file'), $sertifikatNama);
        }



        $form_data_insert = array(
            'id_database_harga' => $request->id,
            'id_user' => Auth::user()->id,
            'harga_dari' => $getDatabaseHarga->harga_satuan,
            'harga_ke' => $request->hargaSatuan,
        );


        $form_data = array(
            'nama_barang' => $request->namaBarang,
            'spesifikasi' => $request->spesifikasi,
            'satuan' => $request->satuanBarang,
            'harga_satuan' => $request->hargaSatuan,
            'foto' =>$fotoNama,
            'sertifikat' => $sertifikatNama,
        );

        if ($dataHarga = DatabaseHarga::whereId($request->id)->update($form_data) && HistoryHarga::create($form_data_insert)) {
            return response()->json([
                'success' => 'Data is successfully updated',
                'fotoNama' => $fotoNama,
                'sertifikatNama' => $sertifikatNama
            ]);
        } else {
            return response()->json(['success' => 'Data is successfully updated']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\DatabaseHarga $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form_data_insert = array(
          'status'=>0
        );

        DatabaseHarga::whereId($id)->update($form_data_insert);
        return response()->json(['success' => 'Database Harga berhasil di hapus.']);
    }
}
