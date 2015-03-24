<?php
  
if(!isset($_SESSION)){ 
	session_start(); 
}

$user_access_level = $_SESSION['user_name']; 

if (isset($_SESSION['user_name'])){
	$user_access_level = $_SESSION['user_name'];
}

include 'includes/connect.php';

if (isset($_POST['submit']) && $_POST['submit'] == 'Login') {
	$user_name = $_POST ['user_name'];
	$user_pass = $_POST ['user_pass'];
	$password = md5($user_pass);

	$query = 'SELECT * FROM team_info WHERE user_name="'.$user_name.'" AND user_pass="'.$password.'"';
	$result = mysql_query ($query);
	
	if ($result){
		$query_num_rows = mysql_num_rows($result);
		if ($query_num_rows==1){
			$row = mysql_fetch_assoc($result);
	   
			$_SESSION['user_name'] = $row['user_name'];
			$_SESSION['pf_num'] = $row['pf_num'];
			$_SESSION['pass_status'] = $row['pass_status'];
			$_SESSION['user_access_level'] = $row['user_access_level'];
			$_SESSION ['user_section'] = $row['user_section'];

			/*if ($row['pass_status'] == 0){
				header('Location: php/change_pass.php');
				$query2 = 'UPDATE team_info SET pass_status = "1" WHERE user_name= "'.$user_name.'"';
				$result2 = mysql_query ($query2);
				exit();
			}*/		 
			header('Location: php/main.php');	
		}
		else {
			echo 'Invalid Username/password combination<br />';
			echo"<a href='index.php'>Back</a>";
			exit;
		}
	}	
} 
?>

<html>
<head><title>LOGIN FORM</title></head>
<body>
<table style="border-color:black; background-image: url(images/LOGO2.jpg); border:thin; margin-top:80px" width="395"  height="100" align="center"   >
	<tr>
		<form name="login" method="post" action="index.php">
		<td>
			<table width="100%" border="0" cellpadding="3" cellspacing="1" >
			<tr>
				<td colspan="3" align="center" style='color:yellow'><strong> Member Login </strong></td>
			</tr>
    
			<tr>
				<td width="78"><b>Username</b></td><td width="6"><b>:</b></td>
				<td width="294"><input name="user_name" type="text" id="user_name" /></td>
				
			</tr>
    
			<tr>
				<td><b>Password</b></td><td><b>:</b></td>
				<td><input name="user_pass" type="password" id="user_pass" /></td>
				
			</tr>

			<tr>
				<td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="submit" id="submit" value="Login" style='color:green';/></td>
			</tr>
			</table>
		</td>
		</form>
	</tr>
</table>

</body>
</html>
