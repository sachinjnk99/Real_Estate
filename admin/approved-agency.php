<?php
include('config.php');
$id=$_REQUEST['u_id']; 
// Step 2: Construct the UPDATE query
$sql = "UPDATE user SET action = 'Approved' WHERE u_id='$id'";

// Step 3: Execute the query
if ($con->query($sql) === TRUE) {
    echo "Agency updated successfully";
    header("Location: agency.php");
} else {
    echo "Error updating record: " . $con->error;
}

// Close connection
$con->close();
?>