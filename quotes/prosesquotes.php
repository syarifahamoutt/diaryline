<?php
$koneksi = mysqli_connect("localhost", "root", "", "diary");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl = $_POST['tgl'];
    $isi = $_POST['isi'];

    $query = "INSERT INTO quotes (tgl,isi) VALUES ('$tgl','$isi')";
    mysqli_query($koneksi, $query);
    
    header("Location: ../beranda.php");
    exit();
}
?>
