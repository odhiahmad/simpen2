<?php


namespace App\Http\Controllers;


use App\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PerusahaanController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Perusahaan::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages/user/perusahaan/indexPerusahaan');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {


        $rules = array(
            'nama' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'nama' => $request->nama,
        );


        if (Perusahaan::create($form_data)) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['success' => $request->nama]);
        }


    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Perusahaan::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }


    public function update(Request $request)
    {
        $rules = array(
            'nama' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'nama' => $request->nama,
        );
        Perusahaan::whereId($request->hidden_id)->update($form_data);


        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function destroy($id)
    {
        $data = Perusahaan::findOrFail($id);
        $data->delete();
    }



}

