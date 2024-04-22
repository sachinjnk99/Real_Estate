<?php 
session_start();
isset($_SESSION["u_email"]);
include('config.php');
// Check if user is logged in (assuming you have a login system)
if(!isset($_SESSION["u_email"])) {
  header("Location: login.php");
  exit;
}

 ?>


<?php 
if(isset($_POST['book']))
{
  $uid=$_SESSION['u_id'];
  $pid=$_POST['pid']; 
	$oid=$_POST['oid'];
	$name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $date=$_POST['date'];
  $time=$_POST['time'];
	$message=$_POST['message'];
	
	$sql="insert INTO bookappo(uid,name,email,mobile,date,time,message,pid, owner_id) values ('$uid','$name','$email','$mobile','$date','$time','$message','$pid','$oid')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Appoiment booked Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}
}							
?>

<?php
$id=$_REQUEST['pid'];
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

<?php

$pid = $_REQUEST['pid'];
$oid=$_REQUEST['uid'];
 ?>
 

<div class="mb-4 text-center">
<button onclick="showForm('form1')" class="btn btn-success btn-lg  text-center me-5">Book Appointment</button>
<button onclick="showForm('form2')" class="btn btn-danger btn-lg  text-center">Request Info</button>
  </div>

  

<form id="form1" style="display: none;" method="post" enctype="multipart/form-data">
<h4 class="text-center text-decoration ">Book Appointment</h4>
<hr class="bg-dark ">
   
    <div class="row mt-3">
    <input class="form-control" value="<?php echo $oid;?>" required name="oid" type="hidden">
    <input class="form-control" value="<?php echo $pid;?>" required name="pid" type="hidden">

                  <div class="col">
                  <label class="text-dark" for="name">Name</label>
                  <input type="text" class="form-control" placeholder="Enter your name" aria-label="name"
                    name="name" required>
                </div>
                <div class="col">
                  <label class="text-dark" for="email">Email Address</label>
                  <input type="text" class="form-control" placeholder="Enter Email"  name="email"
                    required>
                </div>

                <div class="col">
                  <label class="text-dark" for="contact">Mobile Number</label>
                  <input type="int" class="form-control" placeholder="Enter number" aria-label="mobile"
                    name="mobile" required>
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
                    <option value="We3 Pm-6 Pmst">3 Pm-6 Pm</option>
                  </select>
                </div>

                <div class="form-group mt-3">
                <label for="about-me">Message</label>
                <textarea class="form-control" name="message" rows="7" placeholder="Enter Text Here...."></textarea>
                </div>
                <p class="mt-2">Your name, phone number and email address are required so that we may contact you to schedule an appointment.</p>

                <div class="text-left mt-3">
                <button type="submit" name="book" class="btn btn-success btn-lg  text-center">Send</button>
                </div>
              </div>
</form>

<form id="form2" style="display: none;">
    <h4 class="text-center text-decoration ">Request More Info</h4>
    <hr class="bg-dark ">
     <div class="row mt-3">

                  <div class="col">
                  <label class="text-dark" for="name">Name</label>
                  <input type="text" class="form-control" placeholder="Enter your name" aria-label="name"
                    name="name" required>
                </div>
                <div class="col">
                  <label class="text-dark" for="email">Email Address</label>
                  <input type="text" class="form-control" placeholder="Enter Email"  name="email"
                    required>
                </div>

                <div class="col">
                  <label class="text-dark" for="contact">Mobile Number</label>
                  <input type="int" class="form-control" placeholder="Enter number" aria-label="mobile"
                    name="mobile" required>
                </div>
              </div>

              <div class="form-group mt-3">
                <label for="about-me">Message</label>
                <textarea class="form-control" name="content" rows="7" placeholder="Enter Text Here...."></textarea>
                </div>

                <div class="text-left mt-3">
                <button type="submit" name="add" class="btn btn-danger btn-lg  text-center">Send</button>
                </div>

              
</form>
<form method="POST" action="chatpage.php?pid=<?php echo $pid;?>&uid=<?php echo $oid;?>&u_name=<?php echo $u_name;?>"> 
  <div class="col-sm-6">
    <input type="hidden" name="owner_id" value="<?php echo $oid;?>">
    <input type="submit" class="btn btn-lg btn-success" name="send_message" style="width: 100%" value="Send Message" >
    
  </div>
  </form>

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






              <h7 class="bed"><i class="fa-solid fa-bed text-success"></i><br>
                <?php echo $row['9'];?>
              </h7><br>
              <h7 class="kitch"><i class="fa-solid fa-kitchen-set text-success"></i><br>
                <?php echo $row['10'];?>
              </h7>
              <h7 class="bath"><i class="fa-solid fa-bath text-success"></i> <br>
                <?php echo $row['12'];?>
              </h7>

<!--
              <form method="POST" action="chatpage.php">
    <div class="col-sm-6">
    <input type="hidden" name="owner_id" value="<?php echo $rows['uid']; ?>">
    <input type="submit" class="btn btn-lg btn-success" name="send_message" style="width: 100%" value="Send Message" >
    
  </div> -->
  </form>

             
            </div>
            <?php } ?>
          </div>
        </div>
      </div>


      





      <div class="col-lg-4">
        <div class="card " style="border-radius: 10px;">
          <div class="card-body signup ">
            <h2 class="card-title text-center mb-4 text-dark text-decoration-underline"><b>Latest Listed</b></h2>
            <?php 
            $query=mysqli_query($con,"SELECT property1.*, user.u_name, user.u_type, user.uimage FROM `property1`,`user` WHERE property1.uid = user.u_id && p_status = 'approved' ORDER BY date DESC LIMIT 3");
            while($row=mysqli_fetch_array($query))
                {
            ?>
            <div class="overlay-black overflow-hidden position-relative news_style img mb-4">
              <img class="img5" src="property/prop/<?php echo $row['30'];?>" class="" alt="image">

              <div class="sp1">
                <h5 class="text-success text-capitalize"> <a href="prop-details.php?pid=<?php echo $row['0'];?>">
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





  <?php include("include/footer.html");?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <div class="mb-4"></div>
</body>

</html>