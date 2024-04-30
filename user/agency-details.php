<?php 
session_start();
isset($_SESSION["u_email"]);
include('config.php');

 ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Agencies</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link rel="stylesheet" type="text/css" href="font/css/all.css">
            <style>
    .news_style1 img {
      width: 150px; 
      height:200px;
      border-radius: 10px;
    
      display: flex;
    justify-content: center;
    }

    .custom-card {
            padding: 20px; 
            margin: 20px;
            border-radius: 0px; 
        }

    .sale {
  padding: 5px 15px;
  border-radius: 8px;
  z-index: 99;
  position: absolute;
  top: 513px;
  left: 380px;
}

.sale1 {
  padding: 5px;
  border-radius: 8px;
  position: absolute;
  top: 18px;
  left: 710px;
}

.img5{
    max-width: 200px;
    max-height: 500px;
    border-radius: 20px;

}
.sp1 {
  padding: 5px 15px;
  position: absolute;
  top: 10px;
  left: 250px;
  font-size: 12px;
}


.sp11 {
  padding: 5px 15px;
  position: absolute;
  top: 50px;
  left: 250px;
  font-size: 12px;
}
.sp2{
    font-size: 13px;

}

.sp3 {
  padding: 5px 15px;
  position: absolute;
  top: 90px;
  left: 250px;
  font-size: 15px;
}

.sp4 {
  padding: 5px 15px;
  position: absolute;
  top: 110px;
  left: 830px;
  font-size: 15px;
}
.sp5 {
  padding: 5px 15px;
  position: absolute;
  top: 110px;
  left: 930px;
  font-size: 15px;
}
.sp6 {
  padding: 5px 15px;
  position: absolute;
  top: 110px;
  left: 1030px;
  font-size: 15px;
}

.sp7 {
  padding: 5px 15px;
  position: absolute;
  top: 20px;
  left: 1110px;
  font-size: 12px;
}


.sp0 {
      padding: 5px 15px;
      position: absolute;
      top: 10px;
      left: 840px;
      font-size: 13px;
    }
  </style>
        </head>
        <body>
        <?php include("include/header.php"); ?>
    <br>
    <h2 class="card-title text-center mb-4 text-dark text-decoration-underline pt-5 mt-5"><b>Listed Agencies</b></h2>
    <div class="container pb-5">
        <div class="row justify-content-left">
            <?php 
                $query=mysqli_query($con,"SELECT * FROM user WHERE u_type='agency' AND action ='approved' ORDER BY u_id DESC LIMIT 9");
                while($row=mysqli_fetch_array($query)) {
            ?>
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="overlay-black overflow-hidden position-relative news_style img">
                            <img class="img5" src="uprofile/pp/<?php echo $row['9'];?>" alt="image">
                        </div>
                        <div class="sp1">
                 <h3 class="text-success text-capitalize"> <?php echo $row['1'];?></h3>
                                
</div>
<p class="sp11"><b><?php echo $row['7']; ?></b></p>
<h6 class="text-capitalize sp3"><i class="fa-solid fa-location-dot text-success"></i> <?php echo $row['5'];?></h6>
<h6 class="sp0">Reg. no. <?php echo $row['6']; ?></h6>
<h6 class="text-capitalize sp4"> Sale <br>
                            <?php
                                $id = $row['u_id'];
                                $sql = "SELECT COUNT(*) as count FROM property1 WHERE property1.uid = '$id' AND property_status='sale'";
                                $result = mysqli_query($con, $sql);
                                $count = mysqli_fetch_assoc($result)['count'];
                                echo $count;
                            ?>
                        </h6>
                        <h6 class="text-capitalize sp5"> Rent <br>
                        <?php
                                $id = $row['u_id'];
                                $sql = "SELECT COUNT(*) as count FROM property1 WHERE property1.uid = '$id' AND property_status='rent'";
                                $result = mysqli_query($con, $sql);
                                $count = mysqli_fetch_assoc($result)['count'];
                                echo $count;
                            ?>
                            </h6>
<h6 class="text-capitalize sp6"> Total Properties <br>
<?php
                                $id = $row['u_id'];
                                $sql = "SELECT COUNT(*) as count FROM property1 WHERE property1.uid = '$id'";
                                $result = mysqli_query($con, $sql);
                                $count = mysqli_fetch_assoc($result)['count'];
                                echo $count;
                            ?>
                            </h6>

<a class="sp7" href="agency-info.php?u_id=<?php echo $row['u_id'];?>">
            <button class="btn btn-success me-2" type="submit">Details</button>
            </a>
                    </div>
                </div>
            </div>
            <?php } ?>
      




</div> </div>

</div>  </div></div>  </div>
</div>  </div>



    </div></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>  
    <?php include("include/footer.html");?>
</body>
</html>





















