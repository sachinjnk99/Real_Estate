<?php 
session_start();
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
  <link rel="stylesheet" type="text/css" href="style2.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    
    
  <link rel="stylesheet" type="text/css" href="font/css/all.css"> 
  <style>
    .news_style1 img {
      width: 150px;
      height: 200px;
      border-radius: 10px;

      display: flex;
      justify-content: center;
    }

    .sale {
      padding: 5px 15px;
      border-radius: 8px;
      z-index: 99;
      position: absolute;
      top: 513px;
      left: 280px;
     
    }

    .custom-card {
      padding: 15px;
      margin: 15px;
      border-radius: 0px;
    }

    .sale1 {
      padding: 5px;
      border-radius: 8px;
      position: absolute;
      top: 18px;
      left: 710px;
    }

    .img5 {
      max-width: 200px;
      max-height: 400px;
      border-radius: 20px;

    }

    .sp1 {
      padding: 5px 15px;
      position: absolute;
      top: 10px;
      left: 230px;
      font-size: 12px;
    }

    .sp2 {
      font-size: 13px;

    }

    .sp3 {
      padding: 5px 15px;
      position: absolute;
      top: 110px;
      left: 230px;
      font-size: 15px;
    }

    .sp4 {
      padding: 5px 15px;
      position: absolute;
      top: 110px;
      left: 720px;
      font-size: 15px;
    }

    .sp5 {
      padding: 5px 15px;
      position: absolute;
      top: 110px;
      left: 820px;
      font-size: 15px;
    }

    .sp6 {
      padding: 5px 15px;
      position: absolute;
      top: 110px;
      left: 920px;
      font-size: 15px;
    }

    .sp7 {
      padding: 5px 15px;
      position: absolute;
      top: 10px;
      left: 740px;
      font-size: 12px;
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
      left: 880px;
      font-size: 20px;
    }

    .sp0 {
      padding: 5px 15px;
      position: absolute;
      top: 10px;
      left: 700px;
      font-size: 13px;
    }

    .sp01 {
      padding: 5px 15px;
      position: absolute;
      top: 130px;
      left: 725px;
      font-size: 20px;
    }

    .sp02 {
      padding: 5px 15px;
      position: absolute;
      top: 130px;
      left: 825px;
      font-size: 20px;
    }

    .sp03 {
      padding: 5px 15px;
      position: absolute;
      top: 130px;
      left: 925px;
      font-size: 20px;
    }

    .price1 {
      color: rgb(12, 147, 16);
    }

    .container {
      padding-top: 5px;
    }


    .full-row {
      position: relative;
      width: 100%;
      padding: 10px;
    }
  </style>
</head>

<body>
<div class="text-left pl-5 ml-5 pt-5">

