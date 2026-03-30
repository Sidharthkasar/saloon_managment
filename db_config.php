<?php
$conn = new mysqli("localhost", "root", "", "phoenix_salon");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>