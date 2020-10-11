<?php


namespace App\Http\Controllers\Template;


use App\Pengadaan;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;
use PhpOffice\PhpWord\Style\ListItem;

class UsulanPenetapanPemenang
{
    public function UsulanPenetapanPemenang($id)
    {
        $data = Pengadaan::where('id',$id)->first();
        $phpWord = new PhpWord();
        $paragraphOptions = array(
            'spaceBefore' => 0, 'spaceAfter' => 0
        );
        $section = $phpWord->addSection(
            array('marginLeft' => 1000, 'marginRight' => 800,
                'marginTop' => 600, 'marginBottom' => 600)
        );
        $header = $section->addHeader();

        $predefinedMultilevelStyle = array('listType' => '-');


//        $header->addImage(public_path('logo_pln.png'), array('width'=>40,'marginTop' => round(Converter::cmToPixel(2)),'marginLeft' => round(Converter::cmToPixel(2))));
        $header->addText('PT PLN (Persero)', array('marginLeft' => 40), $paragraphOptions);
        $header->addText('Unit Induk Pembangkitan Sumatera Bagian Utara', array('marginLeft' => 40), $paragraphOptions);
        $header->addText('Unit Pelaksana Pengendalian Pembangkitan Pekanbaru', array('marginLeft' => 40));

        $section->addText(
            'N O T A  D I N A S'
            , array('name' => 'Arial', 'size' => 14, 'underline' => 'single', 'bold' => true),['alignment' => Jc::CENTER,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $section->addText(
            'Nomor :' . $data->nd_usulan_tetap_pemenang_nomor
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );

        $section->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(1200)->addText(
            'Kepada'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ': Manager'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(1200)->addText(
            'Dari'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ': Pejabat Pelaksana Pengadaan'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $table->addRow();
        $table->addCell(1200)->addText(
            'Tanggal'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ': 20 Juni 2020'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $table->addRow();
        $table->addCell(1200)->addText(
            'Sifat'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ': Rahasia'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );


        $table->addRow();
        $table->addCell(1200)->addText(
            'Lampiran'
            , array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(1200)->addText(
            ': -'
            , array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $table->addRow();
        $table->addCell(1200)->addText(
            'Perihal'
            , array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ': '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $section->addText(
            '',
            array('widowControl' => false, 'indentation' => array('left' => 800, 'right' => 120))
        );
        $section->addText(
            '',
            array('widowControl' => false, 'indentation' => array('left' => 800, 'right' => 120))
        );
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(12000)->addText(
            'Dengan ini kami laporkan sebagai berikut :'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(12000)->addText(
            'Untuk memenuhi pelaksanaan pekerjaan '.$data->judul
            .'No. RKS. '. $data->nd_usulan_tetap_pemenang_nomor.' tanggal '.$data->nd_usulan_tetap_tgl.', telah dilakukan'
            .'proses Pengadaan Barang/Jasa dengan metode '.$data->metode.' sesuai'
            .'Surat Undangan No: '.$data->nd_usulan_tetap_pemenang_nomor.' Tanggal '.$data->nd_usulan_tetap_tgl.' serta berdasarkan'
            .'Berita Acara Hasil Pengadaan Langsung No. '.$data->ba_hasil_pengadaan_nomor .'Tanggal '.$data->ba_hasil_pengadaan_tgl.'. '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(10000)->addText(
            'Dengan memperhatikan ketentuan-ketentuan dalam Keputusan Direksi PT PLN (Persero) '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $section->addText(
            '',
            array('widowControl' => false, 'indentation' => array('left' => 800, 'right' => 120))
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

        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(10000)->addListItem('Peraturan Direksi PT PLN (Persero) Nomor : 022.P/DIR/2020 Tanggal 02 Maret 2020 tentang Pedoman Pengadaan Barang/Jasa PT PLN (Persero)', 0, null, $multilevelNumberingStyleName);
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(10000)->addListItem('Keputusan Direksi PT PLN (Persero) Nomor: 0069.P/DIR/2017 tanggal 27 Juli 2017 tentang Pedoman Pemberian/Pengenaan sanksi daftar hitam (Black list).', 0, null, $multilevelNumberingStyleName);

        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(10000)->addText(
            'Maka sesuai penawaran harga dan hasil Evaluasi, Klarifikasi dan Negosiasi penawaran diusulkan sebagai calon pemenang adalah :'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Nama Perusahaan'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Alamat'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- NPWP'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Harga Penawaran Awal'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::START,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': ,- (termasuk PPN 10%)'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Terbilang Harga Penawaran Awal'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::START,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': (termasuk PPN 10%)'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Harga Hasil Negosiasi  '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::START,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ':  (sudah termasuk PPn 10%)'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Terbilang'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': (termasuk Ppn 10%)'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Waktu Pelaksanaan'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::START,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': .'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $section->addText(
            '', array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH]
        );
        $table = $section->addTable();

        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(10000)->addText(
            'Demikian kami sampaikan Usulan Penetapan Pemenang ini untuk digunakan dalam penetapan pemenang Pengadaan Langsung'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $section->addText(
            '',
            array('widowControl' => false, 'indentation' => array('left' => 800, 'right' => 120))
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
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            'Rahmat Dian Amir'
            , array('name' => 'Arial', 'size' => 10,'bold'=>true), ['alignment' => Jc::CENTER]
        );


        $section = $phpWord->addSection();
        $section->addText(
            'N O T A  D I N A S'
            , array('name' => 'Arial', 'size' => 14, 'underline' => 'single', 'bold' => true),['alignment' => Jc::CENTER,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $section->addText(
            'Nomor :' . $data->nd_penetapan_pemenang_nomor
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );

        $section->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(1200)->addText(
            'Kepada'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ': Manager'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(1200)->addText(
            'Dari'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ': Pejabat Pelaksana Pengadaan'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $table->addRow();
        $table->addCell(1200)->addText(
            'Tanggal'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ': 20 Juni 2020'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $table->addRow();
        $table->addCell(1200)->addText(
            'Sifat'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ': Rahasia'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );


        $table->addRow();
        $table->addCell(1200)->addText(
            'Lampiran'
            , array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(1200)->addText(
            ': -'
            , array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $table->addRow();
        $table->addCell(1200)->addText(
            'Perihal'
            , array('name' => 'Arial', 'size' => 10),['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(5000)->addText(
            ': '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $section->addText(
            '',
            array('widowControl' => false, 'indentation' => array('left' => 800, 'right' => 120))
        );
        $section->addText(
            '',
            array('widowControl' => false, 'indentation' => array('left' => 800, 'right' => 120))
        );
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(12000)->addText(
            'Dengan ini kami laporkan sebagai berikut :'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(12000)->addText(
            'Menunjuk Nota Dinas Pejabat Pelaksana Pengadaan PT PLN (Persero) Unit '.
            'Pelaksana Pengendalian Pembangkitan Pekanbaru Nomor :'.$data->nd_usulan_tetap_pemenang_nomor.' Tanggal'
        .$data->nd_usulan_tetap_pemenang_tgl.' perihal Usulan Penetapan Pemenang tentang pelaksanaan proses '.
            'Pengadaan Barang/Jasa dengan metode Pengadaan Langsung untuk paket pekerjaan Pengadaan'
            .$data->judul.' No. 044.RKS/DAN.01.01/210200/2020 tanggal 02 Juni 2020.  '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(10000)->addText(
            'Dengan memperhatikan ketentuan-ketentuan dalam Keputusan Direksi PT PLN (Persero) '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $section->addText(
            '',
            array('widowControl' => false, 'indentation' => array('left' => 800, 'right' => 120))
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

        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(10000)->addListItem('Peraturan Direksi PT PLN (Persero) Nomor : 022.P/DIR/2020 Tanggal 02 Maret 2020 tentang Pedoman Pengadaan Barang/Jasa PT PLN (Persero)', 0, null, $multilevelNumberingStyleName);
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(10000)->addListItem('Keputusan Direksi PT PLN (Persero) Nomor: 0069.P/DIR/2017 tanggal 27 Juli 2017 tentang Pedoman Pemberian/Pengenaan sanksi daftar hitam (Black list).', 0, null, $multilevelNumberingStyleName);

        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(10000)->addText(
            'Maka sesuai penawaran harga dan hasil Evaluasi, Klarifikasi dan Negosiasi penawaran diusulkan sebagai calon pemenang adalah :'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Nama Perusahaan'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Alamat'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- NPWP'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Harga Penawaran Awal'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::START,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': ,- (termasuk PPN 10%)'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Terbilang Harga Penawaran Awal'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::START,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': (termasuk PPN 10%)'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Harga Hasil Negosiasi  '
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::START,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ':  (sudah termasuk PPn 10%)'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Terbilang'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': (termasuk Ppn 10%)'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(2400)->addText(
            '- Waktu Pelaksanaan'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::START,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(8000)->addText(
            ': .'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $section->addText(
            '', array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH]
        );
        $table = $section->addTable();

        $table->addRow();
        $table->addCell(2000)->addText(
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $table->addCell(10000)->addText(
            'Demikian kami sampaikan Usulan Penetapan Pemenang ini untuk digunakan dalam penetapan pemenang Pengadaan Langsung'
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::BOTH,'spaceBefore' => 0, 'spaceAfter' => 0]
        );
        $section->addText(
            '',
            array('widowControl' => false, 'indentation' => array('left' => 800, 'right' => 120))
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
            ''
            , array('name' => 'Arial', 'size' => 10), ['alignment' => Jc::CENTER]
        );
        $table->addCell(6000)->addText(
            'Rahmat Dian Amir'
            , array('name' => 'Arial', 'size' => 10,'bold'=>true), ['alignment' => Jc::CENTER]
        );
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(public_path('data-pengadaan/usulan-penetapan-pemenang/' . $data->judul . '.docx'));
    }

}
