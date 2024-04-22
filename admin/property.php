<?php 
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">

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

    </style>
</head>
<body>
<?php include("header.html");?>
<div class="container">
        <div class="header">
            <div class="nav">
          
            </div>
        </div>

        <div class="content-2">
            <div class="recent-payments ">
                <div class="title bg2">
                    <h2 class="text-white" >Pending Properties Details</h2>   
                    <a href=""><button class="btn1 btn-sucess float-right bg2">Add Property</button></a>
                    
                </div>

<table id="basic-datatable" class="table table-bordered table-hover">
        <thead>
            <tr class="bg">
                <th>#</th>
                <th>Title</th>
                <th>Type</th>
                <th>BHK</th>
                <th>Condition</th>
                <th>Area</th>
                <th>Price</th>
                <th>Location</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Action</th>
                
            </tr>
        </thead>
    
    
        <tbody>

        <?php 
                    $query=mysqli_query($con,"SELECT property1.*, user.u_name, user.u_type, user.uimage FROM `property1`,`user` WHERE property1.uid = user.u_id && p_status = 'pending'");
                    $cnt=1;
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>
      
      
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $row['2']; ?></td>
                <td><?php echo $row['4']; ?></td>
                <td><?php echo $row['13']; ?></td>
                <td><?php echo $row['5']; ?></td>
                <td><?php echo $row['25']; ?></td>
                <td><?php echo $row['21']; ?></td>
                <td><?php echo $row['19']; ?></td>
                <td><?php echo $row['38']; ?></td>
                <td><?php echo $row['42']; ?></td>
                
                <td><a href="view-property.php?pid=<?php echo $row['0'];?>"><button class="btn btn-sucess">View</button></a>
                <a href="propertydelete.php?pid=<?php echo $row['0'];?>"><button class="btn btn-danger">Delete</button></a>
        
            </tr>
            <?php
            $cnt=$cnt+1;
            } 
            ?>
           
        </tbody>
    </table>
    </div>
            </div>
         
    

    

          <div class="content-2">
            <div class="recent-payments ">
                <div class="title bg">
                    <h2 class="text-white" > Approved Properties Details</h2>   
                    
                    
                </div>

<table id="basic-datatable" class="table table-bordered table-hover">
        <thead>
            <tr class="bg">
                <th>#</th>
                <th>Title</th>
                <th>Type</th>
                <th>BHK</th>
                <th>Condition</th>
                <th>Area</th>
                <th>Price</th>
                <th>Location</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Action</th>
                
            </tr>
        </thead>
    
    
        <tbody>
        <?php 
                    $query=mysqli_query($con,"SELECT property1.*, user.u_name, user.u_type, user.uimage FROM `property1`,`user` WHERE property1.uid = user.u_id && p_status = 'approved'");
                    $cnt=1;
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $row['2']; ?></td>
                <td><?php echo $row['4']; ?></td>
                <td><?php echo $row['13']; ?></td>
                <td><?php echo $row['5']; ?></td>
                <td><?php echo $row['25']; ?></td>
                <td><?php echo $row['21']; ?></td>
                <td><?php echo $row['19']; ?></td>
                <td><?php echo $row['38']; ?></td>
                <td><?php echo $row['42']; ?></td>
                
                <td><a href="view-property.php?pid=<?php echo $row['0'];?>"><button class="btn btn-sucess">view</button></a>
                
                </td>
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
          </div>
    

</body>
</html>