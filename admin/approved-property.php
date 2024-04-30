<?php
include('config.php');

$id = $_REQUEST['pid']; 

// Step 1: Construct the UPDATE query
$sql = "UPDATE property1 SET p_status = 'Approved' WHERE pid='$id'";

// Step 2: Execute the query
if ($con->query($sql) === TRUE) {
    // Step 3: Fetch property details from the database
    $query = mysqli_query($con, "SELECT property1.*, user.u_name, user.u_type, user.uimage FROM `property1`,`user` WHERE property1.uid = user.u_id AND pid = '$id'");
    
    // Step 4: Fetch property details and send email
    while($row = mysqli_fetch_array($query)) {
        // Email message
        $to = $row['email'];
        $subject = "Property Approved Successfully";
        $message = "
        <html>
        <head>
        <title>Property Approved Successfully</title>
        </head>
        <body>
        <p>Dear " . $row['u_name'] . ",</p>
        <p>We are pleased to inform you that your property has been approved successfully.</p>
        <p><b>Property Details:</b></p>
        <p><b>Property Type: " . $row['4'] . "</b></p>
        <p><b>Price: " . $row['21'] . " " . $row['22'] . "</b></p>
        <p><b>Property Address: " . $row['19'] . "</b></p>
        <p><b>Description: " . $row['3'] . "</b></p>
        <p>Thank you for choosing our service. If you have any questions or need further assistance, please feel free to contact us.</p>
        <p>Best regards,<br>Real Estate Management Team</p>
        </body>
        </html>
        ";
        
        // Additional headers
        $headers = "From: Real Estate Management System <noreply@example.com>\r\n";
        $headers .= "Reply-To: Real Estate Support <support@example.com>\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        // Send email
        $check = mail($to, $subject, $message, $headers);
        
        if($check) {
            echo "Record updated successfully and email sent.";
            header('location: property.php');
        } else {
            echo "Record updated successfully, but email could not be sent.";
        }
    }
} else {
    echo "Error updating record: " . $con->error;
}

// Close connection
$con->close();
?>
