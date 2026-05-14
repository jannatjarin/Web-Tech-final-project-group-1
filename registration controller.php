<?php
include "config.php"; // connect DB

$success = $error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['passward'];

   
    $diet = json_encode($_POST['diet']);
    $role = "user";

   if (empty($username)|| empty($name) || empty($password) || empty($email)) 
    {
        $error = "All fields are required!";
    } 
    else 
    {
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    