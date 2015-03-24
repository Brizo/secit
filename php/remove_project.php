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
$proj_name = (isset($_POST['proj_name'])) ? trim($_POST['proj_name']) : '';


//check if submit button has been pressed
if (isset($_POST['remove']) && $_POST['remove'] == 'remove') {
	//check if fields contain data
	if(empty($proj_name)) {
		echo 'Please select Project<br /> <a href="remove_user.php">Back</a>';
	} else {
		// No errors so remove user.
		$query = "DELETE FROM projects WHERE proj_name = '$proj_name'";
		$result = mysql_query($query) or die("Error occured");
		echo "Project successfully removed <br />";

		// Redirect to home page
		if ($user_access_level == "Admin"){
			echo'<a href="main_admin.php" class="selected">Home</a>';
		}else { 
			echo'<a href="main.php" class="selected">Home</a>'; 
		}
	}
  
}

//-----------------------------------FORM-------------------------------

//Get Project information
$query2 = "SELECT * FROM projects";
$result2 = mysql_query($query2)or die ("Error occured");

//display projects
echo"<table>";
echo"<form method='post' action='remove_project.php'>";
echo"<tr><th><u>REMOVE PROJECT</u></th></tr>";
echo"<tr><td>Project</td><td>:</td><td> <select name='proj_name'>";
while ($row = mysql_fetch_assoc($result2)){
  extract($row); 
  echo"<option>$proj_name</option>";
}
echo"</select></td></tr>";
echo'<tr><td><input type="submit" name="remove" id="remove" value="remove" /><br><br> </td></tr>';
echo" </form>";
echo"</table>";

//footer
include '../includes/footer.php';
?>
