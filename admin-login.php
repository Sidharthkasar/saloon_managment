<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace with database validation if needed
    $adminUser = 'phoenix';
    $adminPass = 'admin123';

    if ($username === $adminUser && $password === $adminPass) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin.php');
        exit();
    } else {
        $error = 'Invalid Username or Password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>Admin Login - Phoenix Salon</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="admin-login.css">

</head>

<body class="admin-body">

<form id="loginForm" method="POST" action="admin-login.php">

<div class="input-group">
<input type="text" id="username" name="username" placeholder="Username" autocomplete="username" required>
</div>

<div class="input-group">
<input type="password" id="password" name="password" placeholder="Password" autocomplete="current-password" required>
</div>

<button type="submit" class="admin-btn">Login</button>

<p id="error-msg"></p>

</form>

</body>
</html>