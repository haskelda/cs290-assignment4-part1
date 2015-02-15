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

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>cs290 Assn4 content2.php</title>
  </head>
  <body>

<?php
// Begin Content
echo "\n<br>\n<h1>Content 2</h1>\n<br>\n";
echo "Return to <a href='content1.php'>content1.php</a>.\n<br>\n";
// End Content
?>

 </body>
</html>