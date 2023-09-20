<?php
session_start();
$backgroundImage = "me.jpeg";

if (isset($_SESSION['backgroundImage'])) {
    $backgroundImage = $_SESSION['backgroundImage'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pengaturan</title>
    <link rel="icon" type="uploads/x-icon" href="uploads/favicon1.ico">
    <link rel="stylesheet" type="text/css" href="style/pengaturan.css">
</head>
<body>
<div>
    <img src="sya.png" alt="Logo" class="logo">
    <div class="header-text">
        <p>Diaryline</p>
    </div>

    <img class="profile-picture" src="nye.jpg" alt="Foto Profil">
    
    <div class="p">
        <p>Nama Pengguna</p>
    </div>
    <div class="p2">
        <p>Email :</p>
        <p>Password :</p>
    </div>
    <div class="p3">
        <a href="gantibackgrond.php">
        <p>Ganti Background</p></a>
    </div>
    <a href='beranda.php' class='link'>Kembali ke Beranda</a>
</body>
</html>