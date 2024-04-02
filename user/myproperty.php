<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['u_email']))
{
	header("location:login.php");
}								
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
.delete-btn, .update-btn {
  color: white;
  border: none;
  padding: 5px 10px;
  margin-right: 10px;
  border-radius: 3px;
  cursor: pointer;
}

.delete-btn{
    background-color: red;
}
.bg{
    background-color: green;
}
.bg2{
    background-color: red;
    
}

.update-btn{
    background-color: green;
}

.delete-btn:hover{
  background-color: darkred;
}

.update-btn:hover{
  background-color: darkgreen;
}

td form {
  display: inline-block;
}

.img1 {
      width: 120px; 
      height:80px;
      border-radius: 0px;
    }

    </style>
</head>
<body>
<?php include("include/header.php");?>
<div class="container mt-4 pt-5">
        <div class="header mt-5">
            <div class="nav">
          
            </div>
        </div>

        <div class="content-2">
            <div class="recent-payments ">
                <div class="title bg2">
                    <h2 class="text" > Listed Properties</h2>   
                    <a href=""><button class="btn1 btn-sucess float-right bg2">Add Property</button></a>
                    
                </div>

<table id="basic-datatable" class="table table-bordered table-hover">
        <thead>
            <tr class="bg">
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Type</th>
                <th>BHK</th>
                <th>SR</th>
                <th>Area</th>
                <th>Price</th>
                <th>Location</th>
                <th>Added Date</th>
                <th>Status</th>
                <th>Action</th>
                
            </tr>
        </thead>
    
    
        <tbody>

        <?php 
                            $cnt=$cnt+1;
							$uid=$_SESSION['u_id'];
							$query=mysqli_query($con,"SELECT * FROM `property` WHERE u_id='$uid'");
								while($row=mysqli_fetch_array($query))
								{
							?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><img class="img1" src="property/prop/<?php echo $row['17'];?>" alt="pimage"></td>
                <td><?php echo $row['1']; ?></td>
                <td><?php echo $row['3']; ?></td>
                <td><?php echo $row['4']; ?></td>
                <td><?php echo $row['5']; ?></td>
                <td><?php echo $row['11']; ?></td>
                <td><?php echo $row['12']; ?></td>
                <td><?php echo $row['15']; ?></td>
                <td><?php echo $row['23']; ?></td>
                <td><?php echo $row['20']; ?></td>
                
                <td><a href="propertyedit.php?id=<?php echo $row['0'];?>"><button class="btn btn-success">Edit</button></a>
                <a href="propertydelete.php?id=<?php echo $row['0'];?>"><button class="btn btn-danger">Delete</button></a></td>
            </tr>
            <?php
             $cnt=$cnt+1;
            } 
            ?>
           
        </tbody>
    </table>
    </div>
            </div>
          </div>
    
          <?php include("include/footer.html");?>
</body>
</html>