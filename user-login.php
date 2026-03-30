<?php
session_start();

// Already logged in? Go home
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header('Location: index.php');
    exit();
}

include('db_config.php');

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $name, $hashed);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed)) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_id']        = $id;
        $_SESSION['user_name']      = $name;
        $stmt->close();
        header('Location: index.php');
        exit();
    } else {
        $error = 'Invalid email or password.';
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Login - Phoenix Salon</title>
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
        .auth-box {
            background: #111;
            padding: 40px;
            width: 360px;
            border-radius: 10px;
            border: 1px solid #c9a96e;
            text-align: center;
            box-shadow: 0 0 20px rgba(201, 169, 110, 0.25);
        }
        .auth-box h2 {
            color: #c9a96e;
            margin-bottom: 6px;
        }
        .auth-box .subtitle {
            color: #bbb;
            font-size: 13px;
            margin-bottom: 25px;
        }
        .auth-box .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .auth-box .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #c9a96e;
            border-radius: 6px;
            background: black;
            color: white;
            font-size: 14px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .auth-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(45deg, #c9a96e, #ff4fa3);
            color: white;
            font-weight: 600;
            cursor: pointer;
            font-size: 15px;
            transition: 0.3s;
            font-family: 'Poppins', sans-serif;
        }
        .auth-btn:hover { transform: scale(1.03); }
        .links { margin-top: 18px; font-size: 13px; color: #aaa; }
        .links a { color: #c9a96e; text-decoration: none; }
        .links a:hover { text-decoration: underline; }
        .divider { margin: 14px 0; color: #555; font-size: 12px; }
        .admin-link { font-size: 12px; color: #888; }
        .admin-link a { color: #4fc3f7; text-decoration: none; }
        .admin-link a:hover { text-decoration: underline; }
        .error-text { color: #ff4fa3; margin-top: 12px; font-size: 13px; }
    </style>
</head>
<body class="admin-body">

    <div class="login-wrapper">
        <div class="auth-box">
            <h2>✂️ Welcome Back</h2>
            <p class="subtitle">Login to your Phoenix account</p>

            <form method="POST" action="user-login.php">

                <div class="input-group">
                    <input type="email" name="email" placeholder="Email Address" required autocomplete="email">
                </div>

                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
                </div>

                <button type="submit" class="auth-btn">Login</button>

                <?php if ($error): ?>
                    <p class="error-text"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>

            </form>

            <p class="links">Don't have an account? <a href="user-register.php">Register here</a></p>
            <div class="divider">— — —</div>
            <p class="admin-link">Are you admin? <a href="admin-login.php">Admin Login →</a></p>
        </div>
    </div>

</body>
</html>