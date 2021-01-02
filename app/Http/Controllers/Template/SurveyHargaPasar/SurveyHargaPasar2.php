<?php


namespace App\Http\Controllers\Template\SurveyHargaPasar;


use App\Pengadaan;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;

class SurveyHargaPasar2
{
    public function SurveyHargaPasar2($id){
        $data = Pengadaan::where('id',$id)->first();
        $phpWord = new PhpWord();
        $paragraphOptions = array(
            'spaceBefore' => 0, 'spaceAfter' => 0
        );
        $section = $phpWord->addSection();
        $header = $section->addHeader();
        $header = $section->addHeader();
        $table = $header->addTable();
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');

        $table->addRow();
        $table->addCell(1000,$cellRowSpan)->addImage(public_path('logo_pln.png'), array('width'=>40,'marginTop' => round(Converter::cmToPixel(2)),'marginLeft' => round(Converter::cmToPixel(2))));
        $table->addCell(8000)->addText('PT PLN (Persero)',array('marginLeft'=>40),$paragraphOptions);
        $table->addRow();
        $table->addCell(null,$cellRowContinue)->addText('');
        $table->addCell(8000)->addText('Unit Induk Pembangkitan Sumatera Bagian Utara',array('marginLeft'=>40),$paragraphOptions);
        $table->addRow();
        $table->addCell(null,$cellRowContinue)->addText('');
        $table->addCell(8000)->addText('Unit Pelaksana Pengendalian Pembangkitan Pekanbaru',array('marginLeft'=>40));

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText(
            'Tanggal'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ':'. \Carbon\Carbon::createFromTimeStamp(strtotime($data->survei_harga_pasar_tgl))->locale('id')->isoFormat('MM Do YYYY')
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Waktu'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': ______________ WIB s/d selesai'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Tempat'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': Kantor PT PLN (Persero) Unit Pelaksana Pengendalian Pembangkitan Pekanbaru'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Acara'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': Survey Harga Pasar Bagian'.$data->tempat_penyerahan
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
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
        $objWriter->save(public_path('data-pengadaan/survei-harga-pasar/' . $data->judul . '2.docx'));
    }

}
