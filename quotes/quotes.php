<!-- quotes.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Quotes</title>
</head>
<body>
    <h1>Quotes</h1>

    <?php
    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "diary");
    echo date("l, d-M-Y");
    // Query untuk mendapatkan quotes terakhir dari tabel "quotes"
    $query = "SELECT isi FROM quotes ORDER BY idquotes DESC LIMIT 1";
    $result = mysqli_query($koneksi, $query);

    // Tampilkan quotes terakhir
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $isi = $row['isi'];
        

        echo "<blockquote>$isi</blockquote>";
    } else {
        echo "Belum ada quotes.";
    }
    ?>
    <div>
    <a href="addquotes.php"></i> <button> Tambah quotes</button></a>
    </div>
</body>
</html>
