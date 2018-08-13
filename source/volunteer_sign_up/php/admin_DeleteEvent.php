<?php
include 'dbconnect.php';
#include '../homepage.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$key = $_POST["eventId"];

$sql = "UPDATE event SET flag = '1' WHERE event_id = '$key' ";



//$sql = "DELETE FROM event where event_id= '$key'";
//echo $sql;
$result = $conn->query($sql);

//$sql2 = "UPDATE event SET flag = 1 WHERE event_id = '$key' ";

//$result2 = $conn->query($sql2);


$conn->close();
?>