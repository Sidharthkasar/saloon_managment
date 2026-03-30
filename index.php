<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phoenix Unisex Salon & Spa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- NAVBAR -->
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
                <li><a href="#" class="active">Home</a></li>
                <li><a href="appointment.php">Appointment</a></li>
                 <li><a href="shop.php">Shop now</a></li>
          <li><a href="reviews.php">Reviews</a></li>
                <li><a href="contact.php">Contact Us</a></li>

            </ul>
        </nav>

        <div class="nav-right">
            <input type="text" placeholder="Search...">
           <a href="admin-login.php" class="profile-icon">
    <span>👤</span>
</a>

        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <h3>Welcome to Phoenix</h3>
            <h1>Unisex Salon & Spa</h1>
            <p class="tagline">“Beauty begins the moment you decide to be yourself.”</p>
         <a href="appointment.php" class="btn">BOOK APPOINTMENT</a>


        </div>
    </section>

<!--COMBO OFFERS SECTION-->

<section class="combo-section fade-section">
    <h2 class="section-title">Combo Offers</h2>

    <div class="offers-container">

        <!-- MEN COMBO 1 -->
        <div class="offer-card combo">
            <h3>Men's Grooming Combo</h3>
            <p>Haircut + Beard + Facial</p>
            <span class="price">₹1299</span>
            <a href="men.php" class="offer-btn">Explore</a>
        </div>

        <!-- WOMEN COMBO 1 -->
        <div class="offer-card combo">
            <h3>Bridal Glow Combo</h3>
            <p>Makeup + Hair + Spa</p>
            <span class="price">₹4999</span>
            <a href="women.php" class="offer-btn">Explore</a>
        </div>

        <!-- MEN COMBO 2 -->
        <div class="offer-card combo">
            <h3>Men's Premium Hair Spa</h3>
            <p>Hair Spa + Styling</p>
            <span class="price">₹1499</span>
            <a href="men.php" class="offer-btn">Explore</a>
        </div>

        <!-- WOMEN COMBO 2 -->
        <div class="offer-card combo">
            <h3>Women's Festival Glow Package</h3>
            <p>Facial + Cleanup + Styling</p>
            <span class="price">₹1999</span>
            <a href="women.php" class="offer-btn">Explore</a>
        </div>

    </div>
</section>
<!-- WHY CHOOSE PHOENIX -->
<section class="why-section">
    <h2 class="section-title">Why Choose Phoenix?</h2>

    <div class="why-container">

        <div class="why-box">
            <h3>🌟 Expert Professionals</h3>
            <p>Certified and experienced stylists for premium care.</p>
        </div>

        <div class="why-box">
            <h3>💎 Luxury Experience</h3>
            <p>Modern ambiance with relaxing spa environment.</p>
        </div>

        <div class="why-box">
            <h3>🔥 Premium Products</h3>
            <p>Only branded and skin-safe products used.</p>
        </div>

        <div class="why-box">
            <h3>❤️ Customer Satisfaction</h3>
            <p>Your happiness and confidence is our priority.</p>
        </div>

    </div>
</section>
<script>

// SCROLL FADE EFFECT
const faders = document.querySelectorAll('.fade-section');

window.addEventListener('scroll', () => {
    faders.forEach(section => {
        const sectionTop = section.getBoundingClientRect().top;
        const triggerPoint = window.innerHeight - 100;

        if(sectionTop < triggerPoint){
            section.classList.add('show');
        }
    });
});


// COUNTDOWN TIMER (Set future date here)
const endDate = new Date("December 31, 2026 23:59:59").getTime();

const timerFunction = setInterval(function() {

    const now = new Date().getTime();
    const distance = endDate - now;

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("timer").innerHTML =
        days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";

    if (distance < 0) {
        clearInterval(timerFunction);
        document.getElementById("timer").innerHTML = "Offer Expired";
    }

}, 1000);

</script>



</body>
</html>
