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
{margin:0;
font-family:Arial;
background:#f5f5f5;
}
 
.sidebar
{
width:220px;
height:100vh;
background:#0b4d1c;
position:fixed;
padding-top:20px;
}
.sidebar h2
{
 color:white;
text-align:center;
}
.sidebar a{
display:block;
color:white;
padding:15px;
text-decoration:none;
}
.sidebar a:hover{
background:#146c2e;
}
 
.main{
margin-left:220px;
padding:20px;
}
 
.topbar{
    background:white;
    padding:20px;
    border-radius:10px;
}
 
.search-box input{
    width:300px;
    padding:10px;
}
.search-box button{
    padding:10px;
    background:#0b4d1c;
    color:white;
    border:none;
}
 
.recipe-card{
width:260px;
background:white;
display:inline-block;
margin:10px;
border-radius:10px;
overflow:hidden;
}
 
.recipe-card img{
    width:100%;height:180px;
}
 
button{
margin:10px;
padding:10px;
background:#0b4d1c;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
}
</style>
 
</head>
 
<body>
 
<div class="sidebar">
<h2>Recipe Platform</h2>
<a href="dashboard.php">Dashboard</a>
<a href="recipes.php">Browse Recipes</a>
<a href="savedbookmarks.php">Bookmarked Recipes</a>
<a href="reviews.php">Reviews</a>
<a href="shoppinglist.php">Shopping Lists</a>
<a href="mealplan.php">Meal Plan</a>
<a href="chefs.php">Chefs</a>
<a href="profile.php">Profile</a>
</div>
 
<div class="main">
 
<div class="topbar">
<h1>Browse Recipes</h1>
 
<form method="GET">
<input type="text" name="search" value="<?php echo $search; ?>" placeholder="Search Recipe">
<button>Search</button>
</form>
</div>
 
<div>
 
<?php while($row = $recipes->fetch_assoc()) { ?>
 
<div class="recipe-card">
 
<img src="<?php echo $row['featured_image_path']; ?>">
 
<h3><?php echo $row['title']; ?></h3>
 
<p><?php echo $row['difficulty']; ?></p>
 
<p><?php echo $row['cook_time_mins']; ?> mins</p>
 
<a href="recipes_details.php?id=<?php echo $row['id']; ?>">
<button>View Recipe</button>
</a>
 
<button onclick="addBookmark(<?php echo $row['id']; ?>)">
Bookmark
</button>
 
</div>
 
<?php } ?>
 
</div>
 
</div>
 
<script>
 
function addBookmark(recipe_id)
{
    console.log("Sending ID:", recipe_id);
 
    var xhttp = new XMLHttpRequest();
 
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            alert(this.responseText);
        }
    };
 
    xhttp.open("POST","bookmark_ajax.php",true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 
    xhttp.send("recipe_id=" + recipe_id);
}
 
</script>
 
</body>
</html>