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
    <title>Beranda</title>
    <link rel="icon" type="uploads/x-icon" href="uploads/favicon1.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>

        body {
            font-family:  'Poppins';
            color: #094264;
            margin: 0;
            padding: 0;
            display: flex;
            background-image: url("<?php echo $backgroundImage; ?>"); 
            transition: background-image 0.5s; 
        }

        .sidebar {
            width: 250px;
            height: 100%;
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

        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        
        .content {
            margin-left: 230px;
            width: 350px;
            padding: 248px;
            background-color: #D9D9D9;
            color: #094264;
            position: relative;
            background-image: url('sy.png'); 
            border-radius: 45px 0px 0px 45px;
            height: 0px;
        }
        
        .sidebar a {
            color: #094264;
            text-decoration: none;
            display: block;
            padding: 15px;
            margin-right: 10px;

        }
        
        .sidebar a:hover {
            background-color: #4E93B1;      
            white-space: nowrap; 
            overflow: hidden; 
            text-overflow: ellipsis; 
        }

        .quote-box {
        border: 1px solid #ccc;
        padding: 50px;
        background-color: #EDF2FF;
        position: absolute;
        top: 20px;
        height: 70px;
        width: 70px;
        left: 60px;
        border-radius: 25px;
        margin: 10px;
        }

        .p{
        font-size:10px;
        margin: -20px;
        }
		
        .quote-box i {
        font-size:29px;
        position: absolute;
        top: 15px;
        right: 10px;
        margin-right:5px;
        background-color:094264;
         }

        blockquote {
        position: absolute;
        font-size: 12px;
        top: 20px;
        left: -20px;
        }

        .gambar {
        position: absolute;
        top: 0px;
        left: 330px; 
        }

        .search-box button {
        position: absolute;
        background-color: #EDF2FF;
        color: #094264;
        border: 1px solid #ccc;
        border-radius: 5px 0px 0px 5px;
        padding: 10px 20px;
        cursor: pointer;
        top: 225px;
        left: 40px; 
        width: 20px; 
        height: auto; 

        }

        .search-box input[type="text"] {
        background-color: #EDF2FF;
        padding: 10px;
        width: 280px;
        border: 1px solid #ccc;
        border-radius: 0px 5px 5px 0px;
        position: absolute;
        top: 225px;
        left: 81px; 
        }

        .sidebar a,
        .tambah a {
        text-decoration: none; 
        color: #094264;
        }

        .sidebar a:hover,
        .tambah a:hover {
        text-decoration: none; 
        background-color: #4E93B1;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        }

        .tambah {
        position: absolute;
        bottom: 237px; 
        left: 450px;
        display: flex;
        align-items: center;
        }

        .tambah button {
        background-color: #EDF2FF; 
        color: #094264; 
        text-align: center;
        border: none;
        border-radius: 5px; 
        padding: 5px 15px;
        cursor: pointer;
        text-decoration: none; 
        display: flex; 
        align-items: center; 
        }

        .tambah button:hover {
        background-color: #4E93B1;
        }
        
        .sidebar-calendar {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f5f5f5;
        color: black;
        padding: 10px;
        }
        
        .add-rectangle {
        position: absolute;
        left: 40px;
        width: 740px; 
        height: 200px; 
        background-color: #EDF2FF;
        display: flex;
        justify-content: center;
        align-items: center;
        bottom: 20px;
        border-radius: 15px;
        }

        .add-rectangle p{
        font-size: 20px;
        font-weight: bold;
        top: 15px;
        left: 40px;
        }

        .add-rectangle {
        overflow: auto;
        }
        
        h3 {
        margin-bottom: 170px;
        position: relative; 
        left:-300px;
        }   

        .box {
        background-color: #EDF2FF;
        padding: 10px;
        height: 20px;
        width: 620px;
        font-size: 15px;
        border-top: 1px solid #99B1C6; 
        border-bottom: 1px solid #99B1C6;
        position: absolute;
        top: 50px;
        left: 25px; 
        }

        select[id="neMood"] {
        background-color: #EDF2FF;
        padding: 7px;
        font-size: 3em;
        border: 1px solid #ccc;
        border-radius: 20px;
        position: absolute;
        cursor: pointer;
        top: 165px;
        left: 150px; 
        width: 90px; 
        height: auto; 
        z-index: 999; 
        }

    </style>
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
    <a href="#">
    <i style='font-size:18px' class='fas'>&#xf2f5;</i>
    Logout</a>
</div>
</div >  
    <div class="content">
        <div class="gambar">
        <img src="ny.png" alt="gambar" width="400px">
    </div>
    <div class="quote-box">
    <a href="addquotes.php/../quotes/addquotes.php">
          <i class="fas fa-plus-circle"></i></a> <br><br>
          <?php
            $koneksi = mysqli_connect("localhost", "root", "", "diary");
            echo date("d-m-Y");
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
    <div class="search-box">
        <input type="text" placeholder="Cari judul catatan anda...">
        <button><i class="fas fa-search"></i></button>
    </div>
    <div class="tambah">
        <a href="catatan/addcatatan.php">
        <button><i class='fas fa-plus-circle' style='font-size:25px'></i>Tambah catatan </button></a>
    </div>
    <div class="add-rectangle">
        <h3>Catatanku</h3>
    <div class="box">

    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "diary");
    $query = "SELECT * FROM catatan";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $iddiary = $row['iddiary'];
            $judul = $row['judul'];
            $mood = $row['mood'];

            echo "<div>";
            echo "<p></p>";
            echo "<h2>$judul
             <a href='detail.php?iddiary=$iddiary' style='text-decoration: none; margin-right: 25px;'><i class='fa fa-eye' style='color: #094264; font-size: 15px; margin-left:350px;'></i></a>
            <a href='catatan/editcatatan.php?iddiary=$iddiary' style='text-decoration: none; margin-right: 25px;'><i class='fa fa-edit' style='color: #094264; font-size: 15px;'></i></a>
            <a href='catatan/prosesdelete.php?iddiary=$iddiary' onclick='konfirmasiHapus($iddiary)' style='text-decoration: none;'><i class='fa fa-trash' style='color: #094264; font-size: 15px;'></i></a>
            </h2>";
            echo "<p>$mood</p>";
        
            echo "</div>";
        }
    } else {
        echo "Belum ada catatan.";
    }
    ?>
            </div>   
        </div>
     
</div>

</body>
</html>



