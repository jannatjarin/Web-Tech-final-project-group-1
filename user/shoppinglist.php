<?php
session_start();

if (!isset($_SESSION['shopping_list'])) {
    $_SESSION['shopping_list'] = [];
}


if (isset($_POST['add_item'])) {

    $item = trim($_POST['item']);
    $qty = trim($_POST['qty']);
    $unit = trim($_POST['unit']);

    if ($item != "") {
        $_SESSION['shopping_list'][] = [
            "item" => $item,
            "qty" => $qty,
            "unit" => $unit
        ];
    }
}
if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    unset($_SESSION['shopping_list'][$index]);
    $_SESSION['shopping_list'] = array_values($_SESSION['shopping_list']);
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Shopping List</title>

<style>
body { margin:0; font-family:Arial; background:#f5f5f5; }




.sidebar
{
    width:220px;
    height:100vh;
    background-color:#0b4d1c;
    position:fixed;
    left:0;
    top:0;
    padding-top:20px;
}

.sidebar h2
{
    color:white;
    text-align:center;
}

.sidebar a
{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px;
}

.sidebar a:hover
{
    background-color:#146c2f;
}




.main { margin-left:220px; padding:20px; }
.list-box { background:white; padding:20px; border-radius:10px; }




input {
    padding:10px;
    margin:5px;
}

button {
    padding:10px 20px;
    background:#0b4d1c;
    color:white;
    border:none;
    cursor:pointer;
}

table {
    width:100%;
    margin-top:20px;
    border-collapse:collapse;
}

th, td {
    border:1px solid #ccc;
    padding:10px;
}
a {
    color:red;
    text-decoration:none;
}
</style>

</head>

<body>

<div class="sidebar">

<h2>User Panel</h2>

<a href="dashboard.php">Dashboard</a>
<a href="browse_recipes.php">Browse Recipes</a>
<a href="bookmarks.php">Bookmarks</a>
<a href="reviews.php">Reviews</a>
<a href="shopping_lists.php">Shopping Lists</a>
<a href="meal_plan.php">Meal Plan</a>
<a href="chefs.php">Chefs</a>
<a href="profile.php">Profile</a>

</div>





<div class="main">

<h2>Shopping List</h2>

<div class="list-box">


<form method="POST">
    <input type="text" name="item" placeholder="Item">
    <input type="text" name="qty" placeholder="Quantity">
    <input type="text" name="unit" placeholder="Unit">
    <button type="submit" name="add_item">Add</button>
</form>


<table>
<tr>
    <th>#</th>
    <th>Item</th>
    <th>Quantity</th>
    <th>Unit</th>
    <th>Action</th>
</tr>


<?php foreach ($_SESSION['shopping_list'] as $i => $row) { ?>
<tr>
    <td><?php echo $i + 1; ?></td>
    <td><?php echo htmlspecialchars($row['item']); ?></td>
    <td><?php echo htmlspecialchars($row['qty']); ?></td>
    <td><?php echo htmlspecialchars($row['unit']); ?></td>
    <td><a href="?delete=<?php echo $i; ?>">Delete</a></td>
</tr>
<?php } ?>

</table>

</div>

</div>

</body>
</html>