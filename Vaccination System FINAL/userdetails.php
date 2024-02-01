<?php
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$middlename=$_POST['middlename'];
	$category=$_POST['category'];
	$address=$_POST['address'];
	$firstdose=$_POST['firstdose'];
	$seconddose=$_POST['seconddose'];
	var_dump ($firstname);
	var_dump ($lastname);
	var_dump ($middlename);
	var_dump ($category);
	var_dump ($address);
	var_dump ($firstdose);
	var_dump ($seconddose);
	$conn = new mysqli("localhost", "root", "", "vaccinationsystem");

	if($conn->connect_error) {
		die("Failed to connect: " .$conn->connect_error);
	} else {
		$msg = $conn->prepare("insert into personaldetails (firstname, lastname, middlename, category, address, firstdose, seconddose) values(?,?,?,?,?,?,?)");
		var_dump ($msg);
		$msg->bind_param("sssssss", $firstname, $lastname, $middlename, $category, $address, $firstdose, $seconddose);
		$msg->execute();
		redirect("loginform.html");
		$msg->close();
		$conn->close();
	}
		function redirect($url) {
		ob_start();
		header('Location: '.$url);
		ob_end_flush();
		die();
	}
?>