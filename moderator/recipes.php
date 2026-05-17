<?php
session_start();

include("../config.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
}

$user_id = $_SESSION['user_id'];

$query = "
SELECT *
FROM recipes
ORDER BY created_at DESC
";

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>

<head>

<title>Recipes</title>

<style>

body{
    margin:0;
    font-family:Arial;
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
    width:28%;
    display:inline-block;
    margin:10px;
    background:white;
    padding:15px;
    border-radius:20px;
    box-shadow:0px 4px 10px rgba(0,0,0,0.08);
    vertical-align:top;
}

.card img{
    width:100%;
    height:200px;
    object-fit:cover;
    border-radius:15px;
    margin-bottom:10px;
}

.card h2{
    margin-top:10px;
}

.card p{
    line-height:28px;
}

.status{
    padding:6px 12px;
    border-radius:15px;
    display:inline-block;
    font-size:14px;
    margin-top:5px;
    background:#FFE9A8;
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

    <a href="review_report.php">
        📝 Review Reports
    </a>

    <a class="active" href="recipes.php">
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

<h1>🍲 All Recipes</h1>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="card">

    <img src="../<?php echo $row['featured_image_path']; ?>">

    <h2>
        <?php echo $row['title']; ?>
    </h2>

    <p>
        <b>Description:</b>
        <?php echo $row['description']; ?>
    </p>

    <p>
        <b>Cuisine ID:</b>
        <?php echo $row['cuisine_id']; ?>
    </p>

    <p>
        <b>Diet Type ID:</b>
        <?php echo $row['diet_type_id']; ?>
    </p>

    <p>
        <b>Difficulty:</b>
        <?php echo $row['difficulty']; ?>
    </p>

    <p>
        <b>Prep Time:</b>
        <?php echo $row['prep_time_mins']; ?> mins
    </p>

    <p>
        <b>Cook Time:</b>
        <?php echo $row['cook_time_mins']; ?> mins
    </p>

    <p>
        <b>Servings:</b>
        <?php echo $row['servings']; ?>
    </p>

    <p>
        <b>Views:</b>
        <?php echo $row['view_count']; ?>
    </p>

    <p>
        <b>Chef Pick:</b>
        <?php echo $row['is_chef_pick']; ?>
    </p>

    <p>
        <b>Created At:</b>
        <?php echo $row['created_at']; ?>
    </p>

    <div class="status">
        <?php echo $row['status']; ?>
    </div>

</div>

<?php } ?>

</div>

</body>
</html>