<?php


namespace App\Http\Controllers\PengadaanSipil;


use App\Http\Controllers\Controller;
use App\Pekerjaan;
use App\SubPekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PekerjaanController extends Controller
{

    public function index()
    {

        if (request()->ajax()) {
            return DataTables::of(Pekerjaan::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages/user/inisiasi-pengadaan-sipil/indexInisiasiPengadaanDataMaster');
    }


    public function store(Request $request)
    {
        $rules = array(
            'nama' => 'required',
            'vol' => 'required',
            'satuan' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'nama' => $request->nama,
            'vol_pekerjaan' => $request->vol,
            'satuan' => $request->satuan,
        );


        if (Pekerjaan::create($form_data)) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['success' => $request->nama]);
        }


    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Pekerjaan::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }


    public function update(Request $request)
    {


        $rules = array(
            'nama' => 'required',
            'vol' => 'required',
            'satuan' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'nama' => $request->nama,
            'vol_pekerjaan' => $request->vol,
            'satuan' => $request->satuan

        );
        Pekerjaan::whereId($request->hidden_id)->update($form_data);


        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function destroy($id)
    {
        $data = Pekerjaan::findOrFail($id);
        $data->delete();
    }


}


