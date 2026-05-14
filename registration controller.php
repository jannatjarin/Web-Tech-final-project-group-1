<?php
include "config.php"; // connect DB

$success = $error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $diet = json_encode($_POST['diet']);
    $role = "user";
    
    