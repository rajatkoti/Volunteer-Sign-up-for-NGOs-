<?php
include 'dbconnect.php';
session_start();
#include '../homepage.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$eventId = $_GET["event_id"];

$sql = "SELECT e.e_name, e.description, e.category, e.date, e.time, e.venue, n.ngo_name, n.description_ngo from event e, ngo n where event_id='".$eventId."' AND e.registration_id = n.registration_id AND e.date>= CURDATE()";
$result = $conn->query($sql);
$finalRows = array();
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	  array_push($finalRows,$row);
	}
} else {
	echo "Past Event. Check again later";
}
$jsonObj = json_encode($finalRows,JSON_FORCE_OBJECT);
echo $jsonObj;
$conn->close();

?>
