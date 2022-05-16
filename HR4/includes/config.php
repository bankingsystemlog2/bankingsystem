<?php

  define( 'DB_HOST', 'localhost' );          // Set database host
  define( 'DB_USER', 'root' );             // Set database user
  define( 'DB_PASS', '' );             // Set database password
  define( 'DB_NAME', 'bank' );        // Set database name

  
  $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  // Check connection
  if (mysqli_connect_errno())
  {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
