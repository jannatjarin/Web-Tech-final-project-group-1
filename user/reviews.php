<
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

<title>Reviews</title>

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

.review-box
{
    background-color:white;
    padding:20px;
    border-radius:10px;
    margin-bottom:20px;
}

.review-box img
{
    width:150px;
    height:100px;
    border-radius:10px;
    object-fit:cover;
}

textarea
{
    width:100%;
    height:100px;
    padding:10px;
    margin-top:10px;
}

button
{
    padding:10px 15px;
    background-color:#0b4d1c;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    margin-right:10px;
}

.delete-btn
{
    background-color:#c0392b;
}

.edit-btn
{
    background-color:#2980b9;
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
<a href="meal_plan.php">Meal Plan</a>
<a href="chefs.php">Chefs</a>
<a href="profile.php">Profile</a>

</div>

<div class="main">

<h2>My Reviews</h2>

<div class="review-box">

<img src="images/chiken.jpeg" alt="Food Image">

<h3>Chicken Curry</h3>

<p>Rating: 5 Stars</p>

<textarea>Very Delicious Recipe ,easy to make.my family loved it</textarea>

<br><br>

<button class="edit-btn">Edit Review</button>
<button class="delete-btn">Delete Review</button>

</div>

</div>

</body>

</html>