<?php 

include('config.php');


 ?>



<?php
$id=$_REQUEST['pid']; 
$query=mysqli_query($con,"SELECT property1.*, user.* FROM `property1`,`user` WHERE property1.uid=user.u_id and pid='$id'");
while($row=mysqli_fetch_array($query))
{
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $row['title']; ?></title>
            <link rel="stylesheet" type="text/css" href="style2.css">
            <link rel="stylesheet" type="text/css" href="font/css/all.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <style>
    .news_style img {
      width: 600px; 
      height:400px;
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
  left: 950px;
}

.img5{
    max-width: 80px;
    max-height: 80px;

}
.sp1 {
  padding: 5px 15px;
  position: absolute;
  top:-10px;
  left: 95px;
  font-size: 12px;
}
.sp2{
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
  left: 720px;
  font-size: 20px;
}

.kitch {
  padding: 5px 15px;
  position: absolute;
  top: 710px;
  left: 820px;
  font-size: 20px;
}

.bath {
  padding: 5px 15px;
  position: absolute;
  top: 710px;
  left: 920px;
  font-size: 20px;
}

  </style>
        </head>
        <body>
        <?php include("header.html");?>
        
  <br>
 

  <div class="container pt-5 mt-5 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card " style="border-radius: 10px;">
          <div class="card-body signup ">
            
          <h3 class="text-primary text-capitalize"><?php echo $row['4']; ?></h3> 
          <div class="sale1 bg-warning text-white">
                     <b> <?php echo $row['5'];?></b>
                    </div>
           <h6 class="text-success"><?php echo $row['26'];?> feet - With <?php echo $row['26'];?> feet Road</h6>
           

          <div id="carouselExampleIndicators" class="carousel slide mt-2 pt-2 mb-3" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../user/property/prop/<?php echo $row['30'];?>" class="d-block w-100 d-block w-100" style="height: 400px;"  alt="...">
          </div>
          <div class="carousel-item">
            <img src="../user/property/prop/<?php echo $row['31'];?>" class="d-block w-100 d-block w-100" style="height: 400px;" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../user/property/prop/<?php echo $row['32'];?>" class="d-block w-100 d-block w-100" style="height: 400px;" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../user/property/prop/<?php echo $row['33'];?>" class="d-block w-100 d-block w-100" style="height: 400px;" alt="...">
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

        <h4><i class="fa-solid fa-tag text-info"></i> Nrs.<?php echo $row['21']; ?>/- <?php echo $row['22']; ?></h4>
        <div class="sale bg-success text-white">
                     <b> <?php echo $row['23'];?></b>
                    </div>

                    <h7 class="text-capitalize"><i class="fa-solid fa-location-dot text-success"></i></i> <?php echo $row['17'];?>, <?php echo $row['18']; ?>, <?php echo $row['19']; ?></h7>
                    <hr class="bg-dark ">
            <h4 class="text text-decoration-underline ">Faclities:</h4>
            <h6><?php echo $row['27']; ?></h6>
            
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



<h7 class="bed"><i class="fa-solid fa-bed text-success"></i><br><?php echo $row['9'];?></h7><br>
<h7 class="kitch"><i class="fa-solid fa-kitchen-set text-success"></i><br><?php echo $row['10'];?></h7>
<h7 class="bath"><i class="fa-solid fa-bath text-success"></i> <br><?php echo $row['12'];?></h7>

            <hr class="bg-dark ">                
                        

            <a href="approved-property.php?pid=<?php echo $row['0'];?>"><button type="button" class="btn btn-success">Approved</button></a>
 </div><?php } ?> </div> </div> </div> </div> </div> 








 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
         
</body>
 </html>





















