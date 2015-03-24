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

if (isset($_POST['site_subnet'])&&(isset($_POST['site_name']))&&(isset($_POST['site_ip']))&&(isset($_POST['site_desc']))) {
	$site_subnet=$_POST['site_subnet'];
	$site_name=$_POST['site_name'];
	$site_ip=$_POST['site_ip'];
	$site_desc=$_POST['site_desc'];
	if (!empty($site_subnet)&&!empty($site_name)&&!empty($site_ip)&&!empty($site_desc)) {
	  
	  $query = "SELECT `site_name` FROM `remotesites` WHERE `site_name` = '$site_name'";
	  $query_run = mysql_query($query);
	  
	  if (mysql_num_rows($query_run)>=1) {
	    echo "The Site Already Exists in the Database <br>";
	    echo '<a href="add_site.php">Back</a>';
	    exit();
	  } else {
	    $query = "INSERT INTO `remotesites` VALUES ('','".mysql_real_escape_string($site_subnet)."','".mysql_real_escape_string($site_name)."','".mysql_real_escape_string($site_ip)."','".mysql_real_escape_string($site_desc)."')";
	    
	    if ($query_run = mysql_query($query)) {
	      echo'Remote-Site Successfully Added <br>';
	      echo '<a href="add_site.php">Back</a>';
	      exit();
	    } else {
	      echo 'An Error Occured...<br>';
	      echo '<a href="add_site.php">Back</a>';
	      exit();
	    }
	  }
	  
	} else {
	  echo "All Fileds ARE Required!!<br>";
	  echo '<a href="add_site.php">Back</a>';
	  exit();
	}
}
  date_default_timezone_set('Africa/Mbabane');
  $change_t = date('m/d/Y h:i:s', time());
  $change_reason = "Newly Deployed";
  
//Update change in Changes table
  
  mysql_query("INSERT INTO `changes` VALUES ('','".mysql_real_escape_string($change_t)."','".mysql_real_escape_string($user_name)."','".mysql_real_escape_string($pc_ip)."','".mysql_real_escape_string($pc_user)."','".mysql_real_escape_string($change_reason)."')");


?>
