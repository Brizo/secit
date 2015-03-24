<?php
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['user_name'])) 
{
  header('Location: ../index.php');
}

// Include header and connect
include '../includes/header.php';
include '../includes/connect.php';
  echo'<a href="all_subnets_net.php" class="selected">Back</a>';
$user_name = $_SESSION ['user_name'];

// Get subnet information
$query = "SELECT * FROM computers WHERE pc_subnet='147.110.191.0'";
$result = mysql_query($query)or die ("Error occured");

echo"<table>";
echo"<form method='post' action='update_net.php'>";
echo"<tr><th><u>Update Net</u></th></tr>";
echo"<td>Subnet:</td><td> <select name='pc_ip'>";
while ($row = mysql_fetch_assoc($result)){
  extract($row); 
  echo"<option>$pc_ip</option>";
}
echo"</select></td>";

echo "<tr><td>PC User</td><td> <input type='text' name='pc_user'></td></tr>";
echo "<tr><td>PC Description</td><td> <input type='text' name='pc_desc'></td></tr>";
echo "<tr><td>PC State</td><td> <input type='text' name='pc_state'></td></tr>";
echo "<tr><td>Reason:</td><td> <input type='text' name='change_reason'></td></tr>";
echo'<tr><td><input type="submit" name="update" id="update" value="update" /> </td></tr>';
echo" </form>";
echo"</table>";

  date_default_timezone_set('Africa/Mbabane');
  $change_t = date('m/d/Y h:i:s', time());

  $pc_ip = (isset($_POST['pc_ip'])) ? trim($_POST['pc_ip']) : '';
  $pc_user = (isset($_POST['pc_user'])) ? trim($_POST['pc_user']) : ''; 
  $pc_state= (isset($_POST['pc_state'])) ? trim($_POST['pc_state']) : '';   
  $pc_desc= (isset($_POST['pc_desc'])) ? trim($_POST['pc_desc']) : '';
  $change_reason= (isset($_POST['change_reason'])) ? trim($_POST['change_reason']) : '';
  
  // update data in mysql database
  $query="UPDATE computers SET pc_user='$pc_user', pc_desc='$pc_desc', pc_state='$pc_state' WHERE pc_ip='$pc_ip'";
  $result=mysql_query($query)or die ("Unsuccessful update");

  //Update change in Changes table
  
  mysql_query("INSERT INTO `changes` VALUES ('','".mysql_real_escape_string($change_t)."','".mysql_real_escape_string($user_name)."','".mysql_real_escape_string($pc_ip)."','".mysql_real_escape_string($pc_user)."','".mysql_real_escape_string($change_reason)."')");
   
include '../includes/footer.php';
?>

