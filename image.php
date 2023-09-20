<?php
$koneksi = mysqli_connect("localhost", "root", "", "diary");

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Ambil data catatan dari tabel
$query = "SELECT judul, isi, tgl, image FROM catatan";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Error: " . mysqli_error($koneksi));
}

// Loop melalui hasil query dan tampilkan gambar
while ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>" . $row['judul'] . "</h2>";
    echo "<p>" . $row['isi'] . "</p>";
    echo "<p>Tanggal: " . $row['tgl'] . "</p>";

    // Menampilkan gambar
    if (!empty($row['image'])) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" />';
    }
}

mysqli_close($koneksi);
?>
