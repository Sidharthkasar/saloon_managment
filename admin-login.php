<?php
session_start();

// Already logged in as admin? Go to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin.php');
    exit();
}

include('db_config.php');

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Hardcoded credentials
    $hardcoded_username = 'phoenix';
    $hardcoded_password = 'phoenix@123';

    if ($username === $hardcoded_username && $password === $hardcoded_password) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = 1; // just a dummy ID
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin-login.css">
    <style>
        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .admin-box {
            background: #111;
            padding: 40px;
            width: 360px;
            border-radius: 10px;
            border: 1px solid #4fc3f7;
            text-align: center;
            box-shadow: 0 0 20px rgba(255, 79, 163, 0.3);
        }
        .admin-box h2 {
            margin-bottom: 6px;
            color: #fff;
        }
        .admin-box .subtitle {
            color: #bbb;
            font-size: 13px;
            margin-bottom: 25px;
        }
        .user-link {
            display: block;
            margin-top: 18px;
            color: #aaa;
            font-size: 12px;
            text-decoration: none;
        }
        .user-link a {
            color: #4fc3f7;
            text-decoration: none;
        }
        .user-link a:hover {
            text-decoration: underline;
        }
        .error-text {
            color: #ff4fa3;
            margin-top: 12px;
            font-size: 13px;
        }
    </style>
</head>
<body class="admin-body">

    <div class="login-wrapper">
        <div class="admin-box">
            <h2>🔐 Admin Login</h2>
            <p class="subtitle">Phoenix Salon Dashboard</p>

            <form id="loginForm" method="POST" action="admin-login.php">

                <div class="input-group">
                    <input type="text" name="username" placeholder="Username" autocomplete="username" required>
                </div>

                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" autocomplete="current-password" required>
                </div>

                <button type="submit" class="admin-btn">Login</button>

                <?php if ($error): ?>
                    <p class="error-text"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>

            </form>

            <span class="user-link">Not admin? <a href="user-login.php">Customer Login →</a></span>
        </div>
    </div>

</body>
</html>