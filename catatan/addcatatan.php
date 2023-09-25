<?php
session_start();
$backgroundImage = "../uploads/background.jpeg";
if (isset($_GET['bg'])) {
    $backgroundImage = $_GET['bg'];
    
    $_SESSION['backgroundImage'] = $backgroundImage;
}

if (isset($_SESSION['backgroundImage'])) {
    $backgroundImage = $_SESSION['backgroundImage'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Catatan</title>
    <link rel="icon" type="uploads/x-icon" href="../uploads/favicon1.ico">
    <link rel="stylesheet" type="text/css" href="../style/add.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>  
<style>
            body {
            font-family: 'poppins'; 
            text-align:center;
            color: #094264;
            background-image: url("../uploads/background.jpeg");  
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


        input[type="date"] {
            background-color: #EDF2FF;
            font-size: 14px;
            position: absolute;
            top: 80px;
            left: 135px; 
            width: 150px; 
            height: auto; 
            z-index: 999; 
        }

        input[type="text"] {
            font-size: 15px;
            background-color: #EDF2FF;
            padding: 7px;
            border: 1px solid #fff;
            border-radius: 5px;
            position: absolute;
            top: 150px;
            left: 155px; 
            width: 250px; 
            height: auto; 
            z-index: 999; 
        }

        textarea#isi {
            background-color: #EDF2FF;
            width: 250px;
            padding: 50px;
            border: 1px solid #fff;
            border-radius: 5px;
            position: absolute;
            font-size: 14px;
            top: 240px;
            left: 600px; 
            right: 50px;
            width: 450px; 
            height: 250px;
            z-index: 999; 
        }

        select[name="mood"] {
            background-color: #EDF2FF;
            padding: 7px;
            font-size: 4em;
            border: 1px solid #ccc;
            border-radius: 20px;
            position: absolute;
            cursor: pointer;
            top: 240px;
            left: 150px; 
            width: 120px; 
            height: auto; 
            z-index: 999; 
        }

        .image {
            padding: 7px;
            border-radius: 10px;
            position: absolute;
            cursor: pointer;
            top: 350px;
            left: 150px; 
            width: 200px; 
            height: auto; 
            z-index: 999; 
        }

        input[type="submit"] {
            background-color: #EDF2FF;
            border: 1px solid #fff;
            color: #094264;
            padding: 5px 25px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 530px;
            position: absolute;
            left: 1050px;
            z-index: 999; 
            font-size: 14px;
        }
</style>     
<body>
<div class="header">
    <img src="../uploads/logo.png" alt="Logo" class="logo">
    <div class="header-text">
        <p>Diaryline</p>
    </div>
</div>
<div>
    <form action="prosesadd.php" method="post" enctype="multipart/form-data">

        <input type="date" id="" name="tgl" required><br>
        <input type="text" id="" name="judul" required placeholder="Judul maksimal 25 karakter..."><br>
        <textarea id="isi" name="isi" required placeholder="Ketikan Sesuatu disini..."> </textarea><br>
    <select id="mood" name="mood">
        <option value="senang">&#x1F604;</option>
        <option value="sedih">&#x1F622; </option>
        <option value="marah">&#x1F621; </option>
        <option value="netral">&#x1F610; </option>
        <option value="takut">&#x1F628; </option>
        <option value="cemas">&#x1F630; </option>
        <option value="terkejut">&#x1F631; </option>
    </select><br><br>
<input type="file" id="image" name="image" style="display: none;">
        <input type="submit" value="Simpan">
    </form>
    </div>
</body>
</html>
