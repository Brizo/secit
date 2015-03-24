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

?>
    <div id="part_2">
       <h3>SUBNETS</h3>
       <div class="col_w1024">
           <div class="fp_service_box fp_c1">
	     
 		<?php
 		 		   
		  $result = mysql_query("SELECT subnet_id, subnet_desc FROM subnets");
		  
		  while ($row = mysql_fetch_array($result)) {
                        
                        if ($row['subnet_id'] === "147.110.165.0") :
 		  		$link = "../php/all_manzini.php";
 		  	elseif ($row['subnet_id'] === "147.110.166.0") :
 		  		$link = "../php/all_matata.php";
 		  	elseif ($row['subnet_id'] === "147.110.184.0") :
 		  		$link = "../php/all_ncc.php";
 		  	elseif ($row['subnet_id'] === "147.110.188.0") :
 		  		$link = "../php/all_core.php";
 		  	elseif ($row['subnet_id'] === "147.110.189.0") :
 		  		$link = "../php/all_shilupig.php";
 		  	elseif ($row['subnet_id'] === "147.110.191.0") :
 		  		$link = "../php/all_revenues.php";
 		  	elseif ($row['subnet_id'] === "147.110.192.0") :
 		  		$link = "../php/all_hq.php";					
 		  	endif; 
                                   	
			echo "<table>";
			echo "<a href='$link'><strong><u>".$row['subnet_id']."</u></strong>&nbsp&nbsp".$row['subnet_desc']."</a>";
			echo '</table>';
			echo "<hr >";			
		  }
               ?>
			    	   
	  </div>
	</div>
	<?php if ($user_access_level == "root"){
				echo'<a href="main_admin.php" class="selected">Back</a>';
			}else { 
				echo'<a href="main.php" class="selected">Back</a>'; 
			} ?>
    </div> 
    <div class="cleaner"></div>  
    
<?php include '../includes/footer.php' ?>
