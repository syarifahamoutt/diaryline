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
<style>
        body {
            font-family:  'Poppins'; 
            text-align:center;
            color: #094264;
            background-image: url("me.jpeg"); 
            background-image: url("<?php echo $backgroundImage; ?>"); 
            transition: background-image 0.5s; 

        }

        .logo {
            position: absolute;
            top: 15px;
            left: 15px; 
            width: 25px; 
            height: auto; 
            z-index: 999; 
        }

        .header-text {
            font-size: 14px; 
            color: #358597; 
            font-weight: bold;
            position: absolute;
            top: 16px;
            left: 55px;
        }

        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
            position: absolute;
            top: 80px;
            left: 480px;  
            z-index: 999; 
        }
        .p {
            background-color: #A5CBD6;
            border: 1px solid #fff;
            color: #094264;
            padding: 0px 15px;
            border-radius: 5px;
            margin-top: 200px;
            position: relative;
            left: 455px;
            width:100px;
            z-index: 999; 
        }

        .p2 p:nth-child(1) {
            position: absolute;
            top:250px;
            left: 100px;
            display: inline-block; 
            margin-right: 10px;
        }

        .p2 p:nth-child(2) {
            position: absolute;
            top:300px;
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
            text-decoration: none;
            color: #094264;
            background-color: #A5CBD6;
            border: 1px solid #fff;
            color: #094264;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            position: absolute;
            width: 150px;
            height: 45px;
            text-align: center;
            left: -5px;
            z-index: 999; 
        }

        .link {
            text-decoration: none; 
            color: #094264; 
            cursor: pointer;
            margin-top: 215px;
            position: absolute;
            left: 92px;
            z-index: 999; 
        }

</style> 
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