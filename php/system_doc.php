<?php 

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

//store the project documents' directory
$dir = "../systemDocs/".$_GET['id'];

echo '<div style="height: 8000px"; >';
echo "<p><h3><u>".$_GET['id']." Documentation</u></h3></p>";
echo '<div>';

if (count(glob("$dir/*")) === 0){
	echo "No documents!!<br><br>";
	echo '<a href="main.php">Home</a>';
	
}

//display contents of documents' directory
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

include '../includes/footer.php' ;
?>
