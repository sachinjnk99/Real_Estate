<?php 
session_start();
isset($_SESSION["u_email"]);
include('config.php');

if(!isset($_SESSION["u_email"])) {
  header("Location: login.php");
  exit;
}

 ?>


<?php 
if(isset($_POST['book'])) {
    $uid = $_SESSION['u_id'];
    $pid = $_POST['pid']; 
    $oid = $_POST['oid'];
    $oname = $_POST['oname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $message = $_POST['message'];
    
    // Construct the SQL query with a join to fetch owner email
    $sql = "INSERT INTO bookappo (uid, name, email, mobile, date, time, message, pid, owner_id,owner_name) 
            VALUES ('$uid', '$name', '$email', '$mobile', '$date', '$time', '$message', '$pid', '$oid','$oname')";
    
    // Execute the SQL query
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        // Fetch owner email from the property1 table
        $query = mysqli_query($con, "SELECT property1.*, user.*, property1.uid, user.u_name, user.u_type, user.uimage  FROM `property1`,`user` WHERE property1.uid=user.u_id and pid='$pid'");
        $row = mysqli_fetch_array($query);
        
        if ($row) {
            // Email message
            $owner_email = $row['email'];
            $uname=$row['u_name'];
            $subject = "New Appointment Request";
            $message = "
            <html>
            <head>
            <title>New Appointment Request</title>
            </head>
            <body>
            <p>Dear Property Owner($uname),</p>
            <p>You have received a new appointment request from a potential client.</p>
            <p><b>Client Details:</b></p>
            <p><b>Name: $name</b></p>
            <p><b>Mobile: $mobile</b></p>
            <p><b>Email: $email</b></p>
            <p><b>Appointment Details:</b></p>
            <p><b>Date: $date</b></p>
            <p><b>Time: $time</b></p>
            <p><b>Property ID: REMS-$pid</b></p>
            <p><b>Message:</b></p>
            <p>$message</p>
            <p>Please review the request and take necessary action.</p>
            <p>Best regards,<br>Real Estate Management Team</p>
            </body>
            </html>
            ";

            // Additional headers
            $headers = "From: Real Estate Management System <noreply@example.com>\r\n";
            $headers .= "Reply-To: Real Estate Support <support@example.com>\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            
            // Send email to the property owner
            if (mail($owner_email, $subject, $message, $headers)) {
              $_SESSION['status']="Appointment have successfully submited";
                header('Location: appo-view.php');
                exit();
            } else {
                echo "Error: Email could not be sent.";
            }
        } else {
            echo "Error: Owner details not found.";
        }
    } else {
        echo "Error inserting record: " . $con->error;
    }
} 
?>


<?php 
if(isset($_POST['request']))
{
  $uid=$_SESSION['u_id'];
  $uname=$_SESSION['u_name'];
  $pid=$_POST['pid']; 
	$oid=$_POST['oid'];
	$name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
	$message=$_POST['message'];
	
	$sql="insert INTO requestform(uid,pid,name,email,mobile,message,owner_id) values ('$uid','$pid','$name','$email','$mobile','$message','$oid')";
	$result=mysqli_query($con,$sql);
	if ($con->query($sql) === TRUE) {
    // Step 3: Fetch appointment details from the database
    $query = mysqli_query($con, "SELECT property1.*, user.*, property1.uid, user.u_name, user.u_type, user.uimage  FROM `property1`,`user` WHERE property1.uid=user.u_id and pid='$pid'");
    
    // Step 4: Fetch appointment details and send email
    $row = mysqli_fetch_array($query);
    if ($row) {
// Email message
$uname = $row['u_name'];
$to = $row['email'];
$subject = "New Information Request";

$message = "
<html>
<head>
<title>New Information Request</title>
</head>
<body>
<p>Dear Property Owner ($uname),</p>
<p>You have received a new information request from a potential client regarding your property.</p>
<p><b>Client Details:</b></p>
<p><b>Name: $name</b></p>
<p><b>Mobile: $mobile</b></p>
<p><b>Email: $email</b></p>
<p><b>Message:</b></p>
<p>$message</p>
<p>Please review the request and provide the necessary information.</p>
<p>Best regards,<br>Real Estate Management Team</p>
</body>
</html>
";

        // Additional headers
        $headers = "From: Real Estate Management System <noreply@example.com>\r\n";
        $headers .= "Reply-To: Real Estate Support <support@example.com>\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        // Send email
        if (mail($to, $subject, $message, $headers)) {
            header('Location: appo-view.php');
            exit();
        } else {
            echo "Error: Email could not be sent.";
        }
    } else {
        echo "Error: Appointment not found.";
    }
} else {
    echo "Error updating record: " . $con->error;
}}				
?>

