<?php
	session_start();
	$host="localhost";
	$username="root";
	$password="";
	$dbname="hospital_management";
	$conn=mysqli_connect($host,$username,$password,$dbname);
	if(!$_SESSION["aid"])
		header("location:adminlogin.php");
	$id=$_SESSION["aid"];
?>
<!DOCTYPE html>
<html>
	<title>Admin Portal</title>
	<link rel="stylesheet" href="style3.css">
	<link rel="icon" href="max-healthcare-logo.jpg"">
<body>

	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%">
		<h2 class="w3-bar-item">Menu</h2>
		<a href="adddoctor.php" class="w3-bar-item w3-button">Add a Doctor</a>
		<a href="removedoctor.php" class="w3-bar-item w3-button">Remove a Doctor</a>
		<a href="adminattendedappointments.php" class="w3-bar-item w3-button">Attended Appointments</a>
		<a href="adminunattendedappointments.php" class="w3-bar-item w3-button">Not Attended Appointments</a>
		<a href="pharmacybills.php" class="w3-bar-item w3-button">View pharmacy bills</a>
	</div>

	<!-- Page Content -->
	<div style="margin-left:20%">

		<div class="w3-container w3-teal" style="height: 80px;">
			<span class="heading"><a href="adminportal.php"> Admin Portal</a></span >
			<div class="header-right">
				<strong class="logout"><a href="adminlogout.php"> Logout</a></strong>
        	</div>
		</div>

		<div class="w3-container">
			<h1 class="welcome">Welcome to Admin Portal</h1>
		</div>

	</div>	
</body>
</html>
