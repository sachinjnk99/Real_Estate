<?php 
include("config.php");
$error = "";
$msg = "";

if(isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    if(!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message)) {
        
        $sql = "INSERT INTO contact (name, email, phone, subject, message) VALUES ('$name', '$email', '$phone', '$subject', '$message')";
        $result = mysqli_query($con, $sql);
        
        if($result) {
            $msg = "<p class='alert alert-success'>Message Sent Successfully</p>";
        } else {
            $error = "<p class='alert alert-warning'>Message Not Sent Successfully</p>";
        }
    } else {
        $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
    }

    // Email subject
    $subject = "Response to Your Inquiry";

    // Email message
    $message = "
    <html>
    <head>
    <title>Response to Your Inquiry</title>
    </head>
    <body>
    <p>Dear <b>$name</b>,</p>
    <p>Thank you for reaching out to us!</p>
    <p>We appreciate you taking the time to contact our support team.</p>
    <p>We have received your inquiry and will get back to you as soon as possible.</p>
    <p>Our team is dedicated to providing you with the assistance you need, and we aim to address your concerns promptly.</p>
    <p>Thank you for choosing Real Estate Management System. We look forward to resolving your inquiry and ensuring your continued satisfaction with our services.</p>
    <p>Best regards,<br>Real Estate Management Team</p>
    <p>Kathmandu</p>
    </body>
    </html>
    ";

    // Additional headers
    $headers = "From: Real Estate <noreply@example.com>\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    $check = mail($email, $subject, $message, $headers);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="font/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <title>Contact </title>

    <style>
    .bg{
    background-color: rgb(69, 7, 239);
border-radius: 10px;

}
    </style>
</head>

<body>
            <?php include("include/header.php");?>
            <div class="full-row">
                <div class="container pt-5 ">
                    <h2 class=" text-center text-secondary text-uppercase mt-5 mb-4 pt-4"><b>Contact</b></h2>
                    <div class="row">
                        <!-- Swap positions of contact details and "Get In Touch" form -->
                        <div class="col-md-12 col-lg-7">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 class="text-secondary  text-center mb-5">Get In Touch</h2>
                                        <?php echo $msg; ?>
                                        <?php echo $error; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="w-100" action="#" method="post">
                                            <div class="row">
                                                <div class="row mb-4">
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Your Name" required>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" name="email" class="form-control"
                                                            placeholder="Email Address" required>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" name="phone" class="form-control"
                                                            placeholder="Phone" maxlength="10" required>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" name="subject" class="form-control"
                                                            placeholder="Subject" required>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <textarea name="message" class="form-control" rows="5"
                                                                placeholder="Type Comments..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center">
                                                    <button type="submit" value="send message" name="send"
                                                        class="btn btn-success btn-sm">Send Message</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>

                        <div class="col-lg-4 mb-5 bg">
                            <div class="contact-info ">
                                <h3 class="mb-4 mt-4 text-white">Contacts</h3>

                                <ul>
                                    <li class="d-flex mb-4"> <i
                                            class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i>
                                        <div class="contact-address">
                                            <h5 class="text-white">Address</h5>
                                            <span class="text-white">Bagmati Provience</span> <br>
                                            <span class="text-white">Kathmandu, Koteshwor-32</span>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-4"> <i
                                            class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i>
                                        <div class="contact-address">
                                            <h5 class="text-white">Call Us</h5>
                                            <span class="d-table text-white">+977-9816826674</span>
                                            <span class="text-white">+977-9829925063 </span>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-4"> <i
                                            class="fas fa-envelope text-white mr-2 font-13 mt-1"></i>
                                        <div class="contact-address">
                                            <h5 class="text-white">Email Adderss</h5>
                                            <span class="d-table text-white">realestate@gmail.com</span>
                                            <span class="d-table text-white">help@gmail.com</span>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Map -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.293204191859!2d85.34144531505557!3d27.688757882805723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb187f38dfe603%3A0x635fe43f256ec7a4!2sKoteshwor%2C%20Kathmandu%2044600%2C%20Nepal!5e0!3m2!1sen!2snp!4v1658603691252!5m2!1sen!2snp"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <!-- Map -->

            <?php include("include/footer.html");?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

</body>

</html>