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
        <h6 class="mb-0 text-uppercase">Data Limbah Emisi Udara </h6>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Mulai</label>
                            <input type="date" name="mulai_limbah_udara" id="mulai_limbah_udara" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Sampai</label>
                            <div class="input-group">
                                <input type="date" name="sampai_limbah_udara" id="sampai_limbah_udara"
                                    class="form-control">
                                <button class="btn btn-primary btn-md" onclick="filter3()">
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
                    <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
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
                            </tr>
                        </thead>
                        <tbody id="tbody_limbah_udara">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Enda Page wrapper -->
<?= $this->EndSection(); ?>