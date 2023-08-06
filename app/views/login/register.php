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
    <title>Halaman <?=$data['judul'] ?></title>
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
    height: 600px;
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
                                    class="text-black text-decoration-none float-end mdi mdi-keyboard-backspace menu-icon mb-3"
                                    style="text-align: left; font-size: 18pt">
                                    Kembali
                                </a>
                            </div>
                            <div class="container-fluid">
                                <div class="body d-md-flex align-items-center justify-content-between">
                                    <div class="box-1 d-flex flex-column h-150">
                                        <?php Flasher::flash()?>
                                        <div class="mt-1 px-5">
                                            <p class=" mb-3 h-1" style="text-align: center;">Sign Up</p>
                                            <form action="<?= BASEURL ?>/login/regUser" method="post" id="form">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control rounded-pill" id="nama"
                                                        aria-describedby="nama" placeholder="Nama" name="nama" required>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="email" class="form-control rounded-pill" id="email"
                                                        aria-describedby="Email" placeholder="Email" name="email"
                                                        required>
                                                </div>
                                                <div class="mb-1">
                                                    <input type="password" class="form-control rounded-pill"
                                                        id="password" placeholder="Password" name="password" required>
                                                </div>
                                                <div class="form-switch mb-3">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="checkbox-pass" onclick="myFunction()">
                                                    <label class="form-check-label mt-1" for="checkbox-pass">Show
                                                        Password</label>
                                                </div>
                                                <p>Tanggal Lahir</p>
                                                <div class="mb-3">
                                                    <input type="date" class="form-control rounded-pill" id="tgl_lahir"
                                                        aria-describedby="date" name="tgl_lahir" placeholder="Date"
                                                        required>
                                                </div>
                                                <div class="col-6">
                                                    <p>Jenis Kelamin</p>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="jk"
                                                                    id="jk" value="L" required>
                                                                Laki - Laki
                                                                <i class="input-helper"></i></label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="jk"
                                                                    id="jk" value="P">
                                                                Perempuan
                                                                <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <div style="text-align: center;">
                                                        <button class="btn btn-primary rounded-pill"
                                                            style="font-size: 16pt;" type="submit">Sign Up</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="box-1 mt-md-0 mt-5"><img
                                            src="<?=BASEURL?>/img/wp6392619-batik-android-wallpapers.jpg" class=""
                                            alt="" /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
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
<script>
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>