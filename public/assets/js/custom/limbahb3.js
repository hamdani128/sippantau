function tambah_baris_limbah_b3() {
    var cmb_perlakuan = document.getElementById("perlakuan");
    var cmb_perlakuan_value = cmb_perlakuan.options[cmb_perlakuan.selectedIndex].value;
    var txt_jumlah = $("#jumlah_ton").val();
    var cmb_jenis_limbah = document.getElementById("jenis_limbah");
    var cmb_jenis_limbah_value = cmb_jenis_limbah.options[cmb_jenis_limbah.selectedIndex].value;
    var cmb_persetujuan = document.getElementById("persetujuan");
    var cmb_persetujuan_value = cmb_persetujuan.options[cmb_persetujuan.selectedIndex].value;

    if (cmb_perlakuan_value == '' || txt_jumlah == '' || cmb_jenis_limbah_value == '' || cmb_persetujuan_value == '') {
        Swal.fire({ icon: 'error', title: 'Oops...', text: 'Data tidak boleh kosong!' });
    } else {
        var x = document
            .getElementById('parameter_list_b3')
            .insertRow(0);
        var c1 = x.insertCell(0);
        var c2 = x.insertCell(1);
        var c3 = x.insertCell(2);
        var c4 = x.insertCell(3);
        var c5 = x.insertCell(4);
        c1.innerHTML = cmb_perlakuan_value;
        c2.innerHTML = txt_jumlah;
        c3.innerHTML = cmb_jenis_limbah_value;
        c4.innerHTML = cmb_persetujuan_value;
        c5.innerHTML = '<button type="button" class="btn btn-md btn-danger" onclick="hapus_baris_limbah_' +
            'b3(this)"><i class ="bx bx-trash-alt"></i></button>';
    }
}

function hapus_baris_limbah_b3(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function InsertLimbahB3() {
    var id_transaksi = document.getElementById("id_register").innerText;
    var nama_perusahaan = $("#nama_perusahaan").val();
    var bidang_usaha = $("#bidang_usaha").val();
    var periode_mulai = $("#mulai").val();
    var periode_sampai = $("#sampai").val();

    if (nama_perusahaan == '' || bidang_usaha == '' || periode_mulai == '' || periode_sampai == '') {
        Swal.fire({ icon: 'error', title: 'Oops...', text: 'Data tidak boleh kosong!' });
    } else {
        InsertDetailLimbahB3();
        $.ajax({
            url: "/limbah1/insert_limbah_b3",
            method: "POST",
            data: {
                id_register: id_transaksi,
                nama_perusahaan: nama_perusahaan,
                bidang_usaha: bidang_usaha,
                periode_mulai: periode_mulai,
                periode_sampai: periode_sampai
            },
            success: function (data) {
                Swal.fire({ icon: 'success', title: 'Berhasil', text: 'Data berhasil disimpan!' });
                window.location.href = "/pages/limbah_b3";
            }
        });
    }

}

function InsertDetailLimbahB3() {
    var id_transaksi = document.getElementById("id_register").innerText;
    var table = document.getElementById("parameter_list_b3");
    var row = table.rows.length;
    for (var i = 0; i < row; i++) {
        var parameter = table.rows[i].cells[0].innerHTML;
        var jumlah = table.rows[i].cells[1].innerHTML;
        var jenis = table.rows[i].cells[2].innerHTML;
        var perlakuan = table.rows[i].cells[3].innerHTML;
        $.ajax({
            url: "/limbah1/insert_detail_limbah_b3",
            method: "POST",
            data:
            {
                id_register: id_transaksi,
                parameter: parameter,
                jumlah: jumlah,
                jenis: jenis,
                perlakuan: perlakuan
            }
        });
    }
}