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
        <h6 class="mb-0 text-uppercase">Data Limbah Air Domestik </h6>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Mulai</label>
                            <input type="date" name="mulai_domestik" id="mulai_domestik" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Sampai</label>
                            <div class="input-group">
                                <input type="date" name="sampai_domestik" id="sampai_domestik" class="form-control">
                                <button class="btn btn-primary btn-md" onclick="filter1()">
                                    <i class="bx bx-filter"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <th>#aksi</th>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>ID Perusahaan</th>
                            <th>ID Register</th>
                            <th>No.Sertifikat</th>
                            <th>Nama Pemohon</th>
                            <th>Alamat Pemohon</th>
                            <th>Lokasi Kegiatan</th>
                            <th>Jenis Contoh Uji</th>
                            <th>Tanggal Contoh Uji Diterima</th>
                            <th>Titik Pengambilan Contoh Uji</th>
                            <th>File Scaner</th>
                            <th>Tindakan</th>
                        </thead>
                        <tbody id="tbody_air_domestik">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Enda Page wrapper -->


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