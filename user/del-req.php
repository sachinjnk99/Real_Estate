<?php
include("config.php");
$uid = $_GET['uid'];
$bid = $_GET['R_id'];
$sql = "DELETE FROM requestform WHERE uid = '$uid' And R_id='$bid'";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>user Deleted</p>";
	header("Location:request-info.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>User Not Deleted</p>";
	header("Location:request-info.php?msg=$msg");
}
mysqli_close($con);
?>