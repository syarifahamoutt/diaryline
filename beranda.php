<?php
session_start();
$backgroundImage = "uploads/background.jpeg";
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
    <title>Beranda</title>
    <link rel="icon" type="uploads/x-icon" href="uploads/favicon1.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style/beranda.css">
</head>
<body>
<div>
    <img src="sya.png" alt="Logo" class="logo">
    <div class="header-text">
        <p>Diaryline</p>
    </div>
<div class="sidebar">
<img class="profile-picture" src="nye.jpg" alt="Foto Profil">
<div class="icon-and-text">
    <a href="beranda.php" class="<?php echo $page == 'beranda' ? 'active' : ''; ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
    </svg>
    Beranda</a>
    <a href="kalender.php">
    <i style='font-size:18px' class='fas'>&#xf133;</i>
    Kalender</a>
    <a href="pengaturan.php">
    <i style="font-size:18px" class="fa">&#xf013;</i>
    Pengaturan</a><br><br><br><br>
    <a href="login/logout.php">
    <i style='font-size:18px' class='fas'>&#xf2f5;</i>
    Logout</a>
</div>
</div >  
    <div class="content">
        <div class="gambar">
        <img src="uploads/visual.png" alt="gambar" width="400px">
    </div>
    <div class="quote-box">
    <a href="addquotes.php/../quotes/addquotes.php">
          <i class="fas fa-plus-circle"></i></a> <br><br>
          <?php
            $koneksi = mysqli_connect("localhost", "root", "", "diary");
            echo "<p class='date'>" . date("d-m-Y") . "</p>";
            $query = "SELECT isi FROM quotes ORDER BY idquotes DESC LIMIT 1";
            $result = mysqli_query($koneksi, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $isi = $row['isi'];
                echo "<blockquote>$isi</blockquote>";
            } else {
                echo "Belum ada quotes.";
            }
            ?>
    </div>

    <div class="add-rectangle">
    <div class="search-box">
        <form method="GET" action="">
            <input type="text" name="cari" placeholder="Cari judul catatan anda..." value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; }  ?>">
            <button><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="tambah">
        <a href="catatan/addcatatan.php">
        <button><i class='fas fa-plus-circle' style='font-size:25px'></i>Tambah catatan </button></a>
    </div>
        <h3>Catatanku</h3>
    <div class="box">
    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "diary");
    $query = "SELECT * FROM catatan";
    $result = mysqli_query($koneksi, $query);

    if(isset($_GET['cari'])){
        $keyword = $_GET['cari'];
        $query = "SELECT * FROM catatan WHERE judul LIKE '%$keyword%'";
    } else {
        $query = "SELECT * FROM catatan";
    }
    
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $iddiary = $row['iddiary'];
            $judul = $row['judul'];
            $mood = $row['mood'];

            echo "<div class='entry'>";
            echo "<span class='mood-box'>";
            if ($mood == "senang") {
                echo "&#x1F604"; 
                } elseif ($mood == "sedih") {
                    echo "&#x1F622";
                } elseif ($mood == "marah") {
                    echo "&#x1F621";
                } elseif ($mood == "netral") {
                    echo "&#x1F610";
                } elseif ($mood == "takut") {
                    echo "&#x1F628";
                } elseif ($mood == "cemas") {
                    echo "&#x1F630";
                } elseif ($mood == "terkejut") {
                    echo "&#x1F631";
                }
            echo "</span>";
            echo "<h2 class='title'>";
            echo "$judul";
            echo "</h2>";
            echo "<div class='action-icons'>";
            echo "<a href='detail.php?iddiary=$iddiary' style='text-decoration: none; margin-right: 35px;'>";
            echo "<i class='fa fa-eye' style='color: #4E93B1; font-size: 15px; padding-left:250px; margin: -5px'></i></a>";
            echo "<a href='catatan/editcatatan.php?iddiary=$iddiary' style='text-decoration: none; margin-right: 35px;'>";
            echo "<i class='fa fa-edit' style='color: #4E93B1; font-size: 15px;'></i></a>";
            echo "<a href='catatan/prosesdelete.php?iddiary=$iddiary' onclick='konfirmasiHapus($iddiary)' style='text-decoration: none;'>";
            echo "<i class='fa fa-trash' style='color: #4E93B1; font-size: 15px;'></i></a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "Belum ada catatan.";
    }
    ?>
    <br>
    </div>   
    </div>

     
</div>

</body>
</html>



