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
	<link rel="icon" href="max-healthcare-logo.jpg"">
	<link rel="stylesheet" href="style3.css">
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

		<div class="w3-container w3-teal" style="height: 80px;background-color: blue;">
			<span class="heading"><a href="adminportal.php"> Admin Portal</a></span >
			<div class="header-right">
				<strong class="logout"><a href="adminlogout.php"> Logout</a></strong>
        	</div>
		</div>

		<div class="w3-container">
			<h1 style="font-size: 36px;text-align: center;">Remove Doctor</h1>
			<div class="form-content" style="width: 60%">
				<form action="" method="POST" name="signup">
					<span style="color: red;">*</span> This indicates required Field.<br><br>
					<label><b>Doctor ID</b><span style="color: red;">*</span></label>
					<input type="text" name="did" placeholder="Enter Doctor ID" required="" class="myinput" autofocus="" pattern="[0-9]{}">

					<input type="submit" name="submit" value="Remove" class="submit">
				</form>
			</div>
			<?php
				$host="localhost";
				$username="root";
				$password="";
				$dbname="hospital_management";
				$conn=mysqli_connect($host,$username,$password,$dbname);
				if (isset($_POST["did"])) {
					$did=$_POST["did"];
					$sql1="SELECT * from doctor where doctor_id='$did'";
					$result1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_array($result1);
					if(mysqli_num_rows($result1)==1 && $row1["status"]==1){
						$sql2="UPDATE doctor set status=0 where doctor_id='$did'";
						$result2=mysqli_query($conn,$sql2);
						if ($result2) {
							echo "<center><span style='color:green;'>Doctor with ID ".$did." was deleted successfully</span></center>";
							header("refresh:5;url=removedoctor.php");
						}
					}
					else if(mysqli_num_rows($result1)==1 && $row1["status"]==0){
						echo "<center><span style='color:red;'>Doctor with ID ".$did." is not working currently.</span></center>";
						header("refresh:5;url=removedoctor.php");
					}
					else{
						echo "<center><span style='color:red;'>Doctor with ID ".$did." does not exist.</span></center>";
						header("refresh:5;url=removedoctor.php");
					}
				}
			?>
		</div>

	</div>	
</body>
</html>
