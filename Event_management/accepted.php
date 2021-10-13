<?php
session_start();
require 'dbconfig/config.php';
if(isset($_POST['logout']))
{
  session_destroy();
  header('location:index.php');
}
$query="select * from user_event where accepted='yes'";
$result=mysqli_query($con,$query);
if(isset($_POST['delete_btn']))
{
  $id = $_POST['hidden_id'];
  $query="delete from user_event where id = '$id'";
  $result=mysqli_query($con,$query);
  if($result)
  {
    echo "<script>alert('Deleted Successfully...');</script>";
    header("refresh:1");
  }
}
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


<div id="topheader" >
<nav class="navbar navbar-inverse" style="height: 10%;">
  <div class="container-fluid" style="margin-top: 0.6%;font-size: 110%;">
    <div class="navbar-header" >
      <a class="navbar-brand" href="admin_dashboard.php">N & R Events</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="admin_dashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="add_events.php"> <span class="glyphicon glyphicon-hdd"></span> Add Events</a></li>
      <li><a href="upcomin_events.php"><span class="glyphicon glyphicon-th-list"></span> Upcoming Events</a></li>
      <li><a href="suggestions.php"><span class="glyphicon glyphicon-send"></span> Suggestions</a></li>
      <li class="active"><a href="accepted.php"><span class="glyphicon glyphicon-th-list"></span> Accepted</a></li>
      <li><a href="index.php"><span class="glyphicon glyphicon-log-out" name="logout" method="post" action="index.php" type="submit" ></span> Logout</a></li>
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



<form action="accepted.php" method="post">
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
  	<label> ID: </label><span id="id"><?php $name= $rows['id']; echo $name;?></span><br>
  	<span id="image"><?php $name= $rows['eve_poster']; echo $name;?></span>
<label> Event Name: </label><span id="eve_name"><?php $name= $rows['event_name']; echo $name;?></span>&emsp;&emsp;&emsp;<img src="<?php echo $rows['eve_poster'];?>" style="height: 150px;width: 150px;float: right;" ><br>
<label> Name: </label><span id="name"><?php echo $rows['mname'];?></span><br>
<label> email: </label><span id="email"><?php echo $rows['email'];?></span><br>
<label>Mobile Number: </label><span id="number"> <?php echo $rows['mob_no'];?></span>
<label>Description: </label><span id="descr"> <?php echo $rows['descr'];?></span><br><br><br>
<center><button type="button" id ="book" class="btn btn-danger" name="delete" data-toggle="modal" data-target="#exampleModal">Delete</button></center>
<input type="hidden" id="hidden_id" name="hidden_id" value="0">
<input type="hidden" id="hidden_eve_name" name="hidden_eve_name" value="0">
<input type="hidden" id="hidden_name" name="hidden_name" value="0">
<input type="hidden" id="hidden_image" name="hidden_image" value="0">
<input type="hidden" id="hidden_email" name="hidden_email" value="0">
<input type="hidden" id="hidden_number" name="hidden_number" value="0">
<input type="hidden" id="hidden_descr" name="hidden_descr" value="0">
</form>



  </div>

<?php }?>




<script>
document.getElementById("image").style.display = 'none';
function setval(id,eve_name,name,image,email,number,descr){
  
  //document.getElementById('hidden_id1').value=bookid1;
  //document.getElementById('event_id').value=bookid1;
  //document.getElementById('eve_name').value=eve_name;
  document.getElementById('hidden_id').value=id;
  document.getElementById('hidden_eve_name').value=eve_name;
  document.getElementById('hidden_name').value=name;
  document.getElementById('hidden_image').value=image;
  document.getElementById('hidden_email').value=email;
  document.getElementById('hidden_number').value=number;
  document.getElementById('hidden_descr').value=descr;
}

var addtocart= document.getElementsByClassName('btn btn-danger');

  for(var i=0;i<addtocart.length;i++)
  {
    
    var button=addtocart[i];
    button.addEventListener('click',function(event)
    {

      var buttonclicked=event.target;
      var row1=buttonclicked.parentElement.parentElement;
      var x=row1.querySelectorAll("#id");
      var id=x[0].innerText;
      var x1=row1.querySelectorAll("#eve_name");
      var eve_name=x1[0].innerText;
      var x2=row1.querySelectorAll("#name");
      var name=x2[0].innerText;
      var x2=row1.querySelectorAll("#image");
      var image=x2[0].innerText;
      var x2=row1.querySelectorAll("#email");
      var email=x2[0].innerText;
      var x2=row1.querySelectorAll("#number");
      var number=x2[0].innerText;
      var x2=row1.querySelectorAll("#descr");
      var descr=x2[0].innerText;
      setval(id,eve_name,name,image,email,number,descr);
    }
    )
  };



//for delete button









  
  
  
  
  
  

</script>


















</body>
</html>