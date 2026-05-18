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

$search = "";

if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = $_GET['search'];

    $result = mysqli_query($conn,
    "SELECT * FROM recipes
    WHERE title LIKE '%$search%'
    ORDER BY created_at DESC");
}
else
{
    $result = mysqli_query($conn,
    "SELECT * FROM recipes
    ORDER BY created_at DESC");
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Recipes</title>

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

input[type=text]{
    padding:10px;
    width:300px;
    border-radius:10px;
    border:1px solid #ccc;
}

button{
    padding:10px 20px;
    border:none;
    border-radius:15px;
    cursor:pointer;
}

.search-btn{
    background:#FFD6C9;
}

.view-btn{
    background:#CFE8CF;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>Moderator</h2>

<a href="dashboard.php">Dashboard</a>
<a href="verification.php">Chef Verification</a>
<a href="recipes.php" class="active">Recipes</a>
<a href="reports.php">Reports</a>
<a href="review_report.php">Review Reports</a>
<a href="cuisines.php">Cuisines</a>
<a href="diet_types.php">Diet Types</a>
<a href="profile.php">Profile</a>
<a href="quality_report.php">Quality Report</a>
<a href="moderation_logs.php">Moderation Logs</a>
<a href="../logout.php">Logout</a>

</div>

<div class="main">

<h1>All Recipes</h1>

<form method="GET">

<input
type="text"
name="search"
placeholder="Search by recipe title..."
value="<?php echo $search; ?>">

<button
type="submit"
class="search-btn">
Search
</button>

</form>

<br><br>

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {

        $author_name = "Unknown User";

        $author_id = $row['author_id'];

        $author_query = mysqli_query($conn,
        "SELECT * FROM users
        WHERE id='$author_id'");

        if($author_query && mysqli_num_rows($author_query) > 0)
        {
            $author = mysqli_fetch_assoc($author_query);
            $author_name = $author['name'];
        }

        $cuisine_name = "Unknown";

        $cuisine_id = $row['cuisine_id'];

        $cuisine_query = mysqli_query($conn,
        "SELECT * FROM cuisines
        WHERE id='$cuisine_id'");

        if($cuisine_query && mysqli_num_rows($cuisine_query) > 0)
        {
            $cuisine = mysqli_fetch_assoc($cuisine_query);
            $cuisine_name = $cuisine['name'];
        }

        $diet_name = $row['diet_type'];

?>

<div class="card">

<p>
<b>Title:</b>
<?php echo $row['title']; ?>
</p>

<p>
<b>Author:</b>
<?php echo $author_name; ?>
</p>

<p>
<b>Cuisine:</b>
<?php echo $cuisine_name; ?>
</p>

<p>
<b>Diet Type:</b>
<?php echo $diet_name; ?>
</p>

<p>
<b>Status:</b>
<?php echo $row['status']; ?>
</p>

<p>
<b>Views:</b>
<?php echo $row['view_count']; ?>
</p>

<p>
<b>Created:</b>
<?php echo $row['created_at']; ?>
</p>

<form method="POST" action="recipe_details.php">

<input
type="hidden"
name="recipe_id"
value="<?php echo $row['id']; ?>">

<button
type="submit"
class="view-btn">
View Full Recipe
</button>

</form>

</div>

<?php
    }
}
else
{
    echo "<div class='card'>No recipes found.</div>";
}
?>

</div>

</body>
</html>