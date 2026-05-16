<?php

$conn = mysqli_connect("localhost","root","","recipe_platform");

if(!$conn)
{
    die("Connection Failed");
}

if(isset($_POST['approve']))
{
    $id = $_POST['request_id'];

    $update = "UPDATE chef_verification_requests 
    SET status='approved' 
    WHERE id='$id'";

    mysqli_query($conn,$update);
}

if(isset($_POST['reject']))
{
    $id = $_POST['request_id'];

    $update = "UPDATE chef_verification_requests 
    SET status='rejected' 
    WHERE id='$id'";

    mysqli_query($conn,$update);
}

$query = "SELECT * FROM chef_verification_requests 
WHERE status='pending'";

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Chef Verification</title>

    <style>

        body{
            margin:0;
            font-family:Arial;
            background-color:#FFF8F2;
            color:#5A4636;
        }

        .sidebar{
            width:220px;
            height:100vh;
            background-color:#FFF4EC;
            position:fixed;
            left:0;
            top:0;
            padding-top:20px;
            border-right:2px solid lightgray;
        }

        .sidebar a{
            display:block;
            padding:15px;
            margin:10px;
            text-decoration:none;
            color:#5A4636;
            border-radius:20px;
        }

        .sidebar a:hover{
            background-color:#FFD6C9;
        }

        .active{
            background-color:#FFD6C9;
        }

        .logo{
            text-align:center;
            font-size:24px;
            margin-bottom:30px;
            font-weight:bold;
        }

        .main{
            margin-left:240px;
            padding:20px;
        }

        .request-card{
            background-color:white;
            padding:20px;
            border-radius:20px;
            margin-bottom:20px;
            border:1px solid lightgray;
        }

        .profile{
            width:80px;
            height:80px;
            border-radius:50%;
            border:1px solid lightgray;
        }

        button{
            padding:10px 20px;
            border:none;
            border-radius:20px;
            margin-top:10px;
            cursor:pointer;
        }

        .approve{
            background-color:#CFE8CF;
        }

        .reject{
            background-color:#FFD6C9;
        }

    </style>

</head>

<body>

<div class="sidebar">

    <div class="logo">🍰 RecipeShare</div>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a class="active" href="verification.php">👨‍🍳 Chef Requests</a>
    <a href="reports.php">🚩 Reports</a>
    <a href="review_report.php">📝 Review Reports</a>
    <a href="recipes.php">🍲 Recipes</a>

</div>

<div class="main">

    <h1>🧁 Chef Verification Requests</h1>

    <?php

    while($row = mysqli_fetch_assoc($result))
    {

    ?>

    <div class="request-card">

        <img src="" class="profile">

        <h2>
            Request ID :
            <?php echo $row['id']; ?>
        </h2>

        <p>
            User ID :
            <?php echo $row['user_id']; ?>
        </p>

        <p>
            <?php echo $row['credentials_description']; ?>
        </p>

        <p>
            Portfolio :
            <?php echo $row['portfolio_link']; ?>
        </p>

        <p>
            <?php echo $row['motivation']; ?>
        </p>

        <p>
            Status :
            <?php echo $row['status']; ?>
        </p>

        <form method="post">

            <input
            type="hidden"
            name="request_id"
            value="<?php echo $row['id']; ?>">

            <button
            type="submit"
            class="approve"
            name="approve">

            Approve

            </button>

            <button
            type="submit"
            class="reject"
            name="reject">

            Reject

            </button>

        </form>

    </div>

    <?php

    }

    ?>

</div>

</body>
</html>