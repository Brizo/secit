<?php

//add functions and header; and connect to database
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

//store session username
$user_name = $_SESSION ['user_name'];
$user_access_level = $_SESSION['user_access_level'];

$count = $_SESSION['proj_count'];
$num_rows = $_SESSION['num_rows_proj'];
?>
    <div id="part_2">
      <h2>PROJECTS</h2>
       <div class="col_w460_all">
           <div class="fp_service_box fp_c3">
	     
 		<?php
		  // get project info
                  $result = mysql_query("SELECT * FROM projects LIMIT $count, $num_rows");
		  
                  while ($row = mysql_fetch_array($result)) {
			echo "<table>";
			echo "<strong><u>".$row['proj_name']."</u></strong><br>";
			
			//To get the project owner inorder to allow to edit and to extract username and surname of that in the team_info table
			$proj_owner = $row['owner'];
			$project = $row ['proj_name'];

			$query_result = mysql_query("SELECT * FROM team_info WHERE user_name = '$proj_owner'");
			$row2 = mysql_fetch_array($query_result);

			// Display project information
			echo "<tr><td>Owner</td><td>&nbsp:&nbsp</td><td> ".$row2['user_first_name']."&nbsp".$row2['user_last_name']."</td></tr>";
			echo "<tr><td>Stage</td><td>&nbsp:&nbsp</td><td> ".$row['stage']."</td></tr>";
			echo "<tr><td>Finish Date</td><td>&nbsp:&nbsp</td><td> ".$row['date']."</td></tr>";
			echo "<tr><td><a href='project_doc.php?id=".$project."'> Documents </td><td>&nbsp</td>";
			echo "<td><a href='add_project_doc.php?id=".$row['proj_name']."'> Add a Document</a></td><td>&nbsp</td><td>";

			//Allow owner to update project
                        if ($row ['owner'] == $user_name){
			  echo "<td><em><a href='update_project.php?id=".$project."'>UPDATE</a></em></td></tr></a>";			
			}else{
				echo "</tr></a>";
			}
			echo "</table>";
			echo "<hr>";
                  }
                ?>  	
	    	  
	  </div>
	<p><a href="../php/add_project.php"><i>Add new project</i></a></p>   
	</div>
    </div> 
    <div class="cleaner"></div>

<?php include '../includes/footer.php' ?>
