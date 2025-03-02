<div class="modal fade" id="detailPeminjamModal-<?= $d['id_peminjam']; ?>" tabindex="-1" aria-labelledby="detailBukuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Peminjam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Judul Buku:</strong> <?= $d['nama_peminjam']; ?></p>
                <p><strong>Penulis:</strong> <?= $d['email']; ?></p>
                <p><strong>Tahun Terbit:</strong> <?= $d['no_telp']; ?></p>
                <p><strong>Judul Buku:</strong> <?= $d['judul_buku']; ?></p>
            </div>
        </div>
    </div>
</div>
