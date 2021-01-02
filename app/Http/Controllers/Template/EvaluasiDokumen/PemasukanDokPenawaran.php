<?php


namespace App\Http\Controllers\Template\EvaluasiDokumen;


use App\Http\Controllers\Template\TanggalIndo;
use App\Pengadaan;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;

class PemasukanDokPenawaran
{
    public function PemasukanDokPenawaran($id){
        $data = Pengadaan::where('id',$id)->first();

        $tgl = \Carbon\Carbon::createFromTimeStamp(strtotime(date('Y-m-d')))->locale('id')->isoFormat('MMMM Do YYYY');

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($data->pemasukan_dok_penawaran_tgl_dari);
        $bulan=$tanggalIndo->bln_aja($data->pemasukan_dok_penawaran_tgl_dari);
        $tahun=$tanggalIndo->thn_aja($data->pemasukan_dok_penawaran_tgl_dari);

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
            ,array('name' => 'Arial', 'size' => 13,'underline' => 'single','bold'=> true),['alignment' => Jc::CENTER, 'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $section->addText(
            'Nomor : '.$data->evaluasi_dokumen_nomor
            ,array('name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Tentang'
            ,array('name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Pembukaan Dok Penawaran'
            ,array('name' => 'Arial', 'size' => 13,'underline' => 'single','bold'=> true),['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Untuk'
            ,array('name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $section->addText(
            $data->judul
            ,array('name' => 'Arial', 'size' => 13,'underline' => 'single','bold'=> true),['alignment' => Jc::CENTER,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $section->addText(
            'PT PLN (PERSERO) UNIT PELAKSANA PENGENDALIAN PEMBANGKITAN PEKANBARU'
            ,array('name' => 'Arial', 'size' => 10,'underline' => 'single','bold'=> true),['alignment' => Jc::CENTER,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(4000)->addText(
            ''
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(2000)->addText(
            'RKS'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': 0'.$data->no_proses_pengadaan.'.RKS/DAN.01.01/210200/2020'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(4000)->addText(
            ''
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(2000)->addText(
            'TANGGAL'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': '.$tgl
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $section->addText(
            ''
            ,array('name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Pada hari ini '.$data->survei_harga_pasar_hari.' tanggal '.$tanggalIndo->terbilang($tanggal).' '.$bulan.' '.$tanggalIndo->terbilang($tahun).
            ' telah diadakan rapat Pembukaan Dokumen Penawaran Pengadaan Langsung paket pekerjaan '.
            'pengadaan barang untuk '.$data->judul.' Nomor : '.$data->evaluasi_dokumen_nomor.' Tanggal : '.$data->evaluasi_dokumen_tgl.
            ' dihadiri oleh Bagian Pelaksana Pengadaan Barang/Jasa dan Penyedia Barang/Jasa dengan daftar hadir terlampir. '
            ,array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );
        $section->addText(
            'Hasil Pembukaan Dokumen Penawaran sebagai berikut :'
            ,array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );
        $styleTable = array('borderSize' => 6, 'borderColor' => '999999', 'cellMargin' => 80);
        $styleFirstRow = array('bgColor' => 'ffcdcd');
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => Cell::TEXT_DIR_BTLR);
        $fontStyle = array('bold' => true, 'align' => 'center');
        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow(300);
        $table->addCell(200, $styleCell)->addText(htmlspecialchars('No'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(4000, $styleCell)->addText(htmlspecialchars('Dokumen Penawaran'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(4000, $styleCell)->addText(htmlspecialchars('Unsur'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(1000, $styleCell)->addText(htmlspecialchars('Keterangan Lengkap/tdk Lengkap'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addRow(5);
        $table->addCell(200)->addText(htmlspecialchars('1'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(4000)->addText(htmlspecialchars('2'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(4000)->addText(htmlspecialchars('3'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(1000)->addText(htmlspecialchars('4'), $fontStyle,['alignment' => Jc::CENTER]);

        $table->addRow();
        $table->addCell(200)->addText('1');
        $table->addCell(4000)->addText('Administrasi');
        $table->addCell(4000)->addText('Surat Penawaran');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('');
        $table->addCell(4000)->addText('');
        $table->addCell(4000)->addText('Surat Kuasa (apabila dikuasakan)');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('2');
        $table->addCell(4000)->addText('Teknis');
        $table->addCell(4000)->addText('Spesifikasi Teknis barang');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('');
        $table->addCell(4000)->addText('');
        $table->addCell(4000)->addText('identitas (jenis, tipe dan merek) barang');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('3');
        $table->addCell(4000)->addText('Harga');
        $table->addCell(4000)->addText('Daftar Kuantitas dan Harga');
        $table->addCell(1000)->addText('');



        $section->addText(
            'Demikian Berita Acara Pembukaan Dokumen Penawaran Pengadaan Langsung ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.'
            ,array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(6000)->addText(
            'CV ...............'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            'Pejabat Pelaksana Pengadaan'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $table->addRow();
        $table->addCell(6000)->addText(
            'Direktur Utama'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            ''
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
            'MEKI SUHENDRA'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            'Yuwana Hanif Utomo'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
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
        $table->addCell(2000, $cellRowSpan)->addText('Tes');

        $table->addCell(12000, $cellColSpan)->addText('PT. PLN (PERSERO) UNIT PELAKSANA PENGENDALIAN PEMBANGKITAN PEKANBARU', array('name'=>'Arial','color'=>'blue'), $cellHCentered);
        $table->addRow(300);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(12000, $cellVCentered)->addText('FORMULIR DAFTAR HADIR PELAKSANA PENGADAAN', array('name'=>'Arial','size'=>13,'bold'=>true,'color'=>'blue'), $cellHCentered);
        $table->addCell(null, $cellRowContinue);

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText(
            'Tanggal'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(10000)->addText(
            ': Senin / 15 Juni 2020'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Waktu'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(10000)->addText(
            ': __________ WIB s/d Selesai'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Tempat'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(10000)->addText(
            ': Kantor PT PLN (Persero) Unit Pelaksana Pengendalian Pembangkitan Pekanbaru'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Acara'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(10000)->addText(
            ':PEMBUKAAN DOKUMEN PENAWARAN Pengadaan Motor PMT Unit 3 ULPLTG Teluk Lembu'
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
            $table->addCell(800)->addText(htmlspecialchars("{$i}"),['alignment' => Jc::CENTER]);
            $table->addCell(4000);
            $table->addCell(4000);
            $table->addCell(1000);
        }


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
        $table->addCell(2000, $cellRowSpan)->addText('Tes');

        $table->addCell(12000, $cellColSpan)->addText('PT. PLN (PERSERO) UNIT PELAKSANA PENGENDALIAN PEMBANGKITAN PEKANBARU', array('name'=>'Arial','color'=>'blue'), $cellHCentered);
        $table->addRow(300);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(12000, $cellVCentered)->addText('FORMULIR DAFTAR HADIR PENYEDIA BARANG/JASA ', array('name'=>'Arial','size'=>13,'bold'=>true,'color'=>'blue'), $cellHCentered);
        $table->addCell(null, $cellRowContinue);

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText(
            'Tanggal'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(10000)->addText(
            ': Senin / 15 Juni 2020'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Waktu'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(10000)->addText(
            ': __________ WIB s/d Selesai'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Tempat'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(10000)->addText(
            ': Kantor PT PLN (Persero) Unit Pelaksana Pengendalian Pembangkitan Pekanbaru'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Acara'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),$paragraphOptions
        );
        $table->addCell(10000)->addText(
            ': PEMBUKAAN DOKUMEN PENAWARAN Pengadaan Motor PMT Unit 3 ULPLTG Teluk Lembu'
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
            $table->addCell(800)->addText(htmlspecialchars("{$i}"),['alignment' => Jc::CENTER]);
            $table->addCell(4000);
            $table->addCell(4000);
            $table->addCell(1000);
        }

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(public_path('data-pengadaan/evaluasi-dokumen/'.$data->judul.$data->id.'1.docx'));
    }
}
