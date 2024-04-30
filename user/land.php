<?php 

include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="font/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="style.css">

  <style>
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
<?php include("include/header.php");?>  
    <div id="page-wrapper">
      <div class="row">
        <div class="full-row">
          <div class="container pt-5 mt-5 mb-4">
            <h4 class=" text-secondary position-relative  text-center px-3 mb-5 mt-3">Land For Sale</h4>
            <div class="justify-content-center">
              <div class="col-lg-12">
                <div class="row">
                  <?php 
                    $query=mysqli_query($con,"SELECT property1.*, user.u_name, user.u_type, user.uimage FROM `property1`,`user` WHERE property1.uid = user.u_id && property_type='land for sale' && p_status = 'approved' ORDER BY pid DESC ");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>

                  <div class="col-md-4">
                    <div class="featured-thumb hover-zoomer mb-2">

                      <div class="overlay-black overflow-hidden position-relative img_style img"> <img
                          src="property/prop/<?php echo $row['30'];?>" alt="pimage">

                        <div class="sale bg-success text-white">For
                          <?php echo $row['35'];?>
                        </div>
                      </div>

                      <div class="featured-thumb-data shadow-one">
                        <div class="p-4">
                          <span class="float-right price1 text-capitalize  ">
                            <b>NRs.
                              <?php echo $row['21'];?>
                            </b> <br>
                            <span class="price1">
                              <?php echo $row['25'];?>-
                              <?php echo $row['24'];?>
                            </span>
                          </span>
                          <h5 class="text-secondary hover-text-success mb-2 text-capitalize ">
                          <a href="prop-details.php?pid=<?php echo $row['0'];?>&uid=<?php echo $row['1'];?>"> <?php echo $row['4'];?></a></h5>

                          <span class="location text-capitalize  "><i class="fas fa-map-marker-alt text-success"></i>
                            <?php echo $row['18'];?>,
                            <?php echo $row['19'];?>
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
          </div>
        </div>

            <?php include("include/footer.html");?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
              integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
              crossorigin="anonymous"></script>

</body>

</html>