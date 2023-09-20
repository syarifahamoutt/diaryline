<?php
include('koneksi.php');
$registrationMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $password_confirm = $_POST['password_confirm'];

  $password_confirm_hashed = password_hash($password_confirm, PASSWORD_DEFAULT);

  if (password_verify($password_confirm, $password_confirm_hashed)) {
      $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

      if (mysqli_query($conn, $query)) {
          $registrationMessage = "Registrasi berhasil. Silakan <a href='login.php'>login</a>.";
      } else {
          $registrationMessage = "Terjadi masalah saat registrasi.";
      }
  } else {
      $registrationMessage = "Konfirmasi kata sandi tidak cocok.";
  }
}
?>
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
    <title>Registrasi</title>
    <link rel="icon" type="uploads/x-icon" href="../uploads/favicon1.ico">
    <link rel="stylesheet" type="text/css" href="../style/register.css">
</head>
<body>
<div>
    <img src="../uploads/logo.png" alt="Logo" class="logo">
    <div class="header-text">
        <p>Diaryline</p>
    </div>
</div>
<div class="container">
    <h2> Registrasi</h2>
    <p>Hallo, masukan data anda untuk <br>pembuatan akun</p>    
    <form action="register.php" method="post">
      <div class="form-group">
        <label for="nama">Nama Pengguna:</label>
        <input type="text" name="username" required>
        <label for="password">Kata Sandi:</label>
        <input type="password" id="password" name="password" required>
            <label for="password_confirm">Konfirmasi Kata Sandi:</label>
            <input type="password" id="password_confirm" name="password_confirm" required>
        </div>
        <div  class="p">
        <p>Mengalami masalah saat registrasi?</p></div><br>
      <button type="submit">registrasi</button>
    </form>
    <div class="p3">
    <p>Sudah punya akun? <a href="login.php">Masuk disini</a></p>
  </div>
    <?php echo $registrationMessage; ?>
</body>
</html>
