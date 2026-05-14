<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<style>
body{
font-family: Arial;
background-color: #f4f4f4;
margin: 0;
padding: 0;
}

.header{
background-color: #333;
color: white;
padding: 15px;
text-align: center;
}

.menu{
padding: 20px;
}

.menu a{
display: block;
padding: 10px;
width: 150px;
background-color: white;
margin-bottom: 10px;
text-decoration: none;
color: black;
border-radius: 5px;
}
</style>

</head>
<body>
    

<div class="header">
<h2>User Dashboard</h2>
</div>

<div class="menu">
<a href="browse_recipes.php">Browse Recipes</a>
<a href="bookmarks.php">Bookmarks</a>
<a href="reviews.php">Reviews</a>
<a href="shopping_lists.php">Shopping Lists</a>
<a href="meal_plan.php">Meal Plan</a>
<a href="chefs.php">Chefs</a>
<a href="profile.php">Profile</a>
</div>

</body>
</html>