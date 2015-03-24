<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

?>
    <div id="part_2">
    <a href="all_subnets_net.php">Back</a>

      <h2>Computers on Record</h2>
       <div class="col_w1024">
           <div class="fp_service_box fp_c1"> 
     		<table cellspacing="20">
 		<?php
		  $result = mysql_query("SELECT pc_user, pc_ip, pc_desc, pc_state FROM computers WHERE pc_subnet = '147.110.188.0'");
		  echo "<table>";
		  echo "<tr>";
		  echo "<td><strong>Computer IP Address &nbsp&nbsp&nbsp</strong></td>";
		  echo "<td><strong>Computer Name/User &nbsp&nbsp&nbsp</strong></td>";
		  echo "<td><strong>Computer Description/Location &nbsp&nbsp&nbsp</strong></td>";
		  echo "<td><strong>Computer State &nbsp&nbsp&nbsp</strong></td>";
		  echo "</tr>";
                  while ($row = mysql_fetch_assoc($result)) {
                  extract($row);
			echo "<tr>";
			echo "<td>".$row['pc_ip']."</a></td>";
			echo "<td>".$row['pc_user']."</td>";
			echo "<td>".$row['pc_desc']."</td>";
			echo "<td>".$row['pc_state']."</td>";
			echo "</tr>";
		  }
		  echo "</table>";
		  
                ?>
	    	</table>   
	  </div>
	
	<article class="cols">
	<p><a href="../php/add_pc.php"><i>Add New PC</i></a></p>  
	</article>
	
	<article class="cols">
	<p><a href="../php/remove_pc.php"><i>Remove PC</i></a></p>  
	</article>
	 
	<article class="cols">
	<p><a href='../php/update_net3.php'><i>Update</i></a></p>  
	</article>	 
	 
	</div>
    </div> 
    
    <div class="cleaner"></div>  
 
<?php include '../includes/footer.php' ?>
