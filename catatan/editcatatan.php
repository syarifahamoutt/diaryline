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
    <title>Edit Catatan</title>
    <link rel="icon" type="uploads/x-icon" href="../uploads/favicon1.ico">
    
</head>
<style>
        body {
            font-family:  'Poppins'; 
            text-align:center;
            color: #094264;
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
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            position: absolute;
            cursor: pointer;
            top: 70px;
            left: 145px; 
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
            top: 120px;
            left: 146px; 
            width: 250px; 
            height: auto; 
            z-index: 999; 
        }

        textarea[name="isi"] {
            background-color: #EDF2FF;
            width: 250px;
            padding: 50px;
            border: 0px solid #fff;
            border-radius: 5px;
            position: absolute;
            top: 140px;
            left: 500px; 
            right: 50px;
            width: 400px; 
            height: 230px;
            z-index: 999; 
        }

        select[name="newMood"] {
            background-color: #EDF2FF;
            padding: 7px;
            font-size: 3em;
            border: 1px solid #ccc;
            border-radius: 20px;
            position: absolute;
            cursor: pointer;
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

        input[type="file"] {
            padding: 7px;
            border-radius: 10px;
            position: absolute;
            cursor: pointer;
            top: 300px;
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
            margin-top: 400px;
            position: absolute;
            left: 900px;
            z-index: 999; 
        }

</style> 
<body>
    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "diary");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $iddiary = $_POST['iddiary'];
        $newMood = $_POST['newMood'];
        $newImageName = null;

        // Update mood pada catatan
        $queryUpdateMood = "UPDATE catatan SET mood = '$newMood' WHERE iddiary = $iddiary";
        mysqli_query($koneksi, $queryUpdateMood);

        // Upload gambar baru 
        if ($_FILES['new_image']['size'] > 0) {
            $newImageName = $_FILES['new_image']['name'];
            $newImageTmp = $_FILES['new_image']['tmp_name'];
            move_uploaded_file($newImageTmp, "uploads/" . $newImageName);

            $queryUpdateImage = "UPDATE catatan SET image = '$newImageName' WHERE iddiary = $iddiary";
            mysqli_query($koneksi, $queryUpdateImage);
        }   

        header("Location: ../beranda.php");
        exit();
    }

    if (isset($_GET['iddiary'])) {
        $iddiary = $_GET['iddiary'];

        // Ambil data catatan
        $queryGetCatatan = "SELECT * FROM catatan WHERE iddiary = $iddiary";
        $result = mysqli_query($koneksi, $queryGetCatatan);
        $row = mysqli_fetch_assoc($result);

        $tgl = $row['tgl'];
        $judul = $row['judul'];
        $isi = $row['isi'];
        $mood = $row['mood'];
        $image = $row['image'];
    }
    ?>

    <form action="editcatatan.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="iddiary" value="<?php echo $iddiary; ?>">
        <input type="date" name="tgl" value="<?php echo $tgl; ?>"><br>
        <input type="text" name="judul" value="<?php echo $judul; ?>"><br>
        <textarea name="isi" rows="5" cols="50"><?php echo $isi; ?></textarea><br>
        <select id="newMood" name="newMood">
        <option value="senang" <?php if ($mood == "senang") echo "selected"; ?>>&#x1F604</option>
        <option value="sedih" <?php if ($mood == "sedih") echo "selected"; ?>> &#x1F622</option>
        <option value="marah" <?php if ($mood == "marah") echo "selected"; ?>> &#x1F621</option>
        <option value="netral" <?php if ($mood == "netral") echo "selected"; ?>> &#x1F610</option>
        <option value="takut" <?php if ($mood == "takut") echo "selected"; ?>> &#x1F628</option>
        <option value="cemas" <?php if ($mood == "cemas") echo "selected"; ?>> &#x1F630</option>
        <option value="terkejut" <?php if ($mood == "terkejut") echo "selected"; ?>> &#x1F631</option>
        </select><br>

        <?php
        if (!empty($image)) {
            echo "<img src='uploads/$image' alt='Gambar' class='image'><br>";
        }
        ?>
        <input type="file" name="new_image"><br>

        <input type="submit" value="Simpan">
    </form>
    <div class="header">
    <img src="sya.png" alt="Logo" class="logo">
    <div class="header-text">
        <p>Diaryline</p>
    </div>

</body>
</html>