<?php
$id=$_REQUEST['pid'];
$uname=$_REQUEST['u_name'];
$query=mysqli_query($con,"SELECT property1.*, user.*, property1.uid, user.u_name, user.u_type, user.uimage  FROM `property1`,`user` WHERE property1.uid=user.u_id and pid='$id'");
while($row=mysqli_fetch_array($query))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo $row['title']; ?>
  </title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="font/css/all.css">
  <style>
    .news_style img {
      width: 600px;
      height: 400px;
      border-radius: 0px;

      display: flex;
      justify-content: center;
    }

    .sale {
      padding: 5px 15px;
      border-radius: 8px;
      z-index: 99;
      position: absolute;
      top: 513px;
      left: 390px;
    }

    .sale1 {
      padding: 5px;
      border-radius: 8px;
      position: absolute;
      top: 18px;
      left: 710px;
    }

    .sale2 {
      padding: 5px 15px;
      border-radius: 8px;
      z-index: 99;
      position: absolute;
      top: 540px;
      left: 580px;
      font-size: 18px;
    }

    .sale3 {
      padding: 5px 15px;
      border-radius: 8px;
      z-index: 99;
      position: absolute;
      top: 505px;
      left: 695px;
      font-size: 13px;
    }

    .img5 {
      max-width: 80px;
      max-height: 80px;

    }

    .sp1 {
      padding: 5px 15px;
      position: absolute;
      top: -10px;
      left: 95px;
      font-size: 12px;
    }

    .sp2 {
      font-size: 13px;

    }

    .sp3 {
      padding: 5px 15px;
      position: absolute;
      top: 46px;
      left: 95px;
      font-size: 15px;
    }

    .bed {
      padding: 5px 15px;
      position: absolute;
      top: 710px;
      left: 520px;
      font-size: 20px;
    }

    .kitch {
      padding: 5px 15px;
      position: absolute;
      top: 710px;
      left: 620px;
      font-size: 20px;
    }

    .bath {
      padding: 5px 15px;
      position: absolute;
      top: 710px;
      left: 720px;
      font-size: 20px;
    }
  </style>
</head>

