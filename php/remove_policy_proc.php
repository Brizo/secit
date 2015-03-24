<?php
//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$dir=$_SESSION['dir'];

$todelete = $_GET['id'];

$remove = $dir."/".$todelete;

if(unlink($remove)){
	echo "Policy Removed<br>";
	echo "<a href='policies.php'>Back</a><br><br>";
	include '../includes/footer.php';
}else {
	echo "Failed<br>";
	echo "<a href='policies.php'>Back</a><br><br>";
	include '../includes/footer.php';
}

?>
