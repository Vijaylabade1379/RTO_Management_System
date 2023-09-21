<?php
    session_start();
    require_once('Connection.php');
    $aadhar = $_SESSION['aadhar'];
    // echo $aadhar;
    // die();
    $obj = new Connection();
    $db = $obj->getNewConnection();
    $sql = "select * from dl where aadhar=$aadhar";
    $res = $db->query($sql);
    $row = $res->fetch_assoc();
    if (isset($_POST['submit']))
    {
        $name = $_POST['name'];$dlno = $_POST['dlno'];
        $fatherName = $_POST['fatherName'];$dob = $_POST['dob'];
        $bloodGroup = $_POST['bloodGroup'];$address = $_POST['address'];
        $gender = $_POST['gender'];$mobileNumber = $_POST['mobileNumber'];
        $email = $_POST['email'];$rto = $_POST['rto'];
        $status = $_POST['status'];$validity = $_POST['validity'];
        $issueDate = $_POST['issueDate'];
        $q = "update dl 
        set name='$name', dlno=$dlno, fatherName='$fatherName', 
        dob='$dob', bloodGroup='$bloodGroup', address='$address', gender='$gender', 
        mobileNumber=$mobileNumber, email='$email', rto='$rto', status=$status, validity='$validity', issueDate='$issueDate' where aadhar=$aadhar"; 
        $res1 = $db->query($q);
        if (!$res1)
            die($db->error);
        $db->close();
        header("Location: viewdlData.php");
        die();
        $db->close();
    }
?>

