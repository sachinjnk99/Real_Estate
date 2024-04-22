<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();

include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>news</title>
  <link rel="stylesheet" type="text/css" href="font/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    .news_style img {
      width: 405px; 
      height:200px;
      border-radius: 0px;
      align-items: center;
    
    }

    .container{
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
  <div id="page-wrapper ">
    <div class="row">
      <?php include("include/header.php");?>
      

      <div class="full-row mt-5">
        <div class="container pt-5">
          <div class="col-lg-12">
            <div class="row">
            <h2 class="text-center pb-4">Latest News</h2>
              <?php 
                    $query=mysqli_query($con,"SELECT * FROM news ORDER BY published_at DESC LIMIT 5");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>

              <div class="col-md-4">
                <div class="featured-thumb hover-zoomer mb-4">

                  <div class="overlay-black overflow-hidden position-relative news_style img"> <img
                      src="img/<?php echo $row['3'];?>" alt="news_Image">
                  </div>

                  <div class="featured-thumb-data shadow-one">
                    <div class="p-4">
                      <h5 class="text-black  mb-2  ">
                        <a href="news-details.php?id=<?php echo $row['0'];?>"> <?php echo $row['1'];?></a></h5>
                          
                      <span class="location text-capitalize  "><i class=" text-success"></i>
                        <?php echo $row['2'];?>
                      </span>
                    </div>
                    <div class="px-4 pb-4 d-inline-block w-100">
                      <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i> Published By :
                        <?php echo $row['5'];?>
                      </div>
                      <div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i>
                        <?php echo date('D-M-Y', strtotime($row['6']));?>
                      </div>
                    </div>
                    <div class="mb-4 <br>"> </div>

                  </div>

                </div>
              </div>
              <?php } ?>
            </div>
            </div>
              </div></div>
       











      <?php include("include/footer.html");?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

</body>

</html>