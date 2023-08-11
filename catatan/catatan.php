<!-- list_catatan.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Catatan</title>
</head>
<body>
    <h1>Daftar Catatan</h1>
    <div>
    <a href="addcatatan.php"></i> <button> Tambah Catatan</button></a>
    </div>

    <?php
    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "diary");

    // Query untuk mendapatkan semua catatan dari database
    $query = "SELECT * FROM catatan";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $iddiary = $row['iddiary'];
            $tgl = $row['tgl'];
            $judul = $row['judul'];
            $isi = $row['isi'];
            $mood = $row['mood'];
            $image = $row['image'];

            // Tampilkan daftar catatan
            echo "<div>";
            echo "<h2>$judul</h2>";
            echo "<p>Tanggal: $tgl</p>";
            echo "<p>$isi</p>";
            echo "<p>Mood: $mood</p>";
            if (!empty($image)) {
                echo "<img src='uploads/$image' alt='Gambar Catatan'><br>";
            }
            echo "<p><a href='../detail.php?iddiary=$iddiary'>Detail</a> | <a href='editcatatan.php?iddiary=$iddiary'>Edit</a> | <a href='prosesdelete.php?iddiary=$iddiary'>Delete</a></p>";
            echo "</div>";
        }
    } else {
        echo "Belum ada catatan.";
    }
    ?>

</body>
</html>
