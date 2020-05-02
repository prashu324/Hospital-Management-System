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
	$sql1="SELECT * from appointment where did='$id' and confirmation=0";
	$result1=mysqli_query($conn,$sql1);
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
			<?php
				if(mysqli_num_rows($result1)==0)
					echo "No new appointments";
				else{
			?>
			<table class="cnfappnt" border="2" style="border-style: solid 1px;width: 100%;">
				<tr class="cnfappnt-tr">
					<th class="cnfappnt-th">Appointment ID</th>
					<th class="cnfappnt-th">Date</th>
					<th class="cnfappnt-th">Patient ID</th>
					<th class="cnfappnt-th">Patient name</th>
					<th class="cnfappnt-th">Problem</th>
					<th class="cnfappnt-th">Confirm</th>
					<th class="cnfappnt-th">Reject</th>
				</tr>
				<form action="" method="post">
				<?php 
					while ($row1=mysqli_fetch_array($result1)) {
					$pid=$row1["pid"];
					$sql2="SELECT * from patient where pid='$pid'";
					$result2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_array($result2); 
				?>
				<tr>
					<td><?php echo $row1["aid"]; ?></td>
					<td><?php echo $row1["dateofappointment"]; ?></td>
					<td><?php echo $row1["pid"]; ?></td>
					<td><?php echo $row2["fname"]." ".$row2["lname"]; ?></td>
					<td><?php echo $row1["problem"]; ?></td>
					<td><input type="radio" <?php echo "name='".$row1["aid"]."' value='1' " ; ?> required></td>
					<td><input type="radio" <?php echo "name='".$row1["aid"]."' value='2' " ; ?> required></td>
				</tr>
				<?php } ?>
				
				
			</table>
			<input type="submit" name="submit">	
			</form>
			<?php } ?>
			<?php
				if(isset($_POST["submit"])){
					$sql3="SELECT * from appointment where did='$id' and confirmation=0";
					$result3=mysqli_query($conn,$sql3);
					while ($row3=mysqli_fetch_array($result3)) {
						$aid=$row3["aid"];
						$cnf=$_POST[$aid];
						$sql4="UPDATE appointment set confirmation='$cnf' where aid='$aid' ";
						$result4=mysqli_query($conn,$sql4);

					}
					if($result4){
						echo "Submission successful";
						header("refresh:2;url=confirmappointments.php");
					}
					else{
						echo "Submission Unsuccessful";
						header("refresh:2;url=confirmappointments.php");
					}
				}
			?>
			
		</div>

	</div>	
</body>
</html>
