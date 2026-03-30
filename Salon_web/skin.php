<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>Skin Products</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="shop.css">

</head>

<body class="shop-body">

<div class="shop-sidebar">

<h2>Shop</h2>

<ul>
<li><a href="hair.php">Hair</a></li>
<li class="active"><a href="skin.php">Skin</a></li>
<li><a href="makeup.php">Makeup</a></li>
<li><a href="nails.php">Nails</a></li>
</ul>

</div>

<div class="shop-main">

<a href="cart.php">
<button style="margin-bottom:20px;">Go to Cart 🛒</button>
</a>

<h1>Skin Products</h1>

<input type="text" id="search" placeholder="Search product">

<div class="product-grid">

<!-- PRODUCT 1 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/61OFfAjyX2L._SL1500_.jpg">

<h3>Face Wash</h3>

<p class="short-desc">
Vitamin C brightening face wash...
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Vitamin C + E face wash that removes dirt and brightens skin.
<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹349</p>

<button>Add to Cart</button>
</div>

<!-- PRODUCT 2 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/51ofuGjgVJL._SX522_.jpg">

<h3>Face Serum</h3>

<p class="short-desc">
Skin brightening Vitamin C serum...
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Vitamin C serum that improves skin tone and texture.
<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹799</p>

<button>Add to Cart</button>
</div>

<!-- PRODUCT 3 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/61dqE68F11L._SX522_.jpg">

<h3>Foxtale De-Tan Mask</h3>

<p class="short-desc">
Short description...
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Long description here...
<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹799</p>

<button>Add to Cart</button>
</div>

<!-- PRODUCT 4 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/31AfhBaljaL._SY300_SX300_QL70_FMwebp_.jpg">

<h3>Pilgrim Toner</h3>

<p class="short-desc">
Pilgrim Korean Beauty White Lotus Refreshing Face Mist & Toner

<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Pilgrim Korean Beauty White Lotus Refreshing Face Mist & Toner | Toner for glowing skin | Alcohol-Free Mist & toner for open pores Tightening | Korean skin care products | Women & Men | 100 ml

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹799</p>

<button>Add to Cart</button>
</div>

<!-- PRODUCT 5 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/31MmhbxNNlL._SX342_SY445_QL70_FMwebp_.jpg">

<h3>CeraVe Foaming Cleanser</h3>

<p class="short-desc">
CeraVe Foaming Cleanser For Normal To Oily Skin 
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
CeraVe Foaming Cleanser For Normal To Oily Skin (236ml) - Dermatologist-Developed Facewash | Non-Comedogenic And Fragrance-Free Cleansers For Acne-Prone Skin

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹799</p>

<button>Add to Cart</button>
</div>

<!-- PRODUCT 6 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/21bGcxdU99L._SY300_SX300_QL70_FMwebp_.jpg">

<h3>Plum Night Gel</h3>

<p class="short-desc">
    Plum Green Tea Renewed Clarity Night Gel Mini
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Plum Green Tea Renewed Clarity Night Gel Mini | Hydrates Skin & Fights Acne | Lightweight, Quick-Absorbing, Non-Sticky Gel Texture | Oily, Acne-Prone Skin | 100% Vegan(15ml)

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹799</p>

<button>Add to Cart</button>
</div>

</div>

</div>

<script src="shop.js"></script>

</body>
</html>