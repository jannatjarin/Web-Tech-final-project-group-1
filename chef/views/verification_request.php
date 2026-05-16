<?php

include '../controllers/VerificationController.php';

?>
<!DOCTYPE html>
<html>

<head>

    <title>Chef Verification</title>

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

        <h1>Chef Verification Request</h1>

        <div class="form-container">
            <?php

                if($success != "")
                {
                    echo "<p class='success'>$success</p>";
                }

            ?>

            <form method="POST" action="">

                <label>Why do you want chef verification?</label>

                <textarea name="motivation" rows="5"></textarea>

                <label>Credentials Description</label>

                <textarea name="credentials" rows="4"></textarea>

                <label>Portfolio Link</label>

                <input type="text" name="portfolio">

                <input type="submit"
                        name="submit_request"
                        value="Submit Request">

            </form>

        </div>

    </div>

</body>

</html>