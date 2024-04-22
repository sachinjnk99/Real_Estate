<?php 
session_start();
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['login']))
{
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	//$pass= sha1($pass);
	
	if(!empty($email) && !empty($password))
	{
		$sql = "SELECT * FROM user where u_email='$email' && u_password='$password'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		   if($row){
			   
				$_SESSION['u_id']=$row['u_id'];
				$_SESSION['u_email']=$email;
				header("location:index.php");
				
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Email or Password doesnot match!</p> ";
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
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Password" />

                                </div>
                                <p class="text-left text-dark"> <a href="forget.php">Forget Password</a></p>

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



    <?php include("include/footer.html");?>
</body>

</html>