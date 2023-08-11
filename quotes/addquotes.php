<!-- add_quote.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Quotes Baru</title>
</head>
<body>
    <h1>Tambah Quotes Baru</h1>
    <div>
            <label>Tanggal</label>
            <label> : </label>
            <input type="date" name="tgl">
        </div>

    <form action="prosesquotes.php" method="post">
        <label for="isi">Tambah Quotes:</label><br>
        <textarea id="isi" name="isi" rows="5" cols="50" required></textarea><br>
        <input type="submit" value="Tambah Quotes">
    </form>

</body>
</html>
