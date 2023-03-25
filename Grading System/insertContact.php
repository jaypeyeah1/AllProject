<?php
include_once("connection.php");

if(isset($_POST['Send'])){
	$fullName = $_POST['fullName'];
	$emailAdd = $_POST['emailAdd'];
	$mobileNum = $_POST['mobileNum'];
    $emailSub = $_POST['emailSub'];
    $yourMessage = $_POST['yourMessage'];
		
	//tables
	$sql = "INSERT INTO contact (fullName, emailAdd, mobileNum, emailSub, yourMessage) 
	VALUES ('$fullName', '$emailAdd', '$mobileNum', '$emailSub', '$yourMessage');";

	mysqli_query($conn, $sql);

	echo "<script>alert('Successfully Inserted!')</script>";
	echo "<script>window.open('home.php','_self')</script>";
}
else{
	die();
}
?>

