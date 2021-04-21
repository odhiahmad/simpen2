<script>
    function updateTanggal() {
        var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",];

        var tglJumlah10 = $('#rks_jumlah');
        var tglJumlah1 = $('#survey_harga_pasar_jumlah')
        var tglJumlah2 = $('#hps_jumlah');
        var tglJumlah3 = $('#undangan_pengadaan_langsung_jumlah');
        var tglJumlah4 = $('#pemasukan_dok_penawaran_jumlah');
        var tglJumlah8 = $('#pemasukan_dok_penawaran_jumlah_dari');
        var tglJumlah5 = $('#evaluasi_dok_penawaran_jumlah');
        var tglJumlah9 = $('#evaluasi_dok_penawaran_jumlah_dari');
        var tglJumlah6 = $('#ba_hasil_klarifikasi_dan_nego_penawaran_jumlah');
        var tglJumlah7 = $('#spbj_jumlah');
       

        var jp10 = parseInt(tglJumlah10.val());
        var jp1 = parseInt(tglJumlah1.val());
        var jp2 = parseInt(tglJumlah2.val());
        var jp3 = parseInt(tglJumlah3.val());
        var jp4 = parseInt(tglJumlah4.val());
        var jp5 = parseInt(tglJumlah5.val());
        var jp6 = parseInt(tglJumlah6.val());
        var jp7 = parseInt(tglJumlah7.val());
        var jp8 = parseInt(tglJumlah8.val());
        var jp9 = parseInt(tglJumlah9.val());



        var tanggalDiterimaP = $('#tanggal_diterima_panitia')
        var getTanggal = tanggalDiterimaP.val();
        var gTd = new Date(getTanggal);

        var tambahTgl10 = new Date(gTd.getFullYear(), gTd.getMonth(), gTd.getDate() + (jp10));
        var tambahTgl1 = new Date(gTd.getFullYear(), gTd.getMonth(), gTd.getDate() + (jp1)+ (jp10));
        var tambahTgl2 = new Date(gTd.getFullYear(), gTd.getMonth(), gTd.getDate() + (jp1 + jp2)+ (jp10));
        var tambahTgl3 = new Date(gTd.getFullYear(), gTd.getMonth(), gTd.getDate() + (jp1 + jp2 + jp3)+ (jp10));
        var tambahTgl8 = new Date(gTd.getFullYear(), gTd.getMonth(), gTd.getDate() + (jp1 + jp2 + jp3 + jp8)+ (jp10));
        var tambahTgl4 = new Date(gTd.getFullYear(), gTd.getMonth(), gTd.getDate() + (jp1 + jp2 + jp3 + jp4 + jp8)+ (jp10));
        var tambahTgl9 = new Date(gTd.getFullYear(), gTd.getMonth(), gTd.getDate() + (jp1 + jp2 + jp3 + jp4 + jp8 + jp9)+ (jp10));
        var tambahTgl5 = new Date(gTd.getFullYear(), gTd.getMonth(), gTd.getDate() + (jp1 + jp2 + jp3 + jp4 + jp5 + jp8 + jp9)+ (jp10));
        var tambahTgl6 = new Date(gTd.getFullYear(), gTd.getMonth(), gTd.getDate() + (jp1 + jp2 + jp3 + jp4 + jp5 + jp6 + jp8 + jp9)+ (jp10));
        var tambahTgl7 = new Date(gTd.getFullYear(), gTd.getMonth(), gTd.getDate() + (jp1 + jp2 + jp3 + jp4 + jp5 + jp6 + jp7 + jp8 + jp9)+ (jp10));


        $('#rks_tgl').datepicker('setDate', tambahTgl10);
        $('#survey_harga_pasar_tgl').datepicker('setDate', tambahTgl1);
        $('#hps_tgl').datepicker('setDate', tambahTgl2);
        $('#undangan_pengadaan_langsung_tgl').datepicker('setDate', tambahTgl3);
        $('#pemasukan_dok_penawaran_tgl').datepicker('setDate', tambahTgl4);
        $('#evaluasi_dok_penawaran_tgl').datepicker('setDate', tambahTgl5);
        $('#pemasukan_dok_penawaran_tgl_dari').datepicker('setDate', tambahTgl8);
        $('#evaluasi_dok_penawaran_tgl_dari').datepicker('setDate', tambahTgl9);
        $('#ba_hasil_klarifikasi_dan_nego_penawaran_tgl').datepicker('setDate', tambahTgl6);
        $('#spbj_tgl').datepicker('setDate', tambahTgl7);


        $('#rks_hari').val(hari[tambahTgl10.getDay()])
        $('#survey_harga_pasar_hari').val(hari[tambahTgl1.getDay()])
        $('#hps_hari').val(hari[tambahTgl2.getDay()]);
        $('#undangan_pengadaan_langsung_hari').val(hari[tambahTgl3.getDay()]);
        $('#pemasukan_dok_penawaran_hari_dari').val(hari[tambahTgl8.getDay()]);
        $('#evaluasi_dok_penawaran_hari_dari').val(hari[tambahTgl9.getDay()]);
        $('#pemasukan_dok_penawaran_hari').val(hari[tambahTgl4.getDay()]);
        $('#evaluasi_dok_penawaran_hari').val(hari[tambahTgl5.getDay()]);
        $('#ba_hasil_klarifikasi_dan_nego_penawaran_hari').val(hari[tambahTgl6.getDay()]);
        $('#spbj_hari').val(hari[tambahTgl7.getDay()]);


    }

    $(document).ready(function () {

        var $nppv8 = $('#nppv8')
        var $nppv1 = $('#nppv1')
        var $nppv2 = $('#nppv2')
        var $nppv3 = $('#nppv3')
        var $nppv5 = $('#nppv5')
        var $nppv6 = $('#nppv6')
        var $nppv7 = $('#nppv7'), $value = $('.no_proses_pengadaan');
        $value.on('input', function (e) {
            var total = 1;
            $value.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    total = total * parseInt(this.value, 10);
            });
            if ($('#fungsi_pembangkit').val() === 'Pembangkit') {
                $nppv8.val('0' + total + '.RKS/DAN.01.01/210200/' + $('#tahun').val());
                $nppv1.val('0' + total + '.BASVY-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv2.val('0' + total + '.HPS-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv3.val('0' + total + '.UND-SP/DAN.02.01/210200/' + $('#tahun').val());

                $nppv5.val('0' + total + '.BAEP-SP/DAN.02.01/210200/' + $('#tahun').val());
                $nppv6.val('0' + total + '.BAHKTNH/DAN.02.01/210200/' + $('#tahun').val());
                $nppv7.val('0' + total + '.SPBJ/DAN.02.01/210200/' + $('#tahun').val());


            } else if ($('#fungsi_pembangkit').val() === 'Sarana') {
                $nppv8.val('0' + total + '.RKS/DAN.01.01/210200/' + $('#tahun').val());
                $nppv1.val('0' + total + '.BASVY-PL/DAN.02.07/210200/' + $('#tahun').val());
                $nppv2.val('0' + total + '.HPS-PL/DAN.02.07/210200/' + $('#tahun').val());
                $nppv3.val('0' + total + '.PENGLLNG/DAN.07.01/210200/' + $('#tahun').val());

                $nppv5.val('0' + total + '.BAEP-SP/DAN.02.07/210200/' + $('#tahun').val());
                $nppv6.val('0' + total + '.BAHKTNH/DAN.02.07/210200/' + $('#tahun').val());
                $nppv7.val('0' + total + '.SPBJ/DAN.02.07/210200/' + $('#tahun').val());
            }
        });


    });
</script>
