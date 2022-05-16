<?php

  define( 'DB_HOST', 'localhost' );          // Set database host
  define( 'DB_USER', 'u811015322_hr2' );             // Set database user
  define( 'DB_PASS', 'HR2_test' );             // Set database password
  define( 'DB_NAME', 'u811015322_HR2_test' );        // Set database name
  
  $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  // Check connection
  if (mysqli_connect_errno())
  {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
