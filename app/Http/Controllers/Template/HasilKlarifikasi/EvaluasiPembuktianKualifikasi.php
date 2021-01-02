<?php


namespace App\Http\Controllers\Template\HasilKlarifikasi;


use App\Http\Controllers\Template\TanggalIndo;
use App\Pengadaan;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;

class EvaluasiPembuktianKualifikasi
{
    public function EvaluasiPembuktianKualifikasi($id){
        $data = Pengadaan::where('id',$id)->first();

        $tgl = \Carbon\Carbon::createFromTimeStamp(strtotime(date('Y-m-d')))->locale('id')->isoFormat('MMMM Do YYYY');

        $tanggalIndo = new TanggalIndo();

        $tanggal=$tanggalIndo->tgl_aja($data->ba_hasil_klarifikasi_tgl);
        $bulan=$tanggalIndo->bln_aja($data->ba_hasil_klarifikasi_tgl);
        $tahun=$tanggalIndo->thn_aja($data->ba_hasil_klarifikasi_tgl);

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
            'Pada hari ini '.$data->ba_hasil_klarifikasi_hari.' tanggal '.$tanggalIndo->terbilang($tanggal).' '.$bulan.' '.$tanggalIndo->terbilang($tahun).
            ' telah diadakan Rapat Penilaian Kualifikasi Penyedia Pengadaan Langsung paket pengadaan barang untuk  '.
            $data->judul.' Nomor : '.$data->evaluasi_dokumen_nomor.' Tanggal : '.$data->evaluasi_dokumen_tgl.
            ' dihadiri oleh Bagian Pelaksana Pengadaan Barang/Jasa dan Penyedia Barang/Jasa dengan daftar hadir terlampir. '
            ,array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH]
        );
        $section->addText(
            'Hasil evaluasi dan pembuktian kualifikasi sebagai berikut :'
            ,array('name' => 'Arial','underline'=>'single' ,'size' => 10),['alignment' => Jc::BOTH]
        );

        $section->addText(
            'Rapat dilaksanakan untuk menilai kualifikasi dan dilanjutkan dengan pembuktian kualifikasi dengan hasil sebagai berikut: :'
            ,array('name' => 'Arial' ,'size' => 10),['alignment' => Jc::BOTH]
        );

        $section->addText(
            'Calon Penyedia Barang/Jasa'
            ,array('name' => 'Arial','underline'=>'single' ,'size' => 10),['alignment' => Jc::BOTH]
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText(
            'Nama Perusahaan'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ':'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'Alamat'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ':'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            'NPWP'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ':'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999', 'cellMargin' => 80);
        $styleFirstRow = array('bgColor' => 'ffcdcd');
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => Cell::TEXT_DIR_BTLR);
        $fontStyle = array('bold' => true, 'align' => 'center');
        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');

        $table = $section->addTable('Fancy Table');
        $table->addRow(300);
        $table->addCell(200, $styleCell)->addText(htmlspecialchars('No'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(1000, $styleCell)->addText(htmlspecialchars('Dokumen Penawaran'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(7000, $styleCell)->addText(htmlspecialchars('Unsur'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(1000, $styleCell)->addText(htmlspecialchars('Evaluasi Kualifikasi (Sesuai/Tidak Sesuai)'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addCell(1000, $styleCell)->addText(htmlspecialchars('Pembuktian Kualifikasi (Sesuai/Tidak Sesuai)'), $fontStyle,['alignment' => Jc::CENTER]);
        $table->addRow();
        $table->addCell(200)->addText('1');
        $table->addCell(1000)->addText('Pakta Integritas');
        $table->addCell(7000)->addText('Ditandatangani oleh pihak sebagaimana ketentuan dalam Dok. RKS.');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('2');
        $table->addCell(1000)->addText('Formulir Isian Kualifikasi');
        $table->addCell(7000)->addText('Ditandatangani oleh pihak sebagaimana ketentuan dalam Dok. RKS.');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('3');
        $table->addCell(1000)->addText('Ijin Usaha');
        $table->addCell(7000)->addText('Memiliki dan melampirkan fotokopi Surat izin usaha yang sesuai dengan ketentuan Dok. RKS');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('4');
        $table->addCell(1000)->addText('Tempat kedudukan perusahaan');
        $table->addCell(7000)->addText('Melampirkan foto kopi Surat Keterangan Domisili Perusahaan dari kelurahaan setempat.');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('5');
        $table->addCell(1000)->addText('Landasan hukum pendirian perusahaan');
        $table->addCell(7000)->addText('Melampirkan fotokopi Akte Pendirian Perusahaan dan Perubahannya (jika ada).');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('6');
        $table->addCell(1000)->addText('Terdaftar di sistem pemerintahan');
        $table->addCell(7000)->addText('Melampirkan TDP atau NIB');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('7');
        $table->addCell(1000)->addText('Perusahaan dan/atau direksi tidak tersangkut hukum');
        $table->addCell(7000)->addText('Tidak dalam pengawasan pengadilan, tidak bangkrut, kegiatan usahanya tidak sedang dihentikan dan/atau Direksi yang bertindak untuk dan atas nama perusahaan tidak sedang dalam menjalani sanksi pidana');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('8');
        $table->addCell(1000)->addText('Daftar Hitam (Blacklist) PLN');
        $table->addCell(7000)->addText('Direksi/Pengurus yang bertindak untuk dan atas nama perusahaan tidak masuk dalam daftar Penyedia Barang/Jasa yang terkena daftar hitam (Blacklist)');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('9');
        $table->addCell(1000)->addText('Memiliki Nomor Pokok Wajib Pajak (NPWP) Perusahaan');
        $table->addCell(7000)->addText('Melampirkan foto kopi Surat Pengukuhan Pengusaha Kena Pajak (PKP)');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('10');
        $table->addCell(1000)->addText('Telah memenuhi kewajiban  perpajakan  tahun  terakhir');
        $table->addCell(7000)->addText('Dibuktikan dengan menyampaikan Foto kopi bukti tanda  terima  penyampaian Surat Pemberitahuan Tahunan (SPT) Pajak Penghasilan (PPh) Badan tahun terakhir terhitung pada saat peserta mendaftar kualifikasi, Surat Setoran Pajak (SSP) PPh Pasal 29 dan Pajak Pertambahan Nilai (PPN) 3 (tiga) bulan terakhir terhitung pada saat peserta mendaftar kualifikasi atau Surat Keterangan Fiskal (SKF) sebagai pengganti SPT,SSP dan PPN');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('11');
        $table->addCell(1000)->addText('Mempunyai kemampuan keuangan yang memadai');
        $table->addCell(7000)->addText(htmlspecialchars('Mempunyai kemampuan keuangan yang memadai yang didukung dengan'.
            ' melampirkan foto kopi Laporan keuangan yang telah diaudit oleh Kantor Akuntan Publik atau dapat berupa'.
            ' Foto kopi hasil rating atau pemeringkatan dari perusahaan/lembaga pemeringkat keuangan yang kredibel oleh'.
            'PT. D & B Indonesia (Dun & Bradstreet)(Bagi pelaku usaha mikro dan kecil, laporan keuangan diaudit'.
            'oleh Kantor Akuntan Publik atau dapat disahkan oleh Pimpinan Perusahaan).'));
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('12');
        $table->addCell(1000)->addText('Referensi Bank Perusahaan');
        $table->addCell(7000)->addText('Melampirkan Asli Referensi Bank Perusahaan');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('13');
        $table->addCell(1000)->addText('Pengurus perusahaan');
        $table->addCell(7000)->addText('Melampirkan copy identitas pengurus perusahaan');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(200)->addText('14');
        $table->addCell(1000)->addText('Daftar pengalaman pekerjaan');
        $table->addCell(7000)->addText('Melampirkan daftar pengalaman pekerjaan');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addRow();
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(3000, $cellVCentered)->addText(htmlspecialchars('KESIMPULAN'), $fontStyle, ['alignment' => Jc::CENTER]);
        $table->addCell(3000, $cellVCentered)->addText(htmlspecialchars(''), $fontStyle, ['alignment' => Jc::CENTER]);

        $section->addText(
            'Demikian Berita Acara Evaluasi Dan Pembuktian Kualifikasi Pengadaan Langsung ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.'
            ,array('name' => 'Arial' ,'size' => 10),['alignment' => Jc::BOTH]
        );

        $table = $section->addTable();

        $table->addRow();
        $table->addCell(6000)->addText(
            ''
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            'Pejabat Pelaksana Pengadaan'
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
            'Yuwana Hanif Utomo'
            ,array('alignment'=>'center','name' => 'Arial', 'size' => 10),['alignment' => Jc::CENTER]
        );

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(public_path('data-pengadaan/hasil-klarifikasi/' . $data->judul . '1.docx'));
    }
}
