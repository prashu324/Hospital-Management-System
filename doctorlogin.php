<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Doctor Login</title>
	<link rel="icon" href="max-healthcare-logo.jpg"">
</head>
<body>
	<div class="header">
		<div class="hospital-logo">
			<img src="max-healthcare-logo.jpg" height="100px;" width="250px;">
			<img src="emergency.png" style="float: right;">
		</div>
	</div>
	<div class="navigation">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="aboutus.html">About us</a></li>
			<li><a href="findadoctor.php">Find a doctor</a></li>
			<li><a href="contactus.html">Contact us</a></li>
			<li class="dropdown"><a href="#">Quick links</a>
				<div class="dropdown-content">
					<a href="patientlogin.php">Patient Login</a>
					<a href="doctorlogin.php">Doctor Login</a>
					<a href="pharmacylogin.php">Pharmacy Login</a>
					<a href="adminlogin.php">Admin Login</a>
				</div>
			</li>
		</ul>
	</div>
	<div class="content">
		<h1 style="font-size: 36px;text-align: center;">Doctor login</h1>
		<div class="form-content">
			<form action="" method="POST">
				<label><b>Doctor ID</b></label><br>
				<input type="text" name="did" class="myinput" placeholder="Enter your Doctor ID" required="" autofocus=""><br>
				<label><b>Password</b></label><br>
				<input type="password" name="pw" class="myinput" placeholder="Enter Password" required=" "><br>
				<?php
					session_start();
					$host="localhost";
					$username="root";
					$password="";
					$dbname="hospital_management";
					$conn=mysqli_connect($host,$username,$password,$dbname);
					if(!$conn){
						die("Failed to make a connection with database ".$dbname.mysqli_error());
						header("refresh:2;url=doctorlogin.php");
					}
					if(isset($_POST["did"])&&isset($_POST["pw"])){
						$id=$_POST["did"];
						$password=$_POST["pw"];
						$_SESSION["did"]=$id;
						$sql="SELECT * FROM doctor WHERE doctor_id='$id'";
						$result=mysqli_query($conn,$sql);
						$row=mysqli_fetch_array($result);
						$count=mysqli_num_rows($result);
						if($count==1 && $row["status"]==1){
							if($password==$row["password"]){
								echo "login successful";
								header("location:doctorloginhome.php");
							}
							else{
								echo "<center><span style='color:red;'>Password is incorrect.</span></center>";
							}
						}
						else
							echo "<center><span style='color:red;'>Incorrect login details.</span></center>";
						//header("refresh:10;url=patientlogin.html");
						mysqli_close($conn);
					}
				?>
				<input type="submit" name="submit" class="submit">

			</form>
			
		</div>
	</div>
	<div class="footer">
		© 2017 Max Health Care by <b>Prasanth Sikakollu</b>
	</div>
</body>
</html>