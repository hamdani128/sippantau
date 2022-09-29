<?= $this->Extend('layout/index'); ?>
<?= $this->Section('content'); ?>
<!--start page wrapper -->
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
            <!-- <div class="ms-auto">
                <div class="btn-group">
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
                </div>
            </div> -->
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Master Data Parameter</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#my-modal">
                            <i class="bx bx-plus"></i>
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>#No</th>
                                <th>Nama Parameter</th>
                                <th>Satuan</th>
                                <th>Jenis Limbah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($parameter) > 0) { ?>
                            <?php $no=1; ?>
                            <?php foreach($parameter as $row) : ?>
                            <tr>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning"
                                        onclick="edit_show_parameter('<?php echo $row->id; ?>')">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger"
                                        onclick="delete_parameter('<?php echo $row->id; ?>', '<?php echo $row->parameter; ?>')">
                                        <i class="bx bx-trash"></i>
                                    </a>
                                </td>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->parameter; ?></td>
                                <td><?php echo $row->satuan; ?></td>
                                <td><?php echo $row->jenis_limbah; ?></td>
                            </tr>
                            <?php endforeach; ?>

                            <?php }else{} ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>#No</th>
                                <th>Nama Parameter</th>
                                <th>Satuan</th>
                                <th>Jenis Limbah</th>
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
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Parameter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">Nama Parameter</label>
                            <input type="text" name="nama_parameter" id="nama_parameter" class="form-control"
                                placeholder="Nama Parameter">
                        </div>
                        <div class="form-group pt-2">
                            <label for="" class="form-label">Satuan</label>
                            <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Satuan">
                        </div>
                        <div class="form-group pt-2">
                            <label for="" class="form-label">pilih jenis limbah</label>
                            <select name="jenis_limbah" id="jenis_limbah" class="form-control">
                                <option value="">Pilih Jenis Limbah</option>
                                <option value="Limbah B3">Limbah B3</option>
                                <option value="Limbah Kualitas Air">Limbah Kualitas Air</option>
                                <option value="Limbah Emisi Udara">Limbah Emisi Udara</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn-save" onclick="insert_parameter()">
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

<!-- update data -->
<div id="my-modal-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white" id="my-modal-title">Update Parameter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="id_update" id="id_update">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Nama Parameter</label>
                            <input type="text" name="nama_parameter_update" id="nama_parameter_update"
                                class="form-control" placeholder="Nama Parameter">
                        </div>
                        <div class="form-group pt-2">
                            <label for="" class="form-label">Satuan</label>
                            <input type="text" name="satuan_update" id="satuan_update" class="form-control"
                                placeholder="Satuan">
                        </div>
                        <div class="form-group pt-2">
                            <label for="" class="form-label">pilih jenis limbah</label>
                            <select name="jenis_limbah_update" id="jenis_limbah_update" class="form-control">
                                <option value="">Pilih Jenis Limbah</option>
                                <option value="Limbah B3">Limbah B3</option>
                                <option value="Limbah Kualitas Air">Limbah Kualitas Air</option>
                                <option value="Limbah Emisi Udara">Limbah Emisi Udara</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn-save" onclick="update_parameter()">
                    <i class="bx bx-edit"></i>
                    Update
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