<body>
  <?php include("include/header.php");?>
  <br>

  <div class="container pt-5 mt-5 pb-5">
    <div class="row justify-content-right">
      <div class="col-lg-8">
        <div class="card " style="border-radius: 10px;">
          <div class="card-body signup ">

            <h3 class="text-primary text-capitalize">
              <?php echo $row['4']; ?>
            </h3>
            <div class="sale1 bg-warning text-white">
              <b>
                <?php echo $row['5'];?>
              </b>
            </div>
            <h6 class="text-success">
              <?php echo $row['26'];?> feet - With
              <?php echo $row['26'];?> feet Road
            </h6>


            <div id="carouselExampleIndicators" class="carousel slide mt-2 pt-2 mb-3" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="property/prop/<?php echo $row['30'];?>" class="d-block w-100 d-block w-100"
                    style="height: 400px;" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="property/prop/<?php echo $row['31'];?>" class="d-block w-100 d-block w-100"
                    style="height: 400px;" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="property/prop/<?php echo $row['32'];?>" class="d-block w-100 d-block w-100"
                    style="height: 400px;" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="property/prop/<?php echo $row['33'];?>" class="d-block w-100 d-block w-100"
                    style="height: 400px;" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <div>

              <h4><i class="fa-solid fa-tag text-info"></i> Nrs.
                <?php echo $row['21']; ?>/-
                <?php echo $row['22']; ?>
              </h4>
              <div class="sale bg-success text-white">
                <b>
                  <?php echo $row['23'];?>
                </b>
              </div>

              <h7 class="text-capitalize"><i class="fa-solid fa-location-dot text-success"></i>
                <?php echo $row['17'];?>,
                <?php echo $row['18']; ?>,
                <?php echo $row['19']; ?>
              </h7>
              <h7 class=" sale2 text-capitalize text-left"><i class="fa-solid fa-mobile text-secondary"></i>
              <b>  <?php echo $row['38'];?>,
                <?php echo $row['39']; ?></b>
                
              </h7>

              <h7 class=" sale3 text-capitalize text-left"> Property id: REMS-<?php echo $row['0'];?></h7>


              <hr class="bg-dark ">

              
              <h4 class="text text-decoration-underline ">Faclities:</h4>
              <h6>
                <?php echo $row['27']; ?>
              </h6>

              <hr class="bg-dark ">

              <h4 class="text text-decoration-underline">Property Details:</h4>
              <p class="text-capitalize">
                <?php echo $row['3']; ?>
              </p>
              <table>

              <tr>
                  <td>
                    <h5 class="text-success"> Total floor : </h5>
                  </td>
                  <td>
                    <h6>
                      <?php echo $row['16'];?>
                    </h6>
                  </td>
                </tr>


                <tr>
                  <td>
                    <h5 class="text-success"> Balcony : </h5>
                  </td>
                  <td>
                    <h6>
                      <?php echo $row['11'];?>
                    </h6>
                  </td>
                </tr>

                <tr>
                  <td>
                    <h5 class="text-success"> Hall : </h5>
                  </td>
                  <td>
                    <h6>
                      <?php echo $row['14'];?>
                    </h6>
                  </td>
                </tr>

              

                <tr>
                  <td>
                    <h5 class="text-success">Facing : </h5>
                  </td>
                  <td>
                    <h6>
                      <?php echo $row['29'];?>
                    </h6>
                  </td>
                </tr>


                <tr>
                  <td>
                    <h5 class="text-success"> Area : </h5>
                  </td>
                  <td>
                    <h6>
                      <?php echo $row['25'];?> <?php echo $row['24'];?>
                    </h6>
                  </td>
                </tr>


                <tr>
                  <td>
                    <h5 class="text-success"> Road size : </h5>
                  </td>
                  <td>
                    <h6>
                      <?php echo $row['26'];?>  feet
                    </h6>
                  </td>
                </tr>

                <tr>
                  <td>
                    <h5 class="text-success"> Furnishing : </h5>
                  </td>
                  <td>
                    <h6>
                      <?php echo $row['28'];?>
                    </h6>
                  </td>
                </tr>

              </table>

              <hr class="bg-dark ">
              <h4 class="text text-decoration-underline ">Contact Details:</h4>
                <table>

                  <tr>
                  <td>
                    <h5 class="text-success">Owner : </h5>
                  </td>
                  <td>
                    <h6>
                      <?php echo $row['u_name'];?>
                    </h6>
                  </td>
                </tr>


                <tr>
                  <td>
                    <h5 class="text-success">Email : </h5>
                  </td>
                  <td>
                    <h6>
                      <?php echo $row['37'];?>
                    </h6>
                  </td>
                </tr>


                <tr>
                  <td>
                    <h5 class="text-success">Contact : </h5>
                  </td>
                  <td>
                    <h6>
                      <?php echo $row['38'];?>, <?php echo $row['39'];?>
                    </h6>
                  </td>
                </tr>

                <tr>
                  <td>
                    <h5 class="text-success">Location : </h5>
                  </td>
                  <td>
                    <h6 class="text-capitalize">
                      <?php echo $row['17'];?>,
                      <?php echo $row['18'];?>,
                      <?php echo $row['19'];?> -
                      <?php echo $row['20'];?>
                    </h6>
                  </td>
                </tr>
              </table>

              <hr class="bg-dark ">
              <h4 class="text text-decoration-underline ">For More Information:</h4>

<p class=" text-success">Real Estate Management System Pvt. Ltd. <br> Email: realestate@gmail.com <br>Contact no. : 9816826674 , 9829925063<br> Facebook page:      </p>
<hr class="bg-dark ">

<h7 class="bed"><i class="fa-solid fa-bed text-success"></i><br>
                <?php echo $row['9'];?>
              </h7><br>
              <h7 class="kitch"><i class="fa-solid fa-kitchen-set text-success"></i><br>
                <?php echo $row['10'];?>
              </h7>
              <h7 class="bath"><i class="fa-solid fa-bath text-success"></i> <br>
                <?php echo $row['12'];?>
              </h7>

<?php

 $pid = $_REQUEST['pid'];
$oid=$_REQUEST['uid'];
$oname = $_REQUEST['u_name'];
 ?>
 

