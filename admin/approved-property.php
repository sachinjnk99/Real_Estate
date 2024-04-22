<?php
include('config.php');
$id=$_REQUEST['pid']; 
// Step 2: Construct the UPDATE query
$sql = "UPDATE property1 SET p_status = 'Approved' WHERE pid='$id'";

// Step 3: Execute the query
if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: property.php");
} else {
    echo "Error updating record: " . $con->error;
}

// Close connection
$con->close();
?>