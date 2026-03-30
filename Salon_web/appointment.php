<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment - Phoenix Unisex Salon & Spa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="appointment.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="logo.png.png" alt="Phoenix Logo">
        <div class="logo-text">
            <h2>PHOENIX</h2>
            <span>Salon & Spa</span>
        </div>
    </div>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="appointment.php" class="active">Appointment</a></li>
            <li><a href="reviews.php">Reviews</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </nav>

    <div class="nav-right">
        <input type="text" placeholder="Search...">
        <a href="admin.php" class="profile-icon">
            <span>👤</span>
        </a>
    </div>
</header>
<section class="appointment-section">
    <h2 class="fade-in">Please Select Your Service</h2>

    <div class="card-container">

        <!-- MEN -->
        <div class="service-wrapper slide-left">
            <div class="card men-card">
                <div class="card-title">For Men</div>
                <div class="image-box">
                    <img src="MENS.jpg" alt="Men Service">
                </div>
            </div>

            <button class="btn" onclick="goToMen()">
                VIEW SERVICES
            </button>
        </div>

        <!-- WOMEN -->
        <div class="service-wrapper slide-right">
            <div class="card women-card">
                <div class="card-title">For Women</div>
                <div class="image-box">
                    <img src="womens.jpg" alt="Women Service">
                </div>
            </div>

            <button class="btn" onclick="goToWomen()">
                VIEW SERVICES
            </button>
        </div>

    </div>
</section>

<script src="appointment.js"></script>
</body>
</html>