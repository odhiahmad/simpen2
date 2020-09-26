<?php


namespace App\Http\Controllers\Template;


use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;

class BeritaAcaraPengadaanLangsung
{
    public function BeritaAcaraPengadaanLangsung($nama,$nomor,$judul,$pejabatPelaksana,$disusunOleh,$hari){
        $phpWord = new PhpWord();
        $paragraphOptions = array(
            'spaceBefore' => 0, 'spaceAfter' => 0
        );
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
            'Nomor :'.$nomor
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
            $judul
            ,array('name' => 'Arial', 'size' => 12,'bold'=> true),['alignment' => Jc::CENTER,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $section->addText(
            ' PT PLN (PERSERO) UNIT PELAKSANA PENGENDALIAN PEMBANGKITAN PEKANBARU'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10,'bold'=> true),['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Pada hari ini '.$hari.' tanggal Lima bulan Maret tahun Dua ribu dua puluh'.
            ', yang bertanda tangan dibawah ini Bagian Pelaksana Pengadaan Barang/Jasa telah mengadakan Survei Harga Pasar.'.
            ' Berdasarkan dari beberapa sumber yang berbeda menghasilkan perbandingan survei harga pasar yang dibutuhkan paket'.
            'pekerjaan pengadaan barang untuk Pengadaan Pengadaan Bearing ULPLTG/MG Duri yaitu sebagai berikut:'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );

        $numberStyleList = array('listType' => \PHPWord_Style_ListItem::TYPE_NUMBER);
        $alphStyleList = array('listType' => \PHPWord_Style_ListItem::TYPE_ALPHANUM);

        $section->addListItem('One', 0, null, $numberStyleList);
        $section->addListItem('Two', 0, null, $numberStyleList);
        $section->addListItem('Alpha', 1, null, $alphStyleList);
        $section->addListItem('Beta', 1, null, $alphStyleList);
        $section->addListItem('Three', 0, null, $numberStyleList);
        $section->addListItem('Charlie', 1, null, $alphStyleList);

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
            $pejabatPelaksana
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            $disusunOleh
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(public_path('data-pengadaan/survei-harga-pasar/' . $nama . '.docx'));
    }
}
