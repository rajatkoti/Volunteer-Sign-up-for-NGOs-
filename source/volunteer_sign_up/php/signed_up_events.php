<?php
session_start();
if(!isset($_SESSION['username'])){
	header('Location: /volunteer_sign_up/login.html');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shopping Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
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
    img{
    width:auto;
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
      <ul class="nav navbar-nav" style="font-size: 15px">
        <li class=""><a href="../php/homepage.php">Home</a></li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right" style="font-size: 15px">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
  </div>
    <div class="col-sm-8 text-left">
      	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead class="table-dark">
          <h4> If the event is full ,you cannot register for the event</h4>
            <tr style="font-size: 20px">
                
                <th>Event Name</th>
                <th>Venue</th>
                <th>Event Date</th>
                
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
         $un = '"'.$_SESSION['username'].'"';
         //echo $_SESSION['username'];
         $sql = "select distinct m.event_id, m.e_name, m.date , m.venue from 
							users u inner join sign_up t on u.email = t.email join event m on m.event_id = t.event_id where u.email = $un and t.cancel='0'";
      
         $result = $conn->query($sql);
         //echo $sql;
         $finalRows = array();
         if ($result->num_rows > 0) {
         	// output data of each row
         	while($row = $result->fetch_assoc()) {
                 
				echo '<tr  style="font-size: 20px" class="history-row" id="'.$row['event_id'].'">';
				echo '<td class ="event_name">'.$row['e_name'].'</td>';
				//echo '<td hidden="true">'.$row['event_id'].'</td>';
				//echo '<td>'.$row['title'].'</td>';
				echo '<td> '.$row['venue'].'</td>';
				echo '<td>'.$row['date'].'</td>';
				//echo '<td>'.gettype($row['t_date']).'</td>';
				echo '</tr>';
         	}
         } else {
         	echo "You are not attending any events";
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
  <p>Attending Events : If you want to cancel attending any event please mail us with your username and event details @ wecaretocare@gmail.com</p>
</footer>

</body>
</html>