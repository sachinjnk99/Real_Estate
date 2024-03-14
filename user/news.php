<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


 <?php 
 $query=mysqli_query($con,"SELECT * FROM news ORDER BY published_at DESC LIMIT 3");
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
 

</body>
</html>
