<!DOCTYPE html>
<html>
<head>
    <title>Moderator Dashboard</title>

    <style>

        body{
            margin:0;
            font-family: Arial;
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
            border-right:2px solid #dddddd;
        }

        .logo{
            text-align:center;
            font-size:24px;
            font-weight:bold;
            margin-bottom:30px;
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

        .main{
            margin-left:240px;
            padding:20px;
        }

        .navbar{
            background:white;
            padding:15px;
            border-radius:20px;
            border:1px solid #dddddd;
        }

        .welcome{
            margin-top:20px;
            background-color:#FFD6C9;
            padding:30px;
            border-radius:25px;
            color:#5A4636;
            border:1px solid #dddddd;
        }

        .cards{
            margin-top:20px;
        }

        .card{
            width:22%;
            background:white;
            display:inline-block;
            margin-right:1%;
            padding:20px;
            border-radius:20px;
            border:1px solid #dddddd;
            vertical-align:top;
        }

        .purple{
            background:#DCCCF5;
        }

        .pink{
            background:#FFD6C9;
        }

        .green{
            background:#CFE8CF;
        }

        .yellow{
            background:#FFE9A8;
        }

        .activity{
            margin-top:20px;
            background:white;
            padding:20px;
            border-radius:20px;
            border:1px solid #dddddd;
        }

    </style>

</head>

<body>

<div class="sidebar">

    <div class="logo">🍰 RecipeShare</div>

    <a class="active" href="dashboard.php">🏠 Dashboard</a>
    <a href="verification.php">👨‍🍳 Chef Requests</a>
    <a href="reports.php">🚩 Reports</a>
    <a href="recipes.php">🍲 Recipes</a>
    <a href="profile.php">👤 Profile</a>

</div>

<div class="main">

    <div class="navbar">
        🌸 Welcome Moderator
    </div>

    <div class="welcome">
        <h1>Moderator Dashboard</h1>
        <p>Manage recipes, reports and chef requests easily.</p>
    </div>

    <div class="cards">

        <div class="card purple">
            <h2></h2>
            <p>🧁 Pending Requests</p>
        </div>

        <div class="card pink">
            <h2></h2>
            <p>🚨 Reported Recipes</p>
        </div>

        <div class="card green">
            <h2></h2>
            <p>⭐ Flagged Reviews</p>
        </div>

        <div class="card yellow">
            <h2></h2>
            <p>🍲 New Recipes</p>
        </div>

    </div>

    <div class="activity">

        <h2>📝 Recent Activity</h2>

        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>

    </div>

</div>

</body>
</html>
