<?php
	session_start();
	$host="localhost";
	$username="root";
	$password="";
	$dbname="hospital_management";
	$conn=mysqli_connect($host,$username,$password,$dbname);
	if (isset($_POST["submit"])) {
		$count=0;
		$no=$_SESSION["nooflines"];
		$aid=$_SESSION["aid"];
		$sql1="SELECT * from appointment where aid='$aid'";
		$result1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_array($result1);
		while ($count<$no) {
			$c=$count+1;
			$a="s".strval($count+1);
			$sno=$_POST[$a];
			$a="m".strval($count+1);
			$mname=$_POST[$a];
			$a="q".strval($count+1);
			$qty=$_POST[$a];
			$a="mbf".strval($count+1);if (isset($_POST[$a])) $mbf=$_POST[$a]; else $mbf=0;
			$a="maf".strval($count+1);if (isset($_POST[$a])) $maf=$_POST[$a]; else $maf=0;
			$a="abf".strval($count+1);if (isset($_POST[$a])) $abf=$_POST[$a]; else $abf=0;
			$a="aaf".strval($count+1);if (isset($_POST[$a])) $aaf=$_POST[$a]; else $aaf=0;
			$a="nbf".strval($count+1);if (isset($_POST[$a])) $nbf=$_POST[$a]; else $nbf=0;
			$a="naf".strval($count+1);if (isset($_POST[$a])) $naf=$_POST[$a]; else $naf=0;
			$sql3="INSERT into prescription_lines set prid='$aid', lineno='$sno', medicine='$mname', mbf='$mbf', maf='$maf', abf='$abf', aaf='$aaf', nbf='$nbf', naf='$naf', qty='$qty' ";
			$result3=mysqli_query($conn,$sql3);
			if(!$result3) echo "<br>".mysql_error();
			$count+=1;
		}
		if($result3){
			$sql2="UPDATE appointment set prid='$aid',attended=1 where aid='$aid'";
			$result2=mysqli_query($conn,$sql2);
			if($result2){
				echo "Prescription given Successfully.";
				header("refresh:3;url=giveaprescription.php");
			}
		}
	}
?>