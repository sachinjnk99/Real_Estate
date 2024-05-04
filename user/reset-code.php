
<?php require_once "pass.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Login</title>
    <style>
        body {
            background-image: url("https://trbahadurpur.com/wp-content/uploads/2021/01/background-5.jpg");
        }
    </style>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="font/css/all.css">
</head>

<body>
<?php include("include/header.php");?>
    <div class="container pb-5 pt-5 mt-5 mb-5">s
        <div class="row justify-content-center ">
            <div class="col-lg-4 mt-4">
                <div class="card bg-light" style="border-radius: 10px;">
                    <div class="card-body sign">

                    <form action="" method="POST" autocomplete="">
                    <h3 class="text-center text-secondary mb-4">Enter OTP</h3>
                            <?php
                            if(isset($errors) && count($errors) > 0){
                                echo "<div class='alert alert-danger'>";
                                    foreach($errors as $error){
                                        echo "<p>" . $error . "</p>";
                                            }
                                            echo "</div>";
                                }

                                ?>
                            <hr>
                           
                            <div class="form-outline mb-4 pt-4">
                                <label class="form-label text-dark" for="form2Example11">OTP Code</label>
                                <input type="text" id="otp" name="otp" class="form-control"
                                    placeholder="Enter OTP Code here" required />
                            </div>

                            <div class="text-center">
                                <button type="submit" name="check-reset-otp"
                                    class="btn btn-primary btn-lg btn-block ">Verify OTP</button>
                            </div>
             
                            <p class="text-dark text-center mt-3">For login? <a href="login.php">Click Here</p></a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("include/footer.html");?>
</body>

</html>