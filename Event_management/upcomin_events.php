<?php
session_start();
require 'dbconfig/config.php';
if(isset($_POST['events_btn']))
    {

      $dat=$_POST['date'];
      $query="select * from events where Date(start_date)='$dat' ORDER BY start_date ASC";
      $result=mysqli_query($con,$query);
    }
    else if(isset($_POST['back_btn'])){
      header("refresh:1");
      $query="select * from events where CURRENT_DATE()<=Date(start_date) ORDER BY start_date ASC";
      $result=mysqli_query($con,$query);

    }
    else
    {
      $query="select * from events where CURRENT_DATE()<=Date(start_date) ORDER BY start_date ASC";
      $result=mysqli_query($con,$query);
    }
    if(isset($_POST['update_btn']))
    {
      //eve_name, start_time, end_time, volunteer_1, volunteer1_mob, volunteer_2, volunteer2_mob, entry_fee
      $eventid=$_POST['hidden_id'];
      $eve_name=$_POST['hiddeneve_name'];
      $start_time=$_POST['hiddenstart_time'];
      $end_time=$_POST['hiddenend_time'];
      $volunteer_1=$_POST['hiddenvolunteer_1'];
      $volunteer1_mob=$_POST['hiddenvolunteer1_mob'];
      $volunteer_2=$_POST['hiddenvolunteer_2'];
      $volunteer2_mob=$_POST['hiddenvolunteer2_mob'];
      $entry_fee=$_POST['hiddenentry_fee'];
      $query1="Update events set event_name='$eve_name', start_date='$start_time', end_date='$end_time', voulunteer1='$volunteer_1', 1_number='$volunteer1_mob', volunteer2='$volunteer_2', 2_number='$volunteer2_mob', Entry_fee='$entry_fee' where event_id='$eventid'";
      //$result1=mysqli_query($con,$query1);
      if(mysqli_query($con,$query1))
      {
        echo '<script type="text/javascript">alert("Updated Successfully");</script>';
        header("refresh:1");
      }
      else
      {
        echo '<script type="text/javascript">alert("Error!");</script>';
      }
      //echo $eve_name. $start_time. $end_time. $volunteer_1. $volunteer1_mob. $volunteer_2. $volunteer2_mob. $entry_fee;


    }
    
    if(isset($_POST['delete_btn']))
    {
      $eventid1=$_POST['hidden_id1'];
      
      $query2="delete from events where event_id='$eventid1'";
      //$result2=mysqli_query($con, $query2);
      if(mysqli_query($con, $query2))
      {
        echo '<script type="text/javascript">alert("Deleted Successfully");</script>';
        header("refresh:1");
      }
      else{
        echo '<script type="text/javascript">alert("Error!");</script>';
      }
    }

?>
<html>
<head>
  <link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Artifika' rel='stylesheet'>
  <style type="text/css">
    .main{
    width:40%;
    padding:2.5%;
    text-align: center;
    margin-left: 30%;
    margin-top: 0.25%;
    border: 2px solid black;
    border-radius: 9px;
    background-color: white;
  }
  .input_values{
    width:20%;

  }
  #login_btn
  {
    width: 25%;
    margin-bottom: 2%;
  }
  #ediv
  {
    margin-bottom: 1.5%;
  }
  body
  {
    background-image: url("images/event_management_club.PNG");
  }
  #date{
  
  }
  #events_btn{
    
  }


  #main{
  border: 2px solid black;
  padding:10px;
  width: 100%;
  margin-left:23px;
  border-radius:11px;
  background-color:white;

}
#tablehead
{
  padding-left:45%;
  color: solid black;
  font-size:20px;
  font-weight:bold;
  background-color:white;
  
}




.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
















  </style>



<title>Upcoming Events</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div id="topheader" >
<nav class="navbar navbar-inverse" style="height: 10%;">
  <div class="container-fluid" style="margin-top: 0.6%;font-size: 110%;">
    <div class="navbar-header" >
      <a class="navbar-brand" href="admin_dashboard.php">N & R Events</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="admin_dashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="add_events.php"> <span class="glyphicon glyphicon-hdd"></span> Add Events</a></li>
      <li class="active"><a href="upcomin_events.php"><span class="glyphicon glyphicon-th-list"></span> Upcoming Events</a></li>
      <li><a href="suggestions.php"><span class="glyphicon glyphicon-send"></span> Suggestions</a></li>
      <li><a href="index.php"><span class="glyphicon glyphicon-log-out" name="logout" method="post" action="index.php" type="submit" ></span> Logout</a></li>
    </ul>
  </div>
</nav>
</div>

<form action="upcomin_events.php" method="post">

<div class="container">
<div id="main">
    <label for="date" style="font-size: 17px;margin-left: 30%;">Date</label>
    <input type="date" id="date" name="date"style="width: 300px;" id="ediv"/>
    <button type="submit" id ="events_btn" name ="events_btn" class="btn btn-primary">Check</button>
    <button type="submit" id ="back_btn" name ="back_btn" class="btn btn-warning">Back</button>
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
        <button type="submit" class="btn btn-secondary" name="delete_btn" id="delete_btn" style="color: white; background-color: red;">Delete</button>
      </div>
    </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<table class="table table-striped" align="center"  cellpadding="5">
