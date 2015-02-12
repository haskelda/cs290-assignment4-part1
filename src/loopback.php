<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
header('Content-type: application/json');
?>

<?php
$requestArray = array();
$parameterArray = array();

$requestArray['Type'] = $_SERVER['REQUEST_METHOD'];

if (empty($_GET) && empty($_POST)) {  
  $requestArray['parameters'] = null;
} else {

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  foreach ($_GET as $key => $value) {
    if ($value == "") {
      $parameterArray[$key] = 'undefined';
    } else{
      $parameterArray[$key] = $value;
    }
  }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  foreach ($_POST as $key => $value) {
    if ($value == "") {
      $parameterArray[$key] = 'undefined';
    } else{
      $parameterArray[$key] = $value;
    }
  }
}

$requestArray['parameters'] = $parameterArray;
}

echo json_encode($requestArray);
?>

