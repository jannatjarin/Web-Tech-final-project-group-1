<?php

$host="localhost";
$user="root";
$password="";
$database="recipe_platform";

$conn=new mysqli($host,$user,$password,$database);

if($conn->connect_error)
{
    die("Connection Failed");
}

?>