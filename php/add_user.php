<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

//filter incoming values
$pf_num = (isset($_POST['pf_num'])) ? trim($_POST['pf_num']) : '';
$user_name = "sec".$pf_num;
$user_pass = md5("secret12E");
$user_first_name = (isset($_POST['user_first_name'])) ? trim($_POST['user_first_name']) : '';
$user_middle_name = (isset($_POST['user_middle_name'])) ? trim($_POST['user_middle_name']) : '';
$user_last_name = (isset($_POST['user_last_name'])) ? trim($_POST['user_last_name']) : '';
$user_gender = (isset($_POST['user_gender'])) ? trim($_POST['user_gender']) : '';
$user_job_title = (isset($_POST['user_job_title'])) ? trim($_POST['user_job_title']) : '';
$user_work_phone = (isset($_POST['user_work_phone'])) ? trim($_POST['user_work_phone']) : '';
$user_cell_number = (isset($_POST['user_cell_number'])) ? trim($_POST['user_cell_number']) : '';
$user_email = (isset($_POST['user_email'])) ? trim($_POST['user_email']) : '';
$user_access_level = 'Admin';
$pass_status = "0";
$user_section = (isset($_POST['user_section'])) ? trim($_POST['user_section']) : '';


//check if submit button has been pressed
if (isset($_POST['submit']) && $_POST['submit'] == 'create'){
	//check if fields contain data
	if(empty($pf_num) || empty($user_first_name) || empty($user_last_name)|| empty($user_middle_name)|| empty($user_last_name) || empty($user_gender) || empty($user_job_title)|| empty($user_work_phone) || empty($user_cell_number) || empty($user_email)) {
		echo'<span id="error">Please fill all fields!!</span><br /><br />';

	} elseif (!isnumber($user_work_phone) or !isnumber($user_cell_number)){
		echo "Extention or Cell number should be a number<br >";
	}
	else{
	
		// check if username already is registered
		$query = 'SELECT user_name FROM team_info WHERE user_name = "' .$user_name . '"';
		$result = mysql_query($query) or die(mysql_error());
		
		if (mysql_num_rows($result) > 0) {
			echo'Username ' . $user_name . ' is already registered.<br />';
			echo'<span id="error">User ' .$user_name.' is already registered!!</span><br /><br />';
		}else{
			
			if ($user_gender == 'Male'){
				$image="../photos/default-pic_males.jpg";
			}else{
				$image="../photos/default_pic_females.jpg";
			}
			// No errors so enter the information into the database.
			$query2 = 'INSERT INTO team_info
			VALUES
			("' . mysql_real_escape_string($pf_num) . '",
			"' . mysql_real_escape_string($user_name) . '", 
			"' . mysql_real_escape_string($user_pass) . '",
			"' . mysql_real_escape_string($user_first_name) . '",
			"' . mysql_real_escape_string($user_middle_name) . '",
			"' . mysql_real_escape_string($user_last_name) . '", 
			"' . mysql_real_escape_string($user_gender) . '", 
			"' . mysql_real_escape_string($user_job_title) . '",
			"' . mysql_real_escape_string($user_work_phone) . '",
			"' . mysql_real_escape_string($user_cell_number) . '", 
			"' . mysql_real_escape_string($user_email) . '",
			"' . mysql_real_escape_string($user_access_level).'",
			"' . mysql_real_escape_string($pass_status) . '",
			"' . mysql_real_escape_string($image) . '",
			"' . mysql_real_escape_string($user_section).'")';
		 
			$result2 = mysql_query($query2) or die(mysql_error());
		   
		  
			echo 'Creation succeeded<br>';
			$pf_num = '';
			$user_first_name = '';
			$user_middle_name =  '';
			$user_last_name = '';
			$user_gender = '';
			$user_job_title = '';
			$user_work_phone = '';
			$user_cell_number =  '';
			$user_email = '';
			$user_section =  '';				
		}
	}
}
?>

<div style="width:840px;height:400px;" >
	<form action="add_user.php" method="post">
		<h2 align="center"><u>CREATE NEW USER PROFILE</u></h2>
		<div style="width:290px; float:left">
		<table>
			<tr>
				<td>Pf number</td><td>&nbsp;&nbsp;</td> </td><td> <input type="text" name="pf_num" id="pf_num" size="30" value="<?php echo $pf_num ?>"/><br> </td>
			</tr>
			<tr>
				<td>Firstname</td><td>&nbsp;&nbsp;</td><td> <input type="text" name="user_first_name" id="user_first_name" size="30" value="<?php echo $user_first_name; ?>"/><br></td>
			</tr>
			<tr>
				<td>Middlename</td><td>&nbsp;&nbsp;</td><td> <input type="text" name="user_middle_name" id="user_middle_name" size="30" value="<?php echo $user_middle_name; ?>"/><br></td>
			</tr>
			<tr>
				<td>Lastname</td><td>&nbsp;&nbsp;</td><td> <input type="text" name="user_last_name" id="user_last_name" size="30" value="<?php echo $user_middle_name; ?>"/> <br></td>
			</tr>
			<tr>
				<td>Gender</td><td>&nbsp;&nbsp;</td>
				<td><select name="user_gender" id="user_gender" value="<?php echo $user_gender; ?>">
					<option>-select-</option>
					<option>Male</option>
					<option>Female</option></select><br></td>
			</tr>
			<tr>
				<td> Job title</td><td>&nbsp;&nbsp;</td> 
				<td><select name="user_job_title" id="user_job_title" value="<?php echo $user_job_title; ?>">
					<option >-select-</option>
					<option <?php if ($user_job_title == "IT manager"){ echo "selected" ;}?>>IT manager</option>
					<option>Network and Security engineer</option>
					<option>System application engineer</option>
					<option>System support engineer</option>
					<option>System analyst</option>
					<option>System administrator</option>
					<option>Network administrator</option>
					<option>System Business Operator</option>
					<option>PC technician</option>
					<option>GIT</option>	
					<option>Intern</option>						
				</select></td>
			</tr>
			<tr>
				<td>Extention</td><td>&nbsp;&nbsp;</td> </td><td> <input type="text" name="user_work_phone" id="user_work_phone" size="30" value="<?php echo $user_work_phone; ?>"/> <br></td>
			</tr>
			<tr>
				<td> Cell number</td><td>&nbsp;&nbsp;</td><td> <input type="text" name="user_cell_number" id="user_cell_number" size="30" value="<?php echo $user_cell_number; ?>"/><br></td>
			</tr>
			<tr>
				<td>Email</td><td>&nbsp;&nbsp;</td><td> <input type="text" name="user_email" id="user_email" size="30" value="<?php echo $user_email; ?>"/><br></td>
			</tr>
			<tr>
				<td>Section</td><td>&nbsp;&nbsp;</td><td> <select name="user_section" id="user_section" value="<?php echo $user_section; ?>">
				<option <?php if ($user_section == "-select-"){echo "selected";} ?> value="-select-">-select-</option>
				<?php 
					// get work types
					$query = "SELECT * FROM it_sections";				 
					$result = mysql_query($query) or die ("query failed");;									
					while ($row = mysql_fetch_array($result)){
						// print opening option tag
						echo PHP_EOL.'<option ';
						
						// print selected
						if ($user_section == $row['section_id'])
							echo "selected";
							
						// print closing option tag
						echo ' value="'.$row['section_id'].'">'.$row['section_name'].'</option>';
					}
				?>
				</select><br><br></td>
			</tr>
			
        </table>
        <input type="submit" name="submit" value="create" />
	</div>
    </form>
</div> 

<?php include '../includes/footer.php' ?>
