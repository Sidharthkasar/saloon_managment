<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>Makeup Products</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="shop.css">

</head>

<body class="shop-body">

<div class="shop-sidebar">

<h2>Shop</h2>

<ul>
<li><a href="hair.php">Hair</a></li>
<li><a href="skin.php">Skin</a></li>
<li class="active"><a href="makeup.php">Makeup</a></li>
<li><a href="nails.php">Nails</a></li>
</ul>

</div>

<div class="shop-main">

<a href="cart.php">
<button style="margin-bottom:20px;">Go to Cart 🛒</button>
</a>

<h1>Makeup Products</h1>

<input type="text" id="search" placeholder="Search product">

<div class="product-grid">

<!-- PRODUCT 1 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/41esolOYiwL._SY300_SX300_QL70_FMwebp_.jpg">
<h3>INSIGHT 3-in-1 Primer </h3>

<p class="short-desc">
INSIGHT 3-in-1 Primer | Matte Finish | Primes, Protects & Moisturizes
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
INSIGHT 3-in-1 Primer | Matte Finish | Primes, Protects & Moisturizes | Oil-Free with Pore Blurring | Long-Lasting Formula | For All Skin Types | 30ml

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹499</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 2 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/318VN6JPZmL._SY300_SX300_QL70_FMwebp_.jpg">
<h3>Flicka Moisturizer</h3>

<p class="short-desc">
FLiCKA Silk Touch 3 in 1 Moisturizer and Primer for Face 
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
FLiCKA Silk Touch 3 in 1 Moisturizer and Primer for Face | Hydrating, Lightweight, Long-Lasting | Pore Minimizer | Dermatologically Tested | All Skin Types | Makeup Base | 60g | Cruelty-Free (Pack of 1)

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹499</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 3 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/31rmyIJWXiL._SY300_SX300_QL70_FMwebp_.jpg">
<h3>Recode Makeup Fixer</h3>

<p class="short-desc">
Recode Perfect Grip Spray Makeup Fixer 50 Ml|Dewy Finish
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Recode Perfect Grip Spray Makeup Fixer 50 Ml|Dewy Finish|Vitamin E Enriched|Long Lasting|Keeps Makeup Intact|Hydrates, Soothes & Refreshes Skin

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹499</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 4 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/517WvzmVvpL._SL1500_.jpg">
<h3>Swiss Beauty Real Makeup Base</h3>

<p class="short-desc">
Swiss Beauty Real Makeup Base Highlighting Primer
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Swiss Beauty Real Makeup Base Highlighting Primer| Skin-Hydrating Poreless Primer With Natural Glow Finish For Face Makeup |Shade - 01 Natural Tint, 32Ml

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹499</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 5 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/61aGE1I0CjL._SL1500_.jpg">
<h3>MARS compact</h3>

<p class="short-desc">
MARS Oil Blotter Gel Compact for Poreless Effect (5gm) with Applicator
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
MARS Oil Blotter Gel Compact for Poreless Effect (5gm) with Applicator | Oil Control | Mattifying Formula | Long-Lasting | Shine Free Matte Finish |...

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹499</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 6 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/31N9mBEqDJL._SY300_SX300_QL70_FMwebp_.jpg">
<h3>L'Oreal Paris</h3>

<p class="short-desc">
L'Oreal Paris Infallible 24H Tinted Serum Foundation
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
L'Oreal Paris Infallible 24H Tinted Serum Foundation, Light-Weight Coverage, Dewy & Radiant Finish, Transfer-Proof, 30Ml

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹499</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 7 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/517sefDJNzL._SL1080_.jpg">
<h3>Ruby's cream Blush</h3>

<p class="short-desc">
Ruby’s Organics Soft Matte Cream Blush- Blush for Cheeks
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Ruby’s Organics Soft Matte Cream Blush- Blush for Cheeks, Matte Finish, Face Makeup- Enriched with Antioxidants and Vitamins, Chemical Free, 4.8g - Deep Rose

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹499</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 8 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/6128ANXX0mL._SL1500_.jpg">
<h3>FACES CANADA Lipstick </h3>

<p class="short-desc">
FACES CANADA Comfy Matte Wow Liquid Lipstick
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
FACES CANADA Comfy Matte Wow Liquid Lipstick - Cocoa Crush 07 (Brown) 3.8ml | One Swipe Application | Highly Pigmented | Comfortable Wear | Glides Smoothly...

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹499</p>
<button>Add to Cart</button>
</div>

</div>

</div>

<script src="shop.js"></script>

</body>
</html>