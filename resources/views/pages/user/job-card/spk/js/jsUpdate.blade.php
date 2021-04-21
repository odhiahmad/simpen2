<script>
    function CurrencyFormat(number) {
        var decimalplaces = 0;
        var decimalcharacter = ",00";
        var thousandseparater = ".";
        number = parseFloat(number);
        var sign = number < 0 ? "-" : "";
        var formatted = new String(number.toFixed(decimalplaces));
        if (decimalcharacter.length && decimalcharacter != ".") {
            formatted = formatted.replace(/\./, decimalcharacter);
        }
        var integer = "";
        var fraction = "";
        var strnumber = new String(formatted);
        var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
        if (dotpos > -1) {
            if (dotpos) {
                integer = strnumber.substr(0, dotpos);
            }
            fraction = strnumber.substr(dotpos + 1);
        } else {
            integer = strnumber;
        }
        if (integer) {
            integer = String(Math.abs(integer));
        }
        while (fraction.length < decimalplaces) {
            fraction += "0";
        }
        temparray = new Array();
        while (integer.length > 3) {
            temparray.unshift(integer.substr(-3));
            integer = integer.substr(0, integer.length - 3);
        }
        temparray.unshift(integer);
        integer = temparray.join(thousandseparater);
        return sign + integer + decimalcharacter + fraction;
    }

    $(document).ready(function () {
        $('.dynamic').change(function () {
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent')
                var _token = $('input[name="_token"]').val()

                $.ajax({
                    url: "{{route('jobcard.spk.fetch')}}",
                    method: "POST",
                    data: {select: select, value: value, _token: _token, dependent: dependent},
                    success: function (result) {

                        $('.metode_pengadaan_jenis1').html(result)
                    }
                })
            }
        })


        $('.metode_pengadaan_jenis1').change(function () {
            if ($(this).val() != '') {

                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent')
                var _token = $('input[name="_token"]').val()

                $.ajax({
                    url: "{{route('jobcard.spk.fetchJenis1')}}",
                    method: "POST",
                    data: {select: select, value: value, _token: _token, dependent: dependent},
                    success: function (result) {

                        $('.metode_pengadaan_jenis2').html(result)
                        $('.metode_pengadaan_jenis3').html('')
                        $('.metode_pengadaan_jenis4').html('')
                    }
                })
            }
        })

        $('.metode_pengadaan_jenis2').change(function () {
            if ($(this).val() != '') {

                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent')
                var _token = $('input[name="_token"]').val()

                $.ajax({
                    url: "{{route('jobcard.spk.fetch')}}",
                    method: "POST",
                    data: {select: select, value: value, _token: _token, dependent: dependent},
                    success: function (result) {

                        $('.metode_pengadaan_jenis3').html(result)
                        $('.metode_pengadaan_jenis4').html('')
                    }
                })
            }
        })

        $('.metode_pengadaan_jenis3').change(function () {
            if ($(this).val() != '') {

                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent')
                var _token = $('input[name="_token"]').val()

                $.ajax({
                    url: "{{route('jobcard.spk.fetch')}}",
                    method: "POST",
                    data: {select: select, value: value, _token: _token, dependent: dependent},
                    success: function (result) {

                        $('.metode_pengadaan_jenis4').html(result)
                    }
                })
            }
        })


        $('.tempat_penyerahan').change(function () {
            if ($(this).val() != '') {

                var select = $(this).attr("id");
                var value = $(this).val();
                var id = $('.tempat_penyerahan option:selected').data('id');
                var dependent = $(this).data('dependent')
                var _token = $('input[name="_token"]').val()

                $.ajax({
                    url: "{{route('jobcard.spbj.getAlamatPenyerahan')}}",
                    method: "POST",
                    data: {select: select,id:id, value: value, _token: _token, dependent: dependent},
                    success: function (result) {
                        console.log(result.data.alamat)
                        $("#alamat_penyerahan").val(result.data.alamat);
                    
                    }
                })
            }
        })

        $('.jabatan_direksi').change(function () {
            if ($(this).val() != '') {

                $(".direksi").val($('.jabatan_direksi option:selected').data('id'));
                
            }
        })

        $("#rab, #nilai_kontrak").keyup(function () {
            // $("#rab").val(CurrencyFormat($("#rab").val()));
            // $("#nilai_kontrak").val(CurrencyFormat( $("#nilai_kontrak").val()));
            var nilaiRab = $("#rab").val();
            var nilaiKontrak = $("#nilai_kontrak").val()
            $("#sisa_anggaran").val(CurrencyFormat(nilaiRab - nilaiKontrak));

        });

        $("#harga_penawaran").keyup(function () {
            var harga_penawaran_get = $("#harga_penawaran").val();

            $("#harga_kontrak").val(0.985 * harga_penawaran_get);
            $("#nilai_jaminan").val((0.985 * harga_penawaran_get) * 0.05);
        });


        $('.bagian').change(function () {
            if ($(this).val() != '') {
                if ($(this).val() === 'Enjiniring') {
                    $('#direksi').val('Agus Cahyono')
                } else if ($(this).val() === 'Keu SDM & Adm') {
                    $('#direksi').val('Khairul')
                } else if ($(this).val() === 'Operasi & Pemeliharaan') {
                    $('#direksi').val('Anton Gordon Sitohang')
                }
            }
        })

        $("#status_berakhir,#perusahaan,#melampirkan_sertifikat_coo,#melampirkan_sertifikat,#melampirkan_msds,#coo,#sistem_denda,#penerbit_coo,#penerbit_garansi").select2({
            placeholder: "Pilih",
        });
        $(".metode_pengadaan_jenis1").select2({
            placeholder: "Pilih Metode",
        });

        $(".jabatan_direksi").select2({
            placeholder: "Pilih Jabatan Direksi",
        });

        
        $(".pos_anggaran").select2({
            placeholder: "Pilih Pos Anggaran",
        });

        $("#bagian").select2({
            placeholder: "Pilih Bagian",
        });
        $("#fungsi_pembangkit").select2({
            placeholder: "Pilih Fungsi Pembangkit",
        });
        $("#tempat_penyerahan").select2({
            placeholder: "Pilih Tempat Penyerahan",
        });
        $("#metode_pengadaan").select2({
            placeholder: "Pilih Metode Pengadaan",
        });
        $("#masa_berlaku_surat").select2({
            placeholder: "Pilih Masa Berlaku Surat",
        });
        $("#cara_pembayaran").select2({
            placeholder: "Pilih Cara Pembayaran",
        });
        $("#jenis_perjanjian").select2({
            placeholder: "Pilih Jenis Perjanjian",
        });
        $("#sumber_dana").select2({
            placeholder: "Pilih Sumber Dana",
        });
        $("#masa_garansi").select2({
            placeholder: "Pilih Masa Garansi",
        });
        $("#syarat_bidang").select2({
            placeholder: "Pilih Syarat Bidang",
        });
        $("#vfmc").select2({
            placeholder: "Pilih VFMC",
        });
        $("#vfmc2").select2({
            placeholder: "Pilih VFMC",
        });
        $("#pengawas").select2({
            placeholder: "Pilih Pengawas",
        });
        $("#jabatan_pengawas").select2({
            placeholder: "Pilih Jabatan Pengawas",
        });
        $("#pic_pelaksana").select2({
            placeholder: "Pilih PIC Pelaksana",
        });
        $("#status").select2({
            placeholder: "Pilih Status",
        });

        // $("#hps").inputmask("Rp 999.999.999", {numericInput: !0})
        var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",];


        $("#tanggal_mulai,#tanggal_nota_dinas,#rks_tgl,#spk_tgl,#tanggal_diterima_panitia,#tanggal,#nd_penetapan_pemenang_tgl,#nd_usulan_tetap_pemenang_tgl,#ba_hasil_pengadaan_langsung_tgl,#survey_harga_pasar_tgl, #hps_tgl, #undangan_pengadaan_langsung_tgl,#pemasukan_dok_penawaran_tgl_sd,#pemasukan_dok_penawaran_tgl_dari,#evaluasi_dokumen_tgl_sd,#evaluasi_dokumen_tgl_dari,#ba_hasil_klarifikasi_tgl").datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: !0,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            },
        });
        $("#jangka_waktu_tgl").datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: !0,
            // orientation: "bottom left",
            // templates: {
            //     leftArrow: '<i class="la la-angle-left"></i>',
            //     rightArrow: '<i class="la la-angle-right"></i>'
            // },
        });

        $("#tanggal_diterima_panitia").change(function () {
            var a = $("#tanggal_diterima_panitia").val()
            var getTanggal1 = new Date(a)

            $('#survey_harga_pasar_tgl').val(a)
            $('#hps_tgl').val(a)
            $('#rks_tgl').val(a)
            $('#spk_tgl').val(a)
            $('#undangan_pengadaan_langsung_tgl').val(a)
            $('#pemasukan_dok_penawaran_tgl_dari').val(a)
            $('#evaluasi_dokumen_tgl_dari').val(a)
            $('#pemasukan_dok_penawaran_tgl_sd').val(a)
            $('#evaluasi_dokumen_tgl_sd').val(a)
            $('#ba_hasil_klarifikasi_tgl').val(a)
            $('#ba_hasil_pengadaan_langsung_tgl').val(a)
            $('#nd_usulan_tetap_pemenang_tgl').val(a)
            $('#nd_penetapan_pemenang_tgl').val(a)
            $('#jangka_waktu_tgl').val(a)

            $('#survey_harga_pasar_hari').val(hari[getTanggal1.getDay()])
            $('#hps_hari').val(hari[getTanggal1.getDay()])
            $('#rks_hari').val(hari[getTanggal1.getDay()])
            $('#spk_hari').val(hari[getTanggal1.getDay()])
            $('#undangan_pengadaan_langsung_hari').val(hari[getTanggal1.getDay()])
            $('#pemasukan_dok_penawaran_hari_dari').val(hari[getTanggal1.getDay()])
            $('#pemasukan_dok_penawaran_hari_sd').val(hari[getTanggal1.getDay()])
            $('#evaluasi_dokumen_hari_dari').val(hari[getTanggal1.getDay()])
            $('#evaluasi_dokumen_hari_sd').val(hari[getTanggal1.getDay()])
            $('#ba_hasil_klarifikasi_hari').val(hari[getTanggal1.getDay()])
            $('#ba_hasil_pengadaan_langsung_hari').val(hari[getTanggal1.getDay()])
            $('#nd_usulan_tetap_pemenang_hari').val(hari[getTanggal1.getDay()])
            $('#nd_penetapan_pemenang_hari').val(hari[getTanggal1.getDay()])
            $('#jangka_waktu_hari').val(hari[getTanggal1.getDay()])
        })

        $("#tanggal").change(function () {
            var a = $('#tanggal').val()
            var getTanggal = new Date(a)

            $('#hari').val(hari[getTanggal.getDay()])

        })


        var $nppv3 = $('#nppv3'), $value1 = $('.no_undang_pl');
        $value1.on('input', function (e) {
            var tes1 = 1;
            $value1.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    tes1 = tes1 * parseInt(this.value, 10);
            });
            $nppv3.val('0' + tes1 + '.UND-PL/DAN.02.01/210200/' + $('#tahun').val());
        });

        var $nppv9 = $('#nppv9')
        var $nppv8 = $('#nppv8')
        var $nppv7 = $('#nppv7')
        var $nppv6 = $('#nppv6')
        var $nppv5 = $('#nppv5')
        var $nppv4 = $('#nppv4')
        var $nppv2 = $('#nppv2')
        var $nppv1 = $('#nppv1')
        var $nppv10 = $('#nppv10')
        var $nppv11 = $('#nppv11'), $value = $('.no_proses_pengadaan');
        $value.on('input', function (e) {
            var total = 1;
            $value.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    total = total * parseInt(this.value, 10);
            });
            if ($('#fungsi_pembangkit').val() === 'Pembangkit') {
                $nppv1.val('0' + total + '.BASVY-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv2.val('0' + total + '.HPS-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv4.val('0' + total + '.BAEP-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv5.val('0' + total + '.BAEP-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv6.val('0' + total + '.BAHKTNH-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv7.val('0' + total + '.BAHPL-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv8.val('0' + total + '.NDUP-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv9.val('0' + total + '.NDPP-PL/DAN.02.01/210200/' + $('#tahun').val());
                $nppv10.val('0' + total + '.SPK/DAN.02.01/210200/' + $('#tahun').val());
                $nppv11.val('0' + total + '.RKS/DAN.01.01/210200/' + $('#tahun').val());
            } else if ($('#fungsi_pembangkit').val() === 'Sarana') {
                $nppv1.val('0' + total + '.BASVY-PL/DAN.02.07/210200/' + $('#tahun').val());
                $nppv2.val('0' + total + '.HPS-PL/DAN.02.07/210200/' + $('#tahun').val());
                $nppv4.val('0' + total + '.BAEP-PL/DAN.02.07/210200/' + $('#tahun').val());
                $nppv5.val('0' + total + '.BAEP-PL/DAN.02.07/210200/' + $('#tahun').val());
                $nppv6.val('0' + total + '.BAHKTNH-PL/DAN.02.07/210200/' + $('#tahun').val());
                $nppv7.val('0' + total + '.BAHPL-PL/DAN.02.07/210200/' + $('#tahun').val());
                $nppv8.val('0' + total + '.NDUP-PL/DAN.02.07/210200/' + $('#tahun').val());
                $nppv9.val('0' + total + '.NDPP-PL/DAN.02.07/210200/' + $('#tahun').val());
                $nppv10.val('0' + total + '.SPK/DAN.02.07/210200/' + $('#tahun').val());
                $nppv11.val('0' + total + '.RKS/DAN.01.06/210200/' + $('#tahun').val());
            }
        });


        // $("#hargaSatuan").inputmask("Rp 999.999.999,99", {numericInput: !0})
        $("#total").inputmask("Rp 999.999.999", {numericInput: !0})

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        var tglA = $('#rks_jumlah');
        var tglB = $('#survey_harga_pasar_jumlah')
        var tglC = $('#hps_jumlah');
        var tglD = $('#undangan_pengadaan_langsung_jumlah');
        var tglE = $('#pemasukan_dok_penawaran_jumlah_dari');
        var tglF = $('#pemasukan_dok_penawaran_jumlah_sd');
        var tglG = $('#evaluasi_dokumen_jumlah_dari');
        var tglH = $('#evaluasi_dokumen_jumlah_sd');
        var tglI = $('#ba_hasil_klarifikasi_jumlah');
        var tglJ = $('#ba_hasil_pengadaan_langsung_jumlah');
        var tglK = $('#nd_usulan_tetap_pemenang_jumlah');
        var tglL = $('#nd_penetapan_pemenang_jumlah');
        var tglM = $('#spk_jumlah');
        var tglN = $('#jangka_waktu');


        $('#status_berakhir').change(function () {
            if ($(this).val() != '') {
                var value = $(this).val();

                var jumlahA = parseInt(tglA.val())
                var jumlahB = parseInt(tglB.val());
                var jumlahC = parseInt(tglC.val());
                var jumlahD = parseInt(tglD.val());
                var jumlahE = parseInt(tglE.val());
                var jumlahF = parseInt(tglF.val());
                var jumlahG = parseInt(tglG.val());
                var jumlahH = parseInt(tglH.val());
                var jumlahI = parseInt(tglI.val());
                var jumlahJ = parseInt(tglJ.val());
                var jumlahK = parseInt(tglK.val());
                var jumlahL = parseInt(tglL.val());
                var jumlahM = parseInt(tglM.val());

                if (value === 'Sejak BA Terima Lokasi') {
                    $('#jangka_waktu_tgl').val('');
                    $('#jangka_waktu_hari').val('')
                } else {
                    // var totalJangkaWaktu  = value + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM
                    //

                    var getTanggalStatusBerakhir = new Date($('#spk_tgl').val());
                    var tanggalStatusBerakhir = new Date(getTanggalStatusBerakhir.getFullYear(), getTanggalStatusBerakhir.getMonth(), getTanggalStatusBerakhir.getDate() + parseInt(value) - 1)

                    $('#jangka_waktu_tgl').datepicker('setDate', tanggalStatusBerakhir);
                    $('#jangka_waktu_hari').val(hari[tanggalStatusBerakhir.getDay()])
                }
            }
        })


        var $tgl0 = $('#tanggal_diterima_panitia'), $valueTgl0 = $('#rks_jumlah');
        $valueTgl0.on('input', function (e) {
            var totaltgl0 = 1;
            $valueTgl0.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl0 = totaltgl0 * parseInt(this.value, 10);
            });

            var getTanggalTes = $tgl0.val();
            var getTanggal0 = new Date(getTanggalTes);

            var jumlahB = parseInt(tglB.val());
            var jumlahC = parseInt(tglC.val());
            var jumlahD = parseInt(tglD.val());
            var jumlahE = parseInt(tglE.val());
            var jumlahF = parseInt(tglF.val());
            var jumlahG = parseInt(tglG.val());
            var jumlahH = parseInt(tglH.val());
            var jumlahI = parseInt(tglI.val());
            var jumlahJ = parseInt(tglJ.val());
            var jumlahK = parseInt(tglK.val());
            var jumlahL = parseInt(tglL.val());
            var jumlahM = parseInt(tglM.val());


            var getFull0 = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + totaltgl0)
            var tambahTglB = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB));
            var tambahTglC = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC));
            var tambahTglD = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD));
            var tambahTglE = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE));
            var tambahTglF = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF));
            var tambahTglG = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG));
            var tambahTglH = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH));
            var tambahTglI = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI));
            var tambahTglJ = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ));
            var tambahTglK = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
            var tambahTglL = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
            var tambahTglM = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));

            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal0.getFullYear(), getTanggal0.getMonth(), getTanggal0.getDate() + (totaltgl0 + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])

            $('#rks_tgl').datepicker('setDate', getFull0);
            $('#rks_hari').val(hari[getFull0.getDay()]);
            $('#survey_harga_pasar_tgl').datepicker('setDate', tambahTglB);
            $('#survey_harga_pasar_hari').val(hari[tambahTglB.getDay()]);
            $('#hps_tgl').datepicker('setDate', tambahTglC);
            $('#hps_hari').val(hari[tambahTglC.getDay()]);
            $('#undangan_pengadaan_langsung_tgl').datepicker('setDate', tambahTglD);
            $('#undangan_pengadaan_langsung_hari').val(hari[tambahTglD.getDay()]);
            $('#pemasukan_dok_penawaran_tgl_dari').datepicker('setDate', tambahTglE);
            $('#pemasukan_dok_penawaran_hari_dari').val(hari[tambahTglE.getDay()]);
            $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', tambahTglF);
            $('#pemasukan_dok_penawaran_hari_sd').val(hari[tambahTglF.getDay()]);
            $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', tambahTglG);
            $('#evaluasi_dokumen_hari_dari').val(hari[tambahTglG.getDay()]);
            $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
            $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
            $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
            $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
            $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
            $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
            $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
            $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
            $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
            $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
            $('#spk_tgl').datepicker('setDate', tambahTglM);
            $('#spk_hari').val(hari[tambahTglM.getDay()])


        });

        var $tgl1 = $('#tanggal_diterima_panitia'), $valueTgl1 = $('#survey_harga_pasar_jumlah');
        $valueTgl1.on('input', function (e) {
            var totaltgl1 = 1;
            $valueTgl1.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl1 = totaltgl1 * parseInt(this.value, 10);
            });
            var jumlahA = parseInt(tglA.val());

            var getTanggalTes = $tgl1.val();
            var getTanggal1 = new Date(getTanggalTes)
            var getFull1 = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA))

            $('#survey_harga_pasar_tgl').datepicker('setDate', getFull1);
            $('#survey_harga_pasar_hari').val(hari[getFull1.getDay()])

            console.log(jumlahA + totaltgl1)
            var jumlahC = parseInt(tglC.val());
            var jumlahD = parseInt(tglD.val());
            var jumlahE = parseInt(tglE.val());
            var jumlahF = parseInt(tglF.val());
            var jumlahG = parseInt(tglG.val());
            var jumlahH = parseInt(tglH.val());
            var jumlahI = parseInt(tglI.val());
            var jumlahJ = parseInt(tglJ.val());
            var jumlahK = parseInt(tglK.val());
            var jumlahL = parseInt(tglL.val());
            var jumlahM = parseInt(tglM.val());


            var tambahTglC = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC));
            var tambahTglD = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD));
            var tambahTglE = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE));
            var tambahTglF = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF));
            var tambahTglG = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG));
            var tambahTglH = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH));
            var tambahTglI = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI));
            var tambahTglJ = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ));
            var tambahTglK = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
            var tambahTglL = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
            var tambahTglM = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));

            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal1.getFullYear(), getTanggal1.getMonth(), getTanggal1.getDate() + (totaltgl1 + jumlahA + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])


            $('#hps_tgl').datepicker('setDate', tambahTglC);
            $('#hps_hari').val(hari[tambahTglC.getDay()]);
            $('#undangan_pengadaan_langsung_tgl').datepicker('setDate', tambahTglD);
            $('#undangan_pengadaan_langsung_hari').val(hari[tambahTglD.getDay()]);
            $('#pemasukan_dok_penawaran_tgl_dari').datepicker('setDate', tambahTglE);
            $('#pemasukan_dok_penawaran_hari_dari').val(hari[tambahTglE.getDay()]);
            $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', tambahTglF);
            $('#pemasukan_dok_penawaran_hari_sd').val(hari[tambahTglF.getDay()]);
            $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', tambahTglG);
            $('#evaluasi_dokumen_hari_dari').val(hari[tambahTglG.getDay()]);
            $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
            $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
            $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
            $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
            $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
            $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
            $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
            $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
            $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
            $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
            $('#spk_tgl').datepicker('setDate', tambahTglM);
            $('#spk_hari').val(hari[tambahTglM.getDay()])


        });

        var $tgl2 = $('#tanggal_diterima_panitia'), $valueTgl2 = $('#hps_jumlah');
        $valueTgl2.on('input', function (e) {
            var totaltgl2 = 1;
            $valueTgl2.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl2 = totaltgl2 * parseInt(this.value, 10);
            });
            var jumlahA = parseInt(tglA.val())
            var jumlahB = parseInt(tglB.val())

            var getTanggalTes1 = $tgl2.val()
            var getTanggal2 = new Date(getTanggalTes1)
            var getFull2 = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB))
            $('#hps_tgl').datepicker('setDate', getFull2);
            $('#hps_hari').val(hari[getFull2.getDay()])


            var jumlahD = parseInt(tglD.val());
            var jumlahE = parseInt(tglE.val());
            var jumlahF = parseInt(tglF.val());
            var jumlahG = parseInt(tglG.val());
            var jumlahH = parseInt(tglH.val());
            var jumlahI = parseInt(tglI.val());
            var jumlahJ = parseInt(tglJ.val());
            var jumlahK = parseInt(tglK.val());
            var jumlahL = parseInt(tglL.val());
            var jumlahM = parseInt(tglM.val());

            var tambahTglD = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD));
            var tambahTglE = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE));
            var tambahTglF = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF));
            var tambahTglG = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG));
            var tambahTglH = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH));
            var tambahTglI = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI));
            var tambahTglJ = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ));
            var tambahTglK = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
            var tambahTglL = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
            var tambahTglM = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));

            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal2.getFullYear(), getTanggal2.getMonth(), getTanggal2.getDate() + (totaltgl2 + jumlahA + jumlahB + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])

            $('#undangan_pengadaan_langsung_tgl').datepicker('setDate', tambahTglD);
            $('#undangan_pengadaan_langsung_hari').val(hari[tambahTglD.getDay()]);
            $('#pemasukan_dok_penawaran_tgl_dari').datepicker('setDate', tambahTglE);
            $('#pemasukan_dok_penawaran_hari_dari').val(hari[tambahTglE.getDay()]);
            $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', tambahTglF);
            $('#pemasukan_dok_penawaran_hari_sd').val(hari[tambahTglF.getDay()]);
            $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', tambahTglG);
            $('#evaluasi_dokumen_hari_dari').val(hari[tambahTglG.getDay()]);
            $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
            $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
            $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
            $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
            $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
            $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
            $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
            $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
            $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
            $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
            $('#spk_tgl').datepicker('setDate', tambahTglM);
            $('#spk_hari').val(hari[tambahTglM.getDay()])


        });


        var $tgl3 = $('#tanggal_diterima_panitia'), $valueTgl3 = $('#undangan_pengadaan_langsung_jumlah');
        $valueTgl3.on('input', function (e) {
            var totaltgl3 = 1;
            $valueTgl3.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl3 = totaltgl3 * parseInt(this.value, 10);
            });
            var jumlahA = parseInt(tglA.val())
            var jumlahB = parseInt(tglB.val());
            var jumlahC = parseInt(tglC.val());

            var getTanggalTes3 = $tgl3.val()
            var getTanggal3 = new Date(getTanggalTes3)
            var getFull3 = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC));
            $('#undangan_pengadaan_langsung_tgl').datepicker('setDate', getFull3);
            $('#undangan_pengadaan_langsung_hari').val(hari[getFull3.getDay()])


            var jumlahE = parseInt(tglE.val());
            var jumlahF = parseInt(tglF.val());
            var jumlahG = parseInt(tglG.val());
            var jumlahH = parseInt(tglH.val());
            var jumlahI = parseInt(tglI.val());
            var jumlahJ = parseInt(tglJ.val());
            var jumlahK = parseInt(tglK.val());
            var jumlahL = parseInt(tglL.val());
            var jumlahM = parseInt(tglM.val());

            var tambahTglE = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE));
            var tambahTglF = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF));
            var tambahTglG = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG));
            var tambahTglH = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH));
            var tambahTglI = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI));
            var tambahTglJ = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ));
            var tambahTglK = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
            var tambahTglL = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
            var tambahTglM = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));

            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal3.getFullYear(), getTanggal3.getMonth(), getTanggal3.getDate() + (totaltgl3 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])

            $('#pemasukan_dok_penawaran_tgl_dari').datepicker('setDate', tambahTglE);
            $('#pemasukan_dok_penawaran_hari_dari').val(hari[tambahTglE.getDay()]);
            $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', tambahTglF);
            $('#pemasukan_dok_penawaran_hari_sd').val(hari[tambahTglF.getDay()]);
            $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', tambahTglG);
            $('#evaluasi_dokumen_hari_dari').val(hari[tambahTglG.getDay()]);
            $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
            $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
            $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
            $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
            $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
            $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
            $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
            $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
            $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
            $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
            $('#spk_tgl').datepicker('setDate', tambahTglM);
            $('#spk_hari').val(hari[tambahTglM.getDay()])

        });

        var $tgl4 = $('#tanggal_diterima_panitia'), $valueTgl4 = $('#pemasukan_dok_penawaran_jumlah_dari');
        $valueTgl4.on('input', function (e) {
            var totaltgl4 = 1;
            $valueTgl4.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl4 = totaltgl4 * parseInt(this.value, 10);
            });

            var jumlahA = parseInt(tglA.val())
            var jumlahB = parseInt(tglB.val());
            var jumlahC = parseInt(tglC.val());
            var jumlahD = parseInt(tglC.val());

            var getTanggalTes4 = $tgl4.val()
            var getTanggal4 = new Date(getTanggalTes4)
            var getFull4 = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD))
            $('#pemasukan_dok_penawaran_tgl_dari').datepicker('setDate', getFull4);
            $('#pemasukan_dok_penawaran_hari_dari').val(hari[getFull4.getDay()])


            var jumlahF = parseInt(tglF.val());
            var jumlahG = parseInt(tglG.val());
            var jumlahH = parseInt(tglH.val());
            var jumlahI = parseInt(tglI.val());
            var jumlahJ = parseInt(tglJ.val());
            var jumlahK = parseInt(tglK.val());
            var jumlahL = parseInt(tglL.val());
            var jumlahM = parseInt(tglM.val());

            var tambahTglF = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF));
            var tambahTglG = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG));
            var tambahTglH = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH));
            var tambahTglI = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH + jumlahI));
            var tambahTglJ = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ));
            var tambahTglK = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
            var tambahTglL = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
            var tambahTglM = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));


            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal4.getFullYear(), getTanggal4.getMonth(), getTanggal4.getDate() + (totaltgl4 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])

            $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', tambahTglF);
            $('#pemasukan_dok_penawaran_hari_sd').val(hari[tambahTglF.getDay()]);
            $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', tambahTglG);
            $('#evaluasi_dokumen_hari_dari').val(hari[tambahTglG.getDay()]);
            $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
            $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
            $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
            $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
            $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
            $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
            $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
            $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
            $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
            $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
            $('#spk_tgl').datepicker('setDate', tambahTglM);
            $('#spk_hari').val(hari[tambahTglM.getDay()])

        });
        var $tgl5 = $('#tanggal_diterima_panitia'), $valueTgl5 = $('#pemasukan_dok_penawaran_jumlah_sd');
        $valueTgl5.on('input', function (e) {
            var totaltgl5 = 1;
            $valueTgl5.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl5 = totaltgl5 * parseInt(this.value, 10);
            });

            var jumlahA = parseInt(tglA.val())
            var jumlahB = parseInt(tglB.val());
            var jumlahC = parseInt(tglC.val());
            var jumlahD = parseInt(tglD.val());
            var jumlahE = parseInt(tglE.val());

            var getTanggalTes5 = $tgl5.val()
            var getTanggal5 = new Date(getTanggalTes5)
            var getFull5 = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE));
            $('#pemasukan_dok_penawaran_tgl_sd').datepicker('setDate', getFull5);
            $('#pemasukan_dok_penawaran_hari_sd').val(hari[getFull5.getDay()])


            var jumlahG = parseInt(tglG.val());
            var jumlahH = parseInt(tglH.val());
            var jumlahI = parseInt(tglI.val());
            var jumlahJ = parseInt(tglJ.val());
            var jumlahK = parseInt(tglK.val());
            var jumlahL = parseInt(tglL.val());
            var jumlahM = parseInt(tglM.val());


            var tambahTglG = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG));
            var tambahTglH = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG + jumlahH));
            var tambahTglI = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG + jumlahH + jumlahI));
            var tambahTglJ = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG + jumlahH + jumlahI + jumlahJ));
            var tambahTglK = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
            var tambahTglL = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
            var tambahTglM = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));

            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal5.getFullYear(), getTanggal5.getMonth(), getTanggal5.getDate() + (totaltgl5 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])

            $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', tambahTglG);
            $('#evaluasi_dokumen_hari_dari').val(hari[tambahTglG.getDay()]);
            $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
            $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
            $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
            $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
            $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
            $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
            $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
            $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
            $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
            $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
            $('#spk_tgl').datepicker('setDate', tambahTglM);
            $('#spk_hari').val(hari[tambahTglM.getDay()])


        });

        var $tgl6 = $('#tanggal_diterima_panitia'), $valueTgl6 = $('#evaluasi_dokumen_jumlah_dari');
        $valueTgl6.on('input', function (e) {
            var totaltgl6 = 1;
            $valueTgl6.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl6 = totaltgl6 * parseInt(this.value, 10);
            });

            var jumlahA = parseInt(tglA.val())
            var jumlahB = parseInt(tglB.val());
            var jumlahC = parseInt(tglC.val());
            var jumlahD = parseInt(tglD.val());
            var jumlahE = parseInt(tglE.val());
            var jumlahF = parseInt(tglF.val());

            var getTanggalTes6 = $tgl6.val()
            var getTanggal6 = new Date(getTanggalTes6)
            var getFull6 = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF))
            $('#evaluasi_dokumen_tgl_dari').datepicker('setDate', getFull6);
            $('#evaluasi_dokumen_hari_dari').val(hari[getFull6.getDay()])


            var jumlahH = parseInt(tglH.val());
            var jumlahI = parseInt(tglI.val());
            var jumlahJ = parseInt(tglJ.val());
            var jumlahK = parseInt(tglK.val());
            var jumlahL = parseInt(tglL.val());
            var jumlahM = parseInt(tglM.val());


            var tambahTglH = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahH));
            var tambahTglI = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahH + jumlahI));
            var tambahTglJ = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahH + jumlahI + jumlahJ));
            var tambahTglK = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahH + jumlahI + jumlahJ + jumlahK));
            var tambahTglL = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL));
            var tambahTglM = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));
            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal6.getFullYear(), getTanggal6.getMonth(), getTanggal6.getDate() + (totaltgl6 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])

            $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', tambahTglH);
            $('#evaluasi_dokumen_hari_sd').val(hari[tambahTglH.getDay()]);
            $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
            $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
            $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
            $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
            $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
            $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
            $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
            $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
            $('#spk_tgl').datepicker('setDate', tambahTglM);
            $('#spk_hari').val(hari[tambahTglM.getDay()])

        });

        var $tgl7 = $('#tanggal_diterima_panitia'), $valueTgl7 = $('#evaluasi_dokumen_jumlah_sd');
        $valueTgl7.on('input', function (e) {
            var totaltgl7 = 1;
            $valueTgl7.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl7 = totaltgl7 * parseInt(this.value, 10);
            });

            var jumlahA = parseInt(tglA.val())
            var jumlahB = parseInt(tglB.val());
            var jumlahC = parseInt(tglC.val());
            var jumlahD = parseInt(tglD.val());
            var jumlahE = parseInt(tglE.val());
            var jumlahF = parseInt(tglF.val());
            var jumlahG = parseInt(tglG.val());
            var getTanggalTes7 = $tgl7.val()
            var getTanggal7 = new Date(getTanggalTes7)
            var getFull7 = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG))
            $('#evaluasi_dokumen_tgl_sd').datepicker('setDate', getFull7);
            $('#evaluasi_dokumen_hari_sd').val(hari[getFull7.getDay()])


            var jumlahI = parseInt(tglI.val());
            var jumlahJ = parseInt(tglJ.val());
            var jumlahK = parseInt(tglK.val());
            var jumlahL = parseInt(tglL.val());
            var jumlahM = parseInt(tglM.val());


            var tambahTglI = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI));
            var tambahTglJ = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ));
            var tambahTglK = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahK));
            var tambahTglL = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahK + jumlahL));
            var tambahTglM = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM));

            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal7.getFullYear(), getTanggal7.getMonth(), getTanggal7.getDate() + (totaltgl7 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])

            $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', tambahTglI);
            $('#ba_hasil_klarifikasi_hari').val(hari[tambahTglI.getDay()]);
            $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
            $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
            $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
            $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
            $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
            $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
            $('#spk_tgl').datepicker('setDate', tambahTglM);
            $('#spk_hari').val(hari[tambahTglM.getDay()])
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglM);
            $('#jangka_waktu_hari').val(hari[tambahTglM.getDay()])
        });

        var $tgl8 = $('#tanggal_diterima_panitia'), $valueTgl8 = $('#ba_hasil_klarifikasi_jumlah');
        $valueTgl8.on('input', function (e) {
            var totaltgl8 = 1;
            $valueTgl8.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl8 = totaltgl8 * parseInt(this.value, 10);
            });
            var jumlahA = parseInt(tglA.val())
            var jumlahB = parseInt(tglB.val());
            var jumlahC = parseInt(tglC.val());
            var jumlahD = parseInt(tglD.val());
            var jumlahE = parseInt(tglE.val());
            var jumlahF = parseInt(tglF.val());
            var jumlahG = parseInt(tglG.val());
            var jumlahH = parseInt(tglH.val());

            var getTanggalTes8 = $tgl8.val()
            var getTanggal8 = new Date(getTanggalTes8)
            var getFull8 = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate() + (totaltgl8 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH))
            $('#ba_hasil_klarifikasi_tgl').datepicker('setDate', getFull8);
            $('#ba_hasil_klarifikasi_hari').val(hari[getFull8.getDay()])


            var jumlahJ = parseInt(tglJ.val());
            var jumlahK = parseInt(tglK.val());
            var jumlahL = parseInt(tglL.val());
            var jumlahM = parseInt(tglM.val());


            var tambahTglJ = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate() + (totaltgl8 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahH + jumlahJ));
            var tambahTglK = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate() + (totaltgl8 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahH + jumlahJ + jumlahK));
            var tambahTglL = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate() + (totaltgl8 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahH + jumlahJ + jumlahK + jumlahL));
            var tambahTglM = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate() + (totaltgl8 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahH + jumlahJ + jumlahK + jumlahL + jumlahM));

            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal8.getFullYear(), getTanggal8.getMonth(), getTanggal8.getDate() + (totaltgl8 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahJ + jumlahK + jumlahL + jumlahM + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])

            $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', tambahTglJ);
            $('#ba_hasil_pengadaan_langsung_hari').val(hari[tambahTglJ.getDay()]);
            $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
            $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
            $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
            $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
            $('#spk_tgl').datepicker('setDate', tambahTglM);
            $('#spk_hari').val(hari[tambahTglM.getDay()])


        });

        var $tgl9 = $('#tanggal_diterima_panitia'), $valueTgl9 = $('#ba_hasil_pengadaan_langsung_jumlah');
        $valueTgl9.on('input', function (e) {
            var totaltgl9 = 1;
            $valueTgl9.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl9 = totaltgl9 * parseInt(this.value, 10);
            });
            var jumlahA = parseInt(tglA.val())
            var jumlahB = parseInt(tglB.val());
            var jumlahC = parseInt(tglC.val());
            var jumlahD = parseInt(tglD.val());
            var jumlahE = parseInt(tglE.val());
            var jumlahF = parseInt(tglF.val());
            var jumlahG = parseInt(tglG.val());
            var jumlahH = parseInt(tglH.val());
            var jumlahI = parseInt(tglI.val());

            var getTanggalTes9 = $tgl9.val()
            var getTanggal9 = new Date(getTanggalTes9)
            var getFull9 = new Date(getTanggal9.getFullYear(), getTanggal9.getMonth(), getTanggal9.getDate() + (totaltgl9 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI))
            $('#ba_hasil_pengadaan_langsung_tgl').datepicker('setDate', getFull9);
            $('#ba_hasil_pengadaan_langsung_hari').val(hari[getFull9.getDay()])


            var jumlahK = parseInt(tglK.val());
            var jumlahL = parseInt(tglL.val());
            var jumlahM = parseInt(tglM.val());


            var tambahTglK = new Date(getTanggal9.getFullYear(), getTanggal9.getMonth(), getTanggal9.getDate() + (totaltgl9 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahH + jumlahK));
            var tambahTglL = new Date(getTanggal9.getFullYear(), getTanggal9.getMonth(), getTanggal9.getDate() + (totaltgl9 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahH + jumlahK + jumlahL));
            var tambahTglM = new Date(getTanggal9.getFullYear(), getTanggal9.getMonth(), getTanggal9.getDate() + (totaltgl9 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahH + jumlahK + jumlahL + jumlahM));
            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal9.getFullYear(), getTanggal9.getMonth(), getTanggal9.getDate() + (totaltgl9 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahK + jumlahL + jumlahM + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])


            $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', tambahTglK);
            $('#nd_usulan_tetap_pemenang_hari').val(hari[tambahTglK.getDay()]);
            $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
            $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
            $('#spk_tgl').datepicker('setDate', tambahTglM);
            $('#spk_hari').val(hari[tambahTglM.getDay()])

        });

        var $tgl10 = $('#tanggal_diterima_panitia'), $valueTgl10 = $('#nd_usulan_tetap_pemenang_jumlah');
        $valueTgl10.on('input', function (e) {
            var totaltgl10 = 1;
            $valueTgl10.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl10 = totaltgl10 * parseInt(this.value, 10);
            });

            var jumlahA = parseInt(tglA.val())
            var jumlahB = parseInt(tglB.val());
            var jumlahC = parseInt(tglC.val());
            var jumlahD = parseInt(tglD.val());
            var jumlahE = parseInt(tglE.val());
            var jumlahF = parseInt(tglF.val());
            var jumlahG = parseInt(tglG.val());
            var jumlahH = parseInt(tglH.val());
            var jumlahI = parseInt(tglI.val());
            var jumlahJ = parseInt(tglJ.val());

            var getTanggalTes10 = $tgl10.val()
            var getTanggal10 = new Date(getTanggalTes10)
            var getFull10 = new Date(getTanggal10.getFullYear(), getTanggal10.getMonth(), getTanggal10.getDate() + (totaltgl10 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ))
            $('#nd_usulan_tetap_pemenang_tgl').datepicker('setDate', getFull10);
            $('#nd_usulan_tetap_pemenang_hari').val(hari[getFull10.getDay()])


            var jumlahL = parseInt(tglL.val());
            var jumlahM = parseInt(tglM.val());


            var tambahTglL = new Date(getTanggal10.getFullYear(), getTanggal10.getMonth(), getTanggal10.getDate() + (totaltgl10 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahH + jumlahL));
            var tambahTglM = new Date(getTanggal10.getFullYear(), getTanggal10.getMonth(), getTanggal10.getDate() + (totaltgl10 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahH + jumlahL + jumlahM));
            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal10.getFullYear(), getTanggal10.getMonth(), getTanggal10.getDate() + (totaltgl10 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahL + jumlahM + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])


            $('#nd_penetapan_pemenang_tgl').datepicker('setDate', tambahTglL);
            $('#nd_penetapan_pemenang_hari').val(hari[tambahTglL.getDay()]);
            $('#spk_tgl').datepicker('setDate', tambahTglM);
            $('#spk_hari').val(hari[tambahTglM.getDay()])

        });

        var $tgl11 = $('#tanggal_diterima_panitia'), $valueTgl11 = $('#nd_penetapan_pemenang_jumlah');
        $valueTgl11.on('input', function (e) {
            var totaltgl11 = 1;
            $valueTgl11.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl11 = totaltgl11 * parseInt(this.value, 10);
            });

            var jumlahA = parseInt(tglA.val())
            var jumlahB = parseInt(tglB.val());
            var jumlahC = parseInt(tglC.val());
            var jumlahD = parseInt(tglD.val());
            var jumlahE = parseInt(tglE.val());
            var jumlahF = parseInt(tglF.val());
            var jumlahG = parseInt(tglG.val());
            var jumlahH = parseInt(tglH.val());
            var jumlahI = parseInt(tglI.val());
            var jumlahJ = parseInt(tglJ.val());
            var jumlahK = parseInt(tglK.val());


            var getTanggalTes11 = $tgl11.val()
            var getTanggal11 = new Date(getTanggalTes11)
            var getFull11 = new Date(getTanggal11.getFullYear(), getTanggal11.getMonth(), getTanggal11.getDate() + (totaltgl11 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK));
            $('#nd_penetapan_pemenang_tgl').datepicker('setDate', getFull11);
            $('#nd_penetapan_pemenang_hari').val(hari[getFull11.getDay()])


            var jumlahM = parseInt(tglM.val());
            var tambahTglM = new Date(getTanggal11.getFullYear(), getTanggal11.getMonth(), getTanggal11.getDate() + (totaltgl11 + jumlahA + jumlahB + jumlahC + jumlahE + jumlahD + jumlahF + jumlahG + jumlahI + jumlahJ + jumlahH + jumlahK + jumlahM));

            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal11.getFullYear(), getTanggal11.getMonth(), getTanggal11.getDate() + (totaltgl11 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahM + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])

            $('#spk_tgl').datepicker('setDate', tambahTglM);
            $('#spk_hari').val(hari[tambahTglM.getDay()])


        });

        var $tgl12 = $('#tanggal_diterima_panitia'), $valueTgl12 = $('#spk_jumlah');
        $valueTgl12.on('input', function (e) {
            var totaltgl12 = 1;
            $valueTgl12.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl12 = totaltgl12 * parseInt(this.value, 10);
            });

            var jumlahA = parseInt(tglA.val())
            var jumlahB = parseInt(tglB.val());
            var jumlahC = parseInt(tglC.val());
            var jumlahD = parseInt(tglD.val());
            var jumlahE = parseInt(tglE.val());
            var jumlahF = parseInt(tglF.val());
            var jumlahG = parseInt(tglG.val());
            var jumlahH = parseInt(tglH.val());
            var jumlahI = parseInt(tglI.val());
            var jumlahJ = parseInt(tglJ.val());
            var jumlahK = parseInt(tglK.val());
            var jumlahL = parseInt(tglL.val());

            var getTanggalTes12 = $tgl12.val()
            var getTanggal12 = new Date(getTanggalTes12)
            var getFull12 = new Date(getTanggal12.getFullYear(), getTanggal12.getMonth(), getTanggal12.getDate() + (totaltgl12 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL))

            var jumlahN = parseInt(tglN.val());
            var tambahTglN = new Date(getTanggal12.getFullYear(), getTanggal12.getMonth(), getTanggal12.getDate() + (totaltgl12 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahN));
            $('#jangka_waktu_tgl').datepicker('setDate', tambahTglN);
            $('#jangka_waktu_hari').val(hari[tambahTglN.getDay()])

            $('#spk_tgl').datepicker('setDate', getFull12);
            $('#spk_hari').val(hari[getFull12.getDay()])


        });

        var $tgl13 = $('#tanggal_diterima_panitia'), $valueTgl13 = $('#jangka_waktu');
        $valueTgl13.on('input', function (e) {
            var totaltgl13 = 1;
            $valueTgl13.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl13 = totaltgl13 * parseInt(this.value, 10);
            });

            var jumlahA = parseInt(tglA.val())
            var jumlahB = parseInt(tglB.val());
            var jumlahC = parseInt(tglC.val());
            var jumlahD = parseInt(tglD.val());
            var jumlahE = parseInt(tglE.val());
            var jumlahF = parseInt(tglF.val());
            var jumlahG = parseInt(tglG.val());
            var jumlahH = parseInt(tglH.val());
            var jumlahI = parseInt(tglI.val());
            var jumlahJ = parseInt(tglJ.val());
            var jumlahK = parseInt(tglK.val());
            var jumlahL = parseInt(tglL.val());
            var jumlahM = parseInt(tglM.val());

            var getTanggalTes13 = $tgl13.val()
            var getTanggal13 = new Date(getTanggalTes13)
            var getFull13 = new Date(getTanggal13.getFullYear(), getTanggal13.getMonth(), getTanggal13.getDate() + (totaltgl13 + jumlahA + jumlahB + jumlahC + jumlahD + jumlahE + jumlahF + jumlahG + jumlahH + jumlahI + jumlahJ + jumlahK + jumlahL + jumlahM))

            $('#status_berakhir').empty();
            var html = "";
            html += '<option value="">Pilih Status</option>';
            html += '<option value="Sejak BA Terima Lokasi">Sejak BA Terima Lokasi  </option>';
            html += '<option value="' + totaltgl13 + '">' + totaltgl13 + ' Hari </option>';
            $('#status_berakhir').append(html)

        });

        $('#sample_form').submit(function (event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: '{{route('jobcard.spk.update')}}',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend: function () {
                        $('#action_button').val('Loading ...')
                    },
                    success: function (data) {
                       if (data.success) {
                            toastr.success(data.success)
                            $('#action_button').val('Submit')
                        }


                    },
                    error:function (data) {
                        for (var count = 0; count < data.errors.length; count++) {
                            toastr.error(data.errors[count])
                        }
                        toastr.error(data.errors)
                        $('#action_button').val('Submit')
                    }
                });

            }
        });
    });

</script>

