<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$user_name = $_SESSION['user_name'];
$user_access_level = $_SESSION['user_access_level'];

// Collect form information
$user_old_pass = (isset($_POST['user_old_pass'])) ? trim($_POST['user_old_pass']) : '';
$user_new_pass = (isset($_POST['user_new_pass'])) ? trim($_POST['user_new_pass']) : '';
$user_conf_pass = (isset($_POST['user_conf_pass'])) ? trim($_POST['user_conf_pass']) : '';

// Check if form button was pressed
if (isset($_POST['change']) && $_POST['change'] == 'change'){
	// check if form fields are all field
	
	if(empty($user_old_pass) || empty($user_new_pass) || empty($user_conf_pass)){
		echo "Fill all fields <br />"; 
		echo '<a href="change_pass.php"> Back </a>';
		exit();
	} else {
		// get user information
		$query = "SELECT * FROM team_info WHERE user_name ='$user_name'";
		$result = mysql_query($query)or die (mysql_error());

		$user_old_pass = md5($user_old_pass);
		$user_new_pass = md5($user_new_pass);
		$user_conf_pass = md5($user_conf_pass);

		while ($row = mysql_fetch_assoc($result)){
			extract($row);
			$user_current_pass = $user_pass;
		}
           
		if ($user_old_pass != $user_current_pass) {
			echo "Wrong old password<br />"; 
			echo '<a href="change_pass.php">Back</a>';
			exit();
			
		} else if ($user_new_pass != $user_conf_pass){
			echo "New passwords do not match<br />"; 
			echo '<a href="change_pass.php"> Back </a>';
			exit();
			
		} else {
            $query = "UPDATE team_info SET user_pass='$user_conf_pass' WHERE user_name='$user_name'";
			$result = mysql_query($query)or die ("Error occured");
			echo "Password successfuly changed ";
				 
			if ($user_access_level == "Admin"){
				echo'<a href="main_admin.php" class="selected">Home</a>';
			}else { 
				echo'<a href="main.php" class="selected">Home</a>'; 
			}
		}
	}
}
?>

<table>
	<form action="change_pass.php" method="post" name="change password">
		<tr><th><u>CHANGE PASSWORD</u></th></tr>
		<tr><td>Old Passoword</td><td>:</td><td><input type="password" name="user_old_pass" /></td></tr>
		<tr><td>New Password</td><td>:</td><td><input type="password" name="user_new_pass" /></td></tr>
		<tr><td>Confirm New Password</td><td>:</td><td><input type="password" name="user_conf_pass"  /></td></tr>
		<tr><td><input type="submit" name="change" value="change" id="change" /></td><td>&nbsp</td><td>&nbsp<br><br></td></tr>
	</form>
</table>

<?php include '../includes/footer.php'; ?>
