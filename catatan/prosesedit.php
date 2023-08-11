<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "diary");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $iddiary = $_POST['iddiary'];
    $tgl = $_POST['tgl'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, "uploads/" . $image_name);

    // Query untuk melakukan update catatan
    $query = "UPDATE catatan SET tgl='$tgl',judul='$judul',isi='$isi',image='$image' WHERE iddiary=$iddiary";
    mysqli_query($koneksi, $query);

    // Redirect kembali ke halaman detail setelah berhasil mengedit
    header("Location: ../detail.php?iddiary=$iddiary");
    exit();
}
?>
