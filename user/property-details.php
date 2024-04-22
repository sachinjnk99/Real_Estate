<?php 
session_start();
isset($_SESSION["email"]);
include('config.php');

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link rel="stylesheet" type="text/css" href="font/css/all.css">

    <style>
  h3 {
    font-size: 15px;
    font-family: arial, sans-serif ,  verdana;
    font-family:;
  font-size: 20px;
    
  }

  h4  {
    font-size: 15px;
  }

  table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin: 4px;
}

 td, th {
  text-align: left;
  padding: 2px;
}
</style>

<style>
   .animated {
    -webkit-transition: height 0.2s;
    -moz-transition: height 0.2s;
    transition: height 0.2s;
}

.stars
{
    margin: 20px 0;
    font-size: 24px;
    color: #d17581;
}
.card1{
  background:#ebe6e6 ;
  
}
</style>

</head>

<body>
<?php include("include/header.php");?>
  
<div class="full-row">

            <div class="container mt-4">
              
                
                <div class="card1">
				
					<?php
						$id=$_REQUEST['pid']; 
						$query=mysqli_query($con,"SELECT property.*, user.* FROM `property`,`user` WHERE property.u_id=user.u_id and pid='$id'");
						while($row=mysqli_fetch_array($query))
						{
					  ?>
				  
                  <div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
    <div id="carouselExampleIndicators" class="carousel slide mt-4 pt-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="property/prop/<?php echo $row['16'];?>" class="d-block w-100 d-block w-100" style="height: 400px;"  alt="...">
          </div>
          <div class="carousel-item">
            <img src="property/prop/<?php echo $row['17'];?>" class="d-block w-100 d-block w-100" style="height: 400px;" alt="...">
          </div>
          <div class="carousel-item">
            <img src="property/prop/<?php echo $row['16'];?>" class="d-block w-100 d-block w-100" style="height: 400px;" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        </div>
        <div>
        

<table>

        <tr>
              <td><h3 class="text-muted">Description:</h3></td>
              <td><h4><small><?php echo $row['2']; ?></h4></td>
            </tr>            
          </table>
      </div>
        
</div>
<div class="col-sm-6">
  <center><h2 class="text-uppercase"><?php echo $row['3'] ?></h2></center>
  <div class="row">
    <div class="col-sm-6">

      <div class="row">
      <div class="col-sm-6">
          <table>
            <tr>
              <td><h3 class="text-muted">Country:</h3></td>
              <td><h4> Nepal<?php echo $row['0']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">Province:</h3></td>
              <td><h4><small><?php echo $row['13']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">Zone:</h3></td>
              <td><h4><small><?php echo $row['15']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">District:</h3></td>
              <td><h4><small><?php echo $row['14']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">City:</h3></td>
              <td><h4><small><?php echo $row['15']; ?></h4></td>
            </tr>
           
            <tr>
              <td><h3 class="text-muted">Ward No.:</h3></td>
              <td><h4><small><?php echo $row['0']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">Tole:</h3></td>
              <td><h4><small><?php echo $row['0']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">Mobile no.:</h3></td>
              <td><h4><small><?php echo $row['0']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">Estimated Price:</h3></td>
              <td><h4><small>Rs.<?php echo $row['12']; ?></h4></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <table>
            <tr>
              <td><h3 class="text-muted">Total Rooms:</h3></td>
              <td><h4><small><?php echo $row['0']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">Bedrooms:</h3></td>
              <td><h4><small><?php echo $row['6']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">Balcony:</h3></td>
              <td><h4><small><?php echo $row['8']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">Kitchen:</h3></td>
              <td><h4><small><?php echo $row['9']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">Bathroom:</h3></td>
              <td><h4><small><?php echo $row['7']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">Booked:</h3></td>
              <td><h4><small><?php echo $row['0']; ?></h4></td>
            </tr>
            <tr>
              <td><h3 class="text-muted">Description:</h3></td>
              <td><h4><small><?php echo $row['2']; ?></h4></td>
            </tr>            
          </table>
    </div>
  </div>  

</div>
<?php } ?>

</div>
</div>
</div></div>


<div id="page-wrapper">
    <div class="row">
     


      <div class="full-row">
        <div class="container">
          <div class="col-lg-12">
            <div class="row">
              <?php 
                    $query=mysqli_query($con,"SELECT property.*, user.u_name, user.u_type, user.uimage FROM `property`,`user` WHERE property.u_id = user.u_id && Action = 'approved' ORDER BY u_id DESC LIMIT 9");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>

              <div class="col-md-4">
                <div class="featured-thumb hover-zoomer mb-4">

                  <div class="overlay-black overflow-hidden position-relative img_style img"> <img
                      src="property/prop/<?php echo $row['16'];?>" alt="pimage">

                    <div class="sale bg-success text-white">For
                      <?php echo $row['5'];?>
                    </div>
                    <div class="price text-danger text-capitalize"><b>Rs.
                        <?php echo $row['12'];?> <span class="text-primary">
                          <?php echo $row['11'];?> Sqft
                        </span>
                      </b></div>

                  </div>

                  <div class="featured-thumb-data shadow-one">
                    <div class="p-4">
                      <h5 class="text-secondary hover-text-success mb-2 text-capitalize"><a
                          href="property-details.php?pid=<?php echo $row['0'];?>">
                          <?php echo $row['1'];?>
                        </a></h5>
                      <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i>
                        <?php echo $row['15'];?>
                      </span>
                    </div>
                    <div class="px-4 pb-4 d-inline-block w-100">
                      <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By :
                        <?php echo $row['u_name'];?>
                      </div>
                      <div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i>
                        <?php echo date('D-M-Y', strtotime($row['date']));?>
                      </div>
                    </div>
                    <div class="mb-4 <br>"> </div>

                  </div>

                </div>
              </div>
              <?php } ?>
            </div>
            </div>
              </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script> 
        <div class="mb-4"></div>                
        <?php include("include/footer.html");?>
</body>
</html>