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
            } else{
                $error = "<p class='alert alert-warning'>Email or Password doesnot match!</p> ";
            }
     }else{
         $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
     }
        }}
            
?>

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
    <div class="container pt-5  mt-5 pb-4">
        <div class="row justify-content-center ">
            <div class="col-lg-6 mt-4">
                <div class="card bg-light" style="border-radius: 10px;">
                    <div class="card-body sign">

                        <form method="post" enctype="multipart/form-data">
                            <h4 class="text-center text-dark">Please login to your account</h4>
                            <?php echo $error; ?><?php echo $msg; ?>
                            <hr>                  
                                <div class="form-outline mb-4 pt-4">
                                    <label class="form-label text-dark" for="form2Example11">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" 
                                        placeholder="Email " />

                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label text-dark" for="form2Example22">Password</label>
                                    <input type="password" id="myInput" name="password" class="form-control mb-2"
                                        placeholder="Password" />
                                    <input type="checkbox" onclick="myFunction()">Show Password   

                                </div>
                                <p class="text-right text-dark"> <a href="forget1.php">Forget Password</a></p>

                                <div class="text-center">
                                    <button type="submit" name="login"
                                        class="btn btn-primary btn-lg btn-block ">Login</button>
                                </div>                            
                            <br>
                            <p class="text-center text-dark">Don't have an account? <a href="signup.php">Signup</a> </p>
                            <p class="text-center text-dark"><a href="agency.php">Register as Agency?</a></p>

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