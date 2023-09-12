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
    <style>
  body {
    font-family: 'poppins';
    font-size: 13px;
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
    padding: 10px;
    border-radius: 25px;
    width: 280px;
    height: 400px;
  }

  .form-group {
    margin-bottom: 15px;
    text-align: left;
    margin: 10px;
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
    text-align: center;
  }

  input[type="text"],
  input[type="password"] {
    padding: 8px 60px;
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


    <?php
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
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
                $_SESSION["loggedin"] = true;
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
    ?>
<div class="header">
    <img src="sya.png" alt="Logo" class="logo">
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
      <button type="submit">Login</button>

    </form>
<div class="p3">
    <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
  </div>
</body>
</html>