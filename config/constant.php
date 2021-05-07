<?php

 //Start session
 session_start();

 // Create constants to store non repeating values
 define('SITEURL', 'http://localhost/food-resto/');
 define('LOCALHOST', 'localhost');
 define('DB_USERNAME', 'root');
 define('DB_PASSWORD', '');
 define('DB_NAME', 'food-order');

 // Execute query and save data in DB
 $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //DB Connection
 $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>