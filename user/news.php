<?php
include("config.php");

?>
<?php include("include/header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Latest News</title>
    <style>
        /* CSS styles for news display */
        .news-container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .news-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .news-content {
            font-size: 16px;
        }
        .published-time {
            font-style: italic;
            color: #888;
        }
    </style>
</head>

<body>


<div class=" mt-4 pt-5 py-5 pb-5">
 <?php 
 $query=mysqli_query($con,"SELECT * FROM news ORDER BY published_at DESC LIMIT 5");
     while($row=mysqli_fetch_array($query))
     



// Check if there are any news articles

    // Output data of each news article
    {
        echo '<div class="news-container">';
        echo '<div class="news-title">' . $row["title"] . '</div>';
        echo '<div class="news-content">' . $row["content"] . '</div>';
        echo '<div class="published-time">Published at: ' . $row["published_at"] . '</div>';
        echo '</div>';

}

?>
</div>
 
<?php include("include/footer.html");?>
</body>
</html>