<html>
    <?php require_once('header.php'); ?>
    <br>
    <h1 class="text-white text-center font-weight-bold bg-warning" style="font-size: 55px;"> Edit DL Data </h1>
    <div class="container"><br>
        <div class="col-lg-6 m-auto d-block">
            <form method="POST" onsubmit="return validation()" class="bg-light">
                <div class="form-group">
					<label for="name" class="font-weight-bold"> Name: </label>
					<input type="text" name="name" class="form-control" id="name" value="<?php echo $row['name'] ?>">
					<span id="nameerr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="dlno" class="font-weight-bold"> DL No: </label>
					<input type="number" name="dlno" class="form-control" id="dlno" value="<?php echo $row['dlno'] ?>">
					<span id="dlnoerr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="fatherName" class="font-weight-bold"> Father's Name: </label>
					<input type="text" name="fatherName" class="form-control" id="fatherName" value="<?php echo $row['fatherName'] ?>">
					<span id="fatherNameerr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="dob" class="font-weight-bold"> DL No: </label>
					<input type="text" name="dob" class="form-control" id="dob" value="<?php echo $row['dob'] ?>">
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
					document.getElementById("bloodGroup").value="<?php echo $row['bloodGroup']==''?"-1":$row['bloodGroup'] ?>";
                  </script>
					<span id="bloodGrouperr" class="text-danger font-weight-bold"> </span>
				</div>
				
                <div class="form-group">
					<label for="address" class="font-weight-bold"> Address: </label>
					<input type="text" name="address" class="form-control" id="address" value="<?php echo $row['address'] ?>">
					<span id="addresserr" class="text-danger font-weight-bold"> </span>
				</div>
				 <div class="form-group">
					<label for="gender" class="font-weight-bold"> Enter Gender: </label>
					<select name="gender" id="gender" class="form-control">
                    	<option value="-1">--SELECT--</option>
                    	<option value="M">Male</option>
                    	<option value="F">Female</option>
                  </select>
                  <script type="text/javascript">
					document.getElementById("gender").value="<?php echo $row['gender']==''?"-1":$row['gender']; ?>";
                  </script>
					<span id="gendererr" class="text-danger font-weight-bold"> </span>
				</div>
                
                <div class="form-group">
					<label for="mobileNumber" class="font-weight-bold"> Mobile Number: </label>
					<input type="text" name="mobileNumber" class="form-control" id="mobileNumber" value="<?php echo $row['mobileNumber'] ?>">
					<span id="mobileNumbererr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="email" class="font-weight-bold"> Email: </label>
					<input type="email" name="email" class="form-control" id="email" value="<?php echo $row['email'] ?>">
					<span id="emailerr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="rto" class="font-weight-bold"> RTO: </label>
					<input type="text" name="rto" class="form-control" id="rto" value="<?php echo $row['rto'] ?>">
					<span id="rtoerr" class="text-danger font-weight-bold"> </span>
				</div>
              	
				<div class="form-group">
					<label for="status" class="font-weight-bold"> Status: </label>
					<select name="status" id="status" class="form-control">
                    	<option value="-1">--SELECT--</option>
                    	<option value="0">Pending</option>
                    	<option value="1">Approved</option>
                  </select>
                  <script type="text/javascript">
					document.getElementById("status").value="<?php echo $row['status']==''?"-1":$row['status']; ?>";
                  </script>
					<span id="statuserr" class="text-danger font-weight-bold"> </span>
				</div>
				
				
                <div class="form-group">
					<label for="validity" class="font-weight-bold"> Validity </label>
					<input type="date" name="validity" class="form-control" id="validity" value="<?php echo $row['validity'] ?>">
					<span id="validityerr" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label for="issueDate" class="font-weight-bold"> Issue Date </label>
					<input type="date" name="issueDate" class="form-control" id="issueDate" value="<?php echo $row['issueDate'] ?>">
					<span id="issueDateerr" class="text-danger font-weight-bold"> </span>
				</div>
                <center><input type="submit" name="submit" value="SUBMIT" class="btn btn-success"><center>
            </form>
            <br>
        </div>
    </div>
    <script type="text/javascript">
        function validation() {
            var name = document.getElementById('name');
            if (name.value == "") {
            	name.focus();
                document.getElementById('nameerr').innerHTML =" ** Please fill the name field";
                return false;
            }else{
            	document.getElementById('nameerr').innerHTML ="";
            }
            
            var dlno = document.getElementById('dlno');
            if (dlno.value == "") {
            	dlno.focus();
                document.getElementById('dlnoerr').innerHTML =" ** Please fill the dlno field";
                return false;
            }else{
            	document.getElementById('dlnoerr').innerHTML ="";
            }
            
            var fatherName = document.getElementById('fatherName');
            if (fatherName.value == "") {
            	fatherName.focus();
                document.getElementById('fatherNameerr').innerHTML =" ** Please fill the fatherName field";
                return false;
            }else{
            	 document.getElementById('fatherNameerr').innerHTML ="";
            }
            
            var dob = document.getElementById('dob');
            if (dob.value == "") {
            	dob.focus();
                document.getElementById('doberr').innerHTML =" ** Please fill the dob field";
                return false;
            }else{
            	document.getElementById('doberr').innerHTML ="";
            }
            
            var bloodGroup = document.getElementById('bloodGroup');
            if (bloodGroup.value == "-1") {
            	bloodGroup.focus();
                document.getElementById('bloodGrouperr').innerHTML =" ** Please fill the bloodGroup field";
                return false;
            }else{
            	document.getElementById('bloodGrouperr').innerHTML ="";
            }
            
            var address = document.getElementById('address');
            if (address.value == "") {
            	address.focus();
                document.getElementById('addresserr').innerHTML =" ** Please fill the address field";
                return false;
            }else{
            	document.getElementById('addresserr').innerHTML ="";
            }
            
            var gender = document.getElementById('gender');
            if (gender.value != "M" && gender.value != "F") {
            	gender.focus();
                document.getElementById('gendererr').innerHTML =" ** Please fill the gender field value 'M' or 'F'";
                return false;
            }else{
            	document.getElementById('gendererr').innerHTML ="";
            }
            
            var mobileNumber = document.getElementById('mobileNumber');
            if (mobileNumber.value == "") {
            	mobileNumber.focus();
                document.getElementById('mobileNumbererr').innerHTML =" ** Please fill the mobileNumber field";
                return false;
            }else{
            	document.getElementById('mobileNumbererr').innerHTML ="";
            }
            
            var email = document.getElementById('email');
            if (email.value == "") {
            	email.focus();
                document.getElementById('emailerr').innerHTML =" ** Please fill the email field";
                return false;
            }else{
            	document.getElementById('emailerr').innerHTML ="";
            }
            
            var rto = document.getElementById('rto');
            if (rto.value == "") {
            	rto.focus();
                document.getElementById('rtoerr').innerHTML =" ** Please fill the rto field";
                return false;
            }else{
            	document.getElementById('rtoerr').innerHTML ="";
            }
            
            var status = document.getElementById('status');
            if (status.value == "-1") {
            	status.focus();
                document.getElementById('statuserr').innerHTML =" ** Please fill the status field";
                return false;
            }else{
            	document.getElementById('statuserr').innerHTML ="";
            }
            
            var validity = document.getElementById('validity');
            if (validity.value == "") {
            	validity.focus();
                document.getElementById('validityerr').innerHTML =" ** Please fill the validity field";
                return false;
            }else{
            	document.getElementById('validityerr').innerHTML ="";
            }
            
            var issueDate = document.getElementById('issueDate');
            if (issueDate.value == "") {
            	issueDate.focus();
                document.getElementById('issueDateerr').innerHTML =" ** Please fill the issueDate field";
                return false;
            }else{
            	document.getElementById('issueDateerr').innerHTML ="";
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
</html>