var url = "http://localhost/sippantau";


function insert_metoda() {
    var metoda = $('#metoda').val();
    if (metoda == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Data tidak boleh kosong!',
        });
    } else {
        $.ajax({
            url: "/metoda/insert_metoda",
            method: "POST",
            data: {
                metoda: metoda,
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


function edit_show_metoda(id) {
    $.ajax({
        url: "/metoda/edit_show_metoda",
        method: "POST",
        data: {
            id: id,
        },
        dataType: "JSON",
        success: function (data) {
            $('#id_update').val(id);
            $('#metoda_update').val(data.metoda);
            $("#my-modal-update").modal("show");
        }
    });
}


function update_metoda() {
    var id = $('#id_update').val();
    var metoda = $('#metoda_update').val();
    if (metoda == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Data tidak boleh kosong!',
        });
    } else {
        $.ajax({
            url: "/metoda/update_metoda",
            method: "POST",
            data: {
                id: id,
                metoda: metoda,
            },
            // dataType: "JSON",
            success: function (data) {
                // data = JSON.parse(data);
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data berhasil diupdate!',
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                });
            }
        });
    }
}


function delete_metoda(id, metoda) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda akan menghapus data metoda " + metoda,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "/metoda/delete_metoda",
                method: "POST",
                data: {
                    id: id,
                },
                // dataType: "JSON",
                success: function (data) {
                    // data = JSON.parse(data);
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