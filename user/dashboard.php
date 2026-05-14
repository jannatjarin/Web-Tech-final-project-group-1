<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>

<body style="margin:0; font-family:Arial; background:#f4f6f9;">

<!-- Header -->
<div style="background:#2c3e50; color:white; padding:20px; text-align:center;">
    <h2 style="margin:0;">User Dashboard</h2>
    <p style="margin:5px;">Welcome, <?php echo $name; ?></p>
</div>

<!-- Container -->
<div style="display:flex; flex-wrap:wrap; justify-content:center; padding:30px; gap:20px;">

    <a href="browse_recipes.php" style="text-decoration:none;">
        <div style="width:200px; background:white; padding:20px; text-align:center; border-radius:10px; box-shadow:0 0 10px #ccc;">
            <h3>🍲 Browse Recipes</h3>
        </div>
    </a>

    <a href="bookmarks.php" style="text-decoration:none;">
        <div style="width:200px; background:white; padding:20px; text-align:center; border-radius:10px; box-shadow:0 0 10px #ccc;">
            <h3>📌 Bookmarks</h3>
        </div>
    </a>

    <a href="reviews.php" style="text-decoration:none;">
        <div style="width:200px; background:white; padding:20px; text-align:center; border-radius:10px; box-shadow:0 0 10px #ccc;">
            <h3>⭐ Reviews</h3>
        </div>
    </a>

</div>

</body>
</html>