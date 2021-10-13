<?php
session_start();
require 'dbconfig/config.php';
?>
<html lang="en">
<head>
<style>
  


</style>


  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div id="topheader">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin_dashboard.php">N & R Events</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="add_events.php"><span class="glyphicon glyphicon-cloud-upload"></span> Add Events</a></li>
      <li><a href="upcomin_events.php"><span class="glyphicon glyphicon-list-alt"></span> Upcoming Events</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-check"></span> Suggestions</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
    </ul>
  </div>
</nav>
</div>

<div id="piechart" style="width: 600px; height: 500px; float: left;"></div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Event Name', 'Count'],
        <?php
        $sql="SELECT Eventname,SUM(Tickets) from booking GROUP BY Eventname";

        $result5=mysqli_query($con,$sql);

        while($result1=mysqli_fetch_assoc($result5) ){

          echo "['".$result1['Eventname']."',".$result1['SUM(Tickets)']."],";

        }

      ?>
        ]);

        var options = {
          title: 'Total number of sold tickets'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Gender', 'Count'],
          <?php
        $sql="select u.gender,SUM(Tickets) from booking b,user_info u where b.Reg_number=u.reg_number GROUP BY u.gender";

        $result5=mysqli_query($con,$sql);

        while($result1=mysqli_fetch_assoc($result5) ){

          echo "['".$result1['gender']."',".$result1['SUM(Tickets)']."],";

        }

      ?>

        ]);

        var options = {
          width: 500, height: 200,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('gauge_div'));

        chart.draw(data, options);

      }
    </script>
     <div id="chart_div1" style="float:left; margin-left:8%; width: 600px; height: 500px;"></div>

    <div id="gauge_div" style="width: 400px; height: 120px; margin-left: 33%; margin-bottom: 45%;"></div>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['Event Name', 'Total'],
        <?php
        $sql2="select b.Eventname,SUM(price) FROM booking b,events e where b.Eventid=e.event_id GROUP BY b.Eventname";

        $result6=mysqli_query($con,$sql2);

        while($result7=mysqli_fetch_assoc($result6) ){

          echo "['".$result7['Eventname']."',".$result7['SUM(price)']."],";

        }

      ?>

      ]);

      var options = {
        title: 'Total Gain in money in various events',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total Gain',
          minValue: 0
        },
        vAxis: {
          title: 'Event Name'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));

      chart.draw(data, options);
    }

  </script>

</body>
</html>