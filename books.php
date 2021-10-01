<?php include 'config.php';?>

<main>
    <a href="admin/welcome.php">Terug</a>
    <h1>Boeken</h1>
    <!-- alles voor de Koop nu gedeelte -->
    <?php
    $liqry = $conn->prepare("SELECT id, title, author,  publisher, pages, geleend FROM books");
    if ($liqry === false) {
        trigger_error(mysqli_error($conn));
    } else {
        // $liqry->bind_param('s', $categoryName, $categoryDescription);
        $liqry->bind_result($id, $title, $author, $publisher, $pages, $lend);
        if ($liqry->execute()) {
            $liqry->store_result();
            while ($liqry->fetch()) {
    ?>
                <div class="container-books">
                    <?php echo "id: ", $id ?>
                    <br>
                    <?php echo "titel: ", $title ?>
                    <br>
                    <?php echo "auteur: ", $author ?>
                    <br>
                    <?php echo "publisher: ", $publisher ?>
                    <br>
                    <?php echo "pagina's: ", $pages ?>
                    <br>
                    <?php echo "beschikbaar: ", $lend ?>
                    <br>
                    <a href="detail.php?id=<?php echo $id ?>">Lenen</a>
                    <br>
                    <br>
                </div>
    <?php
            }
        }
        $liqry->close();
    }
    ?>