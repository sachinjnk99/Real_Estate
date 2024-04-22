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
  <title>calculator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <?php include("include/header.php");?>

  <div class="container mt-5 pt-5">
    <div class="row justify-content-center py-5">
      <div class="col-lg-6">
        <div class="card " style="border-radius: 10px;">
          <div class="card-body signup ">
            <h2 class="card-title text-center mb-4 text-dark"><b>Instalment Calculator</b></h2>
            <form class="d-inline-block w-100" action="calc.php" method="post">
            <hr class="bg-dark">
            <form method="post" enctype="multipart/form-data">


              <div class="row mt-3">
                <div class="col">
                  <label class="text-dark">Property Price</label>
                  <input type="text" class="form-control" placeholder="Enter Property Price" aria-label="amount"
                    name="amount" required>
                </div>

                <div class="mt-3">
                  <label class="text-dark" class="form-label">Duration Months</label>
                  <input type="text" class="form-control" placeholder="Enter Duration months" aria-label="month"
                    name="month" required>
                </div>

                <div class="mt-3">
                  <label class="text-dark">Intrest Rate</label>
                  <input type="text" class="form-control" placeholder="Enter intrest rate" aria-label="rate" name="rate" required>
                </div>

                <div class="text-center mt-4">
          <button type="submit" value="submit" name="calc"  class="btn btn-primary btn-lg btn-block text-center">Calculate Instalment</button>
        </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <?php include("include/footer.html");?>

</body>


</html>