<aside id="sidebar">
    <div class="d-flex">
        <div class="sidebar-brand">
            <i class="bi bi-bookshelf text-white"></i>
            <a href="index.php?page?=dashboard">Perpus</a>
        </div>
    </div>
    <ul class="sidebar-nav">

        <li class="sidebar-item mb-3">
            <a type="button" class="sidebar-link" data-bs-toggle="modal" data-bs-target="#createBukuModal">
                <i class="bi bi-journal"></i>
                <span>Tambah Buku</span>
            </a>
        </li>

        <li class="sidebar-item mb-3">
            <a type="button" class="sidebar-link" data-bs-toggle="modal" data-bs-target="#createPeminjamModal">
                <i class="bi bi-person-fill-add"></i>
                <span>Pinjam Buku</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="index.php?page=dashboard" class="sidebar-link <?php echo ($page == 'dashboard') ? 'active' : ''; ?>">
                <i class="bi bi-house-door-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="index.php?page=buku" class="sidebar-link <?php echo ($page == 'buku') ? 'active' : ''; ?>">
                <i class="lni lni-agenda"></i>
                <span>Buku</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="index.php?page=peminjam" class="sidebar-link <?php echo ($page == 'peminjam') ? 'active' : ''; ?>">
                <i class="bi bi-bookmark-plus"></i>
                <span>Peminjam</span>
            </a>
        </li>
    </ul>
</aside>