<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header2.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$user_access_level = $_SESSION['user_access_level'];
?>
	<h3><u>MANAGE WIRELESS IP ADDRESSES</u></h3><br />
	<div style="margin: 10px auto; padding-left: 5px;">
		<table id="wireless_ip" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>IP Address</th>
				<th>User's PF</th>
				<th>User's Name</th>
				<th>Department</th>
				<th>Computer Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = 'SELECT a.ip_addr, a.ip_user_pf, a.ip_user_name, a.ip_pc_name, b.dept_name, c.location_name FROM wireless_ip_addresses a
						    left join sec_departments b on a.ip_user_department = b.dept_id
						    left join sec_locations c on a.ip_user_location = c.location_id order by a.ip_addr asc';
			$result = mysql_query($query) or die(mysql_error());
				    
			if (mysql_num_rows($result) == 0) {
			    echo'Currently no IPs in the system<br /><br />';
			}else{
				while ($row = mysql_fetch_array($result)){
				echo "<tr>
					<td>".$row['ip_addr']."</td>
					<td>".$row['ip_user_pf']."</td>
					<td>".$row['ip_user_name']."</td>
					<td>".$row['dept_name']."/".$row['location_name']."</td>
					<td>".$row['ip_pc_name']."</td>
					<td><a href='update_wireless_ip.php?id=".$row['ip_addr']."'>Update&nbsp&nbsp</a></td>";
					if ($user_access_level == 'root'){
					echo "<td><a href='remove_wireless_ip.php?id=".$row['ip_addr']."'>Remove&nbsp&nbsp</a></td></tr>";
					}else{
					echo "</tr>";
					}
				$no++;
				}
			}
			?>
		</tbody>
		<tfoot>
			<tr>
				<th>IP Address</th>
				<th>User's PF</th>
				<th>User's Name</th>
				<th>Department</th>
				<th>Computer Name</th>
				<th>Action</th>
			</tr>
		</tfoot>
	    </table>
	    
	    <script type="text/javascript">
		$(document).ready(function() {
		    $('#wireless_ip').dataTable();
		} );
	    </script>
	    
	    
	   <a class="btn btn-primary" href="add_wireless_ip.php" role="button">Add New IP</a>
	</div> <!-- end style div -->  
   

<?php include "../includes/footer.php"; ?>
