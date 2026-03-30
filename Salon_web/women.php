<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Women's Premium Services | Phoenix Unisex Salon & Spa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --rose-gold: #e5b3a3;
            --gold-light: #f4dcd4;
            --dark-bg: #0f0f0f;
            --card-bg: #1a1a1a;
            --text-main: #ffffff;
            --text-dim: #b0b0b0;
            --border-color: rgba(229, 179, 163, 0.2);
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-main);
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding-bottom: 120px;
        }

        /* --- Header --- */
        header {
            display: flex; justify-content: space-between; align-items: center;
            padding: 15px 5%; background: rgba(0,0,0,0.9);
            border-bottom: 1px solid var(--border-color); position: sticky; top: 0; z-index: 1000;
            backdrop-filter: blur(10px);
        }
        .logo { display: flex; align-items: center; gap: 10px; }
        .logo img { width: 45px; }
        .logo-text h2 { margin: 0; font-family: 'Playfair Display', serif; color: var(--rose-gold); letter-spacing: 2px; }
        nav ul { display: flex; list-style: none; gap: 20px; }
        nav ul li a { text-decoration: none; color: var(--text-dim); font-size: 0.9rem; transition: 0.3s; }
        nav ul li a:hover { color: var(--rose-gold); }

        /* --- Page Title --- */
        .page-title {
            text-align: center; font-family: 'Playfair Display', serif;
            font-size: 2.5rem; padding: 40px 0 20px; color: var(--rose-gold);
            text-transform: uppercase; letter-spacing: 4px;
        }

        .container { max-width: 900px; margin: 0 auto; padding: 0 20px; }

        /* --- Section Styling --- */
        .section-box {
            background: linear-gradient(90deg, #1d1d1d, #121212);
            border: 1px solid var(--border-color);
            padding: 20px 25px; margin-top: 15px; border-radius: 12px;
            cursor: pointer; display: flex; justify-content: space-between; align-items: center;
            transition: 0.3s; font-weight: 600; color: var(--gold-light);
        }
        .section-box:hover { border-color: var(--rose-gold); background: #222; }
        .section-box::after { content: '∨'; font-size: 0.8rem; opacity: 0.6; }

        /* --- Services Grid --- */
        .services {
            display: none; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px; padding: 20px 0; animation: fadeIn 0.4s ease;
        }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .service-card {
            background: var(--card-bg); border: 1px solid #2a2a2a;
            padding: 20px; border-radius: 15px; cursor: pointer;
            transition: all 0.3s ease; position: relative;
            display: flex; justify-content: space-between; align-items: center;
        }
        .service-card:hover { border-color: var(--rose-gold); transform: translateY(-3px); }
        .service-card.selected { border-color: var(--rose-gold); background: rgba(229, 179, 163, 0.1); box-shadow: 0 0 15px rgba(229, 179, 163, 0.2); }

        .service-name { font-size: 0.95rem; font-weight: 400; }
        .service-price { color: var(--rose-gold); font-weight: 600; margin-top: 4px; display: block; }

        .check-circle {
            width: 20px; height: 20px; border: 2px solid #444; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; transition: 0.3s;
        }
        .selected .check-circle { background: var(--rose-gold); border-color: var(--rose-gold); }
        .selected .check-circle::after { content: '✓'; color: #000; font-size: 12px; font-weight: bold; }

        .check { display: none; }

        /* --- Floating Summary Bar --- */
        .summary-bar {
            position: fixed; bottom: 0; left: 0; width: 100%;
            background: rgba(15, 15, 15, 0.95); backdrop-filter: blur(15px);
            border-top: 1px solid var(--border-color); padding: 15px 0; z-index: 999;
        }
        .summary-content {
            max-width: 900px; margin: 0 auto; padding: 0 25px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .total-text { font-size: 0.9rem; color: var(--text-dim); text-transform: uppercase; }
        .total-amount { font-size: 1.8rem; font-weight: 600; color: var(--rose-gold); }

        .book-btn {
            background: var(--rose-gold); color: #000; border: none;
            padding: 12px 35px; border-radius: 50px; font-weight: 700;
            cursor: pointer; transition: 0.3s; text-transform: uppercase; letter-spacing: 1px;
        }
        .book-btn:hover { background: var(--gold-light); transform: scale(1.05); }

        /* --- Popup Modal --- */
        .popup {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.9); z-index: 2000; justify-content: center; align-items: center;
        }
        .popup-content {
            background: #151515; width: 90%; max-width: 450px; padding: 30px;
            border-radius: 20px; border: 1px solid var(--rose-gold); max-height: 85vh; overflow-y: auto;
        }
        .popup-content h3 { color: var(--rose-gold); text-align: center; font-family: 'Playfair Display', serif; font-size: 1.8rem; }
        .popup-content input, .popup-content select {
            width: 100%; background: #222; border: 1px solid #333; color: #fff;
            padding: 12px; margin: 8px 0; border-radius: 8px; box-sizing: border-box;
        }
        .popup-content label { font-size: 0.8rem; color: var(--rose-gold); margin-top: 10px; display: block; }
        
        #serviceList { background: rgba(255,255,255,0.03); padding: 12px; border-radius: 10px; margin: 10px 0; font-size: 0.85rem; }
        .confirm-btn { width: 100%; padding: 15px; background: var(--rose-gold); border: none; border-radius: 10px; font-weight: bold; cursor: pointer; margin-top: 15px; font-size: 1rem; }
        .close { float: right; cursor: pointer; font-size: 1.5rem; color: var(--text-dim); }
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
            <li><a href="review.php">Reviews</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </nav>
</header>

<h1 class="page-title">Women's Premium Services</h1>

<div class="container">
    <div class="section-box" onclick="toggleSection('face')">Face & Skin Care</div>
    <div class="services" id="face">
        <div class="service-card" onclick="toggleCard(this)">
            <div><span class="service-name">Eyebrow</span><span class="service-price">₹50</span></div>
            <div class="check-circle"></div>
            <input type="checkbox" class="check" data-name="Eyebrow" data-price="50">
        </div>
        <div class="service-card" onclick="toggleCard(this)">
            <div><span class="service-name">Upperlips</span><span class="service-price">₹20</span></div>
            <div class="check-circle"></div>
            <input type="checkbox" class="check" data-name="Upperlips" data-price="20">
        </div>
        <div class="service-card" onclick="toggleCard(this)">
            <div><span class="service-name">Facial Basic</span><span class="service-price">₹500</span></div>
            <div class="check-circle"></div>
            <input type="checkbox" class="check" data-name="Facial Basic" data-price="500">
        </div>
        <div class="service-card" onclick="toggleCard(this)">
            <div><span class="service-name">Facial Premium</span><span class="service-price">₹3000</span></div>
            <div class="check-circle"></div>
            <input type="checkbox" class="check" data-name="Facial Premium" data-price="3000">
        </div>
        <div class="service-card" onclick="toggleCard(this)">
            <div><span class="service-name">Hydra Facial</span><span class="service-price">₹2500</span></div>
            <div class="check-circle"></div>
            <input type="checkbox" class="check" data-name="Hydra" data-price="2500">
        </div>
    </div>

    <div class="section-box" onclick="toggleSection('waxing')">Waxing & Body Care</div>
    <div class="services" id="waxing">
        <div class="service-card" onclick="toggleCard(this)">
            <div><span class="service-name">Full Body Wax</span><span class="service-price">₹2000</span></div>
            <div class="check-circle"></div>
            <input type="checkbox" class="check" data-name="Full Body Wax" data-price="2000">
        </div>
        <div class="service-card" onclick="toggleCard(this)">
            <div><span class="service-name">Aroma Oil Massage</span><span class="service-price">₹1500</span></div>
            <div class="check-circle"></div>
            <input type="checkbox" class="check" data-name="Aroma Oil Massage" data-price="1500">
        </div>
    </div>

    <div class="section-box" onclick="toggleSection('hair')">Hair Styling & Cuts</div>
    <div class="services" id="hair">
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">Straight Cut</span><span class="service-price">₹150</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="Straight Cut" data-price="150"></div>
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">U-Cut</span><span class="service-price">₹200</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="U-Cut" data-price="200"></div>
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">V-Cut</span><span class="service-price">₹250</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="V-Cut" data-price="250"></div>
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">Layer Cut</span><span class="service-price">₹300</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="Layer Cut" data-price="300"></div>
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">Step Cut</span><span class="service-price">₹350</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="Step Cut" data-price="350"></div>
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">Butterfly Cut</span><span class="service-price">₹450</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="Butterfly Cut" data-price="450"></div>
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">Wolf Cut</span><span class="service-price">₹500</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="Wolf Cut" data-price="500"></div>
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">Bob Cut</span><span class="service-price">₹400</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="Bob Cut" data-price="400"></div>
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">Feather Cut</span><span class="service-price">₹600</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="Feather Cut" data-price="600"></div>
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">Pixie Cut</span><span class="service-price">₹550</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="Pixie Cut" data-price="550"></div>
    </div>

    <div class="section-box" onclick="toggleSection('nail')">Nail Art & Extensions</div>
    <div class="services" id="nail">
        <div class="service-card" onclick="toggleCard(this)">
            <div><span class="service-name">Basic Nail Art</span><span class="service-price">₹600</span></div>
            <div class="check-circle"></div>
            <input type="checkbox" class="check" data-name="Basic Nail Art" data-price="600">
        </div>
        <div class="service-card" onclick="toggleCard(this)">
            <div><span class="service-name">Gel Extensions</span><span class="service-price">₹1500</span></div>
            <div class="check-circle"></div>
            <input type="checkbox" class="check" data-name="Gel Extensions" data-price="1500">
        </div>
    </div>

    <div class="section-box" onclick="toggleSection('makeup')">Professional Makeup</div>
    <div class="services" id="makeup">
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">Bridal Makeup</span><span class="service-price">₹5000</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="Bridal Makeup" data-price="5000"></div>
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">Party Makeup</span><span class="service-price">₹2500</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="Party Makeup" data-price="2500"></div>
        <div class="service-card" onclick="toggleCard(this)"><div><span class="service-name">HD Makeup</span><span class="service-price">₹4000</span></div><div class="check-circle"></div><input type="checkbox" class="check" data-name="HD Makeup" data-price="4000"></div>
    </div>

    <div class="section-box" onclick="toggleSection('bridal')">Special Packages</div>
    <div class="services" id="bridal">
        <div class="service-card" onclick="toggleCard(this)">
            <div><span class="service-name">Bridal Glow (Makeup+Hair+Spa)</span><span class="service-price">₹4999</span></div>
            <div class="check-circle"></div>
            <input type="checkbox" class="check" data-name="Makeup + Hair + Spa" data-price="4999">
        </div>
    </div>
</div>

<div class="summary-bar">
    <div class="summary-content">
        <div>
            <span class="total-text">Total Estimation</span>
            <div class="total-amount">₹<span id="total">0</span></div>
        </div>
        <button class="book-btn" onclick="openBooking()">Book Appointment</button>
    </div>
</div>

<div class="popup" id="popup">
    <div class="popup-content">
        <span class="close" onclick="closeBooking()">×</span>
        <h3>Reservation</h3>
        <p style="text-align:center; font-size:0.8rem; color:var(--rose-gold);">ID: <span id="bookingId"></span></p>
        
        <input type="text" id="custName" placeholder="Full Name">
        <input type="email" id="custEmail" placeholder="Email (name@gmail.com)">
        <input type="tel" id="custPhone" placeholder="Phone Number" maxlength="10">

        <label>Appointment Date</label>
        <input type="date" id="custDate" min="2026-03-01" max="2026-03-31" onchange="checkAvailability()">
        
        <label>Preferred Time</label>
        <input type="time" id="custTime" onchange="checkAvailability()">
        <p id="timeStatus" style="text-align:center; font-size:0.8rem;"></p>

        <label>Choose Specialist</label>
        <select id="staffSelect">
            <option value="">-- Select Staff --</option>
            <option value="Dhanashree Mane">Dhanashree Mane (Makeup/Nails)</option>
            <option value="Geeta Mane">Geeta Mane (Skin Specialist)</option>
            <option value="Suresh Mane">Suresh Mane (Hair Specialist)</option>
        </select>

        <h4>Summary</h4>
        <div id="serviceList"></div>
        <p style="text-align:right; font-weight:bold;">Payable: ₹<span id="popupTotal">0</span></p>
        <button class="confirm-btn" onclick="confirmBooking()">Confirm Reservation</button>
    </div>
</div>

<script>
    function toggleSection(id){
        const section = document.getElementById(id);
        const allSections = document.querySelectorAll('.services');
        const isOpen = section.style.display === "grid";
        allSections.forEach(s => s.style.display = "none");
        section.style.display = isOpen ? "none" : "grid";
    }

    function toggleCard(card){
        const checkbox = card.querySelector('.check');
        checkbox.checked = !checkbox.checked;
        card.classList.toggle('selected', checkbox.checked);
        updateTotal();
    }

    function updateTotal(){
        const checks = document.querySelectorAll(".check");
        let total = 0;
        let selected = [];
        checks.forEach(c => {
            if(c.checked){
                total += parseInt(c.dataset.price);
                selected.push({name: c.dataset.name, price: c.dataset.price});
            }
        });
        document.getElementById("total").innerText = total;
        localStorage.setItem("selectedServices", JSON.stringify(selected));
    }

    function generateBookingId(){ return "PHX" + Math.floor(100000 + Math.random() * 900000); }

    function openBooking(){
        let services = JSON.parse(localStorage.getItem("selectedServices")) || [];
        if(services.length === 0){ alert("Please select at least one service!"); return; }
        
        let listHTML = "";
        let total = 0;
        services.forEach(s => {
            listHTML += `<div style="display:flex; justify-content:space-between;"><span>${s.name}</span><span>₹${s.price}</span></div>`;
            total += parseInt(s.price);
        });
        
        document.getElementById("serviceList").innerHTML = listHTML;
        document.getElementById("popupTotal").innerText = total;
        document.getElementById("bookingId").innerText = generateBookingId();
        document.getElementById("popup").style.display = "flex";
    }

    function closeBooking(){ document.getElementById("popup").style.display = "none"; }

    function checkAvailability(){
        let date = document.getElementById("custDate").value;
        let time = document.getElementById("custTime").value;
        let bookings = JSON.parse(localStorage.getItem("salonBookings")) || [];
        let count = bookings.filter(b => b.date === date && b.time === time).length;
        let status = document.getElementById("timeStatus");
        
        if(!date || !time) return;
        if(count >= 3){
            status.innerText = "❌ Slot Full"; status.style.color = "#ff4d4d";
        } else {
            status.innerText = "✅ Available (" + (3-count) + " slots left)"; status.style.color = "#2ecc71";
        }
    }

    function confirmBooking(){
        let name = document.getElementById("custName").value;
        let email = document.getElementById("custEmail").value;
        let phone = document.getElementById("custPhone").value;
        let date = document.getElementById("custDate").value;
        let time = document.getElementById("custTime").value;
        let staff = document.getElementById("staffSelect").value;

        if(!name || !email || !phone || !date || !time || !staff) { alert("Please fill all details!"); return; }

        if(!/^[a-z0-9._%+-]+@gmail\.com$/.test(email)){ alert("Use name@gmail.com format"); return; }
        if(!/^[6-9]\d{9}$/.test(phone)){ alert("Invalid 10-digit phone number"); return; }
        
        let bookingData = {
            id: document.getElementById("bookingId").innerText,
            name: name, 
            email: email,
            phone: phone,
            staff: staff,
            date: date, 
            time: time,
            services: JSON.parse(localStorage.getItem("selectedServices")),
            total: document.getElementById("popupTotal").innerText,
            gender: 'women' // <--- सुधारलेला बदल: आता हा डेटा फक्त फीमेल बुकिंगसाठी जाईल
        };

        // --- डेटाबेसमध्ये डेटा पाठवणे ---
        fetch('save_booking.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(bookingData)
        })
        .then(response => response.json())
        .then(res => {
            if(res.status === "success") {
                let allBookings = JSON.parse(localStorage.getItem("salonBookings")) || [];
                allBookings.push(bookingData);
                localStorage.setItem("salonBookings", JSON.stringify(allBookings));
                localStorage.setItem("latestBooking", JSON.stringify(bookingData));
                
                alert("Appointment Booked Successfully!");
                window.location.href = "booking.php";
            } else {
                alert("Error: " + res.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Database Connection Error!");
        });
    }
</script>
</body>
</html>