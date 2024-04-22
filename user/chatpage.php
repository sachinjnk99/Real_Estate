<?php 
session_start();
isset($_SESSION["u_email"]);

include("config.php");
$pid=$_REQUEST['pid'];
$owner_id=$_REQUEST['uid'];
$u_name=$_REQUEST['u_name'];
if(isset($_POST['send_message'])){
	
    $u_email=$_SESSION["u_id"];
    $owner_id=$_POST['owner_id'];
    $u_name=$_POST['u_name'];
    $sql="SELECT * FROM property1 where uid='$u_email'";
    $query=mysqli_query($con,$sql);

    if(mysqli_num_rows($query)>0)
    {
      while ($rows=mysqli_fetch_assoc($query)) {
        $tenant_id=$rows['uid'];
   
    $sql1="SELECT * FROM message where p_id='$pid'";

    $query1 = mysqli_query($con,$sql1);
?>

<style>
  h2{
color:white;
  }
  label{
color:white;
  }
  span{
    color:#673ab7;
    font-weight:bold;
  }
  .container {
    margin-top: 3%;
    width: 60%;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: ;
  }
  .display-chat{
    height:300px;
    background-color:lightgrey;
    margin-bottom:4%;
    overflow:auto;
    padding:15px;
  }
  .message{
    background-color: #c616e469;
    color: white;
    border-radius: 5px;
    padding: 5px;
    margin-bottom: 3%;
  }
  </style>

<div class="container">
  <center><h3>Send Messages</h3></center>
  <div class="display-chat">
<?php
  if(mysqli_num_rows($query1)>0)
  {
    while($row= mysqli_fetch_assoc($query1)) 
    {
?>
    <div class="message">
      <p>
        <span><?php echo $row['message']; ?></span>
      </p>
    </div>
<?php
    }
  }
  else
  {
?>
<div class="message">
      <p>
        No previous chat available.
      </p>
</div>
<?php
  } 
?>

  </div>
  <form class="form-horizontal" method="POST" action="">
    <div class="form-group">
      <div class="col-sm-10"> 
      <input type="hidden" name="owner_id" value="<?php echo $owner_id; ?>">    
      <input type="hidden" name="tenant_id" value="<?php echo $tenant_id; ?>">    
      <input type="hidden" name="u_name" value="<?php echo $u_name; ?>">   
        <textarea name="message" class="form-control" placeholder="Type your message here..."></textarea>
      </div>
           
      <div class="col-sm-2">
        <input type="submit" name="send_message1" class="btn btn-primary" formmethod="post" value="Send">
      </div>

    </div>
  </form>
</div>

</body>
</html>
<?php
  }

}}
?>

<?php
if(isset($_POST['send_message1'])){
  $uid=$_SESSION["u_"];
  $message=$_POST['message'];
  $owner_id=$_POST['owner_id'];
  $tenant_id=$_POST['tenant_id'];
  $u_name=$_POST['u_name'];
  
    
  $sql="INSERT INTO message (message, u_id, p_id, u_name) VALUES ('$message','$tenant_id','$owner_id','$u_name')";

  $query = mysqli_query($con,$sql);
  if($query)
  {
    header("Refresh:0");
  }
}
?>

<center><button onclick="goBack()" class="btn btn-success">Go Back</button></center>

<script>
function goBack() {
  window.history.back();
}
</script>