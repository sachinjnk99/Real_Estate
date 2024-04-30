<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
$error="";
$msg="";
include("config.php");
if(!isset($_SESSION['u_email']))
{
	header("location:login.php");
}
if(isset($_POST['add']))
{
	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$ptype=$_POST['ptype'];
  $cond=$_POST['cond'] ?? '';
  $land=$_POST['l_type'];
  $rent=$_POST['r_type'] ?? '';
  $road=$_POST['dist1'];
	$bhk=$_POST['bhk'] ?? '';
	$bed=$_POST['bed'] ?? '';
	$balc=$_POST['balc'] ?? '';
	$hall=$_POST['hall'] ?? '';
	
	$bath=$_POST['bath'] ?? '';
	$kitc=$_POST['kitc'] ?? '';
	$floor=$_POST['floor'] ?? '';
  $tfloor=$_POST['floor1'] ?? '';
	
	  $city=$_POST['city'];
    $dist=$_POST['dist'];
    $state=$_POST['state'];
    $ward=$_POST['ward'];
	
    $price=$_POST['price'];
    $per_pro=$_POST['per'];
    $p_nego=$_POST['nego'];
    $area=$_POST['area'];
    $asize=$_POST['size'];
    $roadsize=$_POST['roadsize'];

    $furn=$_POST['furn'];
    $pface=$_POST['pface'];

     // Concatenate selected options into a single string
     $options = implode(", ", $_POST['checkbox']);

	  $status=$_POST['status'];
    $stype=$_POST['stype'];
	  $uid=$_SESSION['u_id'];
	  $feature=$_POST['featured'];

    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $mobile1=$_POST['mobile1'];

    //$loc=$_POST['loc'];
	
	

	//$isFeatured=$_POST['isFeatured'];
	
	$aimage=$_FILES['image']['name'];
	$aimage1=$_FILES['image1']['name'];
	$aimage2=$_FILES['image2']['name'];
	$aimage3=$_FILES['image3']['name'];
	
	
	$temp_name  =$_FILES['image']['tmp_name'];
	$temp_name1 =$_FILES['image1']['tmp_name'];
	$temp_name2 =$_FILES['image2']['tmp_name'];
	$temp_name3 =$_FILES['image3']['tmp_name'];
	
	
	move_uploaded_file($temp_name,"property/prop/$aimage");
	move_uploaded_file($temp_name1,"property/prop/$aimage1");
	move_uploaded_file($temp_name2,"property/prop/$aimage2");
	move_uploaded_file($temp_name3,"property/prop/$aimage3");

	
	
	$sql="insert into property1 (uid,title,content,property_type,cond,L_type,r_type,road_property,bedroom,bathroom,balcony,kitchen,bhk,hall,floor,total_floor,province,district,city,ward,price,per_property,price_nego,area,size,road_access,facilities,furnishing,property_face,main_img,img1,img2,img3,status,property_status,is_featured,email,contact,alt_contact)
	values('$uid','$title','$content','$ptype','$cond','$land','$rent','$road','$bed','$bath','$balc','$kitc','$bhk','$hall','$floor','$tfloor','$state','$dist','$city','$ward','$price','$per_pro','$p_nego','$area','$asize','$roadsize','$options','$furn','$pface','$aimage','$aimage1','$aimage2','$aimage3','$status','$stype','$feature','$email','$mobile','$mobile1')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}


// Email message
$message = "
<html>
<head>
<title>Property Sumitted Successfully</title>
</head>
<body>
<p>Dear user,</p>
<p>We are pleased to inform you that your property submission has been successfully received. Our team will review the details provided and process your submission shortly.</p>

<p><b>Property Details:</b></p>

<p><b>Property Type: $ptype</b></p>
<p><b>Price: $price /- $per_pro </b></p>
<p><b>Property Address: $city</b></p>
<p><b>Description: $content</b></p>

<p>Thank you for choosing our service. If you have any questions or need further assistance, please feel free to contact us.</p>
<p>Best regards,<br>Real Estate Management Team</p>
</body>
</html>
";

