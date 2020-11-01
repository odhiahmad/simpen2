<?php


namespace App\Http\Controllers\MonitoringKontrak;


use App\AturUser;
use App\Http\Controllers\Controller;
use App\Pengadaan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use setasign\Fpdi\Fpdi;
use Yajra\DataTables\DataTables;

class MkSpkController extends Controller
{
    public function index()
    {

        $dataUser = User::all();
        if (request()->ajax()) {
            return DataTables::of(Pengadaan::with('getperusahaan')->where('id_mp1', 2)->latest()->get())
                ->addColumn('upload', function ($data) {
                    if ($data->kontrak != null && $data->proses != null) {
                        $getAksesDownload = AturUser::where(['id_user'=>Auth::user()->id,'id_pengadaan'=>$data->id])->count();


                        $button = '<div class="dropdown"><button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Download
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a href="downloadProses/' . $data->proses . '"  class="detail dropdown-item">Proses</a>';

                        if($getAksesDownload === 1) {
                            $button .= '<a href="downloadKontrak/' . $data->kontrak . '" class="detail dropdown-item">Kontrak</a>';
                        }elseif (Auth::user()->role='Admin'){
                            $button .= '<a href="downloadKontrak/' . $data->kontrak . '" class="detail dropdown-item">Kontrak</a>';
                        }
                          $button .='</div></div>';
                        return $button;
                    } else if ($data->kontrak != null) {
                        $button = '<a href="downloadKontrak/' . $data->kontrak . '" type="button" class="detail btn btn-primary btn-sm">Kontrak</a>';
                        $button .= '&nbsp;&nbsp;';
                        return $button;
                    } else if ($data->proses != null) {
                        $button = '<a href="downloadProses/' . $data->proses . '" type="button" class="detail btn btn-primary btn-sm">Proses</a>';
                        $button .= '&nbsp;&nbsp;';
                        return $button;
                    }
                })
                ->addColumn('action', function ($data) {
                    if(Auth::user()->role === 'Admin') {
                        $button = '<div class="dropdown"><button class="btn btn-warning dropdown-toggle btn-sm" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Atur User
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <button id="' . $data->id . '" idRole="Direksi" class="aturUser dropdown-item">Direksi</button>
                                    <button id="' . $data->id . '" idRole="Pengawas" class="aturUser dropdown-item">Pengawas</button>
                                    <button id="' . $data->id . '" idRole="TimMutu" class="aturUser dropdown-item">Tim Mutu</button>
                                    <button id="' . $data->id . '" idRole="Logistik" class="aturUser dropdown-item">Logistik</button>
                                    <button id="' . $data->id . '" idRole="Keuangan" class="aturUser dropdown-item">Keuangan</button>
                                    </div>
                                   </div>';
                        return $button;
                    }else{
                        $button = '';
                        return $button;
                    }
                })
                ->rawColumns(['upload', 'action'])
                ->make(true);
        }
        return view('pages/user/monitoring-kontrak/spk/indexMonitoring', compact([
            'dataUser'
        ]));
    }

    public function aturUserDireksiView($role)
    {


        if (request()->ajax()) {
            return DataTables::of(User::where('role', $role)->latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button id="' . $data->id . '" class="tambahkanUserAksesDireksi btn btn-primary btn-sm">Tambahkan Akses</button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

    public function aturUserDireksiViewAkses($id,$role)
    {

        if (request()->ajax()) {
            return DataTables::of(AturUser::with('getuseraturuser')->where(['id_pengadaan' => $id, 'role' => $role])->latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button id="' . $data->id . '" class="hapusUserAksesDireksi detail btn btn-danger btn-sm">Hapus Akses</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

    public function tambahkanUserAksesDireksi($id, $idP)
    {

        $cek = AturUser::where(['id_user' => $id, 'id_pengadaan' => $idP])->count();
        $getUser = User::where(['id' => $id])->first();
        if ($cek === 0) {

            $aturUser = new AturUser();

            $aturUser->id_user = $id;
            $aturUser->id_pengadaan = $idP;
            $aturUser->role = $getUser->role;


            if ($aturUser->save()) {
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['success' => 'Gagal']);
            }
        } else {
            return response()->json(['success' => 'User Sudah Ada di Akses Ini']);
        }


    }

    public function hapusUserAksesDireksi($id)
    {

        $data = AturUser::findOrFail($id);

        if ( $data->delete()) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['success' => 'Gagal']);
        }

    }


    public function aturUserEdit($id)
    {
        if (request()->ajax()) {
            $data = AturUser::where('id_pengadaan', $id)->get();
            return response()->json(['data' => $data]);
        }
    }


    function add_watermark($file, $nama)
    {
        $pdf = new Fpdi();

        if (file_exists($file)) {
            $pagecount = $pdf->setSourceFile($file);
            for ($i = 1; $i <= $pagecount; $i++) {
                $tpl = $pdf->importPage($i);
                $pdf->addPage();
                $size = $pdf->getTemplateSize($tpl);

                $pdf->useTemplate($tpl, null, null, $size['width'], $size['height'], TRUE);
                //Put the watermark
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->SetTextColor(255, 0, 0);
                $pdf->SetXY(20, 15);
                $pdf->Write(0, Auth::user()->username);
            }

            return $pdf->Output();


        } else {
            return FALSE;
        }


    }


    public function hapusTemp(Request $request)
    {
        $fotoNama = $request->nama_pdf;
        unlink(public_path('data-kontrak/temp/') . $fotoNama);
    }


    public function downloadKontrak($id)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file = public_path('data-kontrak') . "/kontrak/" . $id;
        $this->add_watermark($file, $id);
//        $headers = array(
//            'Content-Type: application/pdf',
//        );
//        return Response::download($file, $id, $headers);

    }

    public function downloadProses($id)
    {

        $file = public_path('data-kontrak') . "/proses/" . $id;
        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $id, $headers);
    }


}
