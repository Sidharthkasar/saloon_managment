<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Reviews | Phoenix Salon & Spa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --gold: #d4af37;
            --light-gold: #f1c40f;
            --dark: #0f0f0f;
            --glass: rgba(255, 255, 255, 0.05);
            --border: rgba(255, 255, 255, 0.1);
        }

        body {
            background-color: var(--dark);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        /* --- Header Styling --- */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 8%;
            background: rgba(0,0,0,0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo { display: flex; align-items: center; gap: 10px; }
        .logo img { width: 45px; }
        .logo-text h2 { margin: 0; font-family: 'Playfair Display', serif; color: var(--gold); letter-spacing: 2px; }
        .logo-text span { font-size: 0.7rem; letter-spacing: 3px; color: #888; text-transform: uppercase; }

        nav ul { display: flex; list-style: none; gap: 30px; margin: 0; }
        nav ul li a { text-decoration: none; color: #ccc; font-size: 0.9rem; transition: 0.3s; }
        nav ul li a:hover, nav ul li a.active { color: var(--gold); }

        /* --- Main Title Section --- */
        .review-header-main {
            text-align: center;
            padding: 60px 20px 20px;
        }

        .review-header-main h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            margin: 0;
            background: linear-gradient(to right, #bf953f, #fcf6ba, #b38728, #fbf5b7, #aa771c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
        }

        .review-header-main p { color: #888; letter-spacing: 2px; font-size: 0.9rem; }

        .review-container { max-width: 900px; margin: 0 auto; padding: 20px; }

        /* --- Rating Summary --- */
        .rating-summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--glass);
            padding: 30px;
            border-radius: 25px;
            border: 1px solid var(--border);
            margin-bottom: 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .rating-score h1 { font-size: 4rem; margin: 0; color: var(--gold); line-height: 1; }

        /* --- Buttons --- */
        .btn-write {
            background: linear-gradient(45deg, #aa771c, #fcf6ba);
            color: #000;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.4s;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }
        .btn-write:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(212, 175, 55, 0.5); }

        /* --- Review Items --- */
        .review-list { display: flex; flex-direction: column; gap: 30px; }

        .review-item {
            background: var(--glass);
            border: 1px solid var(--border);
            padding: 30px;
            border-radius: 20px;
            position: relative;
            transition: 0.4s;
        }
        .review-item:hover {
            border-color: var(--gold);
            background: rgba(255, 255, 255, 0.08);
            transform: scale(1.02);
        }

        .review-user-info { display: flex; align-items: center; gap: 20px; margin-bottom: 15px; }
        .review-user-info img { width: 65px; height: 65px; border-radius: 50%; border: 2px solid var(--gold); padding: 3px; }

        .user-details h4 { margin: 0; color: #fff; font-size: 1.1rem; }
        .review-date { font-size: 0.8rem; color: #666; }
        .stars-active { color: var(--light-gold); margin-top: 5px; }

        .review-text { font-style: italic; color: #ddd; line-height: 1.8; font-size: 1rem; }

        /* --- Modal --- */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0; top: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.9);
            justify-content: center; align-items: center;
            backdrop-filter: blur(5px);
        }
        .modal-content {
            background: #151515;
            padding: 40px;
            border-radius: 30px;
            width: 90%; max-width: 450px;
            border: 1px solid var(--gold);
            text-align: center;
        }

        .modal-content input, .modal-content textarea {
            width: 100%; background: #222; border: 1px solid #333;
            color: #fff; padding: 15px; margin: 10px 0; border-radius: 12px;
        }

        .star-rating { font-size: 35px; color: #333; margin: 15px 0; display: flex; justify-content: center; gap: 10px; }
        .star-rating span { cursor: pointer; transition: 0.3s; }
        .star-rating span.selected, .star-rating span:hover { color: var(--light-gold); text-shadow: 0 0 10px var(--gold); }

        .submit-review {
            background: var(--gold); color: #000; border: none;
            padding: 15px; border-radius: 12px; width: 100%; font-weight: bold; cursor: pointer; font-size: 1rem;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="logo.png.png" alt="Phoenix Logo">
        <div class="logo-text"><h2>PHOENIX</h2><span>Salon & Spa</span></div>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="appointment.php">Appointment</a></li>
            <li><a href="shop.php">Shop Now</a></li>
            <li><a href="reviews.php" class="active">Reviews</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </nav>
</header>

<div class="review-header-main" data-aos="fade-down">
    <h2>Client Testimonials</h2>
    <p>Real stories from our premium members</p>
</div>

<section class="review-container">
    <div class="rating-summary" data-aos="zoom-in">
        <div class="rating-score">
            <h1 id="avgRating">4.8</h1>
            <div class="stars-active">⭐⭐⭐⭐⭐</div>
        </div>
        <div style="text-align: left;">
            <p style="margin:0; font-weight:600; font-size: 1.2rem;">Excellent</p>
            <p style="margin:0; color:#888;">Based on 250+ Verified Reviews</p>
        </div>
        <button class="btn-write" onclick="openModal()">Write a Review</button>
    </div>

    <div class="review-list" id="reviewList">
        <?php
        include('db_config.php');
        $result = mysqli_query($conn, "SELECT * FROM reviews ORDER BY id DESC");
        while($row = mysqli_fetch_assoc($result)) {
            $starStr = str_repeat("⭐", $row['rating']) . str_repeat("☆", 5 - $row['rating']);
        ?>
        <div class="review-item" data-aos="fade-up">
            <div class="review-user-info">
                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($row['user_name']); ?>&background=d4af37&color=000" alt="User">
                <div class="user-details">
                    <h4><?php echo htmlspecialchars($row['user_name']); ?></h4>
                    <span class="review-date"><?php echo date('F Y', strtotime($row['review_date'])); ?></span>
                    <div class="stars-active"><?php echo $starStr; ?></div>
                </div>
            </div>
            <p class="review-text">"<?php echo htmlspecialchars($row['review_text']); ?>"</p>
        </div>
        <?php } ?>
    </div>
</section>

<div id="reviewModal" class="modal">
    <div class="modal-content">
        <span style="float:right; cursor:pointer; color: #888;" onclick="closeModal()">✕</span>
        <h3 style="font-family: 'Playfair Display', serif; font-size: 1.8rem; margin-bottom: 5px;">Share Your Review</h3>
        <p style="color: #666; font-size: 0.8rem; margin-bottom: 20px;">Your feedback helps us improve.</p>
        
        <input type="text" id="revName" placeholder="Full Name">
        
        <div class="star-rating" id="starContainer">
            <span onclick="setRating(1)">★</span>
            <span onclick="setRating(2)">★</span>
            <span onclick="setRating(3)">★</span>
            <span onclick="setRating(4)">★</span>
            <span onclick="setRating(5)">★</span>
        </div>
        
        <textarea id="revText" rows="4" placeholder="How was your experience?"></textarea>
        
        <button class="submit-review" onclick="submitReview()">Submit Review</button>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });

    let currentRating = 0;

    function openModal() { document.getElementById('reviewModal').style.display = 'flex'; }
    function closeModal() { document.getElementById('reviewModal').style.display = 'none'; }

    function setRating(n) {
        currentRating = n;
        let stars = document.getElementById('starContainer').getElementsByTagName('span');
        for (let i = 0; i < 5; i++) {
            stars[i].classList.toggle('selected', i < n);
        }
    }

    // Step 4: Updated submitReview to use AJAX/Fetch
    function submitReview() {
        let name = document.getElementById('revName').value;
        let text = document.getElementById('revText').value;

        if (!name || !text || currentRating === 0) {
            alert("Please provide name, rating and comments!");
            return;
        }

        let formData = new FormData();
        formData.append('name', name);
        formData.append('rating', currentRating);
        formData.append('text', text);

        fetch('save_review.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(res => {
            if(res.trim() === "success") {
                alert("Thank you! Your review has been posted.");
                location.reload(); 
            } else {
                alert("Error saving review to database!");
            }
        })
        .catch(err => console.error("Error:", err));
    }
</script>

</body>
</html>