<?php

include("config.php");
$error="";
$msg="";
// If user clicks the "Check Reset OTP" button
if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM user WHERE otp = '$otp_code'";
    $result = mysqli_query($con, $check_code); // Execute the query
    
    if (!$result) {
        die('Error in executing the query: ' . mysqli_error($con));
    }
    
    $row = mysqli_fetch_array($result); 
    if ($row) {
// Email subject
$subject = "Registration Confirmation";
$to = $row['u_email'];
// Email message
$message = "
<html>
<head>
<title>Registration Confirmation</title>
</head>
<body>
<p>Dear <b>" . $row['u_name'] . "</b>,</p>
<p>Thank you for signing up with Real Estate Management System!</p>
<p>Your registration was successful.</p>
<p><b>Your Login Details:</b></p>
<p><b>Name:" . $row['u_name'] . "</b></p>
<p><b>Address: " . $row['u_address'] . "</b></p>
<p><b>Mobile no.: " . $row['u_phoneno'] . "</b></p>
<p><b>Email: " . $row['u_email'] . "</b></p>

<h3 align='center'>

<a href='localhost/final/user/login.php'>

Click Here To Login Your Account

</a>

</h3>


<p>You can now login to your account and start exploring our services.</p>
<p>If you have any questions or need assistance, feel free to contact us.</p>
<p>Best regards,<br>Real Estate Management Team</p>
</body>
</html>
";


// Additional headers
$headers = "From:Real Estate Management System <noreply@example.com>\r\n";
$headers .= "Reply-To: Real Estate Support <support@example.com>\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Send email
$check = mail("$to", "$subject", "$message", "$headers");

header('location: login.php');

        exit();
    }else{
        $errors['otp-error'] = "You've entered an incorrect code!";
    }}

?>