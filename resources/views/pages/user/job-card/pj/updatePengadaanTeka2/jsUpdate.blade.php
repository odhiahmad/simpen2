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
        var $tgl13 = $('#tanggal_diterima_panitia'), $valueTgl13 = $('#jangka_waktu');
        $valueTgl13.on('input', function (e) {
            var totaltgl13 = 1;
            $valueTgl13.each(function (index, elem) {
                if (!Number.isNaN(parseInt(this.value, 10)))
                    totaltgl13 = totaltgl13 * parseInt(this.value, 10);
            });

            $('#status_berakhir').empty();
            var html = "";
            html += '<option value="">Pilih Status</option>';
            html += '<option value="Sejak BA Terima Lokasi">Sejak BA Terima Lokasi  </option>';
            html += '<option value="' + totaltgl13 + '">' + totaltgl13 + ' Hari </option>';
            $('#status_berakhir').append(html)

        });

        $('#status_berakhir').change(function () {
            if ($(this).val() != '') {
                var value = $(this).val();

                if (value === 'Sejak BA Terima Lokasi') {
                    $('#jangka_waktu_tgl').val('');
                    $('#jangka_waktu_hari').val('')
                } else {

                    var getTanggalStatusBerakhir = new Date($('#cda_tgl').val());
                    var tanggalStatusBerakhir = new Date(getTanggalStatusBerakhir.getFullYear(), getTanggalStatusBerakhir.getMonth(), getTanggalStatusBerakhir.getDate() + parseInt(value) - 1)

                    $('#jangka_waktu_tgl').datepicker('setDate', tanggalStatusBerakhir);
                    $('#jangka_waktu_hari').val(hari[tanggalStatusBerakhir.getDay()])
                }
            }
        })


        $('.dynamic').change(function () {
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent')
                var _token = $('input[name="_token"]').val()

                $.ajax({
                    url: "{{route('jobcard.pj.fetch')}}",
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
                    url: "{{route('jobcard.pj.fetchJenis1')}}",
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
                    url: "{{route('jobcard.pj.fetch')}}",
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
                    url: "{{route('jobcard.pj.fetch')}}",
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
                    url: "{{route('jobcard.pj.getAlamatPenyerahan')}}",
                    method: "POST",
                    data: {select: select,id:id, value: value, _token: _token, dependent: dependent},
                    success: function (result) {
                        console.log(result.data.alamat)
                        $("#alamat_penyerahan").val(result.data.alamat);
                    
                    }
                })
            }
        });

        $('.jabatan_direksi').change(function () {
            if ($(this).val() != '') {

                $(".direksi").val($('.jabatan_direksi option:selected').data('id'));
                
            }
        });


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
        $(".metode_pengadaan_jenis1,.metode_pengadaan_jenis2,.metode_pengadaan_jenis3,.metode_pengadaan_jenis").select2({
            placeholder: "Pilih Metode",
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


        $("#tanggal_mulai,#tanggal_nota_dinas,#rks_tgl,#pj_tgl,#tanggal_diterima_panitia,#tanggal,#nd_penetapan_pemenang_tgl,#nd_usulan_tetap_pemenang_tgl,#ba_hasil_pengadaan_langsung_tgl,#survey_harga_pasar_tgl, #hps_tgl, #undangan_pengadaan_langsung_tgl,#pemasukan_dok_penawaran_tgl_sd,#pemasukan_dok_penawaran_tgl_dari,#evaluasi_dokumen_tgl_sd,#evaluasi_dokumen_tgl_dari,#ba_hasil_klarifikasi_tgl").datepicker({
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

        $("#pembukaan_penawaran_sampul_satu_tgl,#evaluasi_dok_penawaran_sampul_satu_tgl,#pembukaan_penawaran_sampul_dua_tgl,#evaluasi_dok_penawaran_sampul_dua_tgl,#pengumuman_hasil_evaluasi_sampul_satu_tgl,#pengumuman_tgl,#undangan_aanwijzing_direksi_pekerjaan_tgl,#undangan_aanwijzing_peserta_tgl,#aanwijzing_tgl,#addendum_rks_tgl,#pemasukan_dok_penawaran_tgl,#pembukaan_penawaran_tgl,#evaluasi_dokumen_tgl,#evaluasi_dok_penawaran_tgl,#undangan_pembuktian_kualifikasi_tgl,#pembuktian_kualifikasi_tgl,#undangan_klarifikasi_dan_nego_penawaran_tgl,#nd_penetapan_calon_pemenang_tgl,#ba_hasil_klarifikasi_dan_nego_penawaran_tgl,#ba_hasil_klarifikasi_tgl,#laporan_hasil_evaluasi_tgl,#nd_usulan_penetapan_calon_pemenang_tgl,#pengumuman_calon_pemenang_tgl,#penunjukan_pemenang_tgl,#skkp_tgl,#undangan_cda_tgl,#cda_tgl,#pj_tgl,#bastl_tgl").datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: !0,
            // orientation: "bottom left",
            // templates: {
            //     leftArrow: '<i class="la la-angle-left"></i>',
            //     rightArrow: '<i class="la la-angle-right"></i>'
            // },
        });



        $('#status_berakhir').change(function () {
            if ($(this).val() != '') {
                var value = $(this).val();


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


        $('#sample_form').on('submit', function (event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: '{{route('jobcard.pj.updateTeka2')}}',
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
                        if (data.errors) {

                            for (var count = 0; count < data.errors.length; count++) {
                                toastr.error(data.errors[count])
                            }

                        }
                        if (data.success) {
                            toastr.success(data.success)
                            $('#action_button').val('Submit')
                        }


                    }
                });

            }
        });
    });
</script>
