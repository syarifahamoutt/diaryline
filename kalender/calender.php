<?php
session_start();
$backgroundImage = "../uploads/background.jpeg";
if (isset($_GET['bg'])) {
    $backgroundImage = $_GET['bg'];
    
    $_SESSION['backgroundImage'] = $backgroundImage;
}

if (isset($_SESSION['backgroundImage'])) {
    $backgroundImage = $_SESSION['backgroundImage'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calender</title>
    <link rel="icon" type="uploads/x-icon" href="../uploads/favicon1.ico">
    <link rel="stylesheet" href="../assets/fullcalendar.css" />
    <link rel="stylesheet" href="../assets/bootstrap.css" />
    <script src="../assets/jquery.min.js"></script>
    <script src="../assets/jquery-ui.min.js"></script>
    <script src="../assets/moment.min.js"></script>
    <script src="../assets/fullcalendar.min.js"></script>
</head>
<style>
            body {
            font-family: 'poppins'; 
            text-align:center;
            color: #094264;
            background-image: url("../uploads/background.jpeg");  
            background-image: url("<?php echo $backgroundImage; ?>"); 
            transition: background-image 0.5s; 
        }
        .link {
            font-size: 18px;
            text-decoration: none; 
            color: #094264; 
            cursor: pointer;
            position: absolute;
            left: 100px;
            z-index: 999; 
        }
</style>

<body>

    <br>
    <div class="container">
        <div id="calendar"></div>
    </div>
    <script>
        //persiapan JQuery
        $(document).ready(function () {
            var calendar = $('#calendar').fullCalendar({
                //izinkan tabel bisa diedit
                editable: true,
                //atur header kalender
                header:{
                    left : 'prev, next today',
                    center : 'title',
                    right : 'month'
                },
                //tampilkan data dari database
                events : 'tampil.php',
                //izinkan tabel/kalender bisa dipilih atau diedit
                selectable : true,
                selectHelper : true,
                select: function(start,allDay){
                    //tampilkan pesan imput
                    var title = prompt("Masukkan Judul Kegiatan");
                    if(title) {
                        //tampungtgl yg dipilih ke variabel start
                        var start = $.fullCalendar.formatDate(start,"Y-MM-DD");
                        //perintah ajax lempar data untuk disimpan
                        $.ajax({
                            url : "simpan.php",
                            type : "POST",
                            data : {
                                title : title,
                                start : start
                            },
                            success : function() {
                                //jika simpan sukses refresh kalender dan tampilkan pesan sukses
                                calendar.fullCalendar('refetchEvents');
                                alert('Simpan Suksess......');
                            }
                        });
                    }
                },
                //event ketika judul kegiatan di seret/ drop
                eventDrop : function(event){
                    var start = $.fullCalendar.formatDate(event.start,"Y-MM-DD");
                    var title = event.title;
                    var id = event.id;
                     //perintah ajax lempar data untuk ubah
                     $.ajax({
                            url : "ubah.php",
                            type : "POST",
                            data : {
                                title : title,
                                start : start,
                                id : id
                            },
                            success : function() {
                                //jika simpan sukses refresh kalender dan tampilkan pesan sukses
                                calendar.fullCalendar('refetchEvents');
                                alert('Edit Jadwal Kegiatan Suksess......');
                            }
                        });
                },
                //event ketika judul kegiatan di klik
                eventClick : function(event){
                    if(confirm("Apakah anda yakin akan hapus kegiatan ini?")){
                        var id = event.id;
                     //perintah ajax lempar data untuk ubah
                     $.ajax({
                            url : "hapus.php",
                            type : "POST",
                            data : {
                                id : id
                            },
                            success : function() {
                                //jika simpan sukses refresh kalender dan tampilkan pesan sukses
                                calendar.fullCalendar('refetchEvents');
                                alert('Jadwal Kegiatan Berhasil dihapus......');
                            }
                        });
                    }
                }
            });
        });
    </script>
<a href='../beranda.php' class='link'>Kembali ke Beranda</a>
</body>
</html>