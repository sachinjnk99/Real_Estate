<?php require_once "pass.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Login</title>
    <style>
        body {
            background-image: url("https://trbahadurpur.com/wp-content/uploads/2021/01/background-5.jpg");
        }
    </style>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="font/css/all.css">
</head>

<body>
<?php include("include/header.php");?>
    <div class="container pb-4 pt-5 mt-5 mb-5">
        <div class="row justify-content-center ">
            <div class="col-lg-4 mt-4">
                <div class="card bg-light" style="border-radius: 10px;">
                    <div class="card-body sign">

                    <form action="" method="POST" autocomplete="">
                            <h4 class="text-center text-dark ">New Password</h4>

                            <?php

if(isset($_SESSION['info'])){
    ?>
     <div class="alert alert-success" role="alert">
     <?php echo $_SESSION['info'];  ?>
     </div>
    <?php
    
    unset($_SESSION['info']);
}

?>
                            <hr>
                  
                            <div class="row mt-3">
                  <div class="col">
                  <div class="form-outline mb-2">
                    <label class="form-label text-dark" for="form2Example22"> New Password</label>
                    <input type="password" id="password2" name="password" class="form-control mb-2"placeholder="Password" />
                    
                 </div>
              </div>

              <div class="row mt-3">
                  <div class="col">
                  <div class="form-outline mb-4">
                    <label class="form-label text-dark" for="form2Example22">Confirm Password</label>
                    <input type="password" id="password2" name="cpassword" class="form-control mb-2"placeholder="Password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$"  title="Enter atlist 1-capital, 1-character, and number" />
                    <input type="checkbox" id="showPassword"> Show Password
                 </div>
              </div>

                              

                                <div class="text-center mb-3">
                                    <button type="submit" name="change-password" class="btn btn-primary btn-lg btn-block ">Changed Password</button>
                                </div>
                            
                            <br>


                            
                            <p class="text-dark text-center">Login <a href="login.php">Click Here</p></a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script>
  var passwordFields = document.querySelectorAll("input[type='password']");
  var originalTypes = [];

  passwordFields.forEach(function(field) {
    originalTypes.push(field.type);
  });

  document.getElementById("showPassword").addEventListener("change", function() {
    if (this.checked) {
      passwordFields.forEach(function(field) {
        field.type = "text";
      });
    } else {
      passwordFields.forEach(function(field, index) {
        field.type = originalTypes[index];
      });
    }
  });
</script>

<?php include("include/footer.html");?>
</body>

</html>