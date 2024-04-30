<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['u_email']))
{
	header("location:login.php");
}
$error='';
$msg='';
if(isset($_POST['insert']))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];

	$content=$_POST['content'];
	
	$uid=$_SESSION['uid'];
	
	if(!empty($name) && !empty($phone) && !empty($content))
	{
		
		$sql="INSERT INTO feedback (uid, fdescription, status) VALUES ('$uid','$content','0')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Feedback Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Feedback Not Send Successfully</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}								
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <?php include("include/header.php");?>
        
    <div class="container pt-5 mt-5 pb-5">
    <h2 class="text-secondary double-down-line text-center">Profile</h2>
    <div class="row justify-content-right">
      <div class="col-lg-4">
        <div class="card " style="border-radius: 10px;">
          <div class="card-body signup ">
                <form action="#" method="post">
                    <h5 class="text-dark  pb-3 mb-4">Feedback Form</h5>
                    <?php echo $msg; ?>
                    <?php echo $error; ?>
                                    <div class="form-group ">
                                        <label for="user-id">Full Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Full Name">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="phone">Contact Number</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone"
                                            required>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="about-me">Your Feedback</label>
                                        <textarea class="form-control" name="content" rows="7"
                                            placeholder="Enter Text Here...."></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-success mb-4 mt-3" name="insert"
                                        value="Send Feedback">
                                </div>
                            </div>
                        </div>
                </form>
                
                <div class="col-lg-8">
                <div class="row">
                <div class="contact-map box">
                <div id="map" class="contact-map">
                <iframe src="https://www.google.com/maps/place/Koteshwor,+Kathmandu+44600/@27.675661,85.3416057,16.79z/data=!4m6!3m5!1s0x39eb19f2804a02bf:0x85468199859b2d8d!8m2!3d27.6755549!4d85.3459238!16s%2Fm%2F04jn6xk?entry=ttu" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div> 
        </div>
          </div>
        </div>  
        </div>
          </div>
        </div>        
       

    <?php include("include/footer.html");?>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

</body>

</html>










<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
  
require 'vendor/autoload.php';

$mail = new PHPMailer;
 // Message content
 $subject = 'Property Submission Confirmation';
 $bodyContent = 'Dear user,';
 $bodyContent .= 'We are pleased to inform you that your property submission has been successfully received. Your property is now under review by our team. We appreciate your interest in listing your property with us.<br>';
 $bodyContent .= 'Our team will carefully review the details provided and ensure that your property meets our standards. You will receive further communication regarding the status of your property submission within some minutes.<br>';
 $bodyContent .= 'Thank you for choosing our platform for listing your property. Should you have any questions or require further assistance, please feel free to contact us.';
 
 // SMTP configuration
 $mail->isSMTP();
 $mail->Host = 'smtp.gmail.com';
 $mail->SMTPAuth = true;
 $mail->Username = 'yourgmailid@gmail.com'; // Replace with your Gmail username
 $mail->Password = 'Your_Gmail_App_Password'; // Replace with your Gmail app password
 $mail->SMTPSecure = 'tls';
 $mail->Port = 587;
 
 // Sender and recipient
 $mail->setFrom('yourgmailid@gmail.com', 'Your Name');
 $mail->addReplyTo('yourgmailid@gmail.com', 'Your Name');
 $mail->addAddress($toemail);
 
 // Email content
 $mail->isHTML(true);
 $mail->Subject = $subject;
 $mail->Body = $bodyContent;
 
 // Send email
 if(!$mail->send()) {
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
 } else {
     echo 'Message has been sent';
 }
}
?>





<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('vendor/autoload.php');

$mail = new PHPMailer;

if(isset($_POST['add'])) {
    // Sanitize and validate email address
    $toemail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($toemail, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email address';
        exit; // Stop execution if email is invalid
    }
    
    // Message content
    $subject = 'Property Submission Confirmation';
    $bodyContent = 'Dear user,';
    $bodyContent .= 'We are pleased to inform you that your property submission has been successfully received. Your property is now under review by our team. We appreciate your interest in listing your property with us.<br>';
    $bodyContent .= 'Our team will carefully review the details provided and ensure that your property meets our standards. You will receive further communication regarding the status of your property submission within some minutes.<br>';
    $bodyContent .= 'Thank you for choosing our platform for listing your property. Should you have any questions or require further assistance, please feel free to contact us.';
    
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sachinyadavjnk10@gmail.com'; // Replace with your Gmail email address
    $mail->Password = 'gxjyybqcjqlxswpm'; // Replace with your Gmail app password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 465; // Change port to 587
    
    // Sender and recipient
    $mail->setFrom('sachinyadavjnk10@gmail.com', 'Real Estate');
    $mail->addReplyTo('sachinyadavjnk10@gmail.com', 'Real Estate');
    $mail->addAddress($toemail);
    
    // Email content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $bodyContent;
    
    // Send email
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}



<?php 
session_start();
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['login']))
{
    $email = mysqli_real_escape_string($con, $_REQUEST['email']);
    $password = mysqli_real_escape_string($con, $_REQUEST['password']);
    
    if(!empty($email) && !empty($password))
    {
        // Fetch the hashed password from the database based on the email
        $sql = "SELECT u_password FROM user WHERE u_email='$email'";
        $result = mysqli_query($con, $sql);
        
        if($result && mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['u_password'];
            
            if(password_verify($password, $hashed_password))
            {
                // Password is correct, set session variables and redirect to index.php
                $_SESSION['u_email']=$email;
                
                // Fetch the user ID from the database
                $sql_id = "SELECT u_id FROM user WHERE u_email='$email'";
                $result_id = mysqli_query($con, $sql_id);
                
                if($result_id && mysqli_num_rows($result_id) == 1)
                {
                    $row_id = mysqli_fetch_assoc($result_id);
                    $_SESSION['u_id'] = $row_id['u_id'];
                }
                
                header("location: index.php");
                exit();
            }}}}
            
?>