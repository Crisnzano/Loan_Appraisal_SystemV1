<?php

	include'db_connect.php';


	
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$username=$_POST['username'];
		$address = $_POST['address'];
		$contact_no = $_POST['contact_no'];
		$email = $_POST['email'];
		$tax_id = $_POST['tax_id'];
		$password= $_POST['password'];
		$type=2;


	$sql = "INSERT INTO roles (lastname, firstname, username,address, phonenumber, email, tax_id, password, type) VALUES ('$lastname', '$firstname','$username','$address','$contact_no', '$email', '$tax_id', '$password','$type')";
	if(mysqli_query($conn,$sql)){
		echo"<br>";
		echo header('location:login.php?signup=success');
		}else{
		die("Error Inserting Data");
		}
 
	
 
?>

