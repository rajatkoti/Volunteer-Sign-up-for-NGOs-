<?php
include 'dbconnect.php';
#include '../homepage.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$eventid = $_POST["event_id"];
$maxno = $_POST["max_no"];
$description = $_POST["description"];
$category = $_POST["category"];
$date = $_POST["date"];
$time = $_POST["time"];
$ename = $_POST["e_name"];
$venue = $_POST["venue"];
$image = $_POST["image"];
$registrationid = $_POST["registration_id"];


$sql = "INSERT INTO `event` (`event_id`, `max_no`, `description`, `category`, `date`, `time`, `e_name`, `venue`, `img`,`registration_id`) VALUES ('$eventid', '$maxno', '$description', '$category', '$date', '$time', '$ename', '$venue', '$image' ,'$registrationid');";
//echo $sql;
$result = $conn->query($sql);
$conn->close();
header("Location: ../php/adminpage.php");
?>