<?php
session_start();
require  'dbconfig/config.php';
$regnumber=$_SESSION['reg_num'];
$query="select * from user_info where reg_number='$regnumber'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
$sname=$row['fname'];
$lname=$row['lname'];
$email=$row['email'];
$password=$row['password'];
$CPassword=$row['password'];
$reg_num=$_SESSION['reg_num'];
$mobile_no=$row['contact_no'];
if(isset($_POST['update_btn']))
{
  $fname=$_POST['sname'];
  $laname=$_POST['lname'];
  $e_mail=$_POST['email'];
  $mob=$_POST['mobile_no'];
  $regnum=$_SESSION['reg_num'];
  $pass=$_POST['password'];
  $cpass=$_POST['CPassword'];
  $query1="update user_info set fname='$fname',lname='$laname',contact_no='$mob',email='$e_mail',password='$pass' where reg_number='$regnum'";
  if(mysqli_query($con,$query1) && $pass==$cpass)
  {
    echo '<script type="text/javascript">alert("Updated Successfully");</script>';
    header("refresh:1");
  }
  else
  {
    echo '<script type="text/javascript">alert("Error!");</script>';
  }
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
    #cfile
    {
      text-align: center;
      margin-left: 20%;
    }
    #img
    {
      font-family: 'Amita';font-size: 15px; font-size: 30px; font-weight: bold;
      margin-left: 6%;
    }
  </style>
  <head>
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
        <li><a href="myevents.php"><span class="glyphicon glyphicon-th-list"></span> My Events</a></li>
        <li><a href="conduct.php"><span class="glyphicon glyphicon-send"></span> Suggestions</a></li>
        <li class="active"><a href="profile.php"><span class="glyphicon glyphicon-user"> Profile</a></li>
        <li><a href="llogOut.php"><span class="glyphicon glyphicon-log-out" name="logout" method="post" action="index.php" type="submit" ></span> Logout</a></li>
      </ul>
    </div>
  </nav>
</div>
<div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-10"><h1>User Profile</h1></div>
      <div class="col-sm-2"><a href="profile.php" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="https://toppng.com/uploads/preview/transparent-power-button-symbol-icon-11549514655jjls4lkcvx.png"></a></div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        </div>
      <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">User Profile</a></li>
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="profile.php" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="sname" id="first_name" placeholder="first name" title="enter your first name if any." value="<?php echo $sname;?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="lname" id="last_name" placeholder="last name" title="enter your last name if any." value="<?php echo $lname;?>">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile_no" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any." value="<?php echo $mobile_no;?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." value="<?php echo $email;?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Register Number</h4></label>
                              <br>
                              <input type="text"  readonly class="form-control-plaintext" class="form-control" id="reg_num"  placeholder="Register Number" title="enter Register Number" value="<?php echo $reg_num;?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password." value="<?php echo $password;?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="Confirm Password"><h4>Confirm Password</h4></label>
                              <input type="password" class="form-control" name="CPassword" id="CPassword" placeholder="Confirm Password" title="enter your password again." value="<?php echo $password;?>">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit" name="update_btn"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" onclick="myfunction()"  type="reset"><i class="glyphicon glyphicon-repeat"></i> Cancel</button>
                            </div>
                      </div>
                </form>
              </div>
               
              </div>
          </div>

        </div>
    </div>
    <br>
    <br>
    <script type="text/javascript">
      function myfunction(){
        location.replace("user_dashboard.php")
      }
    </script>
</body>
</head>
</html>