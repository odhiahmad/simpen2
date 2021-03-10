<?php


namespace App\Http\Controllers\Template;


use App\Pengadaan;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
class HPS
{
    public function HPS($id){

        $spreadsheet = new Spreadsheet();

        $arrayStyle = [
            'horizontal' => Alignment::HORIZONTAL_CENTER,
            'vertical' => Alignment::VERTICAL_CENTER,
            'wrapText' => true,
        ];

        $styleArray = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => array('argb' => '0000000'),
                ),
            ),
        );
        $data = Pengadaan::where('id',$id)->first();

//        $spreadsheet->getActiveSheet()
//            ->getStyle('A18:H10')
//            ->getBorders()
//            ->getBottom()
//            ->setBorderStyle(Border::BORDER_THICK)
//            ->setColor(new Color('FFFF0000'));

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(2);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(16);
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
            ->setCellValue('A7', 'HARGA PERKIRAAN SENDIRI (HPS)')->getStyle('A7')->getAlignment()->applyFromArray($arrayStyle);

        $sheet->mergeCells('A8:I8')
            ->setCellValue('A8', 'Nomor :'.$data->hps_nomor)->getStyle('A8')->getAlignment()->applyFromArray($arrayStyle);

        $sheet->mergeCells('A11:B11')
            ->setCellValue('A11', 'Unit Pelaksana');
        $sheet->mergeCells('A12:B12')
            ->setCellValue('A12', 'Pengguna Barang / Jasa');
        $sheet->mergeCells('A13:B13')
            ->setCellValue('A13', 'Nama Paket Pekerjaan');
        $sheet->mergeCells('A14:B14')
            ->setCellValue('A14', 'Lokasi');
        $sheet->mergeCells('A15:B15')
            ->setCellValue('A15', 'Sumber Dana');
        $sheet->mergeCells('A16:B16')
            ->setCellValue('A16', 'Tahun Anggaran');

        $sheet->setCellValue('C11', ':');
        $sheet->setCellValue('C12', ':');
        $sheet->setCellValue('C13', ':');
        $sheet->setCellValue('C14', ':');
        $sheet->setCellValue('C15', ':');
        $sheet->setCellValue('C16', ':');

        $sheet->mergeCells('D11:G11')->setCellValue('D11', 'PT PLN (Persero) Unit Pelaksana Pengendalian Pembangkitan Pekanbaru');
        $sheet->mergeCells('D12:G12')->setCellValue('D12', 'Manager PT PLN (Persero) Unit Pelaksana Pengendalian Pembangkitan Pekanbaru');
        $sheet->mergeCells('D13:G13')->setCellValue('D13', $data->judul);
        $sheet->mergeCells('D14:G14')->setCellValue('D14', $data->tempat_penyerahan);
        $sheet->mergeCells('D15:G15')->setCellValue('D15', $data->sumber_dana);
        $sheet->mergeCells('D16:G16')->setCellValue('D16', $data->tahun);

        $sheet->mergeCells('B18:D18');
        $sheet->mergeCells('B19:D19');
        $sheet->mergeCells('B20:D20');
        $sheet->mergeCells('A18:A20')->setCellValue('A18', 'No')->getStyle('A18')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('B18:D20')->setCellValue('B19', 'Uraian Barang')->getStyle('B19')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('E18:E20')->setCellValue('E18', 'Spesifikasi')->getStyle('E18')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('F18:F20')->setCellValue('F18', 'Kuantitas')->getStyle('F18')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('G18:G20')->setCellValue('G18', 'Satuan Ukuran')->getStyle('G18')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('H18:H20')->setCellValue('H18', 'Harga Satuan')->getStyle('H18')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('I18:I20')->setCellValue('I18', 'Total Harga')->getStyle('I18')->getAlignment()->applyFromArray($arrayStyle);


        $sheet->mergeCells('B31:D31')->setCellValue('B31', 'Disahkan oleh,')->getStyle('B31')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('B32:D32')->setCellValue('B32', 'Manager')->getStyle('B32')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('B32:D32')->setCellValue('B38', ''.$data->pengguna)->getStyle('B38')->getAlignment()->applyFromArray($arrayStyle);

        $sheet->mergeCells('F30:I30')->setCellValue('F30', 'Pekanbaru, '.$data->hps_tgl)->getStyle('F30')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('F31:I31')->setCellValue('F31', 'Dibuat oleh,')->getStyle('F31')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('F32:I32')->setCellValue('F32', 'Pejabat Pelaksana')->getStyle('F32')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('F38:I38')->setCellValue('F38', ''.$data->pejabat_pelaksana)->getStyle('F38')->getAlignment()->applyFromArray($arrayStyle);

        $sheet->getStyle('F32')->getFont()->setName('Arial')->setSize(10)->setBold(true);
        $sheet->getStyle('B32')->getFont()->setName('Arial')->setSize(10)->setBold(true);
        $sheet->getStyle('B38')->getFont()->setName('Arial')->setSize(10)->setBold(true)->setUnderline(true);
        $sheet->getStyle('F38')->getFont()->setName('Arial')->setSize(10)->setBold(true)->setUnderline(true);
        $sheet->getStyle('B38')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('F30')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('F31')->getFont()->setName('Arial')->setSize(10);

        $sheet->getStyle('A7')->getFont()->setName('Arial')->setSize(12)->setBold(true);
        $sheet->getStyle('A8')->getFont()->setName('Arial')->setSize(10)->setBold(true)->setUnderline(true);
        $sheet->getStyle('A11:A12')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('A13:A14')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('A15:A16')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('D11:D12')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('D13:D14')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('D15:D16')->getFont()->setName('Arial')->setSize(10);
        $sheet->getStyle('A18:I27')->applyFromArray($styleArray);
        $sheet->getStyle('A18:I20')->applyFromArray($styleArray);

// Rename worksheet

        $writer = new Xlsx($spreadsheet);
        $writer->save(public_path('data-pengadaan/hps/' . $data->judul . '.xlsx'));
    }
}
