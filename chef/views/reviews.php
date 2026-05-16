<?php

include '../controllers/ReviewController.php';

?>
<!DOCTYPE html>
<html>

<head>

    <title>Reviews</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

    <div class="sidebar">

        <h2>Chef Panel</h2>

        <ul>

            <li><a href="dashboard.php">Dashboard</a></li>

            <li><a href="add_recipe.php">Add Recipe</a></li>

            <li><a href="my_recipes.php">My Recipes</a></li>

            <li><a href="collections.php">Collections</a></li>

            <li><a href="reviews.php">Reviews</a></li>

            <li><a href="analytics.php">Analytics</a></li>

            <li><a href="profile.php">Profile</a></li>

            <li><a href="verification_request.php">Verification</a></li>

        </ul>

    </div>

    <div class="main-content">

        <h1>User Reviews</h1>

        <table>

            <tr>

                <th>Recipe</th>
                <th>User</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Chef Reply</th>

            </tr>

            <?php

while($row = $reviews->fetch_assoc())
{

?>

<tr>

    <td><?php echo $row['recipe_id']; ?></td>

    <td><?php echo $row['user_name']; ?></td>

    <td><?php echo $row['rating']; ?></td>

    <td><?php echo $row['review']; ?></td>

    <td>

        <textarea id="reply_<?php echo $row['id']; ?>"
        rows="3"
        cols="25"></textarea>

        <br><br>

        <button onclick="sendReply(<?php echo $row['id']; ?>)">
            Reply
        </button>

    </td>

</tr>

<?php

}

?>

        </table>

    </div>

    <script>

function sendReply(review_id)
{
    var reply = document.getElementById("reply_" + review_id).value;

    var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "../ajax/chef_reply.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            if(this.responseText == "success")
            {
                alert("Reply Added Successfully");
            }
            else
            {
                alert("Reply Failed");
            }
        }
    };

    xhttp.send("review_id=" + review_id + "&reply=" + reply);
}

</script>

</body>

</html>