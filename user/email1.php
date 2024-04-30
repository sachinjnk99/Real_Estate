<?php



// Email subject
$subject = "Registration Confirmation";

// Email message
$message = "
<html>
<head>
<title>Registration Confirmation</title>
</head>
<body>
<p>Dear user,</p>
<p>Thank you for signing up with Real Estate Management System!</p>
<p>Your registration was successful.</p>
<p>You can now login to your account and start exploring our services.</p>
<p>If you have any questions or need assistance, feel free to contact us.</p>
<p>Best regards,<br>Real Estate Management Team</p>
</body>
</html>
";

// Additional headers
$headers = "From: Your Real Estate Management System <noreply@example.com>\r\n";
$headers .= "Reply-To: Real Estate Support <support@example.com>\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Send email
$check = mail("sachinyadavjnk10@gmail.com", "$subject", "$message", "$headers");

if($check){
    echo "Registration confirmation email sent successfully.";
} else {
    echo "Failed to send registration confirmation email.";
}
?>
