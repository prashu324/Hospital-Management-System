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
			<h1 class="welcome">Welcome to Doctor Portal</h1>
		</div>

	</div>	
</body>
</html>
