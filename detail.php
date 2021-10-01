<?php
include ('config.php');
$id = $_GET["id"];
// echo $id
?>
<html>
<a href="books.php">Terug</a>
<head>
    <title>detail</title>
</head>

<body>
    <?php 
    $liqry = $conn->prepare("SELECT id, title, author,  publisher, pages, overview, geleend FROM books WHERE id = $id");
    if ($liqry === false) {
        trigger_error(mysqli_error($conn));
    } else {
        // $liqry->bind_param('s', $categoryName, $categoryDescription);
        $liqry->bind_result($id, $title, $author, $publisher, $pages, $overview, $geleend);
        if ($liqry->execute()) {
            $liqry->store_result();
            while ($liqry->fetch()) {
    ?>
                <div class="container-books">
                    <?php echo "ID: ", $id ?>
                    <br>
                    <?php echo "titel: ", $title ?>
                    <br>
                    <?php echo "auteur: ", $author ?>
                    <br>
                    <?php echo "publisher: ", $publisher ?>
                    <br>
                    <?php echo "pagina's: ", $pages ?>
                    <br>
                    <?php echo "samenvatting: <br> <br> ", $overview ?>
                    <br>
                    <?php echo "<br> Beschikbaar: ", $geleend ?>
                    <br>
                    <form method="post"><input type="submit" value="leen" name="submit"></form>
                    <form method="post"><input type="submit" value="inleveren" name="inleveren"></form>

                    <br>
                    <br>
                </div>
                <?php
            }
        }
        $liqry->close();
    }
                ?>
</body>

</html>

<?php 
if(isset($_POST["submit"]) !="" ) {
    $liqry = $conn->prepare("UPDATE `books` SET `geleend`= 0 WHERE id=$id");
    if ($liqry === false) {
        trigger_error(mysqli_error($conn));
    } else {
        // $liqry->bind_param('s', $categoryName, $categoryDescription);
        $liqry->execute(); 
         
        
        $liqry->close();
    }
}

if(isset($_POST["inleveren"]) !="" ) {
    $liqry = $conn->prepare("UPDATE `books` SET `geleend`= 1 WHERE id=$id");
    if ($liqry === false) {
        trigger_error(mysqli_error($conn));
    } else {
        // $liqry->bind_param('s', $categoryName, $categoryDescription);
        $liqry->execute(); 
         
        
        $liqry->close();
    }
}
?>

