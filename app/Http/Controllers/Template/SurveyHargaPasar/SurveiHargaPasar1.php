<?php


namespace App\Http\Controllers\Template\SurveyHargaPasar;


use App\Http\Controllers\Template\TanggalIndo;
use App\Pengadaan;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;

class SurveiHargaPasar1
{
    public function SurveyHargaPasar1($id){

        $data = Pengadaan::where('id',$id)->first();
        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($data->survei_harga_pasar_tgl);
        $bulan=$tanggalIndo->bln_aja($data->survei_harga_pasar_tgl);
        $tahun=$tanggalIndo->thn_aja($data->survei_harga_pasar_tgl);
        $bagian = $data->bagian;


        $nama = $data->judul;
        $phpWord = new PhpWord();
        $paragraphOptions = array(
            'spaceBefore' => 0, 'spaceAfter' => 0
        );


        $predefinedMultilevelStyle = array('listType' => \PhpOffice\PhpWord\Style\ListItem::TYPE_BULLET_FILLED);

        $section = $phpWord->addSection();
        $header = $section->addHeader();
//        $header->addImage(public_path('logo_pln.png'), array('width'=>40,'marginTop' => round(Converter::cmToPixel(2)),'marginLeft' => round(Converter::cmToPixel(2))));
        $header->addText('PT PLN (Persero)',array('marginLeft'=>40),$paragraphOptions);
        $header->addText('Unit Induk Pembangkitan Sumatera Bagian Utara',array('marginLeft'=>40),$paragraphOptions);
        $header->addText('Unit Pelaksana Pengendalian Pembangkitan Pekanbaru',array('marginLeft'=>40));


        $section->addText(
            'Berita Acara'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 14,'underline' => 'single','bold'=> true),['alignment' => Jc::CENTER]
        );

