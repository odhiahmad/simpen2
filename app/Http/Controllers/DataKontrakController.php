<?php

namespace App\Http\Controllers;

use Ajaxray\PHPWatermark\Watermark;
use App\DatabaseHarga;
use App\DataKontrak;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use Yajra\DataTables\DataTables;
use PDF;
class DataKontrakController extends Controller
{
    public function index()
    {

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
        $objWriter->save(public_path('data-kontrak/pdf/' . $name . '.pdf'));

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

    public function surveyHargaPasar(){

    }


}
