var url = "http://localhost/sippantau";

function detail_registrasilab(id_registrasi) {
    $.ajax({
        url: "/registrasilab/detail_dokumen_registrasilab",
        method: "POST",
        data: {
            id_registrasi: id_registrasi
        },
        dataType: "JSON",
        success: function (data) {
            $("#detaildokumen tbody").empty();
            // data = JSON.parse(data);
            var no = 1;
            for (var i in data) {
                var tr = $("<tr></tr>");
                tr.append("<td>" + no++ + "</td>" +
                    "<td>" + data[i].registrasi_id + "</td>" +
                    "<td>" + data[i].date + "</td>" +
                    "<td>" + data[i].jenis + "</td>" +
                    "<td>" + data[i].nomor_terbit + "</td>" +
                    "<td>" + data[i].pemberi_izin + "</td>" +
                    "<td>" + data[i].keterangan + "</td>" +
                    "<td><a href='" + url + "/upload/'" + data[i].file_berkas + ">" + data[i].file_berkas + "</a></td>");
                $("#detaildokumen  tbody").append(tr);
            }
            $("#my-modal-detail").modal("show");
        }
    });
}

function printdokumenregistrasi(id_registrasi) {
    window.open("/registrasilab/print_dokumen_registrasilab/" + id_registrasi);
}

function printdokumenregistrasi_fromsubmit() {
    var id_register = document.getElementById("id_registri_submit").innerText;
    window.open("/registrasilab/print_dokumen_registrasilab/" + id_register);
}


function validasi_acc_user(id_register) {
    $('#username_validasi').val(id_register);
    document.getElementById('username_validasi').readOnly = true;
    $("#my-modal-password").modal("show");
}


function approve_validasi() {
    var username = $('#username_validasi').val();
    var pwd = $('#password_validasi').val();
    Swal.fire({
        title: 'Apakah anda yakin Menambahkan Users dengan ID Registri ' + username + '?',
        text: "Data yang di validasi tidak dapat diubah lagi !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Validasi!'
    }).then((result) => {
        $.ajax({
            url: "/registrasilab/validasi_perusahaan",
            method: "POST",
            data: {
                id_register: username,
                password: pwd,
            },
            dataType: "JSON",
            success: function (data) {
                if (data.status == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Users Berhasil Di validasi !',
                    });
                    location.reload();
                } else {
                    alert("Gagal Validasi");
                }
            }
        });
    })
}

function delete_data_register(register_id) {
    Swal.fire({
        title: 'Apakah anda yakin mneghapus Datadengan ID Registri ' + register_id + '?',
        text: "Data yang di hapus tidak dapat dibisa dikembalikan !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        $.ajax({
            url: "/registrasilab/delete_data",
            method: "POST",
            data: {
                id_register: register_id,
            },
            dataType: "JSON",
            success: function (data) {
                if (data.status == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Users Berhasil Di Hapus !',
                    });
                    location.reload();
                } else {
                    alert("Gagal Validasi");
                }
            }
        });
    })
}