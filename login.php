<?php 


session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: index.php");
}

require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):

$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	
	$message = '';
	
	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){
     
	 
	 $_SESSION['user_id'] = $results['id'];
	header("Location: index.php");

	}
	/*If the data has been inserted corectly the user will be sent to index page, and will get the message, that he has been succesfully logged in*/	
	 else {
		/*else, so if not, if the password or email is incorect and it can't be found in the database the user will reciver message "Sorry, there has been an error, try again.."*/ 
		$message = 'Sorry, there has been an error, try again..';
	 }


endif;
?>




<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login Below</title>
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
    <!--The message will be shown if the files were filed with data-->

<h1>Login </h1>
<span>or <a href="register.php">register here</a></span>
<!--I added that link so the page is easier to navigate for the user, if he is not registered yet, he can go straigth to register subpage, he doesn't have to look fo it-->

<form action ="login.php" method="POST">

<input type="text" placeholder="Enter your email" name="email">

<input type="password" placeholder="and password" name="password">

<input type="submit">
</form>

</body>
</html>