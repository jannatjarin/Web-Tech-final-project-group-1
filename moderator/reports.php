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


if(isset($_POST['dismiss']))
{
    $report_id = $_POST['report_id'];

    mysqli_query($conn,
    "UPDATE content_reports
    SET status='resolved'
    WHERE id='$report_id'");

    mysqli_query($conn,
    "INSERT INTO moderation_logs
    (moderator_id,action,created_at)
    VALUES
    ('$moderator_id',
    'Dismissed content report',
    NOW())");

    header("Location: reports.php");
    exit();
}


if(isset($_POST['remove_recipe']))
{
    $recipe_id = $_POST['recipe_id'];

    $report_id = $_POST['report_id'];

    mysqli_query($conn,
    "DELETE FROM recipes
    WHERE id='$recipe_id'");

    mysqli_query($conn,
    "UPDATE content_reports
    SET status='resolved'
    WHERE id='$report_id'");

    mysqli_query($conn,
    "INSERT INTO moderation_logs
    (moderator_id,action,created_at)
    VALUES
    ('$moderator_id',
    'Removed reported recipe',
    NOW())");

    header("Location: reports.php");
    exit();
}


$result = mysqli_query($conn,
"SELECT * FROM content_reports
WHERE entity_type='recipe'
ORDER BY created_at DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>Reports</title>

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
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(350px,1fr));
    gap:20px;
}

.main h1{
    grid-column:1/-1;
    color:#5A4636;
}

.card{
    background:white;
    padding:25px;
    border-radius:20px;
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

.dismiss{
    background:#CFE8CF;
}

.remove{
    background:#FFD6C9;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>Moderator</h2>

<a href="dashboard.php">Dashboard</a>
<a href="verification.php">Chef Verification</a>
<a href="recipes.php">Recipes</a>
<a href="reports.php" class="active">Reports</a>
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

<h1>Recipe Reports</h1>

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {

        $reporter_id = $row['reporter_id'];

        $user_query = mysqli_query($conn,
        "SELECT * FROM users
        WHERE id='$reporter_id'");

        $user = mysqli_fetch_assoc($user_query);

        if(!$user)
        {
            $user['name'] = "Unknown User";
        }


        $recipe_id = $row['entity_id'];

        $recipe_query = mysqli_query($conn,
        "SELECT * FROM recipes
        WHERE id='$recipe_id'");

        $recipe = mysqli_fetch_assoc($recipe_query);

        if(!$recipe)
        {
            $recipe['title'] = "Deleted Recipe";
        }

?>

<div class="card">

<p>
<b>Report ID:</b>
<?php echo $row['id']; ?>
</p>

<p>
<b>Reporter:</b>
<?php echo $user['name']; ?>
</p>

<p>
<b>Recipe Title:</b>
<?php echo $recipe['title']; ?>
</p>

<p>
<b>Reason:</b><br>
<?php echo $row['reason']; ?>
</p>

<p>
<b>Status:</b>
<?php echo $row['status']; ?>
</p>

<p>
<b>Created At:</b>
<?php echo $row['created_at']; ?>
</p>

<form method="POST">

<input type="hidden" name="report_id" value="<?php echo $row['id']; ?>">
<input type="hidden" name="recipe_id" value="<?php echo $row['entity_id']; ?>">

<button type="submit" name="dismiss" class="dismiss">Dismiss Report</button>
<button type="submit" name="remove_recipe" class="remove">Remove Recipe</button>

</form>

</div>

<?php
    }
}
else
{
    echo "<div class='card'>No recipe reports found.</div>";
}
?>

</div>

</body>
</html>