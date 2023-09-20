<!DOCTYPE html>
<html>
<head>
    <title>Tambah Quotes</title>
    <link rel="icon" type="uploads/x-icon" href="../uploads/favicon1.ico">
    <link rel="stylesheet" type="text/css" href="../style/quotes.css">
</head>
<body>
    <div class="content">
    <div>
            <input type="date" name="tgl">
        </div>

        <form action="prosesquotes.php" method="post">
            <label for="isi"></label><br>
            <textarea id="isi" name="isi" rows="5" cols="50" required placeholder="Ketikan sesuatu disini..."></textarea><br>
            <input type="submit" value="Simpan">
        </form>
    </div>
</body>
</html>
