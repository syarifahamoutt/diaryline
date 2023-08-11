<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php
    session_start();

    // Cek jika pengguna sudah login, maka arahkan ke halaman beranda
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location:../beranda.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $koneksi = mysqli_connect("localhost", "root", "", "diary");

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query untuk mengambil data user dari database
        $query = "SELECT iduser, username, password FROM users WHERE username = '$username'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            if (password_verify($password, $row['password'])) {
                // Jika username dan password cocok, buat session dan arahkan ke halaman beranda
                $_SESSION["loggedin"] = true;
                $_SESSION["iduser"] = $row['iduser'];
                $_SESSION["username"] = $row['username'];
                header("location:beranda.php");
            } else {
                echo "Password salah.";
            }
        } else {
            echo "Username tidak ditemukan.";
        }
    }
    ?>

    <form action="beranda.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>

</body>
</html>
