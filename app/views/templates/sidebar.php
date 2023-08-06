<?php
if (empty($_SESSION)) {
    header("Location: ".BASEURL."/dashboard/error/1");
}
?>

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
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .nav {
        padding: 20px;
    }

    .cobacik {
        color: white;
    }

    .side {
        padding: 5px;
        margin-bottom: 10%;
        border-radius: 10px;
    }

    .side:hover {
        background-color: #e6e6e6;
    }

    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #DCDCDC;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #999;
    }
    </style>
    <title>Halaman <?= $data['judul'] ?></title>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-center align-items-center w-100">
                    <a class="navbar-brand brand-logo mt-3" href="<?= BASEURL ?>/dashboard/index">
                        <!-- <img src="<?= BASEURL ?>/img/" class="img-fluid w-100" alt="logo" /> -->
                        BatikPedia
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <img src="<?= BASEURL ?>/img/<?= $data['user']['profil'] ?>" alt="profile"
                                class="img-fluid" />
                            <span class="nav-profile-name"><?= $_SESSION ? $data['user']['nama'] : "Nama" ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="profil">
                                <i class="mdi mdi-account-circle text-primary"></i>
                                Profile
                            </a>
                            <a class="dropdown-item text-danger" href="<?= BASEURL ?>/dashboard/logout">
                                <i class="mdi mdi-logout text-danger"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav mt-2">
                    <li class="nav-item side">
                        <a class="nav-link" href="<?= BASEURL ?>/dashboard/index">
                            <i class="mdi mdi-24px mdi-view-dashboard menu-icon"></i>
                            <span class="menu-title cobacik" style="font-size: 28px;">Dashboard</span>
                        </a>
                    </li>
                    <?php if($data['user']['hakAkses']=='admin'):?>
                    <li class="nav-item side">
                        <a class="nav-link" href="<?= BASEURL ?>/dashboard/member">
                            <i class="mdi mdi-24px mdi-account-multiple menu-icon"></i>
                            <span class="menu-title" style="font-size: 28px;">Member</span>
                        </a>
                    </li>
                    <?php endif?>
                    <li class="nav-item side">
                        <a class="nav-link" href="<?= BASEURL ?>/dashboard/batik">
                            <i class="mdi mdi-24px mdi-texture menu-icon"></i>
                            <span class="menu-title" style="font-size: 28px;">Batik</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <!-- konten -->