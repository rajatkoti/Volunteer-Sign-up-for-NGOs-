<?php
session_start();
if(!isset($_SESSION['username'])){
	header('Location: /volunteer_sign_up/login.html');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wish list</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <script src="../js/wishlist_functions.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    .cartEmpty {
       color: black;
       font-size: 50px;
      -webkit-text-fill-color: white; /* Will override color (regardless of order) */
      -webkit-text-stroke-width: 1px;
      -webkit-text-stroke-color: black;
  }
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

<nav class="navbar navbar-inverse navbar-responsive"  style="font-size: 15px">
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
        <li class="" style="float: left"><a href="/volunteer_sign_up/php/homepage.php">Home</a></li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/volunteer_sign_up/php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
 
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#"></a></p>
      <!-- <p><a href="/volunteer_sign_up/php/homepage.php">HomePage</a></p> -->
     
    </div>
    <div class="col-sm-8 text-left">
       <h4> If the event is full or it is a past event , you cannot register for the event</h4>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead class="thead-dark" style="font-size: 20px">
            <tr>
              <th>Event ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Time</th>
                <th>NGO</th>
                <th>Venue</th>
                <th>Remove from wishlist</th>
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
         //echo $_SESSION['username'];
         $sql = "select * from event e, wishlist w, ngo n where w.event_id=e.event_id and w.flag=0 and e.registration_id = n.registration_id and w.email='".$_SESSION['username']."'";

         $un = '"'.$_SESSION['username'].'"';
         $result = $conn->query($sql);
         $finalRows = array();
         if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
                 
        $eventID=$row["event_id"];
        $name = $row["e_name"];
        $des = $row["description"];
        $dat = $row["date"];
        $time = $row["time"];
        $ngo = $row["ngo_name"];
        $venue = $row["venue"];
        $deleteButtonString="<td><button  class='btn btn-default' onclick='deleteFromWishlist(".$un.",".$eventID.")'>X</button></td>";
        echo "<tr id='$eventID:$name:$des:$dat:$time:$ngo:$venue' class='checkout-row'  style='font-size: 20px'><td>".$row["event_id"]."</td><td>".$row["e_name"]."</td><td>".$row["description"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["ngo_name"]."</td><td>".$row["venue"]."</td>".$deleteButtonString."</tr>";
          }
         } else {
          echo "<div class='cartEmpty'>Wishlist is empty</div>";
         }
         //$jsonObj = json_encode($finalRows,JSON_FORCE_OBJECT);
         //echo $jsonObj;
        
         echo "<tr>
         <td><button type='button' class='btn btn-primary' style='font-size: 20px'  onclick='checkOut(".$un.")'>Sign up</button></td>
        </tr>";
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
  <p>Wishlist</p>
</footer>

</body>
</html>