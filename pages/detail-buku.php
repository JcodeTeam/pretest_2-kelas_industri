<div class="modal fade" id="detailBukuModal-<?= $d['id_buku']; ?>" tabindex="-1" aria-labelledby="detailBukuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Judul Buku:</strong> <?= $d['judul_buku']; ?></p>
                <p><strong>Penulis:</strong> <?= $d['penulis']; ?></p>
                <p><strong>Tahun Terbit:</strong> <?= $d['tahun_terbit']; ?></p>
            </div>
        </div>
    </div>
</div>
