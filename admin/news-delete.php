<?php
include("config.php");
$uid = $_GET['id'];
$sql = "DELETE FROM news WHERE id = '$uid'";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>user Deleted</p>";
	header("Location:newsdetails.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>User Not Deleted</p>";
	header("Location:newsdetails.php?msg=$msg");
}
mysqli_close($con);
?>