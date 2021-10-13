<?php
session_start();
?>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
  <style>
  body {
 background-image: url("images/event_management_club.PNG");
}
.carousel .item {
  height: 550px;
}
.carousel-caption {
left: 0%;
text-align: left;
max-width: 300px;
right: 0px;
padding:5px;
margin-right: 0px;
top: 0px;
}
.cap{
  text-align: center;
}


.footer{
  background: black;
  color:white;
  
  .links{
    ul {list-style-type: none;}
    li a{
      color: white;
      transition: color .2s;
      &:hover{
        text-decoration:none;
        color:#4180CB;
        }
    }
  }  
  .about-company{
    i{font-size: 25px;}
    a{
      color:white;
      transition: color .2s;
      &:hover{color:#4180CB}
    }
  } 
  .location{
    i{font-size: 18px;}
  }
  .copyright p{border-top:1px solid rgba(255,255,255,.1);} 
}




</style>
  <title>User Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div id="topheader">
<nav class="navbar navbar-inverse" style="height: 10%;">
  <div class="container-fluid" style="margin-top: 0.6%;font-size: 110%;">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="user_dashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="events.php"> <span class="glyphicon glyphicon-hdd"></span> Events</a></li>
      <li><a href="myevents.php"><span class="glyphicon glyphicon-th-list"></span> My Events</a></li>
      <li><a href="conduct.php"><span class="glyphicon glyphicon-send"></span> Suggestions</a></li>
      <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
      <li><a href="llogOut.php"><span class="glyphicon glyphicon-log-out" name="logout" method="post" action="index.php" type="submit" ></span> Logout</a></li>
    </ul>
  </div>
</nav>
</div>

	<script> 
        $( '#topheader .navbar-nav a' ).on('click',  
                    function () { 
            $( '#topheader .navbar-nav' ).find( 'li.active' ) 
            .removeClass( 'active' ); 
            $( this ).parent( 'li' ).addClass( 'active' ); 
        }); 
    </script> 







<div class="main" style="margin-right: 3.5%;">

<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" style="width: 105% ;margin-right: 2px;">

    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/home2.PNG" alt="Event" style="width:100%;">
        <div class="cap">
        <div class="carousel-caption">
        <h1 style="background-color: rgb(9,9,121); text-align: center;margin-left: 0px;">Upcoming Events</h1>
      </div>
      </div>
      </div>

      <div class="item">
        <img src="images/home3.PNG" alt="Event" style="width:100%;">
        <div class="cap">
        <div class="carousel-caption">

        <h1 style="background-color: rgb(9,9,121); text-align: left;margin-left: 0px;">Upcoming Events</h1>
      </div>
      </div>
      </div>
    
      <div class="item">
        <img src="images/home1.PNG" alt="Event" style="width:100%;">
        <div class="cap">
        <div class="carousel-caption">
        <h1 style="background-color: rgb(9,9,121); text-align: left;margin-left: 0px;">Upcoming Events</h1>
      </div>
      </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<br>
<br>
<br>
<center><h1 style="font-family: 'Lobster';font-size: 22px; font-size: 50px; font-weight: bold;">Hall Of Fame</h1></center>
<br>
<br>
<br>

<div class="row" style="height: 250px; width: 1375px ;margin-left: 13px;">
  <div class="col-md-3">
    <div class="thumbnail">
      <a href="/w3images/lights.jpg">
        <img src="images/gallery1.PNG" alt="Lights" style="width:98%; height: 250px">
        <div class="caption">
          <p>Motivation by Business man...</p>
        </div>
      </a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="thumbnail">
      <a href="/w3images/nature.jpg">
        <img src="images/gallery2.PNG" alt="Nature" style="width:98%; height: 250px">
        <div class="caption">
          <p>Best Event Planner...</p>
        </div>
      </a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="thumbnail">
      <a href="/w3images/fjords.jpg">
        <img src="images/gallery3.PNG" alt="Fjords" style="width:98%; height: 250px">
        <div class="caption">
          <p>Awards Ceremony...</p>
        </div>
      </a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="thumbnail">
      <a href="/w3images/fjords.jpg">
        <img src="images/gallery4.PNG" alt="Fjords" style="width:150%; height: 250px">
        <div class="caption">
          <p>DSP Steal the Show...</p>
        </div>
      </a>
    </div>
  </div>
</div>

<br>
<br>
<br>
<br>






<div class="mt-5 pt-5 pb-5 footer">
<div class="container">
  <div class="row">
    <div class="col-lg-5 col-xs-12 about-company">
      <h2>N & R Events</h2>
      <p class="pr-5 text-white-50">Welcome to N&R events where you can register and enjoy the event.</p>
      <a href="https://www.facebook.com/?stype=lo&jlou=AfdGhB60MeAOeeo-QG8MuPnAYF47HEqqF6-SbFsOvtDAwG4XG5PzxoH9RPSWXQFSKD_J87oPW5f5fgZqvfw0PxcopVJJHszuyDAnJg9Pes-9Og&smuh=19102&lh=Ac9Skqob3npxzy0t" target="_blank" class="fa fa-facebook" style="border-radius: 50%;background: #55ACEE;color: white;font-size: 30px;width: 30px;"></a>
<a href="https://twitter.com/login?lang=en" target="_blank" class="fa fa-twitter" style="border-radius: 50%;background: #55ACEE;color: white;font-size: 30px;width: 30px;"></a>
<a href="#" class="fa fa-google" style="border-radius: 50%;background: #55ACEE;color: white;font-size: 30px;width: 30px;"></a>
<a href="https://in.linkedin.com/" target="_blank" class="fa fa-linkedin" style="border-radius: 50%;background: #55ACEE;color: white;font-size: 30px;width: 30px;"></a>
    </div>
    <div class="col-lg-3 col-xs-12 links">
      <h4 class="mt-lg-0 mt-sm-3">Go to</h4>
        <ul class="m-0 p-0">
          <li>- <a href="events.php">Register Events</a></li>
          <li>- <a href="myevents.php">My Events</a></li>
          <li>- <a href="#">Suggestion</a></li>
          <li>- <a href="#">Profile</a></li>
          <li>- <a href="llogout.php">Log Out</a></li>
        </ul>
    </div>
    <div class="col-lg-4 col-xs-12 location">
      <h4 class="mt-lg-0 mt-sm-4">Location</h4>
      <p>3a-8b, Vijaya shanthi apparments Kandigai, chennai-600127</p>
      <h4 class="mt-lg-0 mt-sm-4">Contact Us:</h4>
      <p class="mb-0"><i class="fa fa-phone mr-3"></i> +91 6300189494</p>
      <p class="mb-0"><i class="fa fa-phone mr-3"></i> +91 9053335999</p>
      <p><i class="fa fa-envelope-o mr-3"></i> maddukuri.nivas2019@vitstudent.ac.in</p>
      <p><i class="fa fa-envelope-o mr-3"></i> udaysurya.deveswar2019@vitstudent.ac.in</p>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col copyright">
      <p class=""><small class="text-white-50">© 2020. All Rights Reserved.</small></p>
    </div>
  </div>
</div>
</div>





</body>
</html>