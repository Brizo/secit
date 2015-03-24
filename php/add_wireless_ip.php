<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

if (isset($_POST['cancel'])){
header('Location: wireless_ip.php');
exit();
}

//filter incoming values
$ip_addr = (isset($_POST['ip_addr'])) ? trim($_POST['ip_addr']) : '';
$ip_user_pf = (isset($_POST['ip_user_pf'])) ? trim($_POST['ip_user_pf']) : '';
$ip_user_name = (isset($_POST['ip_user_name'])) ? trim($_POST['ip_user_name']) : '';
$ip_user_department = (isset($_POST['ip_user_department'])) ? trim($_POST['ip_user_department']) : '';
$ip_user_location = (isset($_POST['ip_user_location'])) ? trim($_POST['ip_user_location']) : '';
$ip_pc_name = (isset($_POST['ip_pc_name'])) ? trim($_POST['ip_pc_name']) : '';
$ip_subnet = '10.10.14.0';


//check if submit button has been pressed
if (isset($_POST['add']) && $_POST['add'] == 'Add IP'){
	
	//check if fields contain data
	if(empty($ip_addr) || empty($ip_user_pf) || empty($ip_user_name)|| empty($ip_pc_name)) {
		echo'<span id="error">Please fill all mandatory fields!!</span><br /><br />';
		
	}elseif (!isNumber($ip_user_pf)){
		echo'<span id="error">PF Number should be numeric!!</span><br /><br />';
	}else{

		// check if username already is registered
		$query = 'SELECT ip_addr FROM wireless_ip_addresses WHERE ip_addr = "' .$ip_addr . '"';
		$result = mysql_query($query) or die(mysql_error());
		
		if (mysql_num_rows($result) > 0) {
			echo'<span id="error">IP ' .$ip_addr.' is already registered!!</span><br /><br />';
		}
	
		else{
			if ($ip_user_department == '-select-' && $ip_user_location == '-select-') {
				
				$query2 = 'INSERT INTO wireless_ip_addresses(ip_addr, ip_user_pf, ip_user_name, ip_user_department, ip_user_location, ip_pc_name, ip_subnet)
				VALUES
				("' . mysql_real_escape_string($ip_addr).'",
				"' . mysql_real_escape_string($ip_user_pf).'", 
				"' . mysql_real_escape_string($ip_user_name).'",
				null,
				null,
				"' . mysql_real_escape_string($ip_pc_name).'", 
				"' . mysql_real_escape_string($ip_subnet).'")';
			
			}elseif($ip_user_department == '-select-'){
				
				$query2 = 'INSERT INTO wireless_ip_addresses(ip_addr, ip_user_pf, ip_user_name, ip_user_department, ip_user_location, ip_pc_name, ip_subnet)
				VALUES
				("' . mysql_real_escape_string($ip_addr).'",
				"' . mysql_real_escape_string($ip_user_pf).'", 
				"' . mysql_real_escape_string($ip_user_name).'",
				null,
				"' . mysql_real_escape_string($ip_user_location).'",
				"' . mysql_real_escape_string($ip_pc_name).'", 
				"' . mysql_real_escape_string($ip_subnet).'")';
				
			} elseif($ip_user_location == '-select-'){
				
				$query2 = 'INSERT INTO wireless_ip_addresses(ip_addr, ip_user_pf, ip_user_name, ip_user_department, ip_user_location, ip_pc_name, ip_subnet)
				VALUES
				("' . mysql_real_escape_string($ip_addr).'",
				"' . mysql_real_escape_string($ip_user_pf).'", 
				"' . mysql_real_escape_string($ip_user_name).'",
				"' . mysql_real_escape_string($ip_user_department).'",
				null,
				"' . mysql_real_escape_string($ip_pc_name).'", 
				"' . mysql_real_escape_string($ip_subnet).'")';
			}else{
				// No errors so enter the information into the database.
				$query2 = 'INSERT INTO wireless_ip_addresses(ip_addr, ip_user_pf, ip_user_name, ip_user_department, ip_user_location, ip_pc_name, ip_subnet)
				VALUES
				("' . mysql_real_escape_string($ip_addr).'",
				"' . mysql_real_escape_string($ip_user_pf).'", 
				"' . mysql_real_escape_string($ip_user_name).'",
				"' . mysql_real_escape_string($ip_user_department).'",
				"' . mysql_real_escape_string($ip_user_location).'",
				"' . mysql_real_escape_string($ip_pc_name).'", 
				"' . mysql_real_escape_string($ip_subnet).'")';
			}
		 
			$result2 = mysql_query($query2) or die(mysql_error());
		   
		  
			echo 'IP '.$ip_addr.' successfully added <br><br>';
			$ip_addr = '';
			$ip_user_pf = '';
			$ip_user_name = '';
			$ip_user_department = '';
			$ip_user_location = '';
			$ip_pc_name = '';
			$ip_subnet = '';				
		}
	}
}
?>

