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
		<font color="white"><button class="lgbtn"><a class="lgn" href="adminlogin.html">Logout</button></a></font>
	</div>
	<?php if (isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg'])
			?>
		</div>
	<?php endif ?>
<center><h1 style="color: white;">CLIENT DATABASE</h1></center>
<div class="searchplacement">
	<form method="post" action="searchtable.php">
		<input class="searchwd" type="text" name="search"> 
		<button type="submit" name="submit">Search</button>
	</form>
</div>
	<br>
	<div class="tablecont">
		<font color="white">
		<table style="width: 98%">
				<tr>
					<th>First Name</th>
    				<th>Last Name</th>
    				<th>Middle Name</th>
    				<th>Category</th>
    				<th>Address</th>
    				<th>First Dosage</th>
    				<th>Second Dosage</th>
    				<th>Update</th>
    				<th>Remove</th>
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
						<td>
							<a style="font-weight: bold;" class="fyp" href="registereddatabaseNEW.php?edit=<?php echo $row['userid']; ?>">EDIT</a>
						</td>
						<td>
							<a style="font-weight: bold;" class="fyp" href="server.php?del=<?php echo $row['userid']; ?>">DELETE</a>
						</td>
					</tr>
				<?php } ?>
		</table>
		</font>
	</div>
<br>
<div class="containerrd"> <br>
	<div class="containerrd2">
<font color="white">
	<form method="post" action="server.php">
	<input type="hidden" name="userid" value="<?php echo $userid; ?>">
		<div>
			<label>First Name</label>
			<input type="text" name="firstname" value="<?php echo $firstname; ?>">
		</div>
		<div>
			<label>Last Name</label>
			<input type="text" name="lastname" value="<?php echo $lastname; ?>">
		</div>
		<div>
			<label>Middle Name</label>
			<input type="text" name="middlename" value="<?php echo $middlename; ?>">
		</div>
		<div>
			<label>Category</label>
			<input type="text" name="category" value="<?php echo $category; ?>">
		</div>
		<div>
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>
		<div>
			<label>First Dosage</label>
			<input type="date" name="firstdose" value="<?php echo $firstdose; ?>">
		</div>
		<div>
			<label>Second Dosage</label>
			<input type="date" name="seconddose" value="<?php echo $seconddose; ?>">
		</div><br>
		<div style="text-align: center;">
			<?php if ($edit_state == false): ?>
				<button type="submit" name="save" class="lgn">Save</button>
			<?php else: ?>
				<button type="submit" name="update" class="lgn">Update</button>
			<?php endif ?>
		</div> </div>
	</form>
</font>
</div>
</body>
</html>