<?php
$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'auth';

/*There are all og the information that are needed to get information from the database: we can see the server, username, password and name of the datbaase that we are taking messages, the sorce of the data about the users*/
try {
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }