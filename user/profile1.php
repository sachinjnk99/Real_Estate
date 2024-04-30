<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['u_email']))
{
	header("location:login.php");
}

if(isset($_POST['book']))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];

	$uimage=$_FILES['image']['name'];
    $temp_name  =$_FILES['image']['tmp_name'];
    move_uploaded_file($temp_name,"uprofile/pp/$uimage");

	$uid=$_SESSION['u_id'];
	
	if(!empty($name) && !empty($phone) && !empty($address)) // Corrected variable name
	{
		$sql="UPDATE user SET u_name='$name', u_phoneno='$phone', u_email='$email', u_address='$address', uimage='$uimage' WHERE u_id='$uid'"; // Changed $id to $uid
		$result=mysqli_query($con, $sql);
		if($result){
			$msg = "<p class='alert alert-success'>Profile Updated Successfully</p>";
		}
		else{
			$error = "<p class='alert alert-warning'>Profile Update Failed</p>";
		}
	}
	else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}


if(isset($_POST['pass'])) {
    $pold = $_POST['old'];
    $pnew = $_POST['new']; 

    // Check if old and new passwords are not empty
    if(!empty($pold) && !empty($pnew)) {
        $uid = $_SESSION['u_id'];

        // Retrieve the current hashed password from the database
        $sql = "SELECT u_password FROM user WHERE u_id = '$uid'";
        $result = mysqli_query($con, $sql);
        
        if($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['u_password'];

            // Verify the old password
            if(password_verify($pold, $hashed_password)) {
                // Hash the new password
                $encpass = password_hash($pnew, PASSWORD_BCRYPT);

                // Update the password in the database
                $update_sql = "UPDATE user SET u_password='$encpass' WHERE u_id='$uid'";
                $update_result = mysqli_query($con, $update_sql);
                
                if($update_result) {
                    $msg = "<p class='alert alert-success'>Password Updated Successfully</p>";
                } else {
                    $error = "<p class='alert alert-warning'>Password Update Failed</p>";
                }
            } else {
                $error = "<p class='alert alert-warning'>Incorrect Old Password</p>";
            }
        } else {
            $error = "<p class='alert alert-warning'>User not found</p>";
        }
    } else {
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
   
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <?php include("include/header.php");?>

    <div class="full-row">
        <div class="container pt-5 mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-secondary double-down-line text-center">Profile</h2>
                </div>
            </div>

            <div class="container p-5 bg-white">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                        <?php 
                                $uid=$_SESSION['u_id'];
                                $query=mysqli_query($con,"SELECT * FROM `user` WHERE u_id='$uid'");
                                while($row=mysqli_fetch_array($query))
                                {
                            ?>
                            
                            <div class="foto_style img mt-md-50 px-5 mx-5"> <img src="uprofile/pp/<?php echo $row['9'];?>" alt="userimage">
                        <div class="mb-4 mt-3">
                        </div> 

                       
                                </div>
                                <?php } ?>
                    </div>
                          
               
                
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12">
                    <?php 
                                $uid=$_SESSION['u_id'];
                                $query=mysqli_query($con,"SELECT * FROM `user` WHERE u_id='$uid'");
                                while($row=mysqli_fetch_array($query))
                                {
                            ?>
                            
                           

                        <div class="font-18 pr-5 mr-5">
                            <div class="mb-3 text-capitalize"><b>Name:</b>
                                <?php echo $row['1'];?>
                            </div>
                            <div class="mb-3"><b>Email:</b>
                                <?php echo $row['3'];?>
                            </div>
                            <div class="mb-3"><b>Contact:</b>
                                <?php echo $row['2'];?>
                            </div>
                            <div class="mb-3"><b>Address:</b>
                                <?php echo $row['5'];?>
                            </div>
                            <div class="mb-3 text-capitalize"><b>Role:</b>
                                <?php echo $row['10'];?>
                            </div>
                        </div>
<?php
$error="";
$msg="";
?>

<div class="mb-5 text-right">
<button onclick="showForm('form1')" class="btn btn-info btn-lg  text-right me-5">Update Profile</button>
<button onclick="showForm('form2')" class="btn btn-warning btn-lg me-4 text-right me-5">Change Password</button>
  </div>

  

<form id="form1" style="display: none;" method="post" enctype="multipart/form-data">
<h4 class="text-center text-decoration ">Update Profile Details</h4>

<hr class="bg-dark ">
   
    <div class="row mt-3">
                  <div class="col">
                  <label class="text-dark" for="name">Name</label>
                  <input type="text" class="form-control" value="<?php echo $row['1'];?>" aria-label="name"
                    name="name" required>
                </div>
                <div class="col">
                <label class="text-dark" for="email">Email Address</label>
                <input type="text" class="form-control" id="email" value="<?php echo $row['3'];?>" aria-label="email" name="email" pattern=".+@gmail\.com" size="30" required title="Enter valid email(abc@gmail.com)"/>  
                </div>
              </div>

              <div class="row mt-3">
              <div class="col">
              <label class="text-dark" for="contact">Mobile Number</label>
                  <input type="text" class="form-control" id="mobile" value="<?php echo $row['2'];?>" aria-label="mobile" name="phone" required pattern="[0-9]{10}" title="Enter valid 10-digit mobile number">
                </div>

              <div class="col">
              <label class="text-dark" for="contact">Address</label>
                  <input type="text" class="form-control" id="address" value="<?php echo $row['5'];?>" aria-label="address" name="address" required >
                </div>
                </div>

                <div class="col mt-3">
            <label for="formFileLg" class="form-label ">Profile image</label>
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="image">
          </div>

          <div class="text-right mt-3">
                <button type="submit" name="book" class="btn btn-success btn-lg  text-right">Save</button>
                </div>
              
</form>

<form id="form2" style="display: none;" method="post" enctype="multipart/form-data">
    <h4 class="text-center text-decoration ">Change Password</h4>
    <hr class="bg-dark ">
     <div class="row mt-3">
                  <div class="col">
                  <div class="form-outline mb-2">
                    <label class="form-label text-dark" for="form2Example22">Current Password</label>
                    <input type="password" id="password2" name="old" class="form-control mb-2"placeholder="Password" />
                    
                 </div>
              </div>

              <div class="row mt-3">
                  <div class="col">
                  <div class="form-outline mb-2">
                    <label class="form-label text-dark" for="form2Example22">New Password</label>
                    <input type="password" id="password2" name="new" class="form-control mb-2"placeholder="Password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$"  title="Enter atlist 1-capital, 1-character, and number" />
                    <input type="checkbox" id="showPassword">Show Password
                 </div>
              </div>

                <div class="text-left mt-3">
                <button type="submit" name="pass" class="btn btn-success btn-lg  text-center">Save</button>
                </div>

              
</form>



                        <?php } ?>
                    </div>
                </div>
            </div>


</div>
    </div>
    </div>      </div>
            </div>
    <?php include("include/footer.html");?>

    <script>
function showForm(formId) {
    // Hide all forms
    var forms = document.getElementsByTagName('form');
    for (var i = 0; i < forms.length; i++) {
        forms[i].style.display = 'none';
    }

    // Show the selected form
    var formToShow = document.getElementById(formId);
    if (formToShow) {
        formToShow.style.display = 'block';
    }
}
</script>


<script>
  var passwordFields = document.querySelectorAll("input[type='password']");
  var originalTypes = [];

  passwordFields.forEach(function(field) {
    originalTypes.push(field.type);
  });

  document.getElementById("showPassword").addEventListener("change", function() {
    if (this.checked) {
      passwordFields.forEach(function(field) {
        field.type = "text";
      });
    } else {
      passwordFields.forEach(function(field, index) {
        field.type = originalTypes[index];
      });
    }
  });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

</body>

</html>