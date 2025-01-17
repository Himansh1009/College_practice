<?php

$databaseHost = 'localhost';
$databaseName = 'crud';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Comment this line in production to avoid showing connection status
// echo "Connected Successfully..";
?> 