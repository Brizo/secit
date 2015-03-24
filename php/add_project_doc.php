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

if (isset($_SESSION['project'])) {
	$project=$_SESSION['project'];
}

if (isset($_SESSION['referer'])) {
	$referer=$_SESSION['referer'];
}

if (isset($_POST['cancel'])){
header('Location: '.$referer);
exit();
}

if (isset($_POST['proj_name'])){

	$proj_name = trim($_POST['proj_name']) ;
	

	$name = $_FILES['document']['name'];
	$temp_name = $_FILES['document']['tmp_name'];

	if (empty($name)){
		echo "Please choose a file<br>";
		echo '<a href="update_project.php">Back</a>';	  	
	}else {
		// get selected project's information in order to find the link	of that project's documents
		$result1 = mysql_query("SELECT * FROM projects WHERE proj_name= '$project'");
		$row1 = mysql_fetch_array($result1);
		
		$location = $row1['proj_documents_link']; //link
		
		//Load file onto folder
		if(move_uploaded_file($temp_name, $location.$name)){
		
			echo "Document Uploaded<br>";

			// Redirect previous page
			echo "<a href= '$referer' class='selected'>Back</a>";  
			
		}
	}
}

//----------------------------------form-----------------------------------
//create session and store project name
$_SESSION['project'] = $_GET['id'];
$project = $_SESSION['project'];
$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

// Get project information
$result2 = mysql_query("SELECT *  FROM projects WHERE proj_name='$project'");

// Display project information 
while ($row = mysql_fetch_assoc($result2)){
	extract($row);
	echo"<table>";
	echo"<form method='post' action='add_project_doc.php' enctype='multipart/form-data'>";
	echo"<tr><th><u>ADD PROJECT DOCUMENT</u><br><br></th></tr>";
	echo"<tr><td>Project Name</td><td>:</td><td><input name='proj_name' type='text' id='proj_name' value='" .$project. "' /></td>     </tr>";
	echo "<tr><td>Document</td><td>:</td><td><input name='document' type='file' id='document' /><br><br></td></tr>";
	echo"<tr><td><input type='submit' name='change' id='submit' value='Add' /><br><br></td><td></td>";
	echo"<td><input type='submit' name='cancel' id='cancel' value='Cancel' /><br><br></td></tr>";
	echo" </form>";
	echo"</table>";

}

// Footer
include '../includes/footer.php';
?>
