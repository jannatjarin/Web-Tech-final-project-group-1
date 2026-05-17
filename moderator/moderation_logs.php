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


$result = mysqli_query($conn,
"SELECT * FROM moderation_logs
ORDER BY created_at DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>Moderation Logs</title>

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
    margin-bottom:15px;
    box-shadow:0px 2px 8px rgba(0,0,0,0.1);
}

.card p{
    margin:8px 0;
    color:#5A4636;
}

h1{
    color:#5A4636;
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
<a href="warnings.php">Warnings</a>
<a href="moderation_logs.php" class="active">Moderation Logs</a>
<a href="../logout.php">Logout</a>

</div>

<div class="main">

<h1>Moderation Activity Logs</h1>

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {

        $moderator_id = $row['moderator_id'];

        $user_query = mysqli_query($conn,
        "SELECT * FROM users
        WHERE id='$moderator_id'");

        $user = mysqli_fetch_assoc($user_query);

        if(!$user)
        {
            $user['name'] = "Unknown Moderator";
        }

?>

<div class="card">

<p>
<b>Log ID:</b>
<?php echo $row['id']; ?>
</p>

<p>
<b>Moderator:</b>
<?php echo $user['name']; ?>
</p>

<p>
<b>Action:</b>
<?php echo $row['action']; ?>
</p>

<p>
<b>Date:</b>
<?php echo $row['created_at']; ?>
</p>

</div>

<?php
    }
}
else
{
    echo "<div class='card'>No moderation logs found.</div>";
}
?>

</div>

</body>
</html>