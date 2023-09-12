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
    <title>Tambah Catatan</title>
    <link rel="icon" type="uploads/x-icon" href="../uploads/favicon1.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
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


        input[type="date"] {
            background-color: #EDF2FF;
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 50px;
            left: 150px; 
            width: 90px; 
            height: auto; 
            z-index: 999; 
        }

        input[type="text"] {
            background-color: #EDF2FF;
            border: 1px solid #fff;
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            position: absolute;
            top: 100px;
            left: 150px; 
            width: 250px; 
            height: auto; 
            z-index: 999; 
        }

        textarea#isi {
            background-color: #EDF2FF;
            width: 250px;
            padding: 50px;
            border: 0px solid #fff;
            border-radius: 5px;
            position: absolute;
            top: 140px;
            left: 500px; 
            width: 350px; 
            height: 200px;; 
            z-index: 999; 
        }

        select[name="mood"] {
            background-color: #EDF2FF;
            padding: 7px;
            font-size: 3em;
            border: 1px solid #ccc;
            border-radius: 20px;
            position: absolute;
            cursor: pointer;
            top: 165px;
            left: 150px; 
            width: 90px; 
            height: auto; 
            z-index: 999; 
        }

        .image {
            padding: 7px;
            border-radius: 10px;
            position: absolute;
            cursor: pointer;
            top: 230px;
            left: 150px; 
            width: 200px; 
            height: auto; 
            z-index: 999; 
        }

        input[type="submit"] {
            background-color: #A5CBD6;
            border: 1px solid #fff;
            color: #094264;;
            padding: 5px 25px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 375px;
            position: relative;
            left: 350px;
            z-index: 999; 
        }
</style>        
<body>
</body>

<div class="header">
    <img src="sya.png" alt="Logo" class="logo">
    <div class="header-text">
        <p>Diaryline</p>
    </div>
</div>
<div>
    <form action="prosesadd.php" method="post" enctype="multipart/form-data">

        <input type="date" id="" name="tgl" required><br>
        <input type="text" id="" name="judul" required placeholder="Judul.."><br>
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
    <label for="image">
    <img src="su.png" alt="Pilih Gambar" class="image">
</label>
<input type="file" id="image" name="image" style="display: none;">

        <input type="submit" value="Simpan">
    </form>
    </div>
</body>
</html>
