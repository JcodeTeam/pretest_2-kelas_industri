<div class="container">
    <div class="row mt-3 p-3">
        <?php
        $no = 1;
        $query = "SELECT peminjam.id_peminjam, peminjam.nama_peminjam, peminjam.email, peminjam.no_telp, buku.id_buku, buku.judul_buku FROM peminjam JOIN buku ON peminjam.id_buku = buku.id_buku";
        $data = mysqli_query($conn, $query);
        $queryBuku = "SELECT id_buku, judul_buku FROM buku";
        $category = mysqli_query($conn, $queryBuku);
        include 'pages/add-peminjam.php';
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <h5 class="card-title">Nama: <?= $d['nama_peminjam']; ?></h5>
                        <strong>Buku:</strong> <?= $d['judul_buku']; ?>
                        </p>
                    </div>
                    
                    <div class="card-footer d-flex gap-2">
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailPeminjamModal-<?= $d['id_peminjam']; ?>">
                            <i class="bi bi-eye"></i> Detail
                        </button>

                        <form action="config/crud.php?aksi=delete-peminjam&id_peminjam=<?= $d['id_peminjam']; ?>" method="POST">
                            <button type="button" class="btn btn-danger" onclick="return confirmDelete(event, this)">
                                <i class="bi bi-trash"></i> HAPUS

                            </button>
                        </form>

                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editPeminjamModal-<?= $d['id_peminjam']; ?>">
                            <i class="bi bi-pencil"></i> EDIT
                        </button>
                    </div>
                </div>
            </div>

            <?php
            $selectedBuku = $d['id_buku'];
            $queryBuku = "SELECT id_buku, judul_buku FROM buku";
            $category = mysqli_query($conn, $queryBuku);
            include 'pages/edit-peminjam.php';
            include 'pages/detail-peminjam.php';
            ?>

        <?php } ?>
    </div>
</div>