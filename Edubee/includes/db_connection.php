<?php
	define("DB_SERVER", "");
	define("DB_USER", "hitesh.me14");
	define("DB_PASS", "hitesh@11tp");
	define("DB_NAME", "edubee");

  // 1. Create a database connection
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
