<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Quick Park</title>
  <link href="Content/bootstrap.min.css" rel="stylesheet" />
  <link href="Content/Site.css" rel="stylesheet" />
  <link href="Content/pdsa-sidebar.css" rel="stylesheet" />
  <link href="Content/pdsa-summary-block.css" rel="stylesheet" />
  <link href="Content/pdsa-readme-box.css" rel="stylesheet" />
</head>
<body class="notransition">
  <div class="container">
    <div class="row">
      <header>
        <a href="http://ec2-52-34-242-128.us-west-2.compute.amazonaws.com/kite/default/main.php">Quick Park</a>
      </header>
    </div>
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
  </div>

  <div class="container body-content">
    <div class="row">
      <div class="col-xs-12 col-sm-4">
        <div class="pdsa-summary-block pdsa-summary-block-primary">
          <div class="summary-background">
            
          </div>
          <div class="summary-body">
            <div class="summary-line2">Total Analytics</div>
          </div>
          <div class="summary-footer">
          <form method="post" action="totalanalysis.php">
            <input type="submit" value="Click to Enter total analytics..." style="background-color:deepskyblue">
              
              <i class="glyphicon glyphicon-chevron-right
                pull-right">
              </i>
            </a>
          </div>
        </div>
      </div>
      </form>
      <div class="col-xs-12 col-sm-4">
        <div class="pdsa-summary-block pdsa-summary-block-success">
          <div class="summary-background">
            
          </div>
          <div class="summary-body">
            

            

              <div class="summary-line2">
              Garage wise analytics
              </div>
           
		    <?php
					 
						$servername="qpdb-instance.cm83ywnvtqso.us-west-2.rds.amazonaws.com:3306";
						$user="qp_user";
						$password="password123";
						$dbname="QP_db";
						$conn=mysql_connect($servername,$user,$password);
						$db=mysql_select_db($dbname,$conn);
						$quer=mysql_query("select id, name from node");
						?>
						<p>Select a garage</p>
            <form method="post" action="garageanalysis.php">
            <select name="garage" style="background-color:green">
			<?php
			while($result=mysql_fetch_array($quer))
						{ ?>
			<option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
						<?php 
						}
			?>

          
          </div>
		  
          <div class="summary-footer">
           <input type="submit" value="Click to Enter garages analytics..." style="background-color:green">
              
              </form>

              <i class="glyphicon glyphicon-chevron-right pull-right"></i>
            </div>
        </div>
      </div>
    </div>
   
   <div class="row">
      <div class="col-xs-12 col-sm-4">
        <div class="pdsa-summary-block pdsa-summary-block-info">
          <div class="summary-background">
            
          </div>
          <div class="summary-body">
           
            <div class="summary-line2">
              Day wise parking availablity
            </div>
          </div>
          <div class="summary-footer">
          <form method="post" action="dateanalysis.php">
           <input type="submit" value="Click to Enter date wise analytics..." style="background-color:cadetblue">
              <i class="glyphicon glyphicon-chevron-right pull-right">
              </i></form>
            </a>
          </div>
        </div>
      </div>
      
    
	
	<div class="col-xs-12 col-sm-4">
        <div class="pdsa-summary-block pdsa-summary-block-danger">
          <div class="summary-background">
            
          </div>
          <div class="summary-body">
            
            <div class="summary-line2">
              Sensor Control
            </div>
          </div>
          <div class="summary-footer">
           <form method="post" action="control.html">
           <input type="submit" value="Click to Control Sensors" style="background-color:red">
              <i class="glyphicon glyphicon-chevron-right pull-right">
              </i></form> 
          </div>
        </div>
      </div>
    </div>

  </div>
	</div>

  </div>

  <script src="Scripts/jquery-1.11.0.min.js"></script>
  <script src="Scripts/bootstrap.min.js"></script>
  <script src="Scripts/pdsa-common.js"></script>
</body>
</html>
