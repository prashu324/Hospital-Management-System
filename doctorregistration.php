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
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["emailid"];
	$mobile=$_POST["mobile"];
	$place=$_POST["place"];	
	$password=$_POST["aadhar"];
	$gender=$_POST["gender"];
	$dob=$_POST["dob"];
	$aadhar=$_POST["aadhar"];
	$dept=$_POST["dept"];
	$sql4="SELECT * from department where dname='$dept'";
	$result4=mysqli_query($conn,$sql4);
	$row4=mysqli_fetch_array($result4);
	$deptno=$row4["dno"];
	$sql2="INSERT INTO doctor SET fname='$fname',lname='$lname',email='$email',mobile='$mobile',dob='$dob',place='$place',gender='$gender',password='$password',aadhar='$aadhar',status=1,dno='$deptno'";
	$result2=mysqli_query($conn,$sql2);
	if ($result2) {
		echo "<span style='color:green;'>Doctor Registration Successful</span><br>";
		header("refresh:5;url=adddoctor.php");
	}
	else{
		$sql1="SELECT * from doctor where aadhar = '$aadhar'";
		$result1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_array($result1);
		if($row1["status"]==0){
			$sql3="UPDATE doctor set status=1 where aadhar='$aadhar' ";
			$result3=mysqli_query($conn,$sql3);
			if($result3){
				echo "<span style='color:green;'>Doctor Registration Successful</span><br>";
				header("refresh:5;url=adddoctor.php");
			}
		}
		else{
			echo "<span style='color:red;'>Doctor with given aadhar no already exists. </span><br>";
			header("refresh:5;url=adddoctor.php");
		}
	}
?>