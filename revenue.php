<?php
session_start();
include "db_config.php";

// Today's Revenue
$todayQuery = "
SELECT 
    (SELECT IFNULL(SUM(total_amount),0) FROM bookings 
        WHERE DATE(booking_date) = CURDATE()) +
    (SELECT IFNULL(SUM(total_amount),0) FROM menbookings 
        WHERE DATE(booking_date) = CURDATE())
    AS today_total
";

$todayResult = $conn->query($todayQuery);
$todayRevenue = $todayResult->fetch_assoc()['today_total'];

// This Month Revenue
$monthQuery = "
SELECT 
    (SELECT IFNULL(SUM(total_amount),0) FROM bookings 
        WHERE MONTH(booking_date) = MONTH(CURDATE()) 
        AND YEAR(booking_date) = YEAR(CURDATE())) +
    (SELECT IFNULL(SUM(total_amount),0) FROM menbookings 
        WHERE MONTH(booking_date) = MONTH(CURDATE()) 
        AND YEAR(booking_date) = YEAR(CURDATE()))
    AS month_total
";

$monthResult = $conn->query($monthQuery);
$monthRevenue = $monthResult->fetch_assoc()['month_total'];

// Total Revenue
$totalQuery = "
SELECT 
    (SELECT IFNULL(SUM(total_amount),0) FROM bookings) +
    (SELECT IFNULL(SUM(total_amount),0) FROM menbookings)
    AS total_revenue
";

$totalResult = $conn->query($totalQuery);
$totalRevenue = $totalResult->fetch_assoc()['total_revenue'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Revenue</title>
<link rel="stylesheet" href="admin.css">
</head>

<body>

<div class="sidebar">

<div class="logo">PHOENIX</div>

<ul>
<li><a href="admin.php">🏠 Dashboard</a></li>
<li><a href="bookings.php">👤 Bookings</a></li>
<li><a href="customers.php">👥 Customers</a></li>
<li><a href="services.php">💇 Services</a></li>
<li class="active"><a href="revenue.php">📊 Revenue</a></li>
</ul>

</div>

<div class="main">

<h1>Revenue</h1>

<p>Today's Revenue : ₹<?php echo number_format($todayRevenue); ?></p>

<p>This Month : ₹<?php echo number_format($monthRevenue); ?></p>

<p>Total Revenue : ₹<?php echo number_format($totalRevenue); ?></p>

</div>

</body>
</html>