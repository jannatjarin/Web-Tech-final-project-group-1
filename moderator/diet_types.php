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



if(isset($_POST['add']))
{
    $name = $_POST['name'];

    $insert = "INSERT INTO diet_types(name)
    VALUES('$name')";

    mysqli_query($conn,$insert);

    header("Location: diet_types.php");
    exit();
}



if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];

    $update = "UPDATE diet_types
    SET name='$name'
    WHERE id='$id'";

    mysqli_query($conn,$update);

    header("Location: diet_types.php");
    exit();
}



if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    $check = "SELECT * FROM recipes
    WHERE diet_type_id='$id'";

    $result_check = mysqli_query($conn,$check);

    if(mysqli_num_rows($result_check) == 0)
    {
        $delete = "DELETE FROM diet_types
        WHERE id='$id'";

        mysqli_query($conn,$delete);
    }

    header("Location: diet_types.php");
    exit();
}



$query = "SELECT * FROM diet_types ORDER BY id DESC";
$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Diet Types</title>

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

input{
    padding:10px;
    margin:5px;
    border-radius:10px;
    border:1px solid #ddd;
}

button{
    padding:10px 15px;
    border:none;
    border-radius:15px;
    cursor:pointer;
}

.add{
    background:#CFE8CF;
}

.update{
    background:#FFD6C9;
}

.delete{
    background:#FFB3B3;
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
<a href="diet_types.php" class="active">Diet Types</a>
<a href="profile.php">Profile</a>
<a href="quality_report.php">Quality Report</a>
<a href="warnings.php">Warnings</a>
<a href="moderation_logs.php">Moderation Logs</a>
<a href="../logout.php">Logout</a>

</div>



<div class="main">

<h1>Diet Types Management</h1>



<div class="card">

<h3>Add New Diet Type</h3>

<form method="POST">

<input type="text"
name="name"
placeholder="Diet Type Name"
required>

<button type="submit"
name="add"
class="add">
Add
</button>

</form>

</div>



<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="card">

<form method="POST">

<input type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

<input type="text"
name="name"
value="<?php echo $row['name']; ?>"
required>

<button type="submit"
name="update"
class="update">
Update
</button>

<a href="diet_types.php?delete=<?php echo $row['id']; ?>"
class="delete"
style="padding:10px 15px;border-radius:15px;text-decoration:none;">
Delete
</a>

</form>

</div>

<?php } ?>

</div>

</body>
</html>