<?php
$servername = "mysqlserverhost";
$username = "david";
$password = "david.10";
$dbname = "toolingdb";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?>
