<?php
session_start();
$backgroundImage = "uploads/background.jpeg";
if (isset($_GET['bg'])) {
    $backgroundImage = $_GET['bg'];
    
    $_SESSION['backgroundImage'] = $backgroundImage;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pengaturan</title>
    <link rel="icon" type="uploads/x-icon" href="uploads/favicon1.ico">
    <link rel="stylesheet" type="text/css" href="style/ganti.css"> 
</head>
<style>
            body {
            font-family: 'poppins'; 
            text-align:center;
            color: #094264;
            background-image: url("uploads/background.jpeg");  
            background-image: url("<?php echo $backgroundImage; ?>"); 
            transition: background-image 0.5s; 
        }
</style>
<body>
<div>
    <div class="p">
        <p>Pilih tema untuk diterapkan</p>
    </div>
    <div class="container">
        <div class="box1" onclick="changeBackground('uploads/background.jpeg')">
            <div class="checkmark">&#10003;</div>
        </div>
        <div class="box2" onclick="changeBackground('uploads/background2.jpeg')">
            <div class="checkmark">&#10003;</div>
        </div>
    </div>
    <a href='beranda.php' class='link'>Kembali ke Beranda</a>

    <script>
    function changeBackground(imageUrl) {
        document.body.style.backgroundImage = `url(${imageUrl})`;
         document.querySelectorAll(".container > div").forEach(function(box) {
            box.classList.remove("selected");
        });
        event.currentTarget.classList.add("selected");
        window.location.href = `gantibackgrond.php?bg=${imageUrl}`;
    }
    </script>
</script>
</body>
</html>