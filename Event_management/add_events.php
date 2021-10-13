<?php
session_start();
require 'dbconfig/config.php';

if(isset($_POST['addevent_btn']))
    {

      $event_name=$_POST['event_name'];
      $starttime=$_POST['starttime'];
      $endtime=$_POST['endtime'];
      $volunteer1=$_POST['volunteer1'];
      $volunteer1_mob=$_POST['volunteer1_mob'];
      $volunteer2=$_POST['volunteer2'];
      $volunteer2_mob=$_POST['volunteer2_mob'];
      $description=$_POST['description'];
      $entry_fee=$_POST['entry_fee'];
      $img_name=$_FILES['image']['name'];
      $img_size=$_FILES['image']['size'];
      $img_tmp=$_FILES['image']['tmp_name'];
      $directory='posteruploads/';
      
      $target_file=$directory.$img_name;

      move_uploaded_file($img_tmp,$target_file); 

      $query="select * from events where (start_date<='$starttime' and end_date>='$endtime') or (start_date<='$starttime' and end_date>='$starttime') or (start_date<='$endtime' and end_date>='$endtime')";
        $query_run=mysqli_query($con,$query);     
        if(mysqli_num_rows($query_run)>0)
        {
          echo '<script type="text/javascript"> alert("Alredy event exists in the given Time....") </script>';   
        }
        
        else
        {
          $query="insert into events values('', '$event_name','$starttime','$endtime','$volunteer1','$volunteer1_mob','$volunteer2','$volunteer2_mob','$description','$target_file', '$entry_fee')";
      $query_run= mysqli_query($con,$query);
      if($query_run)
      {
        $message = "Event Added Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
      else
      {
      echo '<script type="text/javascript"> alert("Error! try after some time")</script>';
      }
        }

      
      


}

?>
<html>
<head>
  <link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Artifika' rel='stylesheet'>
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
    margin-bottom: 5%;
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
  body
  {
    background-image: url("images/event_management_club.PNG");
  }
  </style>
<title>Add Events</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body onload="hidediv()">


<div id="topheader" >
<nav class="navbar navbar-inverse" style="height: 10%;">
  <div class="container-fluid" style="margin-top: 0.6%;font-size: 110%;">
    <div class="navbar-header" >
      <a class="navbar-brand" href="admin_dashboard.php">N & R Events</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="admin_dashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li class="active"><a href="add_events.php"> <span class="glyphicon glyphicon-hdd"></span> Add Events</a></li>
      <li><a href="upcomin_events.php"><span class="glyphicon glyphicon-th-list"></span> Upcoming Events</a></li>
      <li><a href="suggestions.php"><span class="glyphicon glyphicon-send"></span> Suggestions</a></li>
      <li><a href="index.php"><span class="glyphicon glyphicon-log-out" name="logout" method="post" action="index.php" type="submit" ></span> Logout</a></li>
    </ul>
  </div>
</nav>
</div>

<div class="alert alert-warning" id="warning">
<strong>Warning!</strong> Event exists in the given time.
</div>

<div class="container">
<div class="main">
  <h3 style="font-size: 55px; font-family: 'Artifika';font-weight: bold;">Add Event</h3>
<br>

  <form action="add_events.php" method="post" enctype="multipart/form-data">

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
    <div class="date">
<label for="starttime" style="font-size: 17px;margin-left: 0%;">Start Date and Time</label>
<input type="datetime-local" id="starttime" name="starttime" style="width: 700px;"required/>
<br>
<br>
<label for="endtime" style="font-size: 17px;margin-left: 0%;">End Date and Time</label>
<input type="datetime-local" id="endtime" name="endtime"style="width: 700px;"required/>
</div>



  <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="volunteer1" type="text" class="form-control" class="input_values" name="volunteer1" placeholder="First Volunteer"required/>
    </div>
    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
      <input id="volunteer1_mob" type="text" class="form-control" class="input_values" name="volunteer1_mob" placeholder="volunteer Mobile Number"required/>
    </div>
<div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="volunteer2" type="text" class="form-control" class="input_values" name="volunteer2" placeholder="Second Volunteer"required/>
    </div>
    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
      <input id="volunteer2_mob" type="text" class="form-control" class="input_values" name="volunteer2_mob" placeholder="volunteer Mobile Number"required/>
    </div>
    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
      <input id="entry_fee" type="text" class="form-control" class="input_values" name="entry_fee" placeholder="Entry Fee"required/>
    </div>
    <div class="form-group">
  <label for="description" style="margin-left: 0%; font-family: 'Amita';font-size: 15px; font-size: 30px; font-weight: bold;">Description</label>
  <textarea class="form-control" rows="5" id="description" name="description"required/></textarea>
</div>

    <br>
    <button type="submit" id ="addevent_btn" name ="addevent_btn" class="btn btn-primary">Add Event</button>
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
</html>