<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?= base_url() ?>/assets/images/siantar.png" type="image/png" />
    <!--plugins-->
    <link href="<?= base_url() ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?= base_url() ?>/assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?= base_url() ?>/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/app.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/sweetalert/sweetalert2.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/sweetalert/sweetalert2.min.css">
    <title>SIPPANTAU - Login administrator</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <img class="pt-2" src="<?= base_url() ?>/assets/images/siantar.png" width="90"
                                            alt="" />
                                        <h4 class="pb2 pt-3">Sistem Informasi Pelaporan Pengelolaan Dan Pemantauan
                                            Lingkungan Hidup <br>
                                            <h4>(SIP PANTAU)</h4>
                                        </h4>

                                    </div>

                                    <div class="form-body">
                                        <form class="row g-3">
                                            <div class="col-12">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username"
                                                    placeholder="Username Please">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter
                                                    Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        id="password" value="12345678" name="password"
                                                        placeholder="Enter Password"> <a href="javascript:;"
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="login_administrator()"><i
                                                            class="bx bxs-lock-open"></i>Sign in</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="button" class="btn btn-dark"><i
                                                            class="bx bxs-lock-open"></i>Forgot Password</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="button" onclick="registerlab()"
                                                        class="btn btn-success">
                                                        <i class="bx bxs-edit"></i>
                                                        Registrasi Perusahan
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!-- Script -->
    <script src="<?= base_url() ?>/assets/sweetalert/sweetalert2.js"></script>
    <script src="<?= base_url() ?>/assets/sweetalert/sweetalert2.all.js"></script>
    <script src="<?= base_url() ?>/assets/sweetalert/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>/assets/sweetalert/sweetalert2.all.min.js"></script>
    <!--Password show & hide js -->
    <!--app JS-->
    <script src="<?= base_url() ?>/assets/js/app.js"></script>
    <script src="<?= base_url() ?>/assets/js/custom/login.js"></script>
</body>

</html>