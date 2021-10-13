<?php
session_start();
require 'dbconfig/config.php';
$regnumber=$_SESSION['reg_num'];
$query="select * from booking where Reg_number='$regnumber' ORDER BY booking_id ASC ";
$result=mysqli_query($con,$query);
if(isset($_POST['delete_btn']))
    {
      $bookingid1=$_POST['hidden_id1'];
      $query2="delete from booking where booking_id='$bookingid1' AND Reg_number='$regnumber' ";
      //$result2=mysqli_query($con, $query2);
      if(mysqli_query($con, $query2))
      {
        echo '<script type="text/javascript">alert("Deleted Successfully");</script>';
        header("refresh:1");
      }
      else
      {
        echo '<script type="text/javascript">alert("Error!");</script>';
      }
    }

if(isset($_POST['view_btn_ex']))
    {
      $_SESSION['id']=$_POST['hidden_id2'];
      $_SESSION['members']=$_POST['hidden_members'];
      $_SESSION['booking_id']=$_POST['hidden_id3'];
      header('location:ticket.php');
    }






?>
<html>
  <title>User's Corner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  	body
    {
      background-image: url("sky.jpg");
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    .main
    {
      width:40%;
      padding:2.5%;
      text-align: center;
      margin-left: 30%;
      margin-top: 0.25%;
      border: 2px solid black;
      border-radius: 9px;
      background-color: white;
    }
    #main
    {
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

    

</style>
<body>
<div id="topheader">
  <nav class="navbar navbar-inverse" style="height: 10%;">
    <div class="container-fluid" style="margin-top: 0.6%;font-size: 110%;">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"></a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="user_dashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="events.php"><span class="glyphicon glyphicon-hdd"></span> Events</a></li>
        <li class="active"><a href="myevents.php"><span class="glyphicon glyphicon-th-list"></span> My Events</a></li>
        <li><a href="conduct.php"><span class="glyphicon glyphicon-send"></span> Suggestions</a></li>
        <li><a href="profile.php"><span class="glyphicon glyphicon-user"> Profile</a></li>
        <li><a href="llogOut.php"><span class="glyphicon glyphicon-log-out" name="logout" method="post" action="index.php" type="submit" ></span> Logout</a></li>
      </ul>
    </div>
  </nav>
</div>
<form action="myevents.php" method="post">
<div class="container">
<div id="main">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete <i class="fa fa-trash" aria-hidden="true"></i></h5>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<table class="table table-striped" align="center"  cellpadding="5">
<tr>
<th colspan="4" id="tablehead" style="font-size: 30px; font-family: 'Artifika';font-weight: bold;">Events</th>
</tr>
<tr>
<th>Booking Id</th>
<th>Event Id</th>
<th>Event Name</th>
<th>Register Number</th>
<th>Tickets</th>
<th>Amount Paid</th>
<th colspan="2" style="text-align: center;">Action</th>
</tr>
<?php
while($rows=mysqli_fetch_assoc($result))
{
  ?>
  <tr>
  <td><?php echo $rows['booking_id'];?></td>
  <td contenteditable="true"><?php echo $rows['Eventid'];?></td>
  <td contenteditable="true"><?php echo $rows['Eventname'];?></td>
  <td contenteditable="true"><?php echo $rows['Reg_number'];?></td>
  <td contenteditable="true"><?php echo $rows['Tickets'];?></td>
  <td contenteditable="true"><?php echo $rows['price'];?></td>
  <td><button type="submit" id="view_btn_ex" class="btn btn-success" name="view_btn_ex">Ticket</button></td>
  
  </tr>
<?php }?>
</table>

<br>
</center>
<input type="hidden" name="hidden_id" id="hidden_id" value="0">
<input type="hidden" name="hiddenev_id" id="hiddenev_id" value="0">
<input type="hidden" name="hiddenev_name" id="hiddenev_name" value="0">
<input type="hidden" name="hiddenreg_num" id="hiddenreg_num" value="0">
<input type="hidden" name="hidden_tickets" id="hidden_tickets" value="0">
<input type="hidden" name="hidden_price" id="hidden_price" value="0">

<input type="hidden" name="hidden_id1" id="hidden_id1" value="0">
<input type="hidden" name="hidden_id2" id="hidden_id2" value="0">
<input type="hidden" name="hidden_members" id="hidden_members" value="0">
<input type="hidden" name="hidden_id3" id="hidden_id3" value="0">
  </form>
</div>
</div>
</body>
<script type="text/javascript">

function setval(booking_id, Eventid, Eventname, Reg_number, Tickets,price){
  document.getElementById('hidden_id').value=booking_id;
  document.getElementById('hiddenev_id').value=Eventid;
  document.getElementById('hiddenev_name').value=Eventname;
  document.getElementById('hiddenreg_num').value=Reg_number;
  document.getElementById('hidden_tickets').value=Tickets;
  document.getElementById('hidden_price').value=price;
}
function setval1(booking_id1){
  document.getElementById('hidden_id1').value=booking_id1;
  //alert(eventid1);
}

  var deletebutton=document.getElementsByClassName('btn btn-danger');
    for(var i=0;i<deletebutton.length;i++){
        var button1=deletebutton[i];
        button1.addEventListener('click',function(booking1){
    var buttonclicked1=booking1.target;
    var row=buttonclicked1.parentElement.parentElement;
    var booking_id1=row.cells[0].innerText;
   setval1(booking_id1);
  })
  };




  function setval1(booking_id1,booking_tickets,booking_id3){
  document.getElementById('hidden_id2').value=booking_id1;
  document.getElementById('hidden_members').value=booking_tickets;
  document.getElementById('hidden_id3').value=booking_id3;

  //alert(eventid1);
}

  var deletebutton=document.getElementsByClassName('btn btn-success');
    for(var i=0;i<deletebutton.length;i++){
        var button1=deletebutton[i];
        button1.addEventListener('click',function(booking1){
    var buttonclicked1=booking1.target;
    var row=buttonclicked1.parentElement.parentElement;
    var booking_id1=row.cells[2].innerText;
    var row1=buttonclicked1.parentElement.parentElement;
    var booking_tickets=row1.cells[4].innerText;
    var row2=buttonclicked1.parentElement.parentElement;
    var booking_id3=row2.cells[0].innerText;
   setval1(booking_id1,booking_tickets,booking_id3);
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

}

</script>
</html>
