<?php
session_start();
include 'koneksi.php';

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

switch ($aksi) {

    case 'add-buku':
        $judulBuku = $_POST['judul_buku'];
        $penulis = $_POST['penulis'];
        $tahunTerbit = $_POST['tahun_terbit'];
        $foto = $_FILES['sampul_buku']['name'];
        $tmp = $_FILES['sampul_buku']['tmp_name'];
        $size = $_FILES['sampul_buku']['size'];

        $namaBuku = rand();
        $extention = array('png', 'jpg', 'jpeg', 'gif');

        $ext = pathinfo($foto, PATHINFO_EXTENSION);

        if (!in_array($ext, $extention)) {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['message'] = 'Extention file Tidak Mendukung!';
            header("location: ../index.php?page=buku");
        } else if ($size < 1044070) {
            $sampulBuku = $namaBuku . '_' . $foto;
            move_uploaded_file($tmp, '../img/' . $sampulBuku);

            mysqli_query($conn, "INSERT INTO buku VALUES (NULL,'$judulBuku','$penulis','$tahunTerbit', '$sampulBuku')");
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['message'] = 'Data berhasil Ditambah!';
            header("location: ../index.php?page=buku");
        } else {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['message'] = 'Ukuran File terlalu Besar!';
            header("location: ../index.php?page=buku");
        }

        break;

    case 'delete-buku':
        $idBuku = $_GET['id_buku'];

        $queryCekPeminjaman = "SELECT id_peminjam FROM peminjam WHERE id_buku = ?";

        $stmt = $conn->prepare($queryCekPeminjaman);
        $stmt->bind_param("i", $idBuku);
        $stmt->execute();
        $stmt->bind_result($jumlahPeminjaman);
        $stmt->fetch();
        $stmt->close();


        if ($jumlahPeminjaman > 0) {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['message'] = 'Buku Sedang di Pinjam!';
            header("location: ../index.php?page=buku");
            exit();
        } else {

            $queryFoto = "SELECT sampul_buku FROM buku WHERE id_buku=?";
            $stmt = $conn->prepare($queryFoto);
            $stmt->bind_param("i", $idBuku);
            $stmt->execute();
            $stmt->bind_result($oldfile);
            $stmt->fetch();
            $stmt->close();

            if ($oldfile && file_exists("../img/" . $oldfile)) {
                unlink("../img/" . $oldfile);
            }

            mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$idBuku'");
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['message'] = 'Data berhasil diHapus!';
            header("location: ../index.php?page=buku");
        }


        break;

    case 'edit-buku':
        $idBuku = $_POST['id_buku'];
        $judulBuku = $_POST['judul_buku'];
        $penulis = $_POST['penulis'];
        $tahunTerbit = $_POST['tahun_terbit'];
        $foto = $_FILES['sampul_buku']['name'];
        $tmp = $_FILES['sampul_buku']['tmp_name'];
        $size = $_FILES['sampul_buku']['size'];

        $namaSampul = rand();
        $extention = array('png', 'jpg', 'jpeg', 'gif');

        $ext = pathinfo($foto, PATHINFO_EXTENSION);

        $queryFoto = "SELECT sampul_buku FROM buku WHERE id_buku=?";
        $stmt = $conn->prepare($queryFoto);
        $stmt->bind_param("i", $idBuku);
        $stmt->execute();
        $stmt->bind_result($oldFile);
        $stmt->fetch();
        $stmt->close();


        if ($foto != null) {
            if (!in_array($ext, $extention)) {
                $_SESSION['alert'] = 'gagal';
                $_SESSION['message'] = 'Gagal Extention!';
                header("location: ../index.php?page=buku");
            } else if ($size < 1044070) {

                if ($oldFile && file_exists("../img/" . $oldFile)) {
                    unlink("../img/" . $oldFile);
                }

                $sampulBuku = $namaSampul . '_' . $foto;
                move_uploaded_file($tmp, '../img/' . $sampulBuku);

                mysqli_query($conn, "UPDATE buku SET judul_buku='$judulBuku', penulis='$penulis', tahun_terbit='$tahunTerbit', sampul_buku='$sampulBuku' WHERE id_buku='$idBuku'");
                $_SESSION['alert'] = 'berhasil';
                $_SESSION['message'] = 'Data berhasil Diperbarui!';
                header("location: ../index.php?page=buku");
            } else {
                $_SESSION['alert'] = 'gagal';
                $_SESSION['message'] = 'Ukuran File terlalu Besar!';
                header("location: ../index.php?page=buku");
            }
        } else {
            mysqli_query($conn, "UPDATE buku SET judul_buku='$judulBuku', penulis='$penulis', tahun_terbit='$tahunTerbit' WHERE id_buku='$idBuku'");
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['message'] = 'Data berhasil diperbarui!';
            header("location: ../index.php?page=buku");
        }

        break;

    case 'add-peminjam':
        $namaPeminjam = $_POST['nama_peminjam'];
        $email = $_POST['email'];
        $noTelp = $_POST['no_telp'];
        $idBuku = $_POST['id_buku'];

        $cekEmail = mysqli_query($conn, "SELECT * FROM peminjam WHERE email = '$email'");

        if (mysqli_num_rows($cekEmail) > 0) {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['message'] = 'Email Sudah Terdaftar, Silahkan Ganti Email!';
            header("location: ../index.php?page=peminjam");
            exit;
        } else {

            mysqli_query($conn, "INSERT INTO peminjam VALUES (NULL,'$namaPeminjam','$email','$noTelp', $idBuku)");
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['message'] = 'Data berhasil Ditambah!';
            header("location: ../index.php?page=peminjam");
        }


        break;

    case 'delete-peminjam':
        $idPeminjam = $_GET['id_peminjam'];

        mysqli_query($conn, "DELETE FROM peminjam WHERE id_peminjam='$idPeminjam'");
        $_SESSION['alert'] = 'berhasil';
        $_SESSION['message'] = 'Data berhasil Hapus!';
        header("location: ../index.php?page=peminjam");

        break;

    case 'edit-peminjam':
        $idPeminjam = $_POST['id_peminjam'];
        $namaPeminjam = $_POST['nama_peminjam'];
        $email = $_POST['email'];
        $noTelp = $_POST['no_telp'];
        $idBuku = $_POST['id_buku'];

        $cekEmail = mysqli_query($conn, "SELECT * FROM peminjam WHERE email = '$email' AND id_peminjam != '$idPeminjam'");

        if (mysqli_num_rows($cekEmail) > 0) {
            $_SESSION['alert'] = 'gagal';
            $_SESSION['message'] = 'Email Sudah Terdaftar, Silahkan Ganti Email!';
            header("location: ../index.php?page=peminjam");
            exit;
        } else {
            mysqli_query($conn, "UPDATE peminjam SET nama_peminjam='$namaPeminjam', email='$email', no_telp='$noTelp', id_buku='$idBuku' WHERE id_peminjam='$idPeminjam'");
            $_SESSION['alert'] = 'berhasil';
            $_SESSION['message'] = 'Data berhasil diperbarui!';
            header("location: ../index.php?page=peminjam");
        }

        break;
}
