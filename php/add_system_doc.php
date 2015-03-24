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

if (isset($_POST['sys_name'])){

	$sys_name=$_POST['sys_name'];
	

	$name = $_FILES['document']['name'];
	$temp_name = $_FILES['document']['tmp_name'];

	if (empty($name)){
		echo "Please select document<br>";
		echo '<a href="add_system_doc.php">Back</a>';
	  	
	}else {
		// get selected system's information in order to find the link of that project's documents
		$result1 = mysql_query("SELECT * FROM systems WHERE sys_name= '$system'");
		$row1 = mysql_fetch_array($result1);
		
		$location = $row1['sys_documents_link']; //link
		
		//Load file onto folder
		if(move_uploaded_file($temp_name, $location.$name)){
		
			echo "Document Uploaded<br>";

			// Redirect to previous page
			echo "<a href= '$referer' class='selected'>Back</a>"; 
			
		}
	}
}

//----------------------------------form-----------------------------------
//create session and store project name
$_SESSION['system'] = $_GET['id'];
$system = $_SESSION['system'];
$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

// Get system information
$result2 = mysql_query("SELECT *  FROM systems WHERE sys_name='$system'");

// Display system information 
while ($row = mysql_fetch_assoc($result2)){
	extract($row);
	echo"<table>";
	echo"<form method='post' action='add_system_doc.php' enctype='multipart/form-data'>";
	echo"<tr><th><u>ADD SYSTEM DOCUMENT</u><br><br></th></tr>";
	echo"<tr><td>System Name</td><td>:</td><td><input name='sys_name' type='text' id='sys_name' value='" .$system. "' /></td>     </tr>";
	echo "<tr><td>Document</td><td>:</td><td><input name='document' type='file' id='document' /><br><br></td></tr>";
	echo"<tr><td><input type='submit' name='add_doc' id='add_doc' value='Add' /><br><br></td><td></td>";
	echo"<td><input type='submit' name='cancel' id='cancel' value='Cancel' /><br><br></td></tr>";
	echo" </form>";
	echo"</table>";

}

// Footer
include '../includes/footer.php';
?>
