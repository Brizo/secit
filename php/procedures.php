<?php 

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

echo '<div style="height: 8000px"; >';
echo "<p><h3><u>IT PROCEDURES</u></h3></p>";
echo '<div>';
  
$dir = '../resources/Procedures';

echo "<ul class='tmo_list'>";
if ($handle = opendir($dir)) {   
  while ($file = readdir($handle)) {
    if($file !== '.' && $file !== '..'){
     echo '<li><a href="'.$dir.'/'.$file.'">'.$file.'</a>';
    } 
  }  
}
echo "</ul>";
echo '</div>'; 

echo '<a href="add_procedure.php">Add New</a>&nbsp&nbsp';
echo '<a href="remove_procedure.php">Remove</a>';

include '../includes/footer.php' ;
?>