// Additional headers
$headers = "From:Real Estate Management System <noreply@example.com>\r\n";
$headers .= "Reply-To: Real Estate Support <support@example.com>\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$check=mail("$email", "Property Sumitted Successfully", "$message", "$headers");
  }
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>submit_property</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="style.css">
 <!-- <script>
        // Function to show/hide form elements based on selected option
        function showForm(option) {
            // Hide all form elements initially
            document.getElementById('form1').style.display = 'none';
            document.getElementById('form2').style.display = 'none';
            document.getElementById('form3').style.display = 'none';

            // Show the relevant form based on the selected option
            if (option === 'house') {
                document.getElementById('form1').style.display = 'block';
            } else if (option === 'villa') {
                document.getElementById('form2').style.display = 'block';
            } else if (option === 'office') {
                document.getElementById('form3').style.display = 'block';
            }
        }
    </script>-->
<style>
  .hidden {
    display: none;
  }
</style>
</head>

<body>
  <?php include("include/header.php");?>
  <div class="container py-5 mt-5 pt-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card " style="border-radius: 10px;">
          <div class="card-body signup ">

            <h2 class="card-title text-center mb-4 text-dark"><b>Submit Property</b></h2>
            <?php echo $error; ?>
            <?php echo $msg; ?>

            <hr class="bg-dark">
            <h4 class="card-title text-left mb-4 text-dark">Basic Details</h4>
            
            
              <!--
              <div>
                <input class="form-control" value="<?php echo $u_id;?>" required name="uid" type="hidden">
              </div> -->

                <hr class="bg-dark ">

                <form method="post" enctype="multipart/form-data">
                <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="title">Title</label>
                  <input type="text" class="form-control" placeholder="Property Title" aria-label="title" name="title"
                    required>
                </div>
              </div>

              <div class="mt-3">
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" required rows="4"></textarea>
              </div>

              <div class="col mt-3">
                  <label class="text-dark" for="propertytype">Property Type</label>
                  <select class="form-control form-select mt-2 mb-3" id="conditionSelect" onchange="toggleForm()" required name="ptype">
                    <option value="">Select Type</option>
                    <option value="House for sale">House For Sale</option>
                    <option value="Land for sale">Land For Sale</option>
                    <option value="For Rent">For Rent</option>
                  </select>
                </div>	

                <div class="row mt-3 mb-3">
                <div class="col">
                  <label class="text-dark " for="title">Road To Property</label>
                  <input type="text" class="form-control" placeholder="distance from main road" aria-label="title" name="dist1"
                    required>
                </div>
              </div>

<!-- Container for forms -->
<div id="formContainer"></div>

