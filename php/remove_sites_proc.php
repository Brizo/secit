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
$site_name = (isset($_POST['site_name'])) ? trim($_POST['site_name']) : '';


//check if submit button has been pressed
if (isset($_POST['remove']) && $_POST['remove'] == 'Remove') {
  //check if fields contain data
  if(empty($site_name)) {
     echo 'Please select Remote-Site<br /> <a href="remove_site.php">Back</a>';
  } else {
    // No errors so remove printer.
    $query = "DELETE FROM remotesites WHERE site_name = '$site_name'";
    $result = mysql_query($query) or die("Error occured");
    echo "Site successfully removed <br />";
     }
     
  echo '<a href="remove_site.php">Back</a>';   
}
?>
