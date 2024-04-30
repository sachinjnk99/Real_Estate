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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

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
    background: #1F4B8C;
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


<div class="content-2">             
<h2 class="text-secondary text-center pt-2" >Pending Property Details</h2>  
<a href="submitprop.php"><button class="btn btn-success float-right">Add Property</button></a> 
<hr class="bg-dark ">              

<table id="basic-datatable" class="table table-bordered table-hover">
        <thead>
            <tr class="bg text-white text-center">
                <th>#</th>
                <th class="text-center">Title</th>
                <th class="text-center">Type</th>
                <th class="text-center">BHK</th>
                <th class="text-center">Condition</th>
                <th class="text-center">Area</th>
                <th class="text-center">Price</th>
                <th class="text-center">Location</th>
                <th class="text-center">Contact</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
    $query=mysqli_query($con,"SELECT property1.*, user.u_name, user.u_type, user.uimage FROM `property1`,`user` WHERE property1.uid = user.u_id && p_status = 'pending'");
    $cnt=1;
    if(mysqli_num_rows($query) > 0) {
        while($row=mysqli_fetch_array($query)) {
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
                <a href="propertydelete.php?pid=<?php echo $row['0'];?>"><button class="btn btn-danger">Delete</button></a></td>
            </tr>
<?php
            $cnt=$cnt+1;
        }
    } else {
        echo "<tr><td colspan='11'>No property Found</td></tr>";
    }
?>       
        </tbody>
    </table>
   



           
<h4 class="text-secondary pt-5 mt-5" > Approved Properties Details</h4>   
<hr class="bg-dark ">
<table id="basic-datatable" class="table table-bordered table-hover">
        <thead>
            <tr class="bg text-white text-center">
                <th>#</th>
                <th class="text-center">Title</th>
                <th class="text-center">Type</th>
                <th class="text-center">BHK</th>
                <th class="text-center">Condition</th>
                <th class="text-center">Area</th>
                <th class="text-center">Price</th>
                <th class="text-center">Location</th>
                <th class="text-center">Contact</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
                
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