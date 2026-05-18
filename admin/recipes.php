<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

$search = "";

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $searchValue = "%$search%";

    $stmt = $conn->prepare("
    SELECT recipes.*, users.name
    FROM recipes
    JOIN users ON recipes.author_id = users.id
    WHERE recipes.title LIKE ?
    ");

    $stmt->bind_param("s", $searchValue);

    $stmt->execute();

    $recipes = $stmt->get_result();
}
else
{
    $stmt = $conn->prepare("
    SELECT recipes.*, users.name
    FROM recipes
    JOIN users ON recipes.author_id = users.id
    ");

    $stmt->execute();

    $recipes = $stmt->get_result();
}

/* DELETE RECIPE */

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM recipes WHERE id=?");

    $stmt->bind_param("i", $id);

    $stmt->execute();

    header("Location: recipes.php");
}

/* FEATURE RECIPE */

if(isset($_GET['feature']))
{
    $id = $_GET['feature'];

    $stmt = $conn->prepare("
    UPDATE recipes
    SET is_chef_pick = 1
    WHERE id=?
    ");

    $stmt->bind_param("i", $id);

    $stmt->execute();

    header("Location: recipes.php");
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Recipes</title>

<style>

body{
margin:0;
font-family:Arial;
background:#f5f5f5;
}

.sidebar{
width:220px;
height:100vh;
background:#7E9C97;
position:fixed;
padding-top:20px;
}

.sidebar h2{
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
background:#667F7B;
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
background:#7E9C97;
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
vertical-align:top;
}

.recipe-card img{
width:100%;
height:180px;
}

.recipe-info{
padding:15px;
}

button{
margin-top:10px;
padding:10px;
background:#7E9C97;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
}

.delete{
background:#d46a6a;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>Admin Panel</h2>

<a href="dashboard.php">Dashboard</a>
<a href="users.php">Manage Users</a>
<a href="recipes.php">Manage Recipes</a>
<a href="analytics.php">Analytics</a>
<a href="settings.php">Settings</a>

</div>

<div class="main">

<div class="topbar">

<h1>Manage Recipes</h1>

<form method="GET" class="search-box">

<input type="text"
name="search"
value="<?php echo htmlspecialchars($search); ?>"
placeholder="Search Recipe">

<button>Search</button>

</form>

</div>

<div>

<?php while($row = $recipes->fetch_assoc()) { ?>

<div class="recipe-card">

<img src="<?php echo $row['featured_image_path']; ?>">

<div class="recipe-info">

<h3><?php echo $row['title']; ?></h3>

<p>
Author:
<?php echo $row['name']; ?>
</p>

<p>
Difficulty:
<?php echo $row['difficulty']; ?>
</p>

<p>
Status:
<?php echo $row['status']; ?>
</p>

<a href="?feature=<?php echo $row['id']; ?>">

<button>
Feature Recipe
</button>

</a>

<a href="?delete=<?php echo $row['id']; ?>">

<button class="delete">
Delete
</button>

</a>

</div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>