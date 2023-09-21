<?php


session_start();

    if (isset($_POST['submit']))
    {
        require_once('Connection.php');
        $aadhar = $_POST['aadhar'];
        
        $obj = new Connection();
        $db = $obj->getNewConnection();
        $sql = "select  aadhar from ll where  aadhar=$aadhar";
        $res = $db->query($sql);
        $row = $res->fetch_assoc();
        $db->close();
        if ($row['aadhar'] === $aadhar)
        {
           
            $_SESSION['aadhar'] = $aadhar;
          
            
           header("Location: showll.php");
            
            die();
            $db->close();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show LL Help</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php'); ?>
    <h1 class="text-white text-center font-weight-bold bg-warning" style="font-size: 55px;"> Generate LL </h1>
    <div class="container"><br>
        <div class="col-lg-6 m-auto d-block">
            <form method="POST" onsubmit="return validation()" class="bg-light">
                <div class="form-group">
					<label for="aadhar" class="font-weight-bold"> Enter Aadhar NO: </label>
					<input type="text" name="aadhar" class="form-control" id="aadhar">
					<span id="aadharerr" class="text-danger font-weight-bold"> </span>
                </div>
                <center><input type="submit" name="submit" value="SUBMIT" class="btn btn-success"></center>
                </form>
        </div>
    </div>

    <script type="text/javascript">
        function validation() {
            
            var aadhar = document.getElementById('aadhar');
            if (aadhar.value == "") {
            	aadhar.focus();
                document.getElementById('aadharerr').innerHTML =" ** Please fill the aadhar field";
                return false;
            }
            else if(aadhar.value.toString().length != 12) {
            	aadhar.focus();
				document.getElementById('aadharerr').innerHTML =" ** Aadhar No should be of 12 digits";
				return false;	
			}
            return true;
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