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

  echo '<a href="remove_pc.php">Back</a>'; 
//filter incoming values
$pc_ip = (isset($_POST['pc_ip'])) ? trim($_POST['pc_ip']) : '';


//check if submit button has been pressed
if (isset($_POST['remove']) && $_POST['remove'] == 'Remove') {
  //check if fields contain data
  if(empty($pc_ip)) {
     echo 'Please select PC<br /> <a href="remove_pc.php">Back</a>';
  } else {
    // No errors so remove printer.
    $query = "DELETE FROM computers WHERE pc_ip = '$pc_ip'";
    $result = mysql_query($query) or die("Error occured");
    echo "Site successfully removed <br />";
     }
}
?>
