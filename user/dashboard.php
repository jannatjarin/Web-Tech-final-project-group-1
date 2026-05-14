<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

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
    padding:15px 20px;
}

.sidebar a:hover
{
    background-color:#146c2e;
}

.main
{
    margin-left:220px;
    padding:20px;
}

.topbar
{
    background-color:white;
    padding:20px;
    border-radius:10px;
}

.cards
{
    margin-top:20px;
}

.smallcard1
{
    width:180px;
    background-color:rgb(1, 141, 101);
    display:inline-block;
    margin-right:15px;
    padding:20px;
    border-radius:10px;
    text-align:center;
}

.smallcard2
{
    width:180px;
    background-color:rgb(141, 1, 113);
    display:inline-block;
    margin-right:15px;
    padding:20px;
    border-radius:10px;
    text-align:center;
}

.smallcard3
{
    width:180px;
    background-color:rgb(1, 108, 141);
    display:inline-block;
    margin-right:15px;
    padding:20px;
    border-radius:10px;
    text-align:center;
}

.smallcard4
{
    width:180px;
    background-color:rgb(141, 85, 1);
    display:inline-block;
    margin-right:15px;
    padding:20px;
    border-radius:10px;
    text-align:center;
}

.recipe-section
{
    margin-top:30px;
}

.recipe-card
{
    width:250px;
    background-color:white;
    display:inline-block;
    margin-right:20px;
    border-radius:10px;
    overflow:hidden;
}

.recipe-card img
{
    width:100%;
    height:180px;
}

.recipe-card h3
{
    padding-left:10px;
}

.recipe-card p
{
    padding-left:10px;
}

button
{
    margin:10px;
    padding:10px 15px;
    background-color:#0b4d1c;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover
{
    background-color:#146c2e;
}

.profile
{
    float:right;
}

.profile img
{
    width:40px;
    height:40px;
    border-radius:50%;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>Recipe Platform</h2>

<a href="dashboard.php">Dashboard</a>

<a href="browse_recipes.php">Browse Recipes</a>

<a href="bookmarks.php">Bookmarks</a>

<a href="reviews.php">Reviews</a>

<a href="shopping_lists.php">Shopping Lists</a>

<a href="meal_plan.php">Meal Plan</a>

<a href="chefs.php">Chefs</a>

<a href="profile.php">Profile</a>

<div class="main">

<div class="topbar">

<div class="profile">
<img src="images/profile.jpg" alt ="profile picture">
</div>

<h1>Welcome Back, Anu!</h1>

<p>Discover, cook and share amazing recipes.</p>
</div>


<div class="cards">

<div class="smallcard1">
<h1>12</h1>
<p>Bookmarked Recipes</p>
</div>

<div class="smallcard2">
<h1>8</h1>
<p>Reviews Written</p>
</div>

<div class="smallcard3">
<h1>3</h1>
<p>Meal Plans</p>
</div>

<div class="smallcard4">
<h1>2</h1>
<p>Shopping Lists</p>
</div>

</div>

<div class="recipe-section">

<h2>Recently Viewed Recipes</h2>

<div class="recipe-card">

<img src="chiken curry.jpg">

<h3>Chicken Curry</h3>

<p>Indian Cuisine</p>

<button>View Recipe</button>

</div>

<div class="recipe-card">

<img src="spaghatti.jpg">

<h3>Spaghetti Bolognese</h3>

<p>Italian Cuisine</p>

<button>View Recipe</button>

</div>

<div class="recipe-card">

<img src="salad.jpg">

<h3>Healthy Salad</h3>

<p>Healthy Food</p>

<button>View Recipe</button>

</div>

</div>

</div>

</body>

</html>


