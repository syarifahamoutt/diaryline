<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "diary");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl = $_POST['tgl'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $mood = $_POST['mood'];

    // Upload gambar
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, "uploads/" . $image_name);

    // Query untuk menyimpan catatan beserta gambar ke dalam tabel "diary"
    $query = "INSERT INTO catatan (tgl, judul, isi,mood, image) VALUES ('$tgl', '$judul', '$isi',mood, '$image_name')";
    mysqli_query($koneksi, $query);

    // Redirect kembali ke halaman list catatan setelah berhasil menambahkan catatan
    header("Location:catatan.php");
    exit();
}
?>
