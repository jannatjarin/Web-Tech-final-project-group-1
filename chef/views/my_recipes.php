<?php

include '../controllers/RecipeController.php';

?>
<!DOCTYPE html>
<html>

<head>

    <title>My Recipes</title>

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

        <h1>My Recipes</h1>

        <table>

    <tr>

        <th>Recipe Name</th>
        <th>Cuisine</th>
        <th>Status</th>
        <th>Views</th>
        <th>Action</th>

    </tr>

    <?php

    while($row = $recipes->fetch_assoc())
    {

    ?>

    <tr>

        <td><?php echo $row["title"]; ?></td>

        <td><?php echo $row["cuisine"]; ?></td>

        <td><?php echo $row["status"]; ?></td>

        <td><?php echo $row["views"]; ?></td>

        <td>

            <a href="edit_recipe.php?id=<?php echo $row['id']; ?>">

                <button>Edit</button>

            </a>

           <!-- <a href="../controllers/RecipeController.php?delete_id=<?php echo $row['id']; ?>">

                <button>Delete</button>

            </a> -->

            <button onclick="deleteRecipe(<?php echo $row['id']; ?>)">
                    Delete
            </button>

        </td>

    </tr>

    <?php

    }

    ?>

</table>

    </div>

    <script>

        function deleteRecipe(id)
        {
            var xhttp = new XMLHttpRequest();

            xhttp.open("POST", "../ajax/delete_recipe.php", true);

            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.onreadystatechange = function()
            {
                if(this.readyState == 4 && this.status == 200)
                {
                    if(this.responseText == "success")
                    {
                        alert("Recipe Deleted");

                        location.reload();
                    }
                    else
                    {
                        alert("Delete Failed");
                    }
                }
            };

            xhttp.send("id=" + id);
        }

</script>
</body>

</html>