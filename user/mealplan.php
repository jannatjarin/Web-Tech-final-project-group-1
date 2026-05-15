
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

<title>Meal Plan</title>

<style>

body
{
    margin:0;
    padding:0;
    font-family:Arial, sans-serif;
    background-color:rgb(41, 141, 1);;
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

table
{
    width:100%;
    background-color:rgb(129, 141, 1);;
    border-collapse:collapse;
}

table th, table td
{
    border:1px solid #ddd;
    padding:15px;
    text-align:center;
}

button {
    margin:10px;
    padding:10px 15px;
    background-color:#0b4d1c;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
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

<h2>Weekly Meal Plan</h2>

<p> <        18 May - 24 May              >   </p>

<table>

<tr>
<th>Day</th>
<th>Breakfast</th>
<th>Lunch</th>
<th>Dinner</th>
</tr>

<tr>
<td>Saturday</td>
<td>
    <select name="breakfast_sat">
        <option>Pancake</option>
        <option>Egg</option>
        <option>Bread</option>
        <option>Oatmeal</option>
    </select>
</td>
<td>
    <select name="lunch_sat">
        <option>Greek Salad</option>
        <option>Rice</option>
        <option>Chicken Curry</option>
        <option>Pasta</option>
    </select>
</td>
<td>
    <select name="dinner_sat">
        <option>Spaghetti</option>
        <option>Burger</option>
        <option>Rice</option>
        <option>Pasta</option>
    </select>
</td>
</tr>

<tr>
<td>Sunday</td>
<td>
    <select name="breakfast_sun">
        <option>Bread</option>
        <option>Egg</option>
        <option>Pancake</option>
        <option>Oatmeal</option>
    </select>
</td>
<td>
    <select name="lunch_sun">
        <option>Chicken Curry</option>
        <option>Rice</option>
        <option>Greek Salad</option>
        <option>Pasta</option>
    </select>
</td>
<td>
    <select name="dinner_sun">
        <option>Pasta</option>
        <option>Burger</option>
        <option>Spaghetti</option>
        <option>Rice</option>
    </select>
</td>
</tr>


<tr>
<td>Tuesday</td>
<td>
    <select name="breakfast_tue">
        <option>Pancake</option>
        <option>Egg</option>
        <option>Bread</option>
        <option>Oatmeal</option>
    </select>
</td>
<td>
    <select name="lunch_tue">
        <option>Greek Salad</option>
        <option>Rice</option>
        <option>Chicken Curry</option>
        <option>Pasta</option>
    </select>
</td>
<td>
    <select name="dinner_tue">
        <option>Spaghetti</option>
        <option>Burger</option>
        <option>Rice</option>
        <option>Pasta</option>
    </select>
</td>
</tr>

<tr>
<td>Wednesday</td>
<td>
    <select name="breakfast_wed">
        <option>Pancake</option>
        <option>Egg</option>
        <option>Bread</option>
        <option>Oatmeal</option>
    </select>
</td>
<td>
    <select name="lunch_wed">
        <option>Greek Salad</option>
        <option>Rice</option>
        <option>Chicken Curry</option>
        <option>Pasta</option>
    </select>
</td>
<td>
    <select name="dinner_wed">
        <option>Spaghetti</option>
        <option>Burger</option>
        <option>Rice</option>
        <option>Pasta</option>
    </select>
</td>
</tr>

<tr>
<td>Thursday</td>
<td>
    <select name="breakfast_thu">
        <option>Pancake</option>
        <option>Egg</option>
        <option>Bread</option>
        <option>Oatmeal</option>
    </select>
</td>
<td>
    <select name="lunch_thu">
        <option>Greek Salad</option>
        <option>Rice</option>
        <option>Chicken Curry</option>
        <option>Pasta</option>
    </select>
</td>
<td>
    <select name="dinner_thu">
        <option>Spaghetti</option>
        <option>Burger</option>
        <option>Rice</option>
        <option>Pasta</option>
    </select>
</td>
</tr>


<tr>
<td>Friday</td>
<td>
    <select name="breakfast_fri">
        <option>Pancake</option>
        <option>Egg</option>
        <option>Bread</option>
        <option>Oatmeal</option>
    </select>
</td>
<td>
    <select name="lunch_fri">
        <option>Greek Salad</option>
        <option>Rice</option>
        <option>Chicken Curry</option>
        <option>Pasta</option>
    </select>
</td>
<td>
    <select name="dinner_fri">
        <option>Spaghetti</option>
        <option>Burger</option>
        <option>Rice</option>
        <option>Pasta</option>
    </select>
</td>
</tr>


</table>

<button>Generate Shopping List</button>

</div>

</body>

</html>