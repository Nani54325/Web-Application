<?php

session_start();
require 'dbconfig/config.php';
$reg_num=$_SESSION['reg_num'];
$id = $_SESSION['id'];
$members = $_SESSION['members'];
$booking_id = $_SESSION['booking_id'];
if(isset($_POST['back_btn']))
{
	header('location:myevents.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>View Ticket</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
	body
	{
		background-image: url("images/ticket.PNG");
		background-size: 1500px 700px;
	}
	p
	{
		font-size: 25px;
	}
	#reg_num
	{
		font-weight: bold;
		color: blue;
	}
	#name
	{
		font-weight: bold;
		color: blue;
	}
	.matter
	{
		margin-top: 5.25%;
		margin-left: 10%;
		margin-right: 6%;
	}
	#members
	{
		font-weight: bold;
		color: blue;
	}
	#id
	{
		font-weight: bold;
		color: blue;
	}
	span
	{
		font-size: 25px;
	}
	</style>
</head>
<body>
	<form action="ticket.php" method="post">
<div class="matter">
	<center><img src="images/logo.PNG" style="width: 17%;height: 10%; margin-right: 16%;"></center>
	<p>The register number <span id="reg_num"> <?php echo $reg_num; ?> </span> is successfully registered tickets for <span id="members"><?php echo $members; ?></span> members for the event <span id="name"><?php echo $id ?></span>. With booking ID <span id="id"><?php echo $booking_id ?>.</span> </p><br>
	<div class="signature">
	<img src="images/signature.PNG" style=" margin-left: 4.25%; width: 15%;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<img src="images/signature1.PNG">
	<br>
	<span style=" margin-left: 4.25%;">Signature of Manager</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<span>Signature of Organizer</span>
	<br><br><br><br>
	<button type="button" id ="print_btn" onclick="window.print()" name ="print_btn" class="btn btn-primary" style="margin-left: 36%;" >Print Ticket</button>&emsp;
	<button type="submit" id ="back_btn" name ="back_btn" class="btn btn-warning">Back</button>

</div>
</div>
</form>
<script type="text/javascript">

</script>
</body>
</html>