<script>
  // Function to toggle visibility of forms based on selected option
  function toggleForm() {
    var conditionSelect = document.getElementById("conditionSelect").value;
    var formContainer = document.getElementById("formContainer");
    formContainer.innerHTML = ""; // Clear existing forms

    if (conditionSelect === "House for sale") {
      formContainer.innerHTML = `
      <div class="col">
            <label class="text-dark mt-3" for="status">Condition</label>
            <select class="form-control form-select" required name="cond">
              <option value="">Select</option>
              <option value=" New Brand"> New Brand</option>
              <option value="Used">Used</option>
            </select>
          </div>
          
          <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="bedroom">Bed Room</label>
                  <input type="text" class="form-control" placeholder="Enter bedroom number" aria-label="bed" name="bed"
                    required>
                </div>

                <div class="col">
                  <label class="text-dark" for="bathroom">Bathroom</label>
                  <input type="text" class="form-control" placeholder="Enter bathroom nymber" aria-label="bathroom"
                    name="bath" required>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="balcony">Balcony</label>
                  <input type="text" class="form-control" placeholder="Enter balcony number" name="balc" required>
                </div>

                <div class="col">
                  <label class="text-dark" for="kitchen">Kitchen</label>
                  <input type="text" class="form-control" placeholder="Enter kitchen nnumber" name="kitc" required>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="balcony">BHK</label>
                  <select class="form-control form-select" required name="bhk">
                    <option value="">Select BHK</option>
                    <option value="1 BHK">1 BHK</option>
                    <option value="2 BHK">2 BHK</option>
                    <option value="3 BHK">3 BHK</option>
                    <option value="4 BHK">4 BHK</option>
                    <option value="5 BHK">5 BHK</option>
                    <option value="1,2 BHK">1,2 BHK</option>
                    <option value="2,3 BHK">2,3 BHK</option>
                    <option value="2,3,4 BHK">2,3,4 BHK</option>
                  </select>
                </div>

                <div class="col">
                  <label class="text-dark" for="hal">Hall</label>
                  <input type="text" class="form-control" placeholder="Enter Hall number" name="hall" required>
                </div>
              </div>


              <div class="row mt-3 ">
                <div class="col pb-4">
                  <label class="text-dark" for="floor">Floor</label>
                  <select class="form-control form-select" required name="floor">
                    <option value="">Select Floor</option>
                    <option value="1st Floor">1st Floor</option>
                    <option value="2nd Floor">2nd Floor</option>
                    <option value="3rd Floor">3rd Floor</option>
                    <option value="4th Floor">4th Floor</option>
                    <option value="5th Floor">5th Floor</option>
                  </select>
                </div>


                <div class="col">
                  <label class="text-dark" for="floor">Total floor</label>
                  <select class="form-control form-select" required name="floor1">
                    <option value="">Select Floor</option>
                    <option value="1 Floor">1 Floor</option>
                    <option value="2 Floor">2 Floor</option>
                    <option value="3 Floor">3 Floor</option>
                    <option value="4 Floor">4 Floor</option>
                    <option value="5 Floor">5 Floor</option>
                    <option value="6 Floor">6 Floor</option>
                    <option value="7 Floor">7 Floor</option>
                    <option value="8 Floor">8 Floor</option>
                    <option value="9 Floor">9 Floor</option>
                    <option value="10 Floor">10 Floor</option>
                  </select>
                </div>
          `;
    } else if (conditionSelect === "Land for sale") {
      formContainer.innerHTML = `
      <div class="col">
            <label class="text-dark" for="status mt-3">Land Type</label>
            <select class="form-control form-select" required name="l_type">
              <option value="">Select</option>
              <option value="Individual">Individual</option>
              <option value="Plotted">Plotted</option>
              <option value="Commercial">Commercial Use</option>
              <option value="Agriculture">Agriculture</option>
            </select>
          </div>`;
    } else if (conditionSelect === "For Rent") {
      formContainer.innerHTML = `
      <div class="col">
            <label class="text-dark" for="status">Renting</label>
            <select class="form-control form-select" required name="r_type">
              <option value="">Select</option>
              <option value="Room"> Room</option>
              <option value="House">House</option>
              <option value="Land">Land</option>
              <option value="Sutter">Sutter</option>
            </select>
          </div>
          
          <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="bedroom">Bed Room</label>
                  <input type="text" class="form-control" placeholder="Enter bedroom number" aria-label="bed" name="bed"
                    required>
                </div>

                <div class="col">
                  <label class="text-dark" for="bathroom">Bathroom</label>
                  <input type="text" class="form-control" placeholder="Enter bathroom nymber" aria-label="bathroom"
                    name="bath" required>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="balcony">Balcony</label>
                  <input type="text" class="form-control" placeholder="Enter balcony number" name="balc" required>
                </div>

                <div class="col">
                  <label class="text-dark" for="kitchen">Kitchen</label>
                  <input type="text" class="form-control" placeholder="Enter kitchen nnumber" name="kitc" required>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="balcony">BHK</label>
                  <select class="form-control form-select" required name="bhk">
                    <option value="">Select BHK</option>
                    <option value="1 BHK">1 BHK</option>
                    <option value="2 BHK">2 BHK</option>
                    <option value="3 BHK">3 BHK</option>
                    <option value="4 BHK">4 BHK</option>
                    <option value="5 BHK">5 BHK</option>
                    <option value="1,2 BHK">1,2 BHK</option>
                    <option value="2,3 BHK">2,3 BHK</option>
                    <option value="2,3,4 BHK">2,3,4 BHK</option>
                  </select>
                </div>

                <div class="col">
                  <label class="text-dark" for="hal">Hall</label>
                  <input type="text" class="form-control" placeholder="Enter Hall number" name="hall" required>
                </div>
              </div>


              <div class="row mt-3 ">
                <div class="col pb-4">
                  <label class="text-dark" for="floor">Floor</label>
                  <select class="form-control form-select" required name="floor">
                    <option value="">Select Floor</option>
                    <option value="1st Floor">1st Floor</option>
                    <option value="2nd Floor">2nd Floor</option>
                    <option value="3rd Floor">3rd Floor</option>
                    <option value="4th Floor">4th Floor</option>
                    <option value="5th Floor">5th Floor</option>
                  </select>
                </div>


                <div class="col">
                  <label class="text-dark" for="floor">Total floor</label>
                  <select class="form-control form-select" required name="floor1">
                    <option value="">Select Floor</option>
                    <option value="1 Floor">1 Floor</option>
                    <option value="2 Floor">2 Floor</option>
                    <option value="3 Floor">3 Floor</option>
                    <option value="4 Floor">4 Floor</option>
                    <option value="5 Floor">5 Floor</option>
                    <option value="6 Floor">6 Floor</option>
                    <option value="7 Floor">7 Floor</option>
                    <option value="8 Floor">8 Floor</option>
                    <option value="9 Floor">9 Floor</option>
                    <option value="10 Floor">10 Floor</option>
                  </select>
                </div>
          `;
    }
  }
