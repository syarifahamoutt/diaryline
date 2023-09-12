<?php
session_start();
$backgroundImage = "me.jpeg";
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
    <title>Pengaturan</title>
    <link rel="icon" type="uploads/x-icon" href="uploads/favicon1.ico">
<style>
        body {
            font-family: 'poppins'; 
            text-align:center;
            color: #094264;
            background-image: url("<?php echo $backgroundImage; ?>"); 
            transition: background-image 0.5s; 
        }

        .p {
            position: absolute;
            top: 25px;
            left: 50px;
        }

        .container {
            display: flex; 
            height: 100vh;
        }

        .box1 {
            background-image: url("me.jpeg");
            position: absolute;
            top: 100px;
            width: 250px;
            height: 150px;
            cursor: pointer;
            left: 60px;
            border: 1px solid #ccc;
            border-radius: 25px;
            background-size: cover; 
            margin: 0 10px; 
        }

        .box2 {
            background-image: url("bg2.jpeg");
            position: absolute;
            top: 100px;
            width: 250px;
            height: 150px;
            cursor: pointer;
            left: 350px;
            border: 1px solid #ccc;
            border-radius: 25px;
            background-size: cover; 
            margin: 0 10px; 
        }

        .checkmark {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 20px;
            height: 20px;
            background-color: #A5CBD6;
            border-radius: 50%;
            display: none;
        }

        input[type="submit"] {
            background-color: #A5CBD6;
            border: 1px solid #fff;
            color: #094264;
            padding: 5px 25px;
            border-radius: 5px;
            cursor: pointer;
            top: 460px;
            position: absolute;
            right: 100px;
            z-index: 999; 
        }

        .box1.selected .checkmark,
        .box2.selected .checkmark {
            display: block;
        }

</style> 
</head>
<body>
<div>
    <div class="p">
        <p>Pilih tema untuk diterapkan</p>
    </div>
    <div class="container">
        <div class="box1" onclick="changeBackground('me.jpeg')">
            <div class="checkmark">&#10003;</div>
        </div>
        <div class="box2" onclick="changeBackground('bg2.jpeg')">
            <div class="checkmark">&#10003;</div>
        </div>
    </div>
    <input type="submit" value="Terapkan">

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