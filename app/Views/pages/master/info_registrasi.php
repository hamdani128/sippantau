<?= $this->Extend('layout/index'); ?>
<?= $this->Section('content'); ?>
!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
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
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Master Data Register</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>#No</th>
                                <th>Register ID</th>
                                <th>Date</th>
                                <th>KTP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>HP</th>
                                <th>Nama Perusahaan</th>
                                <th>Nama Usaha</th>
                                <th>Alamat Usaha</th>
                                <th>Dokumen SPL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($registrasi) > 0) { ?>
                            <?php $no=1; ?>
                            <?php foreach($registrasi as $row) : ?>
                            <tr>
                                <td>
                                    <a href="#" onclick="printdokumenregistrasi('<?php echo $row->registrasi_id; ?>')"
                                        class="btn btn-success btn-sm">
                                        <i class="bx bx-printer"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm"
                                        onclick="delete_data_register('<?php echo $row->registrasi_id; ?>')">
                                        <i class="bx bx-trash"></i>
                                    </a>
                                    <a href="#" onclick="detail_registrasilab('<?php echo $row->registrasi_id; ?>')"
                                        class="btn btn-primary btn-sm">
                                        <i class="bx bx-detail"></i>
                                    </a>
                                    <a href="#" onclick="validasi_acc_user('<?php echo $row->registrasi_id; ?>')"
                                        class="btn btn-success btn-sm">
                                        <i class="bx bx-check"></i>
                                    </a>
                                </td>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td><?php echo $row->registrasi_id; ?></td>
                                <td><?php echo $row->date; ?></td>
                                <td><?php echo $row->ktp; ?></td>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo $row->jabatan; ?></td>
                                <td><?php echo $row->hp; ?></td>
                                <td><?php echo $row->nama_perusahaan; ?></td>
                                <td><?php echo $row->nama_usaha; ?></td>
                                <td><?php echo $row->alamat; ?></td>
                                <td><?php echo $row->dokumen_spl; ?></td>
                            </tr>

                            <?php endforeach; ?>

                            <?php }else{} ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>#No</th>
                                <th>Register ID</th>
                                <th>Date</th>
                                <th>KTP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>HP</th>
                                <th>Nama Perusahaan</th>
                                <th>Nama Usaha</th>
                                <th>Alamat Usaha</th>
                                <th>Dokumen SPL</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->

<!-- Modal Detail -->
<div id="my-modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="text-white" id="title-header"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%" id="detaildokumen">
                                <thead>
                                    <tr>
                                        <th>#No</th>
                                        <th>ID Register</th>
                                        <th>Date</th>
                                        <th>Jenis</th>
                                        <th>Nomor Terbit</th>
                                        <th>Pemberi Izin</th>
                                        <th>Keterangan</th>
                                        <th>File Berkas</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#No</th>
                                        <th>ID Register</th>
                                        <th>Date</th>
                                        <th>Jenis</th>
                                        <th>Nomor Terbit</th>
                                        <th>Pemberi Izin</th>
                                        <th>Keterangan</th>
                                        <th>File Berkas</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="bx bx-minus"></i>
                </button>
                <button type="button" class="btn btn-warning">
                    <i class="bx bx-edit"></i>
                </button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Pemberian Password -->
<div id="my-modal-password" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Validasi User Activation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="username_validasi" id="username_validasi" class="form-control"
                                placeholder="username">
                        </div>
                        <div class="form-group pt-2">
                            <label for="" class="form-label">Password</label>
                            <input type="text" name="password_validasi" id="password_validasi" class="form-control"
                                placeholder="Lakukan Pemberian Password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-no-entry"></i>
                    Close
                </button>
                <button type="button" class="btn btn-info" onclick="approve_validasi()">
                    <i class="bx bx-edit-alt"></i>
                    Validasi
                </button>
            </div>
        </div>
    </div>
</div>
<?= $this->EndSection(); ?>