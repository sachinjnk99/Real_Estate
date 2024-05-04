<?php 
include("config.php");
$error="";
$msg="";

// If user clicks the "Check Email" button in the forgot password form

if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM user WHERE u_email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE user SET otp = '$code' WHERE u_email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if($run_query){
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code ";
            $sender = "From: Real Estate";
            
            

            if(mail($email, $subject, $message, $sender)){
                $_SESSION['info'] = "We've sent a password reset OTP to your email - $email";
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Something went wrong!";
        }
    }else{
        $errors['email'] = "This email address does not exist!";
    }
}

// If user clicks the "Check Reset OTP" button
if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM user WHERE otp = '$otp_code'";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['u_email'];
        $_SESSION['u_email'] = $email;
        $_SESSION['info'] = "Please create a new password that you don't use on any other site.";
        header('location: new-password.php');
        exit();
    }else{
        $errors['otp-error'] = "You've entered an incorrect code!";
    }
}

// If user clicks the "Change Password" button
if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $email = $_SESSION['u_email'];
        
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE user SET otp = '0', u_password = '$encpass' WHERE u_email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if($run_query){
            $_SESSION['info'] = "Your password has been changed. Now you can login with your new password.";

            header('Location: login.php');
        }else{
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

// If the "Login Now" button is clicked
if(isset($_POST['login-now'])){
    header('Location: login.php');
}
?>




