<?php
include 'dbconnect.php';
session_start();
#include '../homepage.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$eventId = $_GET["event_id"];
$un = $_SESSION["username"];
	// output data of each row
$sql2 = "INSERT INTO `wishlist` (`email`, `event_id`,`flag`) VALUES ('".$un."','".$eventId."','0')";
$result2 = $conn->query($sql2);
$conn->close();
header("Location: event.php");
?>