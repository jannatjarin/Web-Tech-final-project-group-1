<?php
session_start();
include("../config.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}


$totalUsers = 0;
$totalRecipes = 0;
$totalReviews = 0;
$totalChefs = 0;


// Total Users
$userQuery = $conn->query("SELECT COUNT(*) as total_users FROM users");
$userData = $userQuery->fetch_assoc();

// Total Recipes
$recipeQuery = $conn->query("SELECT COUNT(*) as total_recipes FROM recipes");
$recipeData = $recipeQuery->fetch_assoc();

// Total Chefs
$chefQuery = $conn->query("SELECT COUNT(*) as total_chefs FROM users WHERE role='chef'");
$chefData = $chefQuery->fetch_assoc();

// Total Reviews
$reviewQuery = $conn->query("SELECT COUNT(*) as total_reviews FROM reviews");
$reviewData = $reviewQuery->fetch_assoc();

// Pending Chef Verification
$verificationQuery = $conn->query("SELECT COUNT(*) as pending_requests FROM chef_verification_requests WHERE status='pending'");
$verificationData = $verificationQuery->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<style>

body{
    margin:0;
    padding:0;
    font-family:Arial;
    background:#eef1f5;
}

/* Sidebar */

.sidebar{
    width:220px;
    height:100vh;
    background:#2c2f4a;
    position:fixed;
    left:0;
    top:0;
}

.sidebar h2{
    color:#fff;
    text-align:center;
    padding:20px 0;
    font-size:20px;
}

.sidebar a{
    display:block;
    color:#ddd;
    text-decoration:none;
    padding:12px 20px;
    font-size:14px;
}

.sidebar a:hover{
    background:#40446b;
    color:#fff;
}

/* Main */

.main{
    margin-left:220px;
    padding:25px;
}

/* Topbar */

.topbar{
    background:white;
    padding:20px;
    border-radius:8px;
    box-shadow:0 2px 6px rgba(0,0,0,0.05);
}

/* Cards */

.cards{
    margin-top:20px;
}

.card{
    width:180px;
    display:inline-block;
    margin:10px;
    padding:18px;
    border-radius:8px;
    color:white;
    text-align:center;
    box-shadow:0 2px 6px rgba(0,0,0,0.08);
}

.card1{ background:#5a67d8; }
.card2{ background:#38a169; }
.card3{ background:#dd6b20; }
.card4{ background:#805ad5; }
.card5{ background:#e53e3e; }

/* Activity */

.activity{
    background:white;
    margin-top:25px;
    padding:20px;
    border-radius:8px;
    box-shadow:0 2px 6px rgba(0,0,0,0.05);
}

.activity table{
    width:100%;
    border-collapse:collapse;
}

.activity th,
.activity td{
    padding:10px;
    border-bottom:1px solid #eee;
}

/* Button */

button{
    padding:8px 14px;
    background:#2c2f4a;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#40446b;
}

</style>

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

<h2>Admin Panel</h2>

<a href="dashboard.php">Dashboard</a>

<a href="users.php">Manage Users</a>

<a href="recipes.php">Manage Recipes</a>

<a href="featured.php">Featured Content</a>

<a href="analytics.php">Analytics</a>

<a href="reports.php">Reports</a>

<a href="settings.php">Settings</a>

<a href="moderators.php">Moderators</a>

<a href="profile.php">Profile</a>

<a href="../logout.php">Logout</a>

</div>

<!-- Main -->

<div class="main">

<!-- Topbar -->

<div class="topbar">

<h1>Welcome Admin</h1>

<p>Monitor platform activity, manage users, approve chefs and control content.</p>

</div>

<!-- Cards -->

<div class="cards">

<div class="card card1">
<h1><?php echo $userData['total_users']; ?></h1>
<p>Total Users</p>
</div>

<div class="card card2">
<h1><?php echo $recipeData['total_recipes']; ?></h1>
<p>Total Recipes</p>
</div>

<div class="card card3">
<h1><?php echo $chefData['total_chefs']; ?></h1>
<p>Active Chefs</p>
</div>

<div class="card card4">
<h1><?php echo $reviewData['total_reviews']; ?></h1>
<p>Total Reviews</p>
</div>

<div class="card card5">
<h1><?php echo $verificationData['pending_requests']; ?></h1>
<p>Pending Verification</p>
</div>

</div>

<!-- Recent Activity -->

<div class="activity">

<h2>Recent Admin Activity</h2>

<table>

<tr>
<th>Activity</th>
<th>Status</th>
</tr>

<tr>
<td>Chef verification requests pending</td>
<td><?php echo $verificationData['pending_requests']; ?></td>
</tr>

<tr>
<td>Total users registered</td>
<td><?php echo $userData['total_users']; ?></td>
</tr>

<tr>
<td>Total recipes available</td>
<td><?php echo $recipeData['total_recipes']; ?></td>
</tr>

<tr>
<td>Total reviews posted</td>
<td><?php echo $reviewData['total_reviews']; ?></td>
</tr>

</table>

<br>

<button>View Full Reports</button>

</div>

</div>

</body>
</html>