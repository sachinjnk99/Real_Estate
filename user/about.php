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
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .bg{
            background-color: #ff6666; 
            
            font-family: 'Arial', sans-serif;
        }

        .bg1{
            background-color: #ffcc00;
            font-family: 'Arial', sans-serif;
        }

        .bg2{
            background-color: #00ccff;
            font-family: 'Arial', sans-serif;
        }

        .bg3{
            background-color: #66ff66;
            font-family: 'Arial', sans-serif;
        }

    </style>
</head>
<body>
<?php include("include/header.php");?>
<!-- About Section -->
<section class="pt-5 mt-5">
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                <h2 class="mt-3 mb-4 text-center text-secondary">About Us</h2>
                    <div class="col-lg-6 pt-5 mt-5">
                        <img src="property/prop/house.png" class="img-fluid rounded" alt="Real Estate Management System Image">
                    </div>
                    <div class="col-lg-6 pt-5 mt-5">
                        
                        <!-- Card Box 1 -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body bg rounded">
                                        <h3 class="card-title">List Your Property</h3>
                                        <p class="card-text text-white text-justify">Property owners can easily list their properties for sale or rent on our platform. Simply fill out a form with property details, upload photos, and set your desired price or rent. Your property will be visible to potential buyers or tenants.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card Box 1 -->

                            <!-- Card Box 2 -->
                            <div class="col-md-6">
                                <div class="card mb-4 ">
                                    <div class="card-body bg1 rounded">
                                        <h3 class="card-title">Book Appointments</h3>
                                        <p class="card-text text-white text-justify">Buyers or tenants can schedule property viewings via our platform. Our booking system enables users to select convenient dates and times, streamlining the scheduling process for property visits.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card Box 2 -->
                        </div>

                        <!-- Card Box 3 and 4 -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4 ">
                                    <div class="card-body bg2 rounded">
                                        <h3 class="card-title">Request More Details</h3>
                                        <p class="card-text text-white text-justify">Users can request more details about a property directly from the owner or agent. Whether it's information about property features, pricing, or availability, our messaging system facilitates communication between users and property owners.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card Box 3 -->

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body bg3 rounded">
                                        <h3 class="card-title">Explore Agencies</h3>
                                        <p class="card-text text-white text-justify">Our platform features a comprehensive directory of real estate agencies, each with their listed properties. Users can explore different agencies, view their profiles, and browse through their property listings. This provides users with a wide range of options to find their ideal property.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card Box 4 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="px-5 mb-5">
<div class="card px-5">
 <h3 class="text-secondary mt-3"> Total User</h3>
 <h3 class="text-secondary mt-3 text-center"> Total Property</h3>
 <h3 class="text-secondary mt-3 text-right"> Total Agencies</h3>
  <div class="card-body">

  </div>
</div>
</div>
<?php include("include/footer.html");?>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-oLg1X4SJ3lqvo/I1zV2wVqwZpNY0wAxW1sRg9xuH6jVJ2TzI5z5c2QV2gy5b9Q6U" crossorigin="anonymous"></script>
</body>
</html>
