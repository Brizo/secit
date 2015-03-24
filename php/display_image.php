<?php 

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$image = $_GET['id'];

//echo '<br /><br />';
echo '<div id="part_2">';
   
$handle = opendir(dirname(realpath(__FILE__))."/".$image);
while($file = readdir($handle)){
	if($file !== '.' && $file !== '..'){
    		echo '<img src=" '.$image.'/'.$file.'" border="0" width="150px" height="150px" style="padding:3px; margin: 2 auto"/>';
    	}
}

echo '<br /><a href="gallery.php"><em>BACK</em></a>';
echo '</div>'; 
echo '<div class="cleaner"></div>';
include '../includes/footer.php' ;

?>
