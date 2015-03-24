<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$section = $_SESSION['user_section'];
  
?>
    <div id="part_2">
      <h3>PRINTERS</h3>
       <div class="col_w460">
           <div class="fp_service_box fp_c1">
	     
 		<?php
		  $result = mysql_query("SELECT print_name, print_ip, print_desc FROM prints");
                  while ($row = mysql_fetch_array($result)) {
			echo "<table>";
			echo "<a href='http://".$row['print_ip']."'><strong><u>".$row['print_name']."</u></strong></a>".$row['print_ip']."<br>";
			echo "<tr><td>Description</td><td>&nbsp:&nbsp</td><td> ".$row['print_desc']."</td></tr>"; 
			echo '</table>';
			echo "<hr >";
		  }
		?>
	    	   
	  </div>
	
	
	<?php
		if ($section == "Network"){
			echo '<article class="cols">
			<p><a href="../php/add_printer.php"><i>Add New Printer</i></a></p>  
			</article>
			
			<article class="cols">
			<p><a href="../php/remove_printer.php"><i>Remove Printer</i></a></p>  
			</article>';
		}
	?>
	
	 
	</div>
    </div> 
    <div class="cleaner"></div>  
    
<?php include '../includes/footer.php' ?>
