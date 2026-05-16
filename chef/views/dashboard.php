<?php

include '../controllers/RecipeController.php';

?>
<!DOCTYPE html>
<html>

<head>

    <title>Chef Dashboard</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

    <div class="sidebar">

        <h2>Chef Panel</h2>

        <ul>

            <li><a href="dashboard.php">Dashboard</a></li>

            <li><a href="add_recipe.php">Add Recipe</a></li>

            <li><a href="my_recipes.php">My Recipes</a></li>

            <li><a href="collections.php">Collections</a></li>

            <li><a href="reviews.php">Reviews</a></li>

            <li><a href="analytics.php">Analytics</a></li>

            <li><a href="profile.php">Profile</a></li>

            <li><a href="verification_request.php">Verification</a></li>

        </ul>

    </div>

    <div class="main-content">

        <h1>Chef Dashboard</h1>

        <div class="card-container">

            <div class="card">

                <h3>Total Recipes</h3>

                <p><?php echo $totalRecipes['total']; ?></p>

            </div>

            <div class="card">

                <h3>Published Recipes</h3>

                <p><?php echo $publishedRecipes['published']; ?></p>

            </div>

            <div class="card">

                <h3>Draft Recipes</h3>

                <p><?php echo $draftRecipes['draft']; ?></p>

            </div>

            <div class="card">

                <h3>Total Reviews</h3>

                <p><?php echo $totalReviews['reviews']; ?></p>

            </div>

        </div>

    </div>

</body>

</html>