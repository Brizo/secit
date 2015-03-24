<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

if (isset($_POST['cancel'])){
header('Location: directory.php');
exit();
}

//filter incoming values
$pf_num = (isset($_POST['pf_num'])) ? trim($_POST['pf_num']) : '';
$owner_name = (isset($_POST['owner_name'])) ? trim($_POST['owner_name']) : '';
$owner_surname = (isset($_POST['owner_surname'])) ? trim($_POST['owner_surname']) : '';
$department = (isset($_POST['department'])) ? trim($_POST['department']) : '';
$division = (isset($_POST['division'])) ? trim($_POST['division']) : '';
$location = (isset($_POST['location'])) ? trim($_POST['location']) : '';
$ext_1 = (isset($_POST['ext_1'])) ? trim($_POST['ext_1']) : '';
$ext_2 = (isset($_POST['ext_2'])) ? trim($_POST['ext_2']) : '';
$ext_3 = (isset($_POST['ext_3'])) ? trim($_POST['ext_3']) : '';
$mobile_num = (isset($_POST['mobile_num'])) ? trim($_POST['mobile_num']) : '';

//check if submit button has been pressed
if (isset($_POST['add']) && $_POST['add'] == 'Add Contact'){
	
	//check if fields contain data
	if(empty($pf_num) || empty($owner_name) || empty($owner_surname)|| empty($ext_1)) {
		echo'<span id="error">Please fill all mandatory fields!!</span><br /><br />';
		
	}elseif (!isNumber($pf_num)){
		echo'<span id="error">PF Number should be numeric!!</span><br /><br />';
	}else{

		// check if contact already is registered
		$query = 'SELECT pf_num FROM directory WHERE pf_num = "' .$pf_num . '"';
		$result = mysql_query($query) or die(mysql_error());
		
		if (mysql_num_rows($result) > 0) {
			echo'<span id="error">Contact with pf ' .$pf_num.' is already registered!!</span><br /><br />';
		}
		else{				
			$query2 = 'INSERT INTO directory
			VALUES
			("' . mysql_real_escape_string($pf_num).'",
			"' . mysql_real_escape_string($owner_name).'",
			"' . mysql_real_escape_string($owner_surname).'",
			"' . mysql_real_escape_string($division).'",
			"' . mysql_real_escape_string($department).'", 
			"' . mysql_real_escape_string($location).'",
			"' . mysql_real_escape_string($ext_1).'",
			"' . mysql_real_escape_string($ext_2).'",
			"' . mysql_real_escape_string($ext_3).'", 
			"' . mysql_real_escape_string($mobile_num).'")';
					 
			$result2 = mysql_query($query2) or die(mysql_error());
		  
			echo 'Contact '.$pf_num.' successfully added <br><br>';
			$pf_num = '';
			$owner_name = '';
			$owner_surname = '';
			$department = '';
			$division = '';
			$location = '';
			$ext_1 = '';
			$ext_2 = '';
			$ext_3 = '';
			$mobile_num = '';
		}
	}
}
?>

<h3><u>ADD NEW CONTACT </u></h3>

<form action="add_contact.php" method="POST">
<table>
	<tr>
		<td>Pf Number&nbsp <span id="mandatory">*</span></td>
		<td> <input type="text" name='pf_num' id='pf_num' ></td>
	</tr>

	<tr>
		<td>Owner Name&nbsp <span id="mandatory">*</span></td>
		<td><input type="text" name='owner_name' id='owner_name' value="<?php echo $owner_name; ?>"></td>
	</tr>
	<tr>
		<td>Owner Surname&nbsp <span id="mandatory">*</span></td>
		<td><input type="text" name='owner_surname' id='owner_surname' value="<?php echo $ip_user_name; ?>"></td>
	</tr>	
	
	<tr>
		<td>Division&nbsp</td>
		<td> <select name="division" id="ip_user_location" value="<?php echo $division; ?>">
		<option <?php if ($division == "-select-"){echo "selected";} ?> value="-select-">-select-</option>
		<?php 
			// get department
			$query = "SELECT * FROM sec_divisions";				 
			$result = mysql_query($query) or die ("query failed");;									
			while ($row = mysql_fetch_array($result)){
				// print opening option tag
				echo PHP_EOL.'<option ';
				
				// print selected
				if ($division == $row['division_name'])
					echo "selected";
					
				// print closing option tag
				echo ' value="'.$row['division_name'].'">'.$row['division_name'].'</option>';
			}
				
		?>
		</select></td>
	</tr>
	
	<tr>
		<td>User's Department&nbsp</td>
		<td> <select name="department" id="department" value="<?php echo $department; ?>">
		<option <?php if ($department == "-select-"){echo "selected";} ?> value="-select-">-select-</option>
		<?php 
			// get work types
			$query = "SELECT * FROM sec_departments";				 
			$result = mysql_query($query) or die ("query failed");;									
			while ($row = mysql_fetch_array($result)){
				// print opening option tag
				echo PHP_EOL.'<option ';
				
				// print selected
				if ($ip_user_department == $row['dept_name'])
					echo "selected";
					
				// print closing option tag
				echo ' value="'.$row['dept_name'].'">'.$row['dept_name'].'</option>';
			}
		?>
		</select></td>
		<br>
		</td>
	</tr>
	
	
	<tr>
		<td>User's Location&nbsp</td>
		<td> <select name="location" id="location" value="<?php echo $location; ?>">
		<option <?php if ($location == "-select-"){echo "selected";} ?> value="-select-">-select-</option>
		<?php 
			// get department
			$query = "SELECT * FROM sec_locations";				 
			$result = mysql_query($query) or die ("query failed");;									
			while ($row = mysql_fetch_array($result)){
				// print opening option tag
				echo PHP_EOL.'<option ';
				
				// print selected
				if ($ip_user_location == $row['location_name'])
					echo "selected";
					
				// print closing option tag
				echo ' value="'.$row['location_name'].'">'.$row['location_name'].'</option>';
			}
				
		?>
		</select></td>
	</tr>

	<tr>
		<td>Extention one&nbsp <span id="mandatory">*</span></td>
		<td><input type="text" name='ext_1' id='ext_1' value="<?php echo $ext_1; ?>"></td>
	</tr>
	<tr>
		<td>Extention two&nbsp</td>
		<td><input type="text" name='ext_2' id='ext_2' value="<?php echo $ext_2; ?>"></td>
	</tr>
	<tr>
		<td>Extention three&nbsp </td>
		<td><input type="text" name='ext_3' id='ext_3' value="<?php echo $ext_3; ?>"></td>
	</tr>
	<tr>
		<td>Mobile Number&nbsp</td>
		<td><input type="text" name='mobile_num' id='mobile_num' value="<?php echo $mobile_num; ?>"><br><br></td>
	</tr>
	<tr>
		<td><input type="submit" name="add" value="Add Contact" /></td>
		<td><input type="submit" name="cancel" value="Cancel" /><br><br></td>
	</tr>
</table>
</form>	

<div class="cleaner"></div>

<?php include '../includes/footer.php'; ?>
