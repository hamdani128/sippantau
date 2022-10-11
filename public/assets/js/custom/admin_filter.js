function filter1() {
    var mulai = $('#mulai_domestik').val();
    var sampai = $('#sampai_domestik').val();
    var tbody = document.getElementById("tbody_air_domestik");
    // tbody.innerHTML = '<tr><td colspan="12" align="center"><h6>No Record Found.</h6></td></tr>';

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
            url: '/admin_limbah/filter_limbah_air_domestik',
            method: "POST",
            data: {
                mulai: mulai,
                sampai: sampai,
            },
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    tbody.innerHTML = '<tr><td colspan="9"><h3>No Record Found.</h3></td></tr>';
                } else {
                    var tr = '';
                    var no = 1;
                    for (var i in data) {
                        tr += `<tr>
                        <td>
                            <button class="btn btn-sm btn-dark" onclick="cetak_print_limbah_domestik('${data[i].register_id}')"><i class="bx bx-printer"></i></button>
                            <button class="btn btn-sm btn-success"  onclick="show_limbah_domestik('${data[i].file_name}')"><i class="bx bx-show"></i></button>
                            <button class="btn btn-sm btn-info" onclick="update_approve_limbah_air_domestik('${data[i].status}', '${data[i].register_id}')"><i class="bx bx-edit"></i></button>
                        </td>
                        <td align="center">${no++}</td>
                        <td>${data[i].status}</td>
                        <td>${data[i].username}</td>
                        <td>${data[i].register_id}</td>
                        <td>${data[i].sertifikat}</td>
                        <td>${data[i].nama_pemohon}</td>
                        <td>${data[i].alamat_pemohon}</td>
                        <td>${data[i].lokasi_kegiatan}</td>
                        <td>${data[i].contoh_uji}</td>
                        <td>${data[i].tanggal_contoh_uji}</td>
                        <td>${data[i].titik_uji}</td>
                        <td><a href="#">${data[i].file_name}</a></td>
                        <td>${data[i].tindakan}</td>
                </tr>`;
                    }
                    tbody.innerHTML = tr;
                }
            }
        });
    }
}

function filter2() {
    var mulai = $('#mulai_air_kegiatan').val();
    var sampai = $('#sampai_air_kegiatan').val();
    var tbody = document.getElementById("tbody_limbah_air_kegiatan");
    // tbody.innerHTML = '<tr><td colspan="12" align="center"><h6>No Record Found.</h6></td></tr>';

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
            url: '/admin_limbah/filter_limbah_air_kegiatan',
            method: "POST",
            data: {
                mulai: mulai,
                sampai: sampai,
            },
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    tbody.innerHTML = '<tr><td colspan="9"><h3>No Record Found.</h3></td></tr>';
                } else {
                    var tr = '';
                    var no = 1;
                    for (var i in data) {
                        tr += `<tr>
                        <td>
                            <button class="btn btn-sm btn-dark" onclick="cetak_print_limbah_air_kegiatan('${data[i].register_id}')"><i class="bx bx-printer"></i></button>
                            <button class="btn btn-sm btn-success"  onclick="show_limbah_air_kegiatan('${data[i].file_name}')"><i class="bx bx-show"></i></button>
                            <button class="btn btn-sm btn-info" onclick="update_approve_limbah_air_kegiatan('${data[i].status}', '${data[i].register_id}')"><i class="bx bx-edit"></i></button>
                        </td>
                        <td align="center">${no++}</td>
                        <td>${data[i].status}</td>
                        <td>${data[i].username}</td>
                        <td>${data[i].register_id}</td>
                        <td>${data[i].sertifikat}</td>
                        <td>${data[i].nama_pemohon}</td>
                        <td>${data[i].alamat_pemohon}</td>
                        <td>${data[i].lokasi_kegiatan}</td>
                        <td>${data[i].contoh_uji}</td>
                        <td>${data[i].tanggal_contoh_uji}</td>
                        <td>${data[i].titik_uji}</td>
                        <td><a href="#">${data[i].file_name}</a></td>
                        <td>${data[i].tindakan}</td>
                </tr>`;
                    }
                    tbody.innerHTML = tr;
                }
            }
        });
    }
}

function filter3() {
    var mulai = $('#mulai_limbah_udara').val();
    var sampai = $('#sampai_limbah_udara').val();
    var tbody = document.getElementById("tbody_limbah_udara");
    // tbody.innerHTML = '<tr><td colspan="12" align="center"><h6>No Record Found.</h6></td></tr>';

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
            url: '/admin_limbah/filter_limbah_emisi_udara',
            method: "POST",
            data: {
                mulai: mulai,
                sampai: sampai,
            },
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    tbody.innerHTML = '<tr><td colspan="9"><h3>No Record Found.</h3></td></tr>';
                } else {
                    var tr = '';
                    var no = 1;
                    for (var i in data) {
                        tr += `<tr>
                        <td>
                            <button class="btn btn-sm btn-dark" onclick="cetak_print_limbah_udara('${data[i].register_id}')"><i class="bx bx-printer"></i></button>
                            <button class="btn btn-sm btn-success" onclick="show_limbah_emisi_udara('${data[i].file_name}')"><i class="bx bx-show"></i></button>
                            <button class="btn btn-sm btn-info" onclick="update_approve_limbah_emisi_udara('${data[i].status}', '${data[i].register_id}')"><i class="bx bx-edit"></i></button>
                        </td>
                        <td align="center">${no++}</td>
                        <td>${data[i].status}</td>
                        <td>${data[i].username}</td>
                        <td>${data[i].register_id}</td>
                        <td>${data[i].sertifikat}</td>
                        <td>${data[i].nama_pemohon}</td>
                        <td>${data[i].alamat_pemohon}</td>
                        <td>${data[i].lokasi_kegiatan}</td>
                        <td>${data[i].contoh_uji}</td>
                        <td>${data[i].tanggal_contoh_uji}</td>
                        <td>${data[i].titik_uji}</td>
                        <td><a href="#">${data[i].file_name}</a></td>
                        <td>${data[i].tindakan}</td>
                </tr>`;
                    }
                    tbody.innerHTML = tr;
                }
            }
        });
    }
}

