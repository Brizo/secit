<?php
	require '../includes/connect.php';
	
	$user_name = $_POST['user_name'];
	$option = $_POST['realdelete'];

	if ($option == "Delete"){
		$query = 'SELECT * FROM team_info WHERE user_name = "'.$user_name .'"';
		$result = mysql_query($query) or die('Query failed');
	
		while ($row = mysql_fetch_array($result)) {
			$user_first_name = $row['user_first_name'];
			$user_middle_name = $row['user_middle_name'];
			$user_last_name = $row['user_last_name'];
		
		}

		echo "User <b>".$user_first_name." ".$user_middle_name." ".$user_last_name."</b> has been deleted<br>";

		$sql = "DELETE FROM team_info WHERE user_name = '$user_name'";
		$result = mysql_query($sql) or die ('User deletion failed');
	
		echo '<a href="team.php">BACK</a>';
	}else {
		header ('Location: team.php');
	}
?>
