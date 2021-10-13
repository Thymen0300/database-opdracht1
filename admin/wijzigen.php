<?php
include('../config.php');
$ID_book = $_GET['id'];
echo $ID_book;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>boek wijzigen</title>
</head>

<body>

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
        <input type="submit" name="submit" value="wijzigen">

    </form>


</body>

</html>

<?php


// if (isset($_POST['title']) && $_POST['title'] && ($_POST['author']) && $_POST['author'] && ($_POST['isbn']) && $_POST['isbn'] && ($_POST['format']) && $_POST['format'] && ($_POST['publisher']) && $_POST['publisher'] && ($_POST['pages']) && $_POST['pages'] != "") {
if (isset($_POST['submit']) && $_POST['submit'] != "") {


    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $format = $_POST['format'];
    $publisher = $_POST['publisher'];
    $pages = $_POST['pages'];
    $overview = $_POST['overview'];
    $dimensions = $_POST['dimensions'];
    $geleend = $_POST['beschikbaar'];


    $editqry = $conn->prepare("UPDATE `books` SET `title`='$title',`author`='$author',`isbn13`='$isbn',`format`='$format',`publisher`='$publisher',`pages`='$pages', dimensions = '$dimensions', overview = '$geleend' WHERE id = $ID_book");
    if ($editqry === false) {
        echo mysqli_error($conn);
    } else {
        // $editqry->bind_result();
        if ($editqry->execute()) {
            $editqry->store_result();
            header("Refresh:0");
            echo "<script type='text/javascript'>alert('Product bewerkt');</script>";
        }
    }
    $editqry->close();
}

?>