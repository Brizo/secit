<?php
//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

if (isset($_POST['subnet_id'])&&(isset($_POST['subnet_desc']))) {
	$subnet_id=$_POST['subnet_id'];
	$subnet_desc=$_POST['subnet_desc'];
	if (!empty($subnet_id)&&!empty($subnet_desc)) {
	  
	  $query = "SELECT `subnet_id` FROM `subnets` WHERE `subnet_id` = '$subnet_id'";
	  $query_run = mysql_query($query);
	  
	  if (mysql_num_rows($query_run)>=1) {
	    echo "The Site Already Exists in the Database <br>";
	    echo '<a href="add_subnet.php">Back</a>';
	    exit();
	  } else {
	    $query = "INSERT INTO `subnets` VALUES ('".mysql_real_escape_string($subnet_id)."','".mysql_real_escape_string($subnet_desc)."')";
	    
	    if ($query_run = mysql_query($query)) {
	      echo'Subnet Successfully Added <br>';
	      echo '<a href="add_subnet.php">Back</a>';
	      exit();
	    } else {
	      echo 'An Error Occured...<br>';
	      echo '<a href="add_subnet.php">Back</a>';
	      exit();
	    }
	  }
	  
	} else {
	  echo "All Fileds ARE Required!!<br>";
	  echo '<a href="add_subnet.php">Back</a>';
	  exit();
	}
}
?>
