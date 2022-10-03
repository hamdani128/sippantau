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
                    <!-- <font size="2">Badan Laporan dan Pengendalian Lingkungan Hidup</font><br> -->
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
            NERACA LIMBAH B3 UPT PEMATANG SIANTAR TAHUN 2022</h5>
        <table style="border: 1px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
            <tr>
                <td>Nama Perusahaan </td>
                <td>:</td>
                <td><?= $limbah->nama_perusahaan; ?></td>
            </tr>
            <tr>
                <td>Bidang Usaha </td>
                <td>:</td>
                <td><?= $limbah->bidang; ?></td>
            </tr>
            <tr>
                <td>periode waktu </td>
                <td>:</td>
                <td><?= $limbah->periode; ?></td>
            </tr>
            <tr>
                <td>Status Keterangan </td>
                <td>:</td>
                <td><?= $limbah->status; ?></td>
            </tr>
        </table>

        <table class="table">
            <thead style="height: 50%;">
                <tr>
                    <th>No.</td>
                    <th>Jenis Awal limbah</th>
                    <th>Jumlah (TON)</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tr style="text-align: center;">
                <td>1</td>
                <td>Minyak Trafo Bekas</td>
                <td>4</td>
                <td rowspan="4" style="width: 40%;">
                    <?= $limbah->nama_perusahaan; ?> bertindak sebagai penghasil limbah B3
                    sehingga hanya memiliki izin tempat penyimpanan sementara limbah B3.
                    untuk pengelolaan limbah B3 lanjutan diserahkan ke pihak yang memenuhi
                    syarat peraturan perundangan terkait sebagai pengelola limbah B3.
                </td>
            </tr>
            <tr style="text-align: center;">
                <td>2</td>
                <td>Kain Majun</td>
                <td>0</td>
            </tr>
            <tr style="text-align: center;">
                <td>3</td>
                <td>Kemasan Bekas B3</td>
                <td>0</td>
            </tr>
        </table>

        <table class="table">
            <thead style="height: 50%;">
                <tr>
                    <th rowspan="2">N</td>
                    <th rowspan="2">PERLAKUAN</th>
                    <th rowspan="2">JUMLAH (TON)</th>
                    <th rowspan="2">JENIS LIMBAH DIKELOLA</th>
                    <th colspan="2">PERSETUJUAN LINGKUNGAN</th>
                </tr>
                <tr>
                    <th colspan="">ADA / TIDAK</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($limbah_b3) > 0) : $no=1;?>
                <?php foreach($limbah_b3 as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->parameter; ?></td>
                    <td><?= $row->jumlah; ?></td>
                    <td><?= $row->jenis_limbah; ?></td>
                    <td><?= $row->persetujuan; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <table class="table">
            <thead style="height: 50%;">
                <tr>
                    <th></th>
                    <th>RESIDU* (C+)</th>
                    <th>0</th>
                    <th>Ton</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td>Jumlah Limbah yang belum dikelola(**) D(+)</td>
                    <td>0</td>
                    <td>Ton</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Total Limbah yang Tersisa (C+D)</td>
                    <td>0</td>
                    <td>Ton</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Kinerja Pengelola LB3 Selama Periode</td>
                    <td>100%</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Skala Waktu Penataan</td>
                    <td>365 Hari</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            <h4>Keterangan</h4>
        </div>
        <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            * <label style="font-weight: bold;">RESIDU</label>
            adalah jumlah limbah tersisa dari proses perlakuan seperti abu insenerator, bottom ash
            dan atau flyash dari pemanfaatan sludge oil di boiler, residu dari penyimpanan oli bekas dll.
        </p>
        <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            ** <label style="font-weight: bold;">JUMLAH LIMBAH YANG BELUM DI KELOLA</label>
            adalah limbah disimpan melebihi skala waktu penataan
        </p>
</body>

</html>

<script>
// wind ow.print();
</script>