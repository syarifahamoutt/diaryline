<?php
$koneksi = mysqli_connect("localhost", "root", "", "diary");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl = $_POST['tgl'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $mood = $_POST['mood'];
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, "uploads/" . $image_name);

    $query = "INSERT INTO catatan (tgl, judul, isi,mood, image) VALUES ('$tgl', '$judul', '$isi','$mood', '$image_name')";
    mysqli_query($koneksi, $query);

    header("Location:../beranda.php");
    exit();
}
?>



        
        
        
