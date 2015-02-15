<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>cs290 Assn4 multtable.php</title>
  </head>
  <body>



<?php

// Data verification

$dataVerified = true; //initial good faith in user

// Check that all parameters exist


foreach ($_GET as $key => $value) {
  if (empty($value) && $value != 0) {
    echo "Missing parameter " . $key;
    $dataVerified = false;
  }
}

//Check that all parameters are integers 
if ($dataVerified == true) {
  foreach ($_GET as $key => $value) {
    if (!is_numeric($value) || ((integer)($value) !== ($value + 0))) {
      echo $key . " must be an integer.<br>";
      $dataVerified = false;
    } 
  }
}

//Store $_Get array vars
$ymin = 0;
$ymax = 0;
$xmin = 0;
$xmax = 0;

if ($dataVerified == true) {
  $ymin = $_GET['min-multiplicand'] + 0;
  $ymax = $_GET['max-multiplicand'] + 0;
  $xmin = $_GET['min-multiplier'] + 0;
  $xmax = $_GET['max-multiplier'] + 0;
}

// Diplay user input
if ($dataVerified == true) {
  echo $ymin . " is min-multiplicand.\n<br>\n";
  echo $ymax . " is max-multiplicand.\n<br>\n";
  echo $xmin . " is min-multiplier.\n<br>\n";
  echo $xmax . " is max-multiplier.\n<br>\n";
}

// Check that min is <= max

if($dataVerified == true) {
  if ($ymin > $ymax) {
  	echo "Minimum multiplicand larger than maximum.\n";
    $dataVerified = false;
  }
  if ($xmin > $xmax) {
  	echo "Minimum multiplier larger than maximum.\n";
    $dataVerified = false;
  }
}



// Build Multiplication Table
if ($dataVerified == true){
  echo "<br><br>\nHere is a Multiplication Table\n<br><br>\n";
  echo "<table border='1'>\n";
  $height = $ymax - $ymin;
  $width = $xmax -$xmin;
  echo "<tr>\n  <th>\n";
  for ($x = 0; $x <= $width; $x++) {
    $topRowValue = ($xmin + $x);
    echo "  <th>$topRowValue\n"; // top row
  }
  for ($y = 0; $y <= $height; $y++) {
   echo "<tr>\n";
  	$multiplicand = ($ymin + $y); 
    echo "  <th>$multiplicand\n";//left column
    for ($x = 0; $x <= $width; $x++) {
    $cellValue = ($ymin + $y) * ($xmin + $x);
      echo "  <td>$cellValue\n"; // cell values
    }
  echo "</tr>\n";
  }
}

?>

  </body>
</html>