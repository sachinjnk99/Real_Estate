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
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="font/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        .overlay-black::before {
  display: block;
  z-index: 9;
}

.banner1 {
  width: 100%;
  height: 520px;
  min-height: 400px;
  margin-top: 20px;
}
.banner1.overlay-black::before {
  z-index: 0;
}
    </style>
</head>
<body>
    <?php include("include/header.php");?>
    
     <!--	Banner Start   -->
     <div class="overlay-black w-100 banner1 position-relative pt-5 mt-5" style="background-image: url('img/banner1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="container h-100 mt-4">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-12">
                        <div class="text-white">
                            <h1 class="mb-4"><span class="text-warning">Find Your</span><br>
                            Dream Property</h1>
                            <form method="post" action="search-prop.php">
                                <div class="row">
                                    <div class="col-md-6 col-lg-2">
                                        <div class="form-group">
                                            <select class="form-control" name="type">
                                                <option value="">Select Type</option>
												<option value="House for Sale">House For Sale</option>
												<option value="Land for sale">Land For Sale</option>
												<option value="For Rent">For Rent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2">
                                        <div class="form-group">
                                            <select class="form-control" name="stype">
                                                <option value="">Select Status</option>
												<option value="rent">Rent</option>
												<option value="sale">Sale</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="city" placeholder="Enter City Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="form-group">
                                            <button type="submit" name="filter" class="btn btn-warning w-100">Find Property</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--	Banner End  -->
        
        <?php include("property1.php");?>
    
</body>
</html>
