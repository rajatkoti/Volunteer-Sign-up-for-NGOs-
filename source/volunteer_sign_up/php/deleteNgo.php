<?php
session_start();
if(!isset($_SESSION["username"])){
	header('Location: /volunteer_sign_up/login.html');
}
else{
	if($_SESSION["userlevel"]!="a"){
		header('Location: /volunteer_sign_up/login.html');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Homepage</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <script src="../js/adminFunctions_deleteNgo.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="adminpage.php">Home</a></li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#"></a></p>
      <p><a href="/volunteer_sign_up/php/deleteNgo.php">Delete NGO</a></p>
     
    </div>
    
    <div class="col-sm-8 text-left">
      	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>NGO_Name</th>
                <th>Registration_ID</th>
                <th>City</th>
                <th>Description</th>
                
      
                <th>Delete</th>
            </tr>
        </thead>
        
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "volunteer";
        $conn = new mysqli($servername, $username, $password, $dbname);
         if ($conn->connect_error) {
         	die("Connection failed: " . $conn->connect_error);
         }
        
         $sql = "SELECT * FROM ngo where flag='0' ";
         $result = $conn->query($sql);
         $finalRows = array();
         if ($result->num_rows > 0) {
         	// output data of each row
         	while($row = $result->fetch_assoc()) {

			
				$deleteButtonString="<td><button  class='btn btn-default' id='delete' onclick='deleteNgo(".$row["registration_id"].")'>Delete</button></td>";
         		echo "<tr><td>".$row["ngo_name"]."</td><td>".$row["registration_id"]."</td><td>".$row["city"]."</td><td>".$row["description_ngo"].$deleteButtonString."</tr>";
         	}
         } else {
         	echo "0 results";
         }
         
         $conn->close();
         ?>
        
    </table>
    </div>
    <div class="col-sm-2 sidenav">
      
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>NGO List</p>
</footer>

</body>
</html>

