<?php
session_start();
if(!isset($_SESSION["username"])){
  header('Location: /volunteer_sign_up/login.html');
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Volunteer Sign up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
  <script src="../js/search.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/filter.js"></script>
  <style type="text/css">
  
  .words{
    padding: 6px 6px 6px 32px;
    text-decoration: none;
    color: #818181;
    font-size: 15px;
  }  

.sidenav {
    top:50px;
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1;
    left: 0;
    overflow-x: hidden;
    padding-top: 30;
}
h4{
    padding: 6px 6px 6px 32px;
    text-decoration: none;
    color: #818181;
}
.sidenav li{
    padding: 6px 6px 6px 32px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
    position: relative;
}
.responsive {
    width: 100%;
    height: auto;
}

.sidenav li:hover {
    color: #000000;
}

.main {
    margin-left: 600px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
  </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid"  style="font-size: 15px">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="/volunteer_sign_up/php/index.html">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
        <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Search" id="searchID">
     </div>
    </form>
    <button type="submit" class="btn btn-default" style="margin-top:8px;" id="submitID">Submit</button>
    </li>
        <li><a href="/volunteer_sign_up/php/event.php"><span class="glyphicon glyphicon-shopping-cart"></span> Wishlist</a></li>
        <li><a href="../php/signed_up_events.php"><span class="glyphicon glyphicon-log-out"></span> Your Events</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-lg-2 ">
      <nav class="navbar navbar-nav navbar-default navbar-fixed-side">
       
      <div class="sidenav">
        <h4>FILTER</h4>
            <ul class="list-group checked-list-box" id="check-list-box">
                  <li class="list-group-item list-group-item-dark" id="get-checked-data">Animals</li>
                  <li class="list-group-item" id="get-checked-data">Children</li>
                  <li class="list-group-item" id="get-checked-data" >Environment</li>
                </ul>
                
          </div>
      </nav>
    </div>
    <div class="col-sm-9 col-lg-10">
<div class="container-fluid text-center">
  <div class="row content">
    <!-- <div class="col-sm-2 sidenav"> -->
      <p><a href="#"></a></p>
      <!-- <p><a href="/volunteer_sign_up/php/homepage.php">HomePage</a></p> -->
    </div>
<div class="container" id="eventsList">
<br>
<br>
<div>
    <nav aria-label="Page navigation">
  <ul class="pagination ">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#row0">1</a></li>
    <li><a href="#row1">2</a></li>
    <li><a href="#row2">3</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
  </nav>
  </div>
</div><br><br>

</div>
</div>
</div>
</body>
</html>

