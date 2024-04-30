
<?php

if(isset($_POST['add'])) {
    // Sanitize and validate email address
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email address';
        exit; // Stop execution if email is invalid
    }

    $check=mail("$email", "Testing Email done", "Hello world sachin don", "From:Real Estate");
    if($check){
        echo "email sent";
    }else{
        echo "eamil not send";
    }}
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<div class="form-outline mb-4 pt-4">
    <label class="form-label text-dark" for="form2Example11">Email</label>
    <input type="text" id="email" name="email" class="form-control" 
        placeholder="Enter Your Registered Email" />
</div>
<div class="text-center">
    <button type="submit" name="add" class="btn btn-primary btn-lg btn-block ">Reset Password</button>
</div>
</form>
</body>
</html>
