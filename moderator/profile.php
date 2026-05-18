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

$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile']))
{
    $name = $_POST['name'];
    $bio = $_POST['bio'];

    $update = "UPDATE users
    SET name='$name',
    bio='$bio'
    WHERE id='$user_id'";

    mysqli_query($conn,$update);

    header("Location: profile.php");
    exit();
}

if(isset($_POST['change_password']))
{
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    $check_query = mysqli_query($conn,
    "SELECT * FROM users
    WHERE id='$user_id'
    AND password='$current_password'");

    if(mysqli_num_rows($check_query) > 0)
    {
        mysqli_query($conn,
        "UPDATE users
        SET password='$new_password'
        WHERE id='$user_id'");

        $message = "Password changed successfully";
    }
    else
    {
        $message = "Current password is incorrect";
    }
}

$query = "SELECT *
FROM users
WHERE id='$user_id'";

$result = mysqli_query($conn,$query);

$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>

<title>Moderator Profile</title>

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
    margin-left:230px;
    padding:40px;
    display:flex;
    flex-direction:column;
    align-items:center;
}

.card{
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0px 2px 8px rgba(0,0,0,0.1);
    width:700px;
    margin-bottom:25px;
}

input, textarea{
    width:100%;
    padding:10px;
    margin-top:10px;
    margin-bottom:15px;
    border-radius:10px;
    border:1px solid #ccc;
}

button{
    padding:10px 20px;
    border:none;
    border-radius:20px;
    background:#CFE8CF;
    cursor:pointer;
}

.message{
    background:#FFD6C9;
    padding:10px;
    border-radius:10px;
    margin-bottom:15px;
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
<a href="profile.php" class="active">Profile</a>
<a href="quality_report.php">Quality Report</a>
<a href="moderation_logs.php">Moderation Logs</a>
<a href="../logout.php">Logout</a>

</div>

<div class="main">

<h1>Moderator Profile</h1>

<?php
if(isset($message))
{
    echo "<div class='message'>$message</div>";
}
?>

<div class="card">

<h2>Update Profile</h2>

<form method="POST">

<label>Name</label>

<input
type="text"
name="name"
value="<?php echo $user['name']; ?>"
required>

<label>Bio</label>

<textarea
name="bio"
rows="5"><?php echo $user['bio']; ?></textarea>

<button
type="submit"
name="update_profile">
Update Profile
</button>

</form>

</div>

<div class="card">

<h2>Change Password</h2>

<form method="POST">

<label>Current Password</label>

<input
type="password"
name="current_password"
required>

<label>New Password</label>

<input
type="password"
name="new_password"
required>

<button
type="submit"
name="change_password">
Change Password
</button>

</form>

</div>

</div>

</body>
</html>