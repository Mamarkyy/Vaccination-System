<?php 
	session_start();
	// initialize variables
	$firstname = "";
	$lastname = "";
	$middlename = "";
	$category = "";
	$address = "";
	$firstdose = "";
	$seconddose = "";
	$userid = 0;
	$edit_state = false;

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'vaccinationsystem');

	// if save button is clicked
	if (isset($_POST['save'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$middlename = $_POST['middlename'];
		$category = $_POST['category'];
		$address = $_POST['address'];
		$firstdose = $_POST['firstdose'];
		$seconddose = $_POST['seconddose'];

		$query = "INSERT INTO personaldetails (firstname, lastname, middlename, category, address, firstdose, seconddose) VALUES ('$firstname', '$lastname', '$middlename', '$category', '$address', '$firstdose', '$seconddose')";
		mysqli_query($db, $query);
		header('location: registereddatabaseNEW.php'); // redirect to index page after inserting
	}

	// update records
	if (isset($_POST['update'])) {
		$firstname = ($_POST['firstname']);
		$lastname = ($_POST['lastname']);
		$middlename = ($_POST['middlename']);
		$category = ($_POST['category']);
		$address = ($_POST['address']);
		$firstdose = ($_POST['firstdose']);
		$seconddose = ($_POST['seconddose']);
		$userid = ($_POST['userid']);

		mysqli_query($db, "UPDATE personaldetails SET firstname='$firstname', lastname='$lastname', middlename='$middlename', category='$category', address='$address', firstdose='$firstdose', seconddose='$seconddose' WHERE userid=$userid");
		header('location: registereddatabaseNEW.php');
	}

	// delete records
	if (isset($_GET['del'])) {
		$userid = $_GET['del'];
		mysqli_query($db, "DELETE FROM personaldetails WHERE userid=$userid");
		header('location: registereddatabaseNEW.php');
	}

	// retrieve records
	$results = mysqli_query($db, "SELECT * FROM personaldetails");

?>