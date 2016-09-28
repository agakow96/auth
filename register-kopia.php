
<?php 
require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	// Enter the new user in the database
	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

	if( $stmt->execute() ):
		$message = 'Successfully created new user';
	else:
		$message = 'Sorry there must have been an issue creating your account';
	endif;

//Executing the if statement so the if statement gives us a message if the password has been corect and if the user has been succesfully added, if yes, it's going to be a "success, but if not, it's going to inform, that this failed
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


	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
    
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