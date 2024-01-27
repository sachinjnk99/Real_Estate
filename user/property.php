<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
$error="";
$msg="";
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="page-wrapper">
    <div class="row"> 
<?php include("include/header.php");?>
<div class="full-row"> 
    <div class="container">
        <div class="row">
        
            <div class="col-lg-8">
                <div class="row">
                
                    <?php 
                    $query=mysqli_query($con,"SELECT property.*, user.u_name,user.u_type,user.uimage FROM `property`,`user` WHERE property.u_id=user.u_id");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>
                            
                    <div class="col-md-6">
                        <div class="featured-thumb hover-zoomer mb-4">
                            <div class="overlay-black overflow-hidden position-relative"> <img src="/property/<?php echo $row['16'];?>" alt="pimage">
                                
                                <div class="sale bg-success text-white">For <?php echo $row['5'];?></div>
                                <div class="price text-primary text-capitalize">$<?php echo $row['12'];?> <span class="text-white"><?php echo $row['11'];?> Sqft</span></div>
                                
                            </div><!-- FOR MORE PROJECTS visit: codeastro.com -->
                            <div class="featured-thumb-data shadow-one">
                                <div class="p-4">
                                    <h5 class="text-secondary hover-text-success mb-2 text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h5>
                                    <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i> <?php echo $row['15'];?></span> </div>
                                <div class="px-4 pb-4 d-inline-block w-100">
                                    <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By : <?php echo $row['u_name'];?></div>
                                    <div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i> <?php echo date('d-m-Y', strtotime($row['date']));?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <?php include("include/footer.html");?>
</body>
</html>