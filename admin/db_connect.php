<?php
// Connect to the MySQL database
$db_host		= "localhost";
$db_user		= "root";
$db_pass		= "";
$db_database	= "ecommerceweb";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
