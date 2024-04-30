<?php 

include('config.php');

// Check if agency ID is provided in the URL
if(isset($_GET['u_id'])) {
    // Fetch agency details based on the provided ID
    $agency_id = $_GET['u_id'];
    $query = mysqli_query($con, "SELECT * FROM user WHERE u_id = $agency_id");
    $row = mysqli_fetch_array($query);
} else {
    // Redirect back to the page displaying pending agencies if no agency ID is provided
    header("Location: .php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo $row['1']; ?>
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="font/css/all.css">  
  <style>
    .img5 {
      max-width: 200px;
      max-height: 400px;
      border-radius: 20px;

    }

    .img6 {
    max-width: 100%;
    max-height: 90%;
    border-radius:5px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 60vh; /* Adjust as needed */

    }


    .sp1 {
      padding: 5px 15px;
      position: absolute;
      top: 10px;
      left: 230px;
      font-size: 12px;
    }

    .sp3 {
      padding: 5px 15px;
      position: absolute;
      top: 120px;
      left: 230px;
      font-size: 15px;
}
    
    .sp8 {
      padding: 5px 15px;
      position: absolute;
      top: 85px;
      left: 230px;
      font-size: 15px;
    }

    .sp9 {
      padding: 5px 15px;
      position: absolute;
      top: 10px;
      left: 980px;
      font-size: 20px;
    }

    .sp0 {
      padding: 5px 15px;
      position: absolute;
      top: 10px;
      left: 780px;
      font-size: 13px;
    }

   
  </style>
</head>

<body>
<?php include("header.html");?>
  <div class="container pt-5 mt-5 pb-5">
    <div class="row justify-content-right">
      <div class="col-lg-12">
        <div class="card custom-card" style="border-radius: 10px;">
          <div class="card-body">
            <div class="overlay-black overflow-hidden position-relative news_style img">
              <img class="img5 " src="../user/uprofile/pp/<?php echo $row['9'];?>" alt="image">
            </div>

            <div class="sp1">
              <h2 class="text-success text-capitalize">
                <?php echo $row['1'];?>
              </h2>
              <p><b>
                  <?php echo $row['7']; ?>
                </b></p><br>

            </div>
            <h6 class="sp8"><i class="fa-solid fa-envelope text-success"></i>
              <?php echo $row['3']; ?>
              </<h6>
              <h6 class="text-capitalize sp3"><i class="fa-solid fa-location-dot text-success"></i>
                <?php echo $row['5'];?>
              </h6>
              
              <h6 class="sp9"><i class="fa-solid fa-phone text-success"></i>
                <?php echo $row['2']; ?>
                </<h6>
                <h6 class="sp0">Reg. no.
                  <?php echo $row['6']; ?>
                  </<h6>

          </div>
          
            <a class="text-center mb-4 me-5" href="approved-agency.php?u_id=<?php echo $row['0']; ?>"><button class="btn btn-success">Approved</button></a>
        </div>
      </div>
  
  <div class="overlay-black overflow-hidden position-relative pt-2">
              <img class="img6 " src="../user/uprofile/pp/<?php echo $row['8'];?>" alt="image">
            </div>
             </div>
  </div>
  </div>
    </div>   
    
  </div>
    </div>  
                      
  

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"></script>
    <div class="mb-4"></div>
</body>

</html>