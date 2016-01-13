<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Pie Chart Demo (Google VAPI) - http://codeofaninja.com/</title>
    </head>
    
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
</body>
</html>