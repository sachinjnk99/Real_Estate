<?php
$error="";
$msg="";
session_start();
include('config.php');
//login 
if (isset($_POST['reg'])) {
    //Prevent Posting Blank Values
    //if (empty($_POST["u_phoneno"]) || empty($_POST["u_name"]) || empty($_POST['u_email']) || empty($_POST['u_password'])) {
      //  $err = "Blank Values Not Accepted";
   // } else {
        $u_name = $_POST['u_name'];
        $u_address = $_POST['u_address'];
        $u_phoneno = $_POST['u_mobile'];
        $u_email = $_POST['u_email'];
       $u_password = $_POST['u_password']; //Hash This 
        //$u_password = password_hash($_POST['u_password'], PASSWORD_DEFAULT)
        $u_id = $_POST['u_id'];
        $u_regi = $_POST['u_regi'];
        $u_desc = $_POST['u_desc'];
        $uimage=$_FILES['image']['name'];
        $uimage1=$_FILES['image1']['name'];

        $temp_name  =$_FILES['image']['tmp_name'];
        $temp_name1  =$_FILES['image1']['tmp_name'];
        move_uploaded_file($temp_name,"uprofile/pp/$uimage");
        move_uploaded_file($temp_name1,"uprofile/pp/$uimage");

        //$query = "SELECT * FROM user3 where u_email='$u_email'";
        //$res = $con->query($query);
	    //$res=mysqli($con, $query);
	    //$num=mysqli_num_rows($res);
       
	
	    //if($num == 1)
	    //{
		    //$error = "<p class='alert alert-warning'>Email Id already Exist</p> ";
	    //}
	    //else
	    //{
            //if(!empty($u_name) && !empty($u_email) && !empty($u_phoneno) && !empty($u_password))
		    //{

        // Check if the email already exists
    $checkQuery = "SELECT * FROM user WHERE u_email=?";
    $checkStmt = $mysqli->prepare($checkQuery);
    $checkStmt->bind_param('s', $u_email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        $error = "<p class='alert alert-danger'>Email Id already Exist</p> ";
    } else {


      $sql="insert into user (u_id, u_name, u_phoneno, u_email, u_password, u_address, u_regi, u_desc, document, uimage, u_type, action) values('$u_id', '$u_name', '$u_phoneno', '$u_email','$u_password','$u_address','$u_regi','$u_desc', '$uimage1', '$uimage','agency', 'pending')";
	    $result=mysqli_query($con,$sql);


        //Insert Captured information to a database table
        //$postQuery = "INSERT INTO user (u_id, u_name, u_phoneno, u_email, u_password, uimage, u_type) VALUES(?,?,?,?,?,?,?)";
        //$postStmt = $mysqli->prepare($postQuery);
        //bind paramaters
       // $rc = $postStmt->bind_param('sssss', $u_id, $u_name, $u_phoneno, $u_email, $u_password, $uimage, $u_type);
       // $postStmt->execute();
        //declare a varible which will be passed to alert function
        if ($result) {

             // show pop-up message
        echo '<script>alert("Account created Successfully!");</script>';
        // redirect to login page
        echo '<script>window.location.href = "login.php";</script>';
           // $msg = "<p class='alert alert-success'> Customer Account Created </p>" && header("refresh:1; url=index.php");
        } else {
            $error = "Please Try Again Or Try Later";
        }
    }
}


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <title>Agency_signup</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php include("include/header.php");?>
  <br>
 

  <div class="container pt-5 mt-5 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card " style="border-radius: 10px;">
          <div class="card-body signup ">
            
            <h2 class="card-title text-center mb-4 text-dark"><b>Agency Register</b></h2>
            <?php echo $error; ?><?php echo $msg; ?>

            <hr class="bg-dark">
            <form method="post" enctype="multipart/form-data">
            <div> 
             <input class="form-control" value="<?php echo $u_id;?>" required name="u_id"  type="hidden">
              </div>

              <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="fullname">Official Name</label>
                  <input type="text" class="form-control" placeholder="Enter official name" aria-label="name" name="u_name"
                    required>
                </div>
                <div class="col">
                <label class="text-dark" for="mobile">Mobile No.</label>
                <input type="text" class="form-control" id="mobile" placeholder="Enter your moblie number" aria-label="mobile" name="u_mobile" required pattern="[0-9]{10}" title="Enter valid 10-digit mobile number">
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="address">Address</label>
                  <input type="text" class="form-control" placeholder="Enter Address"  name="u_address"
                    required>
                </div>
                <div class="col">
                <label class="text-dark" for="mobile">Registration Number</label>
                <input type="text" class="form-control" placeholder="Enter Registration number" aria-label="mobile" name="u_regi" required pattern="[0-9]+\/[0-9]{6}" title="Formate(2028/123654)"/>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                <label class="text-dark" for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter your email" aria-label="email" name="u_email" pattern=".+@gmail\.com" size="30" required title="Enter valid email(abc@gmail.com)"/>                  
                </div>

                <div class="col">
                <label class="text-dark" for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="u_password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$">                 
                </div>
              </div>

              <div class=" mt-3">
                <label class="text-dark" for="des">Short Description</label>
                <input type="text" class="form-control"  placeholder="" aria-label="des" name="u_desc" required pattern="[A-Za-z\s]+" title="Enter only text here"/>                  
                </div>
             

              <div class="row mt-3">
              <div class="col">
              <label for="formFileLg" class="form-label">Official Logo</label>
              <input class="form-control form-control-lg" id="formFileLg" type="file" name="image" required>
                </div>

              <div class="col">
              <label for="formFileLg" class="form-label">Registration Document</label>
              <input class="form-control form-control-lg" id="formFileLg" type="file" name="image1" required>
                </div>
                </div>

                


                
              </div>
              
              <div class="text-center mt-4 mb-2">
                <button type="submit" name="reg" class="btn btn-primary btn-lg btn-block text-center">Sign
                  up</button>
              </div>
                

             
              <br>
              <p class="text-dark text-center">Already Regisrter? <a href="login.php">Click Here</p></a>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="success-message" class="alert alert-success mt-4" role="alert" style="display: none;">
    Registration Successful!
  </div>
  <?php include("include/footer.html");?>
</body>

</html>