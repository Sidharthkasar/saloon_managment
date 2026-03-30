<!DOCTYPE html>
<html>
<head>

<title>Bookings</title>
<link rel="stylesheet" href="admin.css">

</head>

<body>

<div class="sidebar">

<div class="logo">PHOENIX</div>

<ul>

<li><a href="admin.php">🏠 Dashboard</a></li>
<li class="active"><a href="bookings.php">👤 Bookings</a></li>
<li><a href="customers.php">👥 Customers</a></li>
<li><a href="services.php">💇 Services</a></li>
<li><a href="revenue.php">📊 Revenue</a></li>


</ul>

</div>

<div class="main">

<h1>Bookings</h1>

<div class="table-box">

<table>

<thead>

<tr>
<th>Name</th>
<th>Phone</th>
<th>Service</th>
<th>Date</th>
<th>Status</th>
</tr>

</thead>

<tbody id="bookingTable">

</tbody>

</table>

</div>

</div>

<script src="admin.js"></script>

</body>
</html>