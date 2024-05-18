<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <style>

  </style>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="font/css/all.css">

  <style>
    .dropdown {
      position: relative;
      display: inline-block;

    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;

    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      padding: 15px;
      width: 200px;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>


<body>

  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid">
      <a class="ml-2" href="index.php">
        <img src="img/logo124.png" class="me-3  " alt="logo" style="height:80px; width: 200px; ">

        <a class="navbar-brand text-light" href="#"></a>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
          <li class="nav-item ">
            <a class="nav-link active me-4 text-light" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-4 text-light" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-4 text-light" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-4 text-light" href="property.php">Property</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link me-4 text-light" href="news1.php">News</a>
          </li>

          <li class="nav-item">
            <a class="nav-link me-4 text-light" href="agency-details.php">Agencies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-4 text-light" href="calc2.php">Calculator</a>
          </li>
          <li class="nav-item">
            <a href="submitprop.php">
            <button class="btn btn-success me-2" type="submit"> Submit Property</button>
            </a>
          </li>


          </div>
          
    

          <div class="header topnav-right"  style="float: last;">
          <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
     
      <?php
      if(isset($_SESSION['u_email'])) {   
        ?>
            <div class="dropdown">
              <li class="nav-item right">
              <a class="nav-link me-5 me-5 text-light right " href="#"> <i class="fa-solid fa-user"></i>&nbsp; My Account</a>
              </li>
              <div class="dropdown-content">
              <a  href="profile1.php">Profile</a>
              <a href="appo-view.php">Appointment Request</a>
              <a href="request-info.php">Request info</a>
              <a href="myproperty1.php">My property</a>
              <a href="logout.php" onclick='return checkdel()'>Logout</a>
              </div>
            </div>
            <?php } else { ?>
            <a href="login.php">
            <button class="btn btn-danger me-2" type="submit">Login</button>
            </a>
            <a href="signup.php">
          <button class="btn btn-warning me-2" type="submit">Register</button>
            </a>
            <?php } ?>
          </div>
          
        </ul>

          </div>  
  </nav>
  <script>
  function checkdel(){
    return confirm('Are you sure you want to Logout?');
  }
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>