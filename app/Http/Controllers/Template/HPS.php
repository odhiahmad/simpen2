<?php


namespace App\Http\Controllers\Template;


use App\Pengadaan;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class HPS
{
    public function HPS($id){

        $spreadsheet = new Spreadsheet();
        $data = Pengadaan::where('id',$id)->first();
        $spreadsheet->getProperties()->setCreator('PLN Pekanbaru')
            ->setLastModifiedBy('PLN Pekanbaru')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

// Add some data, we will use some formulas here

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('A7:I7')
            ->setCellValue('A7', 'HARGA PERKIRAAN SENDIRI (HPS)')->getStyle('A7')->getAlignment()->applyFromArray([
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ]);

        $sheet->mergeCells('A8:I8')
            ->setCellValue('A8', 'HARGA PERKIRAAN SENDIRI (HPS)')->getStyle('A8')->getAlignment()->applyFromArray([
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ]);


// Rename worksheet

        $writer = new Xlsx($spreadsheet);
        $writer->save(public_path('data-pengadaan/hps/' . $data->judul . '.xlsx'));
    }
}
