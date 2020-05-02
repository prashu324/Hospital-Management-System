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
	<style>
		td{
			text-align: center;
		}
	</style>
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
			<table border="2" style="border-style: solid 1px;width: 100%;">
				<tr>
					<th>Line no</th>
					<th>Medicine Name</th>
					<th>Quantity</th>
					<th style="min-width: 50px;">MBF</th>
					<th style="min-width: 50px;">MAF</th>
					<th style="min-width: 50px;">ABF</th>
					<th style="min-width: 50px;">AAF</th>
					<th style="min-width: 50px;">NBF</th>
					<th style="min-width: 50px;">NAF</th>
				</tr>
			<?php
				$prid=$_GET["aid"];
				$sql1="SELECT * from prescription_lines where prid='$prid'";
				$result1=mysqli_query($conn,$sql1);
				while ($row1=mysqli_fetch_array($result1)) {
			?>
				<tr>
					<td><?php echo $row1["lineno"];?></td>
					<td><?php echo $row1["medicine"];?></td>
					<td><?php echo $row1["qty"];?></td>
					<td><input type="checkbox" <?php if($row1["mbf"]==1) echo "checked";?> disabled></td>
					<td><input type="checkbox" <?php if($row1["maf"]==1) echo "checked";?> disabled></td>
					<td><input type="checkbox" <?php if($row1["abf"]==1) echo "checked";?> disabled></td>
					<td><input type="checkbox" <?php if($row1["aaf"]==1) echo "checked";?> disabled></td>
					<td><input type="checkbox" <?php if($row1["nbf"]==1) echo "checked";?> disabled></td>
					<td><input type="checkbox" <?php if($row1["naf"]==1) echo "checked";?> disabled></td>
				</tr>
			<?php	} ?>
			</table>
		</div>
	</div>	
</body>
</html>