<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Day Wise Analysis</title>

  <!-- *** BEGIN: Styles *** -->
  <link href="Content/bootstrap.min.css" rel="stylesheet" />
  <link href="Content/Site.css" rel="stylesheet" />
  <link href="Content/pdsa-sidebar.css" rel="stylesheet" />
  <link href="Content/pdsa-summary-block.css" rel="stylesheet" />
  <link href="Content/pdsa-readme-box.css" rel="stylesheet" />
  <link href="Content/pdsa-collapser.css" rel="stylesheet" />
  <!-- *** END: Styles *** -->
</head>
<body class="notransition">
  <div class="container">
    <!-- *** BEGIN: Header Area *** -->
    <div class="row">
      <header>
        <a href="http://ec2-52-27-75-76.us-west-2.compute.amazonaws.com/kite/default/main.php">Quick Park</a>
      </header>
    </div>
    <!-- *** END: Header Area *** -->
    <!-- *** BEGIN: Left Navigation *** -->
    <nav class="pdsa-sn-wrapper">
      <ul id="sideNavParent">
        <li>
          <a href="admin.html">
            <span class="visible-sm visible-md visible-lg">Home</span>
            <i class="glyphicon glyphicon-home visible-xs"></i>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- *** END: Left Navigation *** -->
  </div>

  <!-- *** BEGIN: Body Content *** -->
  <div class="container body-content">
    <div class="row">
      <div class="col-xs-12 col-sm-8">
        <div class="panel-group"
             id="playlists"
             data-pdsa-collapser-name="playlists"
             data-pdsa-collapser-open="glyphicon glyphicon-plus"
             data-pdsa-collapser-close="glyphicon glyphicon-minus">
              

              

    

    <!-- where the chart will be rendered -->
    <body style="font-family: Arial;border: 0 none;">
    <!-- where the chart will be rendered -->
    <div id="visualization" style="width: 600px; height: 400px;"></div>
 
    
 
   <?php
$servername = "qpdb-instance.cm83ywnvtqso.us-west-2.rds.amazonaws.com:3306";
$username = "qp_user";
$password = "password123";
$dbname="QP_db";

// Create connection
$conn =mysql_connect($servername, $username, $password, $dbname);

// Check connection
$db=mysql_select_db($dbname,$conn);
if(!$db)
{die("Database could not connect:".mysql_error());
}extract($_POST);
$id=1;
$quer1=mysql_query("select Occupation_full_time as OTime, Vacation_Time as VTime, name as name from node_garage_log;");
mysql_close($conn);
    ?>
  
     <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization',
       'version':'1','packages':['timeline']}]}"></script>
<script type="text/javascript">

google.setOnLoadCallback(drawChart);
function drawChart() {

  var container = document.getElementById('example5.2');
  var chart = new google.visualization.Timeline(container);
  var dataTable = new google.visualization.DataTable();
  dataTable.addColumn({ type: 'string', id: 'Room' });
  dataTable.addColumn({ type: 'string', id: 'Name' });
  dataTable.addColumn({ type: 'date', id: 'Start' });
  dataTable.addColumn({ type: 'date', id: 'End' });
  dataTable.addRows([
   <?php    
      while ($row = mysql_fetch_array($quer1)){
      $nname = $row['name'];
      list($date, $time) = explode(' ', $row['OTime']);
      list($year, $month, $day) = explode('-', $date);
      list($hour, $min, $second) = explode(':', $time);
      list($date2, $time2) = explode(' ', $row['VTime']);
      list($year2, $month2, $day2) = explode('-', $date2);
      list($hour2, $min2, $second2) = explode(':', $time2);
      ?>
      [ '<?php echo $nname?>', 'Fully Occupied',            new Date(<?php echo $year ?>,<?php echo $month?>,<?php echo $day?>,<?php echo $hour?>,<?php echo $min?>,<?php echo $second?>),  new Date(<?php echo $year2?>,<?php echo $month2?>,<?php echo $day2?>,<?php echo $hour2?>,<?php echo $min2?>,<?php echo $second2?>) ],
      <?php
      } 
   ?>
  ]);

  var options = {
    timeline: {  singleColor: '#8d8' }
  };

  chart.draw(dataTable, options);
}

</script>

<div id="example5.2" style="height: 300px;width: 2000px;length:100px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- *** END: Body Content *** -->

  <!-- *** BEGIN: Scripts *** -->
  <script src="Scripts/jquery-1.11.0.min.js"></script>
  <script src="Scripts/bootstrap.min.js"></script>
  <script src="Scripts/pdsa-collapser.js"></script>
  <script src="Scripts/pdsa-common.js"></script>
  <!-- *** END: Scripts *** -->
</body>
</html>
