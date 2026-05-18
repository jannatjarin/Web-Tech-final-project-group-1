<?php
session_start();
include("../config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

$search = "";

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $searchValue = "%$search%";

    $stmt = $conn->prepare("SELECT id,name,username,email,role,is_active FROM users WHERE name LIKE ? OR email LIKE ? OR username LIKE ?");

    $stmt->bind_param("sss", $searchValue, $searchValue, $searchValue);

    $stmt->execute();

    $result = $stmt->get_result();
}
else
{
    $result = $conn->query("SELECT id,name,username,email,role,is_active FROM users");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>

    <style>

        body{
            margin:0;
            padding:0;
            font-family:Arial;
            background:#f8f1f1;
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

        .search-box{
            margin-top:20px;
            margin-bottom:20px;
        }

        .search-box input{
            padding:10px;
            width:300px;
            border:1px solid #ddd;
            border-radius:5px;
        }

        .search-box button{
            padding:10px 15px;
            border:none;
            background:#c38d9e;
            color:white;
            border-radius:5px;
            cursor:pointer;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        table th{
            background:#c38d9e;
            color:white;
            padding:12px;
        }

        table td{
            padding:12px;
            text-align:center;
            border-bottom:1px solid #eee;
        }

        button{
            padding:7px 10px;
            border:none;
            color:white;
            border-radius:5px;
            cursor:pointer;
            margin:2px;
        }

        .activate{
            background:#7fb77e;
        }

        .deactivate{
            background:#d46a6a;
        }

        .moderator{
            background:#8e7cc3;
        }

    </style>
</head>
<body>

<div class="container">

<a href="dashboard.php" class="back">Back Dashboard</a>

<h1>Manage Users</h1>

<form method="GET" class="search-box">

    <input type="text" name="search" placeholder="Search User" value="<?php echo $search; ?>">

    <button type="submit">Search</button>

</form>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Username</th>
    <th>Email</th>
    <th>Role</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
while($row = $result->fetch_assoc())
{
?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['name']; ?></td>

    <td><?php echo $row['username']; ?></td>

    <td><?php echo $row['email']; ?></td>

    <td id="role-<?php echo $row['id']; ?>">
        <?php echo $row['role']; ?>
    </td>

    <td id="status-<?php echo $row['id']; ?>">

        <?php
        if($row['is_active'] == 1)
        {
            echo "Active";
        }
        else
        {
            echo "Inactive";
        }
        ?>

    </td>

    <td>

        <button class="activate"
        onclick="updateUser(<?php echo $row['id']; ?>,'activate')">
        Activate
        </button>

        <button class="deactivate"
        onclick="updateUser(<?php echo $row['id']; ?>,'deactivate')">
        Deactivate
        </button>

        <?php
        if($row['role'] != 'moderator')
        {
        ?>

        <button class="moderator"
        onclick="updateUser(<?php echo $row['id']; ?>,'make_moderator')">
        Make Moderator
        </button>

        <?php
        }
        ?>

        <?php
        if($row['role'] == 'moderator')
        {
        ?>

        <button class="moderator"
        onclick="updateUser(<?php echo $row['id']; ?>,'remove_moderator')">
        Remove Moderator
        </button>

        <?php
        }
        ?>

    </td>

</tr>

<?php
}
?>

</table>

</div>

<script>

function updateUser(id, action)
{

    fetch('../ajax/user_action.php', {

        method:'POST',

        headers:{
            'Content-Type':'application/x-www-form-urlencoded'
        },

        body:'id=' + id + '&action=' + action

    })

    .then(response => response.json())

    .then(data => {

        alert(data.message);

        location.reload();

    });
}

</script>

</body>
</html>
