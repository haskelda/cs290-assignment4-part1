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
    <title>cs290 Assn4 content1.php</title>
  </head>
  <body>

<?php
/* 
//Logout for testing
if (isset($_POST['username']) && $_POST['username'] == "Logout") {
  $_SESSION = array();
  session_destroy();
} else {
//end Logout for testing
*/ 

//Empty Login
 if (isset($_POST['username']) && ($_POST['username'] == "")) {
  //$_SESSION = array();
  //session_destroy();
  echo '<p>A username must be entered. ';
  echo 'Click <a href="login.php">here</a> ';
  echo 'to return to login screen.</p>';
} else {


// First Login
// new user is signing in over other user's session
if (    (isset($_SESSION['username'])) && (  (isset($_POST['username'])) && ($_POST['username'] !== $_SESSION['username']) )
// OR if No current SESSION exists, and Login field is not empty
  || ( !isset($_SESSION['username']) && isset($_POST['username']) && ($_POST['username'] !== "") )    ){
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['currentusername'] = $_POST['username']; // for remembering who's session this is
  $_SESSION['visits'] = -1;
  echo "<p>First Login for " . "$_SESSION[username]";
} // no else here; move on to Hello

// Hello
// if user is logged into SESSION already, and did not attempt to login again as another user in login.php form
if (isset($_SESSION['username'])) {
  if (($_SESSION['currentusername'] == $_SESSION['username'])) { //if (isset($_POST['username']) && ($_POST['username'] == $_SESSION['username'])) 
    $_SESSION['visits']++;
    echo "<p>Hello, " . "$_SESSION[username]";
    echo ", you have visited this page " . "$_SESSION[visits] times before.";
    echo "Click <a href='login.php?logout=TRUE'>here</a> to logout."; //Logout
  }
} else {

// no need for the above else.  I know...

} // else from Hello
} // else from Empty Login
//} // else from Logout for testing

?>

    <h1>Content 1</h1>
  </body>
</html>