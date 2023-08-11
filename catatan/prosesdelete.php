<?php
$koneksi = mysqli_connect("localhost", "root", "", "diary");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['iddiary'])) {
    $iddiary = $_GET['iddiary'];

    // Hapus catatan berdasarkan iddiary
    $query = "DELETE FROM catatan WHERE iddiary = $iddiary";
    mysqli_query($koneksi, $query);

    // Redirect kembali ke halaman list catatan setelah berhasil menghapus
    header("Location:catatan.php");
    exit();
}
?>
