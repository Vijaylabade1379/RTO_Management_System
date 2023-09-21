<?php

    session_start();
    $loggedin = $_SESSION['loggedin'];
    if ($loggedin == 0 OR isset($_POST['submit']))
    {
        header("Location: userLogin.php");
        session_destroy();
        die();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php'); ?>
     <div class="col-lg-6 m-auto d-block">
    <h1 class="text-white text-center font-weight-bold bg-warning" style="font-size: 55px;"> User Panel </h1>
    <ul class="list-group">
        <li class="list-group-item"><a href="checkDLStatus.php">Check DL Status</a></li>
        <li class="list-group-item"><a href="checkLLStatus.php">Check LL Status</a></li>
        <li class="list-group-item"><a href="checkVehicleRegistration.php">Check Vehicle Registration</a></li>
        <li class="list-group-item"><a href="newVehicleRegistration.php">New Vehicle Registration</a></li>
        <li class="list-group-item"><a href="newLL.php">Apply for New LL</a></li>
        <li class="list-group-item"><a href="newdl.php">Apply for New DL</a></li>
    
    </ulC
    <br>
        <form method="post" class="bg-light">
            <center><input type="submit" value="Logout" name="submit" class="btn btn-danger"></center>
        </form>
    </div>
    <br>
  
    <?php require_once('footer.php'); ?>
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    
    
</body>
</html>