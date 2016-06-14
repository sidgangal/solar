
	<html>
	<head>
	<title>response</title>
<?php
if (isset ($_POST)) {
	$strHeading = "<h1>Hello " . $_POST["username"] . "</h1>";

	echo $_POST["username"];
	echo $_POST["color_1"];
	echo $_POST["color_2"];

}

	?>

	</head>
	<body>

	

	</body>
	</html>