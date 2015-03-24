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
if (isset($_POST['ip_addr'])&&(isset($_POST['ip_user_pf']))&&(isset($_POST['ip_user_name']))&&(isset($_POST['ip_user_department']))&&(isset($_POST['ip_user_location']))&&(isset($_POST['ip_pc_name']))){
	$ip_addr=$_POST['ip_addr'];
	$ip_user_pf =$_POST['ip_user_pf'];
	$ip_user_name=$_POST['ip_user_name'];
	$ip_user_department=$_POST['ip_user_department'];
	$ip_user_location=$_POST['ip_user_location'];
	$ip_pc_name=$_POST['ip_pc_name'];
	
	// update data in mysql database
	$query="UPDATE wireless_ip_addresses SET ip_addr='$ip_addr',
					ip_user_pf = '$ip_user_pf', 
					ip_user_name = '$ip_user_name', 
					ip_user_department='$ip_user_department', 
					ip_user_location ='$ip_user_location', 
					ip_pc_name='$ip_pc_name'
					 
	WHERE ip_addr='$ip_addr'";

	$result=mysql_query($query);
	if ($result){
		echo "Update successful<br>";	
	}else{
		echo "Something went wrong";
	}
	
	// go back
	echo'<a href="wireless_ip.php" class="selected">Back</a>';
	
	
} 
//--------------------------------------------FORM----------------------------------------

//create session and store wireless ip address name
$_SESSION['ip_addr'] = $_GET['id'];
$ip_addr = $_SESSION['ip_addr'];
$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

// Get wireless ip information
$result2 = mysql_query("SELECT a.ip_addr, a.ip_user_pf, a.ip_user_name, b.dept_name, c.location_name, a.ip_pc_name  FROM wireless_ip_addresses a
						left join sec_departments b on a.ip_user_department = b.dept_id
						left join sec_locations c on a.ip_user_location = c.location_id
						WHERE ip_addr='$ip_addr'");

// Display ip information 
while ($row = mysql_fetch_assoc($result2)){
	extract($row);
	echo"<table>";
	echo"<form method='post' action='update_wireless_ip.php'>";
	echo"<tr><th><u>UPDATE WIRELESS IP</u><br><br></th></tr>";
	echo"<tr><td>IP Address</td><td>:</td><td><input name='ip_addr' type='text' id='ip_addr' value='" .$ip_addr. "' /></td></tr>";
	echo"<tr><td>User's Pf</td><td>:</td><td><input name='ip_user_pf' type='text' id='ip_user_pf' value='" .$ip_user_pf. "' /></td></tr>";
	echo"<tr><td>User's Name</td><td>:</td><td><input name='ip_user_name' type='text' id='ip_user_name' value='" .$ip_user_name. "' /></td></tr>";
	echo"<tr><td>User's Department</td><td>:</td><td><input name='ip_user_department' type='text' id='ip_user_department' value='".$dept_name."' /></td></tr>";
	echo"<tr><td>User's Location</td><td>:</td><td><input name='ip_user_location' type='text' id='ip_user_location' value='" .$location_name. "' /></td></tr>";
	echo"<tr><td>Computer Name</td><td>:</td><td><input name='ip_pc_name' type='text' id='ip_pc_name' value='" .$ip_pc_name. "' /><br><br></td></tr>";
	echo"<tr><td><input type='submit' name='change' id='submit' value='Update' /><br><br></td><td></td>";
	echo"<td><input type='submit' name='cancel' id='cancel' value='Cancel' /><br><br></td></tr>";
	echo" </form>";
	echo"</table>";

}

// Footer
include '../includes/footer.php';
?>
