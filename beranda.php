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
    <link rel="stylesheet" type="text/css" href="style/beranda.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
            body {
            font-family: 'poppins'; 
            color: #094264;
            background-image: url("uploads/background.jpeg");  
            background-image: url("<?php echo $backgroundImage; ?>"); 
            transition: background-image 0.5s; 
        }
                
        .sidebar {
            width: 200px;
            position: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 100px;
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

        .profile-picture {
            width: 150px;
            height: 150px;
            margin-right: -100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .content {
            margin-left: 300px;
            width: 550px;
            padding: 250px;
            background-color: #D9D9D9;
            color: #094264;
            position: absolute;
            background-image: url('uploads/sidebar.png'); 
            border-radius: 45px 0px 0px 45px;
            height: 100px;
        }

        .sidebar a {
            color: #094264;
            font-size: 18px;
            text-decoration: none;
            display: block;
            padding: 25px;
            text-align: center;
            margin-right: -90px;

        }

        .sidebar a:hover {
            background-color: #4E93B1;      
            white-space: nowrap; 
            overflow: hidden; 
            text-overflow: ellipsis; 
        }

        .quote-box {
        padding: 55px;
        font-size: 10px;
        background-color: #EDF2FF;
        position: absolute;
        top: 20px;
        height: 125px;
        width: 125px;
        left: 100px;
        border-radius: 25px;
        margin: 10px;
        text-align: center;
        }

        .date {
        margin-top: -50px;
        font-size: 16px;
        margin-right: 40px;
        }

        .quote-box i {
        font-size: 22px;
        position: absolute;
        top: 25px;
        right: 15px;
        margin-right:5px;

        }

        blockquote {
        position: absolute;
        align-items: center;
        font-size: 16px;
        top: 65px;
        left: -20px;
        right: -20px;
        }

        .gambar {
        position: absolute;
        top: -10px;
        left: 420px; 
        }

        .search-box button {
        position: absolute;
        background-color: #EDF2FF;
        color: #094264;
        border: 1px solid #ccc;
        border-radius: 5px 0px 0px 5px;
        padding: 10px 20px;
        cursor: pointer;
        top: 20px;
        left: 20px; 
        width: 50px; 
        height: 48px; 
        font-size: 14px;
        }

        .search-box input[type="text"] {
        background-color: #EDF2FF;
        padding: 15px;
        width: 330px;
        border: 1px solid #ccc;
        border-radius: 0px 5px 5px 0px;
        position: absolute;
        top: 20px;
        left: 60px; 
        font-size: 14px;
        }

        .sidebar a,
        .tambah a {
        text-decoration: none; 
        border-radius: 10px;
        color: #094264;
        }

        .sidebar a:hover,
        .tambah a:hover {
        text-decoration: none; 
        background-color: #62abca;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        }

        .tambah {
        position: absolute;
        bottom: 233px; 
        left: 500px;
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 10px;
        }

        .tambah button {
        background-color: #EDF2FF; 
        color: #094264; 
        text-align: center;
        border: none;
        border-radius: 10px; 
        padding: 8px 15px;
        cursor: pointer;
        text-decoration: none; 
        display: flex; 
        align-items: center; 
        font-size: 14px;
        }

        .tambah button:hover {
        background-color: #62abca;
        }

        .add-rectangle {
        position: absolute;
        left: 100px;
        width: 850px; 
        height: 300px; 
        background-color: #EDF2FF;
        display: flex;
        justify-content: center;
        align-items: center;
        bottom: 20px;
        border-radius: 15px;
        }

        .add-rectangle {
        overflow: auto;
        }

        h3 {
        margin-bottom: 130px;
        position: absolute; 
        left: 20px;
        font-size: 18px;
        }   

        .box {
        background-color: #EDF2FF;
        height: 50px;
        width: 750px;
        font-size: 14px;
        position: absolute;
        top: 120px;
        left: 25px; 
        }

        .entry {
        display: flex;
        border-top: 1px solid #99B1C6; 
        border-bottom: 1px solid #99B1C6;
        justify-content: space-between;
        margin-bottom: 15px;
        }

        .title {
        font-size: 18px;
        margin-left: 70px; 
        display: flex;
        align-items: center;
        }

        .mood-box {
            font-size: 3em;
            display: flex;
            justify-content: flex-start; 
            align-items: center;
            margin-top: 3px;
            margin-right: 10px;
            margin-bottom: 8px;
        }

        .action-icons {
            display: flex;
            align-items: center;
        }



</style>
<body>
<div>
    <img src="uploads/logo.png" alt="Logo" class="logo">
    <div class="header-text">
        <p>Diaryline</p>
    </div>
<div class="sidebar">
<img class="profile-picture" src="uploads/leo.jpeg" alt="Foto Profil">
<div class="icon-and-text">
    <a href="beranda.php" class="<?php echo $page == 'beranda' ? 'active' : ''; ?>">
    <i style="font-size:25px; " class="fa">&#xf015;</i>
    Beranda</a>
    <a href="kalender/calender.php">
    <i style='font-size:23px' class='fas'>&#xf133;</i>
    Kalender</a>
    <a href="pengaturan.php">
    <i style="font-size:25px" class="fa">&#xf013;</i>
    Pengaturan</a><br><br> 
    <a href="login/logout.php">
    <i style='font-size:25px' class='fas'>&#xf2f5;</i>
    Logout</a>
</div>
</div >  
    <div class="content">
        <div class="gambar">
        <img src="uploads/visual.png" alt="gambar" width="480px">
    </div>
    <div class="quote-box">
    <a href="addquotes.php/../quotes/addquotes.php">
          <i class='fa fa-edit'></i></a> <br><br>
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
            ?></div>

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
    $query = "SELECT * FROM catatan ORDER BY iddiary DESC";
    $result = mysqli_query($koneksi, $query);
    if(isset($_GET['cari'])){
        $keyword = $_GET['cari'];
        $query = "SELECT * FROM catatan WHERE judul LIKE '%$keyword%'";
    } else {
        $query = "SELECT * FROM catatan ORDER BY iddiary DESC";
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
            echo "<i class='fa fa-eye' style='color: #4E93B1; font-size: 20px; padding-left:250px; margin: -5px'></i></a>";
            echo "<a href='catatan/editcatatan.php?iddiary=$iddiary' style='text-decoration: none; margin-right: 35px;'>";
            echo "<i class='fa fa-edit' style='color: #4E93B1; font-size: 20px;'></i></a>";
            echo "<a href='catatan/prosesdelete.php?iddiary=$iddiary' onclick='konfirmasiHapus($iddiary)' style='text-decoration: none;'>";
            echo "<i class='fa fa-trash' style='color: #4E93B1; font-size: 20px;'></i></a>";
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



