<?php
include("config.php");
$uid = $_GET['u_id'];
$sql = "DELETE FROM contact WHERE id = '$uid'";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>user Deleted</p>";
	header("Location:complain.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>User Not Deleted</p>";
	header("Location:complain.php?msg=$msg");
}
mysqli_close($con);
?>