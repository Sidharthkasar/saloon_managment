<?php
session_start();

// Already logged in? Go home
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header('Location: index.php');
    exit();
}

include('db_config.php');

$error   = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if (empty($name) || empty($email) || empty($password)) {
        $error = "Please fill in all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } elseif ($password !== $confirm) {
        $error = "Passwords do not match!";
    } else {
        // Check if email already exists
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "This email is already registered. Please login.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $ins = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
            $ins->bind_param("ssss", $name, $email, $phone, $hashed);

            if ($ins->execute()) {
                $success = "Account created successfully!";
            } else {
                $error = "Something went wrong. Please try again.";
            }
            $ins->close();
        }
        $check->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Phoenix Salon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin-login.css">
    <style>
        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 30px 0;
            flex-direction: column;
        }
        .auth-box {
            background: #111;
            padding: 40px;
            width: 380px;
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
            margin-bottom: 14px;
            text-align: left;
        }
        .auth-box .input-group label {
            display: block;
            font-size: 12px;
            color: #aaa;
            margin-bottom: 4px;
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
        .auth-box .input-group input:focus {
            outline: none;
            border-color: #ff4fa3;
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
            margin-top: 5px;
        }
        .auth-btn:hover { transform: scale(1.03); }
        .links { margin-top: 18px; font-size: 13px; color: #aaa; }
        .links a { color: #c9a96e; text-decoration: none; }
        .links a:hover { text-decoration: underline; }
        .error-text   { color: #ff4fa3; margin: 12px 0; font-size: 13px; }
        .success-text { color: #6bffb8; margin: 12px 0; font-size: 13px; }
        .required { color: #ff4fa3; }
    </style>
</head>
<body class="admin-body">

    <div class="login-wrapper">
        <div class="auth-box">
            <h2>✂️ Create Account</h2>
            <p class="subtitle">Join Phoenix Salon & Spa</p>

            <?php if ($error): ?>
                <p class="error-text"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <?php if ($success): ?>
                <p class="success-text">
                    ✅ <?= $success ?><br>
                    <a href="user-login.php" style="color:#c9a96e;">Click here to Login →</a>
                </p>
            <?php else: ?>

            <form method="POST" action="user-register.php">

                <div class="input-group">
                    <label>Full Name <span class="required">*</span></label>
                    <input type="text" name="name" placeholder="Your full name" required
                           value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
                </div>

                <div class="input-group">
                    <label>Email Address <span class="required">*</span></label>
                    <input type="email" name="email" placeholder="your@email.com" required
                           value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                </div>

                <div class="input-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" placeholder="10-digit mobile number"
                           value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
                </div>

                <div class="input-group">
                    <label>Password <span class="required">*</span> <small style="color:#888;">(min 6 chars)</small></label>
                    <input type="password" name="password" placeholder="Create a password" required>
                </div>

                <div class="input-group">
                    <label>Confirm Password <span class="required">*</span></label>
                    <input type="password" name="confirm_password" placeholder="Repeat your password" required>
                </div>

                <button type="submit" class="auth-btn">Create Account</button>

            </form>

            <?php endif; ?>

            <p class="links">Already have an account? <a href="user-login.php">Login here</a></p>
        </div>
    </div>

</body>
</html>