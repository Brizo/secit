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
      <h2>Remote Sites</h2>
       <div class="col_w1024">
           <div class="fp_service_box fp_c1">
	     
 		<?php
		  $result = mysql_query("SELECT site_name, site_ip, site_desc FROM remotesites WHERE site_subnet = '147.110.165.0'");
                  while ($row = mysql_fetch_array($result)) {
			echo "<table>";
			echo "<a href='http://".$row['site_ip']."'><strong><u>".$row['site_name']."</u></strong></a>".$row['site_ip']."<br>";
			echo "<tr><td>Description</td><td>&nbsp:&nbsp</td><td> ".$row['site_desc']."</td></tr>"; 
			echo '</table>';
			echo "<hr >";
		  }
		  
		  echo $row;
                  ?>
	    	   
	  </div>
	
	<article class="cols">
	<p><a href="../php/add_site.php"><i>Add New Site</i></a></p>  
	</article>
	
	<article class="cols">
	<p><a href="../php/remove_site.php"><i>Remove Site</i></a></p>  
	</article>
	 
	</div>
    </div> 
    <div class="cleaner"></div>  
    
<?php include '../includes/footer.php' ?>