<a href="dasboard.php"><b>Dashboard</b></a>/<a  href="agency.php"><b>Agency</b></a>/<a class="text-secondary"><b>Agency-view</b></a>
</div>
  <div class="container pt-4  pb-5">
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
              <h6 class="text-capitalize sp4"> Sale</h6>
              <h6 class="text-capitalize sp5"> Rent</h6>
              <h6 class="text-capitalize sp6"> Total Properties</h6>
              <h6 class="sp9"><i class="fa-solid fa-phone text-success"></i>
                <?php echo $row['2']; ?>
                </<h6>
                <h6 class="sp0">Reg. no.
                  <?php echo $row['6']; ?>
                  </<h6>


                  <h1 class="sp01">
                    <?php
                           
                            if(isset($_REQUEST['u_id'])) {
                                // Fetch agency details based on the provided ID
                                $id = $_REQUEST['u_id'];
                            // Create a SQL query to count the number of records in a table
                            $sql = "SELECT COUNT(*) as count FROM property1 Where property1.uid = '$id' And property_status='sale'";
            
                            // Execute the query
                            $result = mysqli_query($con, $sql);
            
                            // Get the count of the records
                            $count = mysqli_fetch_assoc($result)['count'];
            
                            // Print the count within the h1 tag
                            echo $count;     
                        }  ?>
                  </h1>

                  <h1 class="sp02">
                    <?php
            if(isset($_GET['u_id'])) {
                // Fetch agency details based on the provided ID
                $id = $_REQUEST['u_id'];
                            // Create a SQL query to count the number of records in a table
                            $sql = "SELECT COUNT(*) as count FROM property1 Where property1.uid = '$id' And property_status='rent' ";
            
                            // Execute the query
                            $result = mysqli_query($con, $sql);
            
                            // Get the count of the records
                            $count = mysqli_fetch_assoc($result)['count'];
            
                            // Print the count within the h1 tag
                            echo $count;                          
                         } ?>
                  </h1>

                  <h1 class="sp03">
                    <?php
            
            if(isset($_GET['u_id'])) {
              // Fetch agency details based on the provided ID
              $id = $_REQUEST['u_id'];
                            // Create a SQL query to count the number of records in a table
                            $sql = "SELECT COUNT(*) as count FROM property1 Where property1.uid = '$id'  ";
            
                            // Execute the query
                            $result = mysqli_query($con, $sql);
            
                            // Get the count of the records
                            $count = mysqli_fetch_assoc($result)['count'];
            
                            // Print the count within the h1 tag
                            echo $count;
                             }  ?>
                  </h1>

          </div>
        </div>
      </div>
    </div>
  </div>
 
  </div>
    </div>   </div>
    </div>  



  <div id="page-wrapper">
    <div class="full-row">
      <div class="container">
        <div class="justify-content-center ">
          <div class="col-lg-12">
          <div class="row">
    <?php
    if(isset($_GET['u_id'])){
        $id = $_REQUEST['u_id'];
        $sql=mysqli_query($con,"SELECT property1.*, user.u_name, user.u_type, user.uimage FROM `property1`,`user` WHERE property1.uid = '$id' AND property1.uid = user.u_id AND p_status = 'approved'");
        while($row=mysqli_fetch_array($sql)) {
    ?>
    <div class="col-md-4">
        <div class="featured-thumb hover-zoomer mb-2">
            <div class="overlay-black overflow-hidden position-relative img_style img"> 
                <img src="../user/property/prop/<?php echo $row['30'];?>" alt="pimage">
                <h6 class="sale bg-success text-white">For <?php echo $row['35'];?></h6>
            </div>
            <div class="featured-thumb-data shadow-one">
                <div class="p-4">
                    <span class="float-right price1 text-capitalize  ">
                        <b>NRs. <?php echo $row['21'];?></b> <br>
                        <span class="price1"><?php echo $row['25'];?>-<?php echo $row['24'];?></span>
                    </span>
                   
                   <h5> <a href="prop-details.php?pid=<?php echo $row['0'];?>&uid=<?php echo $row['1'];?>&u_name=<?php echo $row['u_name'];?>"> <?php echo $row['4'];?></a></h5>
                    <span class="location text-capitalize  ">
                        <i class="fas fa-map-marker-alt text-success"></i>
                        <?php echo $row['18'];?>, <?php echo $row['19'];?>
                    </span>
                </div>
                <div class="px-4 pb-4 d-inline-block w-100">
                    <div class="float-left text-capitalize">
                        <i class="fas fa-user text-success mr-1"></i>By : <?php echo $row['u_name'];?>
                    </div>
                    <div class="float-right">
                        <i class="far fa-calendar-alt text-success mr-1"></i>
                        <?php echo date('D-M-Y', strtotime($row['date']));?>
                    </div>
                </div>
                <div class="mb-4 <br>"></div>
            </div>
        </div>
    </div>
    <?php }} ?>
</div>

      </div>
    </div>
    </div>
    </div> </div>
    </div>
          

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"></script>
    <div class="mb-4"></div>
</body>

</html>