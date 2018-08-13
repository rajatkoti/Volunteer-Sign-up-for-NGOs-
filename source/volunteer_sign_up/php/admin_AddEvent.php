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
  <title>Admin Add Event</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <script src="js/adminFunctions.js"></script>
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
        <li class=""><a href="../php/adminpage.php">Home</a></li>
       <li class=""><a href="admin_AddEvent.php">Add Event</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <!-- <p><a href="#"></a></p>
      <p></p> -->
     
    </div>
    <div class="col-sm-8 text-left">

	<form action="addEvent.php" method="post" enctype="multipart/form-data">
	<div class="form-group row">
  	<label for="event_id" class="col-xs-2 col-form-label">Event ID</label>
  	<div class="col-xs-10">
    <input class="form-control" type="text" name="event_id">
  	</div>
	</div>
	<div class="form-group row">
	  <label for="max_no" class="col-xs-2 col-form-label">Max Number</label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text" name="max_no">
	  </div>
	</div>
	
    <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" rows="3"></textarea>
  </div>
	
		<div class="form-group row">
	  <label for="category" class="col-xs-2 col-form-label">Category</label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text" name="category">
	  </div>
	</div>
		<div class="form-group row">
	  <label for="date" class="col-xs-2 col-form-label">Date</label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text" name="date">
	  </div>
	</div>
		<div class="form-group row">
	  <label for="time" class="col-xs-2 col-form-label">Time</label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text" name="time">
	  </div>
	</div>
		<div class="form-group row">
    <label for="e_name" class="col-xs-2 col-form-label">Event Name</label>
    <div class="col-xs-10">
      <input class="form-control" type="text" name="e_name">
    </div>
  </div>
		<div class="form-group row">
    <label for="venue" class="col-xs-2 col-form-label">Venue</label>
    <div class="col-xs-10">
      <input class="form-control" type="text" name="venue">
    </div>
  </div>
  <div class="form-group row">
    <label for="image" class="col-xs-2 col-form-label">Image</label>
    <div class="col-xs-10">
      <input class="form-control" type="text" name="image">
    </div>
  </div>
  <div class="form-group row">
    <label for="registration_id" class="col-xs-2 col-form-label">Registration ID</label>
    <div class="col-xs-10">
      <input class="form-control" type="text" name="registration_id">
    </div>
  </div>

  
  
  
   <button type="submit" class="btn btn-primary">Submit</button>	
  
     </form>   
    
    </div>
    <div class="col-sm-2 sidenav">
      
      </div>
    </div>
  </div>
</div>



</body>
</html>

