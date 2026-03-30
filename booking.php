<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking Confirmation - Phoenix Salon</title>

<link rel="stylesheet" href="booking.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</head>

<body>

<div class="container">

<div class="success-icon">✔</div>

<h1>Booking Confirmed</h1>

<p class="subtitle">Your appointment has been successfully booked</p>

<div class="booking-card">

<h2>Appointment Details</h2>

<p><b>Booking ID:</b> <span id="bid"></span></p>
<p><b>Name:</b> <span id="bname"></span></p>
<p><b>Phone:</b> <span id="bphone"></span></p>
<p><b>Date:</b> <span id="bdate"></span></p>
<p><b>Time:</b> <span id="btime"></span></p>

<div class="services">
<h3>Selected Services</h3>
<div id="serviceList"></div>
</div>

<h2 class="total">Total : ₹ <span id="btotal"></span></h2>

</div>

<div class="buttons">

<button onclick="downloadPDF()">Download PDF</button>

<button onclick="sendWhatsApp()">Send via WhatsApp</button>

<a href="index.php">
<button class="home-btn">Back to Home</button>
</a>

</div>

</div>

<script src="booking.js"></script>

</body>
</html>