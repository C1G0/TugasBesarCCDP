<?php
session_start();
if(!isset($_SESSION['user_session'])){
    header("Location: ".BASEURL."");
    exit;
}
$_SESSION = [];
session_unset();
session_destroy();

if(!isset($_SESSION[''])){
    echo "
    <script>
    alert('Anda telah logout. Silakan login kembali apabila ingin mengakses halaman!');
    document.location.href = '".BASEURL."';
    </script>
    ";
}
?>