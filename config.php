<?php
$hostName = "localhost"; // host name
$username = "if20";  // database username
$password = "if20"; // database password
$databaseName = "if20_lisanne"; // database name

$connection = new mysqli($hostName,$username,$password,$databaseName);
if (!$connection) {
    die("Error in database connection". $connection->connect_error);
}
?>