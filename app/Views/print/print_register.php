<!DOCTYPE html>
<html>

<head>
    <title>Sipppantau - kota Pematang siantar</title>
    <style type="text/css">
    table {
        border-style: double;
        border-width: 3px;
        border-color: white;
    }

    table tr .text2 {
        text-align: right;
        font-size: 13px;
    }

    table tr .text {
        text-align: center;
        font-size: 13px;
    }

    table tr td {
        font-size: 13px;
    }




    table #list {
        font-family: Arial, Helvetica, sans-serif;
        color: #666;
        text-shadow: 1px 1px 0px #fff;
        background: #eaebec;
        border: #ccc 1px solid;
    }

    table #list th {
        padding: 15px 35px;
        border-left: 1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        background: #ededed;
    }

    table #list th:first-child {
        border-left: none;
    }

    table #list tr {
        text-align: center;
        padding-left: 20px;
    }

    table #list td:first-child {
        text-align: left;
        padding-left: 20px;
        border-left: 0;
    }

    table #list td {
        padding: 15px 35px;
        border-top: 1px solid #ffffff;
        border-bottom: 1px solid #e0e0e0;
        border-left: 1px solid #e0e0e0;
        background: #fafafa;
        background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
        background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
    }

    table #list tr:last-child td {
        border-bottom: 0;
    }

    table #list tr:last-child td:first-child {
        -moz-border-radius-bottomleft: 3px;
        -webkit-border-bottom-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }

    table #list tr:last-child td:last-child {
        -moz-border-radius-bottomright: 3px;
        -webkit-border-bottom-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }

    table #list tr:hover td {
        background: #f2f2f2;
        background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
        background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
    }
    </style>
</head>

<body>
    <center>
        <table width="550">
            <tr>
                <td><img src="<?php echo base_url() ?>/assets/images/siantar.png" width="90" height="90"></td>
                <td style="padding-left: 5px;">
                    <center>
                        <font size="4">PMERINTAH KOTA PEMATANG SIANTAR</font><br>
                        <font size="5"><b>DINAS LINGKUNGAN HIDUP</b></font><br>
                        <!-- <font size="2">Badan Laporan dan Pengendalian Lingkungan Hidup</font><br> -->
                        </font>
                        <font size="2"><b>Jalan Rakutta Sembiring No.86, Pematang Siantar</b></font><br>
                        <font size="2"><b>Telp/Fax : (0622)743634</b></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <hr>
                </td>
            </tr>
            <table width="550">
                <tr>
                    <td class="text2">Pematang Siantar, <?= date('d-M-Y', strtotime($registri_id->date)) ?></td>
                </tr>
            </table>
        </table>
        <table width="550">
            <tr class="text2">
                <td style="width: 120px;">Nomor Registrasi</td>
                <td width="622">: <b><?php echo $registri_id->registrasi_id; ?></b></td>
            </tr>
            <tr style="height: 40px;">
                <td>Perihal</td>
                <td width="550">: Pendaftaran Legalitas Perusahaan</td>
            </tr>
        </table>
        <br>
        <table width="550">
            <tr style="margin-bottom: 50px;">
                <td style="width: 180px;">Nama</td>
                <td width="541">: <b><?php echo $registri_id->nama; ?></b></td>
            </tr>
            <tr style="height: 50px;">
                <td>Jabatan</td>
                <td width="525">: <?php echo $registri_id->jabatan; ?></td>
            </tr>
            <!--  -->
            <tr style="height: 30px;">
                <td>Nomor Telp. / HP</td>
                <td width="525">: <?php echo $registri_id->hp; ?></td>
            </tr>
        </table>
        <br>
        <table width="550">
            <tr>
                <td>
                    <font size="2">Selaku Penanggung Jawab atas Pengelolaan Lingkungan Hidup
                        dari :
                    </font>
                </td>
            </tr>
        </table>
        <table width="550">
            <tr style="margin-bottom: 50px;">
                <td style="width: 220px;">Nama Perusahaan</td>
                <td>:</td>
                <td width="541"><b><?php echo $registri_id->nama_perusahaan; ?></b></td>
            </tr>
            <tr style="height: 40px;">
                <td>Nama Usaha</td>
                <td>:</td>
                <td width="525"><?php echo $registri_id->nama_usaha; ?></td>
            </tr>
            <tr>
                <td>Alamat Usaha</td>
                <td>:</td>
                <td width="525"><?php echo $registri_id->alamat; ?>
                </td>
            </tr>
            <tr style="height: 30px;">
                <td>Kelurahan</td>
                <td>:</td>
                <td width="525"><?php echo $registri_id->kelurahan; ?></td>
            </tr>
            <tr style="height: 30px;">
                <td>Kecamatan</td>
                <td>:</td>
                <td width="525"><?php echo $registri_id->kecamatan; ?></td>
            </tr>
            <tr style="height: 30px;">
                <td>Kota</td>
                <td>:</td>
                <td width="525"><?php echo $registri_id->kota; ?></td>
            </tr>
            <tr style="height: 30px;">
                <td>Nomor Telp.</td>
                <td>:</td>
                <td width="525"><?php echo $registri_id->telp; ?></td>
            </tr>
            <tr style="height: 30px;">
                <td>Jenis Usaha / Sifat Usaha</td>
                <td>:</td>
                <td width="525"><?php echo $registri_id->jenis_usaha; ?></td>
            </tr>
            <tr style="height: 30px;">
                <td>Luas Bangunan</td>
                <td>:</td>
                <td width="525"><?php echo $registri_id->luas_bangunan; ?></td>
            </tr>
            <tr style="height: 30px;">
                <td>Luas Lahan</td>
                <td>:</td>
                <td width="525"><?php echo $registri_id->luas_lahan; ?></td>
            </tr>
            <tr style="height: 30px;">
                <td>Status Lahan</td>
                <td>:</td>
                <td width="525"><?php echo $registri_id->status_lahan; ?></td>
            </tr>
            <tr style="height: 30px;">
                <td>Persetujuan Dokumen SPPL</td>
                <td>:</td>
                <td width="525"><?php echo $registri_id->dokumen_spl; ?></td>
            </tr>
        </table>
        <br>
        <table style="width: 550px;
                        " id="list">
            <thead style="border: 1;">
                <th>No.</th>
                <th>Jenis</th>
                <th>Nomor Terbit</th>
                <th>Pemberi Izin</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                <?php if(count($registri_detail) > 0){ ?>
                <?php $no=1; ?>
                <?php foreach($registri_detail as $row): ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row->jenis ?></td>
                    <td><?php echo $row->nomor_terbit ?></td>
                    <td><?php echo $row->pemberi_izin ?></td>
                    <td><?php echo $row->keterangan ?></td>
                </tr>
                <?php endforeach; ?>
                <?php } ?>
            </tbody>
        </table>

    </center>
</body>

</html>

<script>
window.print();
</script>