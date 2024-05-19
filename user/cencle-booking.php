<?php
include('config.php');

$id = mysqli_real_escape_string($con, $_REQUEST['b_id']); 
$pid = mysqli_real_escape_string($con, $_REQUEST['pid']);
$uid = mysqli_real_escape_string($con, $_REQUEST['uid']);

// Step 1: Construct the UPDATE query
$sql = "UPDATE bookappo SET b_status = 'Canceled' WHERE b_id='$id'";

// Step 2: Execute the query
if ($con->query($sql) === TRUE) {
    // Step 3: Fetch appointment details from the database
    $query = mysqli_query($con, "SELECT * FROM bookappo WHERE b_id='$id'");
    
    // Step 4: Fetch appointment details and send email
    $row = mysqli_fetch_array($query);
    if ($row) {
         // Step 2: Send the cancellation email
    $to = $row['email'];
    $subject = "Cancellation of Appointment";
    $message = "
    <html>
    <head>
    <title>Appointment Cancelled</title>
    </head>
    <body>
    <p>Dear " .$row['name'] . ",</p>
    <p><b>I hope this message finds you well.</b></p>
    <p>I am writing to inform you that, due to unforeseen circumstances, I must cancel our scheduled appointment on " . $row['date'] . " at " . $row['time'] . ". I apologize for any inconvenience this may cause.</p>
    <p>If it is convenient for you, I would like to reschedule the appointment to a later date. Please let me know your availability so we can arrange a new time that works for both of us.</p>
    <p>Thank you for your understanding. If you have any questions or need further assistance, please do not hesitate to contact me.</p>
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



