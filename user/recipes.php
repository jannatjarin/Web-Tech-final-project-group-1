<?php
session_start();
 
$conn = new mysqli("localhost","root","","recipe_platform");
 
if($conn->connect_error)
{
    die("Connection Failed");
}
 
$search = "";
 
if(isset($_GET['search']))
{
    $search = $_GET['search'];
 
    $recipes = $conn->query("SELECT * FROM recipes
    WHERE title LIKE '%$search%'");
}
else
{
    $recipes = $conn->query("SELECT * FROM recipes");
}
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
    background:white;
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
 
.search-box button
{
    padding:10px 15px;
    background-color:#0b4d1c;
    color:white;
    border:none;
    border-radius:5px;
}
 
.recipe-section
{
    margin-top:30px;
}
 
.recipe-card
{
    width:260px;
    background:white;
    display:inline-block;
    margin-right:20px;
    margin-bottom:20px;
    border-radius:10px;
    overflow:hidden;
}
 
.recipe-card img
{
    width:100%;
    height:180px;
}
 
.recipe-card h3,
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
<a href="shoppinglists.php">Shopping Lists</a>
<a href="mealplan.php">Meal Plan</a>
<a href="chefs.php">Chefs</a>
<a href="profile.php">Profile</a>
 
</div>
 
<div class="main">
 
<div class="topbar">
 
<h1>Browse Recipes</h1>
 
<p>Find delicious recipes.</p>
 
<div class="search-box">
 
<form method="GET">
 
<input type="text" name="search" placeholder="Search Recipe" value="<?php echo $search; ?>">
 
<button type="submit">Search</button>
 
</form>
 
</div>
 
</div>
 
<div class="recipe-section">
 
<?php
while($row = $recipes->fetch_assoc())
{
?>
 
<div class="recipe-card">
 
<img src="<?php echo $row['featured_image_path']; ?>">
 
<h3><?php echo $row['title']; ?></h3>
 
<p><?php echo $row['difficulty']; ?></p>
 
<p>Cook Time: <?php echo $row['cook_time_mins']; ?> mins</p>
 
<a href="recipes_details.php?id=<?php echo $row['id']; ?>">
 
<button>View Recipe</button>
 
</a>
 
</div>
 
<?php
}
?>
 
</div>
 
</div>
 
</body>
 
</html>