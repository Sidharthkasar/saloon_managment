<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-login.php");
    exit();
}

include "db_config.php";

if (isset($_GET['id']) && isset($_GET['status'])) {

    $id = intval($_GET['id']);
    $status = $_GET['status'];

    $allowed = ['Confirmed', 'Pending', 'Cancelled'];

    if (in_array($status, $allowed)) {

        $stmt = $conn->prepare("
            UPDATE bookings
            SET status = ?
            WHERE id = ?
        ");

        $stmt->bind_param("si", $status, $id);
        $stmt->execute();

    }

}

header("Location: bookings.php");
exit();
?>