<?php

include '../controllers/ProfileController.php';

?>

<!DOCTYPE html>
<html>

<head>

    <title>Chef Profile</title>

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

        <h1>Chef Profile</h1>

        <div class="form-container">
            <?php

            if($success != "")
            {
                echo "<p class='success'>$success</p>";
            }

            ?>

            <form method="POST" action="">

                <label>Display Name</label>

                <input type="text" name="display_name" value="<?php echo $profile['display_name']; ?>">

                <label>Specialization</label>

                <input type="text" name="specialization" value="<?php echo $profile['specialization']; ?>">
                <label>Bio</label>

                <textarea name="bio" rows="4"><?php echo $profile['bio']; ?></textarea>
                <label>Years of Experience</label>

                <input type="number" name="experience" value="<?php echo $profile['years_experience']; ?>">

                <label>Website</label>

                <input type="text" name="website" value="<?php echo $profile['website']; ?>">

                <label>Instagram</label>

                <input type="text" name="instagram" value="<?php echo $profile['instagram']; ?>">

                <label>YouTube</label>

                <input type="text" name="youtube" value="<?php echo $profile['youtube']; ?>">

                <input type="submit"
                        name="update_profile"
                        value="Update Profile">

            </form>

        </div>

    </div>

</body>

</html>