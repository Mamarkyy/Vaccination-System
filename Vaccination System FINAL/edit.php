<?php
include "databaseconnection.php";
$id = $_GET["id"];

$firstname="";
$lastname="";
$middlename="";
$category="";
$address="";
$firstdose="";
$seconddose="";

$res = mysqli_query($link, "select * from personaldetails where id=$id");
while($row=mysqli_fetch_array($res))
{
	$firstname = $row["firstname"];
	$lastname = $row["lastname"];
	$middlename = $row["middlename"];
	$category = $row["category"];
	$address = $row["address"];
	$firstdose = $row["firstdose"];
	$seconddose = $row["seconddose"];

}
?>


<!DOCTYPE html>
<html>
	<head>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<title>Client</title>

		<?php // CSS Styling Portion ?>

		<style type="text/css">

			body {
			background-image: url("newvaccbg.png");
			background-repeat: no-repeat;
			} 

			table {
			border-collapse: collapse;
			width: 100%;
			color:#111111;
			text-align: center;
			font-family: 25px
			
			} th {
				background-color: #f29dae;
				color: white;

			} tr:nth-child(even) {
				background-color: #ededed;
			}
		</style>
	</head>

	<?php // HTML Body ?>

<body>
	<?php //Add client?>
		<div class="container-fluid">
			<div style="width: 50vw;border:5px solid white;background-color: white; opacity: 90%; padding: 2rem; border-radius: 7rem; margin:5rem auto;">
			  <h2 class="text-center"></h2>
			  <form action="" name="form1" method="post" >
			    <div class="form-group">
			      <label for="email">Firstname:</label>
			      <input style = " background-color: gray; color: white" type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname" autocomplete="off" value="<?php echo $firstname; ?>" required>
			    </div>
			    <div class="form-group">
			      <label for="pwd">Lastname:</label>
			      <input style = " background-color: gray; color: white" type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname" autocomplete="off" value="<?php echo $lastname; ?>" required>
			    </div>
			    <div class="form-group">
			      <label for="pwd">Middlename:</label>
			      <input style = " background-color: gray; color: white" type="text" class="form-control" id="middlename" placeholder="Enter middlename" name="middlename" autocomplete="off" value="<?php echo $middlename; ?>" required >
			    </div>
			    <div class="form-group">
			      <label for="pwd">Category:</label>
			      <input style = " background-color: gray; color: white" type="text" class="form-control" id="category" placeholder="Enter category" name="category" autocomplete="off" value="<?php echo $category; ?>" required>
			    </div>
			    <div class="form-group">
			      <label for="pwd">Address:</label>
			      <input style = " background-color: gray; color: white" type="text" class="form-control" id="address" placeholder="Enter address" name="address" autocomplete="off" value="<?php echo $address; ?>" required>
			    </div>
			    <div class="form-group">
			      <label for="pwd">First Dose:</label>
			      <input style = " background-color: gray; color: white" type="date" class="form-control" id="firstdose" name="firstdose" value="<?php echo $firstdose; ?>" required>
			    </div>
			    <div class="form-group">
			      <label for="pwd">Second Dose:</label>
			      <input style = " background-color: gray; color: white" type="date" class="form-control" id="seconddose" name="seconddose" value="<?php echo $seconddose; ?>" required="">

				  <?php // Button for Update ?>
				
				  <button type="submit" name="update" class="btn btn-success btn-block" style="margin-top: 2rem;">Update</button>
			  </form>
			</div>
	    </div>	    
		<?php // Insert img ?>         
                <img src="resbakuna.png" width="250" height="150" style =  "margin-left: 800px; margin-top: 10px" >
	</body>

	<?php // Update data //
if(isset($_POST["update"])) 
{
		mysqli_query($link,"update client set  
		firstname='".$_POST['firstname']."',
		lastname='".$_POST['lastname']."', 
		middlename='".$_POST['middlename']."', 
		category='".$_POST['category']."', 
		address='".$_POST['address']."', 
		firstdose='".$_POST['firstdose']."', 
		seconddose='".$_POST['seconddose']."' where id = ".$id);
?>

	<script type="text/javascript">
	window.location="table.php";
	</script>

	<?php
		}
	?>

</html>
