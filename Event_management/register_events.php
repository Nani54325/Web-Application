<?php
session_start();
require 'dbconfig/config.php';
if(isset($_POST['logout']))
{
  session_destroy();
  header('location:index.php');
}
$query="select * from events ORDER BY start_date ASC";
$result=mysqli_query($con,$query);

?>






<!DOCTYPE html>
<html>
<head>
	<title>Register Events</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Required meta tags -->
    

<style type="text/css">
  body{
    background-image: url("images/event_management_club.PNG");
  }

  .book label{
    font-size: 15px;
  }
</style>
</head>
<body>

<div id="topheader">
<nav class="navbar navbar-default" style="width: 100%; height: 10%">
  <div class="container-fluid">
    <div class="navbar-header"style="margin-top: 0.5%;font-size: 16px;">
      <a class="navbar-brand" href="user_dashboard.php" >N & R Events</a>
    </div>
    <ul class="nav navbar-nav" style="margin-top: 0.5%;font-size: 16px; ">
      <li><a href="user_dashboard.php"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li  class="active"><a href="register_events.php">  <span class="glyphicon glyphicon-hdd"></span>Events</a></li>
      <li><a href="#">  <span class="glyphicon glyphicon-th-list"></span> My Events</a></li>
      <li><a href="#">  <span class="glyphicon glyphicon-send"></span> Suggest Event</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right" style="margin-top: 0.5%;font-size: 16px; ">
      <li><a href="#" > <span class="glyphicon glyphicon-user"></span> My Profile</a></li>
      <li><a href="index.php"><span class="glyphicon glyphicon-log-out" name="logout" method="post" action="index.php" type="submit" ></span> Log Out</a></li>
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




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE <i class="fa fa-trash" aria-hidden="true"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>























<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php
while($rows=mysqli_fetch_assoc($result))
{
  ?>
  <div class="book" style="border: 2px solid black;border-radius: 9px;float: left;margin-left:23px;margin-right: 23px; margin-top: 45px;width: 30%; padding: 10px;background-color: white;">
<label> Event Name: </label><?php echo $rows['event_name'];?>&emsp;&emsp;&emsp;<img src="<?php echo $rows['poster'];?>" style="height: 150px;width: 150px;float: right;" ><br>
<label> Start Date: </label><?php echo $rows['start_date'];?><br>
<label> End Date: </label><?php echo $rows['end_date'];?><br>
<label>Volunteers: </label> <?php echo $rows['voulunteer1'];?>, <?php echo $rows['volunteer2'];?><br>
<label>Numbers: </label> <?php echo $rows['1_number'];?>,<?php echo $rows['2_number'];?> <br>
<label>Entry Fee: </label> <?php echo $rows['Entry_fee'];?><br><br>
<center><button type="submit" id ="login_btn" name ="login_btn" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">Book Ticket</button></center><br>
  </div>

<?php }?>



















</body>
</html>