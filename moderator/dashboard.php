<!DOCTYPE html>
<html>
<head>
    <title>Moderator Dashboard</title>

    <style>

        body{
            background-color: lavender;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1{
            color: white;
            padding-top: 30px;
            font-size: 40px;
        }

        .header{
            background-color: rgb(60, 88, 131);
            text-align: center;
            padding: 20px;
        }

        .main{
            margin-top: 40px;
            text-align: center;
        }

        .box{
            background-color: white;
            width: 300px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            padding: 20px;
            border: 2px solid rgb(60, 88, 131);
        }

        .box h2{
            color: rgb(60, 88, 131);
        }

        .menu{
            background-color: wheat;
            padding: 15px;
            margin-top: 15px;
        }

        .menu:hover{
            background-color: rgb(214, 192, 151);
        }

        a{
            text-decoration: none;
            color: black;
            font-size: 18px;
            font-weight: bold;
        }

        p{
            color: gray;
            font-size: 16px;
        }

    </style>

</head>

<body>

    <div class="header">

        <h1>Moderator Dashboard</h1>

        <p style="color:white;">
            Manage reports, chefs, cuisines and platform content
        </p>

    </div>

    <div class="main">

        <div class="box">

            <h2>Moderator Panel</h2>

            <div class="menu">
                <a href="verification.php">
                    Chef Verification Requests
                </a>
            </div>

            <div class="menu">
                <a href="reports.php">
                    Content Reports
                </a>
            </div>

            <div class="menu">
                <a href="cuisines.php">
                    Manage Cuisines
                </a>
            </div>

            <div class="menu">
                <a href="diet_types.php">
                    Manage Diet Types
                </a>
            </div>

            <div class="menu">
                <a href="quality_report.php">
                    Content Quality Report
                </a>
            </div>

        </div>

    </div>

</body>
</html>