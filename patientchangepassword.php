<?php
	session_start();
	$host="localhost";
	$username="root";
	$password="";
	$dbname="hospital_management";
	$conn=mysqli_connect($host,$username,$password,$dbname);
	if(!$_SESSION["pid"])
		header("location:patientlogin.php");
	$id=$_SESSION["pid"];
	$sql1="SELECT * from patient where pid='$id'";
	$result1=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_array($result1);
?>
<!DOCTYPE html>
<html>
	<title>Patient portal</title>
	<link rel="icon" href="max-healthcare-logo.jpg"">
	<link rel="stylesheet" href="style3.css">
<body>

	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%">
		<h2 class="w3-bar-item">Menu</h2>
		<a href="viewallappointments.php" class="w3-bar-item w3-button">View all Appointments</a>
		<a href="viewallprescriptions.php" class="w3-bar-item w3-button">View all Prescriptions</a>
		<a href="patienteditprofile.php" class="w3-bar-item w3-button">Edit Profile</a>
		<a href="patientchangepassword.php" class="w3-bar-item w3-button">Change Password</a>
	</div>

	<!-- Page Content -->
	<div style="margin-left:20%">

		<div class="w3-container w3-teal" style="height: 80px;">
			<span class="heading"><a href="patientloginhome.php"> Patient Portal</a></span>
			<div class="header-right">
				<strong class="logout"><a href="logout.php"> Logout</a></strong>
        	</div>
		</div>

		<div class="w3-container">
			<h1 style="font-size: 36px;text-align: center;"> Change Password </h1>
			<div class="form-content" style="width: 60%">
				<form action="" method="POST" name="change pw" onsubmit="return validateform()">
					Password should be min of 8 characters including atleast one number,one uppercase,one lowercase and one special character.<br><br>
					<label><b>Current Password</b></label>
					<input type="password" name="pwd" placeholder="Enter current password" required="" class="myinput" title="Min of 8 characters with atleast one symbol,one uppercase,one number,one lowercase characters.">
					<label><b>New Password</b></label>
					<input type="password" name="pw" placeholder="Enter new password" required="" class="myinput" title="Min of 8 characters with atleast one symbol,one uppercase,one number,one lowercase characters.">

					<label><b>Confirm Password</b></label>
					<input type="password" name="cpw" placeholder="Re-Enter password" required="" class="myinput">
					<p id="pwmatch"></p>
					<input type="submit" name="submit" class="submit">
				</form>
			</div>
		</div>
		<?php
			if(isset($_POST["pwd"])){
				$pwd=$_POST["pwd"];
				$pw=$_POST["pw"];
				$cpw=$_POST["cpw"];
				if($row1["password"]==$pwd){
					$sql2="UPDATE patient set password='$pw' where pid='$id'";
					$result2=mysqli_query($conn,$sql2);
					if ($result2) {
						echo "<center><span style='color:green;'> Password changed successfully</span></center>";
						header("refresh:5;url=patientchangepassword.php");
					}
				}
				else{
					echo "<center><span style='color:red;'> Current password is incorrect</span></center>";
					header("refresh:5;url=patientchangepassword.php");
				}
			}
		?>
		<script type="text/javascript">
		var v=document.changepw.pw;
		var w=document.changepw.cpw;
		regexp=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?!.*\s).{8,}$/;
		function validateform(){
			if (v.value==w.value) {
			}
			else{
				document.getElementById('pwmatch').innerHTML="Passwords do not match";
				document.getElementById('pwmatch').style="color:red;";
				return false;
			}
			if(v.value.match(regexp))
				document.getElementById('pwmatch').innerHTML="Passwords match the required criteria";
			else{
				document.getElementById('pwmatch').innerHTML="Password should be min of 8 characters including atleast one number,one uppercase,one lowercase and one special character";
				return false;
			}
		}
		</script>
	</div>	
</body>
</html>
