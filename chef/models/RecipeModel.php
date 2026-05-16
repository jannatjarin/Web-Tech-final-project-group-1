<?php

include 'db.php';

function addRecipe($title, $description, $cuisine, $diet, $difficulty, $prep_time, $cook_time, $servings, $calories, $status, $ingredient1, $ingredient2, $ingredient3, $step1, $step2)
{
    global $conn;

    $views = 0;

    $sql = "INSERT INTO recipes(title, description, cuisine, diet_type, difficulty, prep_time, cook_time, servings, calories, status, views)

            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssssiiiisi",

        $title,
        $description,
        $cuisine,
        $diet,
        $difficulty,
        $prep_time,
        $cook_time,
        $servings,
        $calories,
        $status,
        $views
    );

    if($stmt->execute())
    {
        $recipe_id = $conn->insert_id;

        $sql2 = "INSERT INTO ingredients(recipe_id, ingredient_name)
                 VALUES(?, ?)";

        $stmt2 = $conn->prepare($sql2);

        if(!empty($ingredient1))
        {
            $stmt2->bind_param("is", $recipe_id, $ingredient1);
            $stmt2->execute();
        }

        if(!empty($ingredient2))
        {
            $stmt2->bind_param("is", $recipe_id, $ingredient2);
            $stmt2->execute();
        }

        if(!empty($ingredient3))
        {
            $stmt2->bind_param("is", $recipe_id, $ingredient3);
            $stmt2->execute();
        }

        $sql3 = "INSERT INTO steps(recipe_id, step_description)
                 VALUES(?, ?)";

        $stmt3 = $conn->prepare($sql3);

        if(!empty($step1))
        {
            $stmt3->bind_param("is", $recipe_id, $step1);
            $stmt3->execute();
        }

        if(!empty($step2))
        {
            $stmt3->bind_param("is", $recipe_id, $step2);
            $stmt3->execute();
        }

        return true;
    }

    return false;
}

function getRecipes()
{
    global $conn;

    $sql = "SELECT * FROM recipes";

    $result = $conn->query($sql);

    return $result;
}

function getRecipeById($id)
{
    global $conn;

    $sql = "SELECT * FROM recipes WHERE id=?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);

    $stmt->execute();

    $result = $stmt->get_result();

    return $result->fetch_assoc();
}

function updateRecipe($id, $title, $description, $cuisine, $diet, $difficulty, $prep_time, $cook_time, $servings, $calories, $status)
{
    global $conn;

    $sql = "UPDATE recipes

            SET title=?,
                description=?,
                cuisine=?,
                diet_type=?,
                difficulty=?,
                prep_time=?,
                cook_time=?,
                servings=?,
                calories=?,
                status=?

            WHERE id=?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssssiiiisi",

        $title,
        $description,
        $cuisine,
        $diet,
        $difficulty,
        $prep_time,
        $cook_time,
        $servings,
        $calories,
        $status,
        $id
    );

    return $stmt->execute();
}

function deleteRecipe($id)
{
    global $conn;

    $sql = "DELETE FROM recipes WHERE id=?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);

    return $stmt->execute();
}

function getTotalRecipes()
{
    global $conn;

    $sql = "SELECT COUNT(*) AS total FROM recipes";

    $result = $conn->query($sql);

    return $result->fetch_assoc();
}


function getPublishedRecipes()
{
    global $conn;

    $sql = "SELECT COUNT(*) AS published
            FROM recipes
            WHERE status='published'";

    $result = $conn->query($sql);

    return $result->fetch_assoc();
}


function getDraftRecipes()
{
    global $conn;

    $sql = "SELECT COUNT(*) AS draft
            FROM recipes
            WHERE status='draft'";

    $result = $conn->query($sql);

    return $result->fetch_assoc();
}


function getTotalReviews()
{
    global $conn;

    $sql = "SELECT COUNT(*) AS reviews
            FROM reviews";

    $result = $conn->query($sql);

    return $result->fetch_assoc();
}

function getTotalViews()
{
    global $conn;

    $sql = "SELECT SUM(views) AS total_views FROM recipes";

    $result = $conn->query($sql);

    return $result->fetch_assoc();
}


function getAverageRating()
{
    global $conn;

    $sql = "SELECT AVG(rating) AS average_rating FROM reviews";

    $result = $conn->query($sql);

    return $result->fetch_assoc();
}


function getTopRecipe()
{
    global $conn;

    $sql = "SELECT title
            FROM recipes
            ORDER BY views DESC
            LIMIT 1";

    $result = $conn->query($sql);

    return $result->fetch_assoc();
}

?>