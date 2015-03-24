<?php 

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$pf_num = $_SESSION ['pf_num'];

if (isset($_SESSION['referer'])) {
	$referer=$_SESSION['referer'];
}

if (isset($_POST['cancel'])){
header('Location: '.$referer);
exit();
}
//check if all form fields were set and store their values
if (isset($_POST['proj_name']) && (isset($_POST['stage'])) && (isset($_POST['date'])) && (isset($_POST['desc']))) {
	$proj_name=$_POST['proj_name'];
	$owner= $_SESSION ['pf_num'];
	$stage=$_POST['stage'];
	$date=$_POST['date'];
	$desc=$_POST['desc'];
	
	if (!empty($proj_name) && !empty($stage) && !empty($date) && !empty($desc)) {
		
		$location = "../ProjectDocs/".$proj_name."/";
		mkdir($location,0777, true);
	  
		$query = "SELECT `proj_name` FROM `projects` WHERE `proj_name` = '$proj_name'";
		$query_run = mysql_query($query);
		
		/*if (!isdate($date)){
			echo "Not a date<br>";
			echo '<a href="add_project.php">Back</a>';
			exit();
		}*/		 
 
		if (mysql_num_rows($query_run)>=1) {
			echo "The Project Already Exists in the Database<br";
			echo '<a href="add_project.php">Back</a>';
			
		} else {
			$query = "INSERT INTO `projects` (proj_name, proj_owner_pf, proj_stage, proj_date, proj_desc, proj_documents_link)
			VALUES 
			('".mysql_real_escape_string($proj_name)."',
			'".mysql_real_escape_string($owner)."',
			'".mysql_real_escape_string($stage)."',
			'".mysql_real_escape_string($date)."',
			'".mysql_real_escape_string($desc)."',
			'".mysql_real_escape_string($location)."')";
				
			if ($query_run = mysql_query($query)) {
				echo'Project Successfully added <br>';
				echo '<a href="add_project.php">Back</a>';
				exit();
			} else {
				echo 'An Error Occured...<br>';
				echo '<a href="add_project.php">Back</a>';
				exit();
			}
		}
	  
	} else {
		echo "All Fileds ARE Required!!<br>";
		echo '<a href="add_project.php">Back</a>';
		
	}
}
if (!isset($_SESSION['referer'])){
	$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];
}
?>
<h3>ADD PROJECT</h3>

<form action="add_project.php" method="POST">
	<table>
	<tr><td>Project Name&nbsp</td><td> <input type="text" name='proj_name' ></td></tr>
	<tr><td>Stage</td><td> <input type="text" name='stage'></td></tr>
	<tr><td>Finish Date(yyyy-mm-dd)</td><td> <input type="text" name='date' ></td></tr>
	<tr><td>Description</td><td> <textarea cols="40" rows="5" name='desc' ></textarea><br><br></td></tr>
	<tr><td><input type="submit" name ="add" value="Add Project" /></td><td><input type="submit" name="cancel" value="Cancel" /><br><br></td></tr>	
</table>
</form>

<div class="cleaner"></div>

<?php include '../includes/footer.php'; ?>
