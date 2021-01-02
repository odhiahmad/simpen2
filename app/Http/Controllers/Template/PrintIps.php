<?php


namespace App\Http\Controllers\Template;


use App\InisiasiPengadaanSipil;
use App\InisiasiPengadaanSipilPekerjaan;
use App\InisiasiPengadaanSipilSubPekerjaan;
use App\SubJudul;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PrintIps
{
    public function PrintIps($id)
    {

        $spreadsheet = new Spreadsheet();

        $arrayStyle = [
            'horizontal' => Alignment::HORIZONTAL_CENTER,
            'vertical' => Alignment::VERTICAL_CENTER,
            'wrapText' => true,
        ];

        $styleArray = array(
            'horizontal' => Alignment::HORIZONTAL_CENTER,
            'vertical' => Alignment::VERTICAL_CENTER,
            'wrapText' => true,
            'borders' => array(
                'outline' => array(
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => array('argb' => '0000000'),
                ),
            ),
        );

        $columnA = 'A';
        $columnB = 'B';
        $columnC = 'C';
        $columnD = 'D';
        $columnE = 'E';
        $columnF = 'F';


        $data = InisiasiPengadaanSipil::where('id', $id)->first();

        $dataPekerjaan = InisiasiPengadaanSipilPekerjaan::with('getipspekerjaangg')->where('id_ips', $id)->get()->transform(function ($country) {
            return [
                'pekerjaan' => $country->nama_pekerjaan,
                'detail' => [
                    'nama'=>$country->getipspekerjaangg->pluck('nama'),
                    'vol'=>$country->getipspekerjaangg->pluck('vol'),
                    'harga_jual'=>$country->getipspekerjaangg->pluck('harga_jual'),
                    'total_harga'=>$country->getipspekerjaangg->pluck('total_harga')
                ]
            ];
        });
        $dataSubPekerjaan = InisiasiPengadaanSipilSubPekerjaan::where('id_ips', $id)->groupBy()->get();

//        $spreadsheet->getActiveSheet()
//            ->getStyle('A18:H10')
//            ->getBorders()
//            ->getBottom()
//            ->setBorderStyle(Border::BORDER_THICK)
//            ->setColor(new Color('FFFF0000'));

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(50);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $spreadsheet->getProperties()->setCreator('PLN Pekanbaru')
            ->setLastModifiedBy('PLN Pekanbaru')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

// Add some data, we will use some formulas here

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('A2:F2')
            ->setCellValue('A2', $data->judul)->getStyle('A2')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('A3:F3')
            ->setCellValue('A3', $data->judul)->getStyle('A3')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('A4:F4')
            ->setCellValue('A4', $data->judul)->getStyle('A4')->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells('A5:F5')
            ->setCellValue('A5', $data->judul)->getStyle('A5')->getAlignment()->applyFromArray($arrayStyle);


        $rowAwalBorder = 7;
        $sheet->mergeCells($columnA.$rowAwalBorder.':'.$columnA.$rowAwalBorder)->setCellValue($columnA.$rowAwalBorder, 'No')->getStyle($columnA.$rowAwalBorder)->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells($columnB.$rowAwalBorder.':'.$columnB.$rowAwalBorder)->setCellValue($columnB.$rowAwalBorder, 'Jenis Pekerjaan')->getStyle($columnB.$rowAwalBorder)->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells($columnC.$rowAwalBorder.':'.$columnC.$rowAwalBorder)->setCellValue($columnC.$rowAwalBorder, 'Vol Pek')->getStyle($columnC.$rowAwalBorder)->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells($columnD.$rowAwalBorder.':'.$columnD.$rowAwalBorder)->setCellValue($columnD.$rowAwalBorder, 'Sat Pek')->getStyle($columnD.$rowAwalBorder)->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells($columnE.$rowAwalBorder.':'.$columnE.$rowAwalBorder)->setCellValue($columnE.$rowAwalBorder, 'Harga Satuan Pekerjaan')->getStyle($columnE.$rowAwalBorder)->getAlignment()->applyFromArray($arrayStyle);
        $sheet->mergeCells($columnF.$rowAwalBorder.':'.$columnF.$rowAwalBorder)->setCellValue($columnF.$rowAwalBorder, 'Harga Pekerjaan')->getStyle($columnF.$rowAwalBorder)->getAlignment()->applyFromArray($arrayStyle);



        $a = 0;

        $row = $rowAwalBorder+1;
        for ($i = 0; $i < count($dataPekerjaan); $i++) {
            $sheet->mergeCells($columnA.$row.':'.$columnF.$row)->setCellValue($columnA.$row,$dataPekerjaan[$i]['pekerjaan']);

            $hasil = 0;
            for ($j = 0; $j < count($dataPekerjaan[$i]['detail']['nama']); $j++) {
                $nomor = $j+1;
                $row++;
                $sheet->getCell($columnA. $row)->setValue($nomor)->getStyle($columnA. $row)->getAlignment()->applyFromArray($arrayStyle);
                $sheet->getCell($columnB. $row)->setValue($dataPekerjaan[$i]['detail']['nama'][$j])->getStyle($columnB. $row)->getAlignment()->applyFromArray($arrayStyle);
                $sheet->getCell($columnC. $row)->setValue($dataPekerjaan[$i]['detail']['vol'][$j])->getStyle($columnC. $row)->getAlignment()->applyFromArray($arrayStyle);
                $sheet->getCell($columnD. $row)->setValue('cm')->getStyle($columnD. $row)->getAlignment()->applyFromArray($arrayStyle);
                $sheet->getCell($columnE. $row)->setValue($dataPekerjaan[$i]['detail']['harga_jual'][$j])->getStyle($columnE. $row)->getAlignment()->applyFromArray($arrayStyle);
                $sheet->getCell($columnF. $row)->setValue($dataPekerjaan[$i]['detail']['total_harga'][$j])->getStyle($columnF. $row)->getAlignment()->applyFromArray($arrayStyle);

                $hasil += $dataPekerjaan[$i]['detail']['total_harga'][$j];
            }
            $row++;
            $sheet->mergeCells($columnA.$row.':'.$columnF.$row)->setCellValue($columnA.$row,'Total : '.$hasil);
            $a++;
            $row++;
        }


// Rename worksheet
        $sheet->getStyle($columnA.$rowAwalBorder.':'.$columnF.$rowAwalBorder)->applyFromArray($styleArray);
        $sheet->getStyle($columnA.$rowAwalBorder.':'.$columnA.$rowAwalBorder)->applyFromArray($styleArray);
        $sheet->getStyle($columnB.$rowAwalBorder.':'.$columnB.$rowAwalBorder)->applyFromArray($styleArray);
        $sheet->getStyle($columnC.$rowAwalBorder.':'.$columnC.$rowAwalBorder)->applyFromArray($styleArray);
        $sheet->getStyle($columnD.$rowAwalBorder.':'.$columnD.$rowAwalBorder)->applyFromArray($styleArray);
        $sheet->getStyle($columnE.$rowAwalBorder.':'.$columnE.$rowAwalBorder)->applyFromArray($styleArray);
        $sheet->getStyle($columnF.$rowAwalBorder.':'.$columnF.$rowAwalBorder)->applyFromArray($styleArray);

        $sheet->getStyle($columnA.$rowAwalBorder.':'.$columnF.($row-1))->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $writer->save(public_path('ips/' . $data->judul . '.xlsx'));
    }
}
