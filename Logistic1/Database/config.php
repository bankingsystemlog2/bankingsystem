<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVERR', 'localhost');
define('DB_USERNAMEE', 'root');
define('DB_PASSWORDD', '');
define('DB_NAMEE', 'bank');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVERR, DB_USERNAMEE, DB_PASSWORDD, DB_NAMEE);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>