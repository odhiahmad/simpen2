<?php

namespace App\Http\Controllers;

use App\DatabaseHarga;
use App\HistoryHarga;
use App\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DatabaseHargaController extends Controller
{
    public function index(Request $request)
    {

        $databaseHarga = DatabaseHarga::orderBy('id', 'DESC')->paginate(6);

        if ($request->ajax()) {
            return view('pages/user/database-harga/loadData', compact('databaseHarga'));
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
            'jenisBarang' => 'required',
            'satuanBarang' => 'required',
            'jumlahBarang' => 'required|numeric',
            'hargaSatuan' => 'required|numeric',
            'asalUsulBarang' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|image|max:2048'
        );

        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json([
                'errors' => $error->errors()->all(),
                public_path('images/data-barang')
            ]);
        }

        $image = $request->file('foto');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/data-barang'), $new_name);

        $databaseHarga = new DatabaseHarga();
        $databaseHarga->nama_barang = $request->namaBarang;
        $databaseHarga->jenis = $request->jenisBarang;
        $databaseHarga->satuan = $request->satuanBarang;
        $databaseHarga->jumlah = $request->jumlahBarang;
        $databaseHarga->harga_satuan = $request->hargaSatuan;
        $databaseHarga->total = $request->hargaSatuan * $request->jumlahBarang;
        $databaseHarga->asal_usul_barang = $request->asalUsulBarang;
        $databaseHarga->keterangan = $request->keterangan;
        $databaseHarga->foto = $new_name;

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

        $rules = array(
            'namaBarang' => 'required',
            'jenisBarang' => 'required',
            'satuanBarang' => 'required',
            'jumlahBarang' => 'required|numeric',
            'hargaSatuan' => 'required|numeric',
            'asalUsulBarang' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data_insert = array(
            'id_database_harga' => $request->id,
            'id_user' => Auth::user()->id,
            'harga_dari' => $getDatabaseHarga->harga_satuan,
            'harga_ke' => $request->hargaSatuan,
        );


        $form_data = array(
            'nama_barang' => $request->namaBarang,
            'jenis' => $request->jenisBarang,
            'satuan' => $request->satuanBarang,
            'jumlah' => $request->jumlahBarang,
            'harga_satuan' => $request->hargaSatuan,
            'total' => $request->hargaSatuan * $request->jumlahBarang,
            'asal_usul_barang' => $request->asalUsulBarang,
        );

        if (DatabaseHarga::whereId($request->id)->update($form_data) && HistoryHarga::create($form_data_insert)) {
            return response()->json(['success' => 'Data is successfully updated']);
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
        DatabaseHarga::find($id)->delete();

        return response()->json(['success' => 'Book deleted successfully.']);
    }
}
