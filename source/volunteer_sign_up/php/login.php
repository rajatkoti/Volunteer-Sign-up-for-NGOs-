<?php
	
	session_start();
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "volunteer";
	
	$uname = $_POST["username"];
	$pass = $_POST["passwd"];
		
	$pas = hash('sha256', $pass );	
		
	$_SESSION["username"] = "";
	$_SESSION["userlevel"] = "";
	//$uname = "admin";
	//$pass = "adminutd";
		
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

$sql = "SELECT userlevel FROM `users` where email = '$uname' And password ='$pas' ";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
		
		print json_encode($row['userlevel']);
		$_SESSION["username"] = $uname;
		$_SESSION["userlevel"] = $row['userlevel'];
     
	}
	
} 
else {
    print json_encode('x');
}


$conn->close();
?>