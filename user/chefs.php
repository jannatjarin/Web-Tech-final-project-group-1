
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

<title>Chefs</title>

<style>

body
{
    margin:0;
    padding:0;
    font-family:Arial, sans-serif;
    background-color:#f5f5f5;
}

.sidebar
{
    width:220px;
    height:100vh;
    background-color:#0b4d1c;
    position:fixed;
    left:0;
    top:0;
    padding-top:20px;
}

.sidebar h2
{
    color:white;
    text-align:center;
}

.sidebar a
{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px;
}

.sidebar a:hover
{
    background-color:#146c2f;
}

.main
{
    margin-left:220px;
    padding:20px;
}

.chef-card
{
    background-color:white;
    width:250px;
    padding:20px;
    border-radius:10px;
    display:inline-block;
    margin:15px;
    text-align:center;
}

.chef-card img
{
    width:120px;
    height:120px;
    border-radius:50%;
}

button
{
    padding:10px 20px;
    background-color:#0b4d1c;
    color:white;
    border:none;
    border-radius:5px;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>User Panel</h2>

<a href="dashboard.php">Dashboard</a>
<a href="recipes.php">Browse Recipes</a>
<a href="bookmarks.php">Bookmarks</a>
<a href="reviews.php">Reviews</a>
<a href="shoppinglist.php">Shopping Lists</a>
<a href="mealplan.php">Meal Plan</a>
<a href="chefs.php">Chefs</a>
<a href="profile.php">Profile</a>

</div>

<div class="main">

<h2>Followed Chefs</h2>

<div class="chef-card">

<img src="images/chef1.jpeg">

<h3>Chef Rahim</h3>

<p>Italian Specialist</p>

<button>Following</button>

</div>

<div class="chef-card">

<img src="images/chef2.jpeg">

<h3>Chef Karim</h3>

<p>Chiness Food Expert</p>

<button>Following</button>

</div>




<div class="chef-card">

<img src="images/chef3.jpeg">

<h3>Chef Anila</h3>

<p>American Food Expert</p>

<button>Following</button>

</div>












</body>

</html>