<?php require_once "pass.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>OTP_verify</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="font/css/all.css">

<style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .otp-input {
      width: 40px;
      text-align: center;
      margin: 0 5px;
    }
  </style>
</head>

<body>

    <div class="container pb-4 pt-5 mt-5">
        <div class="row justify-content-center ">
            <div class="col-lg-8 mt-4">
                <div class="card bg-light" style="border-radius: 10px;">
                    <div class="card-body sign">

                    <form action="" method="POST" autocomplete="">
                    <h1 class="text-center mb-4">Enter OTP</h1>
 <!-- PHP code to display errors -->
<?php
// Display errors
if(isset($errors) && count($errors) > 0){
    echo "<div class='alert alert-danger'>";
    foreach($errors as $error){
        echo "<p>" . $error . "</p>";
    }
    echo "</div>";
}
?>
                    <div class="form-outline mb-4 pt-4">
                                    <label class="form-label text-dark" for="form2Example11">Email</label>
                                    <input type="text" id="otp" name="otp" class="form-control" 
                                        placeholder="Enter OTP Code here"  required/>

                                </div>

                                <div class="text-center">
                                    <button type="submit" name="check-reset-otp" class="btn btn-primary btn-lg btn-block ">Verify OTP</button>
                                </div>
                        

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

   
</body>
</html>