<!-- edit_catatan.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Catatan</title>
</head>
<body>
    <h1>Edit Catatan</h1>

    <?php
    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "diary");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $iddiary = $_POST['iddiary'];
        $newMood = $_POST['newMood'];

        $query = "UPDATE catatan SET mood = '$newMood' WHERE iddiary = $iddiary";
        mysqli_query($koneksi, $query);

        header("Location:catatan.php");
        exit();
    }
    

    // Periksa apakah ID catatan dikirim melalui parameter GET
    if (isset($_GET['iddiary'])) {
        $iddiary = $_GET['iddiary'];

        // Query untuk mendapatkan data catatan berdasarkan ID
        $query = "SELECT * FROM catatan WHERE iddiary = $iddiary";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $tgl = $row['tgl'];
            $judul = $row['judul'];
            $isi = $row['isi'];
            $image = $row['image'];

            // Tampilkan form untuk mengedit catatan
            echo "<form action='prosesedit.php' method='post'>";
            echo "<input type='hidden' name='iddiary' value='$iddiary'>";
            echo "Tanggal: <input type='tgl' name='tgl' value='$tgl'><br>";
            echo "Judul: <input type='text' name='judul' value='$judul'><br>";           
            echo "Isi Catatan: <textarea name='isi' rows='5' cols='50'>$isi</textarea><br>";
            // Tampilkan gambar catatan saat ini (jika ada)
            if (!empty($image)) {
                echo "Gambar saat ini: <br>";
                echo "<img src='uploads/$image' alt='Gambar Catatan'><br>";
            }

            echo "Upload gambar baru: <input type='file' name='new_image'><br>";
            echo "</form>";
        } else {
            echo "Catatan tidak ditemukan.";
        }
    } else {
        echo "ID catatan tidak ditemukan.";
    }
    ?>

    <form action="editcatatan.php" method="post">
        <input type="hidden" name="iddiary" value="<?php echo $_GET['iddiary']; ?>">
        <label for="newMood">Pilih Mood Baru:</label><br>
        <select id="newMood" name="newMood">
            <option value="senang">Senang</option>
            <option value="sedih">Sedih</option>
            <option value="marah">Marah</option>
            <option value="netral">Netral</option>
            <option value="takut">Takut</option>
            <option value="cemas">Cemas</option>
            <option value="terkejut">Terkejut</option>
        </select><br>
        <br>     
        <input type="submit" value="Simpan">
    </form>

</body>
</html>
