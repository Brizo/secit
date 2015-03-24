<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$user_name=$_SESSION['user_name'];
$user_access_level = $_SESSION['user_access_level'];

$count = $_SESSION['system_count'] - 1;
$num_rows = $_SESSION['num_rows_sys'];
?>

    <div id="part_2">
      <h2>MINOR SYSTEMS</h2>
       <div class="col_w460_all">
           <div class="fp_service_box fp_c3">
             
                <?php

		//fetch link from database
		
		$result = mysql_query("SELECT a.sys_name, b.os_name, c.dbms_name, a.sys_h_ware, a.sys_link FROM systems a
											left join operating_systems b on a.sys_os = b.os_id
											left join dbms c on a.sys_db = c.dbms_id LIMIT $count, $num_rows");  
                //$result = mysql_query("SELECT * from systems LIMIT $count, $num_rows");
		$row = mysql_fetch_array($result);

		  	  
		//display systems' information
                while ($row = mysql_fetch_array($result)) {
			echo "<table>";
			$link = $row['sys-link'];
		  	$system = $row['sys_name'];

			echo "<strong><u>".$row['sys_name']."</u></strong><br>";
			echo "<tr><td>OS</td><td>&nbsp:&nbsp</td><td> ".$row['os_name']."</td></tr>"; 
			echo "<tr><td>Database</td><td>&nbsp:&nbsp</td><td> ".$row['dbms_name']."</td></tr>"; 
			echo "<tr><td>Hardware</td><td>&nbsp:&nbsp</td><td> ".$row['sys_h_ware']."</td></tr>";
			echo "<tr><td>Hardware</td><td>&nbsp:&nbsp</td><td> ".$row['sys_link']."</td></tr>";
			echo "<tr><td><a href='system_doc.php?id=".$row['sys_name']."'> View Documents</a></td><td>&nbsp</td>";
			echo "<td><a href='add_system_doc.php?id=".$row['sys_name']."'> Add a Document</a></td><td>&nbsp&nbsp&nbsp</td><td>";

			if ($user_access_level){
				echo "<em><a href='update_system.php?id=".$system."'>UPDATE</a></em>";
			}
			
			echo "</td></tr>";
			
			echo '<table>';
			echo "<hr >";
		  }
                  ?>                                	
	     </table>
	     </table>
	      </div> <!-- end fp_service_box fp_c3 -->
	      <p><a href="../php/add_system.php"><i>Add new system</i></a></p>
         </div> <!-- end col_w460 -->
      </div> <!-- end part_2 -->
    <div class="cleaner"></div>
<?php include '../includes/footer.php' ?>
