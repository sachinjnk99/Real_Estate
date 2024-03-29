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
    
    <link rel="stylesheet" type="text/css" href="font/css/all.css">

    <style>
  h3 {
    font-size: 20px;
  }

  h4  {
    font-size: 20px;
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
  background:red;
  
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
        



</div>
<div class="col-sm-6">
  <center><h2><?php echo $row['3'] ?></h2></center>
  <div class="row">
    <div class="col-sm-6">

      <div class="row">
      <div class="col-sm-6">
          <table>
            <tr>
              <td><h3>Country:</h3></td>
              <td><h4> Nepal<?php echo $row['0']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Province:</h3></td>
              <td><h4><?php echo $row['13']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Zone:</h3></td>
              <td><h4><?php echo $row['15']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>District:</h3></td>
              <td><h4><?php echo $row['14']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>City:</h3></td>
              <td><h4><?php echo $row['15']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>VDC/Municipality:</h3></td>
              <td><h4><?php echo $row['15']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Ward No.:</h3></td>
              <td><h4><?php echo $row['0']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Tole:</h3></td>
              <td><h4><?php echo $row['0']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Contact No.:</h3></td>
              <td><h4><?php echo $row['0']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Estimated Price:</h3></td>
              <td><h4>Rs.<?php echo $row['12']; ?></h4></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <table>
            <tr>
              <td><h3>Total Rooms:</h3></td>
              <td><h4><?php echo $row['0']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Bedrooms:</h3></td>
              <td><h4><?php echo $row['6']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Balcony:</h3></td>
              <td><h4><?php echo $row['8']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Kitchen:</h3></td>
              <td><h4><?php echo $row['9']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Bathroom:</h3></td>
              <td><h4><?php echo $row['7']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Booked:</h3></td>
              <td><h4><?php echo $row['0']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Description:</h3></td>
              <td><h4><?php echo $row['2']; ?></h4></td>
            </tr>            
          </table>
    </div>
  </div>  

</div>
<?php } ?>

</div>
</div>
</div></div>




                  
                        
                        

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script> 
        <div class="mb-4"></div>                
        <?php include("include/footer.html");?>
</body>
</html>