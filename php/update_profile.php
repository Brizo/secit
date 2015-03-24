<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$loggeduser = $_SESSION['user_name'];
$username=$_SESSION['username'];
$user_access_level = $_SESSION['user_access_level'];
 
if (isset($_SESSION['old_img'])){
	$old_img = $_SESSION['old_img'];	
}

if (isset($_POST['user_middle_name']) && isset($_POST['user_work_phone']) && isset($_POST['user_cell_number']) && isset($_POST['user_email'])){

	$option = $_POST['cancel'];
	
	if ($option == "Cancel"){
		header ('Location: team.php');
	}else{
		$user_middle_name = $_POST['user_middle_name'];
		$user_pass = md5($_POST['user_pass']);
		$user_work_phone = $_POST['user_work_phone'];
		$user_cell_number = $_POST['user_cell_number'];
		$user_email = $_POST['user_email'];
		
		$name = $_FILES['image']['name'];
		$temp_name = $_FILES['image']['tmp_name'];
		$type = $_FILES['image']['type'];
		$size = $_FILES['image']['size'];
	 
		
		if (!empty($name)){
			
			if (!isimage($name,$type,$size)){
				echo "The uploaded file is not an image<br>";
				echo "<i>NB:</i>It must be a .jpg, .jpeg, .png, or .gif file<br>";
				header('refresh:3; url= update_profile.php');
				exit();
			}else {
				$location="../photos/";
				
				if(!move_uploaded_file($temp_name, $location.$name)){
					echo "File Not Uploaded<br>";
					echo '<a href="update_profile.php">Back</a>';
					exit();	
				}	
			}
			
			$image = $location.$name;
		}
		
		
		if (empty($name)){
		
			// update data in mysql database
			$query="UPDATE team_info SET user_middle_name='$user_middle_name',
					user_pass = '$user_pass',
					user_work_phone='$user_work_phone',
					user_cell_number ='$user_cell_number',
					user_email='$user_email'
			WHERE user_name='$username'";
			
		} else {
			if ($old_img != "../photos/default-pic_males.jpg" or $old_img != "../photos/default_pic_females.jpg"){
				unlink($old_img);
			}
			// update data in mysql database
			
			$query="UPDATE team_info SET user_middle_name='$user_middle_name',
					user_pass = '$user_pass',
					user_work_phone='$user_work_phone',
					user_cell_number ='$user_cell_number',
					image = '$image',
					user_email='$user_email'
					
			WHERE user_name='$username'";
				
		
		}
	
		if($result=mysql_query($query)){
			echo "Update successful <br>";
			
			// back to team.php
			echo'<a href="team.php" class="selected">Back</a>';
			
		} else {
			echo "Update failed<br>";
			echo '<a href="update_profile.php">Back</a>';
		}
	}   
	    
	
include '../includes/footer.php';
exit();

}
//------------------------------------FORM-------------------


//username to be deleted
$username = $_POST['user_name'];

// Get user information
$query2 = "SELECT * FROM team_info WHERE user_name ='$username'";
$result2 = mysql_query($query2)or die (mysql_error());

$_SESSION['username'] = $username;
// Display user information 
while ($array = mysql_fetch_assoc($result2)){
	echo"<table>";
	echo'<form method="post" action="update_profile.php" enctype="multipart/form-data">';
	echo"<tr><th><u>UPDATE PROFILE</u></th></tr>";
	echo"<tr><td>Middle name</td><td>:</td><td><input name='user_middle_name' type='text' id='user_middle_name' value=" .$array['user_middle_name']. " /></td> </tr>";
	
	if ($loggeduser == "root"){
		echo"<tr><td>Password</td><td>:</td><td><input name='user_pass' type='password' id='user_pass' /></td></tr>";	
	}
	
	echo"<tr><td>Work telephone</td><td>:</td><td><input name='user_work_phone' type='text' id='user_work_phone' value=".$array['user_work_phone']." /></td></tr>";
	echo"<tr><td>Mobile telephone</td><td>:</td><td><input name='user_cell_number' type='text' id='user_cell_number' value=" .$array['user_cell_number']. " /></td></tr>";
	echo"<tr><td>Email Address</td><td>:</td><td><input name='user_email' type='text' id='user_email' value=".$array['user_email']." /></td></tr>";
	echo "<tr><td>Image</td><td>:</td><td><input name='image' type='file' id='image' /><br><br></td></tr>";
	echo"<tr><td><input type='submit' name='submit'  value='Update' /></td><td>&nbsp</td>";
	echo"<td><input type = 'submit' name='cancel' value='Cancel' /></td></tr>";
		
	$_SESSION ['old_img'] = $array['image'];
	 echo"</form>";
	 echo"</table>";
	
}

include '../includes/footer.php';
?>
