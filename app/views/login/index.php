<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= BASEURL ?>/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?= BASEURL ?>/vendors/base/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="<?= BASEURL ?>/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= BASEURL ?>/images/favicon.png" />
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
    <!-- SweetAlert2 -->
    <script src=" //cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Halaman <?= $data['judul'] ?></title>
</head>
<style>
body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

.container {
    margin: 50px auto;
}

.body {
    position: relative;
    width: 720px;
    height: 440px;
    margin: 20px auto;
    border: 1px solid #dddd;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

.box-1 img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.box-2 {
    padding: 10px;
}

.box-1,
.box-2 {
    width: 50%;
}

.h-1 {
    font-size: 36px;
    font-weight: 700;
}

.text-muted {
    font-size: 14px;
}

.container .box {
    width: 100px;
    height: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border: 2px solid transparent;
    text-decoration: none;
    color: #615f5fdd;
}

.box:active,
.box:visited {
    border: 2px solid #ee82ee;
}

.box:hover {
    border: 2px solid #ee82ee;
}

@media (max-width: 767px) {
    body {
        padding: 10px;
    }

    .body {
        width: 100%;
        height: 100%;
    }

    .box-1 {
        width: 100%;
    }

    .box-2 {
        width: 100%;
        height: 440px;
    }
}
</style>

<body>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <a href="<?= BASEURL ?>"
                                    class="auth-link text-black text-decoration-none float-end mdi mdi-keyboard-backspace menu-icon mb-3"
                                    style="text-align: left; font-size: 18pt">
                                    Kembali
                                </a>
                            </div>
                            <div class="container-fluid">
                                <div class="body d-md-flex align-items-center justify-content-between">
                                    <div class="box-2 d-flex flex-column h-100">
                                        <?php Flasher::flashReg();?>
                                        <div class="mt-3 px-5">
                                            <p class="mt-1 mb-5 h-1" style="text-align: center;">Log in</p>
                                            <form action="<?= BASEURL ?>/login/loginUser" method="post">
                                                <div class="mb-3">
                                                    <input type="email" class="form-control rounded-pill" name="email"
                                                        id="email" aria-describedby="emailHelp" placeholder="Email"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="password" class="form-control rounded-pill"
                                                        name="password" id="password" placeholder="Password" required>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <div class="mt-4" style="text-align: center;">
                                                        <button class="btn btn-primary rounded-pill"
                                                            style="font-size: 16pt;" type="submit">Login</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="container-fluid d-flex justify-content-end pt-3 ms-5">
                                                <p class="me-1" style="font-size: 12pt;">atau </p>
                                                <a href="<?= BASEURL ?>/login/register" style="font-size: 12pt">
                                                    Daftar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-1 mt-md-0 mt-5"><img
                                            src="<?= BASEURL ?>/img/wp6392619-batik-android-wallpapers.jpg" class=""
                                            alt="" /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
<!-- plugins:js -->
<script src="<?= BASEURL ?>/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="<?= BASEURL ?>/vendors/chart.js/Chart.min.js"></script>
<script src="<?= BASEURL ?>/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?= BASEURL ?>/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= BASEURL ?>/js/off-canvas.js"></script>
<script src="<?= BASEURL ?>/js/hoverable-collapse.js"></script>
<script src="<?= BASEURL ?>/js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= BASEURL ?>/js/dashboard.js"></script>
<script src="<?= BASEURL ?>/js/data-table.js"></script>
<script src="<?= BASEURL ?>/js/jquery.dataTables.js"></script>
<script src="<?= BASEURL ?>/js/dataTables.bootstrap4.js"></script>
<!-- End custom js for this page-->
<script src="<?= BASEURL ?>/js/jquery.cookie.js" type="text/javascript"></script>