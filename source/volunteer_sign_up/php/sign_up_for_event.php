<?php
include 'dbconnect.php';
session_start();
#include '../homepage.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$username = $_POST["email"];

$event_ids = json_decode(stripslashes($_POST['event_ids']));
$count = 0;

foreach($event_ids as $event_id){
	
	list($mid) = explode(':', $event_id);
	$sqlz="SELECT event_id from `event` e WHERE e.date>= CURDATE() AND event_id='".$mid."'";
	$resultz= $conn->query($sqlz);
	if ($resultz->num_rows > 0){
		$sqla="SELECT max_no from `event` WHERE event_id = $mid";
		$resulta = $conn->query($sqla);
	//$array1 = mysql_fetch_assoc($resulta);
	//$num=$resulta;
	//alert ($resulta);
		$num = $resulta->fetch_assoc();
		$sqlc = "SELECT cancel from `sign_up` WHERE event_id = $mid AND cancel='1'";
		$resultc = $conn->query($sqlc);
		$num1=$num['max_no']-($resultc->num_rows);
	//echo "hello hello";
	//echo $num['max_no'];
	//echo("<script>console.log('PHP: "."hello hello"."');</script>");
	//$rs = mysql_fetch_array($resulta);
	//$a = $rs[0];
		$sqlb = "SELECT email from sign_up WHERE event_id = $mid AND cancel='0' ";
		$resultb= $conn->query($sqlb);
		if ($num['max_no']>  $resultb->num_rows){
	//$total_price = $price * $qty;   cccccccccccccccccccccccc  
	//$sq12 = "select GETDATE()";
//result1 = $conn->query($sql2);
				$sql =  "insert into `sign_up` (`email`, `event_id`,`date`,`cancel`) values('".$username. "','". $mid . "',CURRENT_TIMESTAMP,'0')";
	#echo $sql;
				$result = $conn->query($sql);

				
				//$result2 = $conn->query($sql2);	
				$sql3 = "DELETE from wishlist where event_id =$mid and email='".$_SESSION["username"]."'";
				$result3 = $conn->query($sql3);	
	
	
				}

else{
	$sql4 = "DELETE from wishlist where event_id =$mid and email='".$_SESSION["username"]."'";
	$result4 = $conn->query($sql4);	
			}
		}
else{
	$sql4 = "DELETE from wishlist where event_id =$mid and email='".$_SESSION["username"]."'";
	$result4 = $conn->query($sql4);	
	
	//echo $sql3;
}
}
	$conn->close();
	header("Location: signed_up_events.php");

//echo $sql;



?>
