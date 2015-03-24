<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$username = $_POST['user_name'];

$query = 'SELECT * FROM team_info WHERE user_name = "'.$username .'"';
$result = mysql_query($query) or die('Query failed');

if($result){
	while ($row = mysql_fetch_array($result)){
		$user_first_name = $row['user_first_name'];
		$user_middle_name = $row['user_middle_name'];
		$user_last_name = $row['user_last_name'];
		$image = $row['image'];		

		$filename = "../photos/$image";
	}
}else{
	echo 'Something went wrong';
}


//confirm deletion
echo '<h3>The user will be permanently removed, continue if sure! </h3>';

echo '<img src = '.$filename.' border="0" width="150px" height="150px"/><br>';
echo '<ul>
<li>User Name :<b> '.$user_first_name.'</b></li>
<li>User Nick Name :<b> '.$user_middle_name.'</b></li>
<li>User Surname : <b> '.$user_last_name.'</b></li>
</ul>';
echo '<br />';

echo '<form method="post" action="realuser_delete.php">
	<input type = "hidden" name="user_name" value='.$username.' />
	<input type = "submit" name="realdelete" value="Delete" />
	<input type = "submit" name="cancel" value="Cancel" /> <br><br>
</form>';


include '../includes/footer.php';
?>
