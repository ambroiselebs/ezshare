<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/297d0f38aa.js" ></script>
    <meta name="keywords" content="ez, share, ezshare, EZ, Ez, Share, Partager, partager, easy, facile, wetransfer, company, files, file, fichiers, fichier, random, aléatoire">
    <meta name="description" content="An easy way to share files with people. Ez Share is easy, fats and secure. To try it is not to do without it">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="script.js"></script>
    <link rel="shortcut icon" type="image/png" href="assets/icon.png"/>
    <link rel="stylesheet" href="responsive.css">
    <script data-ad-client="ca-pub-2153143190486464" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <title>Ez Share | Home</title>
</head>
<body>
    
    <?php
        require('includes/dbh.inc.php');
    ?>

    <div class="contents" id="contents">
        <section class="separe-top_to_title"></section>

        <h1 class="desc-title">EZ Share | Share files quickly and easily.</h1>
        <section class="separe-title_to_btn"></section>

        <center><button onclick="openUpload()" class="btn-upload-open">Upload a file</button></center>
    </div>

    <div class="upload" id="upload-div">
        <button class="hide-btn" id="hide-btn" onclick="hideupload()"><i class="bx bx-menu bx-x quit"></i></button>
        <h1 class="title-select">Select a file</h1>

        <br><br><br><br>

        <form  action="index.php" method="post" enctype="multipart/form-data">
            
            <input type="file" name="file" class="hide-file" id="file" />
            
            <center><label for="file" class="label-upload">
                <i class="fas fa-cloud-upload-alt fa-5x"></i>
            </label></center>

            <br><br><br><br><br><br>

            <center><input type="submit" value="UPLOAD" name="upload" class="btn-upload" onclick="upload_load()" /></center>

        </form>

        <br><br><br>

        <center><i class="fas fa-spinner fa-pulse fa-3x loading-upload-hide" id="load"></i></center>

    </div>

    <section class="upload-form_to_about"></section>

    <div class="about">
        
        <div class="whatwedo">

            <div class="secure">
                <i class="fas fa-lock fa-5x"></i>
                <h3>You don't want your files to be found everywhere on the internet. <br> Ez Share ensures the security of your files</h3>
            </div>

            <div class="quick">
                <i class="fas fa-tachometer-alt fa-5x"></i>
                <h3>When it's simple, it's fast. <br>Ez Share offers you a fast and simple service</h3>
            </div>
        </div>

        <br>

        <div class="credits">
            <p class="credit-who">©ambroiselebs</p>
        </div>

    </div>

</body>
</html>

<?php

if(@$_FILES['file']['name'] == null) {
    return;
} else {

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    $randomId = generateRandomString();

    if (isset($_POST['upload'])){

        $name = $_FILES['file']['name'];
        
        $tmp = $_FILES['file']['tmp_name'];
        
        move_uploaded_file($tmp, "files/".$name);

        $sql = "INSERT INTO files (id, name) VALUES ('$randomId', '$name')";
        $res =  mysqli_query($con, $sql);
      
        if ($res == 1){
        
            $sqli = "SELECT * FROM files";
            $rest = mysqli_query($con, $sqli);
    
            while ($row = mysqli_fetch_assoc($rest)) {
    
                $id = $row['id'];
    
            }
    
            echo 
            "
            
            <div class='success_div'>
                <h2 class='success-title'>The file has been successfully uploaded !</h2>
                <a href='file.php?id=".$randomId."'>Click here to download your file</a>
            </div>
            
            ";
        }
        }

}



?>