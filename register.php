
<?php 
require 'database.php';
if(!empty($_POST['email']) && !empty($_POST['password'])):

// Enter the new user in the dayabase 
endif;
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Register Below</title>
<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
</head>

<body>
<div class="header">
<a href="index.php"> Your App Name</a>
</div>
<h1> Register</h1>
<span>or <a href="login.php">Login here</a></span>

<form action ="register.php" method="POST">

<input type="text" placeholder="Enter your email" name="email">

<input type="password" placeholder="and password" name="password">

<input type="password" placeholder="confirm password" name="confirm_password">

<input type="submit">
</form>

</body>
</html>