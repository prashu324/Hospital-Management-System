<?php
	session_start();
	$host="localhost";
	$username="root";
	$password="";
	$dbname="hospital_management";
	$conn=mysqli_connect($host,$username,$password,$dbname);
	if(!$_SESSION["did"])
		header("location:doctorlogin.php");
	$id=$_SESSION["did"];
	$sql1="SELECT * from doctor where doctor_id='$id'";
	$result1=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_array($result1);
?>
<!DOCTYPE html>
<html>
	<title>Doctor Portal</title>
	<link rel="icon" href="max-healthcare-logo.jpg"">
	<link rel="stylesheet" href="style3.css">
<body>

	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%">
		<h2 class="w3-bar-item">Menu</h2>
		<a href="giveaprescription.php" class="w3-bar-item w3-button">Give a Prescription</a>
		<a href="confirmappointments.php" class="w3-bar-item w3-button">Confirm Appointments</a>
		<a href="attendedappointments.php" class="w3-bar-item w3-button">Attended Appointments</a>
		<a href="notattendedappointments.php" class="w3-bar-item w3-button">Unattended Appointments</a>
		<a href="doctoreditprofile.php" class="w3-bar-item w3-button">Edit Profile</a>
		<a href="doctorchangepassword.php" class="w3-bar-item w3-button">Change Password</a>
	</div>

	<!-- Page Content -->
	<div style="margin-left:20%">

		<div class="w3-container w3-teal" style="height: 80px;">
			<span class="heading"><a href="doctorloginhome.php"> Doctor Portal</a></span >
			<div class="header-right">
				<strong class="logout"><a href="doctorlogout.php"> Logout</a></strong>
        	</div>
		</div>

		<div class="w3-container">
			<h1 style="font-size: 36px;text-align: center;"> Edit Profile </h1>
			<div class="form-content" style="width: 60%">
				<form action="" method="POST" name="signup">
					<span style="color: red;">*</span> This indicates required Field.<br><br>
					<label><b>First Name</b><span style="color: red;">*</span></label>
					<input type="text" name="fname" value="<?php echo $row1["fname"]; ?>" placeholder="Enter first name" required="" class="myinput" autofocus="" pattern="[A-Za-z]{}" disabled>

					<label><b>Last Name</b><span style="color: red;">*</span></label>
					<input type="text" name="lname" value="<?php echo $row1["lname"]; ?>" placeholder="Enter last name" required="" class="myinput" pattern="[A-Za-z]{}" disabled>

					<label><b>Email ID</b></label>
					<input type="email" name="emailid" value="<?php echo $row1["email"]; ?>" placeholder="Enter emailid" class="myinput">

					<label><b>Mobile</b><span style="color: red;">*</span></label>
					<input type="text" name="mobile" value="<?php echo $row1["mobile"]; ?>" placeholder="Enter mobile number" required="" class="myinput" pattern="[0-9]{10}" title="Mobile number should contain 10 digits between 0-9">

					<label><b>Aadhar number</b><span style="color: red;">*</span></label>
					<input type="text" name="aadhar" value="<?php echo $row1["aadhar"]; ?>" placeholder="Enter Aadhar number" required="" class="myinput" pattern="[0-9]{12}" title="Aadhar number should contain 12 digits between 0-9" disabled>

					<label><b>Date of Birth</b><span style="color: red;">*</span></label>
					<input type="date" name="dob" value="<?php echo $row1["dob"]; ?>" placeholder="Select Date of Birth" required="" class="myinput" disabled>

					<label><b>Place</b><span style="color: red;">*</span></label>
					<input type="text" name="place" value="<?php echo $row1["place"]; ?>" placeholder="Enter place of residence" required="" class="myinput" pattern="[A-Za-z]{}">

					<input type="submit" name="submit" class="submit">
				</form>
			</div>
		</div>
		<?php
			if (isset($_POST["place"])) {
				$place=$_POST["place"];
				$mobile=$_POST["mobile"];
				$email=$_POST["emailid"];
				$sql2="UPDATE doctor set place='$place', mobile='$mobile', email='$email' where doctor_id='$id'";
				$result2=mysqli_query($conn,$sql2);
				if ($result2) {
					echo "<center><span style='color:green;'>Doctor details updated</span></center>";
					header("refresh:5;url=doctoreditprofile.php");
				}
				else{
					echo mysql_error();
				}
			}
		?>
	</div>	
</body>
</html>
