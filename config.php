<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "recipe_platform"
);

if($conn->connect_error)
{
    die("Connection Failed");
}

?>