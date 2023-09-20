<?php
session_start();
$backgroundImage = "../uploads/background.jpeg";

if (isset($_SESSION['backgroundImage'])) {
    $backgroundImage = $_SESSION['backgroundImage'];
}

$koneksi = mysqli_connect("localhost", "root", "", "diary");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $iddiary = $_POST['iddiary'];
    $tgl = $_POST['tgl'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $newMood = $_POST['newMood'];
    $newImageName = null;

    $queryUpdateCatatan = "UPDATE catatan SET tgl = '$tgl', judul = '$judul', isi = '$isi', mood = '$newMood' WHERE iddiary = $iddiary";
    mysqli_query($koneksi, $queryUpdateCatatan);
 
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
<!DOCTYPE html>
<html>
<head>
    <title>Edit Catatan</title>
    <link rel="icon" type="uploads/x-icon" href="../uploads/favicon1.ico">
    <link rel="stylesheet" type="text/css" href="../style/edit.css">
</head> 
<body>
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
    <img src="../uploads/logo.png" alt="Logo" class="logo">
    <div class="header-text">
        <p>Diaryline</p>
    </div>

</body>
</html>