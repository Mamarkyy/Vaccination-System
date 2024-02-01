<?php
	$username=$_POST['username'];
	$password=$_POST['password'];
	var_dump ($username);
	var_dump ($password);
	$conn = new mysqli("localhost", "root", "", "vaccinationsystem");

	if($conn->connect_error) {
		die("Failed to connect: " .$conn->connect_error);
	} else {
		$msg = $conn->prepare("insert into login (username, password) values(?,?)");
		var_dump ($msg);
		$msg->bind_param("ss", $username, $password);
		$msg->execute();
		redirect("userdetails.html");
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