<?php
session_start();

include("../config.php");


if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
}


$user_id = $_SESSION['user_id'];


// Moderator Information
$user_query = mysqli_query($conn,
"SELECT * FROM users
WHERE id='$user_id'");

$userData = mysqli_fetch_assoc($user_query);



// Pending Chef Requests
$pending_query = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM chef_verification_requests
WHERE status='pending'");

$pendingData = mysqli_fetch_assoc($pending_query);



// Total Reports
$report_query = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM content_reports
WHERE status='pending'");

$reportData = mysqli_fetch_assoc($report_query);



// Total Recipes
$recipe_query = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM recipes");

$recipeData = mysqli_fetch_assoc($recipe_query);



// Total Users
$user_count_query = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM users");

$userCountData = mysqli_fetch_assoc($user_count_query);



// Total Reviews
$review_query = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM reviews");

$reviewData = mysqli_fetch_assoc($review_query);

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
            box-shadow:2px 0px 10px rgba(0,0,0,0.1);
        }

        .logo{
            text-align:center;
            font-size:24px;
            font-weight:bold;
            margin-bottom:30px;
        }

        .sidebar a{
            display:block;
            padding:12px;
            margin:8px;
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
            box-shadow:0px 4px 10px rgba(0,0,0,0.08);
        }

        .welcome{
            margin-top:20px;
            background:linear-gradient(to right,#FFD6C9,#F8C8DC);
            padding:30px;
            border-radius:25px;
            color:#5A4636;
        }

        .cards{
            margin-top:20px;
        }

        .card{
            width:28%;
            background:white;
            display:inline-block;
            margin-right:2%;
            margin-bottom:20px;
            padding:20px;
            border-radius:20px;
            box-shadow:0px 4px 10px rgba(0,0,0,0.08);
            vertical-align:top;
        }

        .card:hover{
            transform:scale(1.02);
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

        .blue{
            background:#CFE7FF;
        }

        .orange{
            background:#FFD9B3;
        }

        .activity{
            margin-top:20px;
            background:white;
            padding:20px;
            border-radius:20px;
            box-shadow:0px 4px 10px rgba(0,0,0,0.08);
        }

        ul{
            line-height:35px;
        }

    </style>

</head>

<body>

<div class="sidebar">

    <div class="logo">🍰 RecipeShare</div>

    <a class="active" href="dashboard.php">🏠 Dashboard</a>

    <a href="verification.php">
        👨‍🍳 Chef Verification
    </a>

    <a href="verification_details.php">
        📋 Verification Details
    </a>

    <a href="reports.php">
        🚩 Reports
    </a>

    <a href="review_report.php">
        📝 Review Reports
    </a>

    <a href="recipes.php">
        🍲 Recipes
    </a>

    <a href="recipe_details.php">
        📖 Recipe Details
    </a>

    <a href="users.php">
        👥 Users
    </a>

    <a href="cuisines.php">
        🌍 Cuisines
    </a>

    <a href="diet_types.php">
        🥗 Diet Types
    </a>

    <a href="moderation_logs.php">
        📜 Moderation Logs
    </a>

    <a href="profile.php">
        👤 Profile
    </a>

</div>

<div class="main">

    <div class="navbar">

        🌸 Welcome Moderator,
        <?php echo $userData['name']; ?>

    </div>

    <div class="welcome">

        <h1>🍓 Moderator Dashboard</h1>

        <p>
            Manage recipes, reports,
            users and chef requests easily.
        </p>

    </div>

    <div class="cards">

        <div class="card purple">

            <h2>
                <?php echo $pendingData['total']; ?>
            </h2>

            <p>🧁 Pending Requests</p>

        </div>

        <div class="card pink">

            <h2>
                <?php echo $reportData['total']; ?>
            </h2>

            <p>🚨 Pending Reports</p>

        </div>

        <div class="card green">

            <h2>
                <?php echo $recipeData['total']; ?>
            </h2>

            <p>🍲 Total Recipes</p>

        </div>

        <div class="card yellow">

            <h2>
                <?php echo $reviewData['total']; ?>
            </h2>

            <p>⭐ Total Reviews</p>

        </div>

        <div class="card blue">

            <h2>
                <?php echo $userCountData['total']; ?>
            </h2>

            <p>👥 Platform Users</p>

        </div>

        <div class="card orange">

            <h2>Active</h2>

            <p>🛡️ Moderation Status</p>

        </div>

    </div>

    <div class="activity">

        <h2>📝 Recent Activity</h2>

        <ul>

            <li>
                New chef verification request submitted.
            </li>

            <li>
                A recipe was reported by users.
            </li>

            <li>
                Moderator reviewed flagged content.
            </li>

            <li>
                New recipe published today.
            </li>

            <li>
                User account status updated.
            </li>

            <li>
                Cuisine category added successfully.
            </li>

        </ul>

    </div>

</div>

</body>
</html>