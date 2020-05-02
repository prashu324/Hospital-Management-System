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
	$date=date("d/m/Y");
	$sql1="SELECT * from appointment where dateofappointment='$date' and attended=0 and (confirmation=1 or confirmation=0)";
	$result1=mysqli_query($conn,$sql1);
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
			<?php
				if(mysqli_num_rows($result1)==0)
					echo "No unattended appointments";
				else{
			?>
			<table class="cnfappnt" border="2" style="border-style: solid 1px;width: 100%;">
				<tr class="cnfappnt-tr">
					<th class="cnfappnt-th">Appointment ID</th>
					<th class="cnfappnt-th">Date</th>
					<th class="cnfappnt-th">Patient ID</th>
					<th class="cnfappnt-th">Doctor ID</th>
					<th class="cnfappnt-th">Problem</th>
				</tr>
				<?php while ($row1=mysqli_fetch_array($result1)) {
					$pid=$row1["pid"];
					$sql2="SELECT * from patient where pid='$pid'";
					$result2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_array($result2); ?>
				<tr>
					<td><?php echo $row1["aid"]; ?></td>
					<td><?php echo $row1["dateofappointment"]; ?></td>
					<td><?php echo $row1["pid"]; ?></td>
					<td><?php echo $row1["did"]; ?></td>
					<td><?php echo $row1["problem"]; ?></td>
				</tr>
				<?php } ?>
			</table>
			<?php } ?>
		</div>

	</div>	
</body>
</html>
