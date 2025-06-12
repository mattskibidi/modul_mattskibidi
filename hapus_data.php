<?php
include_once "koneksi.php";

if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];

    $query = "DELETE FROM sbsp WHERE nama = '$nama'";
    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='lihat_data.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); window.location.href='lihat_data.php';</script>";
    }
} else {
    header("Location: lihat_data.php");
    exit;
}
?>