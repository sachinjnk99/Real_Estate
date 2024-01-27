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
	$bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	//$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	//$kitc=$_POST['kitc'];
	$floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['city'];
  $dist=$_POST['dist'];
  $state=$_POST['state'];
	$asize=$_POST['size'];
	//$loc=$_POST['loc'];
	
	$status=$_POST['status'];
	$uid=$_SESSION['uid'];
	//$feature=$_POST['feature'];
	
	$totalfloor=$_POST['totalfl'];

	//$isFeatured=$_POST['isFeatured'];
	
	$aimage=$_FILES['image']['name'];
	$aimage1=$_FILES['image1']['name'];
	$aimage2=$_FILES['image2']['name'];
	$aimage3=$_FILES['image3']['name'];
	//$aimage4=$_FILES['image4']['name'];
	
	//$fimage=$_FILES['fimage']['name'];
	//$fimage1=$_FILES['fimage1']['name'];
	//$fimage2=$_FILES['fimage2']['name'];
	
	$temp_name  =$_FILES['image']['tmp_name'];
	$temp_name1 =$_FILES['image1']['tmp_name'];
	$temp_name2 =$_FILES['image2']['tmp_name'];
	$temp_name3 =$_FILES['image3']['tmp_name'];
	//$temp_name4 =$_FILES['aimage4']['tmp_name'];
	
	//$temp_name5 =$_FILES['fimage']['tmp_name'];
	//$temp_name6 =$_FILES['fimage1']['tmp_name'];
	//$temp_name7 =$_FILES['fimage2']['tmp_name'];
	
	move_uploaded_file($temp_name,"property/$aimage");
	move_uploaded_file($temp_name1,"property/$aimage1");
	move_uploaded_file($temp_name2,"property/$aimage2");
	move_uploaded_file($temp_name3,"property/$aimage3");
	//move_uploaded_file($temp_name4,"property/$aimage4");
	
	//move_uploaded_file($temp_name5,"admin/property/$fimage");
	//move_uploaded_file($temp_name6,"admin/property/$fimage1");
	//move_uploaded_file($temp_name7,"admin/property/$fimage2");
	
	$sql="insert into property (title,pcontent,type,bhk,stype,bedroom,bathroom,balcony,floor,size,price,state, district, city,image,image1,image2,image3,status,totalfloor,u_id)
	values('$title','$content','$ptype','$bhk','$stype','$bed','$bath','$balc','$floor','$asize','$price','$state',' $dist','$city','$aimage','$aimage1','$aimage2','$aimage3','$status','$totalfloor','$uid')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
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
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="card " style="border-radius: 10px;">
          <div class="card-body signup ">

            <h2 class="card-title text-center mb-4 text-dark"><b>Submit Property</b></h2>
            <?php echo $error; ?>
            <?php echo $msg; ?>

            <hr class="bg-dark">
            <h4 class="card-title text-left mb-4 text-dark">Basic Details</h4>
            <form method="post" enctype="multipart/form-data">
              <div>
                <input class="form-control" value="<?php echo $u_id;?>" required name="uid" type="hidden">
              </div>

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
                  <label class="text-dark" for="propertytype">Property Type</label>
                  <select class="form-control form-select" required name="ptype">
                    <option value="">Select Type</option>
                    <option value="apartment">Apartment</option>
                    <option value="flat">Flat</option>
                    <option value="building">Building</option>
                    <option value="house">House</option>
                    <option value="villa">Villa</option>
                    <option value="office">Office</option>
                  </select>
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
                  <label class="text-dark" for="user">Property Status</label>
                  <select class="form-control form-select" required name="stype">
                    <option value="">Select Status</option>
                    <option value="rent">Rent</option>
                    <option value="sale">Sale</option>
                  </select>
                </div>
              </div>


              <div class="row mt-3 ">
                <div class="col pb-4">
                  <label class="text-dark" for="floor">Floor</label>
                  <select class="form-control" required name="floor">
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
                  <select class="form-control" required name="totalfl">
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
                    <option value="11 Floor">11 Floor</option>
                    <option value="12 Floor">12 Floor</option>
                    <option value="13 Floor">13 Floor</option>
                    <option value="14 Floor">14 Floor</option>
                    <option value="15 Floor">15 Floor</option>
                  </select>
                </div>

                <hr class="bg-dark">
                <h4 class="card-title text-left mb-4 text-dark">Price & Location</h4>

                <div class="row mt-3">
                  <div class="col">
                    
                      <label class="text-dark" for="province">Province</label>
                      <select class="form-control" id="province" onchange="updateDistricts()" name="state"required>
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
                    <select class="form-control" id="district" onchange="updateCities()" name="dist" required>

                    </select>
                  </div>

                  <div class="col">
                    <label class="text-dark" for="email">City</label>
                    <select class="form-control" id="city" name="city" required>

                    </select>
                  </div>

                  <div class="row mt-3">
                <div class="col">
                  <label class="text-dark" for="price">Price</label>
                  <input type="text" class="form-control" placeholder="Enter the price of property" aria-label="bed" name="price"
                    required>
                </div>

                <div class="col">
                  <label class="text-dark" for="size">Size</label>
                  <input type="text" class="form-control" placeholder="Enter the of property" aria-label="propertysize"
                    name="size" required>
                </div>
              </div>
            
          </div>
        </div>

        <hr class="bg-dark">
        <h4 class="card-title text-left mb-4 text-dark">Image</h4>

        <div class="row mt-3">
          <div class="col">
            <label for="formFileLg" class="form-label">Image</label>
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
        </div>

        <div class="text-center mt-4">
          <button type="submit" name="add" class="btn btn-primary btn-lg btn-block text-center">Sign
            up</button>
        </div>
      </div>
    </div>
  </div>
</form>

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
        province2: ["Select-District", "Parsa", "Bara", "Rautahat", "Sarlahi", "Mahotari", "Dhanusha", "Siraha", "Saptari"]
        // Add more provinces and districts as needed
      };

      return districtData[province] || [];
    }

    // Replace this function with actual data retrieval logic from your server
    function getCitiesForDistrict(district) {
      // Simulated data, replace with your actual data retrieval logic
      var cityData = {
        "Jhapa": ["Select-City", "City 1", "Biratnagar", "City 3"],
        "Rautahat": ["Select-City", "City 4", "City 5", "City 6"],
        "Dhanusha": ["Select-City", "JanakpurDham", "City 8", "City 9"]
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