function filter4() {
    var mulai = $('#mulai_limbah_b3').val();
    var sampai = $('#sampai_limbah_b3').val();
    var tbody = document.getElementById("tbody_limbah_b3");
    // tbody.innerHTML = '<tr><td colspan="12" align="center"><h6>No Record Found.</h6></td></tr>';

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
            url: '/admin_limbah/filter_limbah_b3',
            method: "POST",
            data: {
                mulai: mulai,
                sampai: sampai,
            },
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    tbody.innerHTML = '<tr><td colspan="9"><h3>No Record Found.</h3></td></tr>';
                } else {
                    var tr = '';
                    var no = 1;
                    for (var i in data) {
                        tr += `<tr>
                        <td>
                            <button class="btn btn-sm btn-dark" onclick="cetak_print_limbahb3('${data[i].id_register}')"><i class="bx bx-printer"></i></button>
                            <button class="btn btn-sm btn-success" onclick="show_limbahb3('${data[i].file_name}')"><i class="bx bx-show"></i></button>
                            <button class="btn btn-sm btn-info" onclick="update_approve_limbah_b3('${data[i].status}', '${data[i].id_register}')"><i class="bx bx-edit"></i></button>
                        </td>
                        <td align="center">${no++}</td>
                        <td>${data[i].status}</td>
                        <td>${data[i].username}</td>
                        <td>${data[i].id_register}</td>
                        <td>${data[i].date}</td>
                        <td>${data[i].nama_perusahaan}</td>
                        <td>${data[i].bidang}</td>
                        <td>${data[i].periode}</td>
                        <td><a href="#">${data[i].file_name}</a></td>
                        <td>${data[i].tindakan}</td>
                        <td>${data[i].created_at}</td>
                </tr>`;
                    }
                    tbody.innerHTML = tr;
                }
            }
        });
    }
}

function update_approve_limbah_air_domestik(status, register_id) {
    if (status === 'menunggu approval') {
        Swal.fire({
            title: 'Apakah anda yakin mengApprove Data ?',
            text: "Anda akan mengapprove data " + register_id,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d8',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Approve!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "/limbah_air_domestik/update_status",
                    method: "POST",
                    data: {
                        register_id: register_id,
                    },
                    dataType: "JSON",
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil Tervalidasi !',
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });
                    }
                });
            }
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Mohon Maaf Data Sudah Tervalidasi !',
            type: 'error',
            confirmButtonText: 'Ok'
        });
        // return false;
    }
}

function update_approve_limbah_air_kegiatan(status, register_id) {
    if (status === 'menunggu approval') {
        Swal.fire({
            title: 'Apakah anda yakin mengApprove Data ?',
            text: "Anda akan mengapprove data " + register_id,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d8',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Approve!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "/limbah_air_kegiatan/update_status",
                    method: "POST",
                    data: {
                        register_id: register_id,
                    },
                    dataType: "JSON",
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil Tervalidasi !',
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });
                    }
                });
            }
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Mohon Maaf Data Sudah Tervalidasi !',
            type: 'error',
            confirmButtonText: 'Ok'
        });
        // return false;
    }
}

function update_approve_limbah_emisi_udara(status, register_id) {
    if (status === 'menunggu approval') {
        Swal.fire({
            title: 'Apakah anda yakin mengApprove Data ?',
            text: "Anda akan mengapprove data " + register_id,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d8',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Approve!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "/limbah_emisi_udara/update_status",
                    method: "POST",
                    data: {
                        register_id: register_id,
                    },
                    dataType: "JSON",
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil Tervalidasi !',
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });
                    }
                });
            }
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Mohon Maaf Data Sudah Tervalidasi !',
            type: 'error',
            confirmButtonText: 'Ok'
        });
        // return false;
    }
}

function update_approve_limbah_b3(status, register_id) {
    if (status === 'menunggu approval') {
        Swal.fire({
            title: 'Apakah anda yakin mengApprove Data ?',
            text: "Anda akan mengapprove data " + register_id,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d8',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Approve!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "/limbah_b3/update_status",
                    method: "POST",
                    data: {
                        register_id: register_id,
                    },
                    dataType: "JSON",
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil Tervalidasi !',
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });
                    }
                });
            }
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Mohon Maaf Data Sudah Tervalidasi !',
            type: 'error',
            confirmButtonText: 'Ok'
        });
        // return false;
    }
}

