<?php
//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$user_access_level = $_SESSION['user_access_level'];

//filter incoming values
$sys_name = (isset($_POST['sys_name'])) ? trim($_POST['sys_name']) : '';

//check if submit button has been pressed
if (isset($_POST['remove']) && $_POST['remove'] == 'remove') {
	//check if fields contain data
	if(empty($sys_name)) {
		echo 'Please select system<br /> <a href="remove_system.php">Back</a>';
	}else {
		// No errors so remove user.
		$query = "DELETE FROM systems WHERE sys_name = '$sys_name'";
		$result = mysql_query($query) or die("Error occured");
		echo "System successfully removed <br />";
     
		 // Redirect to home page
		if ($user_access_level == "Admin"){
			echo'<a href="main_admin.php" class="selected">Home</a>';
		}else { 
			echo'<a href="main.php" class="selected">Home</a>'; 
		}
	}
  
}

//----------------------------FORM--------------
// Get system information
$query = "SELECT * FROM systems";
$result = mysql_query($query)or die ("Error occured");

// Display system to be removed
echo"<table>";
echo"<form method='post' action='remove_system.php'>";
echo"<tr><th><u>REMOVE SYSTEM</u></th></tr>";
echo"<tr><td>System</td><td>:</td><td> <select name='sys_name'>";
while ($row = mysql_fetch_assoc($result)){
	extract($row); 
	echo"<option>$sys_name</option>";
}
echo"</select></td></tr>";
echo'<tr><td><input type="submit" name="remove" id="remove" value="remove" /> <br><br></td></tr>';
echo" </form>";
echo"</table>";


//footer
include '../includes/footer.php';
?>
