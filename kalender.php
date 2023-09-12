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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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

        .container {
            display: flex; 
            height: 100vh; 
            justify-content: center; 
            align-items: center; 
        }

        .box {
            top: 20px;
            width: 900px;
            height: 430px;
            position: relative;
            background-color: #f2f2f2;
        }

        .box1 {
            width: 200px;
            height: 430px; 
            cursor: pointer;
            background-color: #E0E8FF; 
            position: absolute; 
            top: 275px; 
            left: 189px; 
            transform: translate(-50%, -50%); 
            box-shadow: 5px 0px 10px rgba(0, 0, 0, 0.2); 
        }

        .box2 {
            width: 290px;
            height: 430px; 
            cursor: pointer;
            background-color: #E0E8FF; 
            position: absolute; 
            top: 275px; 
            right: -55px; 
            transform: translate(-50%, -50%); 
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2); 
        }

        .link {
            text-decoration: none; 
            color: #094264; 
            cursor: pointer;
            margin-top: 5px;
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
    <div class="container">
        <div class="box"></div>
        <div class="box1">
            <i class='fas fa-angle-left' style='font-size:24px; position: absolute; top: 20px; left: 40px;'></i>
            <p style='font-size:24px; position: absolute; top: -7px; left: 75px;'>2023</p>
            <i class='fas fa-angle-right' style='font-size:24px; position: absolute; top: 20px; left: 140px;'></i>
            <p style='font-size:15px; position: absolute; top: 50px; left: 20px;'>Januari</p>
            <p style='font-size:15px; position: absolute; top: 80px; left: 20px;'>Februari</p>
            <p style='font-size:15px; position: absolute; top: 110px; left: 20px;'>Maret</p>
            <p style='font-size:15px; position: absolute; top: 140px; left: 20px;'>April</p>
            <p style='font-size:15px; position: absolute; top: 170px; left: 20px;'>Mei</p>
            <p style='font-size:15px; position: absolute; top: 200px; left: 20px;'>Juni</p>
            <p style='font-size:15px; position: absolute; top: 230px; left: 20px;'>Juli</p>
            <p style='font-size:15px; position: absolute; top: 260px; left: 20px;'>Agustus</p>
            <p style='font-size:15px; position: absolute; top: 290px; left: 20px;'>September</p>
            <p style='font-size:15px; position: absolute; top: 320px; left: 20px;'>Oktober</p>
            <p style='font-size:15px; position: absolute; top: 350px; left: 20px;'>November</p>
            <p style='font-size:15px; position: absolute; top: 380px; left: 20px;'>Desember</p>
        </div>
        <div class="box2"></div>
    </div>
    <a href='beranda.php' class='link'>Kembali ke Beranda</a>
    


</body>
</html>