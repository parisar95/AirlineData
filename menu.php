<?php
	error_reporting(-1);
	ini_set('display_errors',1);
	setcookie('username', htmlentities($_POST['username']));
	setcookie('password', htmlentities($_POST['password']));
?>

<html>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
<style>
.container {
    
    background: rgba(150, 190, 225, 0.35);
}

h2 { 
    color: #111; font-family: 'Georgia'
}

p {
    color: #111; font-family: 'Georgia'
}
</style>
</head>
<body>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top= "200">
  <ul class="nav navbar-nav">
    <li class ="active"><a href="#">Home</a></li>
    
    <li><a href="#">Browse Flights</a></li>
    <li><a href="#">Customers</a></li>
    <li><a href="#">Flight Crew</a></li>
    <li><a href="#">Admin</a></li>
</ul>
 <ul class="nav navbar-nav navbar-right">
      
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-search"></span> Search</a></li>
    </ul>
</nav>


<div class="container">
<center>
  <h2>Welcome to our flight booking system</h2>
  <br><i><p>Providing services for customers, flight crew, and administrators</p></i>
</center>

<center>
<br>
<img src="https://www.freewebheaders.com/wordpress/wp-content/gallery/sunsets/fabulous-sunset-plane-header.jpg" class=img-circle width=800 height=200>
<div class= "row">
<div class="col-sm-4">
    <form>
       <br><br>
       <center> <button type="submit" formaction="cust.php" class="btn btn-primary btn-lg">Customer</button></center>
    </form>
    </div>
    <div class="col-sm-4">
    <form>
    <br><br>
       <center> <button type="submit" formaction="crew.php" class= "btn btn-primary btn-lg">Flight Crew</button></center>
    </form>
    </div>

    <div class="col-sm-4">
    <form>
    <br><br>
       <center> <button type="submit" formaction="admin.php" class="btn btn-primary btn-lg">Administrator</button> </center>
       <br><br><br><br><br><br><br><br><br><br><br><br><br>
    </form>
    </div>
    </div>
    </center>
    </div>
    </div>


</body>


</html>
