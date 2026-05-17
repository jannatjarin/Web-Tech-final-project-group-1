
<!-- bookmarks.php -->
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

<title>Bookmarks</title>

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

.recipe-card
{
    background-color:white;
    border-radius:10px;
    width:250px;
    display:inline-block;
    margin:15px;
    padding:15px;
}

.recipe-card img
{
    width:100%;
    height:180px;
    border-radius:10px;
}

.recipe-card button
{
    padding:10px;
    width:100%;
    background-color:#0b4d1c;
    color:white;
    border:none;
    border-radius:5px;
}

button:hover
{
    background-color:#146c2f;
}


</style>

</head>

<body>

<div class="sidebar">

<h2>User Panel</h2>

<a href="dashboard.php">Dashboard</a>
<a href="browse_recipes.php">Browse Recipes</a>
<a href="bookmarks.php">Bookmarks</a>
<a href="reviews.php">Reviews</a>
<a href="shopping_lists.php">Shopping Lists</a>
<a href="mealplan.php">Meal Plan</a>
<a href="chefs.php">Chefs</a>
<a href="profile.php">Profile</a>

</div>

<div class="main">

<h2>Saved Recipes</h2>

<div class="recipe-card">

<img src="images/pasta.jpeg">

<h3>Pasta</h3>

<p>Italian Cuisine</p>

<button>Remove</button>

</div>

<div class="recipe-card">

<img src="images/barger.jpeg">

<h3>Burger</h3>

<p>Fast Food</p>

<button>Remove</button>
</div>


<div class="recipe-card">

<img src="images/pancake.jpeg">

<h3>Pancake</h3>

<p>Dessert</p>

<button>Remove</button>
</div>



<div class="recipe-card">

<img src="images/rice.jpeg">

<h3>Rice</h3>

<p>Chinese Cuisine</p>

<button>Remove</button>
</div>






</body>

</html>