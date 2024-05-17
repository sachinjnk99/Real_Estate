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
    <link rel="stylesheet" href="style12.css">
    <link rel="stylesheet" href="style.css">
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

.bg {
    background: #1F4B8C;
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
<div class="content-2">             
<h2 class="text-secondary text-center pt-5 mt-5" >News Details</h2>
<a href=news.php>  
<button type="button" class="btn btn-primary text-right">Add News</button> </a>
<hr class="bg-dark ">                

<table id="myTable" class="table table-bordered table-hover">
        <thead>
            <tr class="bg text-white text-center">
                <th>#</th>
                <th class="text-center">Title</th>
                <th class="text-center">Sub_title</th>
                <th class="text-center">Content</th>
           
                <th class="text-center">Published_by</th>
                <th class="text-center">Date</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
    
    
        <tbody>
        <?php
            $query=mysqli_query($con,"select * from news ");
            $cnt=1;
            while($row=mysqli_fetch_row($query))
                {
        ?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $row['1']; ?></td>
                <td><?php echo $row['2']; ?></td>
                <td>
    <?php 
    // Fetch the column data
    $text = $row['4'];

    // Split the text into words
    $words = explode(' ', $text);

    // Get the first 20 words
    $first_20_words = array_slice($words, 0, 20);

    // Join the words back into a string
    $short_text = implode(' ', $first_20_words);

    // Display the short text
    echo $short_text . '...';
    ?>
</td>
              
                
                <td><?php echo $row['5']; ?></td>
                <td><?php echo $row['6']; ?></td>
                <td class="text-center"><a href="news-delete.php?id=<?php echo $row['0']; ?>"onclick='return checkdel()' > <i class="fa-solid fa-trash fa-xl text-danger"></i></a>
                <a href="news-edit.php?id=<?php echo $row['0']; ?>"onclick='return checkdel1()'> <i class="fa-solid fa-pen-to-square fa-xl mr-2" style="color: #74C0FC;"></i></a>
            
            </td>
            </tr>
            <?php
            $cnt=$cnt+1;
            } 
            ?>
           
        </tbody>
    </table>
    </div>
   

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
  function checkdel(){
    return confirm('Are you sure want to delete record ?');
  }
</script>
</body>
</html>