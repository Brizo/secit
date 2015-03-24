<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$user_name=$_SESSION['user_name'];
$user_access_level = $_SESSION['user_access_level'];

//filter incoming values
$subnet_id = (isset($_POST['subnet_id'])) ? trim($_POST['subnet_id']) : '';


//check if submit button has been pressed
if (isset($_POST['remove']) && $_POST['remove'] == 'remove') {
  //check if fields contain data
  if(empty($subnet_id)) {
     echo 'Please select Subnet<br /> <a href="all_subnets.php">Back</a>';
  } else {
    // No errors so remove printer.
    $query = "DELETE FROM subnets WHERE `subnet_id` = '$subnet_id'";
    $result = mysql_query($query) or die("Error occured");
    echo "Subnet successfully removed <br />";
     }
     
  echo '<a href="all_subnets.php">Back</a>';   
}
?>
