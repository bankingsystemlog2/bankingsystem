<?php
 define( 'DB_HOSTT', 'localhost' );          // Set database host
  define( 'DB_USERR', 'root' );             // Set database user
  define( 'DB_PASSS', '' );             // Set database password
  define( 'DB_NAMEE', 'bank' );        // Set database name

$conn = mysqli_connect(DB_HOSTT,DB_USERR,DB_PASSS,DB_NAMEE);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>