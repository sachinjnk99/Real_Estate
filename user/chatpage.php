<?php 

include("config.php");

// Get the property ID and owner ID from the URL
$pid = $_GET['pid'];
$owner_id = $_GET['uid'];
$u_name = $_GET['u_name'];

if(isset($_POST['send_message1'])){
    // Sanitize user input
    $message = mysqli_real_escape_string($con, $_POST['message']);
    $uid = $_SESSION["u_id"];

    // Insert the message into the message table
    $sql = "INSERT INTO message1 (message, u_id, p_id) VALUES ('$message','$uid','$pid')";
    $query = mysqli_query($con, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .message:nth-child(even) {
            background-color: #708090; 
        }

        .message:nth-child(odd) {
            background-color: #778899; 
        }

        /* Other styles */
        h3, label, span {
            color: white;
        }

        .container {
            margin-top: 3%;
            width: 60%;
            padding-right: 10%;
            padding-left: 10%;
        }

        .display-chat {
            height: 300px;
            background-color: #F8FAFB;
            margin-bottom: 4%;
            overflow-y: auto; 
            padding: 15px;
        }


        .message {
            color: white;
            border-radius: 5px;
            padding: 5px;
            margin-bottom: 3%;
        }
    </style>
</head>
<body>
<div class="container">
    <h4 class="text-secondary center">View Comments</h4>
    <div class="display-chat" id="chat-container">
        <?php
        // Select messages associated with the given property ID
        $sql = "SELECT * FROM message1 WHERE p_id='$pid'";
        $query = mysqli_query($con, $sql);

        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                // Fetch user name associated with the user ID
                $uid = $row['u_id'];
                $user_query = mysqli_query($con, "SELECT * FROM user WHERE u_id='$uid'");
                $user_row = mysqli_fetch_assoc($user_query);
                $user_name = $user_row['u_name'];
                $img = $user_row['uimage'];

                ?>
             <div class="message">
    <p>
        <div  style="display: inline-block; margin-right: 5px;">
            <img src="uprofile/pp/<?php echo $img;?>" alt="userimage" style="border-radius: 50%; width: 40px; height: 40px;">
        </div>
        <span class="text-dark" style="font-size: 18px; font-weight: bold; text-transform: capitalize; font-family: 'Arial', sans-serif;"><?php echo $user_name; ?></span><br>

        <span style="margin-left: 53px; font-family: 'Arial', sans-serif; "><?php echo ucfirst(strtolower($row['message'])); ?></span>



    </p>
</div>

                <?php
            }
        } else {
            ?>
            <div class="message">
                <p>No previous chat available.</p>
            </div>
            <?php
        }
        ?>
    </div>
    <form class="form-horizontal" method="POST" action="">
        <div class="form-group">
            <div class="col-sm-10"> 
                <textarea name="message" class="form-control" placeholder="Type your comment here..." required></textarea>
            </div>
            <div class="col-sm-2 mt-4 text-right">
                <input type="submit" name="send_message1" class="btn btn-primary" value="Comment">
            </div>
        </div>
    </form>
</div>



</body>
</html>
