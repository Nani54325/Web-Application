<?php
session_start();
require 'dbconfig/config.php';
if(isset($_POST['logout']))
{
  session_destroy();
  header('location:index.php');
}
$query="select * from events where CURRENT_DATE()<=Date(start_date) ORDER BY start_date ASC";
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

<style type="text/css">
  body{
    background-image: url("images/event_management_club.PNG");
  }

  .book label{
    font-size: 15px;
  }
.value{
  text-align: center;
  margin-left: 30%;
}
.book{
  border-radius: 9px;
  float: left;
  margin-left:20px;
  margin-right: 10px;

   margin-bottom: 45px;
   width: 30%;
    padding: 10px;
    background-color: white;
  -webkit-box-shadow: 0px 1px 7px 0px rgba(250,203,250,1);
  -moz-box-shadow: 0px 1px 7px 0px rgba(250,203,250,1);
  box-shadow: 0px 1px 7px 0px rgba(250,203,250,1);
}

</style>
</head>
<body>

<div id="topheader">
<nav class="navbar navbar-inverse" style="height: 10%;">
  <div class="container-fluid" style="margin-top: 0.6%;font-size: 110%;">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="user_dashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li class="active"><a href="events.php"> <span class="glyphicon glyphicon-hdd"></span> Events</a></li>
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




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title" id="exampleModalLabel">Book Ticket</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <br>
        <br>
        <form action="payment.php" method="post">
          <div class="value">
          <div class="input-group" id="ediv">
          <!---<span>Event ID: <input type="label" name="event_id" id="event_id" readonly /></span>-->
          Event ID:&emsp;&emsp;<label id = "GFG" name="GFG">Value</label>
          </div>
          <br>
          <div class="input-group" id="ediv">
          Event Name:&emsp;&emsp;<label id = "GFG1" name="GFG1">Value</label>
          </div>
        </div>
          <br>
          <div class="input-group" id="ediv">
            <span class="input-group-addon"><i class="fa fa-users"></i></span>
            <input id="Number_Of_Tickets" type="number" class="form-control" class="input_values" name="Number_Of_Tickets" min="1" placeholder="Tickets"required/>
          </div>
          <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">NO</button>
        <button type="submit" id ="book_btn" name ="book_btn" class="btn btn-success">Book Ticket</button>
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
  <div class="book">
    <label> Event ID: </label><span id="book_ticket"><?php echo $rows['event_id'];?></span><br>
<label> Event Name: </label><span id="eve_name"><?php $name= $rows['event_name']; echo $name;?></span>&emsp;&emsp;&emsp;<img src="<?php echo $rows['poster'];?>" style="height: 150px;width: 150px;float: right;" ><br>
<label> Start Date: </label><?php echo $rows['start_date'];?><br>
<label> End Date: </label><?php echo $rows['end_date'];?><br>
<label>Volunteers: </label> <?php echo $rows['voulunteer1'];?>, <?php echo $rows['volunteer2'];?><br>
<label>Numbers: </label> <?php echo $rows['1_number'];?>,<?php echo $rows['2_number'];?> <br>
<label>Entry Fee: </label> <span id="fee"><?php echo $rows['Entry_fee'];?></span><br><br>
<center><button type="submit" id ="book" class="btn btn-danger" name="book" data-toggle="modal" data-target="#exampleModal">Book Ticket</button></center><br>
<input type="hidden" id="hidden_id1" name="hidden_id1" value="0">
<input type="hidden" id="hidden_fee" name="hidden_fee" value="0">
<input type="hidden" id="hidden_name" name="hidden_name" value="0">
</form>



  </div>

<?php }?>




<script>

function setval(bookid1, eve_name,eve_fee){
  
  document.getElementById('hidden_id1').value=bookid1;
  //document.getElementById('event_id').value=bookid1;
  //document.getElementById('eve_name').value=eve_name;
  document.getElementById('GFG').innerHTML = bookid1;
  document.getElementById('GFG1').innerHTML = eve_name;
  document.getElementById('hidden_fee').value = eve_fee;
  document.getElementById('hidden_name').value = eve_name;
}

var addtocart= document.getElementsByClassName('btn btn-danger');

  for(var i=0;i<addtocart.length;i++)
  {
    
    var button=addtocart[i];
    button.addEventListener('click',function(event)
    {

      var buttonclicked=event.target;
      var row1=buttonclicked.parentElement.parentElement;
      var x=row1.querySelectorAll("#book_ticket");
      var bookid1=x[0].innerText;
      var x1=row1.querySelectorAll("#eve_name");
      var eve_name=x1[0].innerText;
      var x2=row1.querySelectorAll("#fee");
      var eve_fee=x2[0].innerText;
      setval(bookid1, eve_name, eve_fee);
    }
    )
  };
  
  
  
  
  
  

</script>


















</body>
</html>