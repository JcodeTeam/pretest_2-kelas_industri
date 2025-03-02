<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/js.js"></script>

<?php
if (isset($_SESSION['alert']) && isset($_SESSION['message'])) {
    if ($_SESSION['alert'] == 'berhasil') {
        $message = htmlspecialchars($_SESSION['message']);
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Operasi berhasil',
                showConfirmButton: false,
                text: '$message',
                timer: 1500
            });
        </script>";

        unset($_SESSION['alert']);
        unset($_SESSION['message']);
    } else if ($_SESSION['alert'] == 'gagal') {
        $message = htmlspecialchars($_SESSION['message']);
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Operasi Gagal',
                showConfirmButton: true,
                text: '$message',
            });
        </script>";

        unset($_SESSION['alert']);
        unset($_SESSION['message']);
    }
}
?>


<script>
    function confirmDelete(event, button) {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data akan dihapus secara permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('form').submit();
            }
        });
    }
</script>

</body>

</html>