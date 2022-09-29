function filter_admin_limbah_air_kegiatan() {
    var mulai = $('#mulai_date').val();
    var sampai = $('#sampai_date').val();
    if (mulai == "" || sampai == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please fill all Two Date is insert',
            type: 'error',
            confirmButtonText: 'Ok'
        });
        return false;
    } else {
        $.ajax({
            url: "/admin_limbah/filter_limbah_air_kegiatan",
            method: "POST",
            data: {
                mulai: mulai,
                sampai: sampai
            },
            success: function (data) {
                $("#example tbody").empty();
                data = JSON.parse(data);
                var a = 1;
                for (var i in data) {
                    var tr = $("<tr></tr>");
                    tr.append("<td>" +
                        "<button class='btn btn-sm btn-dark'><i class='bx bx-printer'></i></button>" +
                        "<button class='btn btn-sm btn-success'><i class='bx bx-show'></i></button>" +
                        + "</td>" +
                        "<td>" + a++ + "</td>" +
                        "<td>" + data[i].username + "</td>" +
                        "<td>" + data[i].register_id + "</td>" +
                        "<td>" + data[i].sertifikat + "</td>" +
                        "<td>" + data[i].nama_pemohon + "</td>" +
                        "<td>" + data[i].alamat_pemohon + "</td>" +
                        "<td>" + data[i].lokasi_kegiatan + "</td>" +
                        "<td>" + data[i].contoh_uji + "</td>" +
                        "<td>" + data[i].tanggal_contoh_uji + "</td>" +
                        "<td>" + data[i].titik_uji + "</td>" +
                        "<td>" + data[i].status + "</td>");
                    $("#example tbody").append(tr);
                }
            }
        });
    }
}

function filter_admin_limbah_udara() {
    var mulai = $('#mulai_limbah_udara').val();
    var sampai = $('#sampai_limbah_udara').val();
    if (mulai == "" || sampai == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please fill all Two Date is insert',
            type: 'error',
            confirmButtonText: 'Ok'
        });
        return false;
    } else {
        $.ajax({
            url: "/admin_limbah/filter_limbah_emisi_udara",
            method: "POST",
            data: {
                mulai: mulai,
                sampai: sampai
            },
            success: function (data) {
                $("#example tbody").empty();
                data = JSON.parse(data);
                var a = 1;
                for (var i in data) {
                    var tr = $("<tr></tr>");
                    tr.append("<td>" +
                        "<button class='btn btn-sm btn-dark'><i class='bx bx-printer'></i></button>" +
                        "<button class='btn btn-sm btn-success'><i class='bx bx-show'></i></button>" +
                        + "</td>" +
                        "<td>" + a++ + "</td>" +
                        "<td>" + data[i].username + "</td>" +
                        "<td>" + data[i].register_id + "</td>" +
                        "<td>" + data[i].sertifikat + "</td>" +
                        "<td>" + data[i].nama_pemohon + "</td>" +
                        "<td>" + data[i].alamat_pemohon + "</td>" +
                        "<td>" + data[i].lokasi_kegiatan + "</td>" +
                        "<td>" + data[i].contoh_uji + "</td>" +
                        "<td>" + data[i].tanggal_contoh_uji + "</td>" +
                        "<td>" + data[i].titik_uji + "</td>" +
                        "<td>" + data[i].status + "</td>");
                    $("#example tbody").append(tr);
                }
            }
        });
    }
}