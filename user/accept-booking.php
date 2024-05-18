<?php
include('config.php');

$id = mysqli_real_escape_string($con, $_REQUEST['b_id']); 
$pid = mysqli_real_escape_string($con, $_REQUEST['pid']);
$uid = mysqli_real_escape_string($con, $_REQUEST['uid']);

// Step 1: Construct the UPDATE query
$sql = "UPDATE bookappo SET b_status = 'Accepted' WHERE b_id='$id'";

// Step 2: Execute the query
if ($con->query($sql) === TRUE) {
    // Step 3: Fetch appointment details from the database
    $query = mysqli_query($con, "SELECT * FROM bookappo WHERE b_id='$id'");
    
    // Step 4: Fetch appointment details and send email
    $row = mysqli_fetch_array($query);
    if ($row) {
        // Email message
        $to = $row['email'];
        $subject = "Appointment Accepted Successfully";
        $message = "
        <html>
        <head>
        <title>Appointment Accepted Successfully</title>
        </head>
        <body>
        <p>Dear " . $row['name'] . ",</p>
        <p>We are pleased to inform you that your appointment has been Accepted successfully.</p>
        <p><b>Appointment Details:</b></p>
        <p><b>Date: " . $row['date'] . "</b></p>
        <p><b>Time: " . $row['time'] . "</b></p>
        <p><b>Property ID: REMS-" . $row['pid'] . "</b></p>
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
        if (mail($to, $subject, $message, $headers)) {
            header('Location: appo-view.php');
            exit();
        } else {
            echo "Error: Email could not be sent.";
        }
    } else {
        echo "Error: Appointment not found.";
    }
} else {
    echo "Error updating record: " . $con->error;
}

// Close connection
$con->close();
?>
