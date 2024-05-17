<?php 
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title >Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="img/">
</head>

<body>
<?php include("header.html");?>

        <div class="content">
       
           <div class="heads" style="padding:20px;"><h1>Dashboard</h1></div> 
            <div class="cards">
         
           
                <a href="user.php">
                <div class="card">
                    <div class="box">
                        <h1> <?php           
                            // Create a SQL query to count the number of records in a table
                            $sql = "SELECT COUNT(*) as count FROM user";
            
                            // Execute the query
                            $result = mysqli_query($con, $sql);
            
                            // Get the count of the records
                            $count = mysqli_fetch_assoc($result)['count'];
            
                            // Print the count within the h1 tag
                            echo $count;
                            ?></h1>
                        <h3>User</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/user.png" style="height:90px; width:100px" alt="">
                    </div>
                </div></a>

                <a href="property.php">
                <div class="card">
                    <div class="box">
                        <h1><?php
                           // Create a SQL query to count the number of records in a table
                            $sql = "SELECT COUNT(*) as count FROM property1";
            
                            // Execute the query
                            $result = mysqli_query($con, $sql);
            
                            // Get the count of the records
                            $count = mysqli_fetch_assoc($result)['count'];
            
                            // Print the count within the h1 tag
                            echo $count;
                            ?></h1>
                        <h3>Properties</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/house.png" style="height:90px; width:100px" alt="">
                    </div>
                </div>
            </a>

            <a href="agency.php">
                <div class="card">
                    <div class="box">
                    <h1> <?php
            
            // Create a SQL query to count the number of records in a table
            $sql = "SELECT COUNT(*) as count FROM user where u_type='agency'";

            // Execute the query
            $result = mysqli_query($con, $sql);

            // Get the count of the records
            $count = mysqli_fetch_assoc($result)['count'];

            // Print the count within the h1 tag
            echo $count;
            ?></h1>
                        <h3>Agency</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/agency1.png" style="height:90px; width:100px" alt="">
                    </div>
                </div></a>



                <a href="#">
                <div class="card">
                    <div class="box">
                    <h1> <?php
            
            // Create a SQL query to count the number of records in a table
            $sql = "SELECT COUNT(*) as count FROM news";

            // Execute the query
            $result = mysqli_query($con, $sql);

            // Get the count of the records
            $count = mysqli_fetch_assoc($result)['count'];

            // Print the count within the h1 tag
            echo $count;
            ?></h1>
                        <h3>News</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/complain.png" style="height:90px; width:100px" alt="">
                    </div>
                </div></a>


                <a href="#">
                <div class="card">
                    <div class="box">
                    <h1> <?php
            
            // Create a SQL query to count the number of records in a table
            $sql = "SELECT COUNT(*) as count FROM feedback";

            // Execute the query
            $result = mysqli_query($con, $sql);

            // Get the count of the records
            $count = mysqli_fetch_assoc($result)['count'];

            // Print the count within the h1 tag
            echo $count;
            ?></h1>
                        <h3>Complain</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/" style="height:70px; width:70px" alt="">
                    </div>
                </div></a>


                <a href="#">
                <div class="card">
                    <div class="box">
                        <h1>5</h1>
                        <h3>Complain</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/" style="height:70px; width:70px" alt="">
                    </div>
                </div></a>



                <a href="#">
                <div class="card">
                    <div class="box">
                        <h1>5</h1>
                        <h3>Complain</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/" style="height:70px; width:70px" alt="">
                    </div>
                </div></a>



                <a href="#">
                <div class="card">
                    <div class="box">
                        <h1>5</h1>
                        <h3>Complain</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/" style="height:70px; width:70px" alt="">
                    </div>
                </div></a>

            </div>
        </div>
    </div>
    </div>
</body>

</html>