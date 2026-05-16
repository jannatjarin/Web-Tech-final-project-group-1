<?php
session_start();

$conn = mysqli_connect("localhost","root","","recipe_platform");

if(!$conn)
{
    die("Connection Failed");
}

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users 
            WHERE username='$username' 
            AND password_hash='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];

        header("Location: profile.php");
        exit();
    }
    else
    {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<style>

body
{
    margin:0;
    padding:0;
    font-family:Arial,sans-serif;
    background-color:#f5f5f5;
}

.login-box
{
    width:350px;
    background-color:white;
    margin:100px auto;
    padding:30px;
    border-radius:10px;
}

h2
{
    text-align:center;
    margin-bottom:20px;
}

input
{
    width:100%;
    padding:12px;
    margin-bottom:20px;
    border:1px solid #ccc;
    border-radius:5px;
}

button
{
    width:100%;
    padding:12px;
    background-color:#0b4d1c;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover
{
    background-color:#146c2f;
}

.error
{
    color:red;
    text-align:center;
    margin-bottom:15px;
}

</style>

</head>

<body>

<div class="login-box">

<h2>User Login</h2>

<?php
if(isset($error))
{
    echo "<p class='error'>$error</p>";
}
?>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>

</form>

</div>

</body>

</html>