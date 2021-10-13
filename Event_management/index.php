<?php
session_start();
require 'dbconfig/config.php';
if(isset($_POST['login_btn']))
		{
			$reg_num=$_POST['reg_num'];
			$password=$_POST['password'];
		 
			$query="select * from user_info WHERE reg_number='$reg_num' AND password='$password'";
			$query_run=mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				//valid
				$row=mysqli_fetch_assoc($query_run);
				$_SESSION['reg_num']=$row['reg_number'];
				
				header('location:user_dashboard.php');
			}
			else if($reg_num == "admin" && $password== "admin")
			{
				header('location:admin_dashboard.php');
			
			}
			else
			{
				//invalid
				echo '<script type="text/javascript"> alert("Invalid Credentials...Try again")</script>';
			}

		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style type="text/css">
	.main{
		width:50%;
		padding:5%;
		text-align: center;
		margin-left: 27%;
		margin-top: 7%;
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





</style>

</head>
<body>

<div class="container">
<div class="main">
  <h3>Login</h3>

  <form action="index.php" method="post">
    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" class="input_values" name="reg_num" placeholder="Registration Number" required />
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" class="input_values" name="password" placeholder="Password" required />
    </div>
    <br>
    <button type="submit" id ="login_btn" name ="login_btn" class="btn btn-primary">Login</button>
    <br>
    <a href="sign_up.php">
    	Don't have an account? Register here!
    </a>
  </form>
  <br>
  </div>
</div>

</body>
</html>

