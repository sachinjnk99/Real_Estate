<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
$error='';
$msg='';
if(isset($_POST['insert']))
{
    $title = $_POST['title'];
    $title1 = $_POST['title1'];
    $content = $_POST['content'];
    $published = $_POST['published'];
    $id = $_POST['id'];

    $image=$_FILES['image']['name'];

    $temp_name  =$_FILES['image']['tmp_name'];
    move_uploaded_file($temp_name,"../user/img/$image");
	

	
	if(!empty($title) && !empty($image) && !empty($content))
	{
		
		$sql="INSERT INTO news (id, title, sub_title, image, content, published_by) values('$id', '$title', '$title', '$image', '$content', '$published')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Feedback Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Feedback Not Send Successfully</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}								
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   

    <title>Login</title>
   
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="font/css/all.css">
</head>

<body>
<?php include("header.html");?>
<div class="container">
        <div class="header">
            <div class="nav">
          
            </div>
        </div>
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-8 mt-4">
                <div class="card bg-light" style="border-radius: 10px;">
                    <div class="card-body sign">

                        <form method="post" enctype="multipart/form-data">
                            <h4 class="text-center text-dark">Create News</h4>
                            
                            <hr>
                            <div> 
             <input class="form-control" value="<?php echo $id;?>" required name="id"  type="hidden">
              </div>
                           
                                <div class="form-outline mb-4 ">
                                    <label class="form-label text-dark" for="form2Example11"> News Title</label>
                                    <input type="text"  name="title" class="form-control" 
                                        placeholder="Title " />

                                </div>

                                <div class="form-outline mb-4 ">
                                    <label class="form-label text-dark" for="form2Example11"> Sub Title</label>
                                    <input type="text"  name="title1" class="form-control" 
                                        placeholder="Sub Title max word 15 " />

                                </div>

                                <div class="form-outline  mt-4">
                                    <label for="formFileLg" class="form-label">Image</label>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="image" required>
                                      </div>

                                <div class="form-group mb-4 pt-4">
                                    <label for="about-me">Content</label>
                                    <textarea class="form-control" name="content" rows="7"
                                        placeholder="Enter Text Here...."></textarea>
                                </div>

                                <div class="form-outline mb-4 ">
                                    <label class="form-label text-dark" for="form2Example11">Published By</label>
                                    <input type="text"  name="published" class="form-control" 
                                        placeholder="Published by " />

                                </div>

                                <div class="text-center">
                                    <button type="submit" name="insert"
                                        class="btn btn-primary btn-lg btn-block ">Create News</button>
                                </div>
                            
                            <br>


                           

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



   
</body>
</html>