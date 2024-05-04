<?php
include("config.php");
$uid = $_GET['uid'];
$bid = $_GET['b_id'];
$sql = "DELETE FROM bookappo WHERE uid = '$uid' And b_id='$bid'";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>user Deleted</p>";
	header("Location:appo-view.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>User Not Deleted</p>";
	header("Location:appo-view.php?msg=$msg");
}
mysqli_close($con);
?>