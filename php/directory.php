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
	<h3><u>SEC DIRECTORY</u></h3><br />
	<div style="margin: 10px auto; padding-left: 5px;">
		<table id="directory" class="table span12 table-bordered table-hover">
		<thead>
			<tr>
				<th>PF</th>
				<th>Name</th>
				<th>SURNAME</th>
				<th>Division</th>
				<th>Department</th>
				<th>Location</th>
				<th>Extention</th>
				<th>Cell Number</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = 'SELECT * FROM directory';
			$result = mysql_query($query) or die(mysql_error());
			    
			if (mysql_num_rows($result) == 0) {
			    echo'Currently no contacts in the system<br /><br />';
			}else{
				while ($row = mysql_fetch_array($result)){
				echo "<tr>
					<td>".$row['pf_num']."</td>
					<td>".$row['owner_name']."</td>
					<td>".$row['owner_surname']."</td>
					<td>".$row['division']."</td>
					<td>".$row['department']."</td>
					<td>".$row['location']."</td>
					<td>".$row['ext_1']."</td>
					<td>".$row['mobile_num']."</td></tr>";
				}
			}
			?>
		</tbody>
		<tfoot>
			<tr>
				<th>PF</th>
				<th>Name</th>
				<th>SURNAME</th>
				<th>Division</th>
				<th>Department</th>
				<th>Location</th>
				<th>Extention</th>
				<th>Cell Number</th>
			</tr>
		</tfoot>
	    </table>
	    
	    <script type="text/javascript">
		$(document).ready(function() {
		    $('#directory').dataTable();
		} );
	    </script>
	    
	    
	   <a class="btn btn-primary" href="add_contact.php" role="button">Add New</a>
	</div> <!-- end style div -->  
   

<?php include "../includes/footer.php"; ?>
