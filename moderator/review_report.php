<?php
session_start();

include("../config.php");

$query = "
SELECT
content_reports.*,
users.name
FROM content_reports
JOIN users
ON content_reports.reporter_id = users.id
WHERE entity_type='review'
";

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Review Reports</title>

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
    margin-bottom:30px;
    font-weight:bold;
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
    border-radius:20px;
    border:1px solid #dddddd;
    margin-bottom:20px;
}

</style>

</head>

<body>

<div class="sidebar">

    <div class="logo">🍰 RecipeShare</div>

    <a href="dashboard.php">🏠 Dashboard</a>

    <a href="verification.php">
        👨‍🍳 Chef Verification
    </a>

    <a href="verification_details.php">
        📋 Verification Details
    </a>

    <a href="reports.php">
        🚩 Reports
    </a>

    <a class="active" href="review_report.php">
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

<h1>📝 Review Reports</h1>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="card">

<h2>Review Report #<?php echo $row['id']; ?></h2>

<p><b>Reporter:</b> <?php echo $row['name']; ?></p>

<p><b>Reason:</b> <?php echo $row['reason']; ?></p>

<p><b>Status:</b> <?php echo $row['status']; ?></p>

</div>

<?php } ?>

</div>

</body>
</html>