<?php
$koneksi = mysqli_connect("localhost", "root", "", "diary");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['iddiary'])) {
    $iddiary = $_GET['iddiary'];
    $query = "DELETE FROM catatan WHERE iddiary = $iddiary";
    mysqli_query($koneksi, $query);

    header("Location:../beranda.php");
    exit();
}
?>


