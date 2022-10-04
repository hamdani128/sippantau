<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo base_url() ?>/assets/images/siantar.png" type="image/png" />
    <!--plugins-->
    <link href="<?php echo base_url() ?>/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <!-- loader-->
    <link href="<?php echo base_url() ?>/assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/css/app.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/dark-theme.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/semi-dark.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/header-colors.css" />
    <link href="<?php echo base_url() ?>/assets/sweetalert/sweetalert2.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/sweetalert/sweetalert2.min.css" rel="stylesheet">
    <title><?php echo $title; ?></title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?= $this->include('layout/sidebar.php') ?>
        <!--end sidebar wrapper -->
        <!--start header -->
        <?= $this->include('layout/header.php')?>
        <!--end header -->
        <!-- Start Content -->
        <?= $this->renderSection('content'); ?>
        <!-- End Content -->

        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr />
            <h6 class="mb-0">Theme Styles</h6>
            <hr />
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                    <label class="form-check-label" for="semidark">Semi Dark</label>
                </div>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
            </div>
            <hr />
            <h6 class="mb-0">Header Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator headercolor1" id="headercolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2" id="headercolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3" id="headercolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4" id="headercolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5" id="headercolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6" id="headercolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7" id="headercolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8" id="headercolor8"></div>
                    </div>
                </div>
            </div>
            <hr />
            <h6 class="mb-0">Sidebar Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="<?php echo base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url() ?>/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>

    <?php if($page == 'Home' ) : ?>
    <script src="<?php echo base_url() ?>/assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/index.js"></script>
    <?php endif; ?>
    <!-- Sweetalert -->
    <script src="<?php echo base_url(); ?>/assets/sweetalert/sweetalert2.js"></script>
    <script src="<?php echo base_url(); ?>/assets/sweetalert/sweetalert2.all.js"></script>
    <script src="<?php echo base_url(); ?>/assets/sweetalert/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/sweetalert/sweetalert2.all.min.js"></script>

    <!--app JS-->
    <script src="<?php echo base_url() ?>/assets/js/app.js"></script>
    <!-- datatable  -->
    <script src="<?php echo base_url() ?>/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/custom/table.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/custom/master_register.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/custom/limbah_air_domestik.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/custom/limbah_air_kegiatan.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/custom/limbah_udara.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/custom/bukumutu.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/custom/metoda.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/custom/limbahb3.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/custom/admin_filter.js"></script>


</body>
<!-- Mirrored from codervent.com/rocker/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Jun 2022 08:03:48 GMT -->

</html>