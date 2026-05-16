<!DOCTYPE html>
<html>

<head>

    <title>Add Collection</title>

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

        <h1>Create Collection</h1>

        <div class="form-container">

            <form method="POST" action="">

                <label>Collection Name</label>

                <input type="text" name="collection_name">

                <label>Description</label>

                <textarea name="description" rows="4"></textarea>

                <label>Collection Status</label>

                <select name="status">

                    <option value="">Select Status</option>

                    <option value="Public">Public</option>

                    <option value="Private">Private</option>

                </select>

                <label>Select Recipes</label>

                <input type="checkbox" name="recipe1"> Chicken Pasta <br><br>

                <input type="checkbox" name="recipe2"> Beef Burger <br><br>

                <input type="checkbox" name="recipe3"> BBQ Chicken <br><br>

                <input type="submit" value="Create Collection">

            </form>

        </div>

    </div>

</body>

</html>