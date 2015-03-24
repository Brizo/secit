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

if (isset($_POST['submit']) && $_POST['submit'] == 'Upload'){
	
		$name = $_FILES['document']['name'];
		$temp_name = $_FILES['document']['tmp_name'];
		$location = "../resources/Tutorials/".$name;
		$moveresult = move_uploaded_file($temp_name, $location);

		if (empty($name)){
			echo "Please select document<br>";
			echo '<a href="add_tutorial.php">Back</a>';
			
		}
		
		
		//Load file onto folder
		if($moveresult == true){
		
			echo "Tutorial Uploaded<br>";

			// Redirect to home
			if ($user_access_level == "root"){
				echo'<a href="main_admin.php" class="selected">Home</a>';
			}else { 
				echo'<a href="main.php" class="selected">Home</a>'; 
			}
		}
}

//----------------------------------form-----------------------------------


	echo"<table>";
	echo'<form method="post" action="add_tutorial.php" enctype="multipart/form-data">';
	echo"<tr><th><u>ADD TUTORIAL</u><br><br></th></tr>";
	echo "<tr><td>Tutorial</td><td>:</td><td><input name='document' type='file' id='document' /></td></tr>";
	echo"<tr><td><input type='submit' name='submit' id='submit' value='Upload' /><br><br></td></tr>";
	echo" </form>";
	echo"</table>";



// Footer
include '../includes/footer.php';
?>
