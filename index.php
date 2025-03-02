<?php
session_start();
include 'config/koneksi.php';
include 'layouts/header.php';
?>

<div class="wrapper">

    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

    include 'partials/sidebar.php'; ?>

    <div class="main p-3">
        <?php

        switch ($page) {
            case 'dashboard':
                include 'pages/dashboard.php';
                break;
            case 'buku':
                include 'pages/buku.php';
                break;
            case 'peminjam':
                include 'pages/peminjam.php';
                break;
            default:
                echo "<h6>404 Page Not Found</h6>";
                break;
        }
        ?>
    </div>
</div>


<?php
include 'pages/add-buku.php';
$queryBuku = "SELECT id_buku, judul_buku FROM buku";
$category = mysqli_query($conn, $queryBuku);
include 'pages/add-peminjam.php';
include 'layouts/footer.php';
?>