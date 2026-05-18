<?php
session_start();

include("../config.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

if($_SESSION['role'] != 'moderator')
{
    header("Location: ../login.php");
    exit();
}



$pending_query = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM chef_verification_requests
WHERE status='pending'");

$pendingData = mysqli_fetch_assoc($pending_query);




$report_query = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM content_reports
WHERE status='pending'");

$reportData = mysqli_fetch_assoc($report_query);




$recipe_query = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM recipes");

$recipeData = mysqli_fetch_assoc($recipe_query);




$user_query = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM users");

$userData = mysqli_fetch_assoc($user_query);




$review_query = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM reviews");

$reviewData = mysqli_fetch_assoc($review_query);




$flagged_review_query = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM content_reports
WHERE entity_type='review'
AND status='pending'");

$flaggedReviewData = mysqli_fetch_assoc($flagged_review_query);




$new_recipe_query = mysqli_query($conn,
"SELECT COUNT(*) AS total
FROM recipes
WHERE DATE(created_at)=CURDATE()");

$newRecipeData = mysqli_fetch_assoc($new_recipe_query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Moderator Dashboard</title>

<style>

body{
    margin:0;
    padding:0;
    font-family:Arial;
    background:#FFF8F2;
}

.sidebar{
    width:230px;
    height:100vh;
    background:#FFEADD;
    position:fixed;
    left:0;
    top:0;
    padding-top:20px;
}

.sidebar h2{
    text-align:center;
    color:#5A4636;
}

.sidebar a{
    display:block;
    padding:12px 20px;
    text-decoration:none;
    color:#5A4636;
    margin:8px;
    border-radius:15px;
}

.sidebar a:hover{
    background:#FFD6C9;
}

.active{
    background:#FFD6C9;
}

.main{
    margin-left:250px;
    padding:20px;
}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.card{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0px 2px 8px rgba(0,0,0,0.1);
}

.card h2{
    margin:0;
    color:#5A4636;
    font-size:20px;
}

.card h1{
    margin-top:15px;
    color:#5A4636;
    font-size:40px;
}

.pink{
    background:#FFD6C9;
}

.green{
    background:#CFE8CF;
}

.yellow{
    background:#FFF0B5;
}

.blue{
    background:#D6E6FF;
}

.orange{
    background:#FFE0B2;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>Moderator</h2>

<a href="dashboard.php" class="active">Dashboard</a>
<a href="verification.php">Chef Verification</a>
<a href="recipes.php">Recipes</a>
<a href="reports.php">Reports</a>
<a href="review_report.php">Review Reports</a>
<a href="cuisines.php">Cuisines</a>
<a href="diet_types.php">Diet Types</a>
<a href="profile.php">Profile</a>
<a href="quality_report.php">Quality Report</a>
<a href="moderation_logs.php">Moderation Logs</a>
<a href="../logout.php">Logout</a>

</div>



<div class="main">

<h1>Moderator Dashboard</h1>

<div class="cards">


<div class="card pink">

<h2>
Pending Chef Requests
</h2>

<h1>
<?php echo $pendingData['total']; ?>
</h1>

</div>



<div class="card green">

<h2>
Open Reports
</h2>

<h1>
<?php echo $reportData['total']; ?>
</h1>

</div>



<div class="card blue">

<h2>
Total Recipes
</h2>

<h1>
<?php echo $recipeData['total']; ?>
</h1>

</div>



<div class="card yellow">

<h2>
Total Users
</h2>

<h1>
<?php echo $userData['total']; ?>
</h1>

</div>



<div class="card orange">

<h2>
Total Reviews
</h2>

<h1>
<?php echo $reviewData['total']; ?>
</h1>

</div>



<div class="card pink">

<h2>
Flagged Reviews
</h2>

<h1>
<?php echo $flaggedReviewData['total']; ?>
</h1>

</div>

</div>

</div>

</body>
</html>