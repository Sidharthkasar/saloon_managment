<?php
session_start();
include "db_config.php";

// Fetch services
$sql = "SELECT id, service_name, price, category FROM services ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Services</title>
<link rel="stylesheet" href="admin.css">

<style>
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f4f4f4;
}

.add-btn {
    background: #ff4d94;
    color: white;
    padding: 10px 15px;
    border: none;
    margin-bottom: 15px;
    cursor: pointer;
    border-radius: 5px;
}
</style>

</head>

<body>

<div class="sidebar">

<div class="logo">PHOENIX</div>

<ul>

<li><a href="admin.php">🏠 Dashboard</a></li>
<li><a href="bookings.php">👤 Bookings</a></li>
<li><a href="customers.php">👥 Customers</a></li>
<li class="active"><a href="services.php">💇 Services</a></li>
<li><a href="revenue.php">📊 Revenue</a></li>
<li><a href="logout.php">🚪 Logout</a></li>

</ul>

</div>

<div class="main">

<h1>Services</h1>

<button class="add-btn">+ Add Service</button>

<table>

<tr>
    <th>ID</th>
    <th>Service Name</th>
    <th>Price (₹)</th>
    <th>Category</th>
</tr>

<?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['service_name']}</td>
                <td>₹{$row['price']}</td>
                <td>{$row['category']}</td>
              </tr>";
    }

} else {

    echo "<tr>
            <td colspan='4'>No services found</td>
          </tr>";
}

?>

</table>

</div>

</body>
</html>