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



$userQuery = $conn->query("SELECT COUNT(*) as total_users FROM users");
$userData = $userQuery->fetch_assoc();


$recipeQuery = $conn->query("SELECT COUNT(*) as total_recipes FROM recipes");
$recipeData = $recipeQuery->fetch_assoc();


$chefQuery = $conn->query("SELECT COUNT(*) as total_chefs FROM users WHERE role='chef'");
$chefData = $chefQuery->fetch_assoc();


$reviewQuery = $conn->query("SELECT COUNT(*) as total_reviews FROM reviews");
$reviewData = $reviewQuery->fetch_assoc();


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
    background:#E8E4DE;
    color:#3f3f3f;
}

/* Sidebar */

.sidebar{
    width:220px;
    height:100vh;
    background:#7E9C97;
    position:fixed;
    left:0;
    top:0;
}

.sidebar h2{
    color:#ffffff;
    text-align:center;
    padding:20px 0;
    font-size:20px;
}

.sidebar a{
    display:block;
    color:#F5F1EC;
    text-decoration:none;
    padding:12px 20px;
    font-size:14px;
    transition:0.3s;
}

.sidebar a:hover{
    background:#BFCFC1;
    color:#384542;
}

/* Main */

.main{
    margin-left:220px;
    padding:25px;
}

/* Topbar */

.topbar{
    background:#ffffff;
    padding:20px;
    border-radius:8px;
    box-shadow:0 2px 6px rgba(0,0,0,0.06);
}

.topbar h1{
    color:#4E625E;
}

.topbar p{
    color:#5f5f5f;
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
    border-radius:10px;
    color:#444444;
    text-align:center;
    box-shadow:0 2px 6px rgba(0,0,0,0.08);
    font-weight:bold;
}

.card1{ background:#BECFC0; }

.card2{ background:#E3CFC7; }

.card3{ background:#E8B2A7; }

.card4{ background:#C6BBB0; }

.card5{
    background:#7E9C97;
    color:white;
}

/* Activity */

.activity{
    background:#ffffff;
    margin-top:25px;
    padding:20px;
    border-radius:8px;
    box-shadow:0 2px 6px rgba(0,0,0,0.06);
}

.activity h2{
    color:#4E625E;
}

.activity table{
    width:100%;
    border-collapse:collapse;
}

.activity th,
.activity td{
    padding:10px;
    border-bottom:1px solid #dddddd;
    color:#444444;
}

.activity th{
    background:#E8E4DE;
    color:#4E625E;
}

/* Button */

button{
    padding:8px 14px;
    background:#7E9C97;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    transition:0.3s;
    font-weight:bold;
}

button:hover{
    background:#667F7B;
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