        $section->addText(
            'Nomor :'.$data->survei_harga_pasar_nomor
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Tentang'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Survey Harga Pasar'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 12,'bold'=> true),['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Untuk'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $section->addText(
            $data->judul
            ,array('name' => 'Arial', 'size' => 12,'bold'=> true),['alignment' => Jc::CENTER,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $section->addText(
            ' PT PLN (PERSERO) UNIT PELAKSANA PENGENDALIAN PEMBANGKITAN PEKANBARU'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10,'bold'=> true),['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Pada hari ini '.$data->survei_harga_pasar_hari.' tanggal '.$tanggalIndo->terbilang($tanggal).' '.$bulan.' '.$tanggalIndo->terbilang($tahun).
            ', yang bertanda tangan dibawah ini Bagian Pelaksana Pengadaan Barang/Jasa telah mengadakan Survei Harga Pasar.'.
            ' Berdasarkan dari beberapa sumber yang berbeda menghasilkan perbandingan survei harga pasar yang dibutuhkan paket'.
            ' pekerjaan pengadaan barang untuk Pengadaan '.$data->tempat_penyerahan.' yaitu sebagai berikut:'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );

        $section->addText(
            '1. PT/CV _____________________'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10,'bold'=> true),['alignment' => Jc::START]
        );

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999', 'cellMargin' => 40);
        $styleFirstRow = array('bgColor' => 'ffcdcd');
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => Cell::TEXT_DIR_BTLR);
        $fontStyle = array('bold' => true, 'align' => 'center');
        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow(300);
        $table->addCell(200, $styleCell)->addText(htmlspecialchars('No'), $fontStyle);
        $table->addCell(4000, $styleCell)->addText(htmlspecialchars('URAIAN'), $fontStyle);
        $table->addCell(4000, $styleCell)->addText(htmlspecialchars('SPESIFIKASI'), $fontStyle);
        $table->addCell(1000, $styleCell)->addText(htmlspecialchars('VOL'), $fontStyle);
        $table->addCell(1000, $styleCell)->addText(htmlspecialchars('SAT'), $fontStyle);
        $table->addCell(1300, $styleCell)->addText(htmlspecialchars('HARGA'), $fontStyle);
        for ($i = 1; $i <= 5; $i++) {
            $table->addRow();
            $table->addCell(200)->addText(htmlspecialchars("{$i}"));
            $table->addCell(4000)->addText(htmlspecialchars(""));
            $table->addCell(4000)->addText(htmlspecialchars(""));
            $table->addCell(1000)->addText(htmlspecialchars(""));
            $table->addCell(1000)->addText(htmlspecialchars(""));
            $table->addCell(1300)->addText(htmlspecialchars(""));
        }
        $section->addText(
            '',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );
        $section->addText(
            'Catatan :',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );
        $section->addListItem('...........................', 0, null, $predefinedMultilevelStyle, null);
        $section->addListItem('...........................', 0, null, $predefinedMultilevelStyle, null);

        $section->addText(
            '2. PT/CV _____________________'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10,'bold'=> true),['alignment' => Jc::START]
        );

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999', 'cellMargin' => 40);
        $styleFirstRow = array('bgColor' => 'ffcdcd');
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => Cell::TEXT_DIR_BTLR);
        $fontStyle = array('bold' => true, 'align' => 'center');
        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow(300);
        $table->addCell(200, $styleCell)->addText(htmlspecialchars('No'), $fontStyle);
        $table->addCell(4000, $styleCell)->addText(htmlspecialchars('URAIAN'), $fontStyle);
        $table->addCell(4000, $styleCell)->addText(htmlspecialchars('SPESIFIKASI'), $fontStyle);
        $table->addCell(1000, $styleCell)->addText(htmlspecialchars('VOL'), $fontStyle);
        $table->addCell(1000, $styleCell)->addText(htmlspecialchars('SAT'), $fontStyle);
        $table->addCell(1300, $styleCell)->addText(htmlspecialchars('HARGA'), $fontStyle);
        for ($i = 1; $i <= 5; $i++) {
            $table->addRow();
            $table->addCell(200)->addText(htmlspecialchars("{$i}"));
            $table->addCell(4000)->addText(htmlspecialchars(""));
            $table->addCell(4000)->addText(htmlspecialchars(""));
            $table->addCell(1000)->addText(htmlspecialchars(""));
            $table->addCell(1000)->addText(htmlspecialchars(""));
            $table->addCell(1300)->addText(htmlspecialchars(""));
        }
        $section->addText(
            '',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );
        $section->addText(
            'Catatan :',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );
        $section->addListItem('...........................', 0, null, $predefinedMultilevelStyle, null);
        $section->addListItem('...........................', 0, null, $predefinedMultilevelStyle, null);

        $section->addText(
            '3. PT/CV _____________________'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10,'bold'=> true),['alignment' => Jc::START]
        );

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999', 'cellMargin' => 40);
        $styleFirstRow = array('bgColor' => 'ffcdcd');
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => Cell::TEXT_DIR_BTLR);
        $fontStyle = array('bold' => true, 'align' => 'center');
        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow(300);
        $table->addCell(200, $styleCell)->addText(htmlspecialchars('No'), $fontStyle);
        $table->addCell(4000, $styleCell)->addText(htmlspecialchars('URAIAN'), $fontStyle);
        $table->addCell(4000, $styleCell)->addText(htmlspecialchars('SPESIFIKASI'), $fontStyle);
        $table->addCell(1000, $styleCell)->addText(htmlspecialchars('VOL'), $fontStyle);
        $table->addCell(1000, $styleCell)->addText(htmlspecialchars('SAT'), $fontStyle);
        $table->addCell(1300, $styleCell)->addText(htmlspecialchars('HARGA'), $fontStyle);
        for ($i = 1; $i <= 5; $i++) {
            $table->addRow(20);
            $table->addCell(200)->addText(htmlspecialchars(""));
            $table->addCell(4000)->addText(htmlspecialchars(""));
            $table->addCell(4000)->addText(htmlspecialchars(""));
            $table->addCell(1000)->addText(htmlspecialchars(""));
            $table->addCell(1000)->addText(htmlspecialchars(""));
            $table->addCell(1300)->addText(htmlspecialchars(""));
        }
        $section->addText(
            '',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );

        $section->addText(
            'Catatan :',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );
        $section->addListItem('...........................', 0, null, $predefinedMultilevelStyle, null);
        $section->addListItem('...........................', 0, null, $predefinedMultilevelStyle, null);


        $section->addText(
            'Demikian Survei Harga Pasar untuk paket pekerjaan pengadaan barang sebagaimana tersebut diatas ini dibuat untuk dapat dipergunkana sebagaimana mestinya.'
            ,array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );

        $section->addText(
            '',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(6000)->addText(
            'Pejabat Pelaksana Pengadaan'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            'Disusun oleh,'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );

        $section->addText(
            '',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );
        $section->addText(
            '',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );
        $section->addText(
            '',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(6000)->addText(
            $data->pejabat_pelaksana
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            $data->vfmc
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(public_path('data-pengadaan/survei-harga-pasar/' . $nama . '.docx'));





    }


    public function SurveyHargaPasar2($id){
        $data = Pengadaan::where('id',$id)->first();
        $phpWord = new PhpWord();
        $paragraphOptions = array(
            'spaceBefore' => 0, 'spaceAfter' => 0
        );
        $section = $phpWord->addSection();
        $header = $section->addHeader();
        $table = $section->addTable();
//        $header->addImage(public_path('logo_pln.png'), array('width'=>40,'marginTop' => round(Converter::cmToPixel(2)),'marginLeft' => round(Converter::cmToPixel(2))));
        $header->addText('PT PLN (Persero)',array('marginLeft'=>40),$paragraphOptions);
        $header->addText('Unit Induk Pembangkitan Sumatera Bagian Utara',array('marginLeft'=>40),$paragraphOptions);
        $header->addText('Unit Pelaksana Pengendalian Pembangkitan Pekanbaru',array('marginLeft'=>40));
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
