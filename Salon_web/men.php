<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Men's Premium Services | Phoenix Unisex Salon & Spa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --gold: #d4af37;
            --gold-bright: #f1c40f;
            --dark: #0a0a0a;
            --card-bg: #151515;
            --glass: rgba(255, 255, 255, 0.03);
            --border: rgba(212, 175, 55, 0.2);
            --shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        body {
            background-color: var(--dark);
            color: #eee;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding-bottom: 120px; /* Space for sticky bar */
        }

        /* --- Header --- */
        header {
            display: flex; justify-content: space-between; align-items: center;
            padding: 15px 6%; background: rgba(0,0,0,0.9);
            border-bottom: 1px solid var(--border); position: sticky; top: 0; z-index: 1000;
            backdrop-filter: blur(10px);
        }
        .logo { display: flex; align-items: center; gap: 12px; }
        .logo img { width: 45px; }
        .logo-text h2 { margin: 0; font-family: 'Playfair Display', serif; color: var(--gold); letter-spacing: 2px; font-size: 1.4rem; }
        .logo-text span { font-size: 0.7rem; color: #777; letter-spacing: 3px; text-transform: uppercase; }

        nav ul { display: flex; list-style: none; gap: 25px; margin: 0; }
        nav ul li a { text-decoration: none; color: #bbb; font-size: 0.85rem; transition: 0.3s; font-weight: 400; }
        nav ul li a:hover { color: var(--gold); }

        /* --- Title Section --- */
        .page-header {
            text-align: center; padding: 60px 20px 40px;
            background: linear-gradient(to bottom, #111, var(--dark));
        }
        .page-header h1 { 
            font-family: 'Playfair Display', serif; font-size: 2.8rem; margin: 0; 
            background: linear-gradient(45deg, #b8860b, #f1c40f, #b8860b);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            text-transform: uppercase; letter-spacing: 4px;
        }
        .page-header p { color: #666; font-size: 0.9rem; letter-spacing: 2px; margin-top: 10px; }

        .container { max-width: 1000px; margin: 0 auto; padding: 0 20px; }

        /* --- Section Headers --- */
        .section-box {
            background: var(--glass); border: 1px solid var(--border);
            padding: 20px 30px; margin-top: 25px; border-radius: 15px;
            cursor: pointer; display: flex; justify-content: space-between; align-items: center;
            transition: 0.3s; font-weight: 600; letter-spacing: 1px; color: var(--gold);
        }
        .section-box:hover { background: rgba(212, 175, 55, 0.05); transform: translateY(-2px); }
        .section-box::after { content: '→'; transition: 0.3s; }
        .section-box.active::after { transform: rotate(90deg); }

        /* --- Services Grid --- */
        .services {
            display: none; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px; padding: 25px 0; animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .service-card {
            background: var(--card-bg); border: 1px solid #222;
            padding: 25px; border-radius: 20px; text-align: left;
            cursor: pointer; transition: all 0.4s ease; position: relative;
            display: flex; justify-content: space-between; align-items: center;
        }
        .service-card:hover { border-color: var(--gold); transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.4); }
        
        .service-card.selected { 
            border-color: var(--gold); 
            background: rgba(212, 175, 55, 0.08);
            box-shadow: inset 0 0 15px rgba(212, 175, 55, 0.1);
        }
        
        .service-info h4 { margin: 0; font-size: 1.05rem; font-weight: 500; color: #fff; }
        .service-info .price { color: var(--gold); font-weight: 600; display: block; margin-top: 5px; font-size: 1.2rem; }

        .check-indicator {
            width: 24px; height: 24px; border: 2px solid #333; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; transition: 0.3s;
        }
        .selected .check-indicator { background: var(--gold); border-color: var(--gold); }
        .selected .check-indicator::after { content: '✓'; color: #000; font-size: 14px; font-weight: bold; }

        /* --- Floating Summary Bar --- */
        .summary-bar {
            position: fixed; bottom: 0; left: 0; width: 100%;
            background: rgba(15, 15, 15, 0.95); backdrop-filter: blur(15px);
            border-top: 1px solid var(--border); padding: 20px 0; z-index: 999;
        }
        .summary-content {
            max-width: 1000px; margin: 0 auto; padding: 0 25px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .total-info h2 { margin: 0; font-size: 0.9rem; color: #888; text-transform: uppercase; letter-spacing: 1px; }
        .total-info .amount { font-size: 2rem; color: #fff; font-weight: 600; }
        .total-info .amount span { color: var(--gold); }

        .book-btn {
            background: linear-gradient(45deg, #b8860b, #f1c40f);
            color: #000; border: none; padding: 15px 45px; border-radius: 50px;
            font-weight: 700; cursor: pointer; font-size: 1rem; text-transform: uppercase;
            box-shadow: 0 5px 20px rgba(212, 175, 55, 0.3); transition: 0.3s;
        }
        .book-btn:hover { transform: scale(1.05); box-shadow: 0 8px 25px rgba(212, 175, 55, 0.5); }

        /* --- Custom Checkbox Hidden --- */
        .check { display: none; }

        /* --- Modal Styling --- */
        .modal {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.9); z-index: 2000; justify-content: center; align-items: center;
            backdrop-filter: blur(8px);
        }
        .modal-content {
            background: #111; width: 90%; max-width: 480px; padding: 40px;
            border-radius: 30px; border: 1px solid var(--gold); max-height: 90vh; overflow-y: auto;
        }
        .modal-content h3 { font-family: 'Playfair Display', serif; color: var(--gold); font-size: 2rem; margin-top: 0; text-align: center; }
        .modal-content input, .modal-content select, .modal-content textarea {
            width: 100%; background: #1a1a1a; border: 1px solid #333; color: #fff;
            padding: 15px; margin: 10px 0; border-radius: 12px; font-family: inherit;
            box-sizing: border-box; /* Ensures padding doesn't break width */
        }
        .modal-content label { font-size: 0.75rem; color: var(--gold); text-transform: uppercase; margin-left: 5px; display: block; }
        
        #serviceListDisplay { background: rgba(255,255,255,0.03); padding: 15px; border-radius: 15px; margin: 15px 0; font-size: 0.9rem; }
        .final-btn { width: 100%; padding: 18px; background: var(--gold); border: none; border-radius: 15px; font-weight: bold; cursor: pointer; font-size: 1rem; margin-top: 20px; }
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

<div class="page-header">
    <h1>Men's Premium Services</h1>
    <p>Luxury grooming tailored for the modern gentleman</p>
</div>

<div class="container">
    <div class="section-box" onclick="toggleSection('hair', this)">Hair Excellence</div>
    <div class="services" id="hair">
        <div class="service-card" onclick="toggleCard(this)">
            <div class="service-info"><h4>Normal Haircut</h4><span class="price">₹150</span></div>
            <div class="check-indicator"></div>
            <input type="checkbox" class="check" data-name="Normal Haircut" data-price="150">
        </div>
        <div class="service-card" onclick="toggleCard(this)">
            <div class="service-info"><h4>Long Haircut</h4><span class="price">₹200</span></div>
            <div class="check-indicator"></div>
            <input type="checkbox" class="check" data-name="Long Haircut" data-price="200">
        </div>
        <div class="service-card" onclick="toggleCard(this)">
            <div class="service-info"><h4>Regular (Boys)</h4><span class="price">₹100</span></div>
            <div class="check-indicator"></div>
            <input type="checkbox" class="check" data-name="Regular Boys Haircut" data-price="100">
        </div>
    </div>

    <div class="section-box" onclick="toggleSection('shaving', this)">Shaving & Beard Art</div>
    <div class="services" id="shaving">
        <div class="service-card" onclick="toggleCard(this)">
            <div class="service-info"><h4>Regular Shaving</h4><span class="price">₹70</span></div>
            <div class="check-indicator"></div>
            <input type="checkbox" class="check" data-name="Regular Shaving" data-price="70">
        </div>
        <div class="service-card" onclick="toggleCard(this)">
            <div class="service-info"><h4>Special Shaving</h4><span class="price">₹100</span></div>
            <div class="check-indicator"></div>
            <input type="checkbox" class="check" data-name="Special Shaving" data-price="100">
        </div>
    </div>

    <div class="section-box" onclick="toggleSection('face', this)">Skin & Facial Care</div>
    <div class="services" id="face">
        <div class="service-card" onclick="toggleCard(this)"><div class="service-info"><h4>Hydra Facial</h4><span class="price">₹3000</span></div><div class="check-indicator"></div><input type="checkbox" class="check" data-name="Hydra Facial" data-price="3000"></div>
        <div class="service-card" onclick="toggleCard(this)"><div class="service-info"><h4>Gold Facial</h4><span class="price">₹1000</span></div><div class="check-indicator"></div><input type="checkbox" class="check" data-name="Gold Facial" data-price="1000"></div>
        <div class="service-card" onclick="toggleCard(this)"><div class="service-info"><h4>O3+ Facial</h4><span class="price">₹3000</span></div><div class="check-indicator"></div><input type="checkbox" class="check" data-name="O3+ Facial" data-price="3000"></div>
        <div class="service-card" onclick="toggleCard(this)"><div class="service-info"><h4>D-TAN</h4><span class="price">₹300</span></div><div class="check-indicator"></div><input type="checkbox" class="check" data-name="D-Tan" data-price="300"></div>
    </div>

    <div class="section-box" onclick="toggleSection('treatment', this)">Advanced Hair Treatment</div>
    <div class="services" id="treatment">
        <div class="service-card" onclick="toggleCard(this)"><div class="service-info"><h4>Smoothing</h4><span class="price">₹1500</span></div><div class="check-indicator"></div><input type="checkbox" class="check" data-name="Smoothing" data-price="1500"></div>
        <div class="service-card" onclick="toggleCard(this)"><div class="service-info"><h4>Keratin</h4><span class="price">₹600</span></div><div class="check-indicator"></div><input type="checkbox" class="check" data-name="Keratin" data-price="600"></div>
        <div class="service-card" onclick="toggleCard(this)"><div class="service-info"><h4>Botox Treatment</h4><span class="price">₹1200</span></div><div class="check-indicator"></div><input type="checkbox" class="check" data-name="Botox" data-price="1200"></div>
    </div>

    <div class="section-box" onclick="toggleSection('combo', this)">Luxury Combos</div>
    <div class="services" id="combo">
        <div class="service-card" onclick="toggleCard(this)">
            <div class="service-info"><h4>The Royal Grooming</h4><p style="font-size:0.7rem; color:#888;">Haircut + Beard + Facial</p><span class="price">₹1299</span></div>
            <div class="check-indicator"></div>
            <input type="checkbox" class="check" data-name="The Royal Combo" data-price="1299">
        </div>
    </div>
</div>

<div class="summary-bar">
    <div class="summary-content">
        <div class="total-info">
            <h2>Your Selection</h2>
            <div class="amount"><span>₹</span><span id="total">0</span></div>
        </div>
        <button class="book-btn" onclick="openBooking()">Book Appointment</button>
    </div>
</div>

<div class="modal" id="bookingModal">
    <div class="modal-content">
        <span style="float:right; cursor:pointer; color:#888;" onclick="closeBooking()">✕</span>
        <h3>Book Slot</h3>
        <p style="text-align:center; color:#666; font-size:0.8rem;">Booking ID: <span id="bookingId" style="color:var(--gold);"></span></p>

        <input type="text" id="custName" placeholder="Enter Full Name">
        <input type="email" id="custEmail" placeholder="Email (name@gmail.com)">
        <input type="tel" id="custPhone" placeholder="10 Digit Phone Number" maxlength="10">

        <div style="display:flex; gap:10px;">
            <div style="flex:1;"><label>Date</label><input type="date" id="custDate" onchange="checkAvailability()"></div>
            <div style="flex:1;"><label>Time</label><input type="time" id="custTime" onchange="checkAvailability()" style="display: block; width: 100%;"></div>
        </div>
        <p id="timeStatus" style="text-align:center; font-size:0.8rem; margin:5px 0;"></p>

        <label>Select Specialist</label>
        <select id="staffSelect">
            <option value="">-- Choose One --</option>
            <option value="Suresh Mane|Hair">Suresh Mane (Hair Specialist)</option>
            <option value="Yash Mane|Skin">Yash Mane (Skin Specialist)</option>
            <option value="Kumar|Grooming">Kumar (Grooming Expert)</option>
        </select>

        <h4>Summary</h4>
        <div id="serviceListDisplay"></div>
        <p style="text-align:right; font-weight:bold; font-size:1.1rem;">Total: ₹<span id="modalTotal">0</span></p>

        <button class="final-btn" onclick="confirmBooking()">Confirm Appointment</button>
    </div>
</div>

<script>
    // Toggle Sections
    function toggleSection(id, element) {
        const target = document.getElementById(id);
        const isOpen = target.style.display === "grid";
        
        // Close all sections first
        document.querySelectorAll('.services').forEach(s => s.style.display = "none");
        document.querySelectorAll('.section-box').forEach(b => b.classList.remove('active'));

        if(!isOpen) {
            target.style.display = "grid";
            element.classList.add('active');
        }
    }

    // Toggle Card Selection
    function toggleCard(card) {
        const checkbox = card.querySelector('.check');
        checkbox.checked = !checkbox.checked;
        card.classList.toggle('selected', checkbox.checked);
        updateTotal();
    }

    // Update Global Total
    function updateTotal() {
        let total = 0;
        let selected = [];
        document.querySelectorAll('.check:checked').forEach(cb => {
            total += parseInt(cb.dataset.price);
            selected.push({name: cb.dataset.name, price: cb.dataset.price});
        });
        document.getElementById('total').innerText = total;
        localStorage.setItem("selectedServices", JSON.stringify(selected));
    }

    // Modal Logic
    function generateID() { return "PHX" + Math.floor(100000 + Math.random() * 899999); }

    function openBooking() {
        let services = JSON.parse(localStorage.getItem("selectedServices")) || [];
        if(services.length === 0) { alert("Please select at least one service!"); return; }

        let listHTML = "";
        services.forEach(s => {
            listHTML += `<div style="display:flex; justify-content:space-between; margin-bottom:5px;">
                            <span>${s.name}</span><span>₹${s.price}</span>
                         </div>`;
        });
        
        document.getElementById('serviceListDisplay').innerHTML = listHTML;
        document.getElementById('modalTotal').innerText = document.getElementById('total').innerText;
        document.getElementById('bookingId').innerText = generateID();
        document.getElementById('bookingModal').style.display = "flex";
    }

    function closeBooking() { document.getElementById('bookingModal').style.display = "none"; }

    function checkAvailability() {
        let date = document.getElementById("custDate").value;
        let time = document.getElementById("custTime").value;
        let status = document.getElementById("timeStatus");
        if(!date || !time) return;

        let bookings = JSON.parse(localStorage.getItem("salonBookings")) || [];
        let count = bookings.filter(b => b.date === date && b.time === time).length;

        if(count >= 3) {
            status.innerText = "❌ This slot is full";
            status.style.color = "#ff4d4d";
        } else {
            status.innerText = "✅ Slot Available";
            status.style.color = "#2ecc71";
        }
    }

    function confirmBooking() {
        const name = document.getElementById('custName').value;
        const email = document.getElementById('custEmail').value;
        const phone = document.getElementById('custPhone').value;
        const staff = document.getElementById('staffSelect').value;
        const date = document.getElementById('custDate').value;
        const time = document.getElementById('custTime').value;

        if(!name || !email || !phone || !date || !time || !staff) {
            alert("Please fill in all details!");
            return;
        }

        let bookingData = {
            id: document.getElementById('bookingId').innerText,
            name: name,
            email: email,
            phone: phone,
            staff: staff,
            date: date,
            time: time,
            services: JSON.parse(localStorage.getItem("selectedServices")),
            total: document.getElementById('modalTotal').innerText,
            gender: 'men' // १. बदल: जेंडर ॲड केलं
        };

        // --- बदल: फाईलचे नाव save_men_booking.php केलं ---
        fetch('save_men_booking.php', {
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

                alert("Booking Successful!");
                window.location.href = "booking.php";
            } else {
                alert("Error: " + res.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Database Connection Error! Please check your XAMPP.");
        });
    }
</script>

</body>
</html>