<div class="mb-4 text-center">
<button onclick="showForm('form1')" class="btn btn-success btn-lg  text-center me-5">Book Appointment</button>
<button onclick="showForm('form2')" class="btn btn-danger btn-lg  text-center">Request Info</button>
  </div>

  

<form id="form1" style="display: none;" method="post" enctype="multipart/form-data">
<h4 class="text-center text-decoration ">Book Appointment</h4>
<?php
$error="";
$msg="";
?>
<hr class="bg-dark ">
   
    <div class="row mt-3">
    <input class="form-control" value="<?php echo $oid;?>" required name="oid" type="hidden">
    <input class="form-control" value="<?php echo $pid;?>" required name="pid" type="hidden">
    <input class="form-control" value="<?php echo $oname;?>" required name="oname" type="hidden">

    <?php 
                                $uid=$_SESSION['u_id'];
                                $query=mysqli_query($con,"SELECT * FROM `user` WHERE u_id='$uid'");
                                while($row=mysqli_fetch_array($query))
                                {
                            ?>
                  
                  <div class="col">
                  <label class="text-dark" for="name">Name</label>
                  <input type="text" class="form-control" placeholder="Enter your name" aria-label="name" value="<?php echo $row['1'];?>"
                    name="name" required>
                </div>
                <div class="col">
                  <label class="text-dark" for="email">Email Address</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter your email"  value="<?php echo $row['3'];?>" aria-label="email" name="email" pattern=".+@gmail\.com" size="30" required title="Enter valid email(abc@gmail.com)"/>  
                </div>

                <div class="col">
                  <label class="text-dark" for="contact">Mobile Number</label>
                  <input type="text" class="form-control" id="mobile" placeholder="Enter your moblie number" value="<?php echo $row['2'];?>" aria-label="mobile" name="mobile" required pattern="[0-9]{10}" title="Enter valid 10-digit mobile number">
                </div>
              </div>

              <div class="row mt-3">
              <div class="col">
              <label for="date">Preferred Date</label><br>
              <input type="date" class="form-control" id="date" name="date">
              </div>

              <div class="col">
                  <label class="text-dark" for="user">Preferred Time</label>
                  <select class="form-control form-select"  required name="time">
                    <option value="">Select time</option>
                    <option value="6 Am-9 Am">6 Am-9 Am</option>
                    <option value="10 Am-12 Am">10 Am-12 Am</option>
                    <option value="1 Pm-3 Pm">1 Pm-3 Pm</option>
                    <option value="3 Pm-6 Pm">3 Pm-6 Pm</option>
                  </select>
                </div>

                <div class="form-group mt-3">
                <label for="about-me">Message</label>
                <textarea class="form-control" name="message" rows="7" placeholder="Enter Text Here...."></textarea>
                </div>
                <p class="mt-2">Your name, phone number and email address are required so that we may contact you to schedule an appointment.</p>

                <div class="text-left mt-3">
                <button type="submit" name="book" class="btn btn-success btn-lg  text-center" onclick='return msg()'>Send</button>
                </div>
              </div>
             
</form>

<form id="form2" style="display: none;" method="post" enctype="multipart/form-data">
    <h4 class="text-center text-decoration ">Request More Info</h4>
    <hr class="bg-dark ">
     <div class="row mt-3">
     <input class="form-control" value="<?php echo $oid;?>" required name="oid" type="hidden">
    <input class="form-control" value="<?php echo $pid;?>" required name="pid" type="hidden">

                  <div class="col">
                  <label class="text-dark" for="name">Name</label>
                  <input type="text" class="form-control" placeholder="Enter your name" aria-label="name" value="<?php echo $row['1'];?>" 
                    name="name" required>
                </div>
                <div class="col">
                  <label class="text-dark" for="email">Email Address</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter your email" aria-label="email" name="email" value="<?php echo $row['3'];?>" pattern=".+@gmail\.com" size="30" required title="Enter valid email(abc@gmail.com)"/>  
                </div>

                <div class="col">
                  <label class="text-dark" for="contact">Mobile Number</label>
                  <input type="text" class="form-control" id="mobile" placeholder="Enter your moblie number"  value="<?php echo $row['2'];?>" aria-label="mobile" name="mobile" required pattern="[0-9]{10}" title="Enter valid 10-digit mobile number">
                </div>
              </div>

              <div class="form-group mt-3">
                <label for="about-me">Message</label>
                <textarea class="form-control" name="message" rows="7" placeholder="Enter Text Here...."></textarea>
                </div>

                <div class="text-left mt-3">
                <button type="submit" name="request" class="btn btn-danger btn-lg  text-center" onclick='return msg1()'>Send</button>
                </div>
                <?php } ?>

              
