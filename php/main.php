<?php   
//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

//store session variables
$user_name = $_SESSION ['user_name'];
$user_status = $_SESSION ['pass_status'];
$user_access_level = $_SESSION['user_access_level'];

//include navigation 2
if ($user_access_level == 'root'){
	require('navigation2_r.php');	
}elseif ($user_access_level == 'Admin'){
	require('navigation2_a.php');
}

?>
<div id="part_2">
	<div class="col_fw">
		<div class="col_w461 float_l">
			<h2>SEC IT</h2>
			<p><em>SEC-IT </em>exist to support the company perform it major mandate of generating, transmission and distribution of electricty throught the country. This is achieved 				throught the following ways</p>
			<ul class="tmo_list">
				<li>Keeping company data safe</li>
				<li>Providing upto standard computers and maintaining them</li>
				<li>Intergrating sec community (networking) and supporting users</li>
				<li>Developing and maintaining systems that help perform the campany's processes</li>
			</ul>
			<div class="cleaner h20"></div>  
                </div>

		<div class="col_w460 float_r">

			<h2>SYSTEMS MANAGER</h2>
			<?php
				$result = mysql_query("SELECT a.sys_name, b.os_name, c.dbms_name, a.sys_h_ware, a.sys_link FROM systems a
											left join operating_systems b on a.sys_os = b.os_id
											left join dbms c on a.sys_db = c.dbms_id");
				$num_rows = mysql_num_rows($result);
				if ($num_rows == 0){
					echo "There are currently no Systems here";
				}
				$count =0;
				while (($row = mysql_fetch_array($result)) && ($count < 2)){
					echo'<div class="col_w460">';
					echo'<div class="fp_service_box fp_c1">';
					echo'<table>';
					echo'<img src="../images/1_64x64.png" alt="Image 1" />';
					echo "<tr><th><strong><u>".$row['sys_name']."</u></strong></th></tr>";
					echo"<tr><td>OS</td><td>&nbsp:&nbsp</td><td> ".$row['os_name']."</td></tr>"; 
					echo "<tr><td>Database</td><td>&nbsp:&nbsp</td><td> ".$row['dbms_name']."</td></tr>"; 
					echo"<tr><td>Hardware</td><td>&nbsp:&nbsp</td><td> ".$row['sys_h_ware']."</td></tr>";
					echo"<tr><td>IP</td><td>&nbsp:&nbsp</td><td> ".$row['sys_link']."</td></tr>";
					echo "<tr><td><a href='system_doc.php?id=".$row['sys_name']."'> View Documents</a></td><td>&nbsp</td>";
					echo "<td><a href='add_system_doc.php?id=".$row['sys_name']."'> Add a Document</a></td><td>&nbsp&nbsp&nbsp</td><td>";
	
					if ($user_access_level){
						echo "<em><a href='update_system.php?id=".$row['sys_name']."'>UPDATE</a></em>";
					}
				
					echo "</td></tr>";
					echo'</table>';			
					echo'</div>';	
					echo'</div>';
					$count++;
				}
				$_SESSION['system_count']= $count;
				$_SESSION['num_rows_sys']= $num_rows;
			
			?>	

		</div>
		<div class="cleaner h20"></div>
		<a href="all_systems.php" class="more float_r"> </a>
	</div>
        <div class="col_fw_last">
        	<h2>CURRENT PROJECTS</h2>
	    
                <?php
			$result = mysql_query("SELECT * FROM projects");
			$num_rows = mysql_num_rows($result);
			if ($num_rows == 0){
				echo "There are currently no projects";
			}
			$count2 =0;
			while (($row = mysql_fetch_array($result)) && ($count2 < 3)){
				if ($count % 3 == 0){
				echo '<div class="col_allw300 fp_lp col_rm">';
				} else{
				   echo '<div class="col_allw300 fp_lp">';
				} 
				echo '<table>';
				echo "<strong><u>".$row['proj_name']."</u></strong><br>";
				$proj_owner = $row['proj_owner_pf'];
				$query_result = mysql_query("SELECT * FROM team_info WHERE pf_num = '$proj_owner'");
				$row2 = mysql_fetch_array($query_result);
				echo "<tr><td>Owner</td><td>&nbsp:&nbsp</td><td> ".$row2['user_first_name']."&nbsp".$row2['user_last_name']."</td></tr>";
				echo "<tr><td>Stage</td><td>&nbsp:&nbsp</td><td>".$row['proj_stage']."</td></tr>"; 
				echo "<tr><td>Finish Date</td><td>&nbsp:&nbsp</td><td> ".$row['proj_date']."</td></tr>";
				echo "<tr><td><a href='project_doc.php?id=".$row['proj_name']."'> Documents </td><td>&nbsp</td>";
				echo "<td><a href='add_project_doc.php?id=".$row['proj_name']."'> Add a Document</a></td><td>&nbsp</td></tr><tr>";
	    
				//Allow owner to update project
				if ($row ['owner'] == $user_name){
					echo "<tr><td><em><a href='update_project.php?id=".$row['proj_name']."'>UPDATE</a></em></td></tr>";			
				}
				echo '</table>';
				echo '</div>';
				$count2++;
			}
			$_SESSION['proj_count']= $count2;
			$_SESSION['num_rows_proj']= $num_rows;  
		?> 
			
		<div class="cleaner h20"></div>
		<a href="all_projects.php" class="more float_r"></a>
            
        </div>
</div>        

<?php include '../includes/footer.php'; ?>
