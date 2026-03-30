<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Payment</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

body{
    font-family:Poppins;
    background:linear-gradient(135deg,#1e1e2f,#3a0ca3);
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.container{
    background:#111;
    padding:30px;
    border-radius:15px;
    width:350px;
    box-shadow:0 0 25px rgba(0,0,0,0.6);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

/* BUTTON OPTIONS */

.options button{
    width:100%;
    padding:10px;
    margin:6px 0;
    border:none;
    border-radius:8px;
    cursor:pointer;
    background:#222;
    color:white;
}

.options button.active{
    background:#ff4da6;
}

/* INPUT */

input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:none;
    border-radius:8px;
}

/* MAIN BUTTON */

.payBtn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:#ff4da6;
    color:white;
    font-weight:600;
    cursor:pointer;
    margin-top:15px;
}

.payBtn:hover{
    background:#ff1a8c;
}

/* QR BOX */

.qr{
    text-align:center;
    display:none;
}

.qr img{
    width:200px;
    margin:15px 0;
    border-radius:10px;
}

/* SUCCESS */

.success{
    text-align:center;
    display:none;
}

</style>

</head>

<body>

<div class="container">

<h2>Choose Payment</h2>

<!-- OPTIONS -->
<div class="options">
    <button onclick="selectMethod('card')" id="cardBtn">💳 Card Payment</button>
    <button onclick="selectMethod('upi')" id="upiBtn">📱 UPI Payment</button>
    <button onclick="selectMethod('cod')" id="codBtn">🚚 Cash on Delivery</button>
</div>

<!-- CARD -->
<div id="cardBox" style="display:none;">
    <input type="text" placeholder="Card Number">
    <input type="text" placeholder="Card Holder Name">
    <input type="text" placeholder="Expiry (MM/YY)">
    <input type="text" placeholder="CVV">
</div>

<!-- UPI QR -->
<div class="qr" id="upiBox">
    <p>Scan & Pay</p>

    <!-- Sample QR (replace with your UPI QR later) -->
    <img src="upiQR..jpg">

    <p>After payment click below</p>
</div>

<!-- COD MESSAGE -->
<div id="codBox" style="display:none; text-align:center; margin-top:10px;">
    <p>Pay cash at delivery 🚚</p>
</div>

<button class="payBtn" onclick="payNow()">Confirm Order</button>

<!-- SUCCESS -->
<div class="success" id="successBox">
    <h2>✅ Order Placed</h2>
    <p>Thank you for shopping!</p>
    <button class="payBtn" onclick="goHome()">Go to Shop</button>
</div>

</div>

<script>

let method = "";

// SELECT METHOD
function selectMethod(type){

    method = type;

    // reset
    document.getElementById("cardBox").style.display = "none";
    document.getElementById("upiBox").style.display = "none";
    document.getElementById("codBox").style.display = "none";

    document.getElementById("cardBtn").classList.remove("active");
    document.getElementById("upiBtn").classList.remove("active");
    document.getElementById("codBtn").classList.remove("active");

    if(type === "card"){
        document.getElementById("cardBox").style.display = "block";
        document.getElementById("cardBtn").classList.add("active");
    }

    if(type === "upi"){
        document.getElementById("upiBox").style.display = "block";
        document.getElementById("upiBtn").classList.add("active");
    }

    if(type === "cod"){
        document.getElementById("codBox").style.display = "block";
        document.getElementById("codBtn").classList.add("active");
    }
}

// PAYMENT
function payNow(){

    if(method === ""){
        alert("Please select payment method");
        return;
    }

    // UPI / COD / CARD handled same (demo)
    document.querySelector(".options").style.display = "none";
    document.getElementById("cardBox").style.display = "none";
    document.getElementById("upiBox").style.display = "none";
    document.getElementById("codBox").style.display = "none";

    document.getElementById("successBox").style.display = "block";

    localStorage.removeItem("cart");
}

// REDIRECT
function goHome(){
    window.location.href="shop.php";
}

</script>

</body>
</html>