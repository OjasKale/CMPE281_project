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
		  </br>
		  <a href="control.html">
            <span class="visible-sm visible-md visible-lg">Back</span>
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
						if(!($conn=mysql_connect($servername,$user,$password)))
								die("could not connect to database:".mysql_error());
						
						
						$db=mysql_select_db($dbname,$conn);
						if(!$db)
							{die("Database could not connect:".mysql_error());
							}extract($_POST);
							$gname=$_POST['garagename'];
						$addr=$_POST['address'];
						$price=$_POST['price'];
						$slots=$_POST['slots'];
						$quer1=mysql_query("INSERT INTO node (name,address,price,total_slots) VALUES('$gname','$addr','$price','$slots');");
			  if($quer1)
				  echo "Garage added Sucessfully.\n";
			  	$quer1=mysql_query("select id from node where name='$gname'");
					$result=mysql_fetch_array($quer1);
					$id=$result['id'];
					while($slots!=0)
					{			  
						$quer2=mysql_query("INSERT INTO node_log (node_id,status) VALUES('$id','0');");
						$slots=$slots-1;
					}
			  echo "Sensors added Sucessfully";
			  ?>

    

    <!-- where the chart will be rendered -->
    <body style="font-family: Arial;border: 0 none;">
    <!-- where the chart will be rendered -->
    <div id="visualization" style="width: 600px; height: 40px;"></div>
 
  
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