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



if(isset($_POST['deactivate']))
{
    $user_id = $_POST['user_id'];

    $update = "UPDATE users
    SET is_active=0
    WHERE id='$user_id'";

    mysqli_query($conn,$update);

    header("Location: users.php");
    exit();
}



if(isset($_POST['activate']))
{
    $user_id = $_POST['user_id'];

    $update = "UPDATE users
    SET is_active=1
    WHERE id='$user_id'";

    mysqli_query($conn,$update);

    header("Location: users.php");
    exit();
}



if(isset($_POST['make_moderator']))
{
    $user_id = $_POST['user_id'];

    $update = "UPDATE users
    SET role='moderator'
    WHERE id='$user_id'";

    mysqli_query($conn,$update);

    header("Location: users.php");
    exit();
}



if(isset($_POST['remove_moderator']))
{
    $user_id = $_POST['user_id'];

    $update = "UPDATE users
    SET role='user'
    WHERE id='$user_id'";

    mysqli_query($conn,$update);

    header("Location: users.php");
    exit();
}



$search = "";

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $query = "SELECT * FROM users
    WHERE name LIKE '%$search%'
    OR username LIKE '%$search%'
    OR email LIKE '%$search%'
    ORDER BY created_at DESC";
}
else
{
    $query = "SELECT * FROM users
    ORDER BY created_at DESC";
}

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Users</title>

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

button{
    border:none;
    padding:8px 15px;
    border-radius:15px;
    cursor:pointer;
    margin:5px;
}

.deactivate{
    background:#FFD6C9;
}

.activate{
    background:#CFE8CF;
}

.moderator{
    background:#D6E4FF;
}

.remove{
    background:#FFE0E0;
}

input[type=text]{
    padding:10px;
    width:250px;
    border-radius:15px;
    border:1px solid #ccc;
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
<a href="users.php" class="active">Users</a>
<a href="cuisines.php">Cuisines</a>
<a href="diet_types.php">Diet Types</a>
<a href="profile.php">Profile</a>
<a href="quality_report.php">Quality Report</a>
<a href="moderation_logs.php">Moderation Logs</a>
<a href="../logout.php">Logout</a>

</div>



<div class="main">

<h1>Users Management</h1>



<form method="GET">

<input type="text"
name="search"
placeholder="Search users..."
value="<?php echo $search; ?>">

<button type="submit">
Search
</button>

</form>



<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
?>

<div class="card">

<p><b>ID:</b> <?php echo $row['id']; ?></p>
<p><b>Name:</b> <?php echo $row['name']; ?></p>
<p><b>Username:</b> <?php echo $row['username']; ?></p>
<p><b>Email:</b> <?php echo $row['email']; ?></p>
<p><b>Role:</b> <?php echo $row['role']; ?></p>
<p><b>Status:</b> <?php echo ($row['is_active'] == 1 ? "Active" : "Inactive"); ?></p>
<p><b>Created:</b> <?php echo $row['created_at']; ?></p>



<form method="POST">

<input type="hidden"
name="user_id"
value="<?php echo $row['id']; ?>">

<?php if($row['is_active'] == 1) { ?>

<button type="submit"
name="deactivate"
class="deactivate">
Deactivate
</button>

<?php } else { ?>

<button type="submit"
name="activate"
class="activate">
Activate
</button>

<?php } ?>



<?php if($row['role'] != 'moderator') { ?>

<button type="submit"
name="make_moderator"
class="moderator">
Make Moderator
</button>

<?php } else { ?>

<button type="submit"
name="remove_moderator"
class="remove">
Remove Moderator
</button>

<?php } ?>

</form>

</div>

<?php
    }
}
else
{
    echo "<div class='card'>No users found.</div>";
}
?>

</div>

</body>
</html>