<?php


namespace App\Http\Controllers\MonitoringKontrak;


use App\AturUser;
use App\Http\Controllers\Controller;
use App\ModelsResource\DRole;
use App\Pengadaan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use setasign\Fpdi\Fpdi;
use Twilio\Rest\Client;
use Yajra\DataTables\DataTables;

class MkSpbjController extends Controller
{
    public function index()
    {

        $dataRole = DRole::all();
        $dataUser = User::all();
        if (request()->ajax()) {

            if(Auth::user()->jabatan !== 'Admin'){
                $getUserAkses = AturUser::where(['id_user'=>Auth::user()->id])->get();

                $idPengadaan = [];
                for($i=0;$i<count($getUserAkses);$i++){
                    $idPengadaan[$i] = $getUserAkses[$i]['id_pengadaan'];
                }

                return DataTables::of(Pengadaan::with('getperusahaan')->where(['id_mp1' => 3])->whereIn('id',$idPengadaan)->latest()->get())
                ->addColumn('upload', function ($data) {
                    if (Auth::user()->jabatan == 'Admin') {
                        $button = '<div class="dropdown"><button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Download
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';


                        $button .= '<a href="downloadProses/' . $data->id . '/'. $data->proses . '"  class="detail dropdown-item">Proses</a>';
                        $button .= '<a target="_blank" href="downloadKontrak/'. $data->id . '/' . $data->kontrak . '" class="detail dropdown-item">Kontrak</a>';

                        $button .= '</div></div>';
                        return $button;
                    }
                    if (AturUser::where(['id_user' => Auth::user()->id, 'id_pengadaan' => $data->id])->count() == 1) {
                        $button = '<a target="_blank" href="downloadKontrak/'. $data->id . '/' . $data->kontrak . '" class="detail btn btn-warning btn-sm">Kontrak</a>';
                        return $button;
                    }
                })
                ->addColumn('action', function ($data) {
                    if (Auth::user()->jabatan == 'Admin') {
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
                    }
                })
                ->addColumn('tanggal_kontrak', function ($data) {
                    if ($data->status_berakhir == 'Sejak BA Terima Lokasi') {
                        $button = '<button type="button" name="tanggal_kontrak" id="' . $data->id . '" class="tanggal_kontrak btn btn-primary btn-sm">' . $data->tgl_diterima_panitia . '</button>';
                        return $button;
                    } else {
                        $button = '<button type="button" name="tanggal_kontrak_milih" id="' . $data->id . '" class="tanggal_kontrak_milih btn btn-primary btn-sm">' . $data->tgl_diterima_panitia . '</button>';
                        return $button;
                    }

                })
                ->addColumn('harga_kontrak', function ($data) {
                    $button = '<button type="button" name="harga_kontrak" id="' . $data->id . '" class="harga_kontrak btn btn-danger btn-sm">' . "Rp " . number_format($data->rab, 2, ',', '.') . '</button>';
                    return $button;
                })
                ->addColumn('direksi_view', function ($data) {
                    $button = '<button type="button" name="direksi_view" id="' . $data->id . '" class="direksi_view btn btn-default btn-sm">' . $data->pengawas . '</button>';
                    return $button;
                })
                ->rawColumns(['upload', 'action', 'tanggal_kontrak', 'harga_kontrak', 'direksi_view'])
                ->make(true);
            }else{
            return DataTables::of(Pengadaan::with('getperusahaan')->where(['id_mp1' => 3])->latest()->get())
                ->addColumn('upload', function ($data) {

                    if (Auth::user()->jabatan == 'Admin') {
                        $button = '<div class="dropdown"><button class="btn btn-brand dropdown-toggle btn-sm" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Download
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';


                        $button .= '<a href="downloadProses/' . $data->id . '/'. $data->proses . '"  class="detail dropdown-item">Proses</a>';
                        $button .= '<a target="_blank" href="downloadKontrak/'. $data->id . '/' . $data->kontrak . '" class="detail dropdown-item">Kontrak</a>';

                        $button .= '</div></div>';
                        return $button;
                    }
                    if (AturUser::where(['id_user' => Auth::user()->id, 'id_pengadaan' => $data->id])->count() == 1) {
                        $button = '<a target="_blank" href="downloadKontrak/'. $data->id . '/' . $data->kontrak . '" class="detail btn btn-warning btn-sm">Kontrak</a>';
                        return $button;
                    }
                })
                ->addColumn('action', function ($data) {
                    if (Auth::user()->jabatan == 'Admin') {
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
                    }
                })
                ->addColumn('tanggal_kontrak', function ($data) {
                    if ($data->status_berakhir == 'Sejak BA Terima Lokasi') {
                        $button = '<button type="button" name="tanggal_kontrak" id="' . $data->id . '" class="tanggal_kontrak btn btn-primary btn-sm">' . $data->tgl_diterima_panitia . '</button>';
                        return $button;
                    } else {
                        $button = '<button type="button" name="tanggal_kontrak_milih" id="' . $data->id . '" class="tanggal_kontrak_milih btn btn-primary btn-sm">' . $data->tgl_diterima_panitia . '</button>';
                        return $button;
                    }

                })
                ->addColumn('harga_kontrak', function ($data) {
                    $button = '<button type="button" name="harga_kontrak" id="' . $data->id . '" class="harga_kontrak btn btn-danger btn-sm">' . "Rp " . number_format($data->rab, 2, ',', '.') . '</button>';
                    return $button;
                })
                ->addColumn('direksi_view', function ($data) {
                    $button = '<button type="button" name="direksi_view" id="' . $data->id . '" class="direksi_view btn btn-default btn-sm">' . $data->pengawas . '</button>';
                    return $button;
                })
                ->rawColumns(['upload', 'action', 'tanggal_kontrak', 'harga_kontrak', 'direksi_view'])
                ->make(true);
            }
        }
        return view('pages/user/monitoring-kontrak/spbj/indexMonitoring', compact([
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

    public function aturUserDireksiViewAkses($id, $role)
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
        $getPengadaan = Pengadaan::where('id',$idP)->first();
        if ($cek === 0) {

            $aturUser = new AturUser();

            $aturUser->id_user = $id;
            $aturUser->id_pengadaan = $idP;
            $aturUser->role = $getUser->role;


            if ($aturUser->save()) {
                $key='3884be16b96f5e4aeb2a06fcab5f97b0787c6dcd9a15b7f4'; //this is demo key please change with your own key
                $url='http://116.203.191.58/api/async_send_message';
                $data = array(
                  "phone_no"=> $getUser->no_hp,
                  "key"		=>$key,
                  "message"	=> "Anda diberikan hak akes untuk mendownload Kontrak Pengadaan ".$getPengadaan->judul,
                  "skip_link"	=>True // This optional for skip snapshot of link in message
                );
                $data_string = json_encode($data);
                
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
                curl_setopt($ch, CURLOPT_TIMEOUT, 360);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                  'Content-Type: application/json',
                  'Content-Length: ' . strlen($data_string))
                );
                echo $res=curl_exec($ch);
                curl_close($ch);
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

        if ($data->delete()) {
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

    function RotatedText($x, $y, $txt, $angle)
    {
        $pdf = new \PDF_Rotate();
        //Text rotated around its origin
        $pdf->Rotate($angle, $x, $y);
        $pdf->Text($x, $y, $txt);
        $pdf->Rotate(0);
    }

    function add_watermark($file, $nama,$judul)
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
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->SetTextColor(66, 135, 245);
                $pdf->SetXY(30, 120);
                $pdf->Write(0, Auth::user()->username);
//                $this->RotatedText(35,190,'W a t e r m a r k   d e m o',45);
            }




            return $pdf->Output();


        } else {
            return FALSE;
        }


    }


    public function tanggalKontrak($id)
    {
        if (request()->ajax()) {
            $data = Pengadaan::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function direksi($id)
    {
        if (request()->ajax()) {
            $data = Pengadaan::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function hargaKontrak($id)
    {
        if (request()->ajax()) {
            $data = Pengadaan::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }


    public function hapusTemp(Request $request)
    {
        $fotoNama = $request->nama_pdf;
        unlink(public_path('data-kontrak/temp/') . $fotoNama);
    }


    public function downloadKontrak($idP,$id)
    {
        //PDF file is stored under project/public/download/info.pdf
        $pengadaan = Pengadaan::where('id',$idP)->first();
        $file = public_path('data-kontrak') . "/kontrak/".$idP."/". $id;
        $this->add_watermark($file, $id,$pengadaan->judul);
//        $headers = array(
//            'Content-Type: application/pdf',
//        );
//        return Response::download($file, $id, $headers);

    }

    public function downloadProses($idP,$id)
    {

        $file = public_path('data-kontrak') . "/proses/" .$idP."/" . $id;
        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $id, $headers);
    }

}
