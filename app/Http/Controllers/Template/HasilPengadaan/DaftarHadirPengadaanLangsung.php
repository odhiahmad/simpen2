<?php


namespace App\Http\Controllers\Template\HasilPengadaan;


use App\Pengadaan;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;

class DaftarHadirPengadaanLangsung
{
    public function DaftarHadir($id){
        $data = Pengadaan::where('id',$id)->first();
        $phpWord = new PhpWord();
        $paragraphOptions = array(
            'spaceBefore' => 0, 'spaceAfter' => 0
        );
        $section = $phpWord->addSection();
        $styleTable = array('borderSize' => 6, 'borderColor' => 'blue');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');
        $table->addRow();
        $table->addCell(2000, $cellRowSpan)->addText('');

        $table->addCell(12000, $cellColSpan)->addText('PT. PLN (PERSERO) UNIT PELAKSANA PENGENDALIAN PEMBANGKITAN PEKANBARU', array('name'=>'Arial','color'=>'blue'), $cellHCentered);
        $table->addRow(300);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(12000, $cellVCentered)->addText('FORMULIR DAFTAR HADIR PELAKSANA PENGADAAN', array('name'=>'Arial','size'=>13,'bold'=>true,'color'=>'blue'), $cellHCentered);
        $table->addCell(null, $cellRowContinue);
        $section->addText(
            '',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(800)->addText(
            'Tanggal'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ':'. \Carbon\Carbon::createFromTimeStamp(strtotime($data->survei_harga_pasar_tgl))->locale('id')->isoFormat('MM Do YYYY')
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(800)->addText(
            'Waktu'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': ______________ WIB s/d selesai'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(800)->addText(
            'Tempat'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(10000)->addText(
            ': Kantor PT PLN (Persero) Unit Pelaksana Pengendalian Pembangkitan Pekanbaru'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(800)->addText(
            'Acara'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': HASIL PENGADAAN LANGSUNG '.$data->tempat_penyerahan
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $section->addText(
            '',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );
        $styleTable = array('borderSize' => 6, 'borderColor' => '999999', 'cellMargin' => 80);
        $styleFirstRow = array('bgColor' => 'ffcdcd');
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => Cell::TEXT_DIR_BTLR);
        $fontStyle = array('bold' => true, 'align' => 'center');
        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow(300);
        $table->addCell(800, $styleCell)->addText(htmlspecialchars('No'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(3000, $styleCell)->addText(htmlspecialchars('Nama'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(3000, $styleCell)->addText(htmlspecialchars('Bagian Jabatan'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Tanda Tangan'), $fontStyle,['alignment' => Jc::CENTER]);

        for ($i = 1; $i <= 13; $i++) {
            $table->addRow();
            $table->addCell(800)->addText(htmlspecialchars(""),['alignment' => Jc::CENTER]);
            $table->addCell(4000);
            $table->addCell(4000);
            $table->addCell(1000);
        }

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(public_path('data-pengadaan/hasil-pengadaan-langsung/' . $data->judul.'.docx'));
    }
}
