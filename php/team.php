<?php 

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

//retrive session variables
$username = $_SESSION['user_name'];
$useraccesslevel = $_SESSION['user_access_level'];

//get team information and photos
$query = 'SELECT * FROM team_info';
$result = mysql_query($query) or die("Query failed");
$count=mysql_num_rows($result);

$half = ceil($count / 2);

echo '<article>';

$file="../photos/";

if($count>0){
	echo '<div id="half1" style="display:block; float: left" >';
	echo'<table id="home" >';
	for($i=1; $i <= $half; $i++){
		$row = mysql_fetch_assoc($result);
		extract($row);
		$file="../photos/$image";
		echo '<tr>';
		
		//first td
		
		if ($user_name != 'root'){
			echo '<td align="center"><img src="'.$file.'" border="0" width="150px" height="150px" /></td>';
		
		//second td
		
			echo '<td><strong>'.$user_first_name.'&nbsp'.$user_last_name.'</strong><br>';
			echo "CELL : ".$user_cell_number."<br>";
			echo "EXT : ".$user_work_phone."<br><br>";
			
			if ($useraccesslevel == "root"){
				echo '<form action="update_profile.php" method="post">
					<input type = "hidden" name = "user_name" value ="'.$user_name.'" />
					<input type="submit" name="update" value="update" />
				</form><br>';
				
				echo '<form action="delete_user.php" method="post">
					<input type = "hidden" name = "user_name" value ="'.$user_name.'" />
					<input type="submit" name="delete" value="delete" />
				</form><br>';				
			}
		
			if ($user_name == $username){
				echo '<form action="update_profile.php" method="post">
					<input type = "hidden" name = "user_name" value ="'.$user_name.'" />
					<input type="submit" name="update" value="update" />
				</form>';
			}
		}
		echo "</td></tr>";
		
	}  
	echo '</table>';
	echo '</div>';

        echo '<div id="half2" style="display: block;float: right">';
	$half2 = $count - $half;
	echo'<table id="home" >';
	for($i=$half2 + 1; $i <= $count; $i++){
		$row = mysql_fetch_assoc($result);
		extract($row);
		$file="../photos/$image";
		echo '<tr>';
	 	
		//first td
		if ($user_name != "root"){
			echo '<td align="center"><img src="'.$file.'" border="0" width="150px" height="150px" /></td>';
		
			//second td
			echo '<td><strong>'.$user_first_name.'&nbsp'.$user_last_name.'</strong><br>';
			echo "CELL : ".$user_cell_number."<br>";
			echo "EXT : ".$user_work_phone."<br><br>";
			
			if ($useraccesslevel == "root"){
				echo '<form action="update_profile.php" method="post">
					<input type = "hidden" name = "user_name" value ="'.$user_name.'" />
					<input type="submit" name="update" value="update" />
				</form><br>';
				
				echo '<form action="delete_user.php" method="post">
					<input type = "hidden" name = "user_name" value ="'.$user_name.'" />
					<input type="submit" name="delete" value="delete" />
				</form><br>';
			}
	
			if ($user_name == $username) {
				echo '<form action="update_profile.php" method="post">
					<input type = "hidden" name = "user_name" value ="'.$user_name.'" />
					<input type="submit" name="update" value="update" />
				</form>';
			}
		}
		echo "</td></tr>";
	} 
	echo '</table>';
        echo '</div>';
	
}
else{
	echo"Currently no Employees"; 
}

include '../includes/footer.php';
?>
