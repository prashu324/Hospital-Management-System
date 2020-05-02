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
			<h1 style="font-size: 36px;text-align: center;"> Give a Prescription </h1>
			<div class="form-content" style="width: 80%; background-color: rgb(240,240,240);">
				<form action="" method="POST">
					<label><b>Appointment ID</b></label>
					<input type="text" name="aid" placeholder="Enter Appointment ID" required="" class="myinput" <?php if(isset($_POST["aid"])) echo "disabled value='".$_POST["aid"]."'"; ?> autofocus>
					
					<input type="number" name="nooflines" placeholder="Enter no of lines in prescription" required="" class="myinput" <?php if(isset($_POST["aid"])) echo "style='display:none;' value='".$_POST["nooflines"]."'"; ?>>
						
					<input type="submit" name="submit" class="submit" <?php if(isset($_POST["submit"])) echo "style='display:none;'"; ?>>
				</form>
				<?php 
					if (isset($_POST["submit"])){
						$_SESSION["aid"]=$_POST["aid"];
						$aid=$_POST["aid"];
						$no=$_POST["nooflines"];
						$_SESSION["nooflines"]=$no;
						$sql1="SELECT * from appointment where aid='$aid'";
						$result1=mysqli_query($conn,$sql1);
						$row1=mysqli_fetch_array($result1);
						if ($row1["did"]!=$id) {
							echo "Invalid Appointment ID.";
							header("refresh:2;url=giveaprescription.php");
						}
						else if ($row1["confirmation"]==0) {
							echo "Appointment not yet confirmed. Confirm appointment in confirm appointment page.";
							header("refresh:2;url=giveaprescription.php");
						}
						elseif ($row1["attended"]==1) {
							echo "Appointment already attended";
							header("refresh:2;url=giveaprescription.php");
						}
						else if ($row1["confirmation"]==2) {
							echo "Appointment rejected";
							header("refresh:2;url=giveaprescription.php");
						}
						else{
				?>
				<form action="prescription.php" method="post">
					<h2>Prescription</h2>
					<table>
						<tr>
							<th>S.no</th>
							<th>Medicine Name</th>
							<th>Qty</th>
							<th style="min-width: 50px;">MBF</th>
							<th style="min-width: 50px;">MAF</th>
							<th style="min-width: 50px;">ABF</th>
							<th style="min-width: 50px;">AAF</th>
							<th style="min-width: 50px;">NBF</th>
							<th style="min-width: 50px;">NAF</th>
						</tr>
						<?php 
							$count=0;
							while ($count<$no) {
						?>
						<tr>
							<td> <input type="number" name="s<?php echo $count+1;?>" style="width: 70px;" value="<?php echo $count+1; ?>"> </td>
							<td><input type="text" name="m<?php echo $count+1;?>" style="width: 270px;" required> </td>
							<td> <input type="number" name="q<?php echo $count+1;?>" style="width: 70px;" required></td>
							<td style="text-align: center;"><input type="checkbox" value="1" name="mbf<?php echo $count+1;?>"></td>
							<td style="text-align: center;"><input type="checkbox" value="1" name="maf<?php echo $count+1;?>"></td>
							<td style="text-align: center;"><input type="checkbox" value="1" name="abf<?php echo $count+1;?>"></td>
							<td style="text-align: center;"><input type="checkbox" value="1" name="aaf<?php echo $count+1;?>"></td>
							<td style="text-align: center;"><input type="checkbox" value="1" name="nbf<?php echo $count+1;?>"></td>
							<td style="text-align: center;"><input type="checkbox" value="1" name="naf<?php echo $count+1;?>"></td>
						</tr>
						<?php $count+=1;}}?>
					</table>
					<input type="submit" name="submit" class="submit">
				</form>
				<?php }?>
			</div>
		</div>

	</div>	
</body>
</html>
