<?php

include "koneksi.php";
if(isset($_POST['id'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $start = $_POST['start'];
    
    mysqli_query($koneksi, "UPDATE events set title = '$title', start_event ='$start' WHERE id = '$id'");
}

?>