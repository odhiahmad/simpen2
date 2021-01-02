<?php


namespace App\Http\Controllers\PengadaanSipil;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Template\PrintIps;
use App\InisiasiPengadaanSipil;
use App\InisiasiPengadaanSipilPekerjaan;
use App\InisiasiPengadaanSipilSubPekerjaan;
use App\Pekerjaan;
use App\SubJudul;
use App\SubPekerjaan;
use App\SubSubJudul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PengadaanSipilController extends Controller
{

    public function index()
    {
        $dataPekerjaan = Pekerjaan::all();
        if (request()->ajax()) {
            return DataTables::of(InisiasiPengadaanSipil::latest()->get())
                ->addColumn('action', function ($data) {

                    $cekCountPekerjaan = InisiasiPengadaanSipilSubPekerjaan::where('id_ips',$data->id)->count();
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="detail" id="' . $data->id . '" class="detail btn btn-warning btn-sm">Detail</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="tambahPekerjaanGG" id="' . $data->id . '" class="tambahPekerjaanGG btn btn-accent btn-sm">Tambah Pekerjaan</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="lihatData" id="' . $data->id . '" class="lihatData btn btn-metal btn-sm">Lihat Data</button>';
                    $button .= '&nbsp;&nbsp;';
                    if($cekCountPekerjaan > 0){
                        $button .= '<a target="_blank" href="printIPS/' . $data->id . '"  class="print btn btn-default btn-sm">Print</a>';
                    }else{
                        $button .= '<a target="_blank" href="printIPS/' . $data->id . '"  class="print btn btn-default btn-sm disabled">Print</a>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages/user/inisiasi-pengadaan-sipil/indexInisiasiPengadaan', compact([
            'dataPekerjaan']));
    }

    public function indexPekerjaan($id)
    {
        if (request()->ajax()) {
            return DataTables::of(InisiasiPengadaanSipilPekerjaan::where('id_ips', $id)->latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="deletePekerjaan" id="' . $data->id . '" class="deletePekerjaan btn btn-danger btn-sm">Delete</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="detailPekerjaan" id="' . $data->id . '" class="detailPekerjaan btn btn-warning btn-sm">Detail</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="tambahPekerjaan" id="' . $data->id . '" class="tambahPekerjaan btn btn-default btn-sm">Tambah Sub Pekerjaan</button>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function indexPekerjaanDetail($id)
    {
        if (request()->ajax()) {
            return DataTables::of(InisiasiPengadaanSipilSubPekerjaan::where('id_ips_pekerjaan', $id)->latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="deleteSubPekerjaan" id="' . $data->id . '" class="deleteSubPekerjaan btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function print($id)
    {
        $ips = new PrintIps();
        $ips->PrintIps($id);

        $data = InisiasiPengadaanSipil::where('id', $id)->first();
        $file = public_path('ips/') . $data->judul . '.xlsx';

        $headers = array(
            'Content-Type: application/xlsx',
        );

        return Response::download($file, $data->judul . ' Inisiasi Pengadaan Sipil.xlsx', $headers);
    }

    public function fetchData(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = SubPekerjaan::where('id_pekerjaan', $value)->get();

        $output = '';
        $output .= '<option> Pilih </option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->nama . '</option>';
        }

        echo $output;
    }


    public function store(Request $request)
    {
        $rules = array(
            'judul' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'judul' => $request->judul,
        );

        $dataCreate = InisiasiPengadaanSipil::create($form_data);
        if ($dataCreate) {
            foreach ($request->pekerjaan as $id) {
                $form_dataPekerjaan = array(
                    'id_ips' => $dataCreate->id,
                    'nama_pekerjaan' => $id
                );

                InisiasiPengadaanSipilPekerjaan::create($form_dataPekerjaan);

            }

            return response()->json(['success' => 'Data Added successfully.']);
        }


    }

    public function storePekerjaanGG(Request $request)
    {
        for ($i=0;$i<count($request->pekerjaan_gg);$i++) {

            $form_dataPekerjaan = array(
                'id_ips' => $request->id_ips_gg,
                'nama_pekerjaan' => $request->pekerjaan_gg[$i],
            );
            InisiasiPengadaanSipilPekerjaan::create($form_dataPekerjaan);
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function storePekerjaan(Request $request)
    {
        for ($i=0;$i<count($request->pekerjaansub);$i++) {
            $id = $request->pekerjaansub[$i];
            $namaSatuan = $request->harga_satuan[$i];
            $getDataPekerjaan = Pekerjaan::where('id',$id)->first();

            $total = $namaSatuan * $getDataPekerjaan->vol_pekerjaan;
            $form_dataPekerjaan = array(
                'id_ips' => $request->id_ips,
                'id_pekerjaan' => $id,
                'id_ips_pekerjaan' => $request->id_ips_pekerjaan,
                'nama' => $getDataPekerjaan->nama,
                'vol' => $getDataPekerjaan->vol_pekerjaan,
                'harga_jual' => $namaSatuan,
                'total_harga' => $total,
            );
            InisiasiPengadaanSipilSubPekerjaan::create($form_dataPekerjaan);
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }


    public function lihatDetail($id)
    {
        if (request()->ajax()) {
            $dataPekerjaan = InisiasiPengadaanSipilPekerjaan::with('getipspekerjaangg')->where('id_ips', $id)->get();
            return response()->json([
                'dataPekerjaan' => $dataPekerjaan,
                ]);
        }
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $data = InisiasiPengadaanSipil::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function editPekerjaan($id)
    {
        if (request()->ajax()) {
            $data = InisiasiPengadaanSipilPekerjaan::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }


    public function update(Request $request)
    {

        $rules = array(
            'judul_gg' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'judul' => $request->judul_gg,
        );
        InisiasiPengadaanSipil::whereId($request->id_gg)->update($form_data);


        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function updatePekerjaan(Request $request)
    {


        $rules = array(
            'id_ips' => 'required',
            'nama_ips' => 'required',
            'id_pekerjaan' => 'required',
            'nama_pekerjaaan' => 'required',
            'id_sub_pekerjaan' => 'required',
            'nama_sub_pekerjaaan' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'id_ips' => $request->id_ips,
            'nama_ips' => $request->nama_ips,
            'id_pekerjaan' => $request->id_pekerjaan,
            'nama_pekerjaaan' => $request->nama_pekerjaaan,
            'id_sub_pekerjaan' => $request->id_sub_pekerjaan,
            'nama_sub_pekerjaaan' => $request->nama_sub_pekerjaaan,

        );
        InisiasiPengadaanSipilPekerjaan::whereId($request->hidden_id)->update($form_data);


        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function destroy($id)
    {
        $data = InisiasiPengadaanSipil::findOrFail($id);
        $data->delete();
        InisiasiPengadaanSipilPekerjaan::where('id_ips',$id)->delete();
        InisiasiPengadaanSipilSubPekerjaan::where('id_ips',$id)->delete();

    }

    public function destroyPekerjaan($id)
    {
        $data = InisiasiPengadaanSipilPekerjaan::findOrFail($id);
        $data->delete();
        InisiasiPengadaanSipilSubPekerjaan::where('id_ips_pekerjaan',$id)->delete();

    }

    public function destroySubPekerjaan($id)
    {
        $data = InisiasiPengadaanSipilSubPekerjaan::findOrFail($id);
        $data->delete();
    }




}

