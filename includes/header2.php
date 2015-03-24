<?php
ob_start();
if(!isset($_SESSION)) { 
        session_start(); 
}
	
$user_access_level = $_SESSION['user_access_level'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEC IT WEB PORTAL</title>
<meta name="keywords" content="IT web portal, CSS, HTML" />
<meta name="description" content="IT web portal is a collection of all the tools used by IT personel to support users" />


<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/ddsmoothmenu.css" />
<script type="text/javascript" src="../js/ddsmoothmenu.js"> </script>

<link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">

<script type="text/javascript" src="../js/atooltip.jquery.js"></script>
<script type="text/javascript" src="../js/kwicks-1.5.1.pack.js"></script>
<script type="text/javascript" src="../js/script.js"></script>

<!-- styles -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="../css/dataTables.bootstrap.css" rel="stylesheet">

	<script src="../js/jquery.dataTables.min.js"></script>
	<script  src="../js/dataTables.bootstrap.js"></script>
	<script  src="../js/bootstrap.min.js"></script>

	    
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
	<![endif]-->


<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

</head>
<body style="background-color: #01df00;">

<div id="templatemo_wrapper">

  <div id="templatemo_header">
     <div id="site_title"><h1></h1></div>
        <div id="templatemo_menu" class="ddsmoothmenu">
           <ul> 
               <li><a href="main.php" class="selected">Home</a></li>
               <li><a href="../php/structure.php">IT Structure</a></li>
               <li><a href="#">Resources</a>
                 <ul>
                    <li><a href="#">Softwares</a></li>
                    <li><a href="../php/policies.php">Policies</a></li>
                    <li><a href="../php/forms.php">Forms</a></li>
                    <li><a href="../php/procedures.php">Procedures</a></li>
		    <li><a href="../php/manuals.php">Manuals</a></li>
                    <li><a href="../php/tutorials.php">Tutorials</a></li>
                 </ul>
              </li>
              <li><a href="../php/team.php">IT Team</a></li>   
              <li><a href="../php/gallery.php">Gallery</a></li>
	      <li><a href="#" ><img src="../images/cred.png"/></a>
				<ul>
					<li><a href="../php/change_pass.php">Change Password</a></li>
					<li><a href="../php/logout.php">Logout</a></li>
				</ul>
			</li>
           </ul>
           <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->

     </div> <!-- end of header -->



