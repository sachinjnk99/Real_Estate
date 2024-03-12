<?php
$dbuser = "root";
$dbpass = "";
$host = "localhost:3307";
$db = "real";
$mysqli = new mysqli($host, $dbuser, $dbpass, $db);
?>

<?php

$con = mysqli_connect("localhost:3307","root","","real");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>