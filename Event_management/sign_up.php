<?php
require 'dbconfig/config.php';


if(isset($_POST['register_btn']))
		{
			$fname=$_POST['First_Name'];
			$lname=$_POST['last_name'];
			$password=$_POST['password'];
			$cpassword=$_POST['cpassword'];
			$mobile_num=$_POST['mobile_num'];
			$email=$_POST['email'];
			$reg_num=$_POST['reg_number'];
			$gender=$_POST['gender'];
			
				
			
			
			if($password==$cpassword)
			{
				$query="select * from user_info where reg_number='$reg_num'";
				$query_run=mysqli_query($con,$query);
				
				if(mysqli_num_rows($query_run)>0 || $reg_num=="admin")
				{
					echo '<script type="text/javascript"> alert("User already exists...Try logging in") </script>';
				}
				
				else
				{
					
					$query="insert into user_info values('','$reg_num','$fname','$lname','$mobile_num','$email','$password','$gender')";
					$query_run= mysqli_query($con,$query);
					if($query_run)
					{
						echo "<html></<!DOCTYPE html>
						<html>
						<head>
						<title></title>
						<meta charset='utf-8'>
						<meta name='viewport' content='width=device-width, initial-scale=1'>
						<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
						<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
						<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
						</head>
						<body>
						<br>
						<br>
						<div class='container'>
						<div class='alert alert-success alert-dismissible'>
						<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Success!</strong> This alert box could indicate a successful account creation.
						</div>
						</div>
						</body>
						</html>";
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error! try after some time")</script>';
					}
					
				}
				
			}
			else
			{
				echo '<script type="text/javascript"> alert("Passwods didnot match...")</script>';
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
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
		margin-bottom: 5%;
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
  <h3>Sign Up</h3>
  <form action="sign_up.php" method="post">
  	<div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="First_name" type="text" class="form-control" class="input_values" name="First_Name" placeholder="First Name"required/ >
    </div>
    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="last_name" type="text" class="form-control" class="input_values" name="last_name" placeholder="Last Name"required/>
    </div>
    <div class="input-group" id="ediv">
    	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    	<select class="form-control" id="gender" name="gender" placeholder="Choose One Option" required>
    		<option>Male</option>
            <option>Female</option>
            <option>Transgender</option>
        </select>
    </div>

    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
      <input id="mobile_num" type="text" class="form-control" class="input_values" name="mobile_num" placeholder="Mobile Number"required/>
    </div>



    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input id="email" type="email" class="form-control" class="input_values" name="email" placeholder="Email"required/>
    </div>
    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     <input id="reg_number" pattern="[0-9][0-9][a-zA-Z][a-zA-Z][a-zA-Z][0-9][0-9][0-9][0-9]" title="it should be in the format 19bce1253" type="text" class="form-control" class="input_values" name="reg_number" placeholder="Registration Number"required/>
    </div>
    <div class="input-group" id="ediv">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" class="input_values" name="password" placeholder="Password"required/>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="cpassword" type="password" class="form-control" class="input_values" name="cpassword" placeholder="Confirm Password"required/>
    </div>
    <br>
    <button type="submit" id ="register_btn" name ="register_btn" class="btn btn-primary">Sign Up</button>
    <br>
    <a href="index.php">
    	Already Have an account? Login here!
    </a>
  </form>
  <br>
  </div>
</div>

</body>
</html>