</script>
               
                
             

            

                <hr class="bg-dark">
                <h4 class="card-title text-left mb-4 text-dark">Location</h4>

                <div class="row mt-3">
                  <div class="col">
                    
                      <label class="text-dark" for="province">Province</label>
                      <select class="form-control form-select" id="province" onchange="updateDistricts()" name="state"required>
                        <option value="">Select Province</option>
                        <option value="province1">Province 1</option>
                        <option value="province2">Province 2</option>
                        <option value="province3">Province 3</option>
                        <option value="province4">Province 4</option>
                        <option value="province5">Province 5</option>
                        <option value="province6">Province 6</option>
                        <option value="province7">Province 7</option>
                      </select>
                  </div>

                  <div class="col">
                    <label class="text-dark" for="email">District</label>
                    <select class="form-control form-select" id="district" onchange="updateCities()" name="dist" required>

                    </select>
                  </div>

                  <div class="col">
                    <label class="text-dark" for="email">City</label>
                    <select class="form-control form-select" id="city" name="city" required>

                    </select>
                  </div>

                  
                <div class="col">
                  <label class="text-dark" for="balcony">Ward no.</label>
                  <input type="text" class="form-control" placeholder="Enter ward number" name="ward" required>
                </div>



                <hr class="bg-dark mt-3">
                <h4 class="card-title text-left mb-4 text-dark">Price & Area</h4>

                  <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="price">Price</label>
                  <input type="text" class="form-control" placeholder="Enter the price of property" aria-label="bed" name="price"
                    required>
                </div>

                <div class="col">
                    <label class="text-dark" >Per Property</label>
                    <select class="form-control form-select" id="per"  name="per"required>
                     
                      <option value="Entire property">Entire property</option>  
                      <option value="Per Month">Per month</option> 
                      <option value="Per Month">Per Dhur</option> 
                    </select>
                </div>

                <div class="col">
                    <label class="text-dark" >Price Negotiable</label>
                    <select class="form-control form-select"   name="nego"required>
                      <option value="">Select </option>
                      <option value="Negotiable">Yes</option>
                      <option value="Not Negotiable">No</option>
                    </select>
                </div>
      </div>
                <div class="row mt-3">
                <div class="col">
                    <label class="text-dark" for="province">Area</label>
                    <select class="form-control form-select" id="per"  name="area"required>
                      <option value="">Select </option>
                      <option value="Kattha">Kattha</option>
                      <option value="Bigha">Bigha</option>
                      <option value="Dhur">Dhur</option>
                      <option value="Ropani">Ropani</option>
                      <option value="Aana">Aana</option>
                    </select>
                </div>

                <div class="col">
                  <label class="text-dark" for="size">Size</label>
                  <input type="text" class="form-control" placeholder="Enter the of property size eg. 0-0-0-0" aria-label="propertysize"
                    name="size" required>
                </div>

                <div class="col">
                  <label class="text-dark" for="roadsize">Road Access</label>
                  <input type="text" class="form-control" placeholder="Enter the lenth of road" aria-label="rodesize"
                    name="roadsize" required>
                </div>
              </div>
            
          </div>
        

        <hr class="bg-dark">
                <h4 class="card-title text-left mb-4 text-dark">Facilities</h4>

       <div class="row pl-5">  
       <div class="col ">        
  <input type="checkbox" id="checkbox" name="checkbox[]" value="Earthquake Resistant">
  <label for="checkbox">Earthquake Resistant</label> <br>
  
  <input type="checkbox" id="checkbox" name="checkbox[]" value="Telephone">
  <label for="checkbox">Telephone</label> <br>

  <input type="checkbox" id="checkbox" name="checkbox[]" value="Electricity">
  <label for="checkbox">Electricity</label> <br> 

  <input type="checkbox" id="checkbox" name="checkbox[]" value="Telephone">
  <label for="checkbox">Telephone</label>



      </div><br>
      <div class="col "> 

      <input type="checkbox" id="checkbox" name="checkbox[]" value="Internet">
  <label for="checkbox">Internet</label> <br>
  
  <input type="checkbox" id="checkbox" name="checkbox[]" value="Cable Tv">
  <label for="checkbox">Cable Tv</label> <br>

  <input type="checkbox" id="checkbox" name="checkbox[]" value="Well">
  <label for="checkbox">Well</label> <br> 

  <input type="checkbox" id="checkbox" name="checkbox[]" value="Rental income">
  <label for="checkbox">Rental income</label>
  
      </div>
      <br>

      <div class="col "> 

