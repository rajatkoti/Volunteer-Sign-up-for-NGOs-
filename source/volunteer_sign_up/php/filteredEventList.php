<?php
include 'dbconnect.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$category = $_GET["category"];


$sql = "SELECT * FROM event WHERE flag = 0  AND (category LIKE '%" . implode("%' OR category LIKE '%", $category) . "%')";
$result = $conn->query($sql);
$finalRows = array();
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		array_push($finalRows,$row);
	}
} else {
	echo "0 results";
}
$jsonObj = json_encode($finalRows);
echo $jsonObj;
$conn->close();
?>
