<?php
session_start();
include "db_config.php";

// Get unique customers from both tables
$sql = "
SELECT 
    customer_name,
    phone,
    email,
    COUNT(*) AS total_visits
FROM (
    SELECT customer_name, phone, email FROM bookings
    UNION ALL
    SELECT customer_name, phone, email FROM menbookings
) AS all_customers
GROUP BY phone
ORDER BY total_visits DESC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Customers</title>
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
</style>

</head>

<body>

<div class="sidebar">

<div class="logo">PHOENIX</div>

<ul>

<li><a href="admin.php">🏠 Dashboard</a></li>
<li><a href="bookings.php">👤 Bookings</a></li>
<li class="active"><a href="customers.php">👥 Customers</a></li>
<li><a href="services.php">💇 Services</a></li>
<li><a href="revenue.php">📊 Revenue</a></li>
<li><a href="logout.php">🚪 Logout</a></li>

</ul>

</div>

<div class="main">

<h1>Customers</h1>

<table>

<tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Total Visits</th>
</tr>

<?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td>{$row['customer_name']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['email']}</td>
                <td>{$row['total_visits']}</td>
              </tr>";
    }

} else {

    echo "<tr>
            <td colspan='4'>No customers found</td>
          </tr>";
}

?>

</table>

</div>

</body>
</html>