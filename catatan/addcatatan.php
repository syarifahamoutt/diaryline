<?php
session_start();
$backgroundImage = "../uploads/background.jpeg";
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
<body>
</body>

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
    <label for="image">
    <img src="../uploads/gambar.png" alt="Pilih Gambar" class="image">
</label>
<input type="file" id="image" name="image" style="display: none;">
        <input type="submit" value="Simpan">
    </form>
    </div>
</body>
</html>
