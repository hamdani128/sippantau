<!DOCTYPE html>
<html>

<head>
    <title>Sipppantau - kota Pematang siantar</title>
    <style>
    .container {
        width: 50%;
        margin: 0 auto;
    }

    .table {
        border-spacing: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        border-top: 1px solid #aaa;
        border-left: 1px solid #aaa;
        margin-top: 20px;
        width: 100%;
    }

    @media print {
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 10px;
        }

        .table {

            width: 100%;
            padding-right: 2px;
        }
    }

    .table thead {
        background-color: indigo;
    }

    .table thead th {
        font-weight: normal;
        color: white;
        border-bottom: 1px solid #aaa;
        border-right: 1px solid #aaa;
        padding: 10px;
    }

    .table tr td {
        font-weight: normal;
        padding: 6px;
        border-bottom: 1px solid #aaa;
        border-right: 1px solid #aaa;
    }

    .hr {
        height: 3px;
        background: black;
        margin-top: 10px;
    }

    .hr2 {
        height: 1.5px;
        background: black;
        margin-top: 2px;
    }
    </style>
</head>

<body>

    <div class="container">
        <table style="width: 100%;">
            <tr>
                <td style="width: 15%;"><img
                        style="width: 100%;object-fit: cover;object-position: center;padding-left: 84%;"
                        src="<?php echo base_url() ?>/assets/images/siantar.png"></td>
                <td colspan="5" style="text-align: center;">
                    <font size="4">PMERINTAH KOTA PEMATANG SIANTAR</font><br>
                    <font size="5"><b>DINAS LINGKUNGAN HIDUP</b></font><br>
                    </font>
                    <font size="2"><b>Jalan Rakutta Sembiring No.86, Pematang Siantar</b></font><br>
                    <font size="2"><b>Telp/Fax : (0622)743634</b></font>
                </td>
            </tr>
        </table>
        <div class="hr"></div>
        <div class="hr2"></div>
        <h5
            style="text-align: center;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
            HASIL PENGUJIAN KUALITAS AIR KEGIATAN </h5>
        <table style="border: 1px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
            <tr>
                <td>No.Sertifikat </td>
                <td>:</td>
                <td><?= $limbah->no_sertifikat; ?></td>
            </tr>
            <tr>
                <td>Nama Pemohon </td>
                <td>:</td>
                <td><?= $limbah->nama_pemohon; ?></td>
            </tr>
            <tr>
                <td>Alamat Pemohon </td>
                <td>:</td>
                <td><?= $limbah->alamat_pemohon; ?></td>
            </tr>
            <tr>
                <td>Lokasi Kegiatan </td>
                <td>:</td>
                <td><?= $limbah->lokasi_kegiatan; ?></td>
            </tr>
            <tr>
                <td>Jenis Contoh Uji </td>
                <td>:</td>
                <td><?= $limbah->contoh_uji; ?></td>
            </tr>
            <tr>
                <td>Tanggal Contoh Uji Diterima </td>
                <td>:</td>
                <td><?= $limbah->tanggal_contoh_uji; ?></td>
            </tr>
        </table>

        <table class="table">
            <thead style="height: 50%;">
                <tr>
                    <th>No.</td>
                    <th>Parameter</th>
                    <th>Satuan</th>
                    <th>Hasil Uji</th>
                    <th>Baku Mutu</th>
                    <th>Metoda</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($detail_limbah) > 0) { $no=1; ?>
                <?php foreach($detail_limbah as $row) : ?>
                <tr style="text-align: center;">
                    <td><?= $no++; ?></td>
                    <td><?= $row->parameter; ?></td>
                    <td><?= $row->satuan; ?></td>
                    <td><?= $row->hasil; ?></td>
                    <td><?= $row->buku; ?></td>
                    <td><?= $row->metoda; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php } ?>
            </tbody>
        </table>

        <div style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            <h4>Keterangan</h4>
        </div>
        <div style="margin-top: - 2px;">
            <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                - Baku Mutu PPRI Nomor 22 Tahun 2021, Lampiran VI Kelas II Tentang Penyelenggara Perlindungan dan
                Pengelolaan Lingkungan Hidup.
            </p>
            <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                - Tanda (<) menunjukan hasil dibawah limit deteksi </p>
                    <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                        - Tanda (*) Sudah Termasuk Lingkup KAN.
                    </p>
                    <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                        - Tanda (**) Parameter Subkon
                    </p>
                    <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                        Parameter Institu ( Temperatur, pH dan DO) Diuji di laboratorium
                    </p>
        </div>
</body>

</html>

<script>
// wind ow.print();
</script>