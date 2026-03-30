<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>Nail Products</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="shop.css">

</head>

<body class="shop-body">

<div class="shop-sidebar">

<h2>Shop</h2>

<ul>
<li><a href="hair.php">Hair</a></li>
<li><a href="skin.php">Skin</a></li>
<li><a href="makeup.php">Makeup</a></li>
<li class="active"><a href="nails.php">Nails</a></li>
</ul>

</div>

<div class="shop-main">

<a href="cart.php">
<button style="margin-bottom:20px;">Go to Cart 🛒</button>
</a>

<h1>Nail Products</h1>

<input type="text" id="search" placeholder="Search product">

<div class="product-grid">

<!-- PRODUCT 1 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/41NBa2v92gL._SL1000_.jpg">

<h3>Nail Polish</h3>

<p class="short-desc">
Glossy long lasting nail polish...
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
High shine nail polish with chip resistant formula.
<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹199</p>

<button>Add to Cart</button>
</div>

<!-- PRODUCT 2 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/41K5Vr573GL._SL1080_.jpg">

<h3>LED UV Lamp</h3>

<p class="short-desc">
Emigel Professional Nail LED UV Lamp | Fast Gel Polish Curing Lamp for All UV/LED Polishes
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Emigel Professional Nail LED UV Lamp | Fast Gel Polish Curing Lamp for All UV/LED Polishes | Auto Sensor & 3 Timer Settings | Salon-Quality Nail Dryer for Manicure & Pedicure (150W)

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹199</p>

<button>Add to Cart</button>
</div>

<!-- PRODUCT 3 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/41FRG9KNkPL._SY300_SX300_QL70_FMwebp_.jpg">

<h3>HYUE Chrome</h3>

<p class="short-desc">
HYUE Chrome Glazed Nail Paint - 7 shades | Moonstone 
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
HYUE Chrome Glazed Nail Paint - 7 shades | Moonstone | 8 ml | Dual-toned | Long-lasting Shine | Color-Shifting Pigments | One Stroke Coverage | Gel Finish | Salon-like Nails | No UV Damage

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹199</p>

<button>Add to Cart</button>
</div>

<!-- PRODUCT 4 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/41myha+lJAL._SY300_SX300_QL70_FMwebp_.jpg">

<h3>RENEE Nail Paint Remover</h3>

<p class="short-desc">
RENEE Nail Paint Remover Wipes, Easy & Hassle Free Nail Polish Removal
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
RENEE Nail Paint Remover Wipes, Easy & Hassle Free Nail Polish Removal, Keeps Nails Moisturized & Nourished, Acetone Free, Travel Friendly, Enriched With Vitamin E, Almond Oil & Glycerin, 50 Wipes

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹199</p>

<button>Add to Cart</button>
</div>

<!-- PRODUCT 5 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/41VD7xAqO2L._SY300_SX300_QL70_FMwebp_.jpg">

<h3>INOG Nail Art Brushes</h3>

<p class="short-desc">
INOG Nail Art Brushes Set,6pcs Nail Art Design Pen Painting Tools with Extension Gel Brush
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
INOG Nail Art Brushes Set,6pcs Nail Art Design Pen Painting Tools with Extension Gel Brush, Polish Brush, Builder Brush,Liner Brush, Carved Brush, and Dotting Pen for Home DIY Salon Use

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹199</p>

<button>Add to Cart</button>
</div>

<!-- PRODUCT 6 -->
<div class="product-card" onclick="openProduct(this)">
<img src="https://m.media-amazon.com/images/I/41LGfMJ8SUL._SY300_SX300_QL70_FMwebp_.jpg">

<h3>Moha Ayurvedic Nail Care Cream</h3>

<p class="short-desc">
Moha Ayurvedic Nail Care Cream with Almond & Flax Seed Oil for Strong
<span onclick="toggleDesc(event,this)">Read More</span>
</p>

<p class="full-desc">
Moha Ayurvedic Nail Care Cream with Almond & Flax Seed Oil for Strong, Healthy & Glossy Nails | Non-Greasy Cream for Nail Growth, Strengthening & Cuticle Softener | Deep Hydrating & Nourishing to Prevent Brittleness, Dryness & Damaged Nails | Herbal Nail Ointment for Men & Women—100 GM (Pack of 1)

<span onclick="toggleDesc(event,this)">Read Less</span>
</p>

<p>₹199</p>

<button>Add to Cart</button>
</div>

</div>

</div>

<script src="shop.js"></script>

</body>
</html>