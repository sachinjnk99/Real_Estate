<?php 
session_start();
isset($_SESSION["u_email"]);
include('config.php');
// Check if user is logged in (assuming you have a login system)
if(!isset($_SESSION["u_email"])) {
  header("Location: login.php");
  exit;
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
<?php include("include/header.php");?>


        <div class="content-2 py-5 mt-5 px-5">
            <div class="recent-payments pt-5 mt-5">
                <div class="title bg1">
                    <h2 class="text" >User Details</h2>   
                </div>

<table id="basic-datatable" class="table table-bordered table-hover">
        <thead>
            <tr class="bg text-white">
                <th>#</th>
                <th>Property Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Date</th>
                <th>Time</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
    
    
        <tbody>
        <?php
            $uid=$_SESSION['u_id'];
            $query=mysqli_query($con,"select * from bookappo where uid='$uid'");
            $cnt=1;
            while($row=mysqli_fetch_row($query))
                {
        ?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $row['8']; ?></td>
                <td><?php echo $row['2']; ?></td>
                <td><?php echo $row['3']; ?></td>
                <td><?php echo $row['4']; ?></td>
                <td><?php echo $row['5']; ?></td>
                <td><?php echo $row['6']; ?></td>
                <td><?php
                $longText = $row['7'];
                $wordsPerLine = 12;
                $words = explode(" ", $longText);
                $lines = [];
                for ($i = 0; $i < count($words); $i += $wordsPerLine) {
                $line = implode(" ", array_slice($words, $i, $wordsPerLine));
                $lines[] = $line;
                    }
                foreach ($lines as $line) {
                echo $line . "<br>";
                }
                ?></td>
                
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
          <?php include("include/footer.html");?>

</body>
</html>