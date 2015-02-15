<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();

// Redirect
// If user navigates here without logging in previously
if (!isset($_SESSION['username']) && !isset($_POST['username'])) {
  header("Location: login.php");
} 

?>