<h3><u>ADD WIRELESS IP INFORMATION</u></h3>

<form action="add_wireless_ip.php" method="POST">
<table>
	<tr>
		<td>IP Adress&nbsp <span id="mandatory">*</span></td>
		<td> <input type="text" name='ip_addr' id='ip_addr' value="<?php
										if (empty($ip_addr)){
											echo '10.10.14.';
										}else {
										echo $ip_addr;}?>"></td>
	</tr>

	<tr>
		<td>User's Pf&nbsp <span id="mandatory">*</span></td>
		<td><input type="text" name='ip_user_pf' id='ip_user_pf' value="<?php echo $ip_user_pf; ?>"></td>
	</tr>
	<tr>
		<td>User's Name&nbsp <span id="mandatory">*</span></td>
		<td><input type="text" name='ip_user_name' id='ip_user_name' value="<?php echo $ip_user_name; ?>"></td>
	</tr>	
	
	<tr>
		<td>Users's Department&nbsp</td>
		<td> <select name="ip_user_department" id="ip_user_department" value="<?php echo $ip_user_department; ?>">
		<option <?php if ($ip_user_department == "-select-"){echo "selected";} ?> value="-select-">-select-</option>
		<?php 
			// get work types
			$query = "SELECT * FROM sec_departments";				 
			$result = mysql_query($query) or die ("query failed");;									
			while ($row = mysql_fetch_array($result)){
				// print opening option tag
				echo PHP_EOL.'<option ';
				
				// print selected
				if ($ip_user_department == $row['dept_id'])
					echo "selected";
					
				// print closing option tag
				echo ' value="'.$row['dept_id'].'">'.$row['dept_name'].'</option>';
			}
		?>
		</select></td>
		<br>
		</td>
	</tr>
	
	<tr>
		<td>User's Location&nbsp</td>
		<td> <select name="ip_user_location" id="ip_user_location" value="<?php echo $ip_user_location; ?>">
		<option <?php if ($ip_user_location == "-select-"){echo "selected";} ?> value="-select-">-select-</option>
		<?php 
			// get department
			$query = "SELECT * FROM sec_locations";				 
			$result = mysql_query($query) or die ("query failed");;									
			while ($row = mysql_fetch_array($result)){
				// print opening option tag
				echo PHP_EOL.'<option ';
				
				// print selected
				if ($ip_user_location == $row['location_id'])
					echo "selected";
					
				// print closing option tag
				echo ' value="'.$row['location_id'].'">'.$row['location_name'].'</option>';
			}
				
		?>
		</select></td>
	</tr>

	<tr>
		<td>Computer Name&nbsp <span id="mandatory">*</span></td>
		<td><input type="text" name='ip_pc_name' id='ip_pc_name' value="<?php echo $ip_pc_name; ?>"><br><br></td>
	</tr>
	
	
	<tr>
		<td><input type="submit" name="add" value="Add IP" /></td>
		<td><input type="submit" name="cancel" value="Cancel" /><br><br></td>
	</tr>
</table>
</form>	

<div class="cleaner"></div>

<?php include '../includes/footer.php'; ?>
