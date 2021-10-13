<?php
session_start();
require 'dbconfig/config.php';

if(isset($_POST['addevent_btn']))
    {

      $event_name=$_POST['event_name'];
      $mname=$_POST['uname'];
      $mob_no=$_POST['mob'];
      $desc=$_POST['description'];
      $email=$_POST['email'];
      $img_name=$_FILES['image']['name'];
      $img_size=$_FILES['image']['size'];
      $img_tmp=$_FILES['image']['tmp_name'];
      $directory='posteruploads/';
      $target_file=$directory.$img_name;

      move_uploaded_file($img_tmp,$target_file); 
      $query="insert into user_event values('','$event_name','$mname','$email','$mob_no','$desc','$target_file','no')";
      $query_run= mysqli_query($con,$query);
      if($query_run)
      {
        $message = "Request Has Been Done Succesfully!!!";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
      else
      {
      echo '<script type="text/javascript"> alert("Error! try after some time")</script>';
      }
    }

?>
<html>
<head>
  <title>User's Corner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.main{
    width:65%;
    padding:2%;
    text-align: center;
    margin-left: 20%;
    margin-top: 2%;
    border: 2px solid black;
    border-radius: 9px;
    background-color: white;
    margin-bottom: 6%;
  }
  .input_values{
    width:20%;

  }
  #add_event_btn
  {
    width: 25%;
    margin-bottom: 2%;
  }
  #ediv
  {
    margin-bottom: 2%;
  }
  #cfile{
    text-align: center;
    margin-left: 20%;
  }
  #img{
    font-family: 'Amita';font-size: 15px; font-size: 30px; font-weight: bold;
    margin-left: 6%;
  }
  .date{
    margin-left: 0%;
    margin-bottom: 1.5%;
  }
  .shadow-textarea textarea.form-control::placeholder {
    font-weight: 300;
  }
  .shadow-textarea textarea.form-control {
    padding-left: 0.8rem;
  }
  body
  {
    background-image: url("images/event_management_club.PNG");
  }
  </style>
  <body onload="hidediv()">
<div id="topheader">
  <nav class="navbar navbar-inverse" style="height: 10%;">
    <div class="container-fluid" style="margin-top: 0.6%;font-size: 110%;">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"></a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="user_dashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="events.php"><span class="glyphicon glyphicon-hdd"></span> Events</a></li>
        <li><a href="myevents.php"><span class="glyphicon glyphicon-th-list"></span> My Events</a></li>
        <li class="active"><a href="conduct.php"><span class="glyphicon glyphicon-send"></span> Suggestions</a></li>
        <li><a href="profile.php"><span class="glyphicon glyphicon-user"> Profile</a></li>
        <li><a href="llogOut.php"><span class="glyphicon glyphicon-log-out" name="logout" method="post" action="index.php" type="submit" ></span> Logout</a></li>
      </ul>
    </div>
  </nav>
</div>
<div class="alert alert-warning" id="warning">
<strong>Warning!</strong> Event exists in the given time.
</div>

<div class="container">
<div class="main">
  <h3 style="font-size: 55px; font-family: 'Artifika';font-weight: bold;">Conduct Event</h3>
<br>

  <form action="conduct.php" method="post" enctype="multipart/form-data">

    <p id="img" style="text-align: center;">Event Poster</p>
    <div class="form-group" id="cfile">
      <img id="uploadPreview" style="width: 180px; margin-right: 97px;margin-bottom: 1.25%;" src="posteruploads/poster1.png"class="avatar"/>
      <br>

    <input type="file" class="form-control-file" id="image" name="image" style="margin-left: 25% ;text-align: center;" onchange="loadFile(event)"required/ >
  </div>
    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
      <input id="event_name" type="text" class="form-control" class="input_values" name="event_name" placeholder="Event Name" required/>
    </div>
    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
      <input id="uname" type="text" class="form-control" class="input_values" name="uname" placeholder="Manager Name"required/>
    </div>
    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input id="email" type="email" class="form-control" class="input_values" name="email" placeholder="Email"required/>
    </div>
    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
      <input id="mob" type="text" class="form-control" class="input_values" name="mob" placeholder="Mobile Number"required/>
    </div>
    <div class="form-group shadow-textarea">
  <label for="description" style="margin-left: 0%; font-family: 'Amita';font-size: 15px; font-size: 30px; font-weight: bold;">Description</label>
  <textarea class="form-control z-depth-1" rows="5" id="exampleFormControlTextarea6" name="description" placeholder="Write something here about event..."required/></textarea>
</div>

    <br>
    <button type="submit" id ="addevent_btn" name ="addevent_btn" class="btn btn-primary">Send</button>
    <br>
    
  </form>
  <br>
  </div>
</div>
<script type="text/javascript">
  var loadFile = function(event) {
  var image = document.getElementById('uploadPreview');
  image.src = URL.createObjectURL(event.target.files[0]);
};

function hidediv() {
  var x= document.getElementById('warning');
            x.style.display='none';
}
function showdiv() {
  var y= document.getElementById('warning');
  y.style.display='block';
            
}
</script>
</body>
</head>
</html>