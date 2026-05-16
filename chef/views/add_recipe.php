<?php

include '../controllers/RecipeController.php';

?>
<!DOCTYPE html>
<html>

<head>

    <title>Add Recipe</title>

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

        <h1>Add Recipe</h1>

        <div class="form-container">
 <?php

if($success != "")
{
    echo "<p class='success'>$success</p>";
}

?>

<p class="error"><?php echo $titleErr; ?></p>

<p class="error"><?php echo $descriptionErr; ?></p>

            <form method="POST" action="">

                <label>Recipe Title</label>

                <input type="text" name="title">

                <label>Description</label>

                <textarea name="description" rows="4"></textarea>

                <label>Cuisine Type</label>

                <select name="cuisine">

                    <option value="">Select Cuisine</option>

                    <option value="Italian">Italian</option>

                    <option value="Chinese">Chinese</option>

                    <option value="Bangladeshi">Bangladeshi</option>

                </select>
                <p class="error"><?php echo $cuisineErr; ?></p>

                <label>Diet Type</label>

                <select name="diet">

                    <option value="">Select Diet Type</option>

                    <option value="Vegetarian">Vegetarian</option>

                    <option value="Vegan">Vegan</option>

                    <option value="Keto">Keto</option>

                </select>
                <p class="error"><?php echo $dietErr; ?></p>

                <label>Difficulty</label>

                <select name="difficulty">

                    <option value="">Select Difficulty</option>

                    <option value="Easy">Easy</option>

                    <option value="Medium">Medium</option>

                    <option value="Hard">Hard</option>

                </select>
                <p class="error"><?php echo $difficultyErr; ?></p>

                <label>Preparation Time (Minutes)</label>

                <input type="number" name="prep_time">
                <p class="error"><?php echo $prepTimeErr; ?></p>

                <label>Cook Time (Minutes)</label>

                <input type="number" name="cook_time">
                <p class="error"><?php echo $cookTimeErr; ?></p>

                <label>Servings</label>

                <input type="number" name="servings">
                <p class="error"><?php echo $servingsErr; ?></p>

                <label>Ingredient 1</label>

                <input type="text" name="ingredient1">

                <label>Ingredient 2</label>

                <input type="text" name="ingredient2">

                <label>Ingredient 3</label>

                <input type="text" name="ingredient3">

                <label>Step 1</label>

                <textarea name="step1" rows="3"></textarea>

                <label>Step 2</label>

                <textarea name="step2" rows="3"></textarea>

                <label>Calories</label>

                <input type="number" name="calories">
                <p class="error"><?php echo $caloriesErr; ?></p>

                <label>Status</label>

                <select name="status">

                    <option value="">Select Status</option>

                    <option value="draft">Draft</option>

                    <option value="published">Published</option>

                </select>
                <p class="error"><?php echo $statusErr; ?></p>

                <input type="submit" value="Add Recipe">

            </form>

        </div>

    </div>

</body>

</html>