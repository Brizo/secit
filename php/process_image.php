<?php
//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$user_name =$_SESSION['user_name'];
$name = $_FILES['image']['name'];

$caption = $_POST['caption'];
$temp_name = $_FILES['image']['tmp_name'];


if (empty($name)){
  echo "Please choose a file";
}else {
    $location="../photos/";
    if(move_uploaded_file($temp_name, $location.$name)){
	echo "File uploaded";
    }else {
        echo "File Not Uploaded";
	exit();
    }
 
    $storage = $location.$name;		
    $save=mysql_query("UPDATE photos SET location= '$storage', caption='$caption' WHERE owner='$user_name'");
    header("location: update_profile.php");
    exit();
}
					
?>

