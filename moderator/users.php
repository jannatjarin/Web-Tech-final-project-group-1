<?php
session_start();

include("../config.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
}

$query = "
SELECT *
FROM users
ORDER BY created_at DESC
";

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>

<head>

<title>Users</title>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#FFF8F2;
    color:#5A4636;
}

.sidebar{
    width:220px;
    height:100vh;
    background:#FFF4EC;
    position:fixed;
    left:0;
    top:0;
    padding-top:20px;
    overflow-y:auto;
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
    background:#FFD6C9;
}

.active{
    background:#FFD6C9;
}

.main{
    margin-left:240px;
    padding:20px;
}

.card{
    background:white;
    padding:20px;
    margin-bottom:20px;
    border-radius:20px;
    box-shadow:0px 4px 10px rgba(0,0,0,0.08);
}

.profile{
    width:80px;
    height:80px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:10px;
}

.card h2{
    margin-top:10px;
}

.card p{
    line-height:28px;
}

.role{
    display:inline-block;
    padding:6px 14px;
    border-radius:15px;
    background:#DCCCF5;
    margin-top:10px;
}

</style>

</head>

<body>

<div class="sidebar">

    <div class="logo">🍰 RecipeShare</div>

    <a href="dashboard.php">
        🏠 Dashboard
    </a>

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

    <a class="active" href="users.php">
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

<h1>👥 Users</h1>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="card">

    <img
    src="../<?php echo $row['profile_pic']; ?>"
    class="profile">

    <h2>
        <?php echo $row['name']; ?>
    </h2>

    <p>
        <b>Email:</b>
        <?php echo $row['email']; ?>
    </p>

    <p>
        <b>Role:</b>
        <?php echo $row['role']; ?>
    </p>

    <p>
        <b>Joined:</b>
        <?php echo $row['created_at']; ?>
    </p>

    <div class="role">
        <?php echo $row['role']; ?>
    </div>

</div>

<?php } ?>

</div>

</body>
</html>