<?php
session_start();
$backgroundImage = "me.jpeg";
if (isset($_SESSION['backgroundImage'])) {
    $backgroundImage = $_SESSION['backgroundImage'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="icon" type="uploads/x-icon" href="../uploads/favicon1.ico">
    <link rel="stylesheet" type="text/css" href="../style/login.css">
</head>
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