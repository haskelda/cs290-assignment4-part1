<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');



session_start();
//Logout 
// this is triggered by login.php?logout=TRUE being sent in the URL from content1.php
if (isset($_SESSION['username']) && (isset($_GET['logout'])) && ($_GET['logout'] == TRUE)) {
  echo "$_SESSION[username] has been successfully logged out.<br>";
  $_SESSION = array();
  session_destroy();
}
  
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>cs290 Assn4 login.php</title>
  </head>

  <body>
    <h1>Login Page</h1>
    <form action="content1.php" method="POST">
      <label>Username:</label>
      <input type="text" name="username">
      <input type="submit" value="Login">
    </form>
  </body>
</html>
