<?php
session_start();

$conn = new mysqli("localhost","root","","recipe_platform");

if($conn->connect_error)
{
    die("Connection Failed");
}

$user_id = $_SESSION['user_id'];

$result = $conn->query("
    SELECT recipes.*
    FROM bookmarks
    JOIN recipes ON bookmarks.recipe_id = recipes.id
    WHERE bookmarks.user_id = $user_id
");
?>

<h1>Your Bookmarked Recipes</h1>

<?php while($row = $result->fetch_assoc()) { ?>

<div style="border:1px solid #ccc; padding:10px; margin:10px;">
    <img src="<?php echo $row['featured_image_path']; ?>" width="150">
    <h3><?php echo $row['title']; ?></h3>
    <p><?php echo $row['difficulty']; ?></p>
</div>

<?php } ?>