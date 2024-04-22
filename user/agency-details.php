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
            padding: 20px; /* Increase padding */
            margin: 20px; /* Increase margin */
            
            border-radius: 0px; /* Round the corners */
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
  left: 230px;
  font-size: 12px;
}


.sp11 {
  padding: 5px 15px;
  position: absolute;
  top: 50px;
  left: 230px;
  font-size: 12px;
}
.sp2{
    font-size: 13px;

}

.sp3 {
  padding: 5px 15px;
  position: absolute;
  top: 90px;
  left: 230px;
  font-size: 15px;
}

.sp4 {
  padding: 5px 15px;
  position: absolute;
  top: 100px;
  left: 430px;
  font-size: 15px;
}
.sp5 {
  padding: 5px 15px;
  position: absolute;
  top: 100px;
  left: 530px;
  font-size: 15px;
}
.sp6 {
  padding: 5px 15px;
  position: absolute;
  top: 100px;
  left: 630px;
  font-size: 15px;
}

.sp7 {
  padding: 5px 15px;
  position: absolute;
  top: 10px;
  left: 710px;
  font-size: 12px;
}
  </style>
        </head>
        <body>
        <?php include("include/header.php");?>
  <br>
  <h2 class="card-title text-center mb-4 text-dark text-decoration-underline pt-5 mt-5"><b>Listed Agencies</b></h2>
    
        
    <?php 
            $query=mysqli_query($con,"SELECT * FROM user Where u_type='agency' And action ='pending' ORDER BY u_id DESC LIMIT 9");
            while($row=mysqli_fetch_array($query))
                {
            ?>
            
            <div class="container pb-5">
            <div class="justify-content-right">
    
      <div class="col-lg-8">
     
      <div class="card custom-card">
     
      
   
            <div class="card-body">
        
       
            <div class="overlay-black overflow-hidden position-relative news_style img">
            <img class="img5 " src="uprofile/pp/<?php echo $row['9'];?>"  alt="image">
                </div>
            
                  <div class="sp1">
                 <h3 class="text-success text-capitalize"> <?php echo $row['1'];?></h3>
                                
</div>
<p class="sp11"><?php echo $row['7']; ?></p>
<h6 class="text-capitalize sp3"><i class="fa-solid fa-location-dot text-success"></i> <?php echo $row['5'];?></h6>
<h6 class="text-capitalize sp4"> Sale
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
            
                            
                        } 
                            ?></h6>
<h6 class="text-capitalize sp5"> Rent</h6>
<h6 class="text-capitalize sp6"> Total Properties</h6>

<a class="sp7" href="agency-info.php?u_id=<?php echo $row['u_id'];?>">
            <button class="btn btn-success me-2" type="submit">Details</button>
            </a>
                  </div></div></div> 
                  <?php } ?>  
                 



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
                 <h5 class="text-success text-capitalize"> <a href="prop-details.php?pid=<?php echo $row['0'];?>"> <?php echo $row['4'];?></a></h5>
                  
                  <p class="sp2"><b> Nrs.<?php echo $row['21']; ?>/-</b> <?php echo $row['22']; ?></p>
                  
</div>
<h6 class="sp3"> <?php echo $row['19']; ?></h6>

                  <hr class="bg-dark ">
                  
                  <?php } ?>
            </div>
            
            </div>
            
</div> </div> </div></div> </div></div> </div>
</div> </div> </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>  
        <?php include("include/footer.html");?>
</body>
 </html>
 





















