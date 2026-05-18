
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

<title>Recipe Details</title>

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

.header
{
    background-color:white;
    padding:20px;
    border-radius:10px;
    margin-bottom:20px;
}

.recipe-box
{
    background-color:white;
    border-radius:10px;
    padding:20px;
}

.recipe-box img
{
    width:50%;
    height:350px;
    border-radius:10px;
}

.recipe-box h2
{
    margin-top:20px;
}

.recipe-box p
{
    line-height:25px;
}



.ingredients
{
    margin-top:20px;
    width :50% ;
    
     
   
}

.ingredients ul
{
    padding-left:20px;
     
    
}

.steps
{
    margin-right:20px;
    width :50% ;
     
    
    
}

.steps ol
{
    padding-left:20px;
     
}

.nutrition
{
    margin-top:20px;
    background-color:#f0f0f0;
    padding:15px;
    border-radius:10px;
}

.nutrition table
{
    width:100%;
    border-collapse:collapse;
}

.nutrition table td
{
    padding:10px;
    border-bottom:1px solid #ccc;
}

.button-group
{
    margin-top:20px;
}

button
{
    padding:10px 20px;
    background-color:#0b4d1c;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    margin-right:10px;
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
<a href="recipes.php">Browse Recipes</a>
<a href="savedbookmark.php">Bookmarked Recipes</a>
<a href="reviews.php">Reviews</a>
<a href="shoppinglists.php">Shopping Lists</a>
<a href="mealplan.php">Meal Plan</a>
<a href="chefs.php">Chefs</a>
<a href="profile.php">Profile</a>

</div>

<div class="main">

<div class="header">
<h2>Recipe Details</h2>
</div>

<div class="recipe-box">

<img src="images/chiken.jpeg" alt="Recipe">

<h2>Chicken Curry</h2>

<p>
Cuisine: Indian <br>
Difficulty: Medium <br>
Cook Time: 45 Minutes <br>
Servings: 4 <br>
Rating: 4.8
</p>

<div class="ingredients">

<h3>Ingredients</h3>

<ul>
<li>500g Chicken</li>
<li>2 Onion</li>
<li>1 Tomato</li>
<li>2 tbsp Oil</li>
<li>Salt</li>
<li>Spices</li>
</ul>

</div>

<div class="steps">

<h3>Preparation Steps</h3>

<ol>
<li>Cut the chicken properly.</li>
<li>Heat oil in a pan.</li>
<li>Cook onion and tomato.</li>
<li>Add spices and chicken.</li>
<li>Cook for 30 minutes.</li>
</ol>

</div>

<div class="nutrition">

<h3>Nutrition Per Serving</h3>

<table>

<tr>
<td>Calories</td>
<td>320 kcal</td>
</tr>

<tr>
<td>Protein</td>
<td>28 g</td>
</tr>

<tr>
<td>Carbohydrates</td>
<td>12 g</td>
</tr>

<tr>
<td>Fat</td>
<td>18 g</td>
</tr>

<tr>
<td>Fiber</td>
<td>3 g</td>
</tr>

</table>

</div>

<div class="button-group">

<button>Bookmark Recipe</button>

<button>Add To Shopping List</button>

</div>

</div>

</div>

</body>

</html>