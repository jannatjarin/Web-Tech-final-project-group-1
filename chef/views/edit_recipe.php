<?php

include '../controllers/RecipeController.php';

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Recipe</title>

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

        <h1>Edit Recipe</h1>

        <div class="form-container">

            <?php

            if(isset($success))
            {
                echo "<p class='success'>$success</p>";
            }

            ?>

            <form method="POST" action="">

                <input type="hidden" name="id"
                value="<?php echo $recipe['id']; ?>">

                <label>Recipe Title</label>

                <input type="text" name="title"
                value="<?php echo $recipe['title']; ?>">

                <label>Description</label>

                <textarea name="description" rows="4"><?php echo $recipe['description']; ?></textarea>

                <label>Cuisine Type</label>

                <input type="text" name="cuisine"
                value="<?php echo $recipe['cuisine']; ?>">

                <label>Diet Type</label>

                <input type="text" name="diet"
                value="<?php echo $recipe['diet_type']; ?>">

                <label>Difficulty</label>

                <input type="text" name="difficulty"
                value="<?php echo $recipe['difficulty']; ?>">

                <label>Preparation Time</label>

                <input type="number" name="prep_time"
                value="<?php echo $recipe['prep_time']; ?>">

                <label>Cook Time</label>

                <input type="number" name="cook_time"
                value="<?php echo $recipe['cook_time']; ?>">

                <label>Servings</label>

                <input type="number" name="servings"
                value="<?php echo $recipe['servings']; ?>">

                <label>Calories</label>

                <input type="number" name="calories"
                value="<?php echo $recipe['calories']; ?>">

                <label>Status</label>

                <input type="text" name="status"
                value="<?php echo $recipe['status']; ?>">

                <input type="submit"
                name="update_recipe"
                value="Update Recipe">

            </form>

        </div>

    </div>

</body>

</html>