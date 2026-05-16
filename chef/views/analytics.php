<?php

include '../controllers/RecipeController.php';

?>
<!DOCTYPE html>
<html>

<head>

    <title>Analytics</title>

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

        <h1>Recipe Analytics</h1>

        <div class="card-container">

            <div class="card">

                <h3>Total Views</h3>

                <p><?php echo $totalViews['total_views']; ?></p>

            </div>

            <div class="card">

                <h3>Total Bookmarks</h3>

                <p>230</p>

            </div>

            <div class="card">

                <h3>Average Rating</h3>

                <p><?php echo round($averageRating['average_rating'],1); ?></p>

            </div>

            <div class="card">

                <h3>Top Recipe</h3>

                <p><?php echo $topRecipe['title']; ?></p>

            </div>

        </div>

        <table>

            <tr>

                <th>Recipe Name</th>
                <th>Views</th>
                <th>Bookmarks</th>
                <th>Rating</th>

            </tr>

            <tr>

                <td>Chicken Pasta</td>
                <td>500</td>
                <td>80</td>
                <td>4.8</td>

            </tr>

            <tr>

                <td>Beef Burger</td>
                <td>320</td>
                <td>45</td>
                <td>4.2</td>

            </tr>

            <tr>

                <td>BBQ Chicken</td>
                <td>680</td>
                <td>105</td>
                <td>4.6</td>

            </tr>

        </table>

    </div>

</body>

</html>