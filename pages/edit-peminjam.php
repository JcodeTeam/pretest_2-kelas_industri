<div class="modal fade" id="editPeminjamModal-<?= $d['id_peminjam']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Peminjam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="config/crud.php?aksi=edit-peminjam" method="POST">
                    <input type="hidden" name="id_peminjam" value="<?= $d['id_peminjam']; ?>">

                    <div class="mb-2">
                        <label>Nama Peminjam</label>
                        <input type="text" class="form-control" name="nama_peminjam" value="<?= $d['nama_peminjam']; ?>" required>
                    </div>

                    <div class="mb-2">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $d['email']; ?>" required>
                    </div>

                    <div class="mb-2">
                        <label>No. Telpon</label>
                        <input type="number" class="form-control" id="no_telp" name="no_telp" maxlength="15" placeholder="08xxx" value="<?= $d['no_telp']; ?>" required>
                    </div>

                    <div class="mb-2">
                        <label for="id_buku">Buku</label>
                        <select class="form-select" name="id_buku" id="id_buku">
                            <option value="">Pilih Buku</option>
                            <?php while ($buku = mysqli_fetch_assoc($category)) { ?>
                                <option value="<?= $buku['id_buku']; ?>" <?= ($buku['id_buku'] == $selectedBuku) ? 'selected' : ''; ?>>
                                    <?= $buku['judul_buku']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" name="edit_buku" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>