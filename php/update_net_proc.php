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
$query = "SELECT * FROM computers WHERE pc_subnet='147.110.165.0'";
$result = mysql_query($query)or die ("Error occured");

echo"<table>";
echo"<form method='post' action='update_net.php'>";
echo"<tr><th><u>Update PC Information</u></th></tr>";
echo"<td>Computer IP:</td><td> <select name='pc_ip'>";
while ($row = mysql_fetch_assoc($result)){
  extract($row); 
  echo"<option>$pc_ip</option>";
  $Old=$pc_ip;
}
echo"</select></td>";

//$Old=$pc_ip;
//$Store=mysql_query("SELECT pc_ip FROM computers WHERE pc_ip='$pc_ip'");
echo "$Old";
//echo "$row";


echo "<tr><td>IP Address</td><td> <input type='text' name='pc_ip'></td></tr>";
echo "<tr><td>PC User</td><td> <input type='text' name='pc_user'></td></tr>";
echo "<tr><td>PC Description</td><td> <input type='text' name='pc_desc'></td></tr>";
echo "<tr><td>PC State</td><td> <input type='text' name='pc_state'></td></tr>";
echo "<tr><td>Please Specify Reason for Update:</td><td> <input type='text' name='change_reason'></td></tr>";

echo'<tr><td><input type="submit" name="update" id="update" value="update" /> </td></tr>';
echo" </form>";
echo"</table>";

  date_default_timezone_set('Africa/Mbabane');

  $pc_ip = (isset($_POST['pc_ip'])) ? trim($_POST['pc_ip']) : '';
  $pc_user = (isset($_POST['pc_user'])) ? trim($_POST['pc_user']) : '';
  $pc_desc = (isset($_POST['pc_desc'])) ? trim($_POST['pc_desc']) : '';
  $pc_state= (isset($_POST['pc_state'])) ? trim($_POST['pc_state']) : '';
  $change_reason= (isset($_POST['change_reason'])) ? trim($_POST['change_reason']) : '';

  // update data in mysql database
  $query="UPDATE computers SET pc_ip='$pc_ip', pc_user='$pc_user', pc_desc='$pc_desc', pc_state='$pc_state' WHERE pc_ip='$pc_ip'";
  $result=mysql_query($query)or die ("Unsuccessful update");

  //Update change in Changes table
  
//  $query = "INSERT INTO `changes` VALUES ('','".mysql_real_escape_string($pc_user)."','".mysql_real_escape_string($pc_ip)."','".mysql_real_escape_string($pc_subnet)."','".mysql_real_escape_string($pc_desc)."','".mysql_real_escape_string($pc_state)."')";
  
  echo'<a href="all_manzini.php" class="selected">Back</a>';
  $now = date('m/d/Y h:i:s', time());
  echo $now;
  
  echo"<br>";
  echo date(DATE_RFC2822);
  
  echo "<br>";
 
  echo date("Y-m-d H:i:s");
  
  echo "<br>";
  
  $new=date("l jS \of F Y h:i:s A");
  echo"$new";
  echo "<br>";
  echo "The Old IP: $Old";  
  echo "<br>";
  echo "The New IP: $pc_ip";  


&nbsp;&nbsp

