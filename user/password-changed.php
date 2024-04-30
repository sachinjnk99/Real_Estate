<?php require_once "pass.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Changed</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5 pt-5">
        <div class="alert alert-success" role="alert">
            Your password has been changed successfully. You can now login with your new password.
        </div>
        <div class="text-center">
            <form action="login.php" method="post">
                <button type="submit" class="btn btn-primary" name="login-now">Login Now</button>
            </form>
        </div>
    </div>

    
</body>
</html>
