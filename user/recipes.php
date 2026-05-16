<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

<title>Browse Recipes</title>

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

.search-box
{
    margin-top:20px;
}

.search-box input
{
    width:300px;
    padding:10px;
    border:1px solid gray;
    border-radius:5px;
}

.filters
{
    margin-top:20px;
}

.filters select
{
    padding:10px;
    margin-right:10px;
    border-radius:5px;
}

.recipe-section
{
    margin-top:30px;
}

.recipe-card
{
    width:260px;
    background-color:white;
    display:inline-block;
    margin-right:20px;
    margin-bottom:20px;
    border-radius:10px;
    overflow:hidden;
    vertical-align:top;
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

.rating
{
    color:orange;
    padding-left:10px;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>Recipe Platform</h2>

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

<div class="topbar">

<h1>Browse Recipes</h1>

<p>Find delicious recipes from chefs and users.</p>

<div class="search-box">

<input type="text" placeholder="Search recipes...">

</div>

<div class="filters">

<select>
<option>Cuisine</option>
<option>Italian</option>
<option>Indian</option>
<option>Chinese</option>
<option>Vegetarian</option>
<option>Healthy</option>
</select>

<select>
<option>Difficulty</option>
<option>Easy</option>
<option>Medium</option>
<option>Hard</option>
</select>

<select>
<option>Cook Time</option>
<option>10 mins</option>
<option>20 mins</option>
<option>30 mins</option>
<option>15 mins</option>
<option>35 mins</option>
</select>

</div>

</div>

<div class="recipe-section">

<div class="recipe-card">

<img src="images/chiken.jpeg">

<h3>Chicken Curry</h3>

<p>Indian Cuisine</p>

<p>Cook Time: 40 mins</p>

<p class="rating">★★★★★</p>

<button>View Recipe</button>

<button>Bookmark</button>

</div>

<div class="recipe-card">

<img src="images/pasta.jpeg">

<h3>Italian Pasta</h3>

<p>Italian Cuisine</p>

<p>Cook Time: 25 mins</p>

<p class="rating">★★★★☆</p>

<button>View Recipe</button>

<button>Bookmark</button>

</div>

<div class="recipe-card">

<img src="images/greek.jpeg">

<h3>Greek Salad</h3>

<p>Healthy Food</p>

<p>Cook Time: 10 mins</p>

<p class="rating">★★★★★</p>

<button>View Recipe</button>

<button>Bookmark</button>

</div>

<div class="recipe-card">

<img src="images/barger.jpeg">

<h3>Beef Burger</h3>

<p>American Cuisine</p>

<p>Cook Time: 20 mins</p>

<p class="rating">★★★★☆</p>

<button>View Recipe</button>

<button>Bookmark</button>

</div>

<div class="recipe-card">

<img src="images/rice.jpeg">

<h3>Fried Rice</h3>

<p>Chinese Cuisine</p>

<p>Cook Time: 30 mins</p>

<p class="rating">★★★★★</p>

<button>View Recipe</button>

<button>Bookmark</button>

</div>

<div class="recipe-card">

<img src="images/pizza.jpeg">

<h3>Pizza</h3>

<p>Italian Cuisine</p>

<p>Cook Time: 35 mins</p>

<p class="rating">★★★★☆</p>

<button>View Recipe</button>

<button>Bookmark</button>
</div>


<div class="recipe-card">

<img src="images/vegan.jpeg">

<h3>Vegan Dijon Rosemary</h3>

<p>Vegetarian</p>

<p>Cook Time: 15 mins</p>

<p class="rating">★★★★☆</p>

<button>View Recipe</button>

<button>Bookmark</button>
</div>



<div class="recipe-card">

<img src="images/pancake.jpeg">

<h3>pancake</h3>

<p>Dessert</p>

<p>Cook Time: 10 mins</p>

<p class="rating">★★★★☆</p>

<button>View Recipe</button>

<button>Bookmark</button>
</div>



</div>

</div>

</div>

</body>

</html>