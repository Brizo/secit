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
  	<img src="../images/it_structure1.jpg" width="960px" />
  </div>
  <div class="cleaner"></div>

<?php include '../includes/footer.php' ?>
