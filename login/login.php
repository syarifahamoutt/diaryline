<?php
session_start();
$backgroundImage = "../uploads/background.jpeg";
if (isset($_GET['bg'])) {
    $backgroundImage = $_GET['bg'];
    
    $_SESSION['backgroundImage'] = $backgroundImage;
}

if (isset($_SESSION['backgroundImage'])) {
    $backgroundImage = $_SESSION['backgroundImage'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="icon" type="uploads/x-icon" href="../uploads/favicon1.ico">
    <!-- <link rel="stylesheet" type="text/css" href="../style/login.css"> -->
</head>
<style>
            body {
            font-family: 'poppins';
            color: #094264;
            font-size: 16px;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('../uploads/background.jpeg'); 
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
            background-image: url("<?php echo $backgroundImage; ?>"); 
            transition: background-image 0.5s; 
        }
        

        .logo {
            position: absolute;
            top: 15px;
            left: 15px; 
            width: 35px; 
            height: auto; 
            z-index: 999; 
        }

        .header-text {
            font-size: 20px; 
            color: #358597; 
            font-weight: bold;
            position: absolute;
            top: 8px;
            padding: 10px;
            left: 55px;
        }
        .container {
            text-align: center;
            background-color: #EDF2FF;
            padding: 10px;
            border-radius: 25px;
            width: 380px;
            height: 570px;
        }
        .form-group {
            position: relative;
            top: 50px;
            text-align: left;
            margin: 10px;
        }
        
        h2 {
            margin-bottom: 35px;
            position: relative; 
        }

        h2::after {
            content: "";
            display: block;
            width: 380px;
            height: 1px;
            background-color: #094264;
            position: absolute;
            bottom: -8px 
        }
        
        .p{
            text-align: left;
            font-size: 14px;
            margin-top: 70px;
            position: absolute;
        }

            label {
            display: inline-block;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            position: relative;
            font-size: 16px;
            padding: 8px 60px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #A5CBD6;
            color: #fff;
            font-size: 16px;
            padding: 10px 100px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            top: 180px;
            position: relative;
        }

        .p3 a{
            position: relative;
            top: 200px;
            font-size: 16px;
            text-decoration: none; 
            color: #006DAB;
        }
</style>
<body>


    <!-- <?php
    if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
        header("location:../beranda.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $koneksi = mysqli_connect("localhost", "root", "", "diary");

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT iduser, username, password FROM users WHERE username = '$username'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            if (password_verify($password, $row['password'])) {
                $_SESSION["login"] = true;
                $_SESSION["iduser"] = $row['iduser'];
                $_SESSION["username"] = $row['username'];
                header("location:../beranda.php");
                exit;
            } else {
                echo "<p>Password salah</p>";
            }
        } else {
            echo "Username tidak ditemukan.";
        }
    }
    ?> -->
<div class="header">
    <img src="../uploads/logo.png" alt="Logo" class="logo">
    <div class="header-text">
        <p>Diaryline</p>
    </div>
</div>
<div class="container">
    <h2> Login</h2>
      <p>Hallo, masukan detail anda untuk <br>masuk ke akun anda</p>    
    <form action="login.php" method="post">
      <div class="form-group">
        <label for="nama">Nama pengguna:</label>
        <input type="text" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Kata sandi:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="p">
          <p>Mengalami masalah saat masuk?</p><br><br>   </div>
      <button type="submit"><a href="../beranda.php">Login</button>

    </form>
<div class="p3">
    <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
  </div>
</body>
</html>