<?php

namespace App\Http\Controllers;

use Ajaxray\PHPWatermark\Watermark;
use App\DatabaseHarga;
use App\DataKontrak;
use App\Pengadaan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use Yajra\DataTables\DataTables;
use PDF;
class DataKontrakController extends Controller
{
    public function index()
    {

        if (request()->ajax()) {
            return DataTables::of(Pengadaan::latest()->get())
                ->addColumn('action', function ($data) {
                    if($data->kontrak != null && $data->proses != null) {
                        $button = '<a href="downloadKontrak/' . $data->kontrak . '" type="button" class="detail btn btn-primary btn-sm">Kontrak</a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="downloadProses/' . $data->proses . '" type="button" class="detail btn btn-primary btn-sm">Proses</a>';
                        return $button;
                    } else if ($data->kontrak != null){
                        $button = '<a href="downloadKontrak/' . $data->kontrak . '" type="button" class="detail btn btn-primary btn-sm">Kontrak</a>';
                        return $button;
                    } else if($data->proses != null){
                        $button = '<a href="downloadProses/' . $data->proses . '" type="button" class="detail btn btn-primary btn-sm">Proses</a>';
                        return $button;
                    }




                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages/user/data-kontrak/indexKontrak');
    }

    public function uploadDoc(Request $request)
    {

        $file = $request->file('file');

        $name = $file->getClientOriginalName();

        $objReader = IOFactory::createReader('Word2007');
        $phpWord = $objReader->load($file);
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        Settings::setPdfRendererPath($domPdfPath);
        Settings::setPdfRendererName('DomPDF');

        $objWriter = IOFactory::createWriter($phpWord, 'PDF');
        $objWriter->save(public_path('data-kontrak/temp/' . $name . '.pdf'));

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);


    }

    public function convertPdf(Request $request)
    {

        $file = $request->name;
        $this->PlaceWatermark(public_path('data-kontrak/pdf/' . $file . '.pdf'), "This is a lazy, but still simple test\n This should stand on a new line!", 30, 120, 100,TRUE);

        return response()->json([
            'success' => 'true',
            'pesan' => 'berhasil',
        ]);


    }

    public function hapusTemp(Request $request){
        $fotoNama = $request->nama_pdf;
        unlink(public_path('data-kontrak/temp/').$fotoNama);
    }

    public function surveyHargaPasar(){

    }

    public function downloadKontrak($id)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path('data-kontrak')."/kontrak/".$id;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $id, $headers);
    }

    public function downloadProses($id)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path('data-kontrak')."/proses/".$id;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $id, $headers);
    }

    public function downloadPdfWatermark($id)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path('data-kontrak/pdf-watermark').$id;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $id, $headers);
    }


}
