<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>QuickPark</title>

  <!-- *** BEGIN: Styles *** -->
  <link href="Content/bootstrap.min.css" rel="stylesheet" />
  <link href="Content/Site.css" rel="stylesheet" />
  <link href="Content/pdsa-sidebar.css" rel="stylesheet" />
  <link href="Content/pdsa-summary-block.css" rel="stylesheet" />
  <link href="Content/pdsa-readme-box.css" rel="stylesheet" />
  <link href="Content/pdsa-collapser.css" rel="stylesheet" />
   <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
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
               <?php
					 
						$servername="qpdb-instance.cm83ywnvtqso.us-west-2.rds.amazonaws.com:3306";
						$user="qp_user";
						$password="password123";
						$dbname="QP_db";
						$conn=mysql_connect($servername,$user,$password);
						$db=mysql_select_db($dbname,$conn);
						$quer=mysql_query("select id, name from node");
						?>
						
						<p>Add a New Sensor to garage</p>
            <form method="post" action="addnewsensor.php">
            <select name="garage" style="background-color:green">
			<?php
			while($result=mysql_fetch_array($quer))
						{ ?>
			<option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
						<?php 
						}
			?>
  </div>
    
        </div>
      </div>
	  <input type="submit" value="Add New Sensor"/>
				</form>

    <!-- where the chart will be rendered -->
    <body style="font-family: Arial;border: 0 none;">
    <!-- where the chart will be rendered -->
    <div id="visualization" style="width: 600px; height: 40px;"></div>
 
  
<div id="example5.2" style="height: 300px;width: 2000px;length:100px;"></div>
       
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