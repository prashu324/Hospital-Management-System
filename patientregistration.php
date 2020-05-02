<?php
	$host="localhost";
	$username="root";
	$password="";
	$dbname="hospital_management";
	$conn=mysqli_connect($host,$username,$password,$dbname);
	if(!$conn){
		die("Failed to make a connection with database ".$dbname.mysqli_error());
		header("refresh:2;url=patientsignup.html");
	}
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["emailid"];
	$mobile=$_POST["mobile"];
	$place=$_POST["place"];	
	$password=$_POST["pw"];
	$gender=$_POST["gender"];
	$dob=$_POST["dob"];
	$aadhar=$_POST["aadhar"];
	$age=date("Y")-substr($dob,0,4);
	$sql2="INSERT INTO patient SET fname='$fname',lname='$lname',email='$email',mobile='$mobile',dob='$dob',place='$place',gender='$gender',password='$password',age='$age',aadhar='$aadhar'";
	$result2=mysqli_query($conn,$sql2);
	if ($result2) {
		echo "Patient Registration Successful<br>";
	}
	else{
		echo "Your aadhar no already exists. <br>";
	}
	$sql="SELECT * FROM patient WHERE aadhar='$aadhar'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	$pid = $row["pid"];
	echo "Your Patient Id is ".$pid;
	header("url=patientlogin.php");
	mysqli_close($conn);
	echo "<br>Click <a href='patientlogin.php'> here </a> to go to patient login page";
?>