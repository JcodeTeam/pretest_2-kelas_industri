<?php
$queryBuku = "SELECT * FROM buku";
$resultBuku = mysqli_query($conn, $queryBuku);
$jumlahBuku = mysqli_num_rows($resultBuku);

$queryPinjam = "SELECT * FROM peminjam";
$resultPinjam = mysqli_query($conn, $queryPinjam);
$jumlahPinjam = mysqli_num_rows($resultPinjam);

$queryPinjaman = "SELECT b.judul_buku, b.sampul_buku, COUNT(p.id_buku) AS total_peminjaman
FROM peminjam p
JOIN buku b ON p.id_buku = b.id_buku
GROUP BY b.judul_buku, b.sampul_buku
ORDER BY total_peminjaman DESC
LIMIT 1";
$resultPinjaman = mysqli_query($conn, $queryPinjaman);
$jumlahPinjaman = mysqli_fetch_assoc($resultPinjaman);
?>

<div class="container mt-4">
    <div class="row d-flex flex-row">

        <div class="col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                                <i class="bi bi-book me-3"></i>Total Buku
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahBuku; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                                <i class="bi bi-book me-3"></i>Total Peminjam
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahPinjam; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-lg h-100 border-0" style="border-radius: 10px; overflow: hidden;">
                <div class="card-body p-3 d-flex flex-column align-items-center">
                    <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                        BEST SELLER
                    </div>
                    <img src="img/<?= $jumlahPinjaman['sampul_buku']; ?>" class="img-fluid object-fit-cover" alt="Sampul Buku"
                        style="width: 100%; height: 250px; border-radius: 5px;">

                    <i class="bi bi-book"></i>
                    <h6 class="fw-bold mt-2"><?= $jumlahPinjaman['judul_buku']; ?></h6>
                    <small class="text-muted">Total Peminjam: <strong><?= $jumlahPinjaman['total_peminjaman']; ?></strong></small>
                </div>
            </div>
        </div>


    </div>
</div>