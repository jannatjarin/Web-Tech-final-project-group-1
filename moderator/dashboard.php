<?php
session_start();

include("../config.php");
 
if(!isset($_SESSION["user_id"]) || $_SESSION["role"] != "moderator")

{

    header("Location: ../login.php");

    exit();

}
 


$user_id = $_SESSION['user_id'];


// User Data
$user = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
$userData = mysqli_fetch_assoc($user);


// Pending Chef Verification Requests
$pending_query = "SELECT COUNT(*) AS total FROM chef_verification_requests WHERE status='pending'";
$pending_result = mysqli_query($conn,$pending_query);
$pending_data = mysqli_fetch_assoc($pending_result);


// Reported Recipes
$report_query = "SELECT COUNT(*) AS total FROM content_reports WHERE status='pending'";
$report_result = mysqli_query($conn,$report_query);
$report_data = mysqli_fetch_assoc($report_result);


// Flagged Reviews
$review_query = "SELECT COUNT(*) AS total FROM reviews";
$review_result = mysqli_query($conn,$review_query);
$review_data = mysqli_fetch_assoc($review_result);


// New Recipes
$recipe_query = "SELECT COUNT(*) AS total FROM recipes";
$recipe_result = mysqli_query($conn,$recipe_query);
$recipe_data = mysqli_fetch_assoc($recipe_result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Moderator Dashboard</title>

    <style>

        body{
            margin:0;
            font-family: Arial;
            background-color:#FFF8F2;
            color:#5A4636;
        }

        .sidebar{
            width:220px;
            height:100vh;
            background-color:#FFF4EC;
            position:fixed;
            left:0;
            top:0;
            padding-top:20px;
            border-right:2px solid #dddddd;
        }

        .logo{
            text-align:center;
            font-size:24px;
            font-weight:bold;
            margin-bottom:30px;
        }

        .sidebar a{
            display:block;
            padding:15px;
            margin:10px;
            text-decoration:none;
            color:#5A4636;
            border-radius:20px;
        }

        .sidebar a:hover{
            background-color:#FFD6C9;
        }

        .active{
            background-color:#FFD6C9;
        }

        .main{
            margin-left:240px;
            padding:20px;
        }

        .navbar{
            background:white;
            padding:15px;
            border-radius:20px;
            border:1px solid #dddddd;
        }

        .welcome{
            margin-top:20px;
            background-color:#FFD6C9;
            padding:30px;
            border-radius:25px;
            color:#5A4636;
            border:1px solid #dddddd;
        }

        .cards{
            margin-top:20px;
        }

        .card{
            width:22%;
            background:white;
            display:inline-block;
            margin-right:1%;
            padding:20px;
            border-radius:20px;
            border:1px solid #dddddd;
            vertical-align:top;
        }

        .purple{
            background:#DCCCF5;
        }

        .pink{
            background:#FFD6C9;
        }

        .green{
            background:#CFE8CF;
        }

        .yellow{
            background:#FFE9A8;
        }

        .activity{
            margin-top:20px;
            background:white;
            padding:20px;
            border-radius:20px;
            border:1px solid #dddddd;
        }

    </style>

</head>

<body>

<div class="sidebar">

    <div class="logo">🍰 RecipeShare</div>

    <a class="active" href="dashboard.php">🏠 Dashboard</a>
    <a href="verification.php">👨‍🍳 Chef Requests</a>
    <a href="reports.php">🚩 Reports</a>
    <a href="review_report.php">📝 Review Reports</a>
    <a href="recipes.php">🍲 Recipes</a>
    <a href="profile.php">👤 Profile</a>

</div>

<div class="main">

    <div class="navbar">
        🌸 Welcome Moderator, <?php echo $userData['name']; ?>
    </div>

    <div class="welcome">
        <h1>Moderator Dashboard</h1>
        <p>Manage recipes, reports and chef requests easily.</p>
    </div>

    <div class="cards">

        <div class="card purple">
            <h2><?php echo $pending_data['total']; ?></h2>
            <p>🧁 Pending Requests</p>
        </div>

        <div class="card pink">
            <h2><?php echo $report_data['total']; ?></h2>
            <p>🚨 Reported Recipes</p>
        </div>

        <div class="card green">
            <h2><?php echo $review_data['total']; ?></h2>
            <p>⭐ Flagged Reviews</p>
        </div>

        <div class="card yellow">
            <h2><?php echo $recipe_data['total']; ?></h2>
            <p>🍲 New Recipes</p>
        </div>

    </div>

    <div class="activity">

        <h2>📝 Recent Activity</h2>

        <ul>
            <li>New chef verification request submitted.</li>
            <li>A recipe was reported by users.</li>
            <li>Moderator reviewed flagged content.</li>
            <li>New recipe published today.</li>
        </ul>

    </div>

</div>

</body>
</html>