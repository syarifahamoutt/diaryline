
<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "diary");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl = $_POST['tgl'];
    $isi = $_POST['isi'];

    
    // Lakukan validasi data jika diperlukan sebelum menyimpan

    // Query untuk menyimpan quotes baru ke dalam tabel "quotes"
    $query = "INSERT INTO quotes (tgl,isi) VALUES ('$tgl','$isi')";
    mysqli_query($koneksi, $query);

    // Redirect kembali ke halaman quotes setelah berhasil menambahkan quotes
    header("Location: quotes.php");
    exit();
}
?>