</form>

<!--
<form method="POST" action="chatpage.php?pid=<?php echo $pid;?>&uid=<?php echo $oid;?>&u_name=<?php echo $uname;?>"> 
  <div class="col-sm-6">
    <input type="hidden" name="owner_id" value="<?php echo $oid;?>">
    <input type="submit" class="btn btn-lg btn-success" name="send_message" style="width: 100%" value="Send Message" >
    
  </div>
  </form> -->

 

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

function msg(){
    return confirm('Are you sure you want to Book Appointment?');
  }

  function msg1(){
    return confirm('Are you sure you want to Request for more info?');
  }
</script>






           

<!--
              <form method="POST" action="chatpage.php">
    <div class="col-sm-6">
    <input type="hidden" name="owner_id" value="<?php echo $rows['uid']; ?>">
    <input type="submit" class="btn btn-lg btn-success" name="send_message" style="width: 100%" value="Send Message" >
    
  </div> 
  </form> -->
  <?php include("chatpage.php");?>
             
            </div>
            <?php } ?>
          </div>
        </div>
      </div>

      
      <div class="col-lg-4">
        <div class="card " style="border-radius: 10px;">
          <div class="card-body signup ">
            <h3 class="card-title text-center mb-2 text-secondary"><b>Latest Listed</b></h3>
            <hr class="bg-dark ">
            <?php 
            $query=mysqli_query($con,"SELECT property1.*, user.u_name, user.u_type, user.uimage FROM `property1`,`user` WHERE property1.uid = user.u_id And p_status = 'approved' ORDER BY date DESC LIMIT 4");
            while($row=mysqli_fetch_array($query))
                {
            ?>
            <div class="overlay-black overflow-hidden position-relative news_style img mb-4">
              <img class="img5" src="property/prop/<?php echo $row['30'];?>" class="" alt="image">

              <div class="sp1">
                <h5 class="text-success text-capitalize"> 
                  <a href="prop-details.php?pid=<?php echo $row['0'];?>&uid=<?php echo $row['1'];?>&u_name=<?php echo $row['u_name'];?>">
                    <?php echo $row['4'];?>
                  </a></h5>

                <p class="sp2"><b> Nrs.
                    <?php echo $row['21']; ?>/-
                  </b>
                  <?php echo $row['22']; ?>
                </p>

              </div>
              <h6 class="sp3">
                <?php echo $row['19']; ?>
              </h6>

              <hr class="bg-dark ">

              <?php } ?>
            </div>

          </div>

        </div>

        </div>

</div>
</div>    








      <div class="col-lg-12 pt-5">
        <div class="card" style="border-radius: 10px;">
          <div class="card-body signup ">
            <h3 class="card-title text-center mb-2 text-secondary"><b>Featured Property</b></h3>
            <hr class="bg-dark ">
            <?php 
            $query=mysqli_query($con,"SELECT property1.*, user.u_name, user.u_type, user.uimage FROM `property1`,`user` WHERE property1.uid = user.u_id And p_status = 'approved' And is_featured='yes' ORDER BY date DESC LIMIT 4");
            while($row=mysqli_fetch_array($query))
                {
            ?>
            <div class="overlay-black overflow-hidden position-relative news_style img mb-4">
              <img class="img5" src="property/prop/<?php echo $row['30'];?>" class="" alt="image">

              <div class="sp1">
                <h5 class="text-success text-capitalize"> 
                  <a href="prop-details.php?pid=<?php echo $row['0'];?>&uid=<?php echo $row['1'];?>&u_name=<?php echo $row['u_name'];?>">
                    <?php echo $row['4'];?>
                  </a></h5>

                <p class="sp2"><b> Nrs.
                    <?php echo $row['21']; ?>/-
                  </b>
                  <?php echo $row['22']; ?>
                </p>

              </div>
              <h6 class="sp3">
                <?php echo $row['19']; ?>
              </h6>

              <hr class="bg-dark ">

              <?php } ?>
            </div>

          </div>

        </div>
      </div>
    </div>
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
  <div class="mb-4"></div>
</body>

</html>