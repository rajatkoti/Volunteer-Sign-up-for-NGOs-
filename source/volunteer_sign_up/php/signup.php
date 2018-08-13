<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "volunteer";
	
	$uname = $_POST["uname"];
	$pass = $_POST["pass"];
	$myname1 = $_POST["myname1"];
	$myname2 = $_POST["myname2"];
	$userlevel = '0';
	
	$pass = hash('sha256', $pass );
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

$sql = "INSERT INTO `users` (`email`, `password`, `fname`,`lname`) VALUES ('$uname', '$pass', '$myname1','$myname2')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	print json_encode('exists');
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>