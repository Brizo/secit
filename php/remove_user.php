<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

// Store session variable
$user_name = $_SESSION ['user_name'];
$user_access_level = $_SESSION['user_access_level'];

//filter incoming values
$user_first_name = (isset($_POST['user_first_name'])) ? trim($_POST['user_first_name']) : '';

//check if submit button has been pressed
if (isset($_POST['remove']) && $_POST['remove'] == 'remove') {
	//check if fields contain data
	if(empty($user_first_name)) {
		echo 'Please select user<br /> <a href="remove_user.php">Back</a>';
	} else {
		// No errors so remove user.
		$query = "DELETE FROM team_info WHERE user_first_name = '$user_first_name'";
		$result = mysql_query($query) or die("Error occured");
		echo "User successfully removed <br />";
		// Redirect to home
		if ($user_access_level == "Admin"){
			echo'<a href="main_admin.php" class="selected">Home</a>';
		}else { 
			echo'<a href="main.php" class="selected">Home</a>'; 
		}
	}
  
}

//----------------------FORM-------------
// Get user's information
$query2 = "SELECT * FROM team_info";
$result2 = mysql_query($query2)or die ("Error occured");

// Display users to delete from
echo"<table>";
echo"<form method='post' action='remove_user.php'>";
echo"<tr><th><u>REMOVE USER</u></th></tr>";
echo"<tr><td>USER</td><td>:</td><td> <select name='user_first_name'>";
while ($row = mysql_fetch_assoc($result2)){
  extract($row); 
  echo"<option>$user_first_name</option>";
}
echo"</select></td></tr>";
echo'<tr><td><input type="submit" name="remove" id="remove" value="remove" /> </td></tr>';
echo" </form>";
echo"</table>";
echo '<br /><br />';
// Footer
include '../includes/footer.php';
?>
