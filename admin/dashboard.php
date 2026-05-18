<?php
session_start();

include("../config.php");
 
if(!isset($_SESSION["user_id"]) || $_SESSION["role"] != "admin")

{

    header("Location: ../login.php");

    exit();

}
 


$user_id = $_SESSION['user_id'];


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

$newUserQuery = $conn->query("SELECT COUNT(*) as new_users FROM users WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)");
$newUserData = $newUserQuery->fetch_assoc();
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


.main{
    margin-left:220px;
    padding:25px;
}


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

<div class="sidebar">

    <h2>Admin Panel</h2>

    <a href="dashboard.php">Dashboard</a>
    <a href="users.php">Manage Users</a>
    <a href="repices.php">Manage Recipes</a>
    <a href="analytics.php">Analytics</a>
    <a href="settings.php">Settings</a>
    <a href="../logout.php">Logout</a>

</div>

<div class="main">

    <div class="topbar">
        <h1>Welcome Admin</h1>
        <p>Monitor platform activity, manage users, approve chefs and control content.</p>
    </div>

    <div class="cards">

        <div class="card card1">
            <h3>Total Users</h3>
            <h1><?php echo $userData['total_users']; ?></h1>
        </div>

        <div class="card card2">
            <h3>Total Recipes</h3>
            <h1><?php echo $recipeData['total_recipes']; ?></h1>
        </div>

        <div class="card card3">
            <h3>Total Chefs</h3>
            <h1><?php echo $chefData['total_chefs']; ?></h1>
        </div>

        <div class="card card4">
            <h3>Total Reviews</h3>
            <h1><?php echo $reviewData['total_reviews']; ?></h1>
        </div>

        <div class="card card5">
            <h3>Pending Requests</h3>
            <h1><?php echo $verificationData['pending_requests']; ?></h1>
        </div>

        <div class="card card1">
            <h3>New Registrations</h3>
            <h1><?php echo $newUserData['new_users']; ?></h1>
        </div>

    </div>

</div>

</body>
</html>
