<?php
include 'dbconnect.php';
#include '../homepage.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$ngoname = $_POST["ngo_name"];
$registrationid = $_POST["registration_id"];
$city = $_POST["city"];
$description = $_POST["description"];



$sql = "INSERT INTO `ngo` (`ngo_name`, `registration_id`, `city`, `description_ngo`) VALUES ('$ngoname', '$registrationid', '$city', '$description');";
//echo $sql;
$result = $conn->query($sql);
$conn->close();
header("Location: ../php/adminpage.php");
?>