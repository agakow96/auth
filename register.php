
<?php 
session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /");
}

require 'database.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$message = '';
// Enter the new user in the database
if(!empty($_POST['email']) && !empty($_POST['password'])):

	$email = $_POST['email'];
	$password = $_POST['password'];
	$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
	/*The password has to be hashed, so noone who can get to our database can see it. It's safer that way. There are many different ways of hasing the password, I'm using "PASSWORD_BCRYPT"*/
	
	$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);
	
	if ($stmt->execute()) {
		echo 'Successfully created new user';	
	}
	else {
		echo 'Sorry there must have been an issue creating your account';
	}
	
//Executing the if statement so the if statement gives us a message if the password has been corect and if the user has been succesfully added, if yes, the user will be logged in, but if not, it's going to inform, that this failed
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
<!--The user has to fill in all of the places, as well as confirm the password in order to be added to database-->

<input type="submit">
</form>

</body>
</html>