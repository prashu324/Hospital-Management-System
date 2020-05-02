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
			<h1 class="welcome">Welcome to Patient Portal</h1>
		</div>
	</div>	
</body>
</html>
