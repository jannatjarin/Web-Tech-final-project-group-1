<?php
session_start();

$conn = new mysqli("localhost","root","","recipe_platform");

if($conn->connect_error)
{
    die("Connection Failed");
}

$user_id = $_SESSION['user_id'];


if(isset($_POST['update_review']))
{
    $review_id = $_POST['review_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];

    $conn->query("
    UPDATE reviews
    SET rating='$rating',
    review_text='$review_text'
    WHERE id='$review_id'
    ");
}


if(isset($_GET['delete']))
{
    $delete_id = $_GET['delete'];

    $conn->query("
    DELETE FROM reviews
    WHERE id='$delete_id'
    ");
}


$reviews = $conn->query("
SELECT reviews.*, recipes.title, recipes.featured_image_path
FROM reviews
JOIN recipes
ON reviews.recipe_id = recipes.id
WHERE reviews.user_id='$user_id'
");
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
    width:90%;
    height:100px;
    padding:10px;
    margin-top:10px;
}

input
{
    padding:10px;
    width:100px;
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
<a href="recipes.php">Browse Recipes</a>
<a href="savedbookmark.php">Bookmarked Recipes</a>
<a href="reviews.php">Reviews</a>
<a href="shoppinglist.php">Shopping Lists</a>
<a href="mealplan.php">Meal Plan</a>
<a href="chefs.php">Chefs</a>
<a href="profile.php">Profile</a>

</div>

<div class="main">

<h2>My Reviews</h2>

<?php
if($reviews->num_rows > 0)
{
    while($row = $reviews->fetch_assoc())
    {
?>

<div class="review-box">

<img src="<?php echo $row['featured_image_path']; ?>" alt="Food Image">

<h3><?php echo $row['title']; ?></h3>

<form method="POST">

<input type="hidden" name="review_id" value="<?php echo $row['id']; ?>">

<p>
Rating:
<input type="number" name="rating"
value="<?php echo $row['rating']; ?>"
min="1" max="5">
</p>

<textarea name="review_text"><?php echo $row['review_text']; ?></textarea>

<br><br>

<button type="submit" name="update_review" class="edit-btn">
Edit Review
</button>

<a href="reviews.php?delete=<?php echo $row['id']; ?>">

<button type="button" class="delete-btn">
Delete Review
</button>

</a>

</form>

</div>

<?php
    }
}
else
{
    echo "<h3>No Reviews Found</h3>";
}
?>

</div>

</body>

</html>