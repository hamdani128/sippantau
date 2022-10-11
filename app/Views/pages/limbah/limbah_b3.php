<?= $this->Extend('layout/index'); ?>
<?= $this->Section('content'); ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Data Limbah B3 </h6>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#my-modal">
                            <i class="bx bx-plus"></i>
                            Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>ID</th>
                                <th>date</th>
                                <th>Nama Perusahaan</th>
                                <th>Bidang Usaha</th>
                                <th>Periode</th>
                                <th>File Scan</th>
                                <th>Tindakan Penanganan</th>
                                <th>created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($limbah) > 0){ ?>
                            <?php $no=1; ?>
                            <?php foreach($limbah as $row) : ?>
                            <tr>
                                <td>
                                    <div class="button-group">
                                        <button type="button" class="btn btn-sm btn-primary"
                                            onclick="cetak_print_limbahb3('<?php echo $row->id_register ?>')">
                                            <i class="bx bx-printer"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="delete_limbah_b3('<?php echo $row->id_register ?>')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-info"
                                            onclick="show_limbahb3('<?php echo $row->file_name ?>')">
                                            <i class="bx bx-show"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><?php echo $no++; ?></td>
                                <?php if($row->status == 'menunggu approval') { ?>
                                <td>
                                    <button type="button" class="btn btn-warning"><?= $row->status; ?> <span
                                            class="badge bg-dark"></span>
                                    </button>
                                </td>
                                <?php }else{ ?>
                                <td>
                                    <button type="button" class="btn btn-success"><?= $row->status; ?><span
                                            class="badge bg-dark"></span>
                                    </button>
                                </td>
                                <?php } ?>
                                <td><?php echo $row->id_register ?></td>
                                <td><?php echo $row->date; ?></td>
                                <td><?php echo $row->nama_perusahaan ?></td>
                                <td><?php echo $row->bidang ?></td>
                                <td><?php echo $row->periode ?></td>
                                <td><a href=""><?php echo $row->file_name ?></a></td>
                                <td><?php echo $row->tindakan ?></td>
                                <td><?php echo $row->updated_at; ?></td>
                                <?php endforeach; ?>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Enda Page wrapper -->

<!-- Modal Tambah Data B3 -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Data Limbah B3</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form enctype="multipart/form-data" id="form_insert_limbahb3">
                            <div class="form-group">
                                <label for="" id="id_register"><?= $id_registrasi; ?></label>
                            </div>
                            <div class="form-group pt-2">
                                <label class="form-label">Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control"
                                    placeholder="Nama Pemohon">
                            </div>
                            <div class="form-group pt-2">
                                <label class="form-label">Bidang Usaha</label>
                                <input type="text" name="bidang_usaha" id="bidang_usaha" class="form-control">
                            </div>
                            <div class="form-group pt-2">
                                <label class="form-label">Periode</label>
                                <div class="input-group">
                                    <input type="date" name="mulai" id="mulai" class="form-control">
                                    <h6 style="margin-left: 2px;margin-right: 2px;"> To </h6>
                                    <input type="date" name="sampai" id="sampai" class="form-control">
                                </div>
                            </div>
                            <div class="form-group pt-2">
                                <h6>Upload Hasil Pengujian Laboratorium</h6>
                                <input id="dokumen4" type="file" name="dokumen4"
                                    accept=".jpg, .png, image/jpeg, image/png, .pdf" multiple>
                            </div>
                            <div class="form-group pt-2">
                                <label for="">Deskripsi Tindakan Setelah Penanganan</label>
                                <textarea name="tindakan_penanganan" class="form-control" rows="5" cols="5"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-md-12">
                        <div class="input-group">
                            <select class="form-control" name="perlakuan" id="perlakuan">
                                <option value="">Pilih Parameter Perlakuan</option>
                                <option value="DISIMPAN">DISIMPAN</option>
                                <option value="DIMANFAATKAN">DIMANFAATKAN</option>
                                <option value="DIOLAH">DIOLAH</option>
                                <option value="DITIMBUN">DITIMBUN</option>
                                <option value="DISERHAKAN KEPIHAK KETIGA">DISERHAKAN KEPIHAK KETIGA</option>
                                <option value="EKSPOR">EKSPOR</option>
                                <option value="PERLAKUAN LAINNYA">PERLAKUAN LAINNYA</option>
                            </select>
                            <input type="text" name="jumlah_ton" id="jumlah_ton" class="form-control"
                                placeholder="Jumlah (TON)">
                            <select name="jenis_limbah" id="jenis_limbah" class="form-control">
                                <option value="">Pilih Jenis Limbah</option>
                                <option value="Minyak Trafo Bekas">Minyak Trafo Bekas</option>
                                <option value="Kain Majun">Kain Majun</option>
                                <option value="Kemasan Bekas B3">Kemasan Bekas B3</option>
                            </select>
                            <select name="persetujuan" id="persetujuan" class="form-control">
                                <option value="">Pilih Persetujuan</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                            <button class="btn btn-md btn-info" onclick="tambah_baris_limbah_b3()">
                                <i class="bx bx-plus"></i>
                                Baris
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Parameter / Perlakuan</th>
                                        <th>Jumlah (TON)</th>
                                        <th>Jenis Limbah</th>
                                        <th>Persetujuan</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody id="parameter_list_b3">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn-save" onclick="InsertLimbahB3()">
                    <i class="bx bx-save"></i>
                    Simpan
                </button>
                <button class="btn btn-danger" data-dismiss="modal">
                    <i class="bx bx-cancel"></i>
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal End Data B3 -->

<!-- Modal show Detail Scanner -->
<div id="modal-scan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">File - Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <embed id="element-domestik" frameborder="0" width="100%" height="1000
                        px">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<?= $this->EndSection(); ?>