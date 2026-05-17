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



if(isset($_POST['add_cuisine']))
{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $flag_emoji = $_POST['flag_emoji'];

    $insert = "INSERT INTO cuisines
    (name, description, flag_emoji)
    VALUES
    ('$name','$description','$flag_emoji')";

    mysqli_query($conn,$insert);

    header("Location: cuisines.php");
    exit();
}



if(isset($_POST['update_cuisine']))
{
    $id = $_POST['cuisine_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $flag_emoji = $_POST['flag_emoji'];

    $update = "UPDATE cuisines
    SET name='$name',
    description='$description',
    flag_emoji='$flag_emoji'
    WHERE id='$id'";

    mysqli_query($conn,$update);

    header("Location: cuisines.php");
    exit();
}



if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    $check = "SELECT * FROM recipes
    WHERE cuisine_id='$id'";

    $result = mysqli_query($conn,$check);

    if(mysqli_num_rows($result) == 0)
    {
        $delete = "DELETE FROM cuisines
        WHERE id='$id'";

        mysqli_query($conn,$delete);
    }

    header("Location: cuisines.php");
    exit();
}



$query = "SELECT * FROM cuisines
ORDER BY id DESC";

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Cuisines</title>

<style>

body{
    margin:0;
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
    margin:8px;
    text-decoration:none;
    color:#5A4636;
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

input, textarea{
    width:100%;
    padding:10px;
    margin:5px 0;
    border-radius:10px;
    border:1px solid #ddd;
}

button{
    padding:10px 20px;
    border:none;
    border-radius:20px;
    cursor:pointer;
    margin-top:10px;
    margin-right:10px;
}

.add{
    background:#CFE8CF;
}

.update{
    background:#FFD6C9;
}

.delete{
    background:#F8C8C8;
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
<a href="cuisines.php" class="active">Cuisines</a>
<a href="diet_types.php">Diet Types</a>
<a href="profile.php">Profile</a>
<a href="quality_report.php">Quality Report</a>
<a href="warnings.php">Warnings</a>
<a href="moderation_logs.php">Moderation Logs</a>
<a href="../logout.php">Logout</a>

</div>



<div class="main">

<h1>Manage Cuisines</h1>



<!-- ADD CUISINE -->
<div class="card">

<h3>Add New Cuisine</h3>

<form method="POST">

<input type="text"
name="name"
placeholder="Cuisine Name"
required>

<input type="text"
name="flag_emoji"
placeholder="Flag Emoji (e.g. 🇧🇩)"
required>

<textarea name="description"
placeholder="Description"
required></textarea>

<button type="submit"
name="add_cuisine"
class="add">
Add Cuisine
</button>

</form>

</div>



<!-- LIST CUISINES -->
<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="card">

<form method="POST">

<input type="hidden"
name="cuisine_id"
value="<?php echo $row['id']; ?>">

<p><b>ID:</b> <?php echo $row['id']; ?></p>

<input type="text"
name="name"
value="<?php echo $row['name']; ?>">

<input type="text"
name="flag_emoji"
value="<?php echo $row['flag_emoji']; ?>">

<textarea name="description"><?php echo $row['description']; ?></textarea>



<button type="submit"
name="update_cuisine"
class="update">
Update
</button>



<a class="delete"
href="cuisines.php?delete=<?php echo $row['id']; ?>"
style="padding:10px 15px; text-decoration:none; border-radius:20px;">
Delete
</a>

</form>

</div>

<?php } ?>

</div>

</body>
</html>