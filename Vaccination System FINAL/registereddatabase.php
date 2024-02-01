<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="vscss.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Client Database</title>
</head>
<body>
	<h1 style="color: white";><center>HEADER</center></h1>
	<center><br>
		<form id="search-client" action="registereddatabase.php" method="POST">
			<input style="height: 20px; width: 100px;" type="text" name="value" placeholder="Search"><br> <br>
	<div class="tablecont">
		<font color="white">
		<table style="width:98%">
  			<tr>
    			<th>User ID</th>
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

  			<?php
				include "databaseconnection.php";
				$sql = "SELECT * FROM personaldetails";
				$result = mysqli_query($conn, $sql);
    			while($row = mysqli_fetch_assoc($result)) {
   	 			$userid = $row["userid"];
   	 			$firstname = $row["firstname"];
   	 			$lastname = $row["lastname"];
    			$middlename = $row["middlename"];
    			$category = $row["category"];
    			$address = $row["address"];
    			$firstdose = $row["firstdose"];
    			$seconddose = $row["seconddose"];
      		echo '
  			<tr>
    			<td>'.$userid.'</td>
    			<td>'.$firstname.'</td>
    			<td>'.$lastname.'</td>
    			<td>'.$middlename.'</td>
    			<td>'.$category.'</td>
    			<td>'.$address.'</td>
    			<td>'.$firstdose.'</td>
    			<td>'.$seconddose.'</td>
    			<td><a href="edit.php?userid='.$userid.'"><button>Edit</button></a></td>
    			<td><a href="delete.php?userid='.$userid.'"><button>Delete</button></a></td>';
  			}

   mysqli_close($conn);
?>
    			
  			</tr>
		</table>
		</font>
	</div>
	</center>
      
</body>
</html>