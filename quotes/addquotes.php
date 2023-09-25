<!DOCTYPE html>
<html>
<head>
    <title>Tambah Quotes</title>
    <link rel="icon" type="uploads/x-icon" href="../uploads/favicon1.ico">
    <link rel="stylesheet" type="text/css" href="../style/quotes.css">
</head>
<style>
            body {
            font-family: poppins; 
        }

        .content {
            width: 200px;
            left: 450px;
            padding: 150px;
            color: #094264;
            position: absolute;
            background-image: url('../uploads/background.jpeg'); 
            border-radius: 15px;
            height: 300px;
        }

        input[type="date"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #fff;
            position: absolute;
            top: 40px;
            left: 40px; 
            width: 120px; 
            height: auto; 
        }

        label[for="isi"] {
            display: block;
            margin-top: 40px;
        }

        textarea#isi {
            background-color: #EDF2FF;
            padding: 50px;
            border: 0px solid #fff;
            border-radius: 5px;
            position: absolute;
            font-size: 14px;
            top: 130px;
            left: 60px; 
            width: 280px; 
            height: 280px;; 
            z-index: 999; 
        }

        input[type="submit"] {
            background-color: #A5CBD6;
            border: 1px solid #fff;
            color: #094264;
            padding: 5px 25px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 235px;
            position: relative;
            left: 170px;
            z-index: 999; 
            font-size: 14px;
        }
</style>
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
