<head>
    <link rel="shortcut icon" type="image/png" href="assets/icon.png"/>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <title>Ez Share | File</title>
</head>

<?php

    include('includes/dbh.inc.php');

    if(isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql = "SELECT name FROM files WHERE id='$id'";
        $res = mysqli_query($con,$sql);

        $row = mysqli_fetch_assoc($res);

        $name = $row['name'];

    
        echo 
        "
        
        <div class='download-form'>
            <h2 class='file-name'>".$name."</h2>
        
        ";
?>

    <br>
    <a href="files/<?php echo $name; ?>" class="link-download" download="files/<?php echo $name; ?>"><button class="btn-download">Download</button></a>

        <br><br><br><br>

        <span class="link-copy" id="tocopy">https://ezhub.tk/ezshare/file.php?id=<?php echo $id; ?></span>
        <input type="button" value="Copy" class="js-copy" data-target="#tocopy">

        <section class="download-to-back"></section>  

    <a href="index.php" class="link-back_home"><button class="btn-back_home">Back to home page</button></a>
</div>


<?php
    }
?>

<script>

var btncopy = document.querySelector('.js-copy');
if(btncopy) {
    btncopy.addEventListener('click', docopy);
}

function docopy() {
    var range = document.createRange();
    var target = this.dataset.target;
    var fromElement = document.querySelector(target);
    var selection = window.getSelection();

    range.selectNode(fromElement);
    selection.removeAllRanges();
    selection.addRange(range);

    try {
        var result = document.execCommand('copy');
        if (result) {
            // La copie a réussi
            alert('The link has been copied');
        }
    }
    catch(err) {
        // Une erreur est surevnue lors de la tentative de copie
        alert(err);
    }

    selection = window.getSelection();

    if (typeof selection.removeRange === 'function') {
        selection.removeRange(range);
    } else if (typeof selection.removeAllRanges === 'function') {
        selection.removeAllRanges();
    }
}

</script>