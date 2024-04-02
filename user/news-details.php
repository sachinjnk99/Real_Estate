<?php
// Step 1: Connect to the Database
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "real";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Retrieve News Details
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $news_id = $_GET['id'];
    echo "News ID: " . $news_id;
    $sql = "SELECT * FROM news WHERE id = $news_id";
    $result = mysqli_query($conn, $sql);

    // Check for errors
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Step 3: Display News Details
        $row = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $row['title']; ?></title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link rel="stylesheet" type="text/css" href="font/css/all.css">
            <style>
    .news_style img {
      width: 600px; 
      height:400px;
      border-radius: 0px;
    
      display: flex;
    justify-content: center;
   
    
    }
  </style>
        </head>
        <body>
        <?php include("include/header.php");?>
  <br>
 

  <div class="container pb-5">
    <div class="row justify-content-right">
      <div class="col-lg-8">
        <div class="card " style="border-radius: 10px;">
          <div class="card-body signup ">
            
            
            <div class="overlay-black overflow-hidden position-relative news_style img mb-4">
                 <img src="img/<?php echo $row['image'];?>" alt="news_Image">
                  </div>
            <h1><?php echo $row['title']; ?></h1>
            <div class="px-4 pb-4 d-inline-block w-100">
                      <div class="float-left text-capitalizen text-bold"><i class="fas fa-user text-success mr-1"></i> Author :
                        <?php echo $row['published_by'];?>
                      </div>
                      <div class="float-right rext-bold mb-5"><i class="far fa-calendar-alt text-success mr-1"></i>
                        <?php echo date('D-M-Y', strtotime($row['published_at']));?>
                      </div>
            <p><?php echo $row['content']; ?></p>
            <!-- You can display other details as needed -->
        
        <?php
    } else {
        echo "No news found with ID: $news_id";
    }
} else {
    echo "No news ID specified";
}

// Step 4: Close the Database Connection
mysqli_close($conn);
?>

</div> </div> </div> </div> 

<div class="col-lg-4">
        <div class="card " style="border-radius: 10px;">
          <div class="card-body signup ">
            
          <h2 class="card-title text-center mb-4 text-dark"><b>Latest News</b></h2>
            <div class="overlay-black overflow-hidden position-relative news_style img mb-4">
                 <img src="img/<?php echo $row['image'];?>" alt="news_Image">
                  </div>
            <h1><?php echo $row['title']; ?></h1>
            <div class="px-4 pb-4 d-inline-block w-100">
                      <div class="float-left text-capitalizen text-bold"><i class="fas fa-user text-success mr-1"></i> Author :
                        <?php echo $row['published_by'];?>
                      </div>
                      <div class="float-right rext-bold mb-5"><i class="far fa-calendar-alt text-success mr-1"></i>
                        <?php echo date('D-M-Y', strtotime($row['published_at']));?>
                      </div>
            <p><?php echo $row['content']; ?></p>
            <!-- You can display other details as needed -->
        
       

</div> </div> </div></div> </div> </div> 
 






<?php include("include/footer.html");?>
</body>
 </html>





















