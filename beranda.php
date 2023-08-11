<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../beranda.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dasbor Pengguna</title>
</head>
<body>

<h2>Halo, <?php echo $username; ?>! Selamat datang di dasbor.</h2>

<a href="logout.php">Logout</a>

</body>
</html>
