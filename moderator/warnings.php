<?php
session_start();

include("../config.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

if($_SESSION['role'] != 'moderator')
{
    header("Location: ../login.php");
    exit();
}

$moderator_id = $_SESSION['user_id'];



if(isset($_POST['send_warning']))
{
    $user_id = $_POST['user_id'];
    $warning_text = $_POST['warning_text'];

    $insert = "INSERT INTO warnings
    (user_id, warning_text, created_at)
    VALUES
    ('$user_id','$warning_text',NOW())";

    mysqli_query($conn,$insert);


    $log = "INSERT INTO moderation_logs
    (moderator_id, action, created_at)
    VALUES
    ('$moderator_id',
    'Issued warning to user ID $user_id',
    NOW())";

    mysqli_query($conn,$log);

    header("Location: warnings.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Warnings</title>

<style>

body{
    margin:0;
    padding:0;
    font-family:Arial;
    background:#FFF8F2;
}

.sidebar{
    width:230px;
    height:100vh;
    background:#FFEADD;
    position:fixed;
    left:0;
    top:0;
    padding-top:20px;
}

.sidebar h2{
    text-align:center;
    color:#5A4636;
}

.sidebar a{
    display:block;
    padding:12px 20px;
    text-decoration:none;
    color:#5A4636;
    margin:8px;
    border-radius:15px;
}

.sidebar a:hover{
    background:#FFD6C9;
}

.active{
    background:#FFD6C9;
}

.main{
    margin-left:250px;
    padding:20px;
}

.card{
    background:white;
    padding:20px;
    border-radius:20px;
    box-shadow:0px 2px 8px rgba(0,0,0,0.1);
    margin-bottom:20px;
}

input, textarea{
    width:100%;
    padding:10px;
    margin-top:10px;
    border-radius:10px;
    border:1px solid #ddd;
}

button{
    padding:10px 20px;
    border:none;
    border-radius:20px;
    cursor:pointer;
    margin-top:10px;
    background:#FFD6C9;
}

.warning-card{
    background:#FFF;
    padding:15px;
    border-radius:15px;
    margin-top:15px;
    border:1px solid #eee;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>Moderator</h2>

<a href="dashboard.php">Dashboard</a>
<a href="verification.php">Chef Verification</a>
<a href="recipes.php">Recipes</a>
<a href="reports.php">Reports</a>
<a href="review_report.php">Review Reports</a>
<a href="cuisines.php">Cuisines</a>
<a href="diet_types.php">Diet Types</a>
<a href="profile.php">Profile</a>
<a href="quality_report.php">Quality Report</a>
<a href="warnings.php" class="active">Warnings</a>
<a href="moderation_logs.php">Moderation Logs</a>
<a href="../logout.php">Logout</a>

</div>



<div class="main">

<h1>Issue User Warning</h1>

<div class="card">

<form method="POST">

<label>User ID</label>
<input type="number"
name="user_id"
required>

<label>Warning Message</label>
<textarea name="warning_text" required></textarea>

<button type="submit"
name="send_warning">
Send Warning
</button>

</form>

</div>

</div>

</body>
</html>