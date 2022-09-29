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
     l                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                            link</a>
                    </div>
                </div> -->
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Data Limbah Emisi Udara </h6>
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
                                <th>No</th>
                                <th>ID</th>
                                <th>No.Sertifikat</th>
                                <th>Nama Pemohon</th>
                                <th>Alamat Pemohon</th>
                                <th>Lokasi Kegiatan</th>
                                <th>Jenis Contoh Uji</th>
                                <th>Tanggal Contoh Uji Diterima</th>
                                <th>Titik Pengambilan Contoh Uji</th>
                                <th>Keterangan</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($limbah) >0) { ?>
                            <?php $no=1; ?>
                            <?php foreach($limbah as $row) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->register_id; ?></td>
                                <td><?php echo $row->no_sertifikat; ?></td>
                                <td><?php echo $row->nama_pemohon; ?></td>
                                <td><?php echo $row->alamat_pemohon; ?></td>
                                <td><?php echo $row->lokasi_kegiatan; ?></td>
                                <td><?php echo $row->contoh_uji; ?></td>
                                <td><?php echo $row->tanggal_contoh_uji; ?></td>
                                <td><?php echo $row->titik_uji; ?></td>
                                <td><?php echo $row->status; ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="bx bx-printer"></i>
                                    </a>
                                    <!-- <a href="#" class="btn btn-sm btn-danger">
                                        <i class="bx bx-trash"></i>
                                    </a> -->
                                </td>
                            </tr>
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

<!-- Modal Tambah Data -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Data Limbah Emisi Udara</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-grup">
                            <label for="" class="form-label">No.Sertifikat</label>
                            <input type="text" name="no_sertifikat_udara" id="no_sertifikat_udara" class="form-control"
                                placeholder="Masukkan No.Sertifikat">
                        </div>
                        <div class="form-group pt-2">
                            <label class="form-label">Nama Pemohon</label>
                            <input type="text" name="nama_pemohon_udara" id="nama_pemohon_udara" class="form-control"
                                placeholder="No Pemohon">
                        </div>
                        <div class="form-group pt-2">
                            <label class="form-label">Alamat Pemohon</label>
                            <textarea name="alamat_pemohon_udara" id="alamat_pemohon_udara" cols="2" rows="2"
                                class="form-control">
                            </textarea>
                        </div>
                        <div class="form-group pt-2">
                            <label class="form-label">Lokasi Kegiatan</label>
                            <input type="text" name="lokasi_udara" id="lokasi_udara" class="form-control">
                        </div>
                        <div class="form-group pt-2">
                            <label class="form-label">Jenis Contoh Uji</label>
                            <input type="text" name="jenis_contoh_udara" id="jenis_contoh_udara" class="form-control"
                                placeholder="Jenis Contoh uji">
                        </div>
                        <div class="form-group pt-2">
                            <label class="form-label">Tanggal Contoh Uji</label>
                            <input type="date" name="tanggal_contoh_udara" id="tanggal_contoh_udara"
                                class="form-control" placeholder="Tanggal Contoh Uji">
                        </div>
                        <div class="form-group pt-2">
                            <label class="form-label">Titik Pengambilan Contoh Uji</label>
                            <input type="text" name="titik_contoh_udara" id="titik_contoh_udara" class="form-control"
                                placeholder="Titik Pengambilan Contoh Uji">
                        </div>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-md-12">
                        <div class="input-group">
                            <select name="parameter_udara" id="parameter_udara" class="form-control">
                                <option value="">Pilih Parameter</option>
                                <?php foreach($parameter as $row): ?>
                                <option value="<?php echo $row->parameter ?>"><?php echo $row->parameter ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select name="satuan_udara" id="satuan_udara" class="form-control">
                                <option value="">Pilih Satuan</option>
                                <?php foreach($parameter as $row): ?>
                                <option value="<?php echo $row->satuan ?>"><?php echo $row->satuan ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="text" name="hasil_udara" id="hasil_udara" class="form-control"
                                placeholder="Hasil Pengujian">
                            <input type="text" name="baku_mutu_udara" id="baku_mutu_udara" class="form-control"
                                placeholder="Baku Mutu">
                            <select name="metoda_udara" id="metoda_udara" class="form-control">
                                <option value="">Pilih Metoda</option>
                                <?php foreach($metoda as $row): ?>
                                <option value="<?php echo $row->metoda ?>"><?php echo $row->metoda ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-md btn-info" onclick="tambah_baris_limbah_udara()">
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
                                <tbody id="parameter_list_emisi">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn-save" onclick="insert_limbah_udara()">
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

<?= $this->EndSection(); ?>