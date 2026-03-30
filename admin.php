<?php
ob_start();
session_start();

// Guard: only admins can access this page
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin-login.php");
    exit();
}

include "db_config.php";

/* ---------- Dashboard Stats ---------- */

$totalBookings   = 0;
$totalCustomers  = 0;
$totalRevenue    = 0;
$pendingBookings = 0;

$result = $conn->query("SELECT COUNT(*) as cnt FROM bookings");
if ($result) { $row = $result->fetch_assoc(); $totalBookings = $row['cnt']; }

$result = $conn->query("SELECT COUNT(*) as cnt FROM customers");
if ($result) { $row = $result->fetch_assoc(); $totalCustomers = $row['cnt']; }

$result = $conn->query("SELECT SUM(total_amount) as sum FROM bookings");
if ($result) { $row = $result->fetch_assoc(); $totalRevenue = $row['sum'] ? $row['sum'] : 0; }

$result = $conn->query("SELECT COUNT(*) as cnt FROM bookings WHERE status='Pending'");
if ($result) { $row = $result->fetch_assoc(); $pendingBookings = $row['cnt']; }

$recentActivity = $conn->query("
    SELECT customer_name, services, status, booking_date
    FROM bookings
    ORDER BY booking_date DESC
    LIMIT 10
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --pink: #ff4d94;
            --dark-bg: #1a0b2e;
            --card-bg: #2d1b4d;
            --sidebar-w: 240px;
        }
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            display: flex;
            background: var(--dark-bg);
            color: white;
        }
        .sidebar {
            width: var(--sidebar-w);
            background: #120822;
            height: 100vh;
            position: fixed;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            padding: 30px 0;
            color: var(--pink);
        }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { padding: 15px 25px; }
        .sidebar ul li a { color: white; text-decoration: none; display: block; }
        .sidebar ul li:hover { background: rgba(255, 77, 148, 0.1); }
        .main {
            margin-left: var(--sidebar-w);
            padding: 25px;
            width: calc(100% - var(--sidebar-w));
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
        }
        .card { padding: 20px; border-radius: 15px; }
        .card h3 { margin: 0; font-size: 14px; }
        .card p { font-size: 24px; font-weight: bold; }
        .card.pink   { background: linear-gradient(135deg, #6a1b9a, #ff4d94); }
        .card.blue   { background: linear-gradient(135deg, #1a237e, #0080ff); }
        .card.purple { background: linear-gradient(135deg, #4a148c, #9b51e0); }
        .data-box { background: var(--card-bg); padding: 25px; border-radius: 15px; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; }
        th { color: var(--pink); }
        tr:hover { background: rgba(255, 255, 255, 0.05); }
        .status { padding: 5px 10px; border-radius: 20px; font-size: 11px; font-weight: bold; }
        .status.confirmed { background: #d4edda; color: #155724; }
        .status.pending   { background: #fff3cd; color: #856404; }
        .status.cancelled { background: #f8d7da; color: #721c24; }
        .admin-info { font-size: 13px; color: #bbb; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">PHOENIX</div>
    <ul>
        <li><a href="admin.php">🏠 Dashboard</a></li>
        <li><a href="bookings.php">👤 Bookings</a></li>
        <li><a href="customers.php">👥 Customers</a></li>
        <li><a href="services.php">💇 Services</a></li>
        <li><a href="revenue.php">📊 Revenue</a></li>
        <li><a href="logout.php">🚪 Logout</a></li>
    </ul>
</div>

<div class="main">

    <h1>Admin Dashboard</h1>
    <p class="admin-info">Logged in as Admin</p>

    <div class="cards">
        <div class="card pink">
            <h3>Total Bookings</h3>
            <p><?= $totalBookings ?></p>
        </div>
        <div class="card blue">
            <h3>Total Customers</h3>
            <p><?= $totalCustomers ?></p>
        </div>
        <div class="card purple">
            <h3>Total Revenue</h3>
            <p>₹<?= number_format($totalRevenue, 2) ?></p>
        </div>
        <div class="card pink">
            <h3>Pending</h3>
            <p><?= $pendingBookings ?></p>
        </div>
    </div>

    <div class="data-box">
        <h2>Recent Activity</h2>
        <table>
            <tr>
                <th>Customer</th>
                <th>Service</th>
                <th>Status</th>
                <th>Date & Time</th>
            </tr>
            <?php if ($recentActivity && $recentActivity->num_rows > 0): ?>
                <?php while ($row = $recentActivity->fetch_assoc()): ?>
                    <?php $statusClass = strtolower($row['status']); ?>
                    <tr>
                        <td><?= htmlspecialchars($row['customer_name']) ?></td>
                        <td><?= htmlspecialchars($row['services']) ?></td>
                        <td><span class="status <?= $statusClass ?>"><?= htmlspecialchars($row['status']) ?></span></td>
                        <td><?= date("d M Y, h:i A", strtotime($row['booking_date'])) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4">No recent activity</td></tr>
            <?php endif; ?>
        </table>
    </div>

</div>

</body>
</html>