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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

.bg{
    background-color: green;
}

.bg1{
    background-color: red;
}

.delete-btn{
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
            <div class="recent-payments">
                <div class="title bg1">
                    <h2 class="text" >User Details</h2>   
                </div>

<table id="basic-datatable" class="table table-bordered table-hover">
        <thead>
            <tr class="bg text-white">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Utype</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
    
    
        <tbody>
        <?php
                
            $query=mysqli_query($con,"select * from user where u_type='user'");
            $cnt=1;
            while($row=mysqli_fetch_row($query))
                {
        ?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $row['1']; ?></td>
                <td><?php echo $row['3']; ?></td>
                <td><?php echo $row['2']; ?></td>
                <td><?php echo $row['6']; ?></td>
                <td><img src="uprofile/pp/<?php echo $row['5']; ?>" height="50px" width="50px"></td>
                <td><a href="userdelete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger">Delete</button></a></td>
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
    

</body>
</html>