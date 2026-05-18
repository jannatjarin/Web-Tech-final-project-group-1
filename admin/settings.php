<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$message = "";

/* UPDATE SETTINGS */

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $password = $_POST['password'];

    /* UPDATE WITHOUT PASSWORD */

    if($password == "")
    {
        $query = "
        UPDATE users
        SET name='$name',
        email='$email',
        bio='$bio'
        WHERE id='$user_id'
        ";

        if(mysqli_query($conn, $query))
        {
            $message = "Settings Updated Successfully";
        }
        else
        {
            $message = "Update Failed";
        }
    }

    /* UPDATE WITH PASSWORD */

    else
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "
        UPDATE users
        SET name='$name',
        email='$email',
        bio='$bio',
        password_hash='$hashed_password'
        WHERE id='$user_id'
        ";

        if(mysqli_query($conn, $query))
        {
            $message = "Settings And Password Updated";
        }
        else
        {
            $message = "Update Failed";
        }
    }
}

/* FETCH ADMIN DATA */

$query = "
SELECT name,email,bio
FROM users
WHERE id='$user_id'
";

$result = mysqli_query($conn, $query);

$data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Settings</title>

<style>

body{
    margin:0;
    padding:0;
    font-family:Arial;
    background:#E8E4DE;
}

.container{
    width:500px;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 2px 8px rgba(0,0,0,0.1);
}

h1{
    color:#4E625E;
}

label{
    display:block;
    margin-top:15px;
    margin-bottom:5px;
    color:#444;
}

input,
textarea{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:14px;
}

textarea{
    height:100px;
    resize:none;
}

button{
    margin-top:20px;
    padding:10px 15px;
    border:none;
    background:#7E9C97;
    color:white;
    border-radius:5px;
    cursor:pointer;
    font-weight:bold;
}

button:hover{
    background:#667F7B;
}

.success{
    color:green;
    margin-top:10px;
}

.back{
    text-decoration:none;
    display:inline-block;
    margin-bottom:20px;
    background:#BFCFC1;
    color:#384542;
    padding:8px 12px;
    border-radius:5px;
}

</style>

</head>

<body>

<div class="container">

<a href="dashboard.php" class="back">
Back Dashboard
</a>

<h1>Admin Settings</h1>

<p class="success">
<?php echo $message; ?>
</p>

<form method="POST">

<label>Name</label>

<input type="text"
name="name"
value="<?php echo $data['name']; ?>"
required>

<label>Email</label>

<input type="email"
name="email"
value="<?php echo $data['email']; ?>"
required>

<label>Bio</label>

<textarea name="bio"><?php echo $data['bio']; ?></textarea>

<label>New Password</label>

<input type="password"
name="password"
placeholder="Enter New Password">

<button type="submit" name="update">
Update Settings
</button>

</form>

</div>

</body>
</html>