<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>Product Details</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="shop.css">

<style>

/* PRODUCT PAGE */
.product-container{
display:flex;
gap:40px;
padding:50px;
margin-left:240px;
}

/* IMAGE */
.product-img{
flex:1;
}

.product-img img{
width:100%;
border-radius:12px;
box-shadow:0 0 20px rgba(255,79,163,0.5);
}

/* DETAILS */
.product-details{
flex:1;
display:flex;
flex-direction:column;
justify-content:center;
}

.product-details h1{
color:#ff79c6;
margin-bottom:20px;
}

.product-details p{
margin-bottom:15px;
font-size:15px;
}

.product-price{
font-size:24px;
font-weight:600;
margin-bottom:20px;
}

/* BUTTONS */
.product-buttons button{
padding:12px 25px;
margin-right:10px;
border:none;
border-radius:25px;
cursor:pointer;
background:linear-gradient(90deg,#ff4fa3,#ff79c6);
color:white;
box-shadow:0 0 10px rgba(255,79,163,0.6);
transition:0.3s;
}

.product-buttons button:hover{
transform:scale(1.05);
}

</style>

</head>

<body class="shop-body">

<!-- SIDEBAR SAME -->
<div class="shop-sidebar">

<h2>Shop</h2>

<ul>
<li><a href="hair.php">Hair</a></li>
<li><a href="skin.php">Skin</a></li>
<li><a href="makeup.php">Makeup</a></li>
<li><a href="nails.php">Nails</a></li>
</ul>

</div>

<!-- PRODUCT SECTION -->
<div class="product-container">

<div class="product-img">
<img id="productImg" src="">
</div>

<div class="product-details">

<h1 id="productName"></h1>

<p id="productDesc"></p>

<div class="product-price" id="productPrice"></div>

<div class="product-buttons">
<button onclick="addToCart()">Add to Cart 🛒</button>
<button onclick="buyNow()">Buy Now ⚡</button>
</div>

</div>

</div>

<script src="product.js"></script>

</body>
</html>