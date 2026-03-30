<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* Destroy session */
session_unset();
session_destroy();

/* Redirect to login page */
header("Location: admin-login.php");
exit();

?>