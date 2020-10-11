<?php


namespace App\Http\Controllers\Template\EvaluasiDokumen;


use App\Http\Controllers\Template\TanggalIndo;
use App\Pengadaan;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;

class EvaluasiDokumenPenawaran
{
    public function EvaluasiDokumenPenawaran($id)
    {
        $data = Pengadaan::where('id', $id)->first();

        $tgl = \Carbon\Carbon::createFromTimeStamp(strtotime(date('Y-m-d')))->locale('id')->isoFormat('MMMM Do YYYY');

        $tanggalIndo = new TanggalIndo();

        $tanggal = $tanggalIndo->tgl_aja($data->evaluasi_dokumen_tgl_dari);
        $bulan = $tanggalIndo->bln_aja($data->evaluasi_dokumen_tgl_dari);
        $tahun = $tanggalIndo->thn_aja($data->evaluasi_dokumen_tgl_dari);

        $phpWord = new PhpWord();
        $paragraphOptions = array(
            'spaceBefore' => 0, 'spaceAfter' => 0
        );

        $multilevelNumberingStyleName = 'multilevel';
        $phpWord->addNumberingStyle(
            $multilevelNumberingStyleName,
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
                    array('format' => 'lowerLetter', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                ),
            )
        );

        $section = $phpWord->addSection();
        $table = $section->addTable();
        $header = $section->addHeader();
//        $header->addImage(public_path('logo_pln.png'), array('width'=>40,'marginTop' => round(Converter::cmToPixel(2)),'marginLeft' => round(Converter::cmToPixel(2))));
        $header->addText('PT PLN (Persero)', array('marginLeft' => 40), $paragraphOptions);
        $header->addText('Unit Induk Pembangkitan Sumatera Bagian Utara', array('marginLeft' => 40), $paragraphOptions);
        $header->addText('Unit Pelaksana Pengendalian Pembangkitan Pekanbaru', array('marginLeft' => 40));

