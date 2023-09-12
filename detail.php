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
    <title>Detail Catatan Harian</title>
    <link rel="icon" type="uploads/x-icon" href="uploads/favicon1.ico">
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

        .date {
            padding: 7px;
            position: absolute;
            top: 50px;
            left: 135px; 
            width: 90px; 
            height: auto; 
            z-index: 999; 
        }

        .judul {
            background-color: #EDF2FF;
            border: 1px solid #fff;
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            position: absolute;
            top: 100px;
            left: 155px; 
            width: 250px; 
            height: auto; 
            z-index: 999; 
        }

        .isi {
            background-color: #EDF2FF;
            width: 250px;
            padding: 50px;
            border: 0px solid #fff;
            border-radius: 5px;
            position: absolute;
            top: 140px;
            left: 450px; 
            right: 50px;
            width: auto; 
            height: auto;
            z-index: 999; 
        }

        select[name="newMood"] {
            background-color: #EDF2FF;
            padding: 7px;
            font-size: 3em;
            border: 1px solid #ccc;
            border-radius: 20px;
            position: absolute;
            top: 185px;
            left: 150px; 
            width: 100px; 
            height: auto; 
            z-index: 999; 
        }

        .image {
            padding: 7px;
            border-radius: 15px;
            position: absolute;
            top: 250px;
            left: 150px; 
            width: 250px; 
            height: auto; 
            z-index: 999;  
        }

        .link {
            background-color: #EDF2FF;
            border: 1px solid #fff;
            color: #094264;
            padding: 5px 25px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 550px;
            position: absolute;
            left: 100px;
            z-index: 999; 
        }

        .link {
            text-decoration: none; 
            color: #094264; 
        }

</style> 
<body>
    <?php
    $koneksi = mysqli_connect("localhost", "root","", "diary");

    function getDiaryDetail($koneksi, $iddiary) {
        $query = "SELECT * FROM catatan WHERE iddiary= $iddiary";
        $result = mysqli_query($koneksi, $query);
        return mysqli_fetch_assoc($result);
    }

    if (isset($_GET['iddiary'])) {
        $iddiary = $_GET['iddiary'];
        $diary_detail = getDiaryDetail($koneksi, $iddiary);

        if ($diary_detail) {
            $tgl = $diary_detail['tgl'];
            $judul = $diary_detail['judul'];
            $isi = $diary_detail['isi'];
            $mood = $diary_detail['mood'];
            $image = $diary_detail['image'];

            echo "<p class='date'>$tgl</p>";
            echo "<p class='judul'>$judul</p>";
            echo "<p class='isi'>$isi</p>";
            if (!empty($image)) {
                echo "<img src='uploads/$image' alt='Gambar Catatan' class='image'>";
            }
            echo "<a href='beranda.php' class='link'>Kembali ke catatan</a>";
        }else {
            echo "Catatan tidak ditemukan.";
        } 
        
    }else {
        echo "ID catatan tidak ditemukan.";
    }
        
    
    ?>

<div class="header">
    <img src="sya.png" alt="Logo" class="logo">
    <div class="header-text">
        <p>Diaryline</p>
    </div>
    <select id="newMood" name="newMood">
        <option value="senang" <?php if ($mood == "senang") echo "selected"; ?>>&#x1F604</option>
        <option value="sedih" <?php if ($mood == "sedih") echo "selected"; ?>> &#x1F622</option>
        <option value="marah" <?php if ($mood == "marah") echo "selected"; ?>> &#x1F621</option>
        <option value="netral" <?php if ($mood == "netral") echo "selected"; ?>> &#x1F610</option>
        <option value="takut" <?php if ($mood == "takut") echo "selected"; ?>> &#x1F628</option>
        <option value="cemas" <?php if ($mood == "cemas") echo "selected"; ?>> &#x1F630</option>
        <option value="terkejut" <?php if ($mood == "terkejut") echo "selected"; ?>> &#x1F631</option>
        </select><br>
</body>
</html>
