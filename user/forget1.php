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
    <div class="container pb-4 pt-5 mt-5">
        <div class="row justify-content-center ">
            <div class="col-lg-4 mt-4">
                <div class="card bg-light" style="border-radius: 10px;">
                    <div class="card-body sign">

                    <form action="" method="POST" autocomplete="">
                            <h4 class="text-center text-dark ">Reset Your Password</h4>
                            <?php echo $error; ?><?php echo $msg; ?>
                            <hr>
                           
                                <div class="form-outline mb-4 pt-4">
                                    <label class="form-label text-dark" for="form2Example11">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" 
                                        placeholder="Enter Your Registered Email" />

                                </div>

            

                              

                                <div class="text-center">
                                    <button type="submit" name="check-email"
                                        class="btn btn-primary btn-lg btn-block ">Reset Password</button>
                                </div>
                            
                            <br>


                            <p class="text-center text-dark">Don't have an account? <a href="signup.php">Signup</a> </p>
                            <p class="text-dark text-center">Already Regisrter? <a href="login.php">Click Here</p></a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

    <?php include("include/footer.html");?>
</body>

</html>