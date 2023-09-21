<?php
    $name = '';
    $fatherName = '';
    $dob = '';
    $bloodGroup = '';
    $address = '';
    $aadhar = '';
    $gender = '';
    $mobileNumber = '';
    $email = '';
    $rto = '';
    $aadharerr = '';
    
    session_start();
    
    if (isset($_POST['submit']))
    {
        
        require_once('Connection.php');
        $name = $_POST['name'];
        $fatherName = $_POST['fatherName'];
        $dob = $_POST['dob'];
        $bloodGroup = $_POST['bloodGroup'];
        $address = $_POST['address'];
        $aadhar = $_POST['aadhar'];
        $gender = $_POST['gender'];
        $mobileNumber = $_POST['mobileNumber'];
        $email = $_POST['email'];
        $rto = $_POST['rto'];
        $userId= $_SESSION['userId'];
        $obj = new Connection();
        $db = $obj->getNewConnection();
        $q = "select * from ll where aadhar=$aadhar";
        $r = $db->query($q);
        if ($r->num_rows > 0)
        {
            $aadharerr = "Aadhar Number already registered";
        }
        else 
        {
            $Date = date("Y-m-d");
            $examDate = date('Y-m-d', strtotime($Date . ' + 15 days'));
            $sql = "insert into ll(name, fatherName, dob, bloodGroup, address, aadhar, gender, mobileNumber, email, rto, status, examDate,id) 
                    values('$name', '$fatherName', '$dob', '$bloodGroup', '$address', '$aadhar', '$gender', '$mobileNumber', '$email', '$rto', 0, '$examDate','$userId') ";
            $res = $db->query($sql);
            echo  $sql;
            $sql1 = "select id, status from ll where aadhar='$aadhar'";
            $result = $db->query($sql1);
            $row = $result->fetch_array();
            $id = $row[0];
            $status = $row[1];
            if ($res)
            {
                $_SESSION['rto'] = $rto;
                $_SESSION['aadhar'] = $aadhar;
                $db->close();
                header("Location: llstatus.php");
                die();
            }
            $db->close();
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Apply for New Learner License</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php'); ?>
    <br>
    <h1 class="text-white text-center font-weight-bold bg-warning" style="font-size: 55px;"> New LL Registration </h1>
    <div class="container"><br>
        <div class="col-lg-6 m-auto d-block">
            <form method="POST" onsubmit="return validation()" class="bg-light">
                <div class="form-group">
					<label for="name" class="font-weight-bold"> Enter Name: </label>
					<input type="text" name="name" class="form-control" id="name" value="<?php echo $name; ?>">
					<span id="nameerr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="fatherName" class="font-weight-bold"> Enter Father's Name: </label>
					<input type="text" name="fatherName" class="form-control" id="fatherName" value="<?php echo $fatherName; ?>">
					<span id="fatherNameerr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="dob" class="font-weight-bold"> Enter DOB: </label>
					<input type="date" name="dob" class="form-control" id="dob" value="<?php echo $dob; ?>">
					<span id="doberr" class="text-danger font-weight-bold"> </span>
				</div>
                
                <div class="form-group">
					<label for="bloodGroup" class="font-weight-bold"> Enter Blood Group: </label>
					<select name="bloodGroup" id="bloodGroup" class="form-control">
                    	<option value="-1">--SELECT--</option>
                    	<option value="A+">A+</option>
                    	<option value="A-">A-</option>
						<option value="B+">B+</option>
                    	<option value="B-">B-</option>
						<option value="AB+">AB+</option>
                    	<option value="AB-">AB-</option>
						<option value="O+">O+</option>
                    	<option value="O-">O-</option>
                  </select>
                  <script type="text/javascript">
					document.getElementById("bloodGroup").value="<?php echo $bloodGroup==''?"-1":$bloodGroup ?>";
                  </script>
					<span id="bloodGrouperr" class="text-danger font-weight-bold"> </span>
				</div>
				
                <div class="form-group">
					<label for="address" class="font-weight-bold"> Enter Address: </label>
					<input type="text" name="address" class="form-control" id="address" value="<?php echo $email; ?>">
					<span id="addresserr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="aadhar" class="font-weight-bold"> Enter Aadhar Number: </label>
					<input type="text" name="aadhar" class="form-control" id="aadhar" value="<?php echo $aadhar; ?>">
					<span id="aadharerr" class="text-danger font-weight-bold"> <?php echo $aadharerr; ?> </span>
				</div>
              
              <div class="form-group">
					<label for="gender" class="font-weight-bold"> Enter Gender: </label>
					<select name="gender" id="gender" class="form-control">
                    	<option value="-1">--SELECT--</option>
                    	<option value="M">Male</option>
                    	<option value="F">Female</option>
                  </select>
                  <script type="text/javascript">
					document.getElementById("gender").value="<?php echo $gender==''?"-1":$gender; ?>";
                  </script>
					<span id="gendererr" class="text-danger font-weight-bold"> </span>
				</div>
				
                <div class="form-group">
					<label for="mobileNumber" class="font-weight-bold"> Enter Mobile Number: </label>
					<input type="number" name="mobileNumber" class="form-control" id="mobileNumber" value="<?php echo $mobileNumber; ?>">
					<span id="mobileNumbererr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="email" class="font-weight-bold"> Enter Email ID: </label>
					<input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>">
					<span id="emailerr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="rto" class="font-weight-bold"> Enter RTO Office: </label>
					<input type="text" name="rto" class="form-control" id="rto" value="<?php echo $rto; ?>">
					<span id="rtoerr" class="text-danger font-weight-bold"> </span>
				</div>
                <center><input type="submit" name="submit" value="SUBMIT" class="btn btn-success"><center>
            </form>
            <br>
        </div>
    </div>
    <script type="text/javascript">


    function getAge(dateString) 
    {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
        {
            age--;
        }
        return age;
    }
    
        function validation() {
            var name = document.getElementById('name');
            var fatherName = document.getElementById('fatherName');
            var dob = document.getElementById('dob');
            var bloodGroup = document.getElementById('bloodGroup');
            var address = document.getElementById('address');
            var aadhar = document.getElementById('aadhar');
            var gender = document.getElementById('gender');
            var mobileNumber = document.getElementById('mobileNumber');
            var email = document.getElementById('email');
            var rto = document.getElementById('rto');
            if (name.value == "") {
            	name.focus();
                document.getElementById('nameerr').innerHTML =" ** Please fill the name field";
                return false;
            }else{
            	 document.getElementById('nameerr').innerHTML ="";
            }
            
            if (fatherName.value == "") {
            	fatherName.focus();
                document.getElementById('fatherNameerr').innerHTML =" ** Please fill the fatherName field";
                return false;
            }else{
            	document.getElementById('fatherNameerr').innerHTML ="";
            }
            
            if (dob.value == "") {
            	dob.focus();
                document.getElementById('doberr').innerHTML =" ** Please fill the dob field";
                return false;
            } else if (getAge( dob.value)<18 || getAge( dob.value)>50){
            	dob.focus();
                document.getElementById('doberr').innerHTML =" ** Age Should be between 18-50years";
                return false;
            } else{
            	document.getElementById('doberr').innerHTML ="";
            }
            
            if (bloodGroup.value == "-1") {
            	bloodGroup.focus();
                document.getElementById('bloodGrouperr').innerHTML =" ** Please fill the bloodGroup field";
                return false;
            }else{
            	document.getElementById('bloodGrouperr').innerHTML ="";
            }
            
            if (address.value == "") {
            	address.focus();
                document.getElementById('addresserr').innerHTML =" ** Please fill the address field";
                return false;
            }else{
            	document.getElementById('addresserr').innerHTML ="";
            }
                	
            if (aadhar.value == "") {
            	aadhar.focus();
                document.getElementById('aadharerr').innerHTML =" ** Please fill the aadhar field";
                return false;
            }
            else if(aadhar.value.toString().length != 12) {
            	aadhar.focus();
				document.getElementById('aadharerr').innerHTML =" ** Aadhar No should be of 12 digits";
				return false;	
			}else{
				document.getElementById('aadharerr').innerHTML ="";
			}
			
            if (gender.value != "M" && gender.value != "F") {
            	gender.focus();
                document.getElementById('gendererr').innerHTML =" ** Please fill the gender field value 'Male' or 'Female'";
                return false;
            }else{
            	document.getElementById('gendererr').innerHTML ="";
            }
            
            if (mobileNumber.value == "") {
            	mobileNumber.focus();
                document.getElementById('mobileNumbererr').innerHTML =" ** Please fill the mobileNumber field";
                return false;
            }else  if(mobileNumber.value.toString().length != 10) {
            	mobileNumber.focus();
				document.getElementById('mobileNumbererr').innerHTML =" ** Mobile No should be of 10 digits";
				return false;	
			} else {
				document.getElementById('mobileNumbererr').innerHTML ="";
			}
			
            if (email.value == "") {
            	email.focus();
                document.getElementById('emailerr').innerHTML =" ** Please fill the email field";
                return false;
            }else{
            	document.getElementById('emailerr').innerHTML ="";
            }
            
            if (rto.value == "") {
            	rto.focus();
                document.getElementById('rtoerr').innerHTML =" ** Please fill the rto field";
                return false;
            }else{
            	 document.getElementById('rtoerr').innerHTML ="";
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