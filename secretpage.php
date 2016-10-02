<?php
session_start();
 if(!isset($_SESSION['user_id'])) {
   echo ("<h3>Sorry, you are not logged in<h3>");
   echo '<a href="index.php">Log in or Register</a>';
        
}else{
    
   echo ("<h3>Succes, you are logged in! :)<h3>"); 
   echo '<a href="logout.php">Logout</a>';
    
}
?>