<input type="checkbox" id="checkbox" name="checkbox[]" value=" 24/7 Water Supply">
<label for="checkbox">Water supply</label> <br>

<input type="checkbox" id="checkbox" name="checkbox[]" value="Drainage">
<label for="checkbox">Drainage</label> <br>

<input type="checkbox" id="checkbox" name="checkbox[]" value="Parking">
<label for="checkbox">Parking</label> <br> 

<input type="checkbox" id="checkbox" name="checkbox[]" value="Garden">
<label for="checkbox">Garden</label>

</div>
      </div>


      <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="balcony">Furnishing</label>
                  <select class="form-control form-select" required name="furn">
                    <option value="">Select</option>
                    <option value="Not Furnished">Not Furnished</option>
                    <option value="Semi-Furnished">Semi Furnished</option>
                    <option value="Furnished">Full Furnished</option>
                   
                  </select>
                </div>


                <div class="col">
                  <label class="text-dark" for="user">Property Face Toward</label>
                  <select class="form-control form-select"  required name="pface">
                    <option value="">Select face</option>
                    <option value="North">North</option>
                    <option value="South">South</option>
                    <option value="East">East</option>
                    <option value="West">West</option>
                    <option value="North-East">North-East</option>
                    <option value="North-West">North-West</option>
                    <option value="South-East">South-East</option>
                    <option value="South-West">South-West</option>
                  </select>
                </div>
              </div>




        <hr class="bg-dark">
        
        <h4 class="card-title text-left mb-4 text-dark">Image</h4>

        <div class="row mt-3">
          <div class="col">
            <label for="formFileLg" class="form-label">Property main image</label>
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="image" required>
          </div>

          <div class="col">
            <label for="formFileLg" class="form-label">Image1</label>
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="image1" required>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col">
            <label for="formFileLg" class="form-label">Image2</label>
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="image2" required>
          </div>

          <div class="col">
            <label for="formFileLg" class="form-label">Image3</label>
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="image3" required>
          </div>
        </div>

        <hr class="bg-dark">
        <h4 class="card-title text-left mb-4 text-dark">Status</h4>

        <div class="row mt-3">
          <div class="col">
            <label class="text-dark" for="status">Status</label>
            <select class="form-control form-select" required name="status">
              <option value="">Select Status</option>
              <option value="available">Available</option>
              <option value="sold out">Sold Out</option>
            </select>
          </div>

          <div class="col">
            <label class="text-dark" for="user">Property Status</label>
            <select class="form-control form-select" required name="stype">
              <option value="">Select Status</option>
              <option value="rent">Rent</option>
              <option value="sale">Sale</option>
            </select>
          </div>

                <div class="col">
                  <label class="text-dark" for="propertytype">  Is Featured?</label>
                  <select class="form-control form-select" required name="featured">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>
              
        </div>

        <hr class="bg-dark">
        <h4 class="card-title text-left mb-4 text-dark">Contact Details</h4>

        <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="email">Email Address</label>
                  <input type="text" class="form-control" placeholder="Enter Email"  name="email"
                    required>
                </div>

                <div class="col">
                  <label class="text-dark" for="contact">Contact Number</label>
                  <input type="int" class="form-control" placeholder="Enter number" aria-label="mobile"
                    name="mobile" required>
                </div>

                <div class="col">
                  <label class="text-dark" for="contact">Alternative Contact Number</label>
                  <input type="int" class="form-control" placeholder="Enter number" aria-label="mobile"
                    name="mobile1" required>
                </div>

              </div>
              
              

     

 

        <div class="text-center mt-4 mb-3">
          <button type="submit" name="add" class="btn btn-success btn-lg btn-block text-center">Submit</button>
        </div>
        
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </form></div>








  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

  <script>
    function updateDistricts() {
      // Get the selected province
      var selectedProvince = document.getElementById("province").value;

      // Get the corresponding districts for the selected province (replace with your data)
      var districtOptions = getDistrictsForProvince(selectedProvince);

      // Clear existing options
      var districtSelect = document.getElementById("district");
      districtSelect.innerHTML = "";

      // Add new district options
      districtOptions.forEach(function (district) {
        var option = document.createElement("option");
        option.value = district;
        option.text = district;
        districtSelect.appendChild(option);
      });

      // Update cities based on the selected district
      updateCities();
    }

    function updateCities() {
      // Get the selected district
      var selectedDistrict = document.getElementById("district").value;

      // Get the corresponding cities for the selected district (replace with your data)
      var cityOptions = getCitiesForDistrict(selectedDistrict);

      // Clear existing options
      var citySelect = document.getElementById("city");
      citySelect.innerHTML = "";

      // Add new city options
      cityOptions.forEach(function (city) {
        var option = document.createElement("option");
        option.value = city;
        option.text = city;
        citySelect.appendChild(option);
      });
    }

    // Replace this function with actual data retrieval logic from your server
    function getDistrictsForProvince(province) {
      // Simulated data, replace with your actual data retrieval logic
      var districtData = {
        province1: ["Select-District", "Jhapa", "Ilam", "Taplejung", "Terhathum", "Bhojpur", "Khotang", "Morang", "Sunsari", " Panchthar", "Solukhumbu", "Okhaldhunga", "Udaipur"],
        province2: ["Select-District", "Parsa", "Bara", "Rautahat", "Sarlahi", "Mahotari", "Dhanusha", "Siraha", "Saptari"],
        province3: ["Select-District", "Kathmandu", "Bhaktapur", "Lalitpur"]
        // Add more provinces and districts as needed
      };

      return districtData[province] || [];
    }

 
    function getCitiesForDistrict(district) {
      
      var cityData = {
        "Jhapa": ["Select-City", "City 1", "Biratnagar", "City 3"],
        "Rautahat": ["Select-City", "City 4", "City 5", "City 6"],
        "Dhanusha": ["Select-City", "JanakpurDham", "City 8", "City 9"],
        "Kathmandu": ["Select-City", "Kathmandu", "City 8", "City 9"]
        // Add more districts and cities as needed
      };

      return cityData[district] || [];
    }

    // Initial call to populate districts based on default province
    updateDistricts();
  </script>







  <?php include("include/footer.html");?>
</body>


</html>