<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "diary");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tgl = $_POST['tgl'];

    // Lakukan validasi data jika diperlukan sebelum menyimpan

    // Proses unggah gambar jika ada gambar yang diunggah
    if ($_FILES['image']['error'] === 0) {
        // Tentukan lokasi penyimpanan gambar (misalnya di folder 'uploads')
        $target_dir = "uploads";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Pindahkan gambar ke lokasi penyimpanan
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Simpan data catatan harian dan lokasi gambar ke dalam tabel "diary"
            $query = "INSERT INTO catatan (judul,isi, tgl, image) VALUES ('$judul', '$isi','$tgl', '$target_file')";
            mysqli_query($koneksi, $query);
        } else {
            // Jika gagal mengunggah gambar, tampilkan pesan error
            echo "Gagal mengunggah gambar.";
        }
    } else {
        // Jika tidak ada gambar yang diunggah, simpan hanya data catatan harian ke dalam tabel "catatan"
        $query = "INSERT INTO catatan (judul, isi,tgl,image) VALUES ('$judul', '$isi','tgl','image')";
        mysqli_query($koneksi, $query);
    }

    // Redirect ke halaman catatan setelah berhasil menambahkan catatan harian
    header("Location: catatan.php");
    exit();
}
?>
