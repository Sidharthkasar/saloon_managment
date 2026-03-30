<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-login.php");
    exit();
}

include "db_config.php";

/* Enable error reporting (helps debugging) */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

$sql = "

SELECT 
    id,
    booking_id,
    customer_name,
    phone,
    services,
    booking_date,
    status,
    'bookings' AS source
FROM bookings

UNION ALL

SELECT 
    id,
    booking_id,
    customer_name,
    phone,
    services,
    booking_date,
    'Confirmed' AS status,
    'menbookings' AS source
FROM menbookings

ORDER BY booking_date DESC

";

$result = $conn->query($sql);

} catch (Exception $e) {

    die("SQL Error: " . $e->getMessage());

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Bookings</title>
<link rel="stylesheet" href="admin.css">

<style>

/* Page */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    background: #1a0b2e;
    color: white;
}

/* Main content */

.main {
    margin-left: 240px;
    padding: 25px;
}

/* Table container */

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: #2d1b4d;
    border-radius: 10px;
    overflow: hidden;
}

/* Header */

th {
    background: #120822;
    color: #ff4d94;
    padding: 14px;
    text-align: left;
    font-size: 14px;
}

/* Table cells */

td {
    padding: 12px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    color: #ffffff;
    font-size: 14px;
}

/* Row hover */

tr:hover {
    background: rgba(255, 77, 148, 0.08);
}

/* Status styles */

.status-confirmed {
    color: #28a745;
    font-weight: bold;
}

.status-pending {
    color: #ffc107;
    font-weight: bold;
}

.status-cancelled {
    color: #dc3545;
    font-weight: bold;
}

/* Action buttons */

.btn {
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 12px;
    margin-right: 6px;
    color: white;
    display: inline-block;
    transition: 0.2s;
}

.confirm {
    background: #28a745;
}

.cancel {
    background: #dc3545;
}

.confirm:hover {
    background: #218838;
}

.cancel:hover {
    background: #c82333;
}

/* Responsive table */

@media (max-width: 768px) {

    table {
        font-size: 12px;
    }

    th, td {
        padding: 8px;
    }

}

</style>
</head>

<body>

<div class="sidebar">

<div class="logo">PHOENIX</div>

<ul>

<li><a href="admin.php">🏠 Dashboard</a></li>

<li class="active">
<a href="bookings.php">👤 Bookings</a>
</li>

<li>
<a href="customers.php">👥 Customers</a>
</li>

<li>
<a href="services.php">💇 Services</a>
</li>

<li>
<a href="revenue.php">📊 Revenue</a>
</li>

<li>
<a href="logout.php">🚪 Logout</a>
</li>

</ul>

</div>

<div class="main">

<h1>All Bookings</h1>

<table>

<tr>
<th>Booking ID</th>
<th>Name</th>
<th>Phone</th>
<th>Service</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $status = strtolower($row['status']);

        if ($status == 'pending')
            $statusClass = "status-pending";
        elseif ($status == 'cancelled')
            $statusClass = "status-cancelled";
        else
            $statusClass = "status-confirmed";

        echo "<tr>

        <td>{$row['booking_id']}</td>

        <td>{$row['customer_name']}</td>

        <td>{$row['phone']}</td>

        <td>{$row['services']}</td>

        <td>{$row['booking_date']}</td>

        <td class='{$statusClass}'>
            {$row['status']}
        </td>

        <td>";

        if ($row['source'] == "bookings") {

            echo "

            <a class='btn confirm'
            href='update_status.php?id={$row['id']}&status=Confirmed&source=bookings'>
            Confirm
            </a>

            <a class='btn cancel'
            href='update_status.php?id={$row['id']}&status=Cancelled&source=bookings'>
            Cancel
            </a>

            ";

        } else {

            echo "<span style='color: gray;'>Auto Confirmed</span>";

        }

        echo "</td></tr>";

    }

} else {

    echo "

    <tr>
    <td colspan='7'>
    No bookings found in database
    </td>
    </tr>

    ";

}

?>

</table>

</div>

</body>
</html>