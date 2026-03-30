<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>Cart</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="shop.css">

<style>

.cart-container{
margin-left:240px;
padding:40px;
}

.cart-item{
display:flex;
align-items:center;
gap:20px;
background:rgba(255,255,255,0.05);
padding:15px;
border-radius:12px;
margin-bottom:15px;
}

.cart-item img{
width:80px;
height:80px;
object-fit:cover;
border-radius:10px;
}

.cart-info{
flex:1;
}

.cart-info h3{
color:#ff79c6;
}

.cart-actions button{
margin:5px;
padding:5px 10px;
border:none;
border-radius:6px;
cursor:pointer;
background:#ff4fa3;
color:white;
}

.total{
margin-top:20px;
font-size:20px;
font-weight:600;
}

.checkout-btn{
margin-top:20px;
padding:12px 25px;
border:none;
border-radius:25px;
cursor:pointer;
background:linear-gradient(90deg,#ff4fa3,#ff79c6);
color:white;
}

</style>

</head>

<body class="shop-body">

<div class="shop-sidebar">

<h2>Shop</h2>

<ul>
<li><a href="hair.php">Hair</a></li>
<li><a href="skin.php">Skin</a></li>
<li><a href="makeup.php">Makeup</a></li>
<li><a href="nails.php">Nails</a></li>
</ul>

</div>

<div class="cart-container">

<h1>Your Cart 🛒</h1>

<div id="cartItems"></div>

<div class="total" id="totalPrice"></div>

<button class="checkout-btn" onclick="goToPayment()">Checkout</button>
</div>

<script src="cart.js"></script>

</body>
</html>