<tr>
<th colspan="4" id="tablehead" style="font-size: 30px; font-family: 'Artifika';font-weight: bold;">Events</th>
</tr>
<tr>
<th>Event ID</th>
<th>Event Name</th>
<th>Start Time</th>
<th>End Time</th>
<th>Volunteer1</th>
<th>Mobile</th>
<th>Volunteer2</th>
<th>Mobile</th>
<th>Entry Fee</th>
<th colspan="2" style="text-align: center;">Action</th>
</tr>

<?php
while($rows=mysqli_fetch_assoc($result))
{
  ?>
  <tr>
  <td><?php echo $rows['event_id'];?></td>
  <td contenteditable="true"><?php echo $rows['event_name'];?></td>
  <td contenteditable="true"><?php echo $rows['start_date'];?></td>
  <td contenteditable="true"><?php echo $rows['end_date'];?></td>
  <td contenteditable="true"><?php echo $rows['voulunteer1'];?></td>
  <td contenteditable="true"><?php echo $rows['1_number'];?></td>
  <td contenteditable="true"><?php echo $rows['volunteer2'];?></td>
  <td contenteditable="true"><?php echo $rows['2_number'];?></td>
  <td contenteditable="true"><?php echo $rows['Entry_fee'];?></td>
  <td><button type="submit" id="update_btn" class="btn btn-success" name="update_btn">Update</button></td>
  <td><button type="button" id="delete_btn_ex" class="btn btn-danger" name="delete_btn_ex" data-toggle="modal" data-target="#exampleModal">Delete</button></td>
  </tr>
<?php }?>


</table>

<br>
</center>
<input type="hidden" name="hidden_id" id="hidden_id" value="0">
<input type="hidden" name="hiddeneve_name" id="hiddeneve_name" value="0">
<input type="hidden" name="hiddenstart_time" id="hiddenstart_time" value="0">
<input type="hidden" name="hiddenend_time" id="hiddenend_time" value="0">
<input type="hidden" name="hiddenvolunteer_1" id="hiddenvolunteer_1" value="0">
<input type="hidden" name="hiddenvolunteer1_mob" id="hiddenvolunteer1_mob" value="0">
<input type="hidden" name="hiddenvolunteer_2" id="hiddenvolunteer_2" value="0">
<input type="hidden" name="hiddenvolunteer2_mob" id="hiddenvolunteer2_mob" value="0">
<input type="hidden" name="hiddenentry_fee" id="hiddenentry_fee" value="0">


<input type="hidden" name="hidden_id1" id="hidden_id1" value="0">
  </form>
</div>
</div>




</body>
<script type="text/javascript">














function setval(eventid, eve_name, start_time, end_time, volunteer_1, volunteer1_mob, volunteer_2, volunteer2_mob, entry_fee){
  document.getElementById('hidden_id').value=eventid;
  document.getElementById('hiddeneve_name').value=eve_name;
  document.getElementById('hiddenstart_time').value=start_time;
  document.getElementById('hiddenend_time').value=end_time;
  document.getElementById('hiddenvolunteer_1').value=volunteer_1;
  document.getElementById('hiddenvolunteer1_mob').value=volunteer1_mob;
  document.getElementById('hiddenvolunteer_2').value=volunteer_2;
  document.getElementById('hiddenvolunteer2_mob').value=volunteer2_mob;
  document.getElementById('hiddenentry_fee').value=entry_fee;
}

  var updatebutton=document.getElementsByClassName('btn btn-success');
    for(var i=0;i<updatebutton.length;i++){
        var button=updatebutton[i];
        button.addEventListener('click',function(event){
    var buttonclicked=event.target;
    var row=buttonclicked.parentElement.parentElement;
    var eventid=row.cells[0].innerText;
    var eve_name=row.cells[1].innerText;
    var start_time=row.cells[2].innerText;
    var end_time=row.cells[3].innerText;
    var volunteer_1=row.cells[4].innerText;
    var volunteer1_mob=row.cells[5].innerText;
    var volunteer_2=row.cells[6].innerText;
    var volunteer2_mob=row.cells[7].innerText;
    var entry_fee=row.cells[8].innerText;
   setval(eventid, eve_name, start_time, end_time, volunteer_1, volunteer1_mob, volunteer_2, volunteer2_mob, entry_fee);
  })
  };

function setval1(eventid1){
  document.getElementById('hidden_id1').value=eventid1;
  //alert(eventid1);
}

  var deletebutton=document.getElementsByClassName('btn btn-danger');
    for(var i=0;i<deletebutton.length;i++){
        var button1=deletebutton[i];
        button1.addEventListener('click',function(event1){
    var buttonclicked1=event1.target;
    var row=buttonclicked1.parentElement.parentElement;
    var eventid1=row.cells[0].innerText;
   setval1(eventid1);
  })
  };



function delsuccess(){
  // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
}


















</script>
</html>