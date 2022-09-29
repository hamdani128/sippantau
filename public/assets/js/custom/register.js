var url = "http://localhost/sippantau";

function awal() {
    document.getElementById("ktp").value = '';
    document.getElementById("nama").value = '';
    document.getElementById("jabatan").value = '';
    document.getElementById("hp").value = '';
    document.getElementById("nama_perusahaan").value = '';
    document.getElementById("nama_usaha").value = '';
    document.getElementById("kelurahan").value = '';
    document.getElementById("kecamatan").value = '';
    document.getElementById("kota").value = '';
    document.getElementById("telp").value = '';
    document.getElementById("jenis_usaha").value = '';
    document.getElementById("luas_bangunan").value = '';
    document.getElementById("luas_lahan").value = '';
    document.getElementById("status_lahan").value = '';
    document.getElementById("dokumen_spl").value = '';
    document.getElementById("file_berkas").value = '';
    document.getElementById("nomor").value = '';
    document.getElementById("pemberi_izin").value = '';
    document.getElementById("keterangan").value = '';

    document.getElementById("file_berkas2").value = '';
    document.getElementById("nomor2").value = '';
    document.getElementById("pemberi_izin2").value = '';
    document.getElementById("keterangan2").value = '';

    document.getElementById("file_berkas3").value = '';
    document.getElementById("nomor3").value = '';
    document.getElementById("pemberi_izin3").value = '';
    document.getElementById("keterangan3").value = '';

    document.getElementById("file_berkas4").value = '';
    document.getElementById("nomor4").value = '';
    document.getElementById("pemberi_izin4").value = '';
    document.getElementById("keterangan4").value = '';

    document.getElementById("file_berkas5").value = '';
    document.getElementById("nomor5").value = '';
    document.getElementById("pemberi_izin5").value = '';
    document.getElementById("keterangan5").value = '';

    document.getElementById("file_berkas6").value = '';
    document.getElementById("nomor6").value = '';
    document.getElementById("pemberi_izin6").value = '';
    document.getElementById("keterangan6").value = '';

}

function insert_registerlab() {
    var no_register = document.getElementById("no_regis").innerText;
    var KTP = $('#ktp').val();
    var NAMA = $('#nama').val();
    var jabatan = $('#jabatan').val();
    var hp = $('#hp').val();
    var nama_perusahaan = $('#nama_perusahaan').val();
    var nama_usaha = $('#nama_usaha').val();
    var alamat_usaha = $('#alamat_usaha').val();
    var kelurahan = $('#kelurahan').val();
    var kecamatan = $('#kecamatan').val();
    var kota = $('#kota').val();
    var telp = $('#telp').val();
    var jenis_usaha = $('#jenis_usaha').val();
    var luas_bangunan = $('#luas_bangunan').val();
    var luas_lahan = $('#luas_lahan').val();
    var status_lahan = $('#status_lahan').val();
    var dokumen_spl = $('#dokumen_spl').val();
    var email = $('#email').val();

    if (KTP == '' || NAMA == '' || jabatan == '' || hp == '' || nama_perusahaan == '' || alamat_usaha == '' || kelurahan == '' || kecamatan == '' || kota == '' || telp == '' || jenis_usaha == '' || luas_bangunan == '' || luas_lahan == '' || dokumen_spl == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Semua field harus diisi!',
            confirmButtonText: 'Ok'
        });

    } else {
        Swal.fire({
            title: 'Yakin Data ini Akan Di Simpan ?',
            text: "Data Registrasi Disimpan !",
            type: 'warning',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan Data !',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                var table = document.getElementById("tabledokumen");
                for (let i = 1; i < table.rows.length; i++) {
                    var jenis = table.rows[i].cells[1].innerHTML;
                    var nomor_terbit = table.rows[i].cells[2].children[0].value;
                    var pemberi_izin = table.rows[i].cells[3].children[0].value;
                    var keterangan = table.rows[i].cells[4].children[0].value;
                    let file_berkas = table.rows[i].cells[5].children[0].files[0];
                    // alert(file_berkas.name);
                    let form_data = new FormData();
                    form_data.append('file_berkas', file_berkas);
                    form_data.append('jenis', jenis);
                    form_data.append('nomor_terbit', nomor_terbit);
                    form_data.append('pemberi_izin', pemberi_izin);
                    form_data.append('keterangan', keterangan);
                    form_data.append('no_register', no_register);
                    // form_data.append('id_registrasi', document.getElementById("id_registri_submit").innerHTML);
                    $.ajax({
                        url: "/registrasilab/insert_detail_registrasilab",
                        method: "POST",  // <-- what to expect back from the PHP script, if anything
                        enctype: 'multipart/form-data',
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,
                        data: form_data,
                    });
                }

                $.ajax({
                    url: "/registrasilab/insert_registrasilab",
                    method: "POST",
                    data: {
                        ktp: KTP,
                        nama: NAMA,
                        jabatan: jabatan,
                        hp: hp,
                        nama_perusahaan: nama_perusahaan,
                        nama_usaha: nama_usaha,
                        alamat_usaha: alamat_usaha,
                        kelurahan: kelurahan,
                        kecamatan: kecamatan,
                        kota: kota,
                        telp: telp,
                        email: email,
                        jenis_usaha: jenis_usaha,
                        luas_bangunan: luas_bangunan,
                        luas_lahan: luas_lahan,
                        status_lahan: status_lahan,
                        dokumen_spl: dokumen_spl,
                        no_register: no_register,
                    },
                    dataType: "JSON",
                    success: function (data) {
                        if (data.status == 'success') {
                            document.getElementById("id_registri_submit").innerHTML = data.registrasi_id
                            document.getElementById("download_file").style.display = 'block';
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Data berhasil ditambahkan! Silahkan Download Berkas Anda',
                            });
                            awal()
                        }
                    }
                });
            }
        });
    }
}