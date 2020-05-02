<?php
	session_start();
	$host="localhost";
	$username="root";
	$password="";
	$dbname="hospital_management";
	$conn=mysqli_connect($host,$username,$password,$dbname);
	if(!$_SESSION["puid"])
		header("location:pharmacylogin.php");
	$id=$_SESSION["puid"];
?>
<!DOCTYPE html>
<html>
	<title>Pharmacy Portal</title>
	<link rel="icon" href="max-healthcare-logo.jpg"">
	<link rel="stylesheet" href="style3.css">
	<style type="text/css">
		td{
			text-align: center;
		}
	</style>
<body>

	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%">
		<h2 class="w3-bar-item">Menu</h2>
		<a href="viewpendingprescriptions.php" class="w3-bar-item w3-button">View Pending Prescriptions</a>
		<a href="viewdeliveredprescriptions.php" class="w3-bar-item w3-button">View Delivered Prescriptions</a>
	</div>

	<!-- Page Content -->
	<div style="margin-left:20%">

		<div class="w3-container w3-teal" style="height: 80px;">
			<span class="heading"><a href="pharmacyloginhome.php">Pharmacy Portal</a></span >
			<div class="header-right">
				<strong class="logout"><a href="pharmacylogout.php"> Logout </a></strong>
        	</div>
		</div>

		<div class="w3-container">
			<form action="" method="post">
				<table border="2" style="border-style: solid 1px;width: 100%; <?php if (isset($_POST["submit"])) echo 'display: none;';?> ">
					<tr>
						<th>Line no</th>
						<th>Medicine Name</th>
						<th>Quantity</th>
						<th style="min-width: 50px;">MBF</th>
						<th style="min-width: 50px;">MAF</th>
						<th style="min-width: 50px;">ABF</th>
						<th style="min-width: 50px;">AAF</th>
						<th style="min-width: 50px;">NBF</th>
						<th style="min-width: 50px;">NAF</th>
						<th>Cost</th>
						<th>Amount</th>
					</tr>
				<?php
					$prid=$_GET["aid"];
					$_SESSION["aid"]=$prid;
					$sql1="SELECT * from prescription_lines where prid='$prid'";
					$result1=mysqli_query($conn,$sql1);
					while ($row1=mysqli_fetch_array($result1)) {
				?>
					<tr>
						<td><?php echo $row1["lineno"];?></td>
						<td><?php echo $row1["medicine"];?></td>
						<td><?php echo $row1["qty"];?></td>
						<td><input type="checkbox" <?php if($row1["mbf"]==1) echo "checked";?> disabled></td>
						<td><input type="checkbox" <?php if($row1["maf"]==1) echo "checked";?> disabled></td>
						<td><input type="checkbox" <?php if($row1["abf"]==1) echo "checked";?> disabled></td>
						<td><input type="checkbox" <?php if($row1["aaf"]==1) echo "checked";?> disabled></td>
						<td><input type="checkbox" <?php if($row1["nbf"]==1) echo "checked";?> disabled></td>
						<td><input type="checkbox" <?php if($row1["naf"]==1) echo "checked";?> disabled></td>
						<td><input type="number" name="cost<?php echo $row1['lineno'];?>" style="width: 100px; <?php if (isset($_POST["cost"])) echo 'display: none;'; ?>" required> <?php if(isset($_POST["cost"])) echo $_POST["cost"]; ?></td>

						<td><input type="number" name="amount" style="width: 100px; <?php if (isset($_POST["cost"])) echo 'display: none;'; ?>" disabled> <?php if(isset($_POST['cost'])) echo $row1['qty']*$_POST['cost']; ?></td>
					</tr>
				<?php	} ?>
				</table>
				<input type="submit" name="submit" style="<?php if (isset($_POST["submit"])) echo 'display: none;'; ?>">
			</form>
				<?php 
					if (isset($_POST["submit"])) {
				?>
				<table border="2" style="border-style: solid 1px;width: 100%;">
					<tr>
						<th>Line no</th>
						<th>Medicine Name</th>
						<th>Quantity</th>
						<th style="min-width: 50px;">MBF</th>
						<th style="min-width: 50px;">MAF</th>
						<th style="min-width: 50px;">ABF</th>
						<th style="min-width: 50px;">AAF</th>
						<th style="min-width: 50px;">NBF</th>
						<th style="min-width: 50px;">NAF</th>
						<th>Cost</th>
						<th>Amount</th>
					</tr>
					<?php
						$sql2="SELECT * from prescription_lines where prid='$prid'";
						$result2=mysqli_query($conn,$sql2);
						while ($row2=mysqli_fetch_array($result2)) {
							$lineno=$row2["lineno"];
							$c="cost".strval($row2["lineno"]);
							$cost=$_POST[$c];
							$amount=$row2["qty"]*$cost;
							$sql3="UPDATE prescription_lines set cost='$cost',amt='$amount' where prid='$prid' and lineno='$lineno' ";
							$result3=mysqli_query($conn,$sql3);
						}
						$sql2="SELECT * from prescription_lines where prid='$prid'";
						$result2=mysqli_query($conn,$sql2);
						$total=0;
						while ($row2=mysqli_fetch_array($result2)) {
							$total=$total+$row2["amt"];
					?>
					<tr>
						<td><?php echo $row2["lineno"];?></td>
						<td><?php echo $row2["medicine"];?></td>
						<td><?php echo $row2["qty"];?></td>
						<td><input type="checkbox" <?php if($row2["mbf"]==1) echo "checked";?> disabled></td>
						<td><input type="checkbox" <?php if($row2["maf"]==1) echo "checked";?> disabled></td>
						<td><input type="checkbox" <?php if($row2["abf"]==1) echo "checked";?> disabled></td>
						<td><input type="checkbox" <?php if($row2["aaf"]==1) echo "checked";?> disabled></td>
						<td><input type="checkbox" <?php if($row2["nbf"]==1) echo "checked";?> disabled></td>
						<td><input type="checkbox" <?php if($row2["naf"]==1) echo "checked";?> disabled></td>
						<td> <?php echo $row2["cost"]; ?></td>

						<td> <?php echo $row2["amt"]; ?></td>
					</tr>
					<?php } ?>
					<tr>
						<td></td>
						<td>Total</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo $total;?></td>
					</tr>
					<?php 
						$sql4="UPDATE appointment set delivered=1 where aid='$prid'";
						$result4=mysqli_query($conn,$sql4);
						}
					?>
			</table>
		</div>

	</div>	
</body>
</html>
