<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= BASEURL ?>/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?= BASEURL ?>/vendors/base/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="<?= BASEURL ?>/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css" />
    <!--Plugin icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- endinject -->
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
    </style>
    <title>Halaman <?= $data['judul'] ?></title>
</head>

<body>
    <!--Navbar-->
    <header>
        <nav class="navbar navbar-light" style="background-color: #FF9F45;">
            <div class="container-fluid">
                <a class="navbar-brand brand-logo text-light" href="<?= BASEURL ?>">BatikPedia</a>
                <div class="d-flex">
                    <?php if (!isset($_SESSION['user_session'])) : ?>
                    <a class="btn btn-outline-success" href="<?= BASEURL ?>/login">Login</a>
                    <a class="btn btn-outline-success" href="<?= BASEURL ?>/login/register">Daftar</a>
                    <?php else : ?>
                    <a class="btn btn-outline-success" href="<?= BASEURL ?>/dashboard/index">Dashboard</a>
                    <a class="btn btn-outline-success" href="<?= BASEURL ?>/dashboard/logout">Logout</a>
                    <?php endif ?>
                </div>
            </div>
        </nav>
    </header>