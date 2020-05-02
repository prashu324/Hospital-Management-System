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
	$sql1="SELECT * from appointment where attended=1 and delivered=1 order by dateofappointment";
	$result1=mysqli_query($conn,$sql1);
?>
<!DOCTYPE html>
<html>
	<title>Pharmacy Portal</title>
	<link rel="icon" href="max-healthcare-logo.jpg"">
	<link rel="stylesheet" href="style3.css">
	<style type="text/css">
		td{
			text-align: center;
		}
	</style>
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
			<?php
				if(mysqli_num_rows($result1)==0)
					echo "No appointments";
				else{
			?>
			<table class="cnfappnt" border="2" style="border-style: solid 1px;width: 100%;">
				<tr class="cnfappnt-tr">
					<th class="cnfappnt-th">Appointment ID</th>
					<th class="cnfappnt-th">Date</th>
					<th class="cnfappnt-th">Patient name</th>
					<th class="cnfappnt-th">Doctor name</th>
					<th class="cnfappnt-th">Problem</th>
					<th class="cnfappnt-th">Prescription</th>
				</tr>
				<?php while ($row1=mysqli_fetch_array($result1)) {
					$did=$row1["did"];
					$pid=$row1["pid"];
					$sql2="SELECT * from doctor where doctor_id='$did'";
					$result2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_array($result2);
					$sql3="SELECT * from patient where pid='$pid'";
					$result3=mysqli_query($conn,$sql3);
					$row3=mysqli_fetch_array($result3);
				?>
					
				<tr>
					<td><?php echo $row1["aid"]; ?></td>
					<td><?php echo $row1["dateofappointment"]; ?></td>
					<td><?php echo $row3["fname"]." ".$row3["lname"]; ?></td>
					<td><?php echo $row2["fname"]." ".$row2["lname"]; ?></td>
					<td><?php echo $row1["problem"]; ?></td>
					<td><a href="viewprescription2.php<?php echo '?aid='.$row1['aid']; ?>">View</a></td>
				</tr>
				<?php } ?>
			</table>
			<?php } ?>
		</div>

	</div>	
</body>
</html>
