<?php
session_start();



?>

<!DOCTYPE html>

<html>

<head>

<title>Shopping List</title>

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
    margin-bottom:20px;
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

.list-box
{
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

h2
{
    color:#0b4d1c;
}

input
{
    padding:10px;
    margin:5px;
    width:180px;
}

button
{
    padding:10px 20px;
    background-color:#0b4d1c;
    color:white;
    border:none;
    cursor:pointer;
}

button:hover
{
    background-color:#146c2f;
}

table
{
    width:100%;
    margin-top:20px;
    border-collapse:collapse;
}

table th
{
    background-color:#0b4d1c;
    color:white;
}

table th,
table td
{
    border:1px solid #ccc;
    padding:12px;
    text-align:center;
}

.delete-btn
{
    color:red;
    text-decoration:none;
    font-weight:bold;
}

.delete-btn:hover
{
    text-decoration:underline;
}

.empty
{
    text-align:center;
    color:gray;
    padding:20px;
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

    <a href="shoppinglist.php">Shopping Lists</a>

    <a href="mealplan.php">Meal Plan</a>

    <a href="chefs.php">Chefs</a>

    <a href="profile.php">Profile</a>

</div>

<div class="main">

    <h2>Shopping List</h2>

    <div class="list-box">

        <form method="POST">

            <input
                type="text"
                name="item"
                placeholder="Item Name"
                required
            >

            <input
                type="text"
                name="qty"
                placeholder="Quantity"
            >

            <input
                type="text"
                name="unit"
                placeholder="Unit"
            >

            <button type="submit" name="add_item">
                Add Item
            </button>

        </form>

        <table>

            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Action</th>
            </tr>

           
           

    </div>

</div>

</body>

</html>