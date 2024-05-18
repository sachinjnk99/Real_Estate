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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="font/css/all.css">
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
    background-color: #6495ED;
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
                <div class="title text-center">
                    <h2 class="text-secondary" >Appointment View</h2>   
                </div>
                <hr class="bg-dark">

<table id="myTable1" class="table table-bordered table-hover">
        <thead>
            <tr class="bg text-white text-center">
                <th>#</th>
                <th>Property Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Date</th>
                <th>Time</th>
                <th>Message</th>
                <th>owner</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    
    
        <tbody>
        <?php
            $uid=$_SESSION['u_id'];
            $query=mysqli_query($con,"select * from bookappo where owner_id='$uid'");
            $cnt=1;
            if(mysqli_num_rows($query) > 0) {
            while($row=mysqli_fetch_row($query))
                {
        ?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td class="text-center" > <a href="prop-details.php?pid=<?php echo $row['8'];?>&uid=<?php echo $row['1'];?>&u_name=<?php echo $row['10'];?>">REMS-<?php echo $row['8']; ?></a></td>
                <td><?php echo $row['2']; ?></td>
                <td><?php echo $row['3']; ?></td>
                <td class="text-center"><?php echo $row['4']; ?></td>
                <td class="text-center"><?php echo $row['5']; ?></td>
                <td class="text-center"><?php echo $row['6']; ?></td>
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
                <td class="text-center text-success"><?php echo $row['10']; ?></td>
                <td class="text-center"><?php echo $row['11']; ?></td>
                <td><a href="accept-booking.php?b_id=<?php echo $row['0'];?>&pid=<?php echo $row['8']; ?>&uid=<?php echo $row['1']; ?>" onclick='return checkdel1()'><i class="fa-solid fa-square-check fa-xl ms-3 me-3"></i></a>  <a href="cencle-booking.php?b_id=<?php echo $row['0'];?>&pid=<?php echo $row['8']; ?>&uid=<?php echo $row['1']; ?>" onclick='return cancle()'><i class="fa-solid fa-xmark fa-xl" style="color: #ff643d;"></i></a> </td>
            </tr>
            <?php
            $cnt=$cnt+1;
            }} else {
                echo "<tr><td  colspan='11'>No Details Found</td></tr>";
            }
            ?>
           
        </tbody>
    </table>
    </div>
            </div>
          </div>





          <div class="content-2 py-2 px-5 mb-5">
            <div class="recent-payments pt-2">
            <div class="title text-center">
                    <h2 class="text-secondary" >Appointment Request</h2>   
                </div>
                <hr class="bg-dark">

<table id="myTable" class="table table-bordered table-hover">
        <thead>
            <tr class="bg text-white text-center">
                <th>#</th>
                <th>Property Id</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Date</th>
                <th>Time</th>
                <th>Message</th>
                <th>owner</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    
    
        <tbody>
        <?php
            $uid=$_SESSION['u_id'];
            $query=mysqli_query($con,"select * from bookappo where uid='$uid'");
            $cnt=1;
            if(mysqli_num_rows($query) > 0) {
            while($row=mysqli_fetch_row($query))
                {
        ?>
            <tr >
                <td><?php echo $cnt; ?></td>

                <td class="text-center" > <a href="prop-details.php?pid=<?php echo $row['8'];?>&uid=<?php echo $row['1'];?>&u_name=<?php echo $row['10'];?>">REMS-<?php echo $row['8']; ?></a></td>
                <td><?php echo $row['2']; ?></td>
                <td ><?php echo $row['4']; ?></td>
                
                <td class="text-center"><?php echo $row['5']; ?></td>
                <td class="text-center"><?php echo $row['6']; ?></td>
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
                 <td class="text-center text-success"><?php echo $row['10']; ?></td>
                <td class="text-center text-success"><?php echo $row['11']; ?></td> 
                <td> <a href="del-appo.php?uid=<?php echo $row['1']; ?>&&b_id=<?php echo $row['0']; ?>" onclick='return checkdel()'><i class="fa-solid fa-trash fa-xl text-center ms-4" style="color: #da1629;"></i></a></td>
            </tr>
            <?php
            $cnt=$cnt+1;
            } }else {
                echo "<tr ><td colspan='11'>No Details Found</td></tr>";
            }
            ?>
           
        </tbody>
    </table>
    </div>
            </div>
          </div>
          <script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });

  function checkdel(){
    return confirm('Are you sure want to delete record ?');
  }

  function checkdel1(){
    return confirm('Are you sure want to Accept ?');
  }

  function cancle(){
    return confirm('Are you sure want to Cancle ?');
  }

</script>
          <?php include("include/footer.html");?>

</body>
</html>