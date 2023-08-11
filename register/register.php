<!-- register.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "diary");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Hash password sebelum disimpan ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk menambahkan user baru ke dalam database
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        if (mysqli_query($koneksi, $query)) {
            echo "Pendaftaran berhasil. Silakan <a href='../login/login.php'>login</a>.";
        } else {
            echo "Terjadi kesalahan. Silakan coba lagi.";
        }
    }
    ?>

    <form action="register.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Register">
    </form>

</body>
</html>
