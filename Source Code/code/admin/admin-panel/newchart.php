<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Total Analysis</title>

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
<form>
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
      <div class="col-xs-12 col-sm-20">
        <div class="panel-group"
             id="playlists"
             data-pdsa-collapser-name="playlists"
             data-pdsa-collapser-open="glyphicon glyphicon-plus"
             data-pdsa-collapser-close="glyphicon glyphicon-minus">
    <div id="chart_div" style="width: 900px; height: 600px;"></div>
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
				$quer2=mysql_query("select name, total_slots, available_slots from node;");
				
				if(!$quer2)
				{
					echo "error".mysql_error();
				}
      ?>
 <script type="text/javascript" src="http://www.google.com/jsapi"></script>
 <script type="text/javascript">
  	google.load('visualization', '1', {packages: ['corechart', 'bar']});
	function drawMaterial() {
      var data = google.visualization.arrayToDataTable([
        ['Name', 'Total Slots', 'Available Slots'],
		<?php while($row1 = mysql_fetch_array($quer2)) 
		 {?>
        ['<?php echo $row1['name'];?>,', <?php echo $row1['total_slots']; ?>, <?php echo $row1['available_slots']; ?>],
		<?php } ?>
      ]);

      var options = {
        chart: {
          title: 'Population of Largest U.S. Cities'
        },
        hAxis: {
          title: 'Total Population',
          minValue: 0,
        },
        vAxis: {
          title: 'City'
        },
        bars: 'horizontal'
      };
      var material = new google.charts.Bar(document.getElementById('chart_div'));
      material.draw(data, options);
    }
	google.setOnLoadCallback(drawMaterial);
	</script>
          </div>
        </div>
      </div>
    </div>
	<?php mysql_close($conn); ?>
 </form>
  <!-- *** END: Body Content *** -->

  <!-- *** BEGIN: Scripts *** -->
  <script src="Scripts/jquery-1.11.0.min.js"></script>
  <script src="Scripts/bootstrap.min.js"></script>
  <script src="Scripts/pdsa-collapser.js"></script>
  <script src="Scripts/pdsa-common.js"></script>
  <!-- *** END: Scripts *** -->
</body>
</html>
