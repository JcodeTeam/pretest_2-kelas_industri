<div class="modal fade" id="createBukuModal" tabindex="-1" role="dialog" aria-labelledby="createBukuModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBukuModalLabel">Tambah Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="config/crud.php?aksi=add-buku" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="sampul_buku">Sampul Buku</label>
                        <input type="file" class="form-control" id="sampul_buku" name="sampul_buku" accept="img/*" required onchange="previewImage(event)" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku" minlength="5" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" minlength="5" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" pattern="\d{4}" maxlength="4" placeholder="YYYY" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>