
<?php
$dbuser = "root";
$dbpass = "";
$host = "localhost:3307";
$db = "user99";
$mysqli = new mysqli($host, $dbuser, $dbpass, $db);
?>

<?php

$con = mysqli_connect("localhost:3307","root","","user99");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>