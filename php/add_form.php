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
		$location = "../resources/Forms/".$name;
		$moveresult = move_uploaded_file($temp_name, $location);

		if (empty($name)){
			echo "Please select document<br>";
			echo '<a href="add_form.php">Back</a>';
			
		}
		
		
		//Load file onto folder
		if($moveresult == true){
		
			echo "Form Uploaded<br>";

			// Redirect to home
			
			echo'<a href="forms.php" class="selected">Back</a>';
			
		}
}

//----------------------------------form-----------------------------------


	echo"<table>";
	echo'<form method="post" action="add_form.php" enctype="multipart/form-data">';
	echo"<tr><th><u>ADD FORM</u><br><br></th></tr>";
	echo "<tr><td>Form</td><td>:</td><td><input name='document' type='file' id='document' /></td></tr>";
	echo"<tr><td><input type='submit' name='submit' id='submit' value='Upload' /><br><br></td></tr>";
	echo" </form>";
	echo"</table>";



// Footer
include '../includes/footer.php';
?>