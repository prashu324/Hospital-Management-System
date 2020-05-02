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
	$sql1="SELECT * from appointment where pid='$id' order by dateofappointment";
	$result1=mysqli_query($conn,$sql1);
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
			<?php
				if(mysqli_num_rows($result1)==0)
					echo "No appointments";
				else{
			?>
			<table class="cnfappnt" border="2" style="border-style: solid 1px;width: 100%;">
				<tr class="cnfappnt-tr">
					<th class="cnfappnt-th">Appointment ID</th>
					<th class="cnfappnt-th">Date</th>
					<th class="cnfappnt-th">Doctor name</th>
					<th class="cnfappnt-th">Problem</th>
					<th class="cnfappnt-th">Confirmation</th>
					<th class="cnfappnt-th">Attended</th>
				</tr>
				<?php while ($row1=mysqli_fetch_array($result1)) {
					$did=$row1["did"];
					$sql2="SELECT * from doctor where doctor_id='$did'";
					$result2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_array($result2); ?>
				<tr>
					<td><?php echo $row1["aid"]; ?></td>
					<td><?php echo $row1["dateofappointment"]; ?></td>
					<td><?php echo $row2["fname"]." ".$row2["lname"]; ?></td>
					<td><?php echo $row1["problem"]; ?></td>
					<td><?php if($row1["confirmation"]==0) echo "Awaiting Confirmation"; else if($row1["confirmation"]==1) echo "Confirmed"; else echo "Rejected"; ?></td>
					<td><?php if($row1["attended"]==0) echo "Not Attended"; else if($row1["confirmation"]==1) echo "Attended";?></td>
				</tr>
				<?php } ?>
			</table>
			<?php } ?>
		</div>
	</div>	
</body>
</html>
