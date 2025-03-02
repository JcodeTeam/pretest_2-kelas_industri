<div class="container">

    <div class="row mt-3 p-3">

        <?php
        include 'pages/add-buku.php';
        $data = mysqli_query($conn, "SELECT * FROM buku");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg h-100 border-0" style="border-radius: 10px; overflow: hidden;">
                    <div class="card-body p-3 d-flex flex-column align-items-center">

                        <h5 class="card-title mt-3 text-center"><?= $d['judul_buku']; ?></h5>
                    </div>

                    <div class="card-footer d-flex justify-content-center gap-2 bg-light">
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" 
                        <img src="img/<?= $d['sampul_buku']; ?>" class="img-fluid object-fit-cover" alt="Sampul Buku"
                            style="width: 100%; height: 250px; object-fit: cover; border-radius: 5px;">
data-bs-target="#detailBukuModal-<?= $d['id_buku']; ?>">
                            <i class="bi bi-eye"></i>
                        </button>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editBukuModal-<?= $d['id_buku']; ?>">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <form action="config/crud.php?aksi=delete-buku&id_buku=<?= $d['id_buku']; ?>" method="POST">
                            <button type="button" class="btn btn-danger btn-sm" onclick="return confirmDelete(event, this)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            include 'pages/edit-buku.php';
            include 'pages/detail-buku.php';
            ?>
        <?php } ?>

    </div>
</div>