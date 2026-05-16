<?php
session_start();
include("../config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] != "admin") {
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
    background:#f4f4f4;
}

/* Sidebar */

.sidebar{
    width:230px;
    height:100vh;
    background:#4b0000;
    position:fixed;
    left:0;
    top:0;
}

.sidebar h2{
    color:white;
    text-align:center;
    padding-top:20px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 20px;
}

.sidebar a:hover{
    background:#700000;
}

/* Main Section */

.main{
    margin-left:230px;
    padding:20px;
}

/* Topbar */

.topbar{
    background:white;
    padding:20px;
    border-radius:10px;
}

.topbar h1{
    margin:0;
}

/* Cards */

.cards{
    margin-top:20px;
}

.card{
    width:200px;
    display:inline-block;
    margin-right:15px;
    margin-bottom:15px;
    padding:20px;
    border-radius:10px;
    color:white;
    text-align:center;
}

.card1{
    background:#0066cc;
}

.card2{
    background:#009933;
}

.card3{
    background:#cc6600;
}

.card4{
    background:#990099;
}

.card5{
    background:#cc0000;
}

/* Activity Section */

.activity{
    background:white;
    margin-top:30px;
    padding:20px;
    border-radius:10px;
}

.activity table{
    width:100%;
    border-collapse:collapse;
}

.activity table th,
.activity table td{
    border:1px solid #ddd;
    padding:12px;
    text-align:left;
}

.activity table th{
    background:#f2f2f2;
}

/* Button */

button{
    padding:10px 15px;
    background:#4b0000;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#700000;
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