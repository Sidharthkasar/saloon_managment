<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>Hair Products</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="shop.css">

</head>

<body class="shop-body">

<div class="shop-sidebar">

<h2>Shop</h2>

<ul>
<li class="active"><a href="hair.php">Hair</a></li>
<li><a href="skin.php">Skin</a></li>
<li><a href="makeup.php">Makeup</a></li>
<li><a href="nails.php">Nails</a></li>
</ul>

</div>

<div class="shop-main">

<a href="cart.php">
<button style="margin-bottom:20px;">Go to Cart 🛒</button>
</a>

<h1>Hair Products</h1>

<input type="text" id="search" placeholder="Search product">

<div class="product-grid">

<!-- PRODUCT 1 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/61+E122rtmL._SX522_.jpg">
<h3>Loreal Shampoo</h3>

<p class="short-desc">
Professional hair care shampoo for smooth hair...
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Professional shampoo that deeply cleans scalp and strengthens hair roots.
<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹1,045</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 2 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/41MZm7lsyWL._SX522_.jpg">
<h3>BA-Rosemary & Rice Water</h3>

<p class="short-desc">
Smoothening hair serum for frizz control...
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Hair serum that protects hair from damage and adds shine.
<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹343</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 3 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/51FNfGhE9aL._SX522_.jpg">
<h3>iluvia Shampoo & Mask</h3>

<p class="short-desc">
iluvia Damage Defence Duo
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
iluvia Damage Defence Duo - Sulfate Free Shampoo & Hair Repair Mask
<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹1,699</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 4 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/61BkUCDM8VL._SL1500_.jpg">
<h3>L'oreal Repair Mask</h3>

<p class="short-desc">
Repair mask for dry & damaged hair
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Professional repair mask with protein & omega-9
<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹891</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 5 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/61AMrHZmheL._SL1500_.jpg">
<h3>Liss Unlimited Mask</h3>

<p class="short-desc">
Mask for frizzy & unruly hair
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Smoothing mask with Pro-Keratin for soft & shiny hair
<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹990</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 6 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/61WTUEQAU7L._SL1500_.jpg">
<h3>Inforcer Mask</h3>

<p class="short-desc">
Strengthening hair mask
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
With Vitamin B6 & Biotin for weak hair
<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹990</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 7 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/31GcTa05a7L._SY300_SX300_QL70_FMwebp_.jpg">
<h3>Hair Growth Serum</h3>

<p class="short-desc">
Biotin hair growth serum
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Boosts hair growth and reduces hair fall
<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹956</p>
<button>Add to Cart</button>
</div>

<!-- PRODUCT 8 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/41ihqXFlnaL._SY300_SX300_QL70_FMwebp_.jpg">
<h3>Garnier Hair Color</h3>

<p class="short-desc">
Natural hair color
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Long lasting cream hair color
<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹518</p>
<button>Add to Cart</button>
</div>

</div>

</div>

<script src="shop.js"></script>

</body>
</html>