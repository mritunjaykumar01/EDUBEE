<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php session_start();
  if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 0;
  }

  $_SESSION['status'] = 0;

  unset($_SESSION['status']);
  unset($_SESSION['user']);
  // remove all session variables
session_unset();

// destroy the session
session_destroy(); 
  redirect_to("index.php");
 ?>