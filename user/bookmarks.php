<?php

session_start();

include("config.php");
$success = $error ="";


$user_id = $_SESSION['user_id'];

$recipe_id = $_POST['recipe_id']; 

    

?>