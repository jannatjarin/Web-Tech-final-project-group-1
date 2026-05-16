<?php

include '../models/RecipeModel.php';

$titleErr = "";
$descriptionErr = "";
$cuisineErr = "";
$dietErr = "";
$difficultyErr = "";
$prepTimeErr = "";
$cookTimeErr = "";
$servingsErr = "";
$caloriesErr = "";
$statusErr = "";
$success = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $cuisine = $_POST["cuisine"];
    $diet = $_POST["diet"];
    $difficulty = $_POST["difficulty"];
    $prep_time = $_POST["prep_time"];
    $cook_time = $_POST["cook_time"];
    $servings = $_POST["servings"];
    $calories = $_POST["calories"];
    $status = $_POST["status"];

    $ingredient1 = "";

if(isset($_POST["ingredient1"]))
{
    $ingredient1 = $_POST["ingredient1"];
}

$ingredient2 = "";

if(isset($_POST["ingredient2"]))
{
    $ingredient2 = $_POST["ingredient2"];
}

$ingredient3 = "";

if(isset($_POST["ingredient3"]))
{
    $ingredient3 = $_POST["ingredient3"];
}

$step1 = "";

if(isset($_POST["step1"]))
{
    $step1 = $_POST["step1"];
}

$step2 = "";

if(isset($_POST["step2"]))
{
    $step2 = $_POST["step2"];
}

    if(empty($title))
    {
        $titleErr = "Recipe title required";
    }

    if(empty($description))
    {
        $descriptionErr = "Description required";
    }
    if(empty($cuisine))
{
    $cuisineErr = "Cuisine required";
}

if(empty($diet))
{
    $dietErr = "Diet type required";
}

if(empty($difficulty))
{
    $difficultyErr = "Difficulty required";
}

if(empty($prep_time))
{
    $prepTimeErr = "Preparation time required";
}

if(empty($cook_time))
{
    $cookTimeErr = "Cook time required";
}

if(empty($servings))
{
    $servingsErr = "Servings required";
}

if(empty($calories))
{
    $caloriesErr = "Calories required";
}

if(empty($status))
{
    $statusErr = "Status required";
}

    if(

empty($titleErr) &&
empty($descriptionErr) &&
empty($cuisineErr) &&
empty($dietErr) &&
empty($difficultyErr) &&
empty($prepTimeErr) &&
empty($cookTimeErr) &&
empty($servingsErr) &&
empty($caloriesErr) &&
empty($statusErr)

)
    {
        $result = addRecipe(

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
    $ingredient1,
    $ingredient2,
    $ingredient3,
    $step1,
    $step2

);

        if($result)
        {
            $success = "Recipe Added Successfully";
        }
    }
}

$recipes = getRecipes();

if(isset($_GET["id"]))
{
    $id = $_GET["id"];

    $recipe = getRecipeById($id);
}

if(isset($_POST["update_recipe"]))
{
    $id = $_POST["id"];

    $title = $_POST["title"];
    $description = $_POST["description"];
    $cuisine = $_POST["cuisine"];
    $diet = $_POST["diet"];
    $difficulty = $_POST["difficulty"];
    $prep_time = $_POST["prep_time"];
    $cook_time = $_POST["cook_time"];
    $servings = $_POST["servings"];
    $calories = $_POST["calories"];
    $status = $_POST["status"];

    $result = updateRecipe(

        $id,
        $title,
        $description,
        $cuisine,
        $diet,
        $difficulty,
        $prep_time,
        $cook_time,
        $servings,
        $calories,
        $status

    );

    if($result)
    {
        $success = "Recipe Updated Successfully";
    }
}

if(isset($_GET["delete_id"]))
{
    $delete_id = $_GET["delete_id"];

    $result = deleteRecipe($delete_id);

    if($result)
    {
        header("Location: ../views/my_recipes.php");
    }
}

$totalRecipes = getTotalRecipes();

$publishedRecipes = getPublishedRecipes();

$draftRecipes = getDraftRecipes();

$totalReviews = getTotalReviews();


$totalViews = getTotalViews();

$averageRating = getAverageRating();

$topRecipe = getTopRecipe();

?>