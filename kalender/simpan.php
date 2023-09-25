<?php

include "koneksi.php";
if(isset($_POST['title'])) {
    $title = $_POST['title'];
    $start = $_POST['start'];
    
    mysqli_query($koneksi, "INSERT INTO events VALUES ('','$title','$start') ");
}

?>