var url = "http://localhost/sippantau";

function tambah_baris_limbah_udara() {
    var cmb_paramter = document.getElementById("parameter_udara");
    var cmb_parameter_value = cmb_paramter.options[cmb_paramter.selectedIndex].value;
    var cmb_satuan = document.getElementById("satuan_udara");
    var cmb_satuan_value = cmb_satuan.options[cmb_satuan.selectedIndex].value;
    var txt_hasil_uji = $("#hasil_udara").val();
    var txt_baku_mutu = $("#baku_mutu_udara").val();
    var cmb_metoda = document.getElementById("metoda_udara");
    var cmb_metoda_value = cmb_metoda.options[cmb_metoda.selectedIndex].value;

    var x = document.getElementById('parameter_list_emisi').insertRow(0);
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
    c6.innerHTML = '<button type="button" class="btn btn-md btn-danger" onclick="hapus_baris_limbah_udara(this)"><i class ="bx bx-trash-alt"></i></button>';
}

function hapus_baris_limbah_udara(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}


function insert_limbah_udara() {
    var no_sertifikat = $('#no_sertifikat_udara').val();
    var nama_pemohon = $('#nama_pemohon_udara').val();
    var alamat_pemohon = $('#alamat_pemohon_udara').val();
    var lokasi = $('#lokasi_udara').val();
    var jenis_contoh = $('#jenis_contoh_udara').val();
    var tanggal_contoh = $('#tanggal_contoh_udara').val();
    var titik_contoh = $('#titik_contoh_udara').val();
    var formupload = document.getElementById("form_insert_emisi_udara");
    var formdata = new FormData(formupload);
    if (no_sertifikat == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Data tidak boleh kosong!',
        });
    } else {
        insert_detail_limbah_udara();
        $.ajax({
            url: "/limbah1/insert_limbah_udara",
            method: "POST",
            enctype: "multipart/form-data",
            processData: false,  // tell jQuery not to process the data
            contentType: false,
            data: formdata,
            dataType: "json",
            success: function (data) {
                // data = JSON.parse(data);
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data berhasil disimpan!',
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                });
            }
        });
    }
}


function insert_detail_limbah_udara() {
    var tblrow = document.getElementById("parameter_list_emisi");
    for (var i = 0; i < tblrow.rows.length; i++) {
        var parameter = tblrow.rows[i].cells[0].innerHTML;
        var satuan = tblrow.rows[i].cells[1].innerHTML;
        var hasil = tblrow.rows[i].cells[2].innerHTML;
        var buku = tblrow.rows[i].cells[3].innerHTML;
        var metoda = tblrow.rows[i].cells[4].innerHTML;
        $.ajax({
            url: "/limbah1/insert_detail_emisi_udara",
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

function cetak_print_limbah_udara(register_id) {
    window.open('/pages/limbah_emisi_udara/print/' + register_id + '');
}

function delete_limbah_udara(register_id) {
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
                url: "/limbah_emisi_udara/delete",
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

function show_limbah_emisi_udara(dokumen) {
    $("#modal-scan").modal("show");
    // document.getElementById("element-domestik").remove();
    document.getElementById("element-domestik").src = "/upload/" + dokumen;
}