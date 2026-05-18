<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

/* Users By Role */
$roleQuery = $conn->prepare("SELECT role, COUNT(*) AS total FROM users GROUP BY role");
$roleQuery->execute();
$roleResult = $roleQuery->get_result();

/* Recipes By Cuisine */
$cuisineQuery = $conn->prepare("SELECT cuisines.name, COUNT(recipes.id) AS total FROM cuisines LEFT JOIN recipes ON cuisines.id = recipes.cuisine_id GROUP BY cuisines.name");
$cuisineQuery->execute();
$cuisineResult = $cuisineQuery->get_result();

/* Most Followed Chef */
$chefQuery = $conn->prepare("SELECT users.name, COUNT(follows.id) AS followers FROM follows JOIN users ON follows.chef_id = users.id GROUP BY users.name ORDER BY followers DESC LIMIT 1");
$chefQuery->execute();
$chefResult = $chefQuery->get_result();
$chefData = $chefResult->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Analytics</title>

    <style>

        body{
            font-family:Arial;
            background:#f4f4f4;
            margin:0;
            padding:30px;
        }

        .container{
            padding:30px;
        }

        h1{
            color:#6d4c4c;
        }

        .back{
            text-decoration:none;
            background:#c38d9e;
            color:white;
            padding:10px 15px;
            border-radius:6px;
        }

        table{
            width:100%;
            background:white;
            border-collapse:collapse;
            margin-bottom:30px;
        }

        table th,
        table td{
            border:1px solid #ddd;
            padding:12px;
            text-align:center;
        }

        table th{
            background:#c38d9e;
            color:white;
        }

        h1,h2{
            color:#4b0000;
        }

        .card{
            background:white;
            padding:20px;
            margin-bottom:20px;
            border-radius:10px;
        }

    </style>
</head>
<body>

<div class="container">

<a href="dashboard.php" class="back">Back Dashboard</a>

</div>

<h1>Platform Analytics</h1>

<div class="card">
    <h2>Most Followed Chef</h2>

    <?php
    if($chefData)
    {
        echo "<h3>".$chefData['name']." (".$chefData['followers']." followers)</h3>";
    }
    else
    {
        echo "No followers data found";
    }
    ?>
</div>

<h2>Users By Role</h2>

<table>
<tr>
    <th>Role</th>
    <th>Total Users</th>
</tr>

<?php
while($row = $roleResult->fetch_assoc())
{
?>
<tr>
    <td><?php echo $row['role']; ?></td>
    <td><?php echo $row['total']; ?></td>
</tr>
<?php
}
?>
</table>

<h2>Recipes By Cuisine</h2>

<table>
<tr>
    <th>Cuisine</th>
    <th>Total Recipes</th>
</tr>

<?php
while($row = $cuisineResult->fetch_assoc())
{
?>
<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['total']; ?></td>
</tr>
<?php
}
?>

</table>

</body>
</html>
