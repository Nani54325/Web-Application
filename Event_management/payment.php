<?php
session_start();
require 'dbconfig/config.php';

/*$eve_id=$_SESSION['eve_id'];
$eve_name=$_SESSION['eve_name'];
$eve_fee=$_SESSION['eve_fee'];
$tickets=$_SESSION['tickets'];
$reg_num=$_SESSION['reg_num'];
$total=$_SESSION['total'];*/



$eve_id = $_POST['hidden_id1']; 
$eve_name = $_POST['hidden_name']; 
$eve_fee = $_POST['hidden_fee'];
$eve_tickets =$_POST['Number_Of_Tickets'];
$eve_total=$eve_fee*$eve_tickets;
$reg_num=$_SESSION['reg_num'];


if(isset($_POST['confirm_btn']))
{
  $id=$_POST['event_id'];
  $name=$_POST['event_name'];
  $reg=$_POST['reg_num'];
  $tickets=$_POST['tickets'];
  $total=$_POST['event_total'];
	$query1="insert into booking values('', '$id', '$name', '$reg', '$tickets', '$total')";
	$query_run= mysqli_query($con,$query1);
	if($query_run)
	{
		header("Location: success.php");
	}
	else
	{
		echo "<script>alert('Booking failed');</script>";
	}
}

?>





<!DOCTYPE html>
<html>
<head>
	<title>payment</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
	.main{
		width:60%;
		padding:5%;
		text-align: center;
		margin-left: 19%;
		margin-top: 7%;
		border: 2px solid black;
		border-radius: 9px;
		height:70%;
    background-color: white;
    

	}
	body
    {
      background-image: url("gift2.jpeg");
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    .close 
    {
    	color: #aaaaaa;
    	float: right;
    	font-size: 28px;
    	font-weight: bold;
    }
    .close:hover,
    .close:focus 
    {
    	color: #000;
    	text-decoration: none;
    	cursor: pointer;
    }

</style>


</head>
<body>
<div class="main">
	<h3 style="font-size: 40px; font-family: 'Artifika';font-weight: bold; text-align: left;">N & R EVENTS</h3>
	<br>         
	<form action="payment.php" method="post">
  <div class="form-group row">
    <label for="Event Id" class="col-sm-2 col-form-label" style="font-size: 15px; font-family: 'Artifika';font-weight: bold;">Event Id</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="event_id" name=event_id value="<?php echo $eve_id?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="Event Name" class="col-sm-2 col-form-label" style=" font-size: 15px;font-family: 'Artifika';font-weight: bold;">Event Name</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="event_name" name="event_name" value="<?php echo $eve_name?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="Total Amount" class="col-sm-2 col-form-label" style="font-size: 15px; font-family: 'Artifika';font-weight: bold;">Total Amount</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="event_total" name="event_total" value="<?php echo $eve_total?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="Tickets" class="col-sm-2 col-form-label" style="font-size: 15px; font-family: 'Artifika';font-weight: bold;">Tickets</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="tickets" name="tickets" value="<?php echo $eve_tickets?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="Reg Num" class="col-sm-2 col-form-label" style="font-size: 15px; font-family: 'Artifika';font-weight: bold;">Reg Number</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="reg_num" name="reg_num" value="<?php echo $reg_num;?>">
    </div>
  </div>
	<input type="submit" type="submit" class="btn btn-success" id="confirm_btn" name="confirm_btn" value="Confirm">
</form>
</div>
</body>
</html>