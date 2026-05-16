<?php
$host = "localhost";
$user = "root";
$pass ="";
$dbname ="recipe_platform";

$conn = new mysqli("localhost","root","","recipe_platform");

if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

?>