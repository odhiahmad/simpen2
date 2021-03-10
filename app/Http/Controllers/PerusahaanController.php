<?php


namespace App\Http\Controllers;


use App\Perusahaan;
use Illuminate\Http\Request;
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
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="lihatDetail" id="' . $data->id . '" class="lihatDetail btn btn-warning btn-sm">Detail</button>';
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
            'pimpinan' => 'required',
            'notaris' => 'required',
            'alamat' => 'required',
            'bank' => 'required',
            'kantor_cabang' => 'required',
            'rekening' => 'required',
            'npwp' => 'required',
            'telpon' => 'required',
            'faksimili' => 'required',
            'sebutan_jabatan' => 'required',

        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/dpt/', $name);  // your folder path
                $data[] = $name;
            }
        }


        $form_data = array(
            'foto' => json_encode($data),
            'nama' => $request->nama,
            'pimpinan' => $request->pimpinan,
            'notaris' => $request->notaris,
            'alamat' => $request->alamat,
            'bank' => $request->bank,
            'kantor_cabang' => $request->kantor_cabang,
            'rekening' => $request->rekening,
            'npwp' => $request->npwp,
            'telpon' => $request->telpon,
            'faksimili' => $request->faksimili,
            'sebutan_jabatan' => $request->sebutan_jabatan,
            'bentuk_perusahaan' => $request->bentuk_dpt,
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
            'pimpinan' => 'required',
            'notaris' => 'required',
            'alamat' => 'required',
            'bank' => 'required',
            'kantor_cabang' => 'required',
            'rekening' => 'required',
            'npwp' => 'required',
            'telpon' => 'required',
            'faksimili' => 'required',
            'sebutan_jabatan' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/dpt/', $name);  // your folder path
                $data[] = $name;
            }

            $form_data1 = array(
                'foto' => json_encode($data),
                'nama' => $request->nama,
                'pimpinan' => $request->pimpinan,
                'notaris' => $request->notaris,
                'alamat' => $request->alamat,
                'bank' => $request->bank,
                'kantor_cabang' => $request->kantor_cabang,
                'rekening' => $request->rekening,
                'npwp' => $request->npwp,
                'telpon' => $request->telpon,
                'faksimili' => $request->faksimili,
                'sebutan_jabatan' => $request->sebutan_jabatan,
                'bentuk_perusahaan' => $request->bentuk_dpt,
            );
            Perusahaan::whereId($request->hidden_id)->update($form_data1);


            return response()->json(['success' => 'Data is successfully updated']);

        }else{
            $form_data2 = array(
                'nama' => $request->nama,
                'pimpinan' => $request->pimpinan,
                'notaris' => $request->notaris,
                'alamat' => $request->alamat,
                'bank' => $request->bank,
                'kantor_cabang' => $request->kantor_cabang,
                'rekening' => $request->rekening,
                'npwp' => $request->npwp,
                'telpon' => $request->telpon,
                'faksimili' => $request->faksimili,
                'sebutan_jabatan' => $request->sebutan_jabatan,
                'bentuk_perusahaan' => $request->bentuk_dpt,
            );
            Perusahaan::whereId($request->hidden_id)->update($form_data2);


            return response()->json(['success' => 'Data is successfully updated']);
        }


    }

    public function destroy($id)
    {
        $data = Perusahaan::findOrFail($id);
        $data->delete();
    }


}

