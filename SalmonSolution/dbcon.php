<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "salmon_solution";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

// Check connection
if ($conn->connect_error) {
  die("could not connect: " . $conn->connect_error);
}
?>