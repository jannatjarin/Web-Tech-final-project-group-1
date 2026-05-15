<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "recipe_platform");
 
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
$user_id = $_SESSION['user_id'];

if (isset($_POST['update'])) {
 
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $diet = $_POST['dietary'];
    $passward_hash = $_POST['passward_hash'];
 
    if (!empty($passward_hash)) {
 
        $sql = "UPDATE users SET
            name='$name',
            username='$username',
            email='$email',
            bio='$bio',
            dietary_prefs='$diet',
            passward_hash='$passward_hash'
            WHERE id='$user_id'";
 
    } else {
 
        $sql = "UPDATE users SET
            name='$name',
            username='$username',
            email='$email',
            bio='$bio',
            dietary_prefs='$diet'
            WHERE id='$user_id'";
    }
 
    if (!$conn->query($sql)) {
        die("Update Failed: " . $conn->error);
    }
}

$result = $conn->query("SELECT * FROM users WHERE id='$user_id'");
 
if (!$result) {
    die("Query Failed: " . $conn->error);
}
 
$user = $result->fetch_assoc();
 
if (!$user) {
    die("User not found");
}
?>
 


<!DOCTYPE html>
<html>

<head>

<title>Profile</title>

<style>

body
{
    margin:0;
    padding:0;
    font-family:Arial, sans-serif;
    background-color:#f4f4f4;
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
    margin-bottom:30px;
}

.sidebar a
{
    display:block;
    color:white;
    padding:15px 20px;
    text-decoration:none;
}

.sidebar a:hover
{
    background-color:#146c2f;
}

.main
{
    margin-left:220px;
    padding:30px;
}

.header
{
    background-color:white;
    padding:20px;
    border-radius:10px;
    margin-bottom:20px;
}

.profile-container
{
    background-color:white;
    border-radius:10px;
    padding:30px;
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

.left-section h2
{
    margin-top:15px;
    margin-bottom:5px;
}

.left-section p
{
    color:gray;
}

.stats
{
    margin-top:20px;
    background-color:#f5f5f5;
    padding:15px;
    border-radius:10px;
}

.stats p
{
    margin:10px 0;
    font-weight:bold;
}

.right-section h3
{
    margin-bottom:20px;
}

label
{
    font-weight:bold;
}

input, textarea, select
{
    width:100%;
    padding:12px;
    margin-top:8px;
    margin-bottom:20px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:15px;
}

textarea
{
    height:100px;
    resize:none;
}

button
{
    padding:12px 25px;
    background-color:#0b4d1c;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:15px;
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
<a href="browse_recipes.php">Browse Recipes</a>
<a href="recipe_details.php">Recipe Details</a>
<a href="bookmarks.php">Bookmarks</a>
<a href="reviews.php">Reviews</a>
<a href="shopping_lists.php">Shopping Lists</a>
<a href="meal_plan.php">Meal Plan</a>
<a href="chefs.php">Chefs</a>
<a href="profile.php">Profile</a>

</div>

<div class="main">

<div class="header">
<h1>User Profile</h1>
</div>

<div class="profile-container">

<div class="left-section">

<img src="<?php echo $user['profile_pic'] ?: 'images/profile.jpeg'; ?>" alt="Profile">
 
<h2><?php echo $user['name']; ?></h2>
 


<p>Home Cook</p>

<div class="stats">

<p>Bookmarks: 12</p>
<p>Reviews: 8</p>
<p>Meal Plans: 4</p>

</div>

</div>

<div class="right-section">

<h3>Profile Information</h3>

<form method="POST">



<label>Dietary Preference</label>
<select name="dietary">
<option><?php echo $user['dietary_prefs']; ?></option>
<option>Vegetarian</option>
<option>Vegan</option>
<option>Keto</option>
<option>Halal</option>
</select>

<label>Change Password</label>
<input type="password" name="passward_hash" placeholder="Enter New Password">

<button type="submit" name="update">Update Profile</button>

</form>

</div>

</div>

</div>

</body>

</html>