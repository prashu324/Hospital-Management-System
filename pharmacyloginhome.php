<?php
	session_start();
	$host="localhost";
	$username="root";
	$password="";
	$dbname="hospital_management";
	$conn=mysqli_connect($host,$username,$password,$dbname);
	if(!$_SESSION["puid"])
		header("location:pharmacylogin.php");
	$id=$_SESSION["puid"];
?>
<!DOCTYPE html>
<html>
	<title>Pharmacy Portal</title>
	<link rel="icon" href="max-healthcare-logo.jpg"">
	<link rel="stylesheet" href="style3.css">
<body>

	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%">
		<h2 class="w3-bar-item">Menu</h2>
		<a href="viewpendingprescriptions.php" class="w3-bar-item w3-button">View Pending Prescriptions</a>
		<a href="viewdeliveredprescriptions.php" class="w3-bar-item w3-button">View Delivered Prescriptions</a>
	</div>

	<!-- Page Content -->
	<div style="margin-left:20%">

		<div class="w3-container w3-teal" style="height: 80px;">
			<span class="heading"><a href="pharmacyloginhome.php">Pharmacy Portal</a></span >
			<div class="header-right">
				<strong class="logout"><a href="pharmacylogout.php"> Logout </a></strong>
        	</div>
		</div>

		<div class="w3-container">
			<h1 class="welcome">Welcome to Pharmacy Portal</h1>
		</div>

	</div>	
</body>
</html>