        $section->addText(
            'Berita Acara'
            , array('name' => 'Arial', 'size' => 13, 'underline' => 'single', 'bold' => true), ['alignment' => Jc::CENTER, 'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $section->addText(
            'Nomor : ' . $data->evaluasi_dokumen_nomor
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Tentang'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Pembukaan Dok Penawaran'
            , array('name' => 'Arial', 'size' => 13, 'underline' => 'single', 'bold' => true), ['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Untuk'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );
        $section->addText(
            $data->judul
            , array('name' => 'Arial', 'size' => 13, 'underline' => 'single', 'bold' => true), ['alignment' => Jc::CENTER, 'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $section->addText(
            'PT PLN (PERSERO) UNIT PELAKSANA PENGENDALIAN PEMBANGKITAN PEKANBARU'
            , array('name' => 'Arial', 'size' => 10, 'underline' => 'single', 'bold' => true), ['alignment' => Jc::CENTER, 'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(4000)->addText(
            ''
            , array('alignment' => 'center', 'name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addCell(2000)->addText(
            'RKS'
            , array('alignment' => 'center', 'name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': 0' . $data->no_proses_pengadaan . '.RKS/DAN.01.01/210200/2020'
            , array('alignment' => 'center', 'name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addRow();
        $table->addCell(4000)->addText(
            ''
            , array('alignment' => 'center', 'name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addCell(2000)->addText(
            'TANGGAL'
            , array('alignment' => 'center', 'name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': ' . $tgl
            , array('alignment' => 'center', 'name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $section->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );
        $section->addText(
            'Pada hari ini ' . $data->survei_harga_pasar_hari . ' tanggal ' . $tanggalIndo->terbilang($tanggal) . ' ' . $bulan . ' ' . $tanggalIndo->terbilang($tahun) .
            ' telah diadakan rapat Pembukaan Dokumen Penawaran Pengadaan Langsung paket pekerjaan ' .
            'pengadaan barang untuk ' . $data->judul . ' Nomor : ' . $data->evaluasi_dokumen_nomor . ' Tanggal : ' . $data->evaluasi_dokumen_tgl .
            ' dihadiri oleh Bagian Pelaksana Pengadaan Barang/Jasa dan Penyedia Barang/Jasa dengan daftar hadir terlampir. '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH]
        );
        $section->addText(
            'Hasil rapat pembahasan Evaluasi Dokumen Penawaran Penyedia Barang/Jasa sebagai berikut :'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH]
        );


        $section->addListItem('Calon Penyedia Barang/Jasa .', 0, array('bold' => true), $multilevelNumberingStyleName);
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(800)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addCell(2000)->addText(
            'Nama Perusahaan'
            , array('name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': .........'
            , array('name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addRow();
        $table->addCell(800)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addCell(2000)->addText(
            'Alamat'
            , array('name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': .........'
            , array('name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addRow();
        $table->addCell(800)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addCell(2000)->addText(
            'NPWP'
            , array('name' => 'Arial', 'size' => 10), $paragraphOptions
        );
        $table->addCell(5000)->addText(
            ': .........'
            , array('name' => 'Arial', 'size' => 10), $paragraphOptions
        );

        $section->addListItem('Evaluasi Administrasi :', 0, array('bold' => true), $multilevelNumberingStyleName);
        $section->addText('', array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]);
        $styleTable = array('borderSize' => 6, 'borderColor' => '999999', 'cellMargin' => 80);
        $styleFirstRow = array('bgColor' => 'ffcdcd');
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => Cell::TEXT_DIR_BTLR);
        $fontStyle = array('bold' => true, 'align' => 'center');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');
        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow(300);
        $table->addCell(200, $cellRowSpan)->addText(htmlspecialchars('No'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(1000, $cellRowSpan)->addText(htmlspecialchars('Unsur'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(3000, $cellRowSpan)->addText(htmlspecialchars('Kriteria'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(3000, $cellColSpan)->addText(htmlspecialchars('Hasil Evaluasi'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addRow(300);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(3000, $cellVCentered)->addText(htmlspecialchars('Data Penawaran'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(3000, $cellVCentered)->addText(htmlspecialchars('Sesuai / Tidak Sesuai'), $fontStyle, ['alignment' => Jc::CENTER]);

        $table->addRow();
        $table->addCell(200)->addText('1', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('Surat Penawaran');
        $table->addCell(6000)->addText('Ditandatangani oleh pihak sebagaimana ketentuan dalam Dok. RKS.');
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('');
        $table->addCell(6000)->addText('Mencantumkan total harga penawaran (dalam angka dan huruf).');
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('');
        $table->addCell(6000)->addText('Jangka waktu berlakunya surat penawaran tidak kurang dari waktu sebagaimana tercantum dalam LDP di Dok. RKS.');
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('');
        $table->addCell(6000)->addText('jangka waktu pelaksanaan pekerjaan yang ditawarkan tidak melebihi jangka waktu  sebagaimana tercantum dalam LDP di Dok. RKS.');
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('');
        $table->addCell(6000)->addText('Bertanggal sama atau sebelum pemasukan penawaran.');
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('2', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('Surat Kuasa');
        $table->addCell(6000)->addText('ditandatangani dan bermaterai cukup dari direktur utama/pimpinan perusahaan kepada penerima kuasa (apabila dikuasakan)');
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');
        $section->addText('', array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]);
        $section->addListItem('Evaluasi Teknis :', 0, array('bold' => true), $multilevelNumberingStyleName);
        $section->addText('', array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]);
        $table = $section->addTable('Fancy Table');
        $table->addRow(300);
        $table->addCell(200, $cellRowSpan)->addText(htmlspecialchars('No'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(1000, $cellRowSpan)->addText(htmlspecialchars('Unsur'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(3000, $cellRowSpan)->addText(htmlspecialchars('Kriteria'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(3000, $cellColSpan)->addText(htmlspecialchars('Hasil Evaluasi'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addRow(300);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(3000, $cellVCentered)->addText(htmlspecialchars('Data Penawaran'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(3000, $cellVCentered)->addText(htmlspecialchars('Sesuai / Tidak Sesuai'), $fontStyle, ['alignment' => Jc::CENTER]);

        $table->addRow();
        $table->addCell(200)->addText('1', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('Spesifikasi teknis barang');
        $table->addCell(6000)->addText('Spesifikasi teknis barang yang ditawarkan berdasarkan contoh, brosur dan gambar-gambar, yang didalamnya mencantumkan tanda tangan oleh yang memiliki kewenangan sebagaimana ketentuan dalam Dok. RKS.');
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('2', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('Identitas (jenis, tipe dan merek) barang');
        $table->addCell(6000)->addText('Identitas (jenis, tipe dan merek) barang yang ditawarkan tercantum dengan lengkap dan jelas, yang didalamnya mencantumkan tanda tangan oleh yang memiliki kewenangan sebagaimana ketentuan dalam Dok. RKS.');
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');

        $section->addText('', array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]);
        $section->addListItem('Evaluasi Teknis :', 0, array('bold' => true), $multilevelNumberingStyleName);
        $section->addText('', array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]);
        $table = $section->addTable('Fancy Table');
        $table->addRow(300);
        $table->addCell(200, $cellRowSpan)->addText(htmlspecialchars('No'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(1000, $cellRowSpan)->addText(htmlspecialchars('Unsur'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(3000, $cellRowSpan)->addText(htmlspecialchars('Kriteria'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(3000, $cellColSpan)->addText(htmlspecialchars('Hasil Evaluasi'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addRow(300);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(3000, $cellVCentered)->addText(htmlspecialchars('Data Penawaran'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(3000, $cellVCentered)->addText(htmlspecialchars('Sesuai / Tidak Sesuai'), $fontStyle, ['alignment' => Jc::CENTER]);

        $table->addRow();
        $table->addCell(200)->addText('1', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('Spesifikasi teknis barang');
        $table->addCell(6000)->addText('Spesifikasi teknis barang yang ditawarkan berdasarkan contoh, brosur dan gambar-gambar, yang didalamnya mencantumkan tanda tangan oleh yang memiliki kewenangan sebagaimana ketentuan dalam Dok. RKS.');
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('2', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('Identitas (jenis, tipe dan merek) barang');
        $table->addCell(6000)->addText('Identitas (jenis, tipe dan merek) barang yang ditawarkan tercantum dengan lengkap dan jelas, yang didalamnya mencantumkan tanda tangan oleh yang memiliki kewenangan sebagaimana ketentuan dalam Dok. RKS.');
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('');
        $table->addCell(6000)->addText('Dalam hal terjadi perbedaan antara harga penawaran yang tercantum dalam surat penawaran dengan rincian penawaran, maka yang berlaku adalah harga penawaran yang  tercantum pada surat penawaran.');
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('3', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('Kewajaran Harga Penawaran');
        $table->addCell(6000)->addText('Harga total tidak melebihi HPS, dan jika Harga total ≥ dari HPS dilakukan negoisasi dan kesepakatan negosiasi maksimal sama dengan HPS');
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('', ['alignment' => Jc::CENTER]);
        $table->addCell(200)->addText('');
        $table->addCell(6000)->addText(htmlspecialchars('Harga total < 80% dari HPS dilakukan klarifikasi'));
        $table->addCell(4000)->addText('');
        $table->addCell(1000)->addText('');
        $section->addText('', array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]);

        $section->addText(
            'Demikian Berita Acara Pembukaan Dokumen Penawaran Pengadaan Langsung ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH]
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(6000)->addText(
            'Manager Bagian Operasi Pemeliharaan'
            , array('alignment' => 'center', 'name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );
        $table->addRow();
        $table->addCell(6000)->addText(
            'Direktur Utama'
            , array('alignment' => 'center', 'name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            ''
            , array('alignment' => 'center', 'name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );

        $section->addText(
            '', array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH]
        );
        $section->addText(
            '', array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH]
        );
        $section->addText(
            '', array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH]
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(6000)->addText(
            'MEKI SUHENDRA'
            , array('alignment' => 'center', 'name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            'Yuwana Hanif Utomo'
            , array('alignment' => 'center', 'name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(public_path('data-pengadaan/evaluasi-dokumen/'.$data->judul.$data->id.'2.docx'));
    }

}
