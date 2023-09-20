<?php
session_start();
$backgroundImage = "uploads/background.jpeg";
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
    <title>Detail Catatan Harian</title>
    <link rel="icon" type="uploads/x-icon" href="uploads/favicon1.ico">
    <link rel="stylesheet" type="text/css" href="style/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
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
                echo "<img src='data:image/jpeg;base64," . base64_encode($image) . "' alt='Gambar Catatan' class='image'>";
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
