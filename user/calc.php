<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");

if(isset($_REQUEST['calc']))
{
	$amount=$_REQUEST['amount'];
	$mon=$_REQUEST['month'];
	$int=$_REQUEST['rate'];
	
	$interest = $amount * $int/100;
	$pay = $amount + $interest;
	$month = $pay / $mon;

}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include("include/header.php");?>
<div class="full-row bg-gray">
            <div class="container">
                    <div class="row mb-5">
						<div class="col-lg-12">
							<h2 class="text-dark  text-center">EMI Calculator</h2>
                        </div>
					</div>
					<center>
					<table class="items-list col-lg-6 hoverTable" style="border-collapse:inherit;">
                        <thead>
                             <tr  class="bg-secondary">
                                <th class="text-white font-weight-bolder text-center">Term</th>
                                <th class="text-white font-weight-bolder text-center">Amount</th>
                             </tr>
                        </thead>
                        <tbody>
						
						
                            <tr class="text-center">
                                <td><b>Amount</b></td>
                                <td><b><?php echo 'NRs.'.$amount ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Total Duration</b></td>
                                <td><b><?php echo $mon.' Months' ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Interest Rate</b></td>
                                <td><b><?php echo $int.'%' ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Total Interest</b></td>
                                <td><b><?php echo 'NRs.'.$interest ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Total Amount</b></td>
                                <td><b><?php echo 'NRs.'.$pay ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Pay Per Month (EMI)</b></td>
                                <td><b><?php echo 'NRs.'.$month ; ?></b></td>
                            </tr>
							
                        </tbody>
                    </table> 
                    <a href="calc2.php">
                    <div class="text-center mt-4">
          <button class="btn btn-primary btn-lg btn-block text-center mb-5">Calculate Again</button>
        </div>
</a>
					</center>
            </div>
        </div>
        <?php include("include/footer.html");?>
    
</body>
</html>