<?php


namespace App\Http\Controllers\Template\HasilKlarifikasi;


use App\Pengadaan;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class EvaluasiNego
{
    public function EvaluasiNego($id){

        $spreadsheet = new Spreadsheet();

        $arrayStyle = [
            'horizontal' => Alignment::HORIZONTAL_CENTER,
            'vertical' => Alignment::VERTICAL_CENTER,
            'wrapText' => true,
        ];

        $styleArray = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => array('argb' => 'FFFF0000'),
                ),
            ),
        );
        $data = Pengadaan::where('id',$id)->first();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(2);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(14);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(18);

        $spreadsheet->getProperties()->setCreator('PLN Pekanbaru')
            ->setLastModifiedBy('PLN Pekanbaru')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

// Add some data, we will use some formulas here

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('A7:H7')
            ->setCellValue('A7', $data->judul)->getStyle('A7')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('A8:H8')
            ->setCellValue('A8', 'RKS Nomor:'.$data->rks)->getStyle('A8')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('A9:H9')
            ->setCellValue('A9', 'Tanggal :'.$data->tanggal)->getStyle('A9')->getAlignment()->applyFromArray($arrayStyle);


        $sheet->mergeCells('B12:D12');
        $sheet->mergeCells('B13:D13');
        $sheet->mergeCells('B14:D14');
        $sheet->mergeCells('A12:A14')->setCellValue('A12', 'No')->getStyle('A12')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->setCellValue('B13', 'Uraian Pekerjaan')->getStyle('B13')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('E12:H12')->setCellValue('E12', '')->getStyle('E12')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('E13:H13')->setCellValue('E13', 'Hasil Negosiasi')->getStyle('E13')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->setCellValue('E14', 'Kuantitas')->getStyle('E14')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->setCellValue('F14', 'Satuan Ukuran')->getStyle('F14')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->setCellValue('G14', 'Harga Satuan (Rp)')->getStyle('G14')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->setCellValue('H14', 'Total Harga (Rp)')->getStyle('H14')->getAlignment()->applyFromArray($arrayStyle);


        $sheet->getStyle('A12')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('B13')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('E12')->getFont()->setName('Arial')->setSize(10)->setBold(true);
        $sheet->getStyle('E13')->getFont()->setName('Arial')->setSize(10)->setBold(true);
        $sheet->getStyle('E14')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('F14')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('G14')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('H14')->getFont()->setName('Arial')->setSize(10);

        $sheet->getStyle('A7')->getFont()->setName('Arial')->setSize(12)->setBold(true);
        $sheet->getStyle('A8')->getFont()->setName('Arial')->setSize(10)->setBold(true);
        $sheet->getStyle('A9')->getFont()->setName('Arial')->setSize(10)->setBold(true);

// Rename worksheet

        $writer = new Xlsx($spreadsheet);
        $writer->save(public_path('data-pengadaan/hasil-klarifikasi/' . $data->judul . '3.xlsx'));
    }
}
