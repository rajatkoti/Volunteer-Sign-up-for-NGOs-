<?php
include 'dbconnect.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$key = $_POST["eventId"];
$sql = "UPDATE sign_up SET cancel = '1' WHERE event_id = '$key' ";
"UPDATE ngo SET flag = '1' WHERE registration_id = '$key' ";
$result = $conn->query($sql);


$conn->close();
?>
   

