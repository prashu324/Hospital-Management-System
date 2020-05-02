<?php
	session_start();
	$host="localhost";
	$username="root";
	$password="";
	$dbname="hospital_management";
	$conn=mysqli_connect($host,$username,$password,$dbname);
	if (isset($_SESSION["dno"])) {
		if(isset($_POST["pid"])){
			$dno=$_SESSION["dno"];
			$pid=$_POST["pid"];
			$did=$_POST["did"];
			$date=date("d/m/Y");
			$confirmation=0;
			$attended=0;
			$problem=$_POST["problem"];
			$delivered=0;
			$sql2="SELECT * from patient where pid='$pid'";
			$result2=mysqli_query($conn,$sql2);
			$row2=mysqli_fetch_array($result2);
			if($row2){
				$sql1="INSERT INTO appointment set did='$did',pid='$pid', dateofappointment='$date', problem='$problem', confirmation='$confirmation', attended='$attended', delivered='$delivered' ";
				$result1=mysqli_query($conn,$sql1);
				if ($result1) {
					echo "Appointment form submission successful... You can check appointment details on patient portal.";
					header("refresh:5;url=findadoctor.php");
				}
				else{
					echo "some error in submission".mysqli_error();
				}
			}
			else{
				echo "The given patient id does not exist. if you are a new patient, then click <a href='patientsignup.html'> here </a> to sign up.";
			}
		}
	}
	session_unset();
	session_destroy();
?>
