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

if (isset($_POST['print_name'])&&(isset($_POST['print_ip']))&&(isset($_POST['print_desc']))) {
	$print_name=$_POST['print_name'];
	$print_ip=$_POST['print_ip'];
	$print_desc=$_POST['print_desc'];
	if (!empty($print_name)&&!empty($print_ip)&&!empty($print_desc)) {
	  
	  $query = "SELECT `print_name` FROM `prints` WHERE `print_name` = '$print_name'";
	  $query_run = mysql_query($query);
	  
	  if (mysql_num_rows($query_run)>=1) {
	    echo "The Printer Already Exists in the Database <br>";
	    echo '<a href="add_printer.php">Back</a>';
	    exit();
	  } else {
	    $query = "INSERT INTO `prints` VALUES ('','".mysql_real_escape_string($print_name)."','".mysql_real_escape_string($print_ip)."','".mysql_real_escape_string($print_desc)."')";
	    
	    if ($query_run = mysql_query($query)) {
	      echo'Printer Successfully added <br>';
	      echo '<a href="add_printer.php">Back</a>';
	      exit();
	    } else {
	      echo 'An Error Occured...<br>';
	      echo '<a href="add_printer.php">Back</a>';
	      exit();
	    }
	  }
	  
	} else {
	  echo "All Fileds ARE Required!!<br>";
	  echo '<a href="add_printer.php">Back</a>';
	  exit();
	}
}
?>
