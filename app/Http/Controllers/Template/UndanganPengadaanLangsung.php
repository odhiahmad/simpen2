<?php


namespace App\Http\Controllers\Template;


use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;

class UndanganPengadaanLangsung
{
    public function UndanganPengadaanLangsung($nama,$nomor,$judul,$namaPerusahaan,$alamatPerusahaan,$nilaiHps,$sumberPendanaan){
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
        $table->addCell(2000)->addText(
            'Nomor'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ':'.$nomor
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            'Pekanbaru'. date('Y-m-d')
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Lampiran'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
           ': 1 (satu) Berkas'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ''
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Sifat'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': Penting'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ''
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Perihal'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': Undangan Pengadaan Langsung'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            'Kepada'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );

        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ''
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            $namaPerusahaan
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ''
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            $alamatPerusahaan
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );

        $section->addText(
            'up. Yth. Direktur Utama '.$namaPerusahaan
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10,'underline' => 'single','bold'=> true),$paragraphOptions
        );

        $section->addText(
            'Dengan ini Saudara kami undang untuk mengikuti proses Pengadaan Langsung paket pekerjaan Pengadaan barang, sebagai berikut :'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
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

        $section->addListItem('Paket Pekerjaan', 0, null, $multilevelNumberingStyleName);

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(500);
        $table->addCell(4000)->addText(
            'Nama Paket Pekerjaan'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(8000)->addText(
            ':'.$judul
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(500);
        $table->addCell(4000)->addText(
            'Lingkup Pekerjaan'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(8000)->addText(
            ':'.$judul
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );

        $table->addRow();
        $table->addCell(500);
        $table->addCell(4000)->addText(
            'Nilai Total HPS'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(8000)->addText(
            ':'.$nilaiHps
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );

        $table->addRow();
        $table->addCell(500);
        $table->addCell(4000)->addText(
            'Sumber Pendanaan'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(8000)->addText(
            ':'.$sumberPendanaan
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );


        $section->addListItem('Pelaksanaan dan Pengadaan', 0, null, $multilevelNumberingStyleName);
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(500);
        $table->addCell(4000)->addText(
            'Tempat dan Alamat'
            ,array('widowControl' => false, 'indentation' => array('left' => 360, 'right' => 120),'alignment'=>'center','name' => 'Arial', 'size' => 10)
        );
        $table->addCell(8000)->addText(
            ': Kantor PT PLN (Persero) Unit Pelaksana Pengendalian Pembangkitan Pekanbaru, Jl. Tanjung Datuk No. 74, Pesisir, Kec. Lima Puluh, Kota Pekanbaru, Riau 28155'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10)
        );

        $section->addText(
            'Saudara diminta untuk memasukkan penawaran administrasi, teknis dan harga secara langsung sesuai dengan jadwal pelaksanaan sebagai berikut :'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );


        $styleTable = array('borderSize' => 6, 'borderColor' => '999999', 'cellMargin' => 80);

        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => Cell::TEXT_DIR_BTLR);
        $fontStyle = array('bold' => true, 'align' => 'center');
        $phpWord->addTableStyle('Fancy Table', $styleTable);
        $table = $section->addTable('Fancy Table');
        $table->addRow(300);
        $table->addCell(200, $styleCell)->addText(htmlspecialchars('No'), $fontStyle);
        $table->addCell(4000, $styleCell)->addText(htmlspecialchars('Kegiatan'), $fontStyle);
        $table->addCell(4000, $styleCell)->addText(htmlspecialchars('Hari / Tanggal'), $fontStyle);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Waktu'), $fontStyle);

        $table->addRow();
        $table->addCell(200)->addText(htmlspecialchars("a"));
        $table->addCell(4000)->addText(htmlspecialchars("Pemasukan Dokumen Penawaran "));
        $table->addCell(4000)->addText(htmlspecialchars("Senin / 15 Juni 2020 s.d. Senin / 15 Juni 2020"));
        $table->addCell(2000)->addText(htmlspecialchars("08.00 s.d. 16.00 WIB"));
        $table->addRow();
        $table->addCell(200)->addText(htmlspecialchars("b"));
        $table->addCell(4000)->addText(htmlspecialchars("Evaluasi Dokumen Penawaran,  Klarifikasi Teknis dan Negoisasi Harga"));
        $table->addCell(4000)->addText(htmlspecialchars("Rabu / 17 Juni 2020 s.d. Jumat / 19 Juni 2020"));
        $table->addCell(2000)->addText(htmlspecialchars("08.00 WIB s.d. Selesai "));
        $table->addRow();
        $table->addCell(200)->addText(htmlspecialchars("c"));
        $table->addCell(4000)->addText(htmlspecialchars("Penandatanganan SPK"));
        $table->addCell(4000)->addText(htmlspecialchars("Senin / 22 Juni 2020"));
        $table->addCell(2000)->addText(htmlspecialchars("08.00 WIB s.d. Selesai "));


        $section->addText(
            'Demikian disampaikan untuk diketahui, atas kesediaan saudara untuk mengikuti Pengadaan Langsung ini kami ucapkan terima kasih.'
            ,array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );

        $section->addText(
            '',array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(6000)->addText(
            ''
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            'Manager'
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
            ''
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            'Rahmat Dian Amir'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(public_path('data-pengadaan/undangan-pengadaan-langsung/' . $nama . '.docx'));
    }

}
