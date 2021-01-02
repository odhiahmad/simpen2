<?php


namespace App\Http\Controllers\PengadaanSipil;


use App\Http\Controllers\Controller;
use App\SubPekerjaan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class SubPekerjaanController extends Controller
{

    public function index($id)
    {

        if (request()->ajax()) {
            return DataTables::of(SubPekerjaan::where('id_pekerjaan',$id)->latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="editSub" id="' . $data->id . '" class="editSub btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="deleteSub" id="' . $data->id . '" class="deleteSub btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

    public function store(Request $request)
    {
        $rules = array(
            'namasub' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'nama' => $request->namasub,
            'id_pekerjaan' => $request->id_pekerjaan,
        );


        if (SubPekerjaan::create($form_data)) {
            return response()->json(['success' => 'Data Added successfully.']);
        }


    }


    public function edit($id)
    {
        if (request()->ajax()) {
            $data = SubPekerjaan::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }


    public function update(Request $request)
    {

        $rules = array(
            'namasub' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'nama' => $request->namasub,
        );
        SubPekerjaan::whereId($request->hidden_id_detail)->update($form_data);


        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function destroy($id)
    {
        $data = SubPekerjaan::findOrFail($id);
        $data->delete();
    }



}


