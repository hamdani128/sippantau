function loadDataLimbahDomestik() {

    var tbody = document.getElementById("pengajuan_list");
    tbody.innerHTML = '<tr><td colspan="12"><h7> Mohon Tunggu Sebentar Data Lagi Dirender.. </h7></td></tr>';
    $.ajax({
        url: '/master/getlimbahdomestik',
        method: "POST",
        dataType: "json",
        success: function (data) {
            // var tbody = document.getElementById("tbody_nasabah");
            if (data == null) {
                tbody.innerHTML = '<tr><td colspan="12"><h3>No Record Found.</h3></td></tr>';
            } else {
                var tr = '';
                var no = 1;
                for (var i in data) {
                    tr += `<tr>
                                <td align="center">${no++}</td>
                                <td>
                                    <div class="button-group">
                                        <button classs="btn btn-md btn-info">
                                            <i class="bx bx-print"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>${data[i].id_nasabah}</td>
                                <td>${data[i].nama_nasabah}</td>
                                <td>${data[i].periode_awal}</td>
                                <td>${data[i].periode_akhir}</td>
                                <td>${data[i].periode_jatuh_tempo}</td>
                                <td>${data[i].jenis_simpanan}</td>
                                <td>${data[i].jlh_bulan}</td>
                                <td>${data[i].jumlah_disimpan}</td>
                                <td>${data[i].saldo}</td>
                                <td>${data[i].keterangan}</td>
                            </tr>`;
                }
                tbody.innerHTML = tr;
            }
        }
    });
}
// loadDataLimbahDomestik();

function tambah_baris_limbah_air_domestik() {
    var cmb_paramter = document.getElementById("parameter");
    var cmb_parameter_value = cmb_paramter.options[cmb_paramter.selectedIndex].value;
    var cmb_satuan = document.getElementById("satuan");
    var cmb_satuan_value = cmb_satuan.options[cmb_satuan.selectedIndex].value;
    var txt_hasil_uji = $("#hasil").val();
    var txt_baku_mutu = $("#baku_mutu").val();
    var cmb_metoda = document.getElementById("metoda");
    var cmb_metoda_value = cmb_metoda.options[cmb_metoda.selectedIndex].value;

    var x = document.getElementById('parameter_list_domestik').insertRow(0);
    var c1 = x.insertCell(0);
    var c2 = x.insertCell(1);
    var c3 = x.insertCell(2);
    var c4 = x.insertCell(3);
    var c5 = x.insertCell(4);
    var c6 = x.insertCell(5);
    c1.innerHTML = cmb_parameter_value;
    c2.innerHTML = cmb_satuan_value;
    c3.innerHTML = txt_hasil_uji;
    c4.innerHTML = txt_baku_mutu;
    c5.innerHTML = cmb_metoda_value;
    c6.innerHTML = '<button type="button" class="btn btn-md btn-danger" onclick="hapus_baris_limbah_domestik(this)"><i class ="bx bx-trash-alt"></i></button > ';
}

function hapus_baris_limbah_domestik(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function insert_data_limbah_air_domestik() {
    var no_sertifikat = $('#no_sertifikat').val();
    var nama_pemohon = $('#nama_pemohon').val();
    var alamat_pemohon = $('#alamat_pemohon').val();
    var lokasi = $('#lokasi').val();
    var jenis_contoh = $('#jenis_contoh').val();
    var tanggal_contoh = $('#tanggal_contoh').val();
    var titik_contoh = $('#titik_contoh').val();
    if (no_sertifikat == '' || nama_pemohon == '' || alamat_pemohon == '' || lokasi == '' || jenis_contoh == '' || tanggal_contoh == '' || titik_contoh == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Data tidak boleh kosong!',
        });
    } else {
        insert_data_detail_air_domestik();
        $.ajax({
            url: "/limbah/insert_limbah_air_domestik",
            method: "POST",
            data: {
                no_sertifikat: no_sertifikat,
                nama_pemohon: nama_pemohon,
                alamat_pemohon: alamat_pemohon,
                lokasi: lokasi,
                jenis_contoh: jenis_contoh,
                tanggal_contoh: tanggal_contoh,
                titik_contoh: titik_contoh,
            },
            // dataType: "json",
            success: function (data) {
                // data = JSON.parse(data);
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data berhasil ditambahkan!',
                }).then((result) => {
                    if (result.value) {
                        location.reload()
                    }
                });
            }
        });
    }
}

function insert_data_detail_air_domestik() {
    var tblrow = document.getElementById("parameter_list_domestik");
    for (var i = 0; i < tblrow.rows.length; i++) {
        var parameter = tblrow.rows[i].cells[0].innerHTML;
        var satuan = tblrow.rows[i].cells[1].innerHTML;
        var hasil = tblrow.rows[i].cells[2].innerHTML;
        var buku = tblrow.rows[i].cells[3].innerHTML;
        var metoda = tblrow.rows[i].cells[4].innerHTML;
        $.ajax({
            url: "/limbah/insert_data_detail_air_domestik",
            method: "POST",
            data: {
                parameter: parameter,
                satuan: satuan,
                hasil: hasil,
                buku: buku,
                metoda: metoda,
            },
        });
    }
}

function cetak_print_limbah_domestik(register_id,) {
    window.open('/pages/limbah_air_domestik/print/' + register_id + '');
}

function delete_limbah_domestik(register_id) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Anda akan menghapus data " + register_id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "/limbah_air_domestik/delete",
                method: "POST",
                data: {
                    register_id: register_id,
                },
                // dataType: "JSON",
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil dihapus!',
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }
            });
        }
    });
}
