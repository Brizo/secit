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
$print_name = (isset($_POST['print_name'])) ? trim($_POST['print_name']) : '';


//check if submit button has been pressed
if (isset($_POST['remove']) && $_POST['remove'] == 'remove') {
  //check if fields contain data
  if(empty($print_name)) {
     echo 'Please select printer<br /> <a href="remove_printer.php">Back</a>';
  } else {
    // No errors so remove printer.
    $query = "DELETE FROM prints WHERE print_name = '$print_name'";
    $result = mysql_query($query) or die("Error occured");
    echo "Printer successfully removed <br />";
     }
     
  echo '<a href="remove_printer.php">Back</a>';   
}
?>
