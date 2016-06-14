<?php

$room_no=$_POST['room_no'];
$room_rent=$_POST['room_rent'];
$room_type=$_POST['room_type'];

// Create connection
$conn = new mysqli("localhost", "root", "abhay", "Stay_here");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="INSERT INTO rooms Values('$room_no','$room_rent','$room_type') order by room_no";
echo'
<html>
<head>
	<title>Room details</title>
			<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>PRATAP</title>
		<meta name="description" content="Creative Link Effects: Subtle and modern effects for links or menu items" />
		<meta name="keywords" content="link effect, css transition, style, inspiration, css3, menu item, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	
</head>
<body>
	<div class="container">
<header>
				<h1>WELCOME: <i>ADMIN</i></h1>
				
</header>
<section style="padding: 0px"class="color-1">
				<nav class="cl-effect-4">
					<a href="myprofile.php" data-hover="CLICK HERE"><span>HOME</span></a>
					<a href="logout.php" data-hover="CLICK "><span>LOGOUT</span></a>
					
					
				</nav>
			</section>';

if ($conn->query($sql) === TRUE) {
    echo "room added";
    
    }
else {
    echo "error";
}
$conn->close();

?>
