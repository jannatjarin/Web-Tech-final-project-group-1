<?php

session_start();

include("config.php");
$success = $error ="";


$user_id = $_SESSION['user_id'];

$recipe_id = $_POST['recipe_id']; 

 $sql = "INSERT INTO bookmarks(user_id, recipe_id) VALUES ('$user_id', '$recipe_id')";

if ($conn->query($sql) === TRUE) {
    $success = "Recipe Saved";
} else {
    $error = "Error: " . $conn->error;
}
   

?>