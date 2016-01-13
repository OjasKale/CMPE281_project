<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Garage Analysis</title>

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
        <a href="http://ec2-52-34-242-128.us-west-2.compute.amazonaws.com/kite/default/main.php">Quick Park</a>
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

        $id=$_POST['garage'];
        $quer1=mysql_query("select SUM(total_slots) as Total,SUM(available_slots) as Available, name from node where id=$id;");
        $row = mysql_fetch_array($quer1);
        mysql_close($conn);

            ?>
          
     <!-- load api -->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    [{label: 'Total', type: 'string'},
           {label: 'Available', type: 'number'}],
           ['Available', <?php echo $row['Available']; ?>],
           ['Occupied',<?php echo $row['Total']-$row['Available']; ?>]
        ]);
           
 
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"Parking available for parking garage <?php echo $row['name'];?>"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>




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
