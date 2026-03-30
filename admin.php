<?php
ob_start();
session_start();

// Check admin login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-login.php");
    exit();
}

// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db   = "phoenix_salon";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch dashboard data
$totalBookings = $conn->query("SELECT COUNT(*) as cnt FROM bookings")->fetch_assoc()['cnt'];
$totalCustomers = $conn->query("SELECT COUNT(*) as cnt FROM customers")->fetch_assoc()['cnt'];
$totalRevenue = $conn->query("SELECT SUM(total_amount) as sum FROM bookings")->fetch_assoc()['sum'];
$totalRevenue = $totalRevenue ? $totalRevenue : 0;
$pendingBookings = $conn->query("SELECT COUNT(*) as cnt FROM bookings WHERE status='Pending'")->fetch_assoc()['cnt'];

// Fetch recent activity (latest 10 bookings)
$recentActivity = $conn->query("SELECT customer_name, services, status, booking_date FROM bookings ORDER BY booking_date DESC LIMIT 10");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Phoenix Admin Dashboard</title>
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

/* Sidebar */
.sidebar {
    width: var(--sidebar-w);
    background: #120822;
    height: 100vh;
    position: fixed;
}
.sidebar .logo {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    padding: 30px 0;
    color: var(--pink);
}
.sidebar ul {
    list-style: none;
    padding: 0;
}
.sidebar ul li {
    padding: 15px 25px;
}
.sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
}
.sidebar ul li:hover {
    background: rgba(255, 77, 148, 0.1);
}

/* Main content */
.main {
    margin-left: var(--sidebar-w);
    padding: 25px;
    width: calc(100% - var(--sidebar-w));
}
h1 { margin-bottom: 20px; }

/* Cards */
.cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}
.card {
    padding: 20px;
    border-radius: 15px;
}
.card h3 { margin: 0; opacity: 0.8; font-size: 14px; }
.card p { font-size: 24px; font-weight: 600; margin-top: 10px; }

.card.pink { background: linear-gradient(135deg, #6a1b9a, #ff4d94); }
.card.blue { background: linear-gradient(135deg, #1a237e, #0080ff); }
.card.purple { background: linear-gradient(135deg, #4a148c, #9b51e0); }

/* Data table */
.data-box {
    background: var(--card-bg);
    padding: 25px;
    border-radius: 15px;
}
.data-box h2 {
    margin-top: 0;
    margin-bottom: 15px;
    color: var(--pink);
    font-size: 18px;
    border-left: 4px solid var(--pink);
    padding-left: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
}
thead tr { background: rgba(255,255,255,0.05); }
th, td {
    padding: 12px 10px;
    text-align: left;
    word-wrap: break-word;
}
th { color: var(--pink); font-size: 13px; }
td { font-size: 13px; color: #e0e0e0; }

/* Status tags */
.status {
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: bold;
    display: inline-block;
    text-align: center;
}
.status.confirmed { background: #d4edda; color: #155724; }
.status.pending { background: #f8d7da; color: #721c24; }
</style>
</head>
<body>

<div class="sidebar">
    <div class="logo">PHOENIX</div>
    <ul>
        <li><a href="#">🏠 Dashboard</a></li>
        <li><a href="#">👤 Bookings</a></li>
        <li><a href="#">👥 Customers</a></li>
        <li><a href="#">💇 Services</a></li>
        <li><a href="#">📊 Revenue</a></li>
        <li><a href="logout.php">🚪 Logout</a></li>
    </ul>
</div>

<div class="main">
    <h1>Admin Dashboard</h1>

    <div class="cards">
        <div class="card pink">
            <h3>Total Bookings</h3>
            <p><?php echo $totalBookings; ?></p>
        </div>
        <div class="card blue">
            <h3>Total Customers</h3>
            <p><?php echo $totalCustomers; ?></p>
        </div>
        <div class="card purple">
            <h3>Total Revenue</h3>
            <p>₹<?php echo number_format($totalRevenue, 2); ?></p>
        </div>
        <div class="card pink">
            <h3>Pending</h3>
            <p><?php echo $pendingBookings; ?></p>
        </div>
    </div>

    <div class="data-box">
        <h2>Recent Activity</h2>
        <table>
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($recentActivity->num_rows > 0) {
                while($row = $recentActivity->fetch_assoc()) {
                    $statusClass = strtolower($row['status']);
                    echo "<tr>
                            <td>{$row['customer_name']}</td>
                            <td>{$row['services']}</td>
                            <td><span class='status {$statusClass}'>{$row['status']}</span></td>
                            <td>{$row['booking_date']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No recent activity</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>