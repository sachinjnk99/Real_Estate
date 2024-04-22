<?php
include("config.php");
$pid = $_GET['pid'];
$sql = "DELETE FROM property1 WHERE pid = '$pid'";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Property Deleted</p>";
	header("Location:myproperty1.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Property Not Deleted</p>";
	header("Location:myproperty1.php?msg=$msg");
}
mysqli_close($con);
?>