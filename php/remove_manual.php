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

$dir = '../resources/Manuals';
$_SESSION['dir'] = $dir;

echo "<h3>REMOVE MANUAL</h3>";

	echo "<ul class='tmo_list'>";
	if ($handle = opendir($dir)) {   
		while ($file = readdir($handle)) {
	   		if($file !== '.' && $file !== '..'){
	     			echo "<li><a href='remove_manual_proc.php?id=$file'>".$file."</a></li>";
	    		} 
		  } 
	}
	echo "</ul>";


include '../includes/footer.php' ;
?>
