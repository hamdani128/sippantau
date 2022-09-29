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
                        <li class="breadcrumb-item active" aria-current="page">Data Metoda</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Master Data Metoda</h6>
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
                                <th>Nama Metoda</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($metoda) > 0 ) { ?>
                            <?php $no=1; ?>
                            <?php foreach($metoda as $row) : ?>
                            <tr>
                                <td>
                                    <button class="btn btn-primary btn-sm"
                                        onclick="edit_show_metoda('<?php echo $row->id; ?>')">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="delete_metoda('<?php echo $row->id; ?>', '<?php echo $row->metoda; ?>')">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </td>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->metoda; ?></td>
                                <td><?php echo $row->updated_at; ?></td>
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
<!--end page wrapper -->

<!-- Tambah Data Metoda -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Data Metoda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">Nama Metoda</label>
                            <input type="text" name="metoda" id="metoda" class="form-control"
                                placeholder="Isi Nama Metoda">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn-save" onclick="insert_metoda()">
                    <i class="bx bx-save"></i>
                    Simpan
                </button>
                <button class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="bx bx-cancel"></i>
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Metoda -->

<!-- Edit Modal Metoda -->
<div id="my-modal-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white" id="my-modal-title">Update Metoda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="id_update" id="id_update" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Nama Metoda</label>
                            <input type="text" name="metoda_update" id="metoda_update" class="form-control"
                                placeholder="Isi Nama Metoda">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning" id="btn-save" onclick="update_metoda()">
                    <i class="bx bx-edit"></i>
                    Update
                </button>
                <button class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="bx bx-cancel"></i>
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Metoda -->

<?= $this->EndSection(); ?>