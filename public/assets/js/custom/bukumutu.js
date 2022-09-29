var url = "http://localhost/sippantau";

function insert_parameter() {
    var nama_parameter = $('#nama_parameter').val();
    var satuan = $('#satuan').val();
    var jenis_limbah = document.getElementById("jenis_limbah");
    var jenis_limbah_value = jenis_limbah.options[jenis_limbah.selectedIndex].value;

    if (nama_parameter == '' || satuan == '' || jenis_limbah_value == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Data tidak boleh kosong!',
        });
    } else {
        $.ajax({
            url: "/parameter/insert_parameter",
            method: "POST",
            data: {
                nama_parameter: nama_parameter,
                satuan: satuan,
                jenis_limbah: jenis_limbah_value,
            },
            // dataType: "JSON",
            success: function (data) {
                // data = JSON.parse(data);
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data berhasil disimpan!',
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "/pages/informasi_parameter";
                    }
                });
            }
        });
    }
}

function edit_show_parameter(id) {
    $.ajax({
        url: "/parameter/edit_show_parameter",
        method: "POST",
        data: {
            id: id,
        },
        dataType: "JSON",
        success: function (data) {
            $('#id_update').val(id);
            $('#nama_parameter_update').val(data.parameter);
            $('#satuan_update').val(data.satuan);
            $('#jenis_limbah_update').val(data.jenis_limbah);
            $("#my-modal-update").modal("show");
        }
    });
}


function update_parameter() {
    var nama_parameter = $('#nama_parameter_update').val();
    var satuan = $('#satuan_update').val();
    var jenis_limbah = document.getElementById("jenis_limbah_update");
    var id = $('#id_update').val();
    var jenis_limbah_value = jenis_limbah.options[jenis_limbah.selectedIndex].value;
    if (nama_parameter == '' || satuan == '' || jenis_limbah_value == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Data tidak boleh kosong!',
        });
    } else {
        $.ajax({
            url: "/parameter/update_parameter",
            method: "POST",
            data: {
                id: id,
                nama_parameter: nama_parameter,
                satuan: satuan,
                jenis_limbah: jenis_limbah_value,
            },
            // dataType: "JSON",
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

function delete_parameter(id, parameter) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Anda akan menghapus data " + parameter,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "/parameter/delete_parameter",
                method: "POST",
                data: {
                    id: id,
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