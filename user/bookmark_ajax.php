<?php
session_start();

$conn = new mysqli("localhost","root","","recipe_platform");

if($conn->connect_error){
    die("DB Error");
}

if(!isset($_SESSION['user_id'])){
    echo "Login Required";
    exit();
}

if(isset($_POST['recipe_id'])){
    $user_id = $_SESSION['user_id'];
    $recipe_id = $_POST['recipe_id'];

    $conn->query("INSERT INTO bookmarks(user_id, recipe_id)
                  VALUES($user_id, $recipe_id)");

    echo "Bookmarked Successfully!";
}
?>