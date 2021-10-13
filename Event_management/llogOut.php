<?php
session_start();
unset($_SESSION["reg_num"]);
unset($_SESSION["password"]);
header("Location:index.php");
?>
<html>
</html><?php
?>
<html>
  <title>User's Corner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  	</style>
  	<head>
  <body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="user_dashboard.php">Home</a></li>
      <li><a href="#">Events</a></li>
      <li><a href="#">My Events</a></li>
      <li><a href="#">Suggestions</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="">About Us</a></li>
      <li class="active"><a href="llogOut.php">Logout</a></li>
    </ul>
  </div>
</div>
</nav>
</body>
</head>
</html>