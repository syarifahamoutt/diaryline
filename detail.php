<!-- detail.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detail Catatan Harian</title>
</head>
<body>
    <?php
    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root","", "diary");

    // Fungsi untuk mendapatkan detail catatan berdasarkan ID
    function getDiaryDetail($koneksi, $iddiary) {
        $query = "SELECT * FROM catatan WHERE iddiary= $iddiary";
        $result = mysqli_query($koneksi, $query);
        return mysqli_fetch_assoc($result);
    }

    // Mendapatkan ID catatan dari URL (misalnya: detail.php?id=1)
    if (isset($_GET['iddiary'])) {
        $iddiary = $_GET['iddiary'];

        // Panggil fungsi getDiaryDetail untuk mendapatkan data catatan berdasarkan ID
        $diary_detail = getDiaryDetail($koneksi, $iddiary);

        if ($diary_detail) {
            // Data berhasil ditemukan, tampilkan detail catatan
            $tgl = $diary_detail['tgl'];
            $judul = $diary_detail['judul'];
            $isi = $diary_detail['isi'];
            $mood = $diary_detail['mood'];
            $image = $diary_detail['image'];

            // Tampilkan informasi catatan harian
            echo "<p>Tanggal: $tgl</p>";
            echo "<p>Judul: $judul</p>";
            echo "<p>Isi Catatan: $isi</p>";
            echo "<p>Mood: $mood</p>";

            if (!empty($image)) {
                echo "<img src='uploads/$image' alt='Gambar Catatan'>";
            }
            // Tambahkan tautan kembali ke dashboard
            echo "<br><a href='catatan/catatan.php'>Kembali ke catatan</a>";
        }else {
            echo "Catatan tidak ditemukan.";
        } 
        
    }else {
        echo "ID catatan tidak ditemukan.";
    }
        
    
    ?>

</body>
</html>
