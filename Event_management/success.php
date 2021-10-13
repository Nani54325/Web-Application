<?php
session_start();
if(isset($_POST['ok_btn']))
{
  header("Location: events.php");
}

?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <title>Success</title>

<style>
.main{
margin-left:43%;
margin-top:9%;
}
.checkmark-circle {
  width: 150px;
  height: 150px;
  position: relative;
  display: inline-block;
  vertical-align: top;
border-color: coral;
}
.checkmark-circle .background {
  width: 180px;
  height: 180px;
  border-radius: 50%;
border-style: solid;
  border-color: green;
position: absolute;
}
.checkmark-circle .checkmark {
  border-radius: 5px;
}
.checkmark-circle .checkmark.draw:after {
  -webkit-animation-delay: 600ms;
  -moz-animation-delay: 600ms;
  animation-delay: 600ms;
  -webkit-animation-duration: 1.5s;
  -moz-animation-duration: 1.5s;
  animation-duration: 1.5s;
  -webkit-animation-timing-function: ease;
  -moz-animation-timing-function: ease;
  animation-timing-function: ease;
  -webkit-animation-name: checkmark;
  -moz-animation-name: checkmark;
  animation-name: checkmark;
  -webkit-transform: scaleX(-1) rotate(135deg);
  -moz-transform: scaleX(-1) rotate(135deg);
  -ms-transform: scaleX(-1) rotate(135deg);
  -o-transform: scaleX(-1) rotate(135deg);
  transform: scaleX(-1) rotate(135deg);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
.checkmark-circle .checkmark:after {
  opacity: 1;
  height: 100px;
  width: 46px;
margin-top:18%;
margin-left:10%;
  -webkit-transform-origin: left top;
  -moz-transform-origin: left top;
  -ms-transform-origin: left top;
  -o-transform-origin: left top;
  transform-origin: left top;
  border-right: 15px solid green;
  border-top: 15px solid green;
  border-radius: 2.5px !important;
  content: '';
  left: 25px;
  top: 75px;
  position: absolute;
}

@-webkit-keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 46px;
    opacity: 1;
  }
  40% {
    height: 100px;
    width: 46px;
    opacity: 1;
  }
  100% {
    height: 100px;
    width: 46px;
    opacity: 1;
  }
}
@-moz-keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 46px;
    opacity: 1;
  }
  40% {
    height: 100px;
    width: 46px;
    opacity: 1;
  }
  100% {
    height: 100px;
    width: 46px;
    opacity: 1;
  }
}
@keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 46px;
    opacity: 1;
  }
  40% {
    height: 100px;
    width: 46px;
    opacity: 1;
  }
  100% {
    height: 100px;
    width: 46px;
    opacity: 1;
  }
}

</style>

</head>

<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="main">
  <div class="checkmark-circle">
  <div class="background"></div>
  <div class="checkmark draw"></div>
</div></div><br><br><br>
<form action="success.php" method="post">
  <button type="submit"class="btn btn-info" style="width:10%;height:50px;margin-left:44.5%;" name="ok_btn">OK</button>
</form>

  
  

</body>

</html>