<?php
session_start();
$backgroundImage = "uploads/background.jpeg";

if (isset($_SESSION['backgroundImage'])) {
    $backgroundImage = $_SESSION['backgroundImage'];
}

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
<style>
            body {
            font-family: 'poppins'; 
            text-align:center;
            color: #094264;
            background-image: url("uploads/background.jpeg");  
            background-image: url("<?php echo $backgroundImage; ?>"); 
            transition: background-image 0.5s; 
        }
        

        .logo {
            position: absolute;
            top: 15px;
            left: 15px; 
            width: 35px; 
            height: auto; 
            z-index: 999; 
        }

        .header-text {
            font-size: 20px; 
            color: #358597; 
            font-weight: bold;
            position: absolute;
            top: 8px;
            padding: 10px;
            left: 55px;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 10px;
            position: absolute;
            top: 80px;
            left: 600px;  
            z-index: 999; 
        }
        .p {
            background-color: #A5CBD6;
            border: 1px solid #fff;
            color: #094264;
            padding: 0px 15px;
            border-radius: 5px;
            margin-top: 250px;
            position: relative;
            left: 580px;
            width: 130px;
            z-index: 999; 
            font-size: 16px;
        }

        .p2 p:nth-child(1) {
            font-size: 18px;
            position: absolute;
            top:370px;
            left: 100px;
            display: inline-block; 
            margin-right: 10px;
        }

        .p2 p:nth-child(2) {
            font-size: 18px;
            position: absolute;
            top:430px;
            left: 100px; 
            display: inline-block; 
        }

        .p3 {
            position: absolute;
            top:370px;
            left: 100px;
            cursor: pointer;
        }
        .p3 a{
            font-size: 16px;
            text-decoration: none;
            color: #094264;
            background-color: #A5CBD6;
            border: 1px solid #fff;
            color: #094264;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 130px;
            position: absolute;
            width: 150px;
            height: 50px;
            text-align: center;
            left: -5px;
            z-index: 999; 
        }

        .link {
            font-size: 18px;
            text-decoration: none; 
            color: #094264; 
            cursor: pointer;
            margin-top: 280px;
            position: absolute;
            left: 92px;
            z-index: 999; 
        }
</style>
<body>
<div>
    <img src="uploads/logo.png" alt="Logo" class="logo">
    <div class="header-text">
        <p>Diaryline</p>
    </div>

    <img class="profile-picture" src="uploads/leo.jpeg" alt="Foto Profil">
    
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