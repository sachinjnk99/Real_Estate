<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['u_email']))
{
	header("location:login.php");
}
////// code
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

    <div class="full-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-secondary double-down-line text-center">Profile</h2>
                </div>
            </div>

            <div class="container p-5 bg-white">
                <form action="#" method="post">
                    <h5 class="text-dark  pb-3 mb-4">Feedback Form</h5>
                    <?php echo $msg; ?>
                    <?php echo $error; ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card " style="border-radius: 10px;">
                                <div class="card-body signup ">
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
                
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12">
                    <?php 
                                $uid=$_SESSION['u_id'];
                                $query=mysqli_query($con,"SELECT * FROM `user` WHERE u_id='$uid'");
                                while($row=mysqli_fetch_array($query))
                                {
                            ?>
                            <img src="/uprofile/pp<?php echo $row['5']; ?>">
                    <div class="user-info mt-md-50"> <img src="/uprofile/pp/ <?php echo $row['5'];?>" alt="userimage">
                        <div class="mb-4 mt-3">
                        </div> 

                        <div class="font-18">
                            <div class="mb-1 text-capitalize"><b>Name:</b>
                                <?php echo $row['1'];?>
                            </div>
                            <div class="mb-1"><b>Email:</b>
                                <?php echo $row['3'];?>
                            </div>
                            <div class="mb-1"><b>Contact:</b>
                                <?php echo $row['2'];?>
                            </div>
                            <div class="mb-1 text-capitalize"><b>Role:</b>
                                <?php echo $row['6'];?>
                            </div>
                        </div>
                        <?php } ?>
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