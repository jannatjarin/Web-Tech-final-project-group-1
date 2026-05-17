<?php
session_start();

include("../config.php");

if(!isset($_SESSION["user_id"]) || $_SESSION["role"] != "moderator")
{
    header("Location: ../login.php");
    exit();
}


$query = "SELECT * FROM reviews";

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
    background:#FFF4EC;
    position:fixed;
    padding-top:20px;
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
    background:#FFD6C9;
}

.active{
    background:#FFD6C9;
}

.logo{
    text-align:center;
    font-size:24px;
    margin-bottom:30px;
    font-weight:bold;
}

.main{
    margin-left:240px;
    padding:20px;
}

.report-card{
    background:white;
    padding:20px;
    border-radius:20px;
    margin-bottom:20px;
    border:1px solid lightgray;
}

button{
    padding:10px 20px;
    border:none;
    border-radius:20px;
    margin-top:10px;
    cursor:pointer;
}

.view{
    background:#DCCCF5;
}

.action{
    background:#FFD6C9;
}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">🍰 RecipeShare</div>

<a href="dashboard.php">🏠 Dashboard</a>
<a href="verification.php">👨‍🍳 Chef Requests</a>
<a href="reports.php">🚩 Reports</a>
<a class="active" href="review_report.php">📝 Review Reports</a>
<a href="recipes.php">🍲 Recipes</a>

</div>

<div class="main">

<h1>📝 Review Reports</h1>

<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<div class="report-card">

<h2>
Review ID :
<?php echo $row['id']; ?>
</h2>

<p>
Recipe ID :
<?php echo $row['recipe_id']; ?>
</p>

<p>
User ID :
<?php echo $row['user_id']; ?>
</p>

<p>
Rating :
<?php echo $row['rating']; ?>/5
</p>

<p>
Review :
<?php echo $row['review_text']; ?>
</p>

<p>
Chef Reply :
<?php echo $row['chef_reply']; ?>
</p>

<p>
Created At :
<?php echo $row['created_at']; ?>
</p>

<button class="view">
View
</button>

<button class="action">
Take Action
</button>

</div>

<?php

}

?>

</div>

</body>
</html>