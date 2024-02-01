<?php include ('server.php');

	// fetch the record to be updated
	if (isset($_GET['edit'])){
		$userid = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM personaldetails WHERE userid=$userid");
		$record = mysqli_fetch_array($rec);
		$userid = $record['userid'];
		$firstname = $record['firstname'];
		$lastname = $record['lastname'];
		$middlename = $record['middlename'];
		$category = $record['category'];
		$address = $record['address'];
		$firstdose = $record['firstdose'];
		$seconddose = $record['seconddose'];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Client Database</title>
	<link rel="stylesheet" type="text/css" href="vscss.css">
	<link rel="stylesheet" type="text/css" href="vscss2.css">
</head>
<body>
	<div style="float: right;" class="lgcnt">
		<font color="white"><button class="lgbtn"><a class="lgn" href="loginform.html">Logout</button></a></font>
	</div>
	<?php if (isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg'])
			?>
		</div>
	<?php endif ?>
<center><h1 style="color: white;">HOMEPAGE</h1></center>
<div class="searchplacement">
	<form method="post" action="searchtablena.php">
		<input class="searchwd" type="text" name="search"> 
		<button type="submit" name="submit">Search</button>
	</form>
</div>
	<br>
	<div class="tablecont">
		<font color="white">
		<table style="width: 98%; text-align: center;">
				<tr>
					<th>First Name</th>
    				<th>Last Name</th>
    				<th>Middle Name</th>
    				<th>Category</th>
    				<th>Address</th>
    				<th>First Dosage</th>
    				<th>Second Dosage</th>
				</tr>
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr>
						<td><?php echo $row['firstname']; ?></td>
						<td><?php echo $row['lastname']; ?></td>
						<td><?php echo $row['middlename'] ?></td>
						<td><?php echo $row['category'] ?></td>
						<td><?php echo $row['address'] ?></td>
						<td><?php echo $row['firstdose'] ?></td>
						<td><?php echo $row['seconddose'] ?></td>
					</tr>
				<?php } ?>
		</table>
		</font>
	</div>
</font>
</div>
</body>
</html>