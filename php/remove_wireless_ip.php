<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$ip_addr = $_GET['id'];

$query = 'SELECT * FROM wireless_ip_addresses WHERE ip_addr = "'.$ip_addr .'"';
$result = mysql_query($query) or die('Query failed');

if($result){
	while ($row = mysql_fetch_array($result)){
		$ip_addr = $row['ip_addr'];
		$ip_user_name = $row['ip_user_name'];
		$ip_pc_name = $row['ip_pc_name'];
	}
}else{
	echo 'Something went wrong';
}


//confirm deletion
echo '<h3>The IP will be permanently removed! continue if sure! </h3>';

echo '<ul>
<li>IP Address :<b> '.$ip_addr.'</b></li>
<li>Owner :<b> '.$ip_user_name.'</b></li>
<li>Computer Name : <b> '.$ip_pc_name.'</b></li>
</ul>';
echo '<br />';

echo '<form method="post" action="realip_delete.php">
	<input type = "hidden" name="ip_addr" value='.$ip_addr.' />
	<input type = "submit" name="realdelete" value="Delete" />
	<input type = "submit" name="cancel" value="Cancel" /> <br><br>
</form>';


include '../includes/footer.php';
?>
