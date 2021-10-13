<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

include('../config.php');

if (
    isset($_POST['title']) && $_POST['title'] &&
    ($_POST['author']) && $_POST['author'] &&
    ($_POST['isbn']) && $_POST['isbn'] &&
    ($_POST['format']) && $_POST['format'] &&
    ($_POST['publisher']) && $_POST['publisher'] &&
    ($_POST['pages']) && $_POST['pages']  &&
    ($_POST['overview']) && $_POST['overview'] &&
    ($_POST['dimensions']) && $_POST['dimensions'] &&
    ($_POST['beschikbaar']) && $_POST['beschikbaar'] != ""
) {

    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author']);
    $isbn = $conn->real_escape_string($_POST['isbn']);
    $format = $conn->real_escape_string($_POST['format']);
    $publisher = $conn->real_escape_string($_POST['publisher']);
    $pages = $conn->real_escape_string($_POST['pages']);
    $overview = $conn->real_escape_string($_POST['overview']);
    $dimensions = $conn->real_escape_string($_POST['dimensions']);
    $geleend = $conn->real_escape_string($_POST['beschikbaar']);

    $liqry = $conn->prepare("INSERT INTO books (title, author, isbn13, format, publisher, pages, dimensions, overview, geleend) VALUES ('$title', '$author', '$isbn','$format', '$publisher', '$pages', '$overview', '$dimensions', '$geleend')");

    if ($liqry === false) {
        echo mysqli_error($conn);
    } else {
        // $liqry->bind_param('s', $name);
        if ($liqry->execute()) {
            echo "boek: " . $title . " toegevoegd.";
        }
    }
    $liqry->close();
} else {
    echo 'alles moet ingevuld zijn!';
}
?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <a href="logout.php">Logout</a>
    <br>
    <a href="../books.php">Books</a><br>
    <a href="boek_wijzigen.php">wijzigen</a>
    <h1>Boek toevoegen</h1>

    <form action="#" method="POST">

        <input type="text" name="title" id="" placeholder="title">
        <input type="text" name="author" id="" placeholder="author">
        <input type="text" name="isbn" id="" placeholder="isbn">
        <input type="text" name="format" id="" placeholder="format">
        <input type="text" name="publisher" id="" placeholder="publisher">
        <input type="text" name="pages" id="" placeholder="pages">
        <input type="text" name="overview" id="" placeholder="overview">
        <input type="text" name="dimensions" id="" placeholder="dimensions">
        <input type="text" name="beschikbaar" id="" placeholder="beschikbaar">
        <input type="submit" value="toevoegen">

    </form>
</body>
</html>