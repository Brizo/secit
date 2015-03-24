<?php

ob_start();
session_start();


function isimage($image,$type,$size){
	$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG");
	$imagearray = explode(".", $image);
	$extension = end($imagearray);

	if ((($type == "image/gif") || ($type == "image/jpeg")|| ($type == "image/pjpeg")) /*&& ($size < 20000)*/ && in_array($extension, $allowedExts)){
		return true;
	}else {
		return false;
	}
}	


function loggedin(){
  	if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){
    		return true; 
 	} else {
   		return false;
 	}
}

function isnumber($check){
	if (ctype_digit($check)){
		return true;
	}else{
		return false;
	}
	
}

function isdate(){


}/*
$dt=$_POST['dt'];
//$dt="02/28/2007";
$arr=split("/",$dt); // splitting the array
$mm=$arr[0]; // first element of the array is month
$dd=$arr[1]; // second element is date
$yy=$arr[2]; // third element is year
If(!checkdate($mm,$dd,$yy)){
echo "invalid date";
}else {
echo "Entry date is correct";
} */

?>

