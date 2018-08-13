<?php
include 'dbconnect.php';
#include '../homepage.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$key = $_POST["eventId"];
$username = $_POST["email"];

$sql = "DELETE FROM wishlist where event_id= '$key' and email ='$username'";


$result = $conn->query($sql);
$conn->close();

//header("Location: Cart.php");
?>