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



if(isset($_POST['approve']))
{
    $request_id = $_POST['request_id'];
    $user_id = $_POST['user_id'];

    $update = "UPDATE chef_verification_requests
    SET status='approved',
    reviewed_by='$moderator_id'
    WHERE id='$request_id'";

    mysqli_query($conn,$update);


    $chef_update = "UPDATE users
    SET role='chef',
    chef_verified='1'
    WHERE id='$user_id'";

    mysqli_query($conn,$chef_update);


    $log = "INSERT INTO moderation_logs
    (moderator_id, action, created_at)
    VALUES
    ('$moderator_id',
    'Approved chef verification request',
    NOW())";

    mysqli_query($conn,$log);

    header("Location: verification.php");
    exit();
}



if(isset($_POST['reject']))
{
    $request_id = $_POST['request_id'];

    $update = "UPDATE chef_verification_requests
    SET status='rejected',
    reviewed_by='$moderator_id'
    WHERE id='$request_id'";

    mysqli_query($conn,$update);


    $log = "INSERT INTO moderation_logs
    (moderator_id, action, created_at)
    VALUES
    ('$moderator_id',
    'Rejected chef verification request',
    NOW())";

    mysqli_query($conn,$log);

    header("Location: verification.php");
    exit();
}



$query = "SELECT *
FROM chef_verification_requests
WHERE status='pending'
ORDER BY submitted_at DESC";

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Chef Verification</title>

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
    margin-bottom:20px;
    box-shadow:0px 2px 8px rgba(0,0,0,0.1);
}

.card p{
    margin:10px 0;
    color:#5A4636;
}

button{
    border:none;
    padding:10px 20px;
    border-radius:20px;
    cursor:pointer;
    margin-top:10px;
    margin-right:10px;
}

.approve{
    background:#CFE8CF;
}

.reject{
    background:#FFD6C9;
}

a{
    color:#5A4636;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>Moderator</h2>

<a href="dashboard.php">Dashboard</a>
<a href="verification.php" class="active">Chef Verification</a>
<a href="recipes.php">Recipes</a>
<a href="reports.php">Reports</a>
<a href="review_report.php">Review Reports</a>
<a href="cuisines.php">Cuisines</a>
<a href="diet_types.php">Diet Types</a>
<a href="profile.php">Profile</a>
<a href="quality_report.php">Quality Report</a>
<a href="warnings.php">Warnings</a>
<a href="moderation_logs.php">Moderation Logs</a>
<a href="../logout.php">Logout</a>

</div>


<div class="main">

<h1>Chef Verification Requests</h1>

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
?>

<div class="card">

<p>
<b>Request ID:</b>
<?php echo $row['id']; ?>
</p>

<p>
<b>User ID:</b>
<?php echo $row['user_id']; ?>
</p>

<p>
<b>Motivation:</b><br>
<?php echo $row['motivation']; ?>
</p>

<p>
<b>Credentials:</b><br>
<?php echo $row['credentials_description']; ?>
</p>

<p>
<b>Portfolio Link:</b><br>

<a href="<?php echo $row['portfolio_link']; ?>" target="_blank">
<?php echo $row['portfolio_link']; ?>
</a>

</p>

<p>
<b>Submitted At:</b>
<?php echo $row['submitted_at']; ?>
</p>


<form method="POST">

<input type="hidden"
name="request_id"
value="<?php echo $row['id']; ?>">

<input type="hidden"
name="user_id"
value="<?php echo $row['user_id']; ?>">

<button type="submit"
name="approve"
class="approve">
Approve
</button>

<button type="submit"
name="reject"
class="reject">
Reject
</button>

</form>

</div>

<?php
    }
}
else
{
    echo "<div class='card'>No pending verification requests found.</div>";
}
?>

</div>

</body>
</html>