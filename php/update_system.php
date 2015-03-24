<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

//store session username and access level
$user_name=$_SESSION['user_name'];
$user_access_level = $_SESSION['user_access_level'];

if (isset($_SESSION['system'])) {
	$system=$_SESSION['system'];
}
if (isset($_SESSION['referer'])) {
	$referer=$_SESSION['referer'];
}

if (isset($_POST['cancel'])){
header('Location: '.$referer);
exit();
}
if (isset($_POST['sys_name'])&&(isset($_POST['vendor']))&&(isset($_POST['brand_system']))&&(isset($_POST['os_name']))&&(isset($_POST['db_name']))&&(isset($_POST['h_ware']))){
	$sys_name=$_POST['sys_name'];
	$vendor =$_POST['vendor'];
	$brand_system=$_POST['brand_system'];
	$os_name=$_POST['os_name'];
	$db_name=$_POST['db_name'];
	$h_ware=$_POST['h_ware'];
	$link=$_POST['link'];
	
	// update data in mysql database
	$query="UPDATE systems SET sys_name='$sys_name',
					sys_vendor = '$vendor', 
					sys_brand_name = '$brand_system', 
					sys_os='$os_name', 
					sys_db ='$db_name', 
					sys_h_ware='$h_ware', 
					sys_link='$link' 
	WHERE sys_name='$system'";

	$result=mysql_query($query)or die ("Unsuccessful update");
	echo "Update successful<br>";

	// Redirect to home
	echo'<a href="main.php" class="selected">Home</a>'; 
	
	
} 
//--------------------------------------------FORM----------------------------------------

//create session and store project name
$_SESSION['system'] = $_GET['id'];
$system = $_SESSION['system'];
$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

// Get project information
$result2 = mysql_query("SELECT *  FROM systems WHERE sys_name='$system'");

// Display project information 
while ($row = mysql_fetch_assoc($result2)){
	extract($row);
	echo"<table>";
	echo"<form method='post' action='update_system.php' enctype='multipart/form-data'>";
	echo"<tr><th><u>UPDATE SYSTEM</u><br><br></th></tr>";
	echo"<tr><td>System Name</td><td>:</td><td><input name='sys_name' type='text' id='sys_name' value='" .$system. "' /></td></tr>";
	echo"<tr><td>Vendor</td><td>:</td><td><input name='vendor' type='text' id='vendor' value='" .$sys_vendor. "' /></td></tr>";
	echo"<tr><td>Brand system</td><td>:</td><td><input name='brand_system' type='text' id='brand_system' value='" .$sys_brand_name. "' /></td></tr>";
	echo"<tr><td>OS name</td><td>:</td><td><input name='os_name' type='text' id='os_name' value='".$sys_os."' /></td></tr>";
	echo"<tr><td>DB name</td><td>:</td><td><input name='db_name' type='text' id='db_name' value='" .$sys_db. "' /></td></tr>";
	echo"<tr><td>Hard ware</td><td>:</td><td><input name='h_ware' type='text' id='h_ware' value='" .$sys_h_ware. "' /></td></tr>";
	echo"<tr><td>URL</td><td>:</td><td><input name='link' type='text' id='date' value=" .$sys_link. " /></td></tr>";
	
	echo"<tr><td><input type='submit' name='change' id='submit' value='Update' /><br><br></td><td></td>";
	echo"<td><input type='submit' name='cancel' id='cancel' value='Cancel' /><br><br></td></tr>";
	echo" </form>";
	echo"</table>";

}

// Footer
include '../includes/footer.php';
?>
