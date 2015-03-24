<?php 

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

if (isset($_POST['cancel'])){
header('Location: all_systems.php');
exit();
}

//check if all form fields were set and store their values 
if (isset($_POST['sys_name'])&&(isset($_POST['vendor']))&&(isset($_POST['brand_system']))&&(isset($_POST['business_processes']))&&(isset($_POST['os_name']))&&(isset($_POST['db_name']))&&(isset($_POST['h_ware']))){
	$sys_name=$_POST['sys_name'];
	$vendor =$_POST['vendor'];
	$brand_system=$_POST['brand_system'];
	$business_processes=$_POST['business_processes'];
	$os_name=$_POST['os_name'];
	$db_name=$_POST['db_name'];
	$h_ware=$_POST['h_ware'];
	$link=$_POST['link'];
	
	
	
	if (!empty($sys_name) && !empty($vendor) && !empty($brand_system) && !empty($os_name) && !empty($db_name) && !empty($h_ware) && !empty($business_processes)){
	  
		$location = "../systemDocs/".$sys_name."/";
		mkdir($location,0777, true);

		$query = "SELECT `sys_name` FROM `systems` WHERE `sys_name` = '$sys_name'";
		$query_run = mysql_query($query);
	  
		if (mysql_num_rows($query_run)>=1) {
			echo "The System Already Exists in the Database<br>";
			echo '<a href="add_system.php">Back</a>';
			
			
		} else{
			$query = "INSERT INTO `systems` (sys_name, sys_vendor, sys_brand_name, sys_business_processes, sys_os, 	sys_db, sys_h_ware, sys_link, sys_documents_link)
							VALUES ('".mysql_real_escape_string($sys_name)."',
								'".mysql_real_escape_string($vendor)."',
								'".mysql_real_escape_string($brand_system)."',
								'".mysql_real_escape_string($business_processes)."',
								'".mysql_real_escape_string($os_name)."',
								'".mysql_real_escape_string($db_name)."',
								'".mysql_real_escape_string($h_ware)."',
								'".mysql_real_escape_string($link)."', 
								'".mysql_real_escape_string($location)."')";
				
			if ($query_run = mysql_query($query)) {
				echo 'System successfully added<br />';
				echo '<a href="add_system.php">Back</a>';
				exit();
				
			} else {
				echo 'An Error Occurred...';
				echo '<a href="add_system.php">Back</a>';
				exit();
			}
		}
			  
	} else {
		echo "All Fields are required!!<br>";
		echo '<a href="add_system.php">Back</a>'; 
	}
}
?>
<h3>ADD SYSTEM</h3>

<form action="add_system.php" method="POST">
<table>
	<tr>
		<td>System Name&nbsp</td>
		<td> <input type="text" name='sys_name' value="<?php echo $sys_name; ?>"></td>
	</tr>
	<tr>
		<td>Vendor&nbsp</td>
		<td> <select name="vendor" id="vendor" value="<?php echo $vendor; ?>">
		<option <?php if ($vendor == "-select-"){echo "selected";} ?> value="-select-">-select-</option>
		<?php 
			// get vendor
			$query = "SELECT * FROM sys_vendors";				 
			$result = mysql_query($query) or die ("query failed");;									
			while ($row = mysql_fetch_array($result)){
				// print opening option tag
				echo PHP_EOL.'<option ';
				
				// print selected
				if ($vendor == $row['vendor_id'])
					echo "selected";
					
				// print closing option tag
				echo ' value="'.$row['vendor_id'].'">'.$row['vendor_name'].'</option>';
			}
		?>
		</select></td>
	</tr>
	<tr>
		<td>Brand System&nbsp</td>
		<td><input type="text" name='brand_system' value="<?php echo $brand_system; ?>"></td>
	</tr>
	<tr>
		<td>Business_processes</td>
		<td> <textarea cols="40" rows="5" name='business_processes' value="<?php echo '$business_processes;' ?>"></textarea><br><br></td>
	</tr>
	<tr>
		<td>OS Name&nbsp</td><td> <select name="os_name" id="os_name" value="<?php echo $os_name; ?>">
		<option <?php if ($os_name == "-select-"){echo "selected";} ?> value="-select-">-select-</option>
		<?php 
			// get os
			$query = "SELECT * FROM operating_systems";				 
			$result = mysql_query($query) or die ("query failed");;									
			while ($row = mysql_fetch_array($result)){
				// print opening option tag
				echo PHP_EOL.'<option ';
				
				// print selected
				if ($os_name == $row['os_id'])
					echo "selected";
					
				// print closing option tag
				echo ' value="'.$row['os_id'].'">'.$row['os_name'].'</option>';
			}
		?>
		</select></td>
	</tr>

	<tr>
		<td>DBMS&nbsp</td>
		<td> <select name="db_name" id="db_name" value="<?php echo $db_name; ?>">
		<option <?php if ($db_name == "-select-"){echo "selected";} ?> value="-select-">-select-</option>
		<?php 
			// get dbms
			$query = "SELECT * FROM dbms";				 
			$result = mysql_query($query) or die ("query failed");;									
			while ($row = mysql_fetch_array($result)){
				// print opening option tag
				echo PHP_EOL.'<option ';
				
				// print selected
				if ($db_name == $row['dbms_id'])
					echo "selected";
					
				// print closing option tag
				echo ' value="'.$row['dbms_id'].'">'.$row['dbms_name'].'</option>';
			}
		?>
		</select></td>
	</tr>

	<tr>
		<td>Hardware&nbsp</td>
		<td><input type="text" name='h_ware' value="<?php echo $h_ware; ?>"></td>
	</tr>
	<tr>
		<td>Link</td>
		<td><input type="text" name='link' echo value="<?php echo $link; ?>"><br><br></td>
	</tr>
	
	<tr>
		<td><input type="submit" name="add" value="Add System" /></td>
		<td><input type="submit" name="cancel" value="Cancel" /><br><br></td>
	</tr>
</table>
</form>	

<div class="cleaner"></div>

<?php include '../includes/footer.php'; ?>
