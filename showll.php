<?php 
        error_reporting(0);
        session_start();
    ?>

<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show LL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php');
   
                
                 
                $aadhar = $_SESSION['aadhar'];
                
                if($aadhar==''){
                   $aadhar='-1';
                }
     ?>
    <div class="row">
        <div class="col-lg-6 m-auto d-block">
        <ul class="list-group">
            <?php
                
            require_once('Connection.php');
                
                $obj = new Connection();
                $db = $obj->getNewConnection();
                $sql = "select * from ll where  aadhar=$aadhar";
                
                $res = $db->query($sql);
                ?>
                
                <?php while ($row = $res->fetch_assoc()) :
                
                $llno = $row['llno'];
                $name = $row['name'];
                $fatherName = $row['fatherName'];
                $dob = $row['dob'];
                $bloodGroup = $row['bloodGroup'];
                $address = $row['address'];
                $aadhar = $row['aadhar'];
                $validity = $row['validity'];
                $issueDate = $row['issueDate'];
                print("<li class='list-group-item text-muted' contenteditable='false'>Duplicate RC</li>

                <li class='list-group-item text-right'><span class='pull-left'><strong class=''>LL Number:</strong></span>$llno</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Name:</strong></span>$name</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Aadhar Number:</strong></span>$aadhar</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Father's Name:</strong></span>$fatherName</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong class=''>DOB:</strong></span>$dob</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Blood Group:</strong></span>$bloodGroup</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Address:</strong></span>$address</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Issue Date:</strong></span>$issueDate</li>
                <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Validity:</strong></span>$validity</li>
                ");
                
                 
                session_destroy();
                $db->close();
                endwhile; ?>
            </ul>
            
            <center><input type="button" name="print" value="PRINT" class="btn btn-success" onclick="window.print()"></center>
            
        </div>
    </div>
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




