<?= $this->Extend('layout/index'); ?>
<?= $this->Section('content'); ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Modul Master</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Informasi Data User</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Informasi Data User</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#Action</th>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Fullname</th>
                                    <th>updated_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($user_perusahaan) > 0){ ?>
                                <?php $no=1; ?>
                                <?php foreach($user_perusahaan as $row) : ?>
                                <tr>
                                    <td>
                                        <div class="input-group">
                                            <a href="#" class="btn btn-sm btn-info"
                                                onclick="show_password_user('<?php echo $row['id']; ?>')">
                                                <i class="bx bx-show"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-danger"
                                                onclick="delete_data_user('<?php echo $row['id']; ?>', '<?php echo $row['fullname'] ?>')">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['username']; ?></td>
                                    <td><?= $row['fullname']; ?></td>
                                    <td><?= $row['updated_at']; ?></td>
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
</div>
<!--end page wrapper -->

<?= $this->EndSection(); ?>