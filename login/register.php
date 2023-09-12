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
    <style>
  body {
    font-family: poppins;
    color: #094264;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url('me.jpeg'); 
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
    width: 25px; 
    height: auto; 
    z-index: 999; 
}

.header-text {
    font-size: 14px; 
    color: #358597; 
    font-weight: bold;
    position: absolute;
    top: 16px;
    left: 55px;
}

  .container {
    text-align: center;
    background-color: #EDF2FF;
    padding: 20px;
    border-radius: 25px;
    width: 280px;
    height: 430px;
  }

  .form-group {
    margin-bottom: 25px;
    margin: 3px;
    text-align: left;
  }
  
   h2 {
    margin-bottom: 25px;
    position: relative; 
  }

  h2::after {
    content: "";
    display: block;
    width: 280px;
    height: 1px;
    background-color: #094264;
    position: absolute;
    bottom: -8px 

  }

  .p{
    text-align: left;
    font-size: 10px;
    margin: 10px;
  }

	label {
    display: inline-block;
    font-weight: bold;
    margin-bottom: 10px;
  }

  input[type="text"],
  input[type="password"] {
    padding: 8px 67px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

 button {
    background-color: #A5CBD6;
    color: #fff;
    padding: 10px 100px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  .p3 a{
            text-decoration: none;
            color: #006DAB; 
        }

</style>
</head>
<body>
<div>
    <img src="sya.png" alt="Logo" class="logo">
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
