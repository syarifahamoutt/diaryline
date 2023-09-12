<!DOCTYPE html>
<html>
<head>
    <title>Tambah Quotes</title>
    <link rel="icon" type="uploads/x-icon" href="../uploads/favicon1.ico">
    <style>
        body {
            font-family: poppins; 
        }

        .content {
            width: 100px;
            left: 330px;
            padding: 150px;
            color: #094264;
            position: relative;
            background-image: url('see.png'); 
            border-radius: 15px;
            height: 180px;
        }



        input[type="date"] {
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            position: absolute;
            top: 40px;
            left: 40px; 
            width: 90px; 
            height: auto; 
            z-index: 999; 
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
            top: 130px;
            left: 60px; 
            width: 180px; 
            height: 180px;; 
            z-index: 999; 
        }

        input[type="submit"] {
            background-color: #A5CBD6;
            border: 1px solid #fff;
            color: #094264;
            padding: 5px 25px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 215px;
            position: relative;
            left: 115px;
            z-index: 999; 
        }
    </style>
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
