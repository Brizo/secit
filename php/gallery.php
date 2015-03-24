<?php 

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}


echo '<div style="height: 8000px"; >';
echo "<p><h3><u>IT PICTURES</u></h3></p>";
echo '<div>';
  
$dir = '../gallery';

echo "<ul class='tmo_list'>";
if ($handle = opendir($dir)) {   
	while ($file = readdir($handle)) {
    		if($file !== '.' && $file !== '..'){
			$image = $dir.'/'.$file;
     			echo "<li><a href='display_image.php?id=".$image."'>".$file."</a>";
    		} 
  	}  
}

echo "</ol>";
echo '</div>';        

include '../includes/footer.php' ;

?>
