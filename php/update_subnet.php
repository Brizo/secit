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

// Get subnet information
$query = "SELECT * FROM subnets";
$result = mysql_query($query)or die ("Error occured");

echo"<table>";
echo"<form method='post' action='update_subnet.php'>";
echo"<tr><th><u>Update Subnet</u></th></tr>";
echo"<td>Subnet:</td><td> <select name='subnet_id'>";
while ($row = mysql_fetch_assoc($result)){
  extract($row); 
  echo"<option>$subnet_id</option>";
}
echo"</select></td>";

echo "<tr><td>Description</td><td> <input type='text' name='subnet_desc'></td></tr>";
echo'<tr><td><input type="submit" name="update" id="update" value="update" /> </td></tr>';
echo" </form>";
echo"</table>";

  date_default_timezone_set('Africa/Mbabane');

  $subnet_id = (isset($_POST['subnet_id'])) ? trim($_POST['subnet_id']) : '';
  $subnet_desc= (isset($_POST['subnet_desc'])) ? trim($_POST['subnet_desc']) : '';
  
  // update data in mysql database
  $result=1;
  $query="UPDATE subnets SET subnet_desc='$subnet_desc' WHERE subnet_id='$subnet_id'";
  $result=mysql_query($query)or die ("Unsuccessful update");


  echo'<a href="all_subnets.php" class="selected">Back</a>';
include '../includes/footer.php';
?>

