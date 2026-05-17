<!-- verification.php -->

<?php
session_start();

include("../config.php");

$user_id = $_SESSION['user_id'];

$user = mysqli_query($conn,"SELECT * FROM users WHERE id='$user_id'");
$userData = mysqli_fetch_assoc($user);

$query = "
SELECT
chef_verification_requests.*,
users.name,
users.profile_pic
FROM chef_verification_requests
JOIN users
ON chef_verification_requests.user_id = users.id
";

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Chef Verification</title>

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
    overflow-y:auto;
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

.card{
    background:white;
    padding:20px;
    border-radius:20px;
    border:1px solid #dddddd;
    margin-bottom:20px;
}

.profile{
    width:80px;
    height:80px;
    border-radius:50%;
}

button{
    padding:10px 20px;
    border:none;
    border-radius:20px;
    cursor:pointer;
    margin-top:10px;
}

.approve{
    background:#CFE8CF;
}

.reject{
    background:#FFD6C9;
}

</style>

</head>

<body>

<div class="sidebar">

    <div class="logo">🍰 RecipeShare</div>

    <a href="dashboard.php">🏠 Dashboard</a>

    <a class="active" href="verification.php">
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

<h1>🧁 Chef Verification Requests</h1>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="card">

<img src="../<?php echo $row['profile_pic']; ?>" class="profile">

<h2><?php echo $row['name']; ?></h2>

<p><b>Motivation:</b> <?php echo $row['motivation']; ?></p>

<p><b>Credentials:</b> <?php echo $row['credentials_description']; ?></p>

<p><b>Status:</b> <?php echo $row['status']; ?></p>

<button class="approve">Approve</button>

<button class="reject">Reject</button>

</div>

<?php } ?>

</div>

</body>
</html>