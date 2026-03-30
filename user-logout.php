<?php
session_start();

// Only destroy user session keys, keep admin session untouched
unset($_SESSION['user_logged_in']);
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);

// If no other session data remains, destroy fully
if (empty($_SESSION)) {
    session_destroy();
}

header('Location: index.php');
exit();
?>