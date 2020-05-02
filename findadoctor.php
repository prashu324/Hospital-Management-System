<?php
	session_start();
	$host="localhost";
	$username="root";
	$password="";
	$dbname="hospital_management";
	$conn=mysqli_connect($host,$username,$password,$dbname);
	$sql1="SELECT dname FROM department order by dname";
	$result1=mysqli_query($conn,$sql1);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Find a Doctor</title>
	<link rel="icon" href="max-healthcare-logo.jpg"">
	<script type="text/javascript" language="javascript">
		function formValidate(){
			var deptno=document.findadoctor.dept;
			if(deptselect(deptno)){
				return true;
			}
			return false;
		}
		function deptselect(deptno){
			if(deptno.value=="0"){
				alert('Select Specialisation from the list');
				deptno.focus();
				return false;
			}
			else
				return true;
		}
	</script>
</head>
<body>
	<div class="header">
		<div class="hospital-logo">
			<img src="max-healthcare-logo.jpg" height="100px;" width="250px;">
			<img src="emergency.png" style="float: right;">
		</div>
	</div>
	<div class="navigation">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="aboutus.html">About us</a></li>
			<li><a href="findadoctor.php">Find a doctor</a></li>
			<li><a href="contactus.html">Contact us</a></li>
			<li class="dropdown"><a href="#">Quick links</a>
				<div class="dropdown-content">
					<a href="patientlogin.php">Patient Login</a>
					<a href="doctorlogin.php">Doctor Login</a>
					<a href="pharmacylogin.php">Pharmacy Login</a>
					<a href="adminlogin.php">Admin Login</a>
				</div>
			</li>
		</ul>
	</div>
	<img src="Find-A-Doctor.jpg" style="width: 100%;height: 200px;">
	<div class="content">
		<div class="form-content">
			<form action="" method="POST" onsubmit="return(formValidate());" name="findadoctor">
				<label><b>Specialisation</b></label><br>
				<select name="dept">
					<option <?php if (isset($_POST["dept"])) echo "disabled"; else echo "selected";?> value="0">Select Specialisation</option>
					<?php
					
					while($row1=mysqli_fetch_array($result1,MYSQL_ASSOC)){
						$dn=$row1["dno"];
					?>
					<option <?php if(isset($_POST["dept"])) {if($_POST["dept"]==$row1["dname"]) echo "selected disabled"; else echo "disabled";}; ?> ><?php echo $row1["dname"]; ?></option>
					<?php }?>
				</select><br>
				<input type="submit" name="submit" class="submit" style="<?php if (isset($_POST["dept"])): echo "display: none;";endif?>">
			</form>
			<?php
				if(isset($_POST["dept"])){
					$dname=$_POST["dept"];
					$_SESSION["dname"]=$dname;
					$sql3="SELECT * FROM department where dname='$dname'";
					$result3=mysqli_query($conn,$sql3);
					$row3=mysqli_fetch_array($result3);
					$dno=$row3["dno"];
					$_SESSION["dno"]=$dno;
					$sql2="SELECT * from doctor where dno='$dno'";
					$result2=mysqli_query($conn,$sql2);
			?>
			<form action="appointmentform.php" method="POST">
				<label><b>Patient ID</b></label><br>
				<input type="number" name="pid" class="myinput" placeholder="Enter Patient ID" required=""><br>
				<label><b>Doctor</b></label><br>
				<select name="did">
					<option selected="" value="0">Select a Doctor</option>
					<?php
						while ($row2=mysqli_fetch_array($result2,MYSQL_ASSOC)) {
							$did=$row2["doctor_id"];
							if ($row2["status"]==1) {
								echo "<option value='$did'>".$row2['fname']." ".$row2['lname']."</option>";
							}
						}
					?>
				</select><br>
				<label><b>Problem Description</b></label><br>
				<textarea class="myinput" name="problem" placeholder="Describe your Problem here.." required=""></textarea><br>
				<input type="submit" name="submit" class="submit">
			</form>
			<?php
				}
			?>
		</div>
	</div>
	<div class="footer">
		© 2017 Max Health Care by <b>Prasanth Sikakollu</b>
	</div>
</body>
</html>