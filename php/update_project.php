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

if (isset($_POST['proj_name']) && isset($_POST['owner']) && isset($_POST['stage']) && isset($_POST['date'])){

	$proj_name = trim($_POST['proj_name']) ;
	$owner= trim($_POST['owner']);
	$stage =  trim($_POST['stage']);
	$date = trim($_POST['date']);
	//$desc = trim($_POST['desc']);



	// update data in mysql database
	$query="UPDATE projects SET proj_name='$proj_name',proj_owner_pf='$owner', proj_stage ='$stage', proj_date='$date' WHERE proj_name='$project'";
	$result=mysql_query($query)or die ("Unsuccessful update");
	echo "Update successful<br>";

	// Redirect to home
	if ($user_access_level == "root"){
		echo'<a href="main_admin.php" class="selected">Home</a>';
	}else { 
		echo'<a href="main.php" class="selected">Home</a>'; 
	}

} 
//--------------------------------------------FORM----------------------------------------

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
	echo"<form method='post' action='update_project.php' enctype='multipart/form-data'>";
	echo"<tr><th><u>UPDATE PROJECT</u><br><br></th></tr>";
	echo"<tr><td>Project Name</td><td>:</td><td><input name='proj_name' type='text' id='proj_name' value=" .$project. " /></td>     </tr>";
	echo"<tr><td>Project Owner</td><td>:</td><td><input name='owner' type='text' id='owner' value=".$proj_owner_pf ." /></td></tr>";
	echo"<tr><td>Project Stage</td><td>:</td><td><input name='stage' type='text' id='stage' value=" .$proj_stage. " /></td></tr>";
	echo"<tr><td>Finish Date</td><td>:</td><td><input name='date' type='text' id='date' value=" .$proj_date. " /></td></tr>";
	
	echo"<tr><td><input type='submit' name='change' id='submit' value='Update' /><br><br></td><td></td>";
	echo"<td><input type='submit' name='cancel' id='cancel' value='Cancel' /><br><br></td></tr>";
	echo" </form>";
	echo"</table>";

}

// Footer
include '../includes/footer.php';
?>
