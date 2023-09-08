<?php 

session_start();

$user = 'root';
$password = 'root';
$dbName = 'cuisine';
$host = 'localhost';
$port = 33066;


$mysqli = new mysqli($host, $user, $password, $dbName, $port);

if ($mysqli->connect_errno) {
    printf("Connect failed: %s<br />", $mysqli→connect_error);
    exit();
}

//printf("Success... %s\n", $mysqli->host_info);


?>



