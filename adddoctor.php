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
	$sql1="SELECT dname FROM department order by dname";
	$result1=mysqli_query($conn,$sql1);
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
			<h1 style="font-size: 36px;text-align: center;">Add Doctor</h1>
			<div class="form-content" style="width: 60%">
				<form action="doctorregistration.php" method="POST" name="signup">
					<span style="color: red;">*</span> This indicates required Field.<br><br>
					<label><b>First Name</b><span style="color: red;">*</span></label>
					<input type="text" name="fname" placeholder="Enter first name" required="" class="myinput" autofocus="" pattern="[A-Za-z]{}">

					<label><b>Last Name</b><span style="color: red;">*</span></label>
					<input type="text" name="lname" placeholder="Enter last name" required="" class="myinput" pattern="[A-Za-z]{}">

					<label><b>Specialisation</b></label><br>
					<select name="dept">
						<option selected="" value="0">Select Specialisation</option>
						<?php
						
						while($row1=mysqli_fetch_array($result1,MYSQL_ASSOC)){
							$dn=$row1["dno"];
						?>
						<option><?php echo $row1["dname"]; ?></option>
						<?php }?>
					</select><br>
					
					<label><b>Email ID</b></label>
					<input type="email" name="emailid" placeholder="Enter emailid" class="myinput">

					<label><b>Mobile</b><span style="color: red;">*</span></label>
					<input type="text" name="mobile" placeholder="Enter mobile number" required="" class="myinput" pattern="[0-9]{10}" title="Mobile number should contain 10 digits between 0-9">

					<label><b>Aadhar number</b><span style="color: red;">*</span></label>
					<input type="text" name="aadhar" placeholder="Enter Aadhar number" required="" class="myinput" pattern="[0-9]{12}" title="Aadhar number should contain 12 digits between 0-9">

					<label><b>Date of Birth</b><span style="color: red;">*</span></label>
					<input type="date" name="dob" placeholder="Select Date of Birth" required="" class="myinput">

					<label><b>Gender  </b><span style="color: red;">*</span></label>
					<input type="radio" name="gender" value="Male" required="">Male
					<input type="radio" name="gender" value="Female" required="">Female<br><br>

					<label><b>Place</b><span style="color: red;">*</span></label>
					<input type="text" name="place" placeholder="Enter place of residence" required="" class="myinput" pattern="[A-Za-z]{}">

					<input type="submit" name="submit" class="submit">
				</form>
			</div>
		</div>

	</div>	
</body>
</html>
