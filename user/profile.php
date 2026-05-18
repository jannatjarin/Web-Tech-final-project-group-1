<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost","root","","recipe_platform");

if($conn->connect_error)
{
    die("Connection Failed : ".$conn->connect_error);
}




if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];


if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $dietary = $_POST['dietary'];
    $password = $_POST['password_hash'];

    if(!empty($password))
    {
        $sql = "UPDATE users SET
                name='$name',
                username='$username',
                email='$email',
                bio='$bio',
                dietary_prefs='$dietary',
                password_hash='$password'
                WHERE id='$user_id'";
    }
    else
    {
        $sql = "UPDATE users SET
                name='$name',
                username='$username',
                email='$email',
                bio='$bio',
                dietary_prefs='$dietary'
                WHERE id='$user_id'";
    }

    $conn->query($sql);
}


$result = $conn->query("SELECT * FROM users WHERE id='$user_id'");

if(!$result || $result->num_rows == 0)
{
    die("User not found");
}

$user = $result->fetch_assoc();


$bookmark = $conn->query("SELECT COUNT(*) as total FROM bookmarks WHERE user_id='$user_id'");
$bookmarkData = $bookmark->fetch_assoc();

$review = $conn->query("SELECT COUNT(*) as total FROM reviews WHERE user_id='$user_id'");
$reviewData = $review->fetch_assoc();

$meal = $conn->query("SELECT COUNT(*) as total FROM meal_plans WHERE user_id='$user_id'");
$mealData = $meal->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
<title>Profile</title>

<style>
body
{
    margin:0;
    font-family:Arial;
    background:#f4f4f4;
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

.sidebar a
{
    display:block;
    color:white;
    padding:15px;
    text-decoration:none;
}

.sidebar a:hover
{
    background:#146c2f;
}

.main
{
    margin-left:220px;
    padding:30px;
}

.header
{
    background:white;
    padding:20px;
    border-radius:10px;
    margin-bottom:20px;
}

.profile-container
{
    background:white;
    padding:30px;
    border-radius:10px;
    display:flex;
    gap:40px;
}

.left-section
{
    width:250px;
    text-align:center;
}

.left-section img
{
    width:180px;
    height:180px;
    border-radius:50%;
    object-fit:cover;
    border:5px solid #0b4d1c;
}

.stats
{
    margin-top:20px;
    background:#f5f5f5;
    padding:15px;
    border-radius:10px;
}

.right-section
{
    width:600px;
}

input, textarea, select
{
    width:100%;
    padding:12px;
    margin-bottom:15px;
}

button
{
    padding:12px 20px;
    background:#0b4d1c;
    color:white;
    border:none;
    cursor:pointer;
}
</style>

</head>

<body>

<div class="sidebar">
<h2>User Panel</h2>
<a href="dashboard.php">Dashboard</a>
<a href="recipes.php">Browse Recipes</a>
<a href="savedbookmark.php">Bookmarks</a>
<a href="reviews.php">Reviews</a>
<a href="shoppinglist.php">Shopping Lists</a>
<a href="mealplan.php">Meal Plan</a>
<a href="chefs.php">Chefs</a>
<a href="profile.php">Profile</a>
</div>

<div class="main">

<div class="header">
<h1>User Profile</h1>
</div>

<div class="profile-container">

<div class="left-section">

<img src="<?php echo $user['profile_pic']; ?>">

<h2><?php echo $user['name']; ?></h2>

<p><?php echo $user['role']; ?></p>

<div class="stats">
<p>Bookmarks: <?php echo $bookmarkData['total']; ?></p>
<p>Reviews: <?php echo $reviewData['total']; ?></p>
<p>Meal Plans: <?php echo $mealData['total']; ?></p>
</div>

</div>

<div class="right-section">

<h3>Edit Profile</h3>

<form method="POST">

<input type="text" name="name" value="<?php echo $user['name']; ?>">

<input type="text" name="username" value="<?php echo $user['username']; ?>">

<input type="email" name="email" value="<?php echo $user['email']; ?>">

<textarea name="bio"><?php echo $user['bio']; ?></textarea>

<select name="dietary">
<option value="Vegetarian" <?php if($user['dietary_prefs']=="Vegetarian") echo "selected"; ?>>Vegetarian</option>
<option value="Vegan" <?php if($user['dietary_prefs']=="Vegan") echo "selected"; ?>>Vegan</option>
<option value="Keto" <?php if($user['dietary_prefs']=="Keto") echo "selected"; ?>>Keto</option>
<option value="Halal" <?php if($user['dietary_prefs']=="Halal") echo "selected"; ?>>Halal</option>
</select>

<input type="password" name="password_hash" placeholder="New Password">

<button type="submit" name="update">Update Profile</button>

</form>

</div>

</div>

</div>

</body>
</html>