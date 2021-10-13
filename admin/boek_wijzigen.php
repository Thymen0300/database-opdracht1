<?php 
include('../config.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boek wijzigen</title>
</head>
<body>
    <main>
        <h1>Boeken</h1>
        <!-- alles voor de Koop nu gedeelte -->
        <?php
        $liqry = $conn->prepare("SELECT id, title, author,  publisher, pages, geleend FROM `books`");
        if ($liqry === false) {
            trigger_error(mysqli_error($conn));
        } else {
            // $liqry->bind_param('s', $categoryName, $categoryDescription);
            $liqry->bind_result($ID, $title, $author, $publisher, $pages, $geleend);
            if ($liqry->execute()) {
                $liqry->store_result();
                while ($liqry->fetch()) {
        ?>
                    <div class="container-books">
                        <?php echo "ID: ", $ID ?>
                        <br>
                        <?php echo "titel: ", $title ?>
                        <br>
                        <?php echo "auteur: ", $author ?>
                        <br>
                        <?php echo "publisher: ", $publisher ?>
                        <br>
                        <?php echo "pagina's: ", $pages ?>
                        <br>
                        <?php echo "beschikbaar: ", $geleend ?>
                        <br>
                        <a href="wijzigen.php?id=<?php echo $ID ?>">wijzigen</a>
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