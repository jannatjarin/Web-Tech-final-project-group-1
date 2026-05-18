<?php
session_start();


if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}


$conn = new mysqli("localhost","root","","recipe_platform");

if($conn->connect_error)
{
    die("Connection Failed : " . $conn->connect_error);
}


$user_id = $_SESSION['user_id'];

$user = $conn->query("SELECT * FROM users WHERE id='$user_id'");
$userData = $user->fetch_assoc();


$bookmark = $conn->query("SELECT COUNT(*) as total FROM bookmarks WHERE user_id='$user_id'");
$bookmarkData = $bookmark->fetch_assoc();

$review = $conn->query("SELECT COUNT(*) as total FROM reviews WHERE user_id='$user_id'");
$reviewData = $review->fetch_assoc();

$meal = $conn->query("SELECT COUNT(*) as total FROM meal_plans WHERE user_id='$user_id'");
$mealData = $meal->fetch_assoc();

$shopping = $conn->query("SELECT COUNT(*) as total FROM shopping_lists WHERE user_id='$user_id'");
$shoppingData = $shopping->fetch_assoc();


$recipes = $conn->query("SELECT * FROM recipes LIMIT 4");
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<style>

body{
    margin:0;
    padding:0;
    font-family:Arial;
    background:#f5f5f5;
}

.sidebar{
    width:220px;
    height:100vh;
    background:#0b4d1c;
    position:fixed;
    left:0;
    top:0;
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

.profile{
    float:right;
}

.profile img{
    width:40px;
    height:40px;
    border-radius:50%;
}

.cards{
    margin-top:20px;
}

.smallcard1,.smallcard2,.smallcard3,.smallcard4{
    width:180px;
    display:inline-block;
    margin-right:15px;
    padding:20px;
    border-radius:10px;
    color:white;
    text-align:center;
}

.smallcard1{background:rgb(1,141,101);}
.smallcard2{background:rgb(141,1,113);}
.smallcard3{background:rgb(1,108,141);}
.smallcard4{background:rgb(141,85,1);}

.recipe-section{
    margin-top:30px;
}

.recipe-card{
    width:250px;
    background:white;
    display:inline-block;
    margin-right:20px;
    border-radius:10px;
    overflow:hidden;
    margin-bottom:20px;
}

.recipe-card img{
    width:100%;
    height:180px;
    object-fit:cover;
}

.recipe-card h3,
.recipe-card p{
    padding-left:10px;
}

button{
    margin:10px;
    padding:10px 15px;
    background:#0b4d1c;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#146c2e;
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
    <a href="shopping_lists.php">Shopping Lists</a>
    <a href="mealplan.php">Meal Plan</a>
    <a href="chefs.php">Chefs</a>
    <a href="profile.php">Profile</a>

</div>

<div class="main">

    <div class="topbar">

        <div class="profile">
            <img src="images/profile.jpeg">
        </div>

        <h1>
            Welcome Back, <?php echo $userData['name']; ?>!
        </h1>

        <p>Discover, cook and share amazing recipes.</p>

    </div>

    <div class="cards">

        <div class="smallcard1">
            <h1><?php echo $bookmarkData['total']; ?></h1>
            <p>Bookmarked Recipes</p>
        </div>

        <div class="smallcard2">
            <h1><?php echo $reviewData['total']; ?></h1>
            <p>Reviews Written</p>
        </div>

        <div class="smallcard3">
            <h1><?php echo $mealData['total']; ?></h1>
            <p>Meal Plans</p>
        </div>

        <div class="smallcard4">
            <h1><?php echo $shoppingData['total']; ?></h1>
            <p>Shopping Lists</p>
        </div>

    </div>

    <div class="recipe-section">

        <h2>Recently Viewed Recipes</h2>

        <?php while($row = $recipes->fetch_assoc()) { ?>

        <div class="recipe-card">

            <img src="<?php echo $row['featured_image_path']; ?>">

            <h3><?php echo $row['title']; ?></h3>

            <p><?php echo $row['difficulty']; ?></p>

            <a href="recipes_details.php?id=<?php echo $row['id']; ?>">
                <button>View Recipe</button>
            </a>

        </div>

        <?php 
        } ?>

    </div>

</div>

</body>
</html>