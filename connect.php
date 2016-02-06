<?php 
// include database config settings
include_once 'config.php';


// connect to MySQL database.
$connect = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'],$config['db']['name']);
/* check connection */ 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//printf("Host information: %s\n", var_dump($mysqli));

?>