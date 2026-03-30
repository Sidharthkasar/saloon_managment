<?php
include('db_config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $rating = (int)$_POST['rating'];
    $text = mysqli_real_escape_string($conn, $_POST['text']);

    $sql = "INSERT INTO reviews (user_name, rating, review_text) VALUES ('$name', '$rating', '$text')";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
}
mysqli_close($conn);
?>