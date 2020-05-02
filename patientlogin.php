<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Patient Login</title>
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
	<div class="content" ">
		<h1 style="font-size: 36px;text-align: center;">Patient login</h1>
		<div class="form-content">
			<form action="" method="POST">
				<label><b>Patient ID</b></label><br>
				<input type="text" name="pid" class="myinput" placeholder="Enter your Patient ID" required="" autofocus=""><br>
				<label><b>Password</b></label><br>
				<input type="password" name="pw" class="myinput" placeholder="Enter Password" required=" "><br>
				Not yet registered? Click <a href="patientsignup.html"> here </a> to register.<br>
				<?php
					session_start();
					$host="localhost";
					$username="root";
					$password="";
					$dbname="hospital_management";
					$conn=mysqli_connect($host,$username,$password,$dbname);
					if(!$conn){
						die("Failed to make a connection with database ".$dbname.mysqli_error());
						header("refresh:2;url=patientlogin.php");
					}
					if(isset($_POST["pid"])&&isset($_POST["pw"])){
						$id=$_POST["pid"];
						$password=$_POST["pw"];
						$_SESSION["pid"]=$id;
						$sql="SELECT * FROM patient WHERE pid='$id'";
						$result=mysqli_query($conn,$sql);
						$row=mysqli_fetch_array($result);
						$count=mysqli_num_rows($result);
						if($count==1){
							if($password==$row["password"]){
								echo "login successful";
								header("location:patientloginhome.php");
							}
							else{
								echo "password is incorrect.";
							}
						}
						else
							echo "Incorrect login details";
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