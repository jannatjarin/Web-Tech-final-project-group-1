<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body>

<h2>User Registration</h2>
<form method="post" action="registration_controller.php">

<input type="text" name="name" placeholder="Name"><br><br>

<input type="text" name="username" placeholder="Username"><br><br>

<input type="email" name="email" placeholder="Email"><br><br>

<input type="password" name="password" placeholder="Password"><br><br>




<label>Dietary Preferences</label><br>

<input type="checkbox" name="diet[]" value="Vegetarian">Vegetarian
<input type="checkbox" name="diet[]" value="Vegan">Vegan
<input type="checkbox" name="diet[]" value="Keto">Keto
<input type="checkbox" name="diet[]" value="Halal">Halal

<br><br>

<input type="submit" name="register" value="Register">

</form>

</body>
</html>