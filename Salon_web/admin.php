<?php
ob_start();
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-login.php");
    exit();
}
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
            --text-gray: #b1b1b1;
        }

        body { font-family: 'Poppins', sans-serif; margin: 0; display: flex; background: var(--dark-bg); color: white; overflow-x: hidden; }

        /* SIDEBAR */
        .sidebar { width: var(--sidebar-w); background: #120822; height: 100vh; position: fixed; border-right: 1px solid #3d2b5e; z-index: 100; }
        .sidebar .logo { font-size: 24px; font-weight: bold; text-align: center; padding: 30px 0; color: var(--pink); letter-spacing: 2px; }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { padding: 15px 25px; cursor: pointer; transition: 0.3s; }
        .sidebar ul li:hover { background: rgba(255, 77, 148, 0.1); }
        .sidebar ul li.active { background: var(--pink); }
        .sidebar ul li a { color: white; text-decoration: none; display: flex; align-items: center; gap: 12px; font-size: 14px; }

        /* MAIN CONTENT */
        .main { margin-left: var(--sidebar-w); width: calc(100% - var(--sidebar-w)); padding: 25px; transition: 0.3s; }
        
        /* TOPBAR */
        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; background: rgba(255,255,255,0.02); padding: 15px; border-radius: 12px; }
        .top-right { display: flex; align-items: center; gap: 20px; }

        .admin-profile { display: flex; align-items: center; gap: 12px; cursor: pointer; position: relative; }
        .admin-icons img { width: 40px; height: 40px; border-radius: 50%; border: 2px solid var(--pink); object-fit: cover; }

        /* CONTENT SECTIONS */
        .content-section { display: none; animation: fadeIn 0.4s ease; }
        .content-section.active { display: block; }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        /* CARDS */
        .cards { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px; }
        .card { padding: 20px; border-radius: 15px; border: 1px solid rgba(255,255,255,0.1); }
        .card.pink { background: linear-gradient(135deg, #6a1b9a, #ff4d94); }
        .card.blue { background: linear-gradient(135deg, #1a237e, #0080ff); }
        .card.purple { background: linear-gradient(135deg, #4a148c, #9b51e0); }
        .card h3 { font-size: 14px; margin: 0; opacity: 0.8; }
        .card p { font-size: 24px; font-weight: 600; margin-top: 10px; }

        /* TABLES */
        .data-box { background: var(--card-bg); padding: 25px; border-radius: 15px; border: 1px solid #4d3b6e; margin-top: 20px; }
        .data-box h2 { font-size: 18px; margin-bottom: 20px; color: var(--pink); border-left: 4px solid var(--pink); padding-left: 10px; }
        
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; color: var(--pink); padding: 15px 10px; border-bottom: 1px solid #4d3b6e; font-size: 14px; }
        td { padding: 15px 10px; border-bottom: 1px solid #3d2b5e; font-size: 13px; color: #e0e0e0; }

        /* STATUS TAGS */
        .status { padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: bold; }
        .status.confirmed { background: #d4edda; color: #155724; }
        .status.pending { background: #f8d7da; color: #721c24; }

        /* DROPDOWN */
        .admin-menu { display: none; position: absolute; top: 50px; right: 0; background: var(--card-bg); border: 1px solid #4d3b6e; border-radius: 8px; width: 150px; z-index: 1000; }
        .admin-menu.active { display: block; }
        .admin-menu ul { list-style: none; padding: 0; margin: 0; }
        .admin-menu ul li { padding: 12px; font-size: 13px; border-bottom: 1px solid #4d3b6e; cursor: pointer; }
        .admin-menu ul li:hover { background: var(--pink); }

    </style>
</head>
<body>

<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin.php");
    exit();
}
?>

<div class="sidebar">
    <div class="logo">PHOENIX</div>
    <ul>
        <li class="nav-item active" onclick="showSection('dashboard', this)"><a>🏠 Dashboard</a></li>
        <li class="nav-item" onclick="showSection('bookings', this)"><a>👤 Bookings</a></li>
        <li class="nav-item" onclick="showSection('customers', this)"><a>👥 Customers</a></li>
        <li class="nav-item" onclick="showSection('services', this)"><a>💇 Services</a></li>
        <li class="nav-item" onclick="showSection('revenue', this)"><a>📊 Revenue</a></li>
        <li onclick="logout()"><a>🚪 Logout</a></li>
    </ul>
</div>

<div class="main">
    <div class="topbar">
        <h1 id="page-title">Admin Dashboard</h1>
        <div class="top-right">
            <div class="notification" onclick="alert('No new notifications')">
                🔔<span class="badge">3</span>
            </div>
            <div class="admin-profile" onclick="toggleMenu(event)">
                <div class="admin-icons">
                    <img src="admin1.jpg" alt="Profile" onerror="this.src='https://via.placeholder.com/40'">
                </div>
                <span>Admin ▼</span>
                <div class="admin-menu" id="adminMenu">
                    <ul>
                        <li>View Profile</li>
                        <li onclick="logout()" style="color:var(--pink)">Logout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="dashboard" class="content-section active">
        <div class="cards">
            <div class="card pink"><h3>Total Bookings</h3><p>124</p></div>
            <div class="card blue"><h3>Total Customers</h3><p>89</p></div>
            <div class="card purple"><h3>Revenue</h3><p>₹7,450</p></div>
            <div class="card pink"><h3>Pending</h3><p>12</p></div>
        </div>
        <div class="data-box">
            <h2>Recent Activity</h2>
            <table>
                <thead><tr><th>Customer</th><th>Service</th><th>Status</th></tr></thead>
                <tbody>
                    <tr><td>Vaishnavi A.</td><td>Step Cut</td><td><span class="status confirmed">Confirmed</span></td></tr>
                    <tr><td>Sneha P.</td><td>Facial</td><td><span class="status pending">Pending</span></td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="bookings" class="content-section">
        <div class="data-box">
            <h2>All Bookings</h2>
            <table>
                <thead><tr><th>ID</th><th>Customer</th><th>Service</th><th>Date</th><th>Status</th></tr></thead>
                <tbody>
                    <tr><td>#PHX-101</td><td>Vaishnavi Ambale</td><td>Cleanup</td><td>Mar 05</td><td><span class="status confirmed">Confirmed</span></td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="customers" class="content-section">
        <div class="data-box">
            <h2>Customer List</h2>
            <table>
                <thead><tr><th>Name</th><th>Phone</th><th>Total Visits</th></tr></thead>
                <tbody>
                    <tr><td>Vaishnavi Ambale</td><td>7499620221</td><td>5</td></tr>
                    <tr><td>Sneha Patil</td><td>9876543210</td><td>2</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="services" class="content-section">
        <div class="data-box">
            <h2>Our Services</h2>
            <table>
                <thead><tr><th>Service Name</th><th>Price</th><th>Duration</th></tr></thead>
                <tbody>
                    <tr><td>Face Cleanup</td><td>₹400</td><td>30 mins</td></tr>
                    <tr><td>Step Cut</td><td>₹600</td><td>45 mins</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="revenue" class="content-section">
        <div class="data-box">
            <h2>Revenue Report</h2>
            <p>Total Earnings this month: <strong>₹45,000</strong></p>
            <table>
                <thead><tr><th>Date</th><th>Transactions</th><th>Amount</th></tr></thead>
                <tbody>
                    <tr><td>Mar 01</td><td>10</td><td>₹5,200</td></tr>
                    <tr><td>Mar 02</td><td>8</td><td>₹3,800</td></tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    // NAVIGATION LOGIC
    function showSection(sectionId, element) {
        // Hide all sections
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(sec => sec.classList.remove('active'));

        // Show selected section
        document.getElementById(sectionId).classList.add('active');

        // Update Sidebar UI
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => item.classList.remove('active'));
        element.classList.add('active');

        // Update Page Title
        document.getElementById('page-title').innerText = sectionId.charAt(0).toUpperCase() + sectionId.slice(1);
    }

    // PROFILE MENU
    function toggleMenu(event) {
        event.stopPropagation();
        document.getElementById('adminMenu').classList.toggle('active');
    }

    // LOGOUT
    function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: admin-login.php");
        exit();
    }

    // Close menu on click outside
    window.onclick = function() {
        document.getElementById('adminMenu').classList.remove('active');
    }
</script>

</body>
</html>