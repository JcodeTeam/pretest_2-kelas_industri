<div class="modal fade" id="editBukuModal-<?= $d['id_buku']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="config/crud.php?aksi=edit-buku" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_buku" value="<?= $d['id_buku']; ?>">

                    <div class="mb-2">
                        <label for="sampul_buku">Sampul Buku</label>
                        <input type="file" class="form-control" id="sampul_buku" name="sampul_buku" value="<?= $d['sampul_buku']; ?>">
                    </div>

                    <div class="mb-2 text-center">
                        <img src="img/<?= $d['sampul_buku']; ?>" alt="Sampul Buku" class="img-fluid rounded shadow" style="max-width: 150px;">
                    </div>

                    <div class="mb-2">
                        <label>Judul Buku</label>
                        <input type="text" class="form-control" name="judul_buku" value="<?= $d['judul_buku']; ?>" required>
                    </div>

                    <div class="mb-2">
                        <label>Penulis</label>
                        <input type="text" class="form-control" name="penulis" value="<?= $d['penulis']; ?>" required>
                    </div>

                    <div class="mb-2">
                        <label>Tahun Terbit</label>
                        <input type="text" class="form-control" name="tahun_terbit" pattern="\d{4}" maxlength="4" value="<?= $d['tahun_terbit']; ?>" required>
                    </div>

                    <button type="submit" name="edit_buku" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
