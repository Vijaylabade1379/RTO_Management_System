<?php
    session_start();
    $aadharNo = '';
    $aadharNoerr = '';
    if (isset($_POST['submit']))
    {
        require_once('Connection.php');
        $aadharNo = $_POST['aadharNo'];
        $obj = new Connection();
        $db = $obj->getNewConnection();
        $sql = "select status from vehicle where aadhar='$aadharNo'";
        $res = $db->query($sql);
        if (!$res)
        {
            die($db->error);
        }
        if ($res->num_rows == 0)
        {
            $aadharNoerr = "Invalid Aadhar Number";
        }
        else if ($res)
        {
            $row = $res->fetch_array();
            $db->close();
            $_SESSION['aadharNo'] = $aadharNo;
            $_SESSION['status'] = $row[0];
            header("Location: vehicleRegResult.php");
            die();
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Check Vehicle Registration Status</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php'); ?>
    <br>
    <h1 class="text-white text-center font-weight-bold bg-warning" style="font-size: 55px;"> Check Vehicle Registration Status </h1>
    <div class="container"><br>
        <div class="col-lg-6 m-auto d-block">
            <form method="POST" onsubmit="return validation()" class="bg-light">
                <div class="form-group">
					<label for="aadharNo" class="font-weight-bold"> Enter Aadhar Number: </label>
					<input type="number" name="aadharNo" class="form-control" id="aadharNo" value="<?php echo $aadharNo;?>">
					<span id="aadharNoerr" class="text-danger font-weight-bold"> <?php echo $aadharNoerr;?> </span>
				</div>
                <center><input type="submit" name="submit" value="SUBMIT" class="btn btn-success"><center>
            </form>
            <br>
        </div>
    </div>
    <script type="text/javascript">
        function validation() {
            var aadhar = document.getElementById('aadharNo');
            if (aadhar.value == "") {
            	aadhar.focus();
                document.getElementById('aadharNoerr').innerHTML =" ** Please fill the aadharNo field";
                return false;
            }
        }
    </script>

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