<!-- add_catatan.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Catatan</title>
</head>
<body>
    <h1>Tambah Catatan</h1>

    <form action="prosesadd.php" method="post" enctype="multipart/form-data">
        <label for="tgl">Tanggal:</label><br>
        <input type="date" id="tgl" name="tgl" required><br>

        <label for="judul">Judul:</label><br>
        <input type="text" id="judul" name="judul" required><br>

        <label for="isi">Isi:</label><br>
        <textarea id="isi" name="isi" rows="5" cols="50" required></textarea><br>
        <label for="mood">Mood:</label><br>
        <select id="mood" name="mood">
            <option value="senang">Senang</option>
            <option value="sedih">Sedih</option>
            <option value="marah">Marah</option>
            <option value="netral">Netral</option>
            <option value="takut">Takut</option>
            <option value="cemas">Cemas</option>
            <option value="terkejut">Terkejut</option>
        </select><br>


        <label for="image">Gambar:</label><br>
        <input type="file" id="image" name="image"><br>

        <input type="submit" value="Tambah Catatan">
    </form>

</body>
</html>
