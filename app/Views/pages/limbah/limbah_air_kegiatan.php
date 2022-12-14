<?= $this->extend('layout/index'); ?>
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
                <!-- <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                            link</a>
                    </div>
                </div> -->
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Data Limbah Air Kegiatan </h6>
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
                                <th>No.Sertifikat</th>
                                <th>Nama Pemohon</th>
                                <th>Alamat Pemohon</th>
                                <th>Lokasi Kegiatan</th>
                                <th>Jenis Contoh Uji</th>
                                <th>Tanggal Contoh Uji Diterima</th>
                                <th>Titik Pengambilan Contoh Uji</th>
                                <th>File Scan</th>
                                <th>Tindakan Dilakukan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($limbah > 0){ ?>
                            <?php $no=1; ?>
                            <?php foreach($limbah  as $row): ?>
                            <tr>
                                <td>
                                    <div class="button-group">
                                        <button type="button" class="btn btn-sm btn-primary"
                                            onclick="cetak_print_limbah_air_kegiatan('<?php echo $row->register_id ?>')">
                                            <i class="bx bx-printer"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="hapus_limbah_air_kegiatan('<?php echo $row->register_id ?>')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-info"
                                            onclick="show_limbah_air_kegiatan('<?php echo $row->file_name ?>')">
                                            <i class="bx bx-show"></i>
                                        </button>
                                    </div>
                                </td>
                                <td style="text-align: center;"><?php echo $no++ ?></td>
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
                                <td><?php echo $row->register_id; ?></td>
                                <td><?php echo $row->no_sertifikat ?></td>
                                <td><?php echo $row->nama_pemohon ?></td>
                                <td><?php echo $row->alamat_pemohon?></td>
                                <td><?php echo $row->lokasi_kegiatan ?></td>
                                <td><?php echo $row->contoh_uji ?></td>
                                <td><?php echo $row->tanggal_contoh_uji ?></td>
                                <td><?php echo $row->titik_uji ?></td>
                                <td><a href="#"><?php echo $row->file_name ?></a></td>
                                <td><?php echo $row->tindakan ?></td>
                            </tr>
                            <?php endforeach ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Enda Page wrapper -->

<!-- Modal Data Tambah -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Data Air Limbah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form enctype="multipart/form-data" id="form_insert_air_kegiatan">
                            <div class="form-grup">
                                <label for="" class="form-label">No.Sertifikat</label>
                                <input type="text" name="no_sertifikat" id="no_sertifikat" class="form-control"
                                    placeholder="Masukkan No.Sertifikat">
                            </div>
                            <div class="form-group pt-2">
                                <label class="form-label">Nama Pemohon</label>
                                <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-control"
                                    placeholder="No Pemohon">
                            </div>
                            <div class="form-group pt-2">
                                <label class="form-label">Alamat Pemohon</label>
                                <textarea name="alamat_pemohon" id="alamat_pemohon" cols="2" rows="2"
                                    class="form-control">
                            </textarea>
                            </div>
                            <div class="form-group pt-2">
                                <label class="form-label">Lokasi Kegiatan</label>
                                <input type="text" name="lokasi" id="lokasi" class="form-control">
                            </div>
                            <div class="form-group pt-2">
                                <label class="form-label">Jenis Contoh Uji</label>
                                <input type="text" name="jenis_contoh" id="jenis_contoh" class="form-control"
                                    placeholder="Jenis Contoh uji">
                            </div>
                            <div class="form-group pt-2">
                                <label class="form-label">Tanggal Contoh Uji</label>
                                <input type="date" name="tanggal_contoh" id="tanggal_contoh" class="form-control"
                                    placeholder="Tanggal Contoh Uji">
                            </div>
                            <div class="form-group pt-2">
                                <label class="form-label">Titik Pengambilan Contoh Uji</label>
                                <input type="text" name="titik_contoh" id="titik_contoh" class="form-control"
                                    placeholder="Titik Pengambilan Contoh Uji">
                            </div>
                            <div class="form-group pt-2">
                                <h6>Upload Hasil Pengujian Laboratorium</h6>
                                <input id="dokumen2" type="file" name="dokumen2"
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
                            <select name="parameter" id="parameter" class="form-control">
                                <option value="">Pilih Parameter</option>
                                <?php foreach($parameter as $row): ?>
                                <option value="<?php echo $row->parameter ?>"><?php echo $row->parameter ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select name="satuan" id="satuan" class="form-control">
                                <option value="">Pilih Satuan</option>
                                <?php foreach($parameter as $row): ?>
                                <option value="<?php echo $row->satuan ?>"><?php echo $row->satuan ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="text" name="hasil" id="hasil" class="form-control"
                                placeholder="Hasil Pengujian">
                            <input type="text" name="baku_mutu" id="baku_mutu" class="form-control"
                                placeholder="Baku Mutu">
                            <select name="metoda" id="metoda" class="form-control">
                                <option value="">Pilih Metoda</option>
                                <?php foreach($metoda as $row): ?>
                                <option value="<?php echo $row->metoda ?>"><?php echo $row->metoda ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-md btn-info" onclick="tambah_baris_limbah_air_kegiatan()">
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
                                        <th>Parameter</th>
                                        <th>Satuan</th>
                                        <th>Hasil Pengujian</th>
                                        <th>Buku Mutu</th>
                                        <th>Metoda</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody id="parameter_list">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn-save" onclick="insert_data_limbah_air_kegiatan()">
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