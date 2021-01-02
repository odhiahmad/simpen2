<?php


namespace App\Http\Controllers\Template;


use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;

class BeritaAcaraPengadaanLangsung
{
    public function BeritaAcaraPengadaanLangsung($nama,$nomor,$judul,$pejabatPelaksana,$disusunOleh,$hari,$tanggal,$alamat,$namaPerusahaan,$npwp){
        $phpWord = new PhpWord();
        $paragraphOptions = array(
            'spaceBefore' => 0, 'spaceAfter' => 0
        );
        $section = $phpWord->addSection();
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
            'Hasil Pengadaan Langsung'
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
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText(
            'RKS'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(10000)->addText(
            ':'.$nomor
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText(
            'Tanggal'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $table->addCell(10000)->addText(
            ':'.$tanggal
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $section->addText(
            'Pada hari ini '.$hari.' tanggal Lima bulan Maret tahun Dua ribu dua puluh'.
            ', yang bertanda tangan dibawah ini Bagian Pelaksana Pengadaan Barang/Jasa telah mengadakan Survei Harga Pasar.'.
            ' Berdasarkan dari beberapa sumber yang berbeda menghasilkan perbandingan survei harga pasar yang dibutuhkan paket'.
            'pekerjaan pengadaan barang untuk Pengadaan Pengadaan Bearing ULPLTG/MG Duri yaitu sebagai berikut:'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );

        $section->addText(
            'Pelaksanaan pengadaan langsung melalui tahapan-tahapan kegiatan.'
            ,array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );

        $multilevelNumberingStyleName = 'multilevel';
        $phpWord->addNumberingStyle(
            $multilevelNumberingStyleName,
            array(
                'type'   => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
                    array('format' => 'lowerLetter', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                ),
            )
        );

        $section->addListItem('Survey harga pasar dilakukan terhadap beberapa sumber informasi.', 0, null, $multilevelNumberingStyleName);
        $section->addListItem('Calon Penyedia barang/jasa yang diundang sebanyak 1 (satu) perusahaan yaitu:', 0, null, $multilevelNumberingStyleName);
        $section->addListItem('Nama Perusahaan :', 1, null, $multilevelNumberingStyleName);
        $section->addListItem('Alamat', 1, null, $multilevelNumberingStyleName);
        $section->addListItem('Pemasukan dan pembukaan penawaranu', 0, null, $multilevelNumberingStyleName);
        $section->addListItem('Dokumen Penawaran yang disampaikan oleh Calon Penyedia barang/jasa pada Tanggal 09 Maret 2020, setelah dibuka dan diteliti dinyatakan memenuhi syarat sehingga dapat dilanjutkan evaluasi', 1, null, $multilevelNumberingStyleName);
        $section->addListItem('Hasil Pembukaan dokumen penawaran dari PT. RAMAYANA KARYA : LENGKAP', 1, null, $multilevelNumberingStyleName);
        $section->addListItem('Unsur-unsur yang dievaluasi', 0, null, $multilevelNumberingStyleName);
        $section->addListItem('Evaluasi Administrasi :', 1, null, $multilevelNumberingStyleName);
        $section->addListItem('Evaluasi Teknis :', 1, null, $multilevelNumberingStyleName);
        $section->addListItem('Evaluasi Harga :', 1, null, $multilevelNumberingStyleName);
        $section->addListItem('Evaluasi Kualifikasi :', 1, null, $multilevelNumberingStyleName);
        $section->addListItem('Pembuktian  Kualifikasi :', 1, null, $multilevelNumberingStyleName);
        $section->addListItem('Klarifikasi dan Negoisasi.', 0, null, $multilevelNumberingStyleName);


        $section->addText(
            'Klarifikasi dan Negoisasi dilakukan kepada PT. RAMAYANA KARYA dengan hasil kesepakatan sebagai berikut:',
            null,
            array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120))
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(550);
        $table->addCell(4000)->addText(
            'Nama Perusahaan'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $table->addCell(8000)->addText(
            ':'.$nomor
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $table->addRow();
        $table->addCell(550);
        $table->addCell(4000)->addText(
            'Alamat'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $table->addCell(8000)->addText(
            ':'.$alamat
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
        );

        $table->addRow();
        $table->addCell(550);
        $table->addCell(4000)->addText(
            'NPWP'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $table->addCell(8000)->addText(
            ':'.$npwp
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
        );

        $table->addRow();
        $table->addCell(550);
        $table->addCell(4000)->addText(
            'Harga Penawaran Awal'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $table->addCell(8000)->addText(
            ':'.$npwp
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
        );

        $table->addRow();
        $table->addCell(550);
        $table->addCell(4000)->addText(
            'Terbilang Harga'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $table->addCell(8000)->addText(
            ':'.$npwp
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
        );

        $table->addRow();
        $table->addCell(550);
        $table->addCell(4000)->addText(
            'Penawaran Awal'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $table->addCell(8000)->addText(
            ':'.$npwp
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
        );

        $table->addRow();
        $table->addCell(550);
        $table->addCell(4000)->addText(
            'Harga Hasil Negosiasi'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $table->addCell(8000)->addText(
            ':'.$npwp
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
        );

        $table->addRow();
        $table->addCell(550);
        $table->addCell(4000)->addText(
            'Terbilang Harga Hasil Negosiasi'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $table->addCell(8000)->addText(
            ':'.$npwp
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
        );

        $table->addRow();
        $table->addCell(550);
        $table->addCell(4000)->addText(
            'Waktu Penyelesaian'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $table->addCell(8000)->addText(
            ':'.$npwp
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
        );

        $section->addText(
            'Demikian Survei Harga Pasar untuk paket pekerjaan pengadaan barang sebagaimana tersebut diatas ini dibuat untuk dapat dipergunkana sebagaimana mestinya.'
            ,array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
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
        $objWriter->save(public_path('data-pengadaan/berita-acara-pengadaan-langsung/' . $nama . '.docx'));
    }
}
