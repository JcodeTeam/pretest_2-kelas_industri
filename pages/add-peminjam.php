<div class="modal fade" id="createPeminjamModal" tabindex="-1" role="dialog" aria-labelledby="createPeminjamModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPeminjamModalLabel">Tambah Peminjam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="config/crud.php?aksi=add-peminjam" method="POST">

                    <div class="form-group">
                        <label for="nama_peminjam">Nama Peminjam</label>
                        <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" minlength="5" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No. Telpon</label>
                        <input type="number" class="form-control" id="no_telp" name="no_telp" maxlength="15" placeholder="08xxx" required>
                    </div>

                    <div class="form-group">
                        <label for="id_buku">Buku</label>
                        <select class="form-select" name="id_buku" id="id_buku" required>
                            <option value="">Pilih Buku</option>
                            <?php while ($buku = mysqli_fetch_assoc($category)) { ?>
                                <option value="<?= $buku['id_buku']; ?>"><?= $buku